# --- First Stage: Node Build ---
FROM node:18-alpine as node

WORKDIR /var/www

# Copy all project files
COPY . .

# Install JS dependencies & build Vite assets
RUN npm install && npm run build

# --- Final Stage: PHP + Composer ---
FROM php:8.2-fpm

WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    gnupg2

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy all Laravel files from build stage
COPY --from=node /var/www /var/www

# ✅ Include public/build (Vite assets)
COPY --from=node /var/www/public/build /var/www/public/build

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set correct permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port and serve
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
