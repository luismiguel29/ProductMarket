<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NegocioAnd;
use App\Http\Controllers\ProductoVilmaController;
use App\Http\Controllers\ProductoPruebaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ListaController;

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

Route::get('/test',function(){
    return view('test');
});  

Route::get('/registrar', function () {
    return view('registrar');
});

Route::resource('/producto', ProductoController::class);

Route::get('/editar', function () {
    return view('editar');
});

Route::get('/editarini', function () {
    return view('editarini');
});

Route::get('/menu', function () {
    return view('menu');
});
Route::get('/menu2', function () {
    return view('menu2');
});


Route::resource('/datosNego',NegocioAnd::class);

Route::get('/ventana', function () {
    return view('ventana');
});

//Route::get('/editar', [App\Http\Controllers\NegocioAnd::class, 'index'])->name('editar');
//Route::put('/editar', [App\Http\Controllers\NegocioAnd::class, 'update'])->name('updatedatos');
//Route::edit('/editar', [App\Http\Controllers\NegocioAnd::class, 'edit'])->name('editardatos');
Route::get('/proveedor/listaproducto', [ProductoVilmaController::class,'index']  ) -> name('listaproducto');
Route::get('proveedor/paginaprincipal', function (){
    return view('Proveedor.PaginaPrincipal');
})->name('paginaprincipal');

Route::resource('/verproductos', ProductoVilmaController::class);

Route::resource('/prueba', ProductoPruebaController::class);

Route::resource('/categoria', CategoriaController::class);

Route::resource('/list', ListaController::class);

//Route::get('/inicio', [App\Http\Controllers\CategoriaController::class, 'menu'])->name('inicio');

Route::get('/menu', 'App\Http\Controllers\CategoriaController@menu');
//Route::get('/menu', 'App\Http\Controllers\CategoriaController@catDato');
Route::get('/registroNegocio', function () {
    return view('registroNegocio');
});
