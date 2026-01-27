#!/bin/bash

set -e

echo "========================================="
echo "  GS2E - Démarrage de l'application"
echo "========================================="

echo ""
echo "🔧 Configuration du port Nginx..."

# Utiliser sed pour remplacer PORT dans le template
sed "s/\${PORT}/${PORT}/g" /etc/nginx/nginx.template > /etc/nginx/sites-available/default

echo "Port configuré : $PORT"

# Vérifier que le port a bien été remplacé
echo "Vérification de la configuration Nginx :"
grep "listen" /etc/nginx/sites-available/default

echo ""
echo "=== Configuration Database ==="
echo "DB_HOST: ${DB_HOST}"
echo "DB_PORT: ${DB_PORT}"
echo "DB_DATABASE: ${DB_DATABASE}"
echo "DB_USERNAME: ${DB_USERNAME}"
echo "=============================="
echo ""

echo "⏳ Attente de la base de données..."

MAX_RETRIES=30
RETRY_COUNT=0

until php -r "
try {
    \$pdo = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD'),
        [PDO::ATTR_TIMEOUT => 5]
    );
    echo '✅ Connexion à la base de données réussie !' . PHP_EOL;
    exit(0);
} catch (Exception \$e) {
    echo '❌ Échec de connexion: ' . \$e->getMessage() . PHP_EOL;
    exit(1);
}
"; do
  RETRY_COUNT=$((RETRY_COUNT + 1))
  if [ $RETRY_COUNT -ge $MAX_RETRIES ]; then
    echo "❌ Nombre maximum de tentatives atteint. Abandon."
    exit 1
  fi
  echo "🔄 Base de données non prête, nouvelle tentative... ($RETRY_COUNT/$MAX_RETRIES)"
  sleep 2
done

echo ""
echo "📁 Configuration des permissions..."
chmod -R 775 /app/storage /app/bootstrap/cache
chown -R www-data:www-data /app/storage /app/bootstrap/cache

echo ""
echo "🔄 Exécution des migrations..."
php artisan migrate --force

echo ""
echo "🌱 Initialisation des données..."
php artisan db:seed --force

echo ""
echo "⚡ Nettoyage des caches..."
php artisan config:clear
php artisan route:clear  
php artisan view:clear
php artisan cache:clear

echo ""
echo "⚡ Optimisation de Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "🚀 Démarrage de PHP-FPM..."
php-fpm -D

echo ""
echo "🔍 Affichage des logs Nginx en temps réel..."
tail -f /var/log/nginx/access.log /var/log/nginx/error.log &

echo ""
echo "🌐 Démarrage de Nginx sur le port $PORT..."
echo "========================================="
echo "  ✅ Application prête sur le port $PORT"
echo "========================================="

# Démarrer Nginx en mode foreground
nginx -g 'daemon off;'