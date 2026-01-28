FROM php:8.2-fpm

# Installer dépendances système + PostgreSQL dev pour pdo_pgsql
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
    libpq-dev \   # <- indispensable pour PostgreSQL
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copier le projet
COPY . /app

# Installer dépendances Laravel
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copier config Nginx & supervisord
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Permissions
RUN chown -R www-data:www-data /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache

EXPOSE 80

CMD ["/usr/bin/supervisord"]
