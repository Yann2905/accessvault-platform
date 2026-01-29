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

# ⚠️ IMPORTANT: Configurer PHP-FPM pour écouter sur TCP au lieu d'un socket Unix
RUN sed -i 's|listen = /run/php/php8.2-fpm.sock|listen = 127.0.0.1:9000|g' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|;listen.owner = www-data|listen.owner = www-data|g' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's|;listen.group = www-data|listen.group = www-data|g' /usr/local/etc/php-fpm.d/www.conf

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
    && chmod -R 775 /app/storage /app/bootstrap/cache \
    && mkdir -p /var/log/supervisor /run/php \
    && chown -R www-data:www-data /var/log/supervisor

# Copier le script de démarrage
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

# Exposer le port web (10000 pour Render)
EXPOSE 10000

# Lancer le script de démarrage
CMD ["/start.sh"]