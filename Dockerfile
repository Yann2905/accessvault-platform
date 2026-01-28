# Utiliser PHP-FPM 8.2 officiel
FROM php:8.2-fpm

# Installer dépendances système + PostgreSQL dev pour pdo_pgsql + outils utiles
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /app

# Copier le projet
COPY . /app

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copier la config Nginx et Supervisord
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Permissions Laravel
RUN chown -R www-data:www-data /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Exposer le port web
EXPOSE 80

# Lancer supervisord qui gère PHP-FPM + Nginx
CMD ["/usr/bin/supervisord", "-n"]
