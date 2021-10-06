<?php

use App\Http\Controllers\CategoriasController;
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

Route::get('/hello', function () {
    return 'Olá  Gamebros';
});

// Create new category
Route::post('/categoria', [CategoriasController::class, 'store']);
// Update category by ID
Route::patch('/categoria/{id}', [CategoriasController::class, 'update']);
// Delete category by ID
Route::delete('/categoria/{id}', [CategoriasController::class, 'destroy']);
