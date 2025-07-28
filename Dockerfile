# Base image
FROM node:18-alpine AS build

# Set working directory
WORKDIR /app

# Copy package files and install deps
COPY package*.json ./
RUN npm install

# Copy remaining files
COPY . .

# Build assets (like Tailwind etc)
RUN npm run build

# --- Laravel layer ---
FROM php:8.2-fpm-alpine

# Set working dir
WORKDIR /var/www

# Install system deps
RUN apk add --no-cache \
    libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Copy Laravel app files
COPY --from=build /app /var/www

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Expose port
EXPOSE 9000

CMD ["php-fpm"]
