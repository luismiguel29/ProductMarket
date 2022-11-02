<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NovedadesController extends Controller{

    public function index(){
        $productos = DB::table('producto')
        ->get();
        return view('/novedad', compact('productos'));

    }
    public function create(){

    }
    public function store(Request $request){

    }
    public function show($id){

    }
    public function edit($id){

    }
    public function update(Request $request, $id){

    }
    public function destroy($id){

    }

}