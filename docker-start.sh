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
echo "===================="

echo ""
echo "⏳ Attente base de données..."

MAX_RETRIES=30
RETRY_COUNT=0

until php -r "
try {
    new PDO(
        'pgsql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD'),
        [PDO::ATTR_TIMEOUT => 5]
    );
    exit(0);
} catch (Exception \$e) {
    exit(1);
}
"; do
  RETRY_COUNT=$((RETRY_COUNT + 1))
  if [ $RETRY_COUNT -ge $MAX_RETRIES ]; then
    echo "❌ Échec connexion DB"
    exit 1
  fi
  echo "Tentative $RETRY_COUNT/$MAX_RETRIES..."
  sleep 2
done

echo "✅ DB connectée"

echo ""
echo "🔄 Migrations..."
php artisan migrate --force

echo ""
echo "🌱 Seeders..."
php artisan db:seed --force

echo ""
echo "⚡ Optimisation..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo ""
echo "🚀 Démarrage Supervisord (PHP-FPM + Nginx)..."
exec /usr/bin/supervisord -n
