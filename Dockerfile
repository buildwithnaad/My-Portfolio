# Stage 1: Build assets using Node + Vite
FROM node:18-alpine as build

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . ./
RUN npm run build

# Stage 2: PHP + Laravel + Composer
FROM php:8.2-fpm

WORKDIR /app

# Install required packages
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy all Laravel files
COPY . .

# ✅ Copy Vite build assets from first stage
COPY --from=build /app/public/build/assets /app/public/build/assets
COPY --from=build /app/resources /app/resources

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Permissions
RUN chmod -R 775 storage bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 10000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
