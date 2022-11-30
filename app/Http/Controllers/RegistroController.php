<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CarritoModel;
use App\Models\DatosNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RegistroController extends Controller
{
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
        return view('registroNegocio', compact('auxarr', 'total'));
    }


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
            return redirect('registroNegocio')->with('alerta', 'Debe subir un archivo de imagen png,jpg de maximo 600x600 px')->withInput();
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
    }
}
