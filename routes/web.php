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

Route::get('/dash', 'App\Http\Controllers\DashController@show');
Route::get('/login', 'App\Http\Controllers\LoginController@show');
Route::get('/customer', 'App\Http\Controllers\ClientesController@index');