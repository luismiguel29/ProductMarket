<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoModel;
use App\Models\Producto;


class CarritoController extends Controller
{
    public function index() 
    { 
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
        
        return view('/carrito', compact('auxarr', 'total','carros'));
    }

    
    public function destroy($idcarrito){
        $carrito = CarritoModel::findOrFail($idcarrito);
        $carrito->delete();
        return redirect()->route(('carrito.index')); 
    }

    public function incrementarCantidad(Request $request){
        $aux = CarritoModel::findOrFail($request->id); 
        $aux->increment('cantidad');
        $aux->save();
        return back();
        //return redirect()->route(('carrito.index')); 
    }
    
    public function decrementarCantidad(Request $request){
        $aux = CarritoModel::findOrFail($request->id); 
        $aux->decrement('cantidad');
        $aux->save();
        return back(); 
    }

    public function eliminarProducto($idcarrito){
        $carrito = CarritoModel::findOrFail($idcarrito);
        $carrito->delete();
        return redirect()->route(('carrito.index')); 
    }

    public function finCompra($idcarrito){
        CarritoModel::truncate();
        return redirect()->route(('carrito.index')); 
    }
}