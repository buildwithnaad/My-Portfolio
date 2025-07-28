FROM php:8.2

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip libpng-dev libonig-dev npm nodejs \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install and build frontend assets
RUN npm install && npm run build

# Set permissions (optional)
RUN chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Expose port
EXPOSE 10000

# Start Laravel server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
