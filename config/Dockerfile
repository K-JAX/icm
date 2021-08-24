FROM drupal:9.2.0-apache

# I need mysqli extension installed to backup the database
RUN docker-php-ext-install mysqli && apachectl restart

# # setup openssh-server for sftp
# RUN apt-get update && apt-get install -y openssh-server
# RUN mkdir /var/run/sshd
# RUN echo 'root:WRITECUSTOMPASSWORDHERE' | chpasswd
# RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# # SSH & Keeping Session Alive 
# RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd

# ENV NOTVISIBLE "in users profile"
# RUN echo "export VISIBLE=now" >> /etc/profile

# EXPOSE 22
# CMD ["/usr/sbin/sshd", "-D"]

# Installing git if possible
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

RUN apt-get install -y vim

RUN apt-get install -y ghostscript

RUN apt-get update && apt-get install -y \
    libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
	&& docker-php-ext-enable imagick


# # Replacing the existing drush since it seems to be causing problems right now.
# RUN rm -rf /usr/local/bin/drush
# RUN composer global require drush/drush
# RUN ln -s /root/.composer/vendor/bin/drush /usr/local/bin
# RUN drush --version
RUN composer require drush/drush

# Let's try instally drupal console using composer
# RUN require drupal/console:~1.0 --prefer-dist --optimize-autoloader -W

RUN composer require drupal/devel
RUN composer require kint-php/kint
RUN composer require spatie/pdf-to-image