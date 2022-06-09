FROM composer:2.2.13 AS composer

FROM php:8.1.6-fpm

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN ["apt-get", "update"]
RUN ["apt-get", "install", "-y", "zip"]
RUN ["apt-get", "install", "-y", "unzip"]

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli
RUN pecl install xdebug && docker-php-ext-enable xdebug

WORKDIR /var/www

CMD ["php-fpm"]

