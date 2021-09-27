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




