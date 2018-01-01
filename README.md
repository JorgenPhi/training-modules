## Module Based Training

Training employees on a new product can be hard, especially if you never directly work with them. Larger companies use tools like Litmos  or software provided by the product vendor, but these can be prohibitively expensive, especially for small businesses that need to train potentially hundreds of purchaser employees on their new product. That is why I have taken the next few weeks to build out a simple LMS with essential features for small business vendors.

## Features

- Simple module and quiz creation
- Custom passing percentage
- Optional - Require users to be manually approved
- Responsive - Looks great on multiple devices

## Installation

# Locally (recommended)

This assumes you have PHP, composer, a database (MySQL recommened), and a webserver installed.

```cd /var/www
git clone https://github.com/JorgenPhi/training-modules
cd training-modules
composer dump-autoload --optimize
composer install 
php artisan optimize
php artisan route:cache
cp .env.example .env
php artisan key:generate```
Edit .env with the database credentials, name, url, and other settings 
```php artisan config:cache
chgrp -R www-data storage bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache
php artisan migrate```

Now configure your webserver to serve the `/var/www/training-modules/public` directory.

Login, the default admin username and password is `test@localhost.net` / `secret`. Be sure to change this.


