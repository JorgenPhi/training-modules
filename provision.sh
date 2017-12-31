#!/bin/bash
php artisan key:generate
php artisan migrate
php artisan config:cache
php artisan route:cache