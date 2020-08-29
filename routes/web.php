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

Route::get('listar-produtos', 'ProductController@index')->name('products');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ProductController@search')->name('search-results');

Route::get('/resultado-busca', function () {
    return view('resultadoBusca');
});

Route::get('produto/novo', 'ProductController@create')->name('product-new');

Route::post('produto/store', 'ProductController@store')->name('product-store');

