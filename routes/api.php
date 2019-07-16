<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->namespace('API\V1')->group(function() {
    Route::prefix('customer')->namespace('Customer')->group(function() {
        Route::get('products', 'ProductController@index');

        Route::post('auth/login', 'AuthController@login');
        Route::post('auth/logout', 'AuthController@logout');

        Route::post('cart-items', 'CartItemController@store'); // POST api/cart-items
        Route::get('cart-items', 'CartItemController@index');
        Route::delete('cart-items/{id}', 'CartItemController@destroy');

        Route::post('orders/checkout', 'OrderController@checkout');
    });
});
