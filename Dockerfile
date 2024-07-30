FROM php:8.0-fpm

# Install necessary packages and PHP extensions
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install pdo pdo_pgsql pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy custom PHP configurations
COPY php/php.ini /usr/local/etc/php/php.ini
COPY php/docker.conf /usr/local/etc/php-fpm.d/docker.conf

# Copy application files and set permissions
COPY --chown=www-data:www-data . /var/www

# Set permissions for necessary directories
RUN chmod -R 775 /var/www/storage && \
    chmod -R 775 /var/www/bootstrap/cache && \
    chmod -R 775 /var/www/public/DataExcel

# Set ownership for necessary directories
RUN chown -R www-data:www-data /var/www/storage && \
    chown -R www-data:www-data /var/www/bootstrap/cache && \
    chown -R www-data:www-data /var/www/public/DataExcel

WORKDIR /var/www
