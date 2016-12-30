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

Route::resource('brand', 'BrandController');

Route::get('api/brand', function(){
    // $posts = Post::orderBy('created_at', 'DESC')->paginate();
    return Datatables::eloquent(App\Brand::query())->make(true);
});
