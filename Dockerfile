FROM php:8.2-fpm

# Variables d'environnement
ENV DEBIAN_FRONTEND=noninteractive
ENV PORT=10000

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    gettext-base \
    && docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configurer PHP-FPM pour écouter sur TCP
RUN sed -i 's|listen = /run/php/php8.2-fpm.sock|listen = 127.0.0.1:9000|g' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|;listen.owner = www-data|listen.owner = www-data|g' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|;listen.group = www-data|listen.group = www-data|g' /usr/local/etc/php-fpm.d/www.conf

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Créer les dossiers nécessaires
RUN mkdir -p \
    /app/storage/app/public/avatars \
    /app/storage/framework/cache \
    /app/storage/framework/sessions \
    /app/storage/framework/views \
    /app/storage/logs \
    /app/bootstrap/cache \
    /app/public/storage \
    /var/log/nginx \
    /var/log/supervisor \
    /var/log/php-fpm \
    /run/php

# Créer le lien symbolique pour le storage
RUN php artisan storage:link --force || true

# Définir les permissions
RUN chown -R www-data:www-data \
    /app/storage \
    /app/bootstrap/cache \
    /app/public/storage \
    /var/log/supervisor \
    && chmod -R 775 \
    /app/storage \
    /app/bootstrap/cache \
    /app/public/storage

# Copier les fichiers de configuration
COPY docker/nginx.conf.template /etc/nginx/nginx.conf.template
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

# Exposer le port
EXPOSE ${PORT}

# Démarrer l'application
CMD ["/start.sh"]