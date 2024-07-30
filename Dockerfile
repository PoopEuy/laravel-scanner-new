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
RUN chmod -R 775 ./storage
RUN chmod -R 775 ./bootstrap/cache
RUN chmod -R 775 ./public/DataExcel
RUN sudo chmod o+w ./storage/ -R
RUN sudo chmod o+w ./public/DataExcel/ -R
RUN sudo chown -R $USER:www-data storage
RUN sudo chown -R $USER:www-data bootstrap/cache
RUN sudo chown -R $USER:www-data public/DataExcel


WORKDIR /var/www
