FROM php:7.1-fpm
COPY php.ini /usr/local/etc/php/

# install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
&& apt-get install -y libpq-dev \
&& docker-php-ext-install pdo_mysql pdo_pgsql

WORKDIR /var/www
