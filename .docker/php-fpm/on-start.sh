#!/bin/bash

composer install --profile --prefer-dist \
&& composer dump-autoload -o \
&& composer dump-autoload -a \
&& php-fpm
