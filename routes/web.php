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


// **HOME ** //
Route::get('/home', 'HomeController@index')->name('home');
// **END HOME ** //


// **ROTAS DE LOGIN ** //
Auth::routes();
// **END ROTAS DE LOGIN ** //


// **ROTAS ACESSADAS PELO ADMIN ** //
Route::group(['middleware' => ['auth','admin']], function(){
    // **SHOW ADMIN USERS ** //
    Route::get('admin-usuarios', 'UserController@index')->name('admin-users');
    // **END ADMIN PRODUCTS ** //

    // **DELETE USER** //
    // ação de apagar usuario
    Route::delete('usuario/destroy/{user}', 'UserController@destroy')->name('user-destroy');
    // **END DELETE USER ** //
});
// **END ROTAS ACESSADAS PELO ADMIN  ** //


// **ROTAS USUARIOS** //
Route::prefix('usuario')->group(function(){
    // **SHOW USER ** //
    Route::get('{user}', 'UserController@show')->name('user');
    // **END USER ** //

    // **UPDATE PRODUCT** //
    // formulario de editar produto
    Route::get('editarform/{user}', 'UserController@editUserForm')->name('user-edit-form');

    // ação de editar produto
    Route::put('editar/{user}', 'UserController@updateUser')->name('user-edit');
    // **END UPDATE PRODUCT ** //

});
// **END ROTAS USUARIOS** //


// **ACCESS DENIED PAGE ** //
Route::get('access-denied', function () {
    return view('admin/acessoNegado');
});
// **END ACCESS DENIED PAGE ** //


// **SEARCHBAR PRODUCT ** //
// ação de buscar
Route::get('/search', 'ProductController@search')->name('search-results');

// mostrar resultados da busca
Route::get('/resultado-busca', function () {
    return view('produto/resultadoBuscaProduto');
});
// **END SEARCHBAR PRODUCT ** //


// **SEARCHBAR USER ** //
// ação de buscar
Route::get('buscar-usuario', 'UserController@search')->name('search-user-results');

// mostrar resultados da busca
Route::get('resultado-busca-usuario', function () {
    return view('usuario/resultadoBuscaUsuario');
});
// **END SEARCHBAR USER ** //


// ** ROTAS PRODUTOS** //
// **SHOW PRODUCT** //
// listar todos os produtos
Route::get('listar-todos-produtos', 'ProductController@showAllProducts')->name('all-products');

// listar todos os produtos do usuario
Route::get('listar-produtos', 'ProductController@index')->name('products');

// mostrar detalhes de um produto
Route::get('product/{product}', 'ProductController@showOneProduct')->name('product-show-details');
// **END SHOW PRODUCT ** //


// **CREATE PRODUCT** //
// formulario de criar novo produto
Route::get('produto/novo', 'ProductController@create')->name('product-new');

// ação de criar e armazenar novo produto
Route::post('produto/store', 'ProductController@store')->name('product-store');
// **END CREATE PRODUCT ** //


// **UPDATE PRODUCT** //
// formulario de editar produto
Route::get('produto/editarform/{product}', 'ProductController@editProductForm')->name('product-edit-form');

// ação de editar produto
Route::put('produto/edit/{product}', 'ProductController@update')->name('product-edit');
// **END UPDATE PRODUCT ** //


// **DELETE PRODUCT** //
// ação de apagar produto
Route::delete('produto/destroy/{product}', 'ProductController@destroy')->name('product-destroy');
// **END DELETE PRODUCT ** //
