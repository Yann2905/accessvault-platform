#!/bin/sh

echo "Waiting for database..."

until php -r "
try {
    new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD')
    );
    exit(0);
} catch (Exception \$e) {
    exit(1);
}
"; do
  echo "Database not ready, retrying..."
  sleep 2
done

echo "Database ready!"

php artisan migrate --force

php artisan serve --host=0.0.0.0 --port=$PORT
