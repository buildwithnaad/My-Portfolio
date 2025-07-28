# --- First Stage: Node Build ---
FROM node:18-bullseye as node

# Set working directory
WORKDIR /var/www

# Copy only package files for better cache
COPY package*.json ./

# Install Node dependencies
RUN npm install

# Copy all project files
COPY . .

# Convert Windows line endings to Unix (optional but safer)
RUN apt-get update && apt-get install -y dos2unix && \
    find . -type f -exec dos2unix {} \;

# Build Vite assets
RUN npm run build

# --- Final Stage: PHP + Composer ---
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    gnupg2

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel files from build stage
COPY --from=node /var/www /var/www

# ✅ Copy only built assets from Vite (public/build folder)
COPY --from=node /var/www/public/build /var/www/public/build

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Set correct permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Expose port
EXPOSE 8000

# Run Laravel development  server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
