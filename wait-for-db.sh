#!/bin/sh

# Attendre la DB
until php artisan migrate:status > /dev/null 2>&1; do
  echo "Waiting for database..."
  sleep 2
done

# Migrer et seed (optionnel)
php artisan migrate --force
php artisan db:seed --class=ProjectSeeder --force

# Lancer Laravel sur le port Railway
php artisan serve --host=0.0.0.0 --port=$PORT
