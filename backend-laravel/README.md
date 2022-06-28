# backend-laravel

### Install Composer
```
composer install
```
### Copy env.example to .env
```
cp .env.example .env
```
### Generate app key
```
php artisan key:generate
```
### Setup Database Connection

- DB_DATABASE=your database
- DB_USERNAME=your database username
- DB_PASSWORD=your database password

### Run Migration
```
php artisan migrate
```
### Run Database Seeder
```
php artisan db:seed
```
### Run Migration with Database Seeder
```
php artisan migrate:fresh --seed
```
### Run Migration with Database Seeder
```
php artisan migrate:fresh --seed
```
### Customize configuration
See [Configuration Reference](https://laravel.com/docs/9.x).
