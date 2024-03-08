FROM php:8.3-apache

# 必要なパッケージのインストールとPHP拡張機能の有効化
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
  && docker-php-ext-configure gd --with-jpeg \
  && docker-php-ext-install pdo_mysql mysqli gd

# php.iniとApacheの設定ファイルのコピー
COPY ./config/php/php.ini /usr/local/etc/php/
COPY ./config/apache2/apache2.conf /etc/apache2/
