<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\producto as ModelsProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NovedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $productos = DB::table('producto')
        ->get();
    
        $cont = count($productos);
        
        if($cont < 10 ){
            $data = 0;
        }else{
            $data = count($productos)-4;
        }

        $a=array();
       
        for($var = 9; $var>0;$var--){
            $extraer = Producto::where('id_categoria',$var)->orderBy('idproducto','desc')->first();
            if($extraer !=""){
                array_unshift($a,$extraer);
            }
        }

        //$b1 = array(); $b2 = array(); $b3 = array();
        $b = array([],[],[]);
        $aux = 0;
        foreach($a as $c){
            if(count($a)%3 != 0){      
                array_unshift($b[$aux],$c);  
                if(count($b[$aux])==3){
                    $aux++;
                }
            }
        }
        $b1 = $b[0];
        $b2 = $b[1];
        $b3 = $b[2];
        //return $b;
        

       return view('/Cliente/novedades', compact('b','a'));


        //return $extraer;
        /*$producto = DB::table('producto')
        ->orderByRaw('nombre ASC')
        ->get();
        return $producto;
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            return view('producto.create');
        
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

