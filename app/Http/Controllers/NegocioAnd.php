<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosNegocio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class NegocioAnd extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$texto=trim($request->get('texto'));

        $datos=DatosNegocio::all();
        //$datos=DB::table('negocio');

        //return $datos;

        $dato=DatosNegocio::findOrFail(1);
        //return $dato;
        //return view('editar',compact('datos'));
            return view('editar',compact('dato'));
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
        $dato=DatosNegocio::findOrFail($id);
        //return $dato;
        return view('editar',compact('dato'));
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
        $datoup=DatosNegocio::findOrFail($id);
        $datoup->nombre=$request->input('nombre');
        $datoup->direccion=$request->input('direccion');
        $datoup->horarioinicio=$request->input('horario1');
        $datoup->telefono=$request->input('telefono');
        $datoup->horariofin=$request->input('horario2');
        $datoup->save();
        return redirect('datosNego')->with('message', '¡Actualizacion exitosa!!!!!!!');
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