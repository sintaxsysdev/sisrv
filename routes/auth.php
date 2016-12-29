<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
|--------------------------------------------------------------------------
| Makes Routes
|--------------------------------------------------------------------------
*/

/*
Route::get('makes', [
    'uses' => 'MakeController@index',
    'as' => 'makes.index'
]);

Route::get('makes/{id}/edit', [
    'uses' => 'MakeController@edit',
    'as' => 'makes.edit'
]);

Route::get('makes/create', [
    'uses' => 'MakeController@create',
    'as' => 'makes.create',
]);

Route::post('makes/create', [
    'uses' => 'MakeController@store',
    'as' => 'makes.store',
]);

*/

Route::resource('brand', 'BrandController');