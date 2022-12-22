FROM php:7.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:1.10.26 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www