#!/bin/bash
php artisan migrate
php artisan config:cache
php artisan route:cache