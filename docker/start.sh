#!/bin/bash
set -e

echo "========================================="
echo "  GS2E - Démarrage"
echo "========================================="

echo ""
echo "=== Configuration ==="
echo "DATABASE_URL: ${DATABASE_URL:0:30}..." # Afficher seulement les 30 premiers caractères
echo "APP_ENV: ${APP_ENV}"
echo "===================="

# Vérifier que les variables obligatoires sont définies
if [ -z "$APP_KEY" ]; then
    echo " ERREUR: APP_KEY n'est pas défini!"
    exit 1
fi

if [ -z "$DATABASE_URL" ]; then
    echo " ERREUR: DATABASE_URL n'est pas défini!"
    echo "Assurez-vous d'avoir lié votre base de données PostgreSQL sur Render"
    exit 1
fi

echo ""
echo " Attente base de données PostgreSQL..."

MAX_RETRIES=30
RETRY_COUNT=0

until php -r "
try {
    // Parse DATABASE_URL
    \$url = parse_url(getenv('DATABASE_URL'));
    
    if (!\$url || !isset(\$url['host'])) {
        throw new Exception('DATABASE_URL invalide');
    }
    
    \$host = \$url['host'];
    \$port = \$url['port'] ?? 5432;
    \$database = ltrim(\$url['path'], '/');
    \$username = \$url['user'] ?? '';
    \$password = \$url['pass'] ?? '';
    
    \$pdo = new PDO(
        \"pgsql:host=\$host;port=\$port;dbname=\$database\",
        \$username,
        \$password,
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
    echo " Échec connexion DB après $MAX_RETRIES tentatives"
    exit 1
  fi
  echo "Tentative $RETRY_COUNT/$MAX_RETRIES..."
  sleep 2
done

echo " DB PostgreSQL connectée"

echo ""
echo "🔄 Migrations..."
php artisan migrate --force || {
    echo " Erreur lors des migrations"
    exit 1
}

echo ""
echo " Seeders..."
php artisan db:seed --force || {
    echo " Seeders ignorés (peut-être déjà exécutés)"
}

echo ""
echo " Nettoyage du cache..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo ""
echo " Optimisation Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo " Démarrage Supervisord..."
echo ""
echo " Génération de la configuration Nginx avec PORT=${PORT:-10000}..."
export PORT=${PORT:-10000}
envsubst '${PORT}' < /etc/nginx/nginx.conf.template > /etc/nginx/nginx.conf

echo " Nginx configuré pour écouter sur le port $PORT"
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf