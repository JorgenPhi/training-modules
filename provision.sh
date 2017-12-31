#!/bin/bash
composer install --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan migrate
php artisan key:generate