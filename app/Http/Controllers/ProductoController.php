<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\producto as ModelsProducto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('call consulta');
        return $users;
        $productos=Producto::all();
        return $productos;
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
      /* DB::select('call regprod(?,?,?,?,?,?,?)',array($request->idneg,$request->nombreprod,
        $request->precionormal,$request->preciodesc,$request->stockprod,$request->fechavenprod,$request->descripprod));
       */
        $producto  = new Producto;
            $producto->idneg=$request->input('idneg');
            $producto->idcat=$request->input('idcat');
            $producto->nombreprod= $request->input('nombreprod');
            $producto->precionormal=$request->input('precionormal');
            $producto->preciodesc=$request->input('preciodesc');
            $producto->stockprod=$request->input('stockprod');
            $producto->fechavenprod=$request->input('fechavenprod');

            $producto->descripprod=$request->input('descripprod');
            $producto->url_img=$request->input('url_img');
            $producto->save();
            //return redirect()->route('producto.index');
            return \Redirect::back();

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
    public function update(Request $request)
    {
        DB::select('call moddatosprod(?,?,?,?,?,?,?,?,?)',array($request->idprod,$request->idcat,$request->nombreprod,$request->precionormal,
        $request->preciodesc,$request->stockprod,$request->fechavenprod,$request->descripprod,$request->url_img));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::select('call delprod("'.$request->idprod.'")');

    }

}
