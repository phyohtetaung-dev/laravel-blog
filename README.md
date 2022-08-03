# Laravel Blog (WIP)

A static website which components are controlled from an admin site.

## Requirements
**php >= 8.1**

## Installation
```
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
```

## Config Env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

## Migrate DB
```
php artisan migrate --seed
```


## Packages

-   https://github.com/laravel/pint
-   https://image.intervention.io/v2
