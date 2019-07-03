<?php

/*
This is where we define our routes or URIs,
and it's the responsibility of the Router to call the right method in the right controller
based on the URI that the user requested.
*/

Route::get(     'products/create',  'ProductController@create');
Route::post(    'products',         'ProductController@store');
Route::get(     'products',         'ProductController@index');
Route::delete(  'products/{id}',    'ProductController@destroy');
