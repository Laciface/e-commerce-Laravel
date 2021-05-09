<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the project
I started to create an e-commerce website with Laravel. 
Project's purposes for me:

    - dive into Laravel
    - get to know blade template engine 
    - build admin panel
    - add payment option by paypal (not implemented yet)

## How to install

1. git clone https://github.com/Laciface/e-commerce-Laravel.git
2. open the project
3. composer install
4. run the schema.sql file
5. clone the .env.example file and rename to .env
6. fill the .env file like below:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=shopping
    DB_USERNAME=root
    DB_PASSWORD=
    
7. fill the products table with some examle:
    - run data.sql file
    
9. php artisan storage:link
9. php artisan serve
10. generate api key    
11. refresh the page

## Features

- add to cart (click add to cart button)
- check cart (click cart button on navbar)
- delete from cart (click 'X' in cart )
- go to admin panel (click Admin Panel button)
- edit image
- edit description
