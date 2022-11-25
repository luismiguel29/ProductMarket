<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\DatosNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoLuisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $verprod = Carrito::where('idproducto', $id)->exists();
        if ($verprod) {
            return back()->with('alerta', 'El producto ya se encuentra en el carrito, agregue otro producto!');
        } else {
            $carrito = new Carrito;
            $carrito->idproducto = $id;
            $carrito->cantidad = 1;
            $carrito->idusuario = 1;
            $carrito->save();
            return back()->with('mensaje', 'El producto se agrego correctamente al carrito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idproducto)
    {
        $producto = Producto::where('idproducto', $idproducto)->first();
        $categoria = Categoria::where('idcategoria', $producto->id_categoria)->first();
        $negocio = DatosNegocio::where('idnegocio', $producto->id_negocio)->first();
        return view('/Cliente/informacionproducto', compact('producto', 'categoria', 'negocio'));
        //return [$producto, $categoria];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ejemplo()
    {
    }
}
