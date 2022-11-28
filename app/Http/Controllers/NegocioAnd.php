<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CarritoModel;
use App\Models\DatosNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
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


        $dato = DatosNegocio::findOrFail(1);
        return view('editar', compact('dato', 'auxarr', 'total'));
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
        $validator = Validator::make($request->all(), [
            'url' => 'required|image|mimes:png,jpg|dimensions:min_width=400,min_height=400,max_width=500,max_height=500',
        ]);

        $nombre = DatosNegocio::select('*')
            ->where('nombre', $request->input('nombre'))
            ->exists();

        if($validator->fails()){
            return redirect('registroNegocio')->with('alerta', 'Debe subir un archivo de imagen png,jpg de 400x400 o 500x500')->withInput();
        }else if ($nombre) {
            return redirect('registroNegocio')->with('message', 'El nombre de negocio ya existe!')->withInput();
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
            return redirect('registroNegocio')->with('message', 'Los datos se guardaron correctamente!');
        } else {
            return redirect('registroNegocio')->with('message', 'El horario de cierre debe ser mayor')->withInput();
        }


        //----------------------------------

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
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
            'url' => 'required|image|mimes:png,jpg|dimensions:min_width=400,min_height=400,max_width=500,max_height=500',
        ]);

        if($validator->fails()){
            return redirect('datosNego')->with('alerta', 'Debe subir un archivo de imagen png,jpg de 400x400 o 500x500')->withInput();
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
            return redirect('datosNego')->with('message', '¡Actualizacion exitosa!!!!!!!');
        } else {
            return redirect('datosNego')->with('message', 'El horario de cierre debe ser mayor');
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
        //
    }
}
