# Build frontend assets
FROM node:10 as frontend
WORKDIR app/
COPY /web/app/themes/qol/package.json /web/app/themes/qol/package-lock.json /app/

RUN npm install

COPY /web/app/themes/qol/resources/assets /app/resources/assets
RUN npm run build

# Build backend source
FROM composer as backend

WORKDIR /app

COPY composer.json composer.lock /app/
COPY web/app/themes/qol/composer.json web/app/themes/qol/composer.lock /app/web/app/themes/qol/

RUN composer install  \
    -d /app/ \
    --ignore-platform-reqs \
    --no-ansi \
    --no-dev \
    --no-interaction \
    --no-scripts
# Theme composer
RUN composer install  \
    -d /app/web/app/themes/qol/ \
    --ignore-platform-reqs \
    --no-ansi \
    --no-dev \
    --no-interaction \
    --no-scripts

WORKDIR /app
COPY . /app/

# Build app image
FROM php:7.1-apache-stretch as app
LABEL maintainer="We Are Flip <https://github.com/weareflip>"

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libmagickwand-dev \
    imagemagick \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install \
    gd \
    mbstring \
    opcache \
    mysqli \
    pdo_mysql \
  && pecl install imagick \
  && docker-php-ext-enable imagick

RUN a2enmod rewrite

ADD .docker/build/apache.conf /etc/apache2/sites-available/000-default.conf
ADD .docker/build/php.ini ${PHP_INI_DIR}/conf.d/99-overrides.ini

WORKDIR /app
COPY --from=backend /app /app
COPY --from=frontend /app/dist /app/web/app/themes/qol/dist

RUN chown -Rf www-data:www-data /app/web/app/uploads && chmod -R ug+rwx /app/web/app/uploads
