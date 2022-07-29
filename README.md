# Timino

a REST-API server-side CMS written in PHP . which uses MySQL ( trough PDO )

- used pecee/simple-router as router
- used firebase/php-jwt as JWT encoder/decoder
- used rakit/validation as input validator

## Install

1. ```git clone https://github.com/hossein-taheri/Timino.git```
1. ```cd Timino```
1. ```cp .env.example .env```
1. Fix all config settings here ```vim .env```
1. ```composer install```
1. Run ```php manage.php migrate``` to migrate migrations
1. Run ```php -S 0.0.0.0:3000 index.php``` to serve app on localhost:3000

## Manage Project

You can also migrate migrations and create new controllers , middlewares , repositories and migrations using manage.php.

1. Run ```php manage.php help``` for more information about project manager
1. Run ```php manage.php migrate``` to migrate migrations using project manager

