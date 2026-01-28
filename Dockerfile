FROM php:8.2-apache

# IMPORTANT : Désactiver les MPM qui causent des conflits
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true && a2enmod rewrite


# Installer les extensions PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Répertoire de travail
WORKDIR /app

# Copier les fichiers
COPY . /app

# Installer les dépendances
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configurer Apache pour Laravel
RUN sed -i 's!/var/www/html!/app/public!g' /etc/apache2/sites-available/000-default.conf

# Configuration Apache pour Laravel
RUN echo '<Directory /app/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/sites-available/000-default.conf

# Permissions
RUN chown -R www-data:www-data /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Script de démarrage
COPY docker-start.sh /docker-start.sh
RUN chmod +x /docker-start.sh

EXPOSE 80

CMD ["/docker-start.sh"]