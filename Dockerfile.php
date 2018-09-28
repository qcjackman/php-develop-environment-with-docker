FROM php:7.2-fpm
    # Run echo "nameserver 8.8.8.8" >> /etc/resolv.conf \
    # && echo "nameserver 114.114.114.114" >> /etc/resolve.conf \
    # && apt-get update \
    Run apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        supervisor \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install mysqli pdo_mysql \
    && pecl install swoole \
    && pecl install redis \
    && docker-php-ext-enable swoole redis
