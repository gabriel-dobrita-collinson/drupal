#!/usr/bin/env bash

while ! mysqladmin ping -h"${DRUPAL_DB_HOST}" -u"${DRUPAL_DB_USER}" -p"${DRUPAL_DB_PASSWORD}" -P"3306" --silent; do
  >&2 echo "Waiting for MySQL database..."
  sleep 10
done

echo "MySQL is available"

COMPOSER_MEMORY_LIMIT=-1 composer install -n

if [[ "${INSTALL_FLAG}" == "ON" ]]; then
  echo "Starting fresh install..."
  drush site-install -y standard --db-url=mysql://${DRUPAL_DB_USER}:${DRUPAL_DB_PASSWORD}@${DRUPAL_DB_HOST}/${DRUPAL_DB_NAME} --site-name=Drupal --account-name=admin --account-pass=admin --account-mail=dobritagabriel@gmail.com
else
  echo "Continuing from existing setup..."
  drush updb -y
  drush cr
  drush cim -y
fi

site_uuid=$(drush cget system.site uuid)
config_uuid=$(grep uuid /opt/drupal/web/config/sync/system.site.yml)
if [[ "$site_uuid" != "$config_uuid" ]]; then
  echo "Setting correct site UUID..."
  drush cset system.site uuid $config_uuid -y
fi

drush cache-rebuild

echo "Setup complete."
