FROM php:8.2-apache

# Extensions PHP
RUN docker-php-ext-install pdo pdo_mysql

# Activer mod_rewrite pour Laravel
RUN a2enmod rewrite

# Copier le projet
COPY . /var/www/html

WORKDIR /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Droits
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Variables d’environnement par défaut
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
