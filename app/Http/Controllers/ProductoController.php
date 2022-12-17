<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\DatosNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$productos = Producto::all();

        /* $productos = DB::table('producto')
            ->select('nombre', 'precio', 'preciodesc', 'url')
            ->orderByRaw('nombre ASC')
            ->get(); */

        /* $productos = DB::table('producto')
        ->where('id_categoria', '=', 5)
        ->orderByRaw('nombre ASC')
        ->get(); */
        $productos = DB::table('producto')
            ->get();

        return view('menu', compact('productos'));
        //return $productos;
    }

    public function registro(Request $request, $id)
    {
        $verificar = DatosNegocio::where('idnegocio', Crypt::decrypt($id))->first();
        $producto =Producto::find($id);
        $categoria = DB::table('categoria')
        ->orderByRaw('nombre ASC')
        ->get();
        $request->validate([
            //'nombreprod' => 'required|max:50|regex:/^[a-zA-Z]+$/',
            'nombreprod' => 'required|max:50',
            'url_img' => 'required|image|mimes:png,jpg|dimensions:max_width=600,max_height=600',
            'preciodesc' => 'lt:precio',
        ], [
            'nombreprod.regex' => 'El campo nombre solo puede tener letras',
            'preciodesc.lt' => 'El precio AHORA debe ser menor a precio ANTES',
            'url_img' => 'Debe subir un archivo de imagen png,jpg de maximo 600x600 px'
        ]);
        /* DB::select('call regprod(?,?,?,?,?,?,?)',array($request->idneg,$request->nombreprod,
        $request->precionormal,$request->preciodesc,$request->stockprod,$request->fechavenprod,$request->descripprod));
       */
        $pre = $request->input('precio');
        $predesc = $request->input('preciodesc');
        $url = Cloudinary::upload($request->file('url_img')->getRealPath())->getSecurePath();

        $img = $request->file('url_img')->store('public/imagenes');
        $url = Storage::url($img);  
        $producto = new Producto;
        $producto->id_categoria = $request->input('categoria');
        $producto->id_negocio = Crypt::decrypt($id);
        $producto->nombre = $request->input('nombreprod');
        $producto->precio = $request->input('precio');
        $producto->preciodesc = $request->input('preciodesc');
        $producto->stock = $request->input('stockprod');
        $producto->fechaven = $request->input('fechavenprod');
        $producto->fechainicio = $request->input('fechainiciopromo');
        $producto->fechafin = $request->input('fechafinpromo');
        $producto->descripcion = $request->input('descripprod');
        $producto->url = $url;
        $producto->save();
        //return back()->with('message', '¡Registro exitoso!!!!!!!');
        return view('registrar', compact('verificar'))->with('message', 'Registro exitoso!!!!!!');
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
        $validator = Validator::make($request->all(), [
            //'url_img' => 'required|image|mimes:png,jpg|dimensions:min_width=500,min_height=500,max_width=600,max_height=600',
            'url_img' => 'required|image|mimes:png,jpg|dimensions:max_width=600,max_height=600',
        ]);

        if ($validator->fails()) {
            return back()->with('alerta', 'Debe subir un archivo de imagen png,jpg de maximo 600x600 px')->withInput();
        } else {
            $url = Cloudinary::upload($request->file('url_img')->getRealPath())->getSecurePath();

            /* $img = $request->file('url_img')->store('public/imagenes');
        $url = Storage::url($img);  */

            $producto = new Producto;
            $producto->id_categoria = $request->input('categoria');
            $producto->id_negocio = 1;
            $producto->nombre = $request->input('nombreprod');
            $producto->precio = $request->input('precio');
            $producto->preciodesc = $request->input('preciodesc');
            $producto->stock = $request->input('stockprod');
            $producto->fechaven = $request->input('fechavenprod');
            $producto->fechainicio = $request->input('fechainiciopromo');
            $producto->fechafin = $request->input('fechafinpromo');
            $producto->descripcion = $request->input('descripprod');
            $producto->url = $url;
            $producto->save();
            return back()->with('message', '¡Registro exitoso!!!!!!!');
        }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    }
}
