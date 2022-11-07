<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CategoriaController extends Controller
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
        return view('registrar', compact('categoria'));
        //return $categoria;
    }

    public function menu()
    {
        $categoria = DB::table('categoria')
        ->orderByRaw('nombre ASC')
        ->get();
        return view('menu', compact('categoria'));
        //return $categoria;
    }

    public function catDato(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        //return view('menu', compact('categoria'));
        return $categoria;
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



        /* $img = $request->file('categoria')->store('public/imagenes');
        $url = Storage::url($img); */

        $url = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();

        $categoria = new Categoria;
        $categoria->nombre = $request->input('nombre');
        $categoria->url = $url;
        $categoria->save();
        //return redirect('ventana');
        return redirect()->back();
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
