#!/usr/bin/env bash

while ! mysqladmin ping -h"${DRUPAL_DB_HOST}" -u"${DRUPAL_DB_USER}" -p"${DRUPAL_DB_PASSWORD}" -P"3306" --silent; do
  >&2 echo "Waiting for MySQL database..."
  sleep 10
done

if [ "${INSTALL_FLAG}" = "ON" ]; then
  echo "Starting fresh install..."
  drush site-install standard --db-url=mysql://${DRUPAL_DB_USER}:${DRUPAL_DB_PASSWORD}@${DRUPAL_DB_HOST}/${DRUPAL_DB_NAME} -y

  drush ev 'if (\Drupal::entityTypeManager()->getStorage("shortcut")) {\Drupal::entityTypeManager()->getStorage("shortcut")->delete(\Drupal::entityTypeManager()->getStorage("shortcut")->loadMultiple());}'
  drush ev 'if (\Drupal::entityTypeManager()->getStorage("shortcut_set")) {\Drupal::entityTypeManager()->getStorage("shortcut_set")->delete(\Drupal::entityTypeManager()->getStorage("shortcut_set")->loadMultiple());}'

  site_uuid=$(drush cget system.site uuid --value-only)
  config_uuid=$(grep uuid /opt/drupal/web/config/sync/system.site.yml | awk '{print $2}')

  if [ "$site_uuid" != "$config_uuid" ]; then
    echo "Setting correct site UUID..."
    drush cset system.site uuid $config_uuid -y
  fi

  drush config-import -y
  echo "Fresh installation complete."
else
  echo "Continuing from existing setup..."
  drush updatedb -y

  site_uuid=$(drush cget system.site uuid --value-only)
  config_uuid=$(grep uuid /opt/drupal/web/config/sync/system.site.yml | awk '{print $2}')

  if [ "$site_uuid" != "$config_uuid" ]; then
    echo "Setting correct site UUID..."
    drush cset system.site uuid $config_uuid -y
  fi

  drush ev 'if (\Drupal::entityTypeManager()->getStorage("shortcut")) {\Drupal::entityTypeManager()->getStorage("shortcut")->delete(\Drupal::entityTypeManager()->getStorage("shortcut")->loadMultiple());}'
  drush ev 'if (\Drupal::entityTypeManager()->getStorage("shortcut_set")) {\Drupal::entityTypeManager()->getStorage("shortcut_set")->delete(\Drupal::entityTypeManager()->getStorage("shortcut_set")->loadMultiple());}'

  drush config-import -y
  echo "Update complete."
fi
