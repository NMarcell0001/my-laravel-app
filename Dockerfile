FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql zip bcmath xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js 18.x and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV NODE_ENV=production
ENV COMPOSER_ALLOW_SUPERUSER=1

# Update Apache configs for new DocumentRoot
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf \
    && sed -ri -e "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

# Copy Composer binary from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app files early to run composer & npm commands
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

RUN npm install \
 && ls -la node_modules/.bin \
 && ./node_modules/.bin/vite --version \
 && npm run build

# Cache Laravel config/routes/views
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Fix permissions for storage and bootstrap cache
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
