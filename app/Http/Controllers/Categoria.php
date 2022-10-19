<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

<<<<<<<< HEAD:app/Http/Controllers/ProductoVilmaController.php
class ProductoVilmaController extends Controller
========
class Categoria extends Controller
>>>>>>>> copiayohana:app/Http/Controllers/Categoria.php
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<<< HEAD:app/Http/Controllers/ProductoVilmaController.php
        $users = DB::select('call consulta');
        return view ('Proveedor.Verlistaproductos', ['productos'=> $users]);
========
        $nomCat = DB::select('call categ');
        return $nomCat;
>>>>>>>> copiayohana:app/Http/Controllers/Categoria.php
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
