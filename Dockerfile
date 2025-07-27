FROM php:8.3-cli

WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    npm \
    nodejs \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . /var/www

# Permissions
RUN chown -R www-data:www-data /var/www

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Build frontend
RUN npm install && npm run build

# Move to public dir
WORKDIR /var/www/public

# Expose port
EXPOSE 8080

# Start server
CMD php /var/www/artisan serve --host=0.0.0.0 --port=8080 > /dev/stdout 2>&1
php artisan serve --host=0.0.0.0 --port=8080
