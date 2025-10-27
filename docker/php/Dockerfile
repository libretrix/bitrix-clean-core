FROM alpine:3.21.2

ENV PROJECT_PATH=/var/www/html

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk update && apk add \
        libgdiplus --repository=https://dl-cdn.alpinelinux.org/alpine/edge/testing/ --no-cache \
        patch \
        mc \
        htop \
        php84 \
        php84-apcu \
        php84-bcmath \
        php84-bz2 \
        php84-common \
        php84-ctype \
        php84-curl \
        php84-dom \
        php84-fpm \
        php84-gd \
        php84-gettext \
        php84-iconv \
        php84-intl \
        php84-mbstring \
        php84-opcache \
        php84-openssl \
        php84-pcntl \
        php84-pdo \
        php84-pdo_pgsql \
        php84-pdo_sqlite \
        php84-pecl-grpc \
        php84-pecl-protobuf \
        php84-pecl-rdkafka \
        php84-pecl-xdebug \
        php84-phar \
        php84-session \
        php84-simplexml \
        php84-soap \
        php84-sockets \
        php84-sodium \
        php84-tokenizer \
        php84-xml \
        php84-xmlwriter \
        php84-zip \
        php84-zlib

RUN ln -s /usr/bin/php84 /usr/bin/php
RUN rm -f /var/cache/apk/*

COPY php-fpm.conf /etc/php84/php-fpm.d/www.conf
RUN ln -s /usr/sbin/php-fpm84 /usr/sbin/php-fpm

ADD php.ini /etc/php84/conf.d/php.ini
ADD xdebug.ini /etc/php84/conf.d/xdebug.ini

ARG UNAME=www
ARG UID=1000
ARG GID=1000

RUN addgroup -g $GID -S $UNAME && adduser -u $UID -S -G $UNAME -s /bin/bash $UNAME

EXPOSE 9000

USER www

CMD ["php-fpm", "--nodaemonize"]