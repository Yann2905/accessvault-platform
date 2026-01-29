#!/bin/bash
set -e

echo "========================================="
echo "  GS2E - Démarrage"
echo "========================================="

echo ""
echo "=== Configuration ==="
echo "DB_HOST: ${DB_HOST}"
echo "DB_PORT: ${DB_PORT}"
echo "DB_DATABASE: ${DB_DATABASE}"
echo "APP_ENV: ${APP_ENV}"
echo "===================="

# Vérifier que les variables obligatoires sont définies
if [ -z "$APP_KEY" ]; then
    echo "❌ ERREUR: APP_KEY n'est pas défini!"
    echo "Générez-le avec: php artisan key:generate --show"
    exit 1
fi

echo ""
echo "⏳ Attente base de données..."

MAX_RETRIES=30
RETRY_COUNT=0

until php -r "
try {
    \$pdo = new PDO(
        'pgsql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD'),
        [PDO::ATTR_TIMEOUT => 5, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo 'Connexion DB réussie\n';
    exit(0);
} catch (Exception \$e) {
    echo 'Erreur DB: ' . \$e->getMessage() . '\n';
    exit(1);
}
"; do
  RETRY_COUNT=$((RETRY_COUNT + 1))
  if [ $RETRY_COUNT -ge $MAX_RETRIES ]; then
    echo "❌ Échec connexion DB après $MAX_RETRIES tentatives"
    echo "Vérifiez vos variables d'environnement DB_*"
    exit 1
  fi
  echo "Tentative $RETRY_COUNT/$MAX_RETRIES..."
  sleep 2
done

echo "✅ DB connectée"

echo ""
echo "🔄 Migrations..."
php artisan migrate --force || {
    echo "❌ Erreur lors des migrations"
    exit 1
}

echo ""
echo "🌱 Seeders..."
php artisan db:seed --force || {
    echo "⚠️ Avertissement: Erreur lors des seeders (peut être normal si déjà exécuté)"
}

echo ""
echo "⚡ Optimisation Laravel..."
php artisan config:cache || echo "⚠️ config:cache a échoué"
php artisan route:cache || echo "⚠️ route:cache a échoué"
php artisan view:cache || echo "⚠️ view:cache a échoué"

echo ""
echo "🔍 Vérification de la configuration PHP-FPM..."
if ! grep -q "listen = 127.0.0.1:9000" /usr/local/etc/php-fpm.d/www.conf; then
    echo "❌ ERREUR: PHP-FPM n'écoute pas sur 127.0.0.1:9000"
    echo "Configuration actuelle:"
    grep "^listen" /usr/local/etc/php-fpm.d/www.conf
    exit 1
fi
echo "✅ PHP-FPM configuré pour écouter sur 127.0.0.1:9000"

echo ""
echo "🔍 Vérification de la configuration Nginx..."
if ! grep -q "fastcgi_pass 127.0.0.1:9000" /etc/nginx/nginx.conf; then
    echo "❌ ERREUR: Nginx ne se connecte pas à 127.0.0.1:9000"
    echo "Configuration actuelle:"
    grep "fastcgi_pass" /etc/nginx/nginx.conf
    exit 1
fi
echo "✅ Nginx configuré pour se connecter à 127.0.0.1:9000"

echo ""
echo "🔍 Test de la configuration Nginx..."
nginx -t || {
    echo "❌ Configuration Nginx invalide"
    exit 1
}

echo ""
echo "🚀 Démarrage Supervisord (PHP-FPM + Nginx)..."
echo "   - PHP-FPM écoutera sur 127.0.0.1:9000"
echo "   - Nginx écoutera sur le port 10000"
echo ""

# Démarrer supervisord en mode non-daemon
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf