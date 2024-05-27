# Stage 1: Use Composer official image to install dependencies
FROM composer:latest AS composer

# Set the working directory inside the container
WORKDIR /app

# Copy the composer.json file to the working directory
COPY ./composer.json ./

# Install all Composer dependencies ignoring platform requirements
RUN composer install --ignore-platform-reqs

# Stage 2: Use the PHP 8.2 with Apache image
FROM php:8.2-apache

# Update package lists and install required packages and PHP extensions
# pgsql: Adds support for PostgreSQL database functions.
# pdo: Provides a data access abstraction layer for PHP applications.
# pdo_pgsql: Adds PostgreSQL driver support to PDO for accessing PostgreSQL databases.
RUN apt-get update && apt-get install -y \
    libpq-dev && \
    docker-php-ext-install pgsql pdo pdo_pgsql && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

# Configure Xdebug settings
RUN echo "zend_extension=xdebug.so" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.client_port=9003" >> /usr/local/etc/php/php.ini && \
    echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/php.ini

# Set the working directory for the Apache server
WORKDIR /var/www/html

# Copy the Composer dependencies from the Composer image to the current working directory
COPY --from=composer /app/vendor /var/www/html/vendor

# Expose port 80 for the Apache server
EXPOSE 80