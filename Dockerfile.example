# Use the official PHP image with Apache
FROM php:8.2-apache

# Set build-time argument
ARG APP_ENV=local
ARG APP_DEBUG=true

# Use the argument in your build process
ENV APP_ENV=${APP_ENV}
ENV APP_DEBUG=${APP_DEBUG}

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www/html

# Set permissions for application files
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy Apache configuration
COPY ./docker/apache/conf/${APP_ENV}/000-default.conf /etc/apache2/sites-available/000-default.conf

#SSL Setup
RUN a2enmod ssl
COPY ./docker/apache/conf/${APP_ENV}/000-default-ssl.conf /etc/apache2/sites-available/000-default-ssl.conf
RUN a2ensite 000-default-ssl.conf

# Expose port 80 (Apache default)
EXPOSE 80

# Run Apache in the foreground
CMD ["apache2-foreground"]
