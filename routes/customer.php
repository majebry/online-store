<?php

Route::group(['namespace' => 'Customer'], function() {
    Route::get('/', 'HomeController@index')->name('customer.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('customer.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('customer.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('customer.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('customer.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('customer.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('customer.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('customer.verification.verify');

});