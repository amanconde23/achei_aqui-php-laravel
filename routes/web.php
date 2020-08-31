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

Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('admin-produtos', 'ProductController@showProductsAdmin');
});

// listar todos os produtos do usuario
Route::get('listar-produtos', 'ProductController@index')->name('products');

// listar todos os produtos
Route::get('listar-todos-produtos', 'ProductController@showAllProducts')->name('all-products');

// formulario de editar produto
Route::get('produto/editarform/{product}', 'ProductController@editProductForm')->name('product-edit-form');

// ação de editar produto
Route::put('produto/edit/{product}', 'ProductController@update')->name('product-edit');

// mostrar detalhes de um produto
Route::get('product/{product}', 'ProductController@showOneProduct')->name('product-show-details');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ação de buscar
Route::get('/search', 'ProductController@search')->name('search-results');

// mostrar resultados da busca
Route::get('/resultado-busca', function () {
    return view('resultadoBusca');
});

// formulario de criar novo produto
Route::get('produto/novo', 'ProductController@create')->name('product-new');

// ação de criar e armazenar novo produto
Route::post('produto/store', 'ProductController@store')->name('product-store');

// ação de apagar produto
Route::delete('produto/destroy/{product}', 'ProductController@destroy')->name('product-destroy');
