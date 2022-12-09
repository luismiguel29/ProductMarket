<?php

namespace App\Http\Controllers;

use App\Models\DatosNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class NegocioAnd extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['otro']]);
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            //'url' => 'required|image|mimes:png,jpg|dimensions:min_width=500,min_height=500,max_width=600,max_height=600',
            'url' => 'required|image|mimes:png,jpg|dimensions:max_width=600,max_height=600',
        ]);

        $nombre = DatosNegocio::select('*')
            ->where('nombre', $request->input('nombre'))
            ->exists();

        if($validator->fails()){
            return back()->with('alerta', 'Debe subir un archivo de imagen png,jpg de maximo 600x600 px')->withInput();
        }else if ($nombre) {
            return back()->with('message', 'El nombre de negocio ya existe!')->withInput();
        } else if ($request->input('horarioA') < $request->input('horarioC')) {
            $url = Cloudinary::upload($request->file('url')->getRealPath())->getSecurePath();
            $dato = new DatosNegocio;
            $dato->nombre = $request->input('nombre');
            $dato->direccion = $request->input('direccion');
            $dato->horarioinicio = $request->input('horarioA');
            $dato->telefono = $request->input('celular');
            $dato->horariofin = $request->input('horarioC');
            $dato->url = $url;
            $dato->save();
            //return redirect()->route('registroNegocio');
            return back()->with('message', 'Los datos se guardaron correctamente!');
        } else {
            return back()->with('message', 'El horario de cierre debe ser mayor')->withInput();
        }


        //----------------------------------

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$verificar = DatosNegocio::where('idnegocio', Hashids::decode($id))->first();
        $verificar = DatosNegocio::where('idnegocio', $id)->first();
        $dato = DatosNegocio::where('idnegocio', $id)->first();
        //return $dato;
        //return view('editar',compact('datos'));
        return view('editar', compact('dato', 'verificar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato = DatosNegocio::findOrFail($id);
        //return $dato;
        return view('editar', compact('dato'));
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
        $validator = Validator::make($request->all(), [
            'url' => 'required|image|mimes:png,jpg|dimensions:max_width=600,max_height=600',
        ]);

        if($validator->fails()){
            return back()->with('alerta', 'Debe subir un archivo de imagen png,jpg de maximo 600x600 px')->withInput();
        }else if ($request->input('horario1') < $request->input('horario2')) {
            $url = Cloudinary::upload($request->file('url')->getRealPath())->getSecurePath();
            $datoup = DatosNegocio::findOrFail($id);
            $datoup->nombre = $request->input('nombre');
            $datoup->direccion = $request->input('direccion');
            $datoup->horarioinicio = $request->input('horario1');
            $datoup->telefono = $request->input('telefono');
            $datoup->horariofin = $request->input('horario2');
            $datoup->url = $url;
            $datoup->save();
            return back()->with('message', '¡Actualizacion exitosa!!!!!!!');
        } else {
            return back()->with('message', 'El horario de cierre debe ser mayor');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dato = DatosNegocio::where('idnegocio', $id)->first();
        //return $dato;
        //return view('editar',compact('datos'));
        return view('editar', compact('dato'));
    }
}
