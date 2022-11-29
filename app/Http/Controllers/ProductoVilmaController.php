<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\CarritoModel;
use App\Models\DatosNegocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;


class ProductoVilmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::join('categoria','producto.id_categoria', '=','categoria.idcategoria')-> select('producto.idproducto', 'producto.nombre', 'producto.precio','producto.preciodesc','producto.stock','categoria.nombre as catnombre','producto.fechainicio','producto.fechafin','producto.url') -> orderBy('nombre','ASC')->paginate(5);
        return view('Proveedor.Verlistaproductos', compact('productos'));
        
    }

    public function lista($id){
        $verificar = DatosNegocio::where('idnegocio', $id)->first();
        $productos = Producto::where('id_negocio', $id)-> orderBy('nombre','ASC')->paginate(5);
        return view('Proveedor.Verlistaproductos', compact('productos', 'verificar'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request -> input('page', 1);
        $perPage = 5;

        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByCategory($category)
    {
        $productos = Producto::where('id_categoria', $category)->orderBy('nombre','ASC')->paginate(8);
        $categoryName= Categoria::where('idcategoria',$category)->first();
        return view('cliente.listarefrescos', compact('productos', 'categoryName'));
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
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
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

        $productos = Producto::where('id_categoria', $category)->orderBy('nombre','ASC')->paginate(8);
        $categoryName= Categoria::where('idcategoria',$category)->first();
        return view('/Cliente/listarefrescos', compact('productos', 'categoryName', 'auxarr', 'total'));
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $idneg)
    {
        $verificar = DatosNegocio::where('idnegocio', $idneg)->first();
        $producto =Producto::find($id);
        $categoria = DB::table('categoria')
        ->orderByRaw('nombre ASC')
        ->get();
        return view('registrar', compact('producto', 'categoria', 'verificar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idneg)
    {
        $validator = Validator::make($request->all(), [
            //'url_img' => 'nullable|image|mimes:png,jpg|dimensions:min_width=500,min_height=500,max_width=600,max_height=600',
            'url_img' => 'nullable|image|mimes:png,jpg|dimensions:max_width=600,max_height=600',
        ]);

        if ($validator->fails()) {
            return back()->with('alerta', 'Debe subir un archivo de imagen png,jpg de maximo 600x600 px')->withInput();
        } else {
            $producto = Producto::find($id);
            if($request->file('url_img')!= null){
                $url = Cloudinary::upload($request->file('url_img')->getRealPath())->getSecurePath();
                $producto->url=$url;
            }
                $producto->id_categoria = $request->input('categoria');
                $producto->id_negocio = $idneg;
                $producto->nombre = $request->input('nombreprod');
                $producto->precio = $request->input('precio');
                $producto->preciodesc = $request->input('preciodesc');
                $producto->stock = $request->input('stockprod');
                $producto->fechaven = $request->input('fechavenprod');
                $producto->fechainicio = $request->input('fechainiciopromo');
                $producto->fechafin = $request->input('fechafinpromo');
                $producto->descripcion = $request->input('descripprod');
                
                $producto->save();
                return back()->with('message', '¡Edicion de datos exitoso!!!!!!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto=Producto::find($request->id)->delete();
        return back();
    }
}

