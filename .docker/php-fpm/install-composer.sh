#!/bin/bash

export COMPOSER_ALLOW_SUPERUSER=1

php -r "copy('https://getcomposer.org/installer', '/tmp/composer-setup.php');"
php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer --version=1.5.0
composer --version
