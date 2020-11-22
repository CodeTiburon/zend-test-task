FROM php:7.1-fpm

ENV CORE_EXTENSIONS='calendar zip opcache xsl sockets exif intl gettext gd pdo pdo_pgsql pgsql bcmath'
ENV PECL_EXTENSIONS="igbinary"
ENV GraphicsMagick="gmagick-2.0.5RC1"

MAINTAINER Haydar KÜLEKCİ <haydarkulekci@gmail.com>

ADD ./zf2-boilerplate.ini /usr/local/etc/php/conf.d
ADD ./zf2-boilerplate.pool.conf /usr/local/etc/php-fpm.d/

RUN mkdir -p /usr/share/man/man1 && mkdir -p /usr/share/man/man7 \
    && apt-get update \
    && apt-get install -y \
        libpq-dev \
        curl \
        libjpeg-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        git \
        zip \
        unzip \
        wget \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxslt1-dev \
        libmagickwand-dev \
        locales \
        git \
        libpq-dev \
        postgresql-client \
        libfcgi0ldbl \
        libgraphicsmagick1-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install $CORE_EXTENSIONS \
    && docker-php-ext-enable $CORE_EXTENSIONS \
    && pecl install $PECL_EXTENSIONS \
    && echo '' | pecl install $GraphicsMagick \
    && docker-php-ext-enable gmagick \
    && docker-php-ext-enable $PECL_EXTENSIONS \
    && rm -rf /tmp/* /var/lib/apt/lists/* \
    && git clone https://github.com/vishnubob/wait-for-it.git /wait-for-it \
    && chmod +x /usr/local/bin/* \
    && touch /etc/timezone \
    && echo "UTC" > /etc/timezone \
    && ln -s -f -b /usr/share/zoneinfo/UTC /etc/localtime \
    && locale-gen en_US.UTF-8 \
    && sed -i '/access.log/d' /usr/local/etc/php-fpm.d/docker.conf

# install mcrypt library
RUN docker-php-ext-install mcrypt

RUN docker-php-ext-install mcrypt

# configure gd library
RUN docker-php-ext-configure gd \
    --enable-gd-native-ttf \
    --with-jpeg-dir=/usr/lib \
    --with-freetype-dir=/usr/include/freetype2

# Install extensions using the helper script provided by the base image
RUN docker-php-ext-install \
    pdo_mysql \
    gd

# Install xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install APCu and APC backward compatibility
RUN pecl install apcu \
    && pecl install apcu_bc-1.0.3 \
    && docker-php-ext-enable apcu --ini-name 10-docker-php-ext-apcu.ini \
    && docker-php-ext-enable apc --ini-name 20-docker-php-ext-apc.ini

RUN usermod -u 1000 www-data

COPY ./*.sh /tmp/scripts/

RUN chmod +x /tmp/scripts/*.sh \
    && cp /tmp/scripts/*.sh /usr/local/bin/ \
    && rm -rf /tmp/scripts;

RUN install-composer.sh

WORKDIR /var/www/zf2-boilerplate

CMD ["on-start.sh"]

EXPOSE 9000
