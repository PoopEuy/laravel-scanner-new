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

# Ensure directories exist before changing permissions
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache /var/www/public/DataExcel

RUN chmod -R 775 /var/www/storage
RUN chmod -R 775 /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/public/DataExcel
RUN chmod o+w /var/www/storage -R
RUN chmod o+w /var/www/public/DataExcel -R
RUN chown -R www-data:www-data /var/www/storage
RUN chown -R www-data:www-data /var/www/bootstrap/cache
RUN chown -R www-data:www-data /var/www/public/DataExcel

WORKDIR /var/www