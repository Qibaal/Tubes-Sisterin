FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libicu-dev \
    zip unzip && \
    docker-php-ext-install pdo pdo_pgsql intl

WORKDIR /var/www/html

COPY . /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p /var/www/html/writable /var/www/html/public/uploads && \
    chown -R www-data:www-data /var/www/html/writable /var/www/html/public/uploads

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
