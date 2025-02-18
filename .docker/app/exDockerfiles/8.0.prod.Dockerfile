FROM php:8.0-fpm

ENV TZ Asia/Tokyo
ENV COMPOSER_ALLOW_SUPERUSER 1

# install Lib
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - && \
  apt-get update -qq && \
  apt-get install --no-install-recommends -y libpq-dev libonig-dev libxml2-dev nodejs git zip unzip && \
  apt-get install --no-install-recommends -y zlib1g-dev libfreetype6-dev libpng-dev libjpeg62-turbo-dev libwebp-dev libxpm-dev && \
  apt-get clean && \
  rm -rf /var/cache/apt && \
  npm install npm@latest -g
# add extension
RUN docker-php-ext-install mbstring pdo pdo_pgsql && \
  docker-php-ext-enable mbstring  && \
  apt-get install -y wget git unzip libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
  docker-php-ext-configure gd --with-freetype --with-jpeg && \
  docker-php-ext-install -j$(nproc) gd
COPY .docker/app/conf/php.ini /usr/local/etc/php/php.ini
COPY .docker/app/conf/docker.conf /usr/local/etc/php-fpm.d/docker.conf

# install Composer
RUN curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer && \
  chmod +x /usr/local/bin/composer

COPY --chown=www-data:www-data ./ /app

WORKDIR /app

# Composer & npm install
RUN php -d memory_limit=-1 /usr/local/bin/composer install && \
  npm install && \
  npm run production

# Cache削除
RUN sh clear-cache-prod.sh

VOLUME /app
