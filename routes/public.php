<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Routes Category
|--------------------------------------------------------------------------
*/

Route::resource('category', 'CategoryController');
Route::get('api/categories', 'CategoryController@listing');

/*
|--------------------------------------------------------------------------
| Routes Brands
|--------------------------------------------------------------------------
*/

Route::resource('brand', 'BrandController');
Route::get('api/brands', 'BrandController@listing');

/*
|--------------------------------------------------------------------------
| Routes Measures
|--------------------------------------------------------------------------
*/

Route::resource('measure', 'MeasureController');
Route::get('api/measures', 'MeasureController@listing');

/*
|--------------------------------------------------------------------------
| Routes Suppliers
|--------------------------------------------------------------------------
*/

Route::resource('supplier', 'SupplierController');
Route::get('api/suppliers', 'SupplierController@listing');

/*
|--------------------------------------------------------------------------
| Routes Customers
|--------------------------------------------------------------------------
*/

Route::resource('customer', 'CustomerController');
Route::get('api/customers', 'CustomerController@listing');

