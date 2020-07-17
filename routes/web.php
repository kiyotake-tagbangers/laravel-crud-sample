<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products','ProductController');
// Route::domain(config('domain.products'))->name('products.')->prefix('dev/products')->group(function() {
//     Route::get('/', 'ProductController@index')->name('index');
//     Route::post('/', 'ProductController@store')->name('store');
//     Route::get('create', 'ProductController@create')->name('create');
//     Route::get('{product}', 'ProductController@show')->name('show');
//     Route::patch('{product}', 'ProductController@update')->name('update');
//     Route::delete('{product}', 'ProductController@destroy')->name('destroy');
//     Route::get('{product}/edit', 'ProductController@edit')->name('edit');
// });