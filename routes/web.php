<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegocioAnd;

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


Route::get('/editar', function () {
    return view('editar');
});

Route::get('/editarini', function () {
    return view('editarini');
});


Route::resource('/datosNego',NegocioAnd::class);

//Route::get('/editar', [App\Http\Controllers\NegocioAnd::class, 'index'])->name('editar');
//Route::put('/editar', [App\Http\Controllers\NegocioAnd::class, 'update'])->name('updatedatos');
//Route::edit('/editar', [App\Http\Controllers\NegocioAnd::class, 'edit'])->name('editardatos');