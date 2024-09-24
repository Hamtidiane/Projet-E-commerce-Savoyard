# Utiliser une image de base PHP
FROM php:8.2-fpm

# Installer des dépendances
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    unzip \
    git \
    curl

# Installer les extensions PHP requises
RUN docker-php-ext-install pdo pdo_mysql zip gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier les fichiers de l'application Laravel
WORKDIR /var/www/html
COPY . .

# Installer les dépendances Composer
RUN composer install --prefer-dist --no-scripts --no-dev --optimize-autoloader

# Configurer Nginx
COPY nginx/default.conf /etc/nginx/conf.d/

# Exposer le port 80
EXPOSE 80

# Lancer PHP-FPM et Nginx
CMD service nginx start && php-fpm
