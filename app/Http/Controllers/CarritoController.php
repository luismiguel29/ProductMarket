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
        return back();
    }

    public function incrementarCantidad(Request $request){
        $aux = CarritoModel::findOrFail($request->id); 
        $pro = Producto::findOrFail($aux->idproducto); 
        if(($aux->cantidad) < ($pro->stock)){
            $aux->increment('cantidad');
            $aux->save();
        }
        return previous();
        //return redirect()->route(('carrito.index')); 
    }
    
    public function decrementarCantidad(Request $request){
        $aux = CarritoModel::findOrFail($request->id); 
        if(($aux->cantidad) > 1){
            $aux->decrement('cantidad');
            $aux->save();
        }
        return back(); 
    }

    public function eliminarProducto($idcarrito){
        $carrito = CarritoModel::findOrFail($idcarrito);
        $carrito->delete();
        return back(); 
    }

    public function finCompra(){
        CarritoModel::truncate();
        return back();
    }
}