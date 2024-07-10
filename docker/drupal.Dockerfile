FROM drupal:latest

RUN apt-get update && apt-get install -y curl libzip-dev unzip zip default-mysql-client cron vim

ENV COMPOSER_HOME /composer

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install zip

RUN mkdir -p /var/www/scripts

COPY scripts/boot_drupal.sh /var/www/scripts/boot_drupal.sh
COPY final_backup.sql /var/www/scripts/final_backup.sql

RUN chmod +x /var/www/scripts/boot_drupal.sh

WORKDIR /opt/drupal

CMD ["apache2-foreground"]
