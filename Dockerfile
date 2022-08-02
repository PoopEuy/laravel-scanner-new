FROM php:8.0-fpm

RUN apt-get update

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Install composer 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# php.conf php-fpm.conf
COPY php/php.ini /usr/local/etc/php/php.ini
COPY php/docker.conf /usr/local/etc/php-fpm.d/docker.conf

COPY --chown=www-data:www-data . /var/www  
#RUN chown -R www-data:www-data /var/www
#RUN chmod -R 777 /var/www/storage
RUN chmod -R 777 /var/www/storage
#RUN chmod -R 755 /var/www/storage/logs
#RUN chmod -R 755 /var/www/storage/logs/laravel.log


WORKDIR /var/www
