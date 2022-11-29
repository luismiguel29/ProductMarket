<?php

namespace App\Http\Controllers;

use App\Models\adriLista;
use Illuminate\Http\Request;
use Validator, Hash, Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\CarritoModel;
use App\Models\DatosNegocio;
use App\Models\Producto;

class AdriController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //-----------------------------------------------------
    $carros = CarritoModel::all();
    $auxarr = array();
    $total = 0;
    foreach ($carros as $carro) {
      $producto = Producto::find($carro->idproducto);
      $producto->cantidad = ($carro->cantidad);
      $producto->idcarrito = ($carro->idcarrito);
      json_encode($producto);
      array_unshift($auxarr, $producto);
      $total = (($carro->cantidad) * ($producto->preciodesc)) + $total;
    }
    //-----------------------------------------------------

    $datos = DB::table('negocio');
    /* return $datos; */
    return view('Cliente.vistaadri', compact('auxarr', 'total'));
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
    $email = DatosNegocio::where('email', $request->input('email'))->exists();
    $password = DatosNegocio::where('email', $request->input('email'))->where('password', $request->input('password'))->exists();
    $verificar = DatosNegocio::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
    if ($email) {
      if ($password) {
        return view('proveedor/paginaprincipal', compact('verificar'));
      } else {
        return back()->with('alerta', 'Contraseña incorrecta!')->withInput();
      }
    } else {
      return back()->with('alerta', 'Correo electronico incorrecto!');
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
