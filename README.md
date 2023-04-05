<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/ibnudirsan/art/main/laravel-logolockup-cmyk-red.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/IDrumahdev/Starter-Kit-Laravel-9"><img src="https://img.shields.io/github/v/release/IDrumahdev/Starter-Kit-Laravel-9?style=social">
</a><a href="https://github.com/IDrumahdev/Starter-Kit-Laravel-9"><img src="https://img.shields.io/github/last-commit/IDrumahdev/Starter-Kit-Laravel-9?style=social">
 </a><a href="https://github.com/IDrumahdev/Starter-Kit-Laravel-9"><img src="https://img.shields.io/github/forks/IDrumahdev/Starter-Kit-Laravel-9?style=social">
 </a><a href="https://github.com/IDrumahdev/Starter-Kit-Laravel-9"><img src="https://img.shields.io/github/stars/IDrumahdev?style=social">
 </a>
</p>

## RumahDev | Starter Kit Laravel 9.x

## Introduction
Assalamu'alikum...
Project Starter Kit Laravel 9.x untuk kita para Developer PHP Laravel yang sering kali setup project mulai dari nol, agar kedepannya bisa lebih cepat untuk develop web aplikasi.

## Features

- Authentication menggunakan Laravel UI Bootstrap :
    *   Register
    *   Login
    *   Forget Password
- CAPTCHA Login.
- Example UI Dashboard.
- Authentication Google Two Factor.
- Password Validation.
- Authorization :
    *   Data Admin
        * Create
        * Edit
        * Block
        * All Trash :
            * Restore
    *   Data Role
        * Create
        * Edit
        * View
        * Trash
        * All Trash :
            * Restore
            * Delete
    *   List Module
        * Create
        * Edit
        * Trash
        * All Trash :
            * Restore
            * Delete
    *   List Permissions
        * Create
        * Edit
        * Trash
        * All Trash :
            * Restore
            * Delete
 - Data Example (Data Customer) :
    * Create
    * Edit
    * Trash
    * Download (Excel)
    * All Trash :
        * Restore
        * Delete
 - Profile Account :
    * Change Photo Profile.
    * Update Data Profile.
 - Setting Account (Update Password).

    
## Requered :
- PHP 8.0
- Composer version 2.3.7
- MySQL

## Package PHP :
- "barryvdh/laravel-debugbar": "^3.7"
    > Note: Untuk DebugBar Info.
- "intervention/image": "^2.7",
    > Note: Untuk Manajemen Image (Upload).
- "maatwebsite/excel": "^3.1",
    > Note: Untuk Membuat Report dalam bentuk Excel.
- "mews/captcha": "3.2.7",
    > Note: Untuk captcha ketika login.
- "pragmarx/google2fa-laravel": "^2.0",
    > Note: Untuk Google 2FA.  
- "simplesoftwareio/simple-qrcode": "^4.2",
    > Note: Untuk menampilkan QRCode Google 2FA.  
- "spatie/laravel-permission": "^5.5",
    > Note: Untuk Manajemen Authorization User.
- "yajra/laravel-datatables": "^9.0",
    > Note: Untuk Manajemen Table Display.
- "yaza/laravel-repository-service": "^3.2"
    > Note: Untuk Manajemen Repository design pattern.

## Setup :

- Clone Project dari Github :
```shell
https://github.com/IDrumahdev/Starter-Kit-Laravel-9.git
```

- Buat .env dari file .env.example
- Jalankan perintah :
```shell
php artisan key:generate
```
- Jalankan perintah :
```shell
composer install
```
- Buat Database.
- Konfigurasi Database.
- Lalu jalankan perintah :
```shell
php artisan migrate
```

- Lalu jalankan perintah :
```shell
php artisan db:seed --class=PermissionSeeder
```
- Untuk membuat User SuperAdmin jalankan perintah :
```shell
php artisan super:admin --username=ibnudirsan --email=ibnudirsan@gmail.com --password=Password@123
```
> Note: Password terdiri dari kombinasi huruf Besar, Kecil, Karakter Khusus dan Angka.

- Untuk membuat Data Dummy Customer, Jalankan perintah :
```shell
php artisan db:seed
```
> Note : Create 1000 data dummy customer.


## Create Repository Baru :
```shell
php artisan make:repository repositoryName 
```

## License

MIT license adalah lisensi perangkat lunak bebas guna yang berasal dari Massachusetts Institute of Technology (MIT). Lisensi ini ringkas dan to the point. Lisensi ini membolehkan pengguna untuk melakukan apapun pada kode program seperti pada Apache License. Lisensi ini hanya mewajibkan pengguna untuk menyertakan lisensi dan copyright si pembuat pada kode yang didistribusikan ulang dan tidak ada larangan untuk menggunakan trademark dari si pembuat asli. Selain itu pengguna juga tidak berhak untuk menuntut si pembuat ketika terjadi kerusakan pada perangkat lunak tersebut.
[MIT license](https://opensource.org/licenses/MIT).

link : https://codepolitan.com/blog/8-open-source-license-populer-yang-mesti-diketahui
