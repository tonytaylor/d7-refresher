
FROM drupal:7.65-apache

RUN apt-get update && apt-get install -y \
    curl \
    git \
    mysql-client \
    vim \
    wget

RUN php -r \
    "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    php -r "unlink('composer-setup.php');"

RUN rm -rf /var/www/html

COPY apache-drupal.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /buddy/d7-refresh