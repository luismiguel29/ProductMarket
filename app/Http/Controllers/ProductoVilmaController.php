<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductoVilmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::join('categoria','producto.id_categoria', '=','categoria.idcategoria')-> select('producto.nombre', 'producto.precio','producto.preciodesc','producto.stock','categoria.nombre as catnombre','producto.fechainicio','producto.fechafin','producto.url') -> orderBy('nombre','ASC')->paginate(5);
        return view('Proveedor.Verlistaproductos', compact('productos'));
        
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
        $productos = Producto::where('id_categoria', $category)->orderBy('nombre','ASC')->paginate(8);
        $categoryName= Categoria::where('idcategoria',$category)->first();
        return view('/Cliente/listarefrescos', compact('productos', 'categoryName'));
    }

    /**
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto =Producto::find($id);
        $categoria = DB::table('categoria')
        ->orderByRaw('nombre ASC')
        ->get();
        return view('registrar', compact('producto', 'categoria'));
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
        DB::select('call delprod("'.$request->idprod.'")');
    }
}

