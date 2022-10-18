<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosNegocio;
use Illuminate\Support\Facades\DB;

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
        $dato=DatosNegocio::findOrFail($id);
        $dato->NOMBRENEG=$request->input('nombre');
        $dato->DIRECCIONNEG=$request->input('direccion');
        $dato->HORARIONEG=$request->input('horario');
        $dato->TELEFONONEG=$request->input('telefono');
        $dato->save();
        return redirect()->route('editar');
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
