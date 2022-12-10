<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\adriLista;
use App\Models\CarritoModel;
use App\Models\DatosNegocio;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AdriController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['store', 'index', 'registro', 'registrarUser']]);
  }

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

  

  public function registro()
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
    return view('Cliente.registroUsuario', compact('auxarr', 'total'));
  }

  public function registrarUser(Request $request, $id)
  {
    $verificar = DatosNegocio::where('idnegocio', Crypt::decrypt($id))->first();
    $ver = DatosNegocio::where('email',$request->input('email'))->exists();
    if ($ver) {
      //return back()->with('alerta', 'El correo electronico ya esta registrado!')->withInput();
      return view('Cliente.registroUsuario')->with('verificar', $verificar)->with('existe','El correo electronico ya esta registrado!');
      //return redirect()->route('login.')
    } else if ($request->input('password') != $request->input('passwordrep')) {
      return view('Cliente.registroUsuario')->with('verificar', $verificar)->with('existe','Las contraseñas no coinciden!');
    } else {
      $negocio = DatosNegocio::find(Crypt::decrypt($id));
      $negocio->email = $request->input('email');
      $negocio->password = $request->input('password');
      $negocio->save();
      User::create([
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);      
      //return back()->with('mensaje', 'Registro exitoso!, puede iniciar sesión');
      //return redirect()->route('paginaprincipal', compact('verificar'))->with('mensaje', 'Registro exitoso!, puede iniciar sesión');
      Auth::attempt(['email' => $request->email, 'password' => $request->password]);
      return view('Proveedor.Paginaproveedor', compact('verificar'));
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
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
    $credenciales = $request->validate([
      'email'=> ['required', 'email'],
      'password'=>['required', 'string'],
    ]);

    /* if(!Auth::attempt($credenciales)){
      return back()->with('alerta', 'no se pudo acceder');
    }
    $request->session()->regenerate();
    return view('/Proveedor/PaginaPrincipal', compact('verificar')); */


    /* if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
      //return view('/Proveedor/PaginaPrincipal', compact('verificar'));
      return redirect()->intended('/Proveedor/PaginaPrincipal');
    }else{
      return back()->with('alerta', 'Contraseña incorrecta!')->withInput();
    } */

    $email = DatosNegocio::where('email', $request->input('email'))->exists();
    $password = DatosNegocio::where('email', $request->input('email'))->where('password', $request->input('password'))->exists();
    $verificar = DatosNegocio::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
    if ($email) {
      if ($password && Auth::attempt($credenciales)) {
        
        $request->session()->regenerate();
        return view('/Proveedor/PaginaPrincipal', compact('verificar'));
      } else {
        return back()->with('alerta', 'Contraseña incorrecta!')->withInput();
      }
    } else {
      return back()->with('alerta', 'Correo electronico no registrado!');
    }
  }

  public function volver(Request $request)
  {
    $verificar = DatosNegocio::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
    return view('/Proveedor/PaginaPrincipal', compact('verificar'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($idneg)
  {
    $verificar = DatosNegocio::where('idnegocio', Crypt::decrypt($idneg))->first();
    return view('/Proveedor/PaginaPrincipal', compact('verificar'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
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
  public function destroy(Request $request)
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
      $total = (($carro->cantidad) * ($producto->preciodesc)) + $total;
    }

    $categoria = DB::table('categoria')
            ->orderByRaw('nombre ASC')
            ->get();

        $productos = DB::table('producto')
            ->get();
        

        $a = array();
        $a1 = array();
        for ($var = 9; $var > 0; $var--) {
            $extraer = Producto::where('id_categoria', $var)->orderBy('idproducto', 'desc')->first();
            if ($extraer != "") {
                array_unshift($a1, $extraer);
            }
            if(count($a1) == 3){
                array_unshift($a, $a1);
                $a1 = array();
            }
        }
        
        if(count($a1) == 2 || count($a1) == 1){
            array_unshift($a, $a1);
        }

    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerate();
    return view('/Cliente/novedades', compact('a', 'categoria', 'auxarr', 'total'));
  }

  public function cerrar(Request $request){
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

    $categoria = DB::table('categoria')
            ->orderByRaw('nombre ASC')
            ->get();

        $productos = DB::table('producto')
            ->get();
        

        $a = array();
        $a1 = array();
        for ($var = 9; $var > 0; $var--) {
            $extraer = Producto::where('id_categoria', $var)->orderBy('idproducto', 'desc')->first();
            if ($extraer != "") {
                array_unshift($a1, $extraer);
            }
            if(count($a1) == 3){
                array_unshift($a, $a1);
                $a1 = array();
            }
        }
        
        if(count($a1) == 2 || count($a1) == 1){
            array_unshift($a, $a1);
        }

    //Auth::guard('web')->logout();
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerate();
    //return view('/Cliente/novedades', compact('a', 'categoria', 'auxarr', 'total'));
    return back()->with('cerrar', 'Sesion cerrada con exito!');
  }

}
