FROM matheusbloise/php:8.2-fpm-alpine-dev AS development

RUN docker-php-ext-install pdo_mysql
