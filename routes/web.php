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
    // **SHOW ADMIN PRODUCTS ** //
    Route::get('admin-produtos', 'ProductController@showProductsAdmin');
    // **END ADMIN PRODUCTS ** //

    // **SHOW ADMIN USERS ** //
    Route::get('admin-usuarios', 'UserController@index');
    // **END ADMIN PRODUCTS ** //

    // **UPDATE USER** //
    // formulario de editar produto
    Route::get('usuario/editarform/{user}', 'UserController@editUserForm')->name('user-edit-form');

    // ação de editar produto
    Route::put('usuario/edit/{user}', 'UserController@update')->name('user-edit');
    // **END UPDATE USER ** //

    Route::view('sucesso', 'admin/usuario/sucesso');

});
// **END ROTAS ACESSADAS PELO ADMIN  ** //


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
    return view('resultadoBusca');
});
// **END SEARCHBAR PRODUCT ** //


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


// **UPLOAD IMAGES** //
// formulario de upload de imagens
Route::view('form', 'upload.form');

// Rota ação form upload de imagens
Route::post('upload', 'UploadController@upload')->name('upload');
// ** END UPLOAD IMAGES** //


Route::view('show-users', 'admin/usuario/adminUsuarios');
