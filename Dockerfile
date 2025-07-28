# Stage 1: Build assets using Node
FROM node:18-alpine as build

WORKDIR /var/www

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# Stage 2: Laravel + PHP-FPM
FROM php:8.2-fpm

# Set working dir
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app source
COPY . .

# Copy built assets from Node stage
COPY --from=build /var/www/public/build /var/www/public/build

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache

# Expose port (Render looks for port 10000)
EXPOSE 10000

# Start Laravel server (production use only temporarily)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
