FROM php:8.1.4-fpm

RUN apt-get update -y && apt-get install -y openssl curl zip unzip git

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app
RUN composer install

# Run Laravel commands
RUN php artisan optimize:clear

CMD php artisan serve --host=0.0.0.0 --port=8181

EXPOSE 8181
