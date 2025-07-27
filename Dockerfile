FROM php:8.2-fpm

# Node.js install
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get update && apt-get install -y nodejs

# Install system deps
RUN apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set workdir
WORKDIR /var/www

# Copy app
COPY . .

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader

# Install JS deps and build
RUN npm install && npm run build

# Set permissions
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
