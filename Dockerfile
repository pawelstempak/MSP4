FROM php:8.1-apache
WORKDIR /var/www/html
RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql