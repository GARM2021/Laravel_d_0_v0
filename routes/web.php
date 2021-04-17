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

Route::get('/', 'MainController@index')->name('main');


//Route::resource('products', 'ProductController')->only(['index', 'show', 'create']); // ->except //!c48 
Route::resource('products', 'ProductController'); //!c48 Ruta de recursos se eliminaron todas las demas

// Route::get('products', 'ProductController@index')->name('products.index');

// Route::get('products/create', 'ProductController@create')->name('products.create');//! tenia este como ProductController@index y me mostraba la lista de productos que pen

// Route::post('products', 'ProductController@store')->name('products.store');


// //Route::get('products/{product:title}', 'ProductController@show')->name('products.show');//!c47 buscara el producto por el titulo 
// Route::get('products/{product}', 'ProductController@show')->name('products.show');

// Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');

// Route::match(['put', 'patch'], 'products/{product}', 'ProductController@update')->name('products.update');

// Route::delete('products/{product}', 'ProductController@destroy')->name('products.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
