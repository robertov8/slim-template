FROM php:5.6-apache

# Environments
ENV TIMEZONE            America/Sao_Paulo

##### INSTALL DEPENDENCIES #####
# System
RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get upgrade -y
RUN apt-get dist-upgrade -y
# PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Phpunit
RUN curl https://phar.phpunit.de/phpunit.phar -L -o phpunit.phar
RUN chmod +x phpunit.phar
RUN mv phpunit.phar /usr/local/bin/phpunit

# Apache
RUN a2enmod headers actions rewrite expires deflate
RUN cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime
RUN echo "${TIMEZONE}" > /etc/timezone

# System
RUN apt-get autoremove -y
RUN apt-get clean
RUN apt-get autoclean
