<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

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

Route::middleware(['is_admin'])->group(function(){

Route::get('/dash', 'App\Http\Controllers\DashController@show')->name('dash.index');

Route::get('/customer/index', 'App\Http\Controllers\ClientesController@index')->name('clientes.index');
Route::get('/customer/create', 'App\Http\Controllers\ClientesController@create')->name('clientes.create');
Route::post('/customer/store', 'App\Http\Controllers\ClientesController@store')->name('clientes.store');
Route::get('/customer/edit/{id}', 'App\Http\Controllers\ClientesController@edit')->name('clientes.edit');
Route::put('/customer/update/{id}', 'App\Http\Controllers\ClientesController@update')->name('clientes.update');
Route::delete('/customer/destroy/{id}', 'App\Http\Controllers\ClientesController@destroy')->name('clientes.destroy');


Route::get('/product/index', 'App\Http\Controllers\ProdutosController@index')->name('produtos.index');
Route::get('/product/create', 'App\Http\Controllers\ProdutosController@create')->name('produtos.create');
Route::post('/product/store', 'App\Http\Controllers\ProdutosController@store')->name('produtos.store');
Route::get('/product/edit/{id}', 'App\Http\Controllers\ProdutosController@edit')->name('produtos.edit');
Route::put('/product/update/{id}', 'App\Http\Controllers\ProdutosController@update')->name('produtos.update');

Route::get('/categories/index', 'App\Http\Controllers\CategoriasController@index')->name('categorias.index');
Route::get('/categories/create', 'App\Http\Controllers\CategoriasController@create')->name('categorias.create');
Route::post('/categories/store', 'App\Http\Controllers\CategoriasController@store')->name('categorias.store');
Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoriasController@edit')->name('categorias.edit');
Route::patch('/categories/update/{id}', 'App\Http\Controllers\CategoriasController@update')->name('categorias.update');
Route::delete('/categories/destroy/{id}', 'App\Http\Controllers\CategoriasController@destroy')->name('categorias.destroy');

Route::get('/user/index', 'App\Http\Controllers\UsuariosController@index')->name('usuarios.index');
Route::get('/user/create', 'App\Http\Controllers\UsuariosController@create')->name('usuarios.create');
Route::post('/user/store', 'App\Http\Controllers\UsuariosController@store')->name('usuarios.store');
Route::get('/user/edit/{id}', 'App\Http\Controllers\UsuariosController@edit')->name('usuarios.edit');
Route::put('/user/update/{id}', 'App\Http\Controllers\UsuariosController@update')->name('usuarios.update');
Route::delete('/user/destroy/{id}', 'App\Http\Controllers\UsuariosController@destroy')->name('usuarios.destroy');


Route::get('/order/index', 'App\Http\Controllers\PedidosController@index')->name('pedidos.index');

});

Route::post('/login', 'App\Http\Controllers\AuthController@loginCustom')->name('loginCustom');
Route::get('/signOut', 'App\Http\Controllers\AuthController@signOut')->name('signOut');
