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
        /* $users = DB::select('call consulta');
        return view ('Proveedor.Verlistaproductos', ['productos'=> $users]); */
        $productos = Producto::orderBy('nombre','ASC')->paginate(5);
        //$users = $this->arrayPaginator($users, $request);
        //return view ('Proveedor.Verlistaproductos', ['productos'=> $users]);
        //$productos = DB::table('producto')
        //->select('NOMBREPROD', 'PRECIONORMAL', 'PRECIODESC','STOCKPROD')
        //->orderByRaw('NOMBREPROD ASC')
        //->paginate(5);
        //return view('Proveedor.Verlistaproductos', compact('productos'));
        //$productos = Producto::all();
        return view('Proveedor.Verlistaproductos', compact('productos'));
        //return $productos;
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
        $productos = Producto::where('id_categoria', $category)->paginate(6);
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
        DB::select('call delprod("'.$request->idprod.'")');
    }
}

