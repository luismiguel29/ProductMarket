<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoVilmaController;
use App\Http\Controllers\ProductoYohanaController;
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

Route::get('/test',function(){
    return view('test');
});  

Route::get('/registrar', function () {
    return view('registrar');
});

Route::resource('/producto', ProductoYohanaController::class);



Route::get('/proveedor/listaproducto', [ProductoVilmaController::class,'index']  ) -> name('listaproducto');
Route::get('proveedor/paginaprincipal', function (){
    return view('Proveedor.PaginaPrincipal');
})->name('paginaprincipal');

Route::get('/editar', function () {
    return view('editar');
});


Route::resource('/datosNego',NegocioAnd::class);

