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

Route::get('/greeting', function () {
    return 'Olá Gamebros';
});

Route::get('/login', 'App\Http\Controllers\LoginController@show')->name('login');

Route::get('/dash', 'App\Http\Controllers\DashController@show')->name('dash.index');

Route::get('/customer/index', 'App\Http\Controllers\ClientesController@index')->name('clientes.index');
Route::get('/customer/create', 'App\Http\Controllers\ClientesController@create')->name('clientes.create');

Route::get('/product/index', 'App\Http\Controllers\ProdutosController@index')->name('produtos.index');
Route::get('/product/create', 'App\Http\Controllers\ProdutosController@create')->name('produtos.create');

Route::get('/categories/index', 'App\Http\Controllers\CategoriasController@index')->name('categorias.index');
Route::get('/categories/create', 'App\Http\Controllers\CategoriasController@create')->name('categorias.create');
Route::post('/categories/store', 'App\Http\Controllers\CategoriasController@store')->name('categorias.store');
Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoriasController@edit')->name('categorias.edit');
Route::patch('/categories/update/{id}', 'App\Http\Controllers\CategoriasController@update')->name('categorias.update');
Route::delete('/categories/destroy/{id}', 'App\Http\Controllers\CategoriasController@destroy')->name('categorias.destroy');

Route::get('/user/index', 'App\Http\Controllers\UsuariosController@index')->name('usuarios.index');
Route::get('/user/create', 'App\Http\Controllers\UsuariosController@create')->name('usuarios.create');

Route::get('/order/index', 'App\Http\Controllers\PedidosController@index')->name('pedidos.index');



