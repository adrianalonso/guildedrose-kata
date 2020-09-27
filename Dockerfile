FROM php:7.4-cli

WORKDIR /var/www

COPY composer.lock composer.json /var/www/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
