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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// api/products
Route::get('v1/products', 'API\V1\ProductController@index');


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' =>  'API\V1\Customer'

], function ($router) {

    Route::post('login', 'AuthController@login'); //api/auth/login
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::post('cart-items', 'API\V1\Customer\CartItemController@store'); // POST api/cart-items
Route::get('cart-items', 'API\V1\Customer\CartItemController@index');
Route::delete('cart-items/{id}', 'API\V1\Customer\CartItemController@destroy');

Route::post('orders/checkout', 'API\V1\Customer\OrderController@checkout');
