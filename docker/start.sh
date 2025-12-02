#!/bin/bash

# Installs dependencies, if any are missing.
composer install

# copy .env if not exists
if [ ! -f .env ]; then
    cp .env.example .env
fi

# create APP_KEY if not exists
php artisan key:generate --force

# run migrations e seed
php artisan migrate --force
php artisan db:seed --force

# start PHP-FPM
php-fpm