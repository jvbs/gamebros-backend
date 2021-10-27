<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('produtos', App\Http\Controllers\API\ProdutosController::class);
Route::resource('categorias', App\Http\Controllers\API\CategoriasController::class);
Route::resource('usuarios', App\Http\Controllers\API\UsuariosController::class);

