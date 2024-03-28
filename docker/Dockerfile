FROM php:8.1.11RC1-fpm-alpine

RUN set -ex \
	&& apk add --update --no-cache \
	postgresql-dev \
	git zlib-dev freetype \
	libpng libjpeg-turbo freetype-dev \
	libpng-dev libjpeg-turbo-dev libwebp-dev \
	libzip-dev zip \
	&& docker-php-ext-configure gd \
	--with-freetype \
	--with-jpeg \
	--with-webp        

RUN docker-php-ext-install pdo_pgsql sockets gd zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/app
COPY . .

RUN mkdir -p /var/www/app/vendor

RUN chown www-data:www-data -R public/ storage/ bootstrap/ vendor/