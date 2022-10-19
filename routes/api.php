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

//rutas agregar, editar, eliminar producto
Route::get('/producto', 'App\Http\Controllers\Producto@index');
Route::post('/producto', 'App\Http\Controllers\Producto@store');
Route::put('/producto', 'App\Http\Controllers\Producto@update');
Route::delete('/producto', 'App\Http\Controllers\Producto@destroy');

//rutas agregar, editar, eliminar negocio
Route::get('/negocio', 'App\Http\Controllers\Negocio@index');
Route::post('/negocio', 'App\Http\Controllers\Negocio@store');
Route::put('/negocio', 'App\Http\Controllers\Negocio@update');
Route::delete('/negocio', 'App\Http\Controllers\Negocio@destroy');

Route::get('/dnegocio', 'App\Http\Controllers\NegocioAnd@index');

//ruta prueba de articulos
/* Route::get('/listaarticulos', 'App\Http\Controllers\ArticulosLista@index');
Route::post('/listaarticulos', 'App\Http\Controllers\ArticulosLista@store');
Route::delete('/listaarticulos/{id}', 'App\Http\Controllers\ArticulosLista@destroy'); */
