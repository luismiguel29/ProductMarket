<?php

namespace App\Http\Controllers;
use App\Models\adriLista;
use Illuminate\Http\Request;
use Validator, Hash, Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\CarritoModel;
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

        $datos = DB::table('negocio');
        /* return $datos; */
        return view('Cliente.vistaadri'); 
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
        $dato = new adriLista;
            $dato->email = $request->input('email');
            $dato->password = $request->input('contraseña');
         return redirect ('proveedor/paginaprincipal');
        //$rules=[
          //  'email' => 'required|email',
            //'password' =>'required|max:8',
         //];    
         //$messages=[
           //'email.required'=> 'Su correo electronico es requerido.',
           //'email.email'=> 'El formato de su correo electronico es invalido.',
           //'password.required'=> 'Por favor escriba una contraseña.',
           //'password.max'=> 'La contraseña debe tener maximo 8 caracteres.',
         //];
         //$validator= Validator::make ($request->all(),  $messages);
         //if($validator->fails()):
           // return back()-> withErrors($validator)->with ('message', 'Se ha producido un error.')->with('typealert', 'danger');
         //else:
           // if(Auth::attempt(['email' => $request->input('email'),'password'=> $request->input('contraseña')], true)):
            //return redirect ('proveedor/paginaprincipal');
            //else:
              //  return back()->with ('alerta', 'Se ha producido un error.')->with('typealert', 'danger');
            //endif;
        //endif;   
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
