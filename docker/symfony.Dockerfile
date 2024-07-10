FROM php:8.2-cli

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt-get update && apt-get install -y curl wget symfony-cli libicu-dev g++ libzip-dev zip unzip libssl-dev

ENV COMPOSER_HOME /composer

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure intl && docker-php-ext-install opcache intl mysqli pdo pdo_mysql zip && docker-php-ext-enable pdo_mysql

RUN pecl install xdebug

COPY php/extensions.ini /usr/local/etc/php/conf.d/extensions.ini
COPY php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini


RUN mkdir -p /var/www/keys/config/jwt &&  \
    mkdir -p /var/www/scripts

COPY keys/jwt_authenticator/private.pem /var/www/keys/config/jwt/private.pem
COPY keys/jwt_authenticator/public.pem /var/www/keys/config/jwt/public.pem
COPY scripts/boot.sh /var/www/scripts/boot.sh

RUN chmod -R 0600 /var/www/keys/config/jwt  &&  \
    chmod +x /var/www/scripts/boot.sh

# Set the working directory
WORKDIR /var/www/html

# Expose port 8000 for Symfony server
EXPOSE 8000

# Start Symfony server
CMD ["symfony", "server:start", "--port=8000", "--no-tls"]