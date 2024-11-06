FROM php:8.2-fpm-alpine

SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]
# tinker(psysh)
ARG PSYSH_DIR=/usr/local/share/psysh
ARG PSYSH_PHP_MANUAL=$PSYSH_DIR/php_manual.sqlite
ARG PHP_MANUAL_URL=http://psysh.org/manual/ja/php_manual.sqlite

# timezone
ARG TZ

# composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN apk update
RUN apk add --update --no-cache --virtual=.build-dependencies \
    autoconf \
    gcc \
    g++ \
    make \
    tzdata \
    git
RUN apk add libpng libpng-dev libjpeg-turbo-dev libwebp-dev zlib-dev libxpm-dev gd
RUN apk add --update --no-cache \
    icu-dev \
    libzip-dev \
    oniguruma-dev
RUN  git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis && \
     apk del .build-dependencies && \
    docker-php-ext-install intl pdo_mysql mbstring zip bcmath redis gd && \
    mkdir $PSYSH_DIR && curl $PHP_MANUAL_URL -o $PSYSH_PHP_MANUAL
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer