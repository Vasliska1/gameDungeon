FROM php:7.3-apache

#Install git and MySQL extensions for PHP

RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite

RUN mkdir -p /var/www/html/testVkontakte
COPY ./ /var/www/html/testVkontakte
EXPOSE 80/tcp
EXPOSE 443/tcp