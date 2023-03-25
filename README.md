# ASETT...

## Requirements
- `PHP Verson 8.1`
- `Laravel Version 10.0`


## Installation
- Install Apache & PHP, advisable installer - [XAMPP](https://apachefriends.org)
- Installer Composer, a dependency manager for PHP - Follow Instructions on [Download Page](https://getcomposer.org/)
- Install Git Command Tool - [Download Installer](https://git-scm.com/)


Run XAMPP Application
Start Services `Apache` and `MYSQL`

Open browser, enter url `http://localhost/phpmyadmin` and create a new database named `asett`

After All Installations Are Done, Clone Project From Repository
Run Command `composer install`

After Installation For Dependencies are complete,
Run Command `php artisan migrate --seed`

Run Command `php artisan serve`


Open browser, enter url `http://127.0.0.1:8000`
