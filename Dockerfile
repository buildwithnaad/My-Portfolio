# --- First Stage: Node Build ---
FROM node:18-bullseye as node

WORKDIR /var/www

# Copy only package files first for better caching
COPY package*.json ./

# Install build dependencies (required for vite + Tailwind)
RUN npm install

# Copy rest of the project files
COPY . .

# Build Vite assets
RUN npm run build

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
    libcurl4-openssl-dev \
    gnupg2

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel files from Node build
COPY --from=node /var/www /var/www

# ✅ Copy Vite build assets specifically (recommended)
COPY --from=node /var/www/public/build /var/www/public/build

# Install Laravel PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Set correct permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port and serve Laravel
EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
