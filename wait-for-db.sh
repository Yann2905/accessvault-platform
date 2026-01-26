#!/bin/sh

echo "Waiting for database to be ready..."

# Attendre que le port MySQL soit ouvert
while ! nc -z $DB_HOST $DB_PORT; do
  sleep 2
done

echo "Database is ready!"

# Lancer les migrations
php artisan migrate --force

# Seed uniquement si tu as un seeder
# php artisan db:seed --force

# Lancer Laravel
php artisan serve --host=0.0.0.0 --port=$PORT
