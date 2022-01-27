<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\CarrinhoController;
use App\Http\Controllers\API\UsuariosController;

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

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/logout', [UsuariosController::class, 'logout']);
});

Route::resource('produtos', App\Http\Controllers\API\ProdutosController::class);
Route::resource('categorias', App\Http\Controllers\API\CategoriasController::class);
Route::resource('usuarios', App\Http\Controllers\API\UsuariosController::class);
Route::resource('pedidos', App\Http\Controllers\API\PedidosController::class);
Route::resource('carrinho', App\Http\Controllers\API\CarrinhoController::class);
Route::post('/carrinho/remover-produto-carrinho', [CarrinhoController::class, 'removerProdutoCarrinho']);
// Route::post('/remove-prod-one', [CarrinhoController::class, 'removeProdOne']);
// Route::get('/remove-cart', [CarrinhoController::class, 'removeCart']);
// Route::get('/cart', [CarrinhoController::class, 'cart']);
Route::post('/login', [UsuariosController::class, 'login']);
//Route::post('/logout', [UsuariosController::class, 'logout']);

//Route::post('/login', 'App\Http\Controllers\AuthController@loginCustom')->name('loginCustom');
//Route::get('/signOut', 'App\Http\Controllers\AuthController@signOut')->name('signOut');
