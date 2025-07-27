FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev \
    npm nginx supervisor

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . /var/www

# Set permissions
RUN chown -R www-data:www-data /var/www

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Build frontend assets
RUN npm install && npm run build

# Copy nginx and supervisor config
COPY deploy/render/nginx.conf /etc/nginx/sites-available/default
COPY deploy/render/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose web port
EXPOSE 80

CMD ["/usr/bin/supervisord"]
