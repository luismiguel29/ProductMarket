<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CarritoModel;
use App\Models\DatosNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class BuscadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*Request $request*/)
    {/*
        $texto=trim($request->get('texto'));
        $productos=DB::table('producto')
        ->select('nombre','precio','preciodesc','descripcion','url')
        ->where('nombre','LIKE','%'.$texto.'%');
        return view('producto.novedades',compact('productos','texto'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){

        $carros = CarritoModel::all();  
        $auxarr = array(); 
        $total = 0; 
        foreach ($carros as $carro) { 
            $producto = Producto::find($carro->idproducto);
            $producto->cantidad = ($carro->cantidad);
            $producto->idcarrito = ($carro->idcarrito);
            json_encode($producto);
            array_unshift($auxarr, $producto);             
            $total = ( ($carro->cantidad) * ($producto->preciodesc) ) + $total; 
        }
        
        $productos = Producto::select()
                ->where('nombre', 'LIKE', '%'.$request->input('search').'%')
                ->get();
        
        if (count($productos) == 0){
            return view('cliente.search', compact('productos', 'auxarr', 'total'))
            ->with('message', 'No hay resultados que mostrar');
        } else{
            return view('cliente.search', compact('productos', 'auxarr', 'total'))
            ->with('Producto', $productos);
        }
    }





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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
