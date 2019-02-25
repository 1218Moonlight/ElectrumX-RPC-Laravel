FROM php:7.2-fpm

# composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

# apt
RUN apt-get update
RUN apt-get install -y zlib1g-dev
RUN docker-php-ext-install zip

# laravel
RUN php composer.phar global require "laravel/installer"
RUN php composer.phar create-project --prefer-dist laravel/laravel /var/www/html/laravel

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install hash
RUN docker-php-ext-configure hash --with-mhash

#RUN chmod -R 777 /var/www/html
