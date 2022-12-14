<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarritoModel;
use App\Models\Producto;


class CarritoController extends Controller
{
    public function index() { 
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

    public function funTotal(){
        $carros = CarritoModel::all(); 
        $total = 0; 
        foreach ($carros as $carro) { 
            $producto = Producto::find($carro->idproducto);
            $total = ( ($carro->cantidad) * ($producto->preciodesc) ) + $total; 
        }
        
        return $total;
    }

    
    public function destroy($idcarrito){
        $carrito = CarritoModel::findOrFail($idcarrito);
        $carrito->delete();
        //return back();
        return response()->json([]);  
    }

    public function decrementarCantidad(Request $request){
        $aux = CarritoModel::findOrFail($request->id); 
        $pro = Producto::findOrFail($aux->idproducto); 
        if(($aux->cantidad) > 1){
            $aux->decrement('cantidad');
            $aux->save();
            $pro->increment('stock');
            $pro->save();
        }
        //return back();
        $carros = CarritoModel::all(); 
        $total = 0; 
        foreach ($carros as $carro) { 
            $producto = Producto::find($carro->idproducto);
            $total = ( ($carro->cantidad) * ($producto->preciodesc) ) + $total; 
        }
        return response()->json([
            'totalDec' => $aux->cantidad,
            'totalF' => 'Bs. '. $total
        ]);   
    }

    public function incrementarCantidad(Request $request){
        $aux = CarritoModel::findOrFail($request->id); 
        $pro = Producto::findOrFail($aux->idproducto); 
        /* if(($aux->cantidad) < ($pro->stock)){
            $aux->increment('cantidad');
            $aux->save();
        } */
        if($pro->stock > 0){
            $aux->increment('cantidad');
            $aux->save();
            $pro->decrement('stock');
            $pro->save();
        }
        //return back();
        //return redirect()->route(('carrito.index')); 
        $carros = CarritoModel::all(); 
        $total = 0; 
        foreach ($carros as $carro) { 
            $producto = Producto::find($carro->idproducto);
            $total = ( ($carro->cantidad) * ($producto->preciodesc) ) + $total; 
        }
        return response()->json([
            'totalInc' => $aux->cantidad,
            'totalF' => 'Bs. '. $total
        ]);
        //return response()->json(['success'=>'99']);
        //return "hola";
    }

    public function eliminarProducto(Request $request){
        $carrito = CarritoModel::findOrFail($request->id);
        $carrito->delete();
        $carros = CarritoModel::all(); 
        $total = 0; 
        foreach ($carros as $carro) { 
            $producto = Producto::find($carro->idproducto);
            $total = ( ($carro->cantidad) * ($producto->preciodesc) ) + $total; 
        }
        return response()->json(['totalF' => 'Bs. '. $total]);
    }

    public function finCompra(){
        CarritoModel::truncate();
        return back();
    }
}