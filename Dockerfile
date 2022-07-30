#Base Image
FROM php:7.3-apache

#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/


WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . .

EXPOSE 80