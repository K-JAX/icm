FROM drupal:8.9.14-apache

# Replacing the existing drush since it seems to be causing problems right now.
RUN rm -rf /usr/local/bin/drush
RUN composer global require drush/drush
RUN ln -s /root/.composer/vendor/bin/drush /usr/local/bin
RUN drush --version