FROM php:5.6-apache

# Environments
ENV TIMEZONE            America/Sao_Paulo

##### INSTALL DEPENDENCIES #####
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

##### CONFIGURATIONS #####
#### System ####
COPY config/php.ini /usr/local/etc/php/

RUN a2enmod headers actions rewrite expires deflate
RUN cp /usr/share/zoneinfo/${TIMEZONE} /etc/localtime
RUN echo "${TIMEZONE}" > /etc/timezone
