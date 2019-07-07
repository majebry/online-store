<?php

/*
This is where we define our routes or URIs,
and it's the responsibility of the Router to call the right method in the right controller
based on the URI that the user requested.
*/

// Products Routes:
Route::get(     'products/create',  'ProductController@create');
Route::post(    'products',         'ProductController@store');
Route::get(     'products',         'ProductController@index');
Route::delete(  'products/{id}',    'ProductController@destroy');

// Categories Routes:
Route::get(     'categories/create',    'CategoryController@create'); // view html form to create new category
Route::post(    'categories',           'CategoryController@store'); // store the form data in the database
Route::get(     'categories',           'CategoryController@index');
Route::get(     'categories/{id}/edit', 'CategoryController@edit');
Route::patch(   'categories/{id}',      'CategoryController@update');
