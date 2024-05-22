# Stage 1: Use Composer official image to install dependencies
FROM composer:latest AS composer

# Set the working directory inside the container
WORKDIR /app

# Copy the composer.json file to the working directory
COPY ./composer.json ./

# Explicitly require fakerphp/faker and phpmailer/phpmailer packages without updating dependencies
RUN composer require fakerphp/faker phpmailer/phpmailer --no-update

# Install all Composer dependencies ignoring platform requirements
RUN composer install --ignore-platform-reqs

# Stage 2: Use the PHP 8.2 with Apache image
FROM php:8.2-apache

# Update package lists and install required packages and PHP extensions
RUN apt-get update && apt-get install -y \
        libpq-dev \                  # PostgreSQL library for pgsql extension
        libjpeg-dev \                # JPEG library for gd extension
        libpng-dev \                 # PNG library for gd extension
        libgif-dev \                 # GIF library for gd extension
        libfreetype6-dev && \        # FreeType library for gd extension
    docker-php-ext-configure gd --with-jpeg --with-freetype && \  # Configure gd extension with JPEG and FreeType support
    docker-php-ext-install gd pgsql pdo pdo_pgsql && \            # Install gd, pgsql, pdo, and pdo_pgsql extensions
    pecl install xdebug && \                                      # Install Xdebug via PECL
    docker-php-ext-enable xdebug                                  # Enable Xdebug extension

# Configure Xdebug settings
RUN echo "zend_extension=xdebug.so" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.client_port=9003" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/php.ini

# Set the working directory for the Apache server
WORKDIR /var/www/html

# Copy the Composer dependencies from the Composer image to the current working directory
COPY --from=composer /app/vendor /var/www/html/vendor

# Expose port 80 for the Apache server
EXPOSE 80
