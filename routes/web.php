<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoVilma;

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

Route::get('/proveedor/listaproducto', [ProductoVilma::class,'index']  ) -> name('listaproducto');
Route::get('proveedor/paginaprincipal', function (){
    return view('Proveedor.PaginaPrincipal');
})->name('paginaprincipal');
