FROM php:8.1.8-fpm-alpine3.16

RUN apk add --update \
		$PHPIZE_DEPS \
        nano \
		freetype-dev \
		libjpeg-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-jpeg --with-freetype \
	&& docker-php-ext-install gd
