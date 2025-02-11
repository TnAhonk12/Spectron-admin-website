# Laravel

> This project runs with Laravel version 10.48.3.

# Getting started

Assuming you've already installed on your machine: PHP (>= 8.1.10), [Laravel](https://laravel.com), [Composer](https://getcomposer.org)

##  Langkah 1 - Download atau clone dari github ini
``` bash
git clone https://gitlab.com/ngetikmulu/spectron/spectron-admin.git
```

##  Langkah 2 - Masuk kedalam folder
``` bash
cd spectron-admin
```

## Langkah 3 - Membuat file .env berdasarkan dari file env.example
``` bash
copy .env.example .env
```

##  Langkah 4 - Installasi Composer
``` bash
composer install
```

##  Langkah 5 - Setelah berhasil membuat file .env, berikutnya jalankan perintah berikut 
``` bash
php artisan key:generate
```

##  Langkah 6 - Buat database dengan nama table "spectron" dan ubah 'DB_DATABASE' pada file .env menjadi 
``` bash
DB_DATABASE=spectron
DB_USERNAME=root (username database anda)
DB_PASSWORD=    (Password database anda)
```

##  Langkah 7 - Migrate database
``` bash
php artisan migrate
```

##  Langkah 8 - Melakukan seeder untuk membuat akun admin
usernama : 123123123
password : 123123123
``` bash
php artisan db:seed
```

##  Langkah 11 - Instalasi plugin Imagick versi PHP 8.1
Download pada halaman (https://windows.php.net/downloads/pecl/releases/imagick/3.7.0/php_imagick-3.7.0-8.1-ts-vs16-x64.zip)
Setelah di extract copy file php_imagick.dll kedalam :
``` bash
 C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\ext 
```
untuk yang menggunakan laragon
``` bash
 C:\xampp\php\ext 
```
untuk yang menggunakan xampp

Masukan line ini ke file php.ini 
``` bash
extension=php_imagick.dll
```

## build CSS and JS assets
``` bash
npm install && npm run dev
```

Then launch the server:

``` bash
php artisan serve
```

The Laravel sample project is now up and running! Access it at http://localhost:8000.