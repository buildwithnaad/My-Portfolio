# --- First Stage: Node Build ---
FROM node:18-alpine as node

WORKDIR /var/www

# Copy Laravel project files
COPY . .

# Install JS dependencies & build assets
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
    libfreetype6-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy only necessary folders from Node stage
COPY --from=node /var/www /var/www

# ✅ FIX: Ensure public/build assets are kept
COPY --from=node /var/www/public/build /var/www/public/build

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set permissions
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
