<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NegocioAnd;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ProductoVilmaController;
use App\Http\Controllers\ProductoPruebaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\ProductoLuisController;
use App\Http\Controllers\ListanegociosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdriController;
use App\Http\Controllers\BuscadorController;
use App\Models\DatosNegocio;

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

Route::get('/test', function () {
    return view('test');
});

Route::get('/registrar', function () {
    return view('registrar');
});

Route::get('/Cliente/novedades', function () {
    return view('/Cliente/novedades');
});

Route::get('/templa', function () {
    return view('/layouts/template');
});

Route::post('/registro/{id}', 'App\Http\Controllers\ProductoController@registro')->name('registro');
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

//Route::get('/datosNegocio/{id}', 'App\Http\Controllers\NegocioAnd@index')->name('datosNegocio');
Route::get('/datosNegocio/{id}', ['uses'=>'App\Http\Controllers\NegocioAnd@show', 'as'=> 'datosnegocio']);
Route::resource('/datosNego', NegocioAnd::class);

Route::get('/ventana', function () {
    return view('ventana');
})->name('ventana');

Route::get('/Cliente/search', function () {
    return view('/Cliente/search');
});

Route::get('/Cliente/registroUsuario', function () {
    return view('/Cliente/registroUsuario');
});

//Route::get('/editar', [App\Http\Controllers\NegocioAnd::class, 'index'])->name('editar');
//Route::put('/editar', [App\Http\Controllers\NegocioAnd::class, 'update'])->name('updatedatos');
//Route::edit('/editar', [App\Http\Controllers\NegocioAnd::class, 'edit'])->name('editardatos');
Route::get('/proveedor/listaproducto', [ProductoVilmaController::class, 'index'])->name('listaproducto');
Route::get('/lista/{id}', 'App\Http\Controllers\ProductoVilmaController@lista')->name('lista');
Route::get('/proveedor/paginaprincipal', function () {
    return view('/Proveedor/PaginaPrincipal');
})->name('paginaprincipal');

Route::resource('/verproductos', ProductoVilmaController::class);

Route::resource('/prueba', ProductoPruebaController::class);

Route::resource('/categoria', CategoriaController::class);

Route::resource('/userTemplate', NegocioAnd::class);

Route::resource('/novedades', NovedadesController::class);
//Route::get('/novedades', 'App\Http\Controllers\NovedadesController@index')->name('novedades');


Route::get('/cliente/listarefrescos', function () {
    return view('Cliente.listarefrescos');
})->name('listarefrescos');

Route::get('/verproductos/categoria/{category}', [ProductoVilmaController::class, 'getByCategory']);

Route::get('/carrusel', 'App\Http\Controllers\CategoriaController@menu');


Route::resource('/registroNegocio', RegistroController::class);


Route::resource('/login', AdriController::class);
Route::get('/loginsesion', 'App\Http\Controllers\AdriController@index2')->name('loginsesion');
Route::get('/registroUsuario', 'App\Http\Controllers\AdriController@registro')->name('registroUsuario');
Route::post('/registrarUser/{id}', 'App\Http\Controllers\AdriController@registrarUser')->name('registrarUser');
Route::post('/logout', 'App\Http\Controllers\AdriController@cerrar')->name('logout');
Route::get('/volver', 'App\Http\Controllers\AdriController@volver')->name('volver');
//Route::post('/login', 'App\Http\Controllers\AdriController@store');

Route::get('/info/{idproducto}', 'App\Http\Controllers\ProductoLuisController@show')->name('info');
Route::post('/addcarrito/{id}', 'App\Http\Controllers\ProductoLuisController@store')->name('addcarrito');
Route::get('/car', 'App\Http\Controllers\ProductoLuisController@index')->name('car');
Route::resource('informacion', ProductoLuisController::class);

Route::resource('/listanegocio', ListanegociosController::class);

Route::get('/editarProducto/{id}/{idneg}', [ProductoVilmaController::class, 'edit'])->name('editarProductos');
Route::delete('/eliminarProducto', [ProductoVilmaController::class, 'destroy'])->name('eliminarProductos');
Route::put('/updateproducto/{id}/{idneg}', [ProductoVilmaController::class, 'update'])->name('producto.update');



Route::resource('/cliente/search', BuscadorController::class);
/*buscar es una variable para enviar datos */
Route::get('/buscar', 'App\Http\Controllers\BuscadorController@search')->name('buscar');



Route::resource('/carrito', CarritoController::class);

Route::get('render', function () {
    $otros = DatosNegocio::all()->first();
    return view('ventana', compact('otros'));
});

Route::get('/incrementar', [App\Http\Controllers\CarritoController::class, 'incrementarCantidad'])->name("incrementarCantidad");
Route::get('/decrementar', [App\Http\Controllers\CarritoController::class, 'decrementarCantidad'])->name("decrementarCantidad");
Route::get('/eliminar', [App\Http\Controllers\CarritoController::class, 'eliminarProducto'])->name("eliminarProducto");
Route::get('/endC', [App\Http\Controllers\CarritoController::class, 'finCompra'])->name("finCompra");
