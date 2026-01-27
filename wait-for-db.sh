#!/bin/sh

echo "=== Configuration Database ==="
echo "DB_HOST: ${DB_HOST}"
echo "DB_PORT: ${DB_PORT}"
echo "DB_DATABASE: ${DB_DATABASE}"
echo "DB_USERNAME: ${DB_USERNAME}"
echo "=============================="

echo "Waiting for database..."

MAX_RETRIES=30
RETRY_COUNT=0

until php -r "
try {
    new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD'),
        [PDO::ATTR_TIMEOUT => 5]
    );
    echo 'Database connection successful!' . PHP_EOL;
    exit(0);
} catch (Exception \$e) {
    echo 'Database connection failed: ' . \$e->getMessage() . PHP_EOL;
    exit(1);
}
"; do
  RETRY_COUNT=$((RETRY_COUNT + 1))
  if [ $RETRY_COUNT -ge $MAX_RETRIES ]; then
    echo "Max retries ($MAX_RETRIES) reached. Exiting."
    exit 1
  fi
  echo "Database not ready, retrying... ($RETRY_COUNT/$MAX_RETRIES)"
  sleep 2
done

echo "Database ready!"
echo "Running migrations..."

php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force  # ⬅️ AJOUT : Exécute les seeders

echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting application..."

php artisan serve --host=0.0.0.0 --port=$PORT