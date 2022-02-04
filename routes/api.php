<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Register user
Route::post('/register', [LoginController::class, 'register']);

//Login user/admin
Route::get('/login', [LoginController::class, 'login']);

// Admin create
Route::middleware('auth:api')->post('/admin/create', [InventoryController::class, 'adminCreate']);

// User/Admin Read
Route::middleware('auth:api')->get('/read', [InventoryController::class, 'read']);

// Admin update
Route::middleware('auth:api')->post('/admin/update', [InventoryController::class, 'adminUpdate']);

// Admin Delete
Route::middleware('auth:api')->post('/admin/delete', [InventoryController::class, 'adminDelete']);

//User add to cart
Route::middleware('auth:api')->post('/add_to_cart', [CartController::class, 'addToCart']);

//User remove from cart
Route::middleware('auth:api')->post('/remove_from_cart', [CartController::class, 'removeFromCart']);
