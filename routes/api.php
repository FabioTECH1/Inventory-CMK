<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [LoginController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:api')->post('/admin/create', [InventoryController::class, 'adminCreate']);

Route::middleware('auth:api')->get('/read', [InventoryController::class, 'read']);

Route::middleware('auth:api')->post('/admin/update', [InventoryController::class, 'adminUpdate']);

Route::middleware('auth:api')->post('/admin/delete', [InventoryController::class, 'adminDelete']);

Route::middleware('auth:api')->post('/add_to_cart', [CartController::class, 'addToCart']);

Route::middleware('auth:api')->post('/remove_from_cart', [CartController::class, 'removeFromCart']);
