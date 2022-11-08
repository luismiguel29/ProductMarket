<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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

        $categoria = DB::table('categoria')
            ->orderByRaw('nombre ASC')
            ->get();

        $productos = DB::table('producto')
            ->get();
        

        $a = array();
        $a1 = array();
        for ($var = 9; $var > 0; $var--) {
            $extraer = Producto::where('id_categoria', $var)->orderBy('idproducto', 'desc')->first();
            if ($extraer != "") {
                array_unshift($a1, $extraer);
            }
            if(count($a1) == 3){
                array_unshift($a, $a1);
                $a1 = array();
            }
        }
        
        if(count($a1) == 2 || count($a1) == 1){
            array_unshift($a, $a1);
        }


        return view('/Cliente/novedades', compact('a', 'categoria'));
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
