<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosNegocio;
use Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $otros=DatosNegocio::find(1);
        //$otros = Http::get('https://jsonplaceholder.typicode.com/users');
        //$otrosArray=$otros->json();
        return view('home',compact('otros'));
    }
}
