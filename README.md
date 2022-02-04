<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<b><p>Procedure to follow</p></b>

<p>Set up an an .env file with a dB name of your choice and create a database of same name.</p>
<p>Post the following in your env file <br><mark>JWT_TTL=1440<br>
JWT_SECRET=wnXgt0K6TRmEUoRtMJWt8siKrn20bgBhjrVTVNbshG9PpJc06SJtJLd7P926BI0x</mark></p>
<p>php artisan migrate (to migrate tables to the database)<p>
<p>php artisan db:seed (seed admin account) username-favour, password-inventorycnk</p>
<p>php artisan serve</p>
