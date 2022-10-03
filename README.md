<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Todo App
## Getting started

Assuming you've already installed on your machine: PHP (>= 7.0.0), [Laravel](https://laravel.com) and [Composer](https://getcomposer.org)

Clone the repository
``` bash
git clone https://github.com/FabioTECH1/Inventory-NCK.git
```

Switch to the repo folder
``` bash
cd Inventory-NCK
```

Install all the dependencies using composer
``` bash
composer install
composer require tymon/jwt-auth
```

## Create .env file and make the required configuration changes in it, run the database migrations (**Set the database connection in .env before migrating**)


Publish the config 
``` bash
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

Generate a new JWT authentication secret key to the .env
``` bash
php artisan jwt:secret
```

Migrate to database
``` bash
php artisan migrate
```

Seed Admin Account
``` bash
#username-favour, password-inventorycnk
php artisan db:seed
```

Then launch the server:
``` bash
php artisan serve
```

## Testing API
The api can now be accessed at
``` bash
http://127.0.0.1:8000/api
```
[Postman Documentation](https://documenter.getpostman.com/view/16473358/UVeFP7VM) for detailed documentation and testing

----------
 
# Authentication
 
This applications uses JSON Web Token (JWT) to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The JWT authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.
 
- https://jwt.io/introduction/
- https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html

----------
