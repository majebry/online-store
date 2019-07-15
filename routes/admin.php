<?php

// prefixed by 'admin/'
Route::namespace('Admin')
        ->middleware('auth:admin')
        ->group(function() {
    Route::get(     'categories/create',    'CategoryController@create');
    Route::post(    'categories',           'CategoryController@store');
    Route::get(     'categories',           'CategoryController@index');
    Route::get(     'categories/{id}/edit', 'CategoryController@edit');
    Route::patch(   'categories/{id}',      'CategoryController@update');
    Route::delete(  'categories/{id}',      'CategoryController@destroy');

    Route::get(     'products/create',  'ProductController@create');
    Route::post(    'products',         'ProductController@store');
    Route::get(     'products',         'ProductController@index');
    Route::delete(  'products/{id}',    'ProductController@destroy');
    Route::get(     'products/{id}/edit', 'ProductController@edit');
    Route::patch(   'products/{id}',    'ProductController@update');
    Route::delete(  'products/{id}',    'ProductController@destroy');

    Route::get('orders', 'OrderController@index');
    Route::get('orders/{id}', 'OrderController@show');
});

Route::group(['namespace' => 'Admin'], function() {
    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('admin.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('admin.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('admin.verification.verify');

});
