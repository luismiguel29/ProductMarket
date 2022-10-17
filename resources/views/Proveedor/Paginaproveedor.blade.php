
@extends('layouts.index')

@section('body')
        <div class="container-fluid">
          <div class="row">
            
            <div class="btn-vertical col d-flex flex-column align-self-center" >
              <div class="my-3 mx-auto"><a class="btn btn-dark btn-lg " style="background-color:#575555; width:200px">Editar</a></div>
              <div class="my-3 mx-auto"><a class="btn btn-dark btn-lg" style="background-color:#575555; width:200px">Registra producto</a></div> 
              <div  class="my-3 mx-auto"><a  class="btn btn-dark btn-lg" href="{{route('listaproducto')}}" style="background-color:#2D2D2D; width:200px">Ver productos</a></div>
          </div>
          <div class="col">
            @yield('Contenido')
          </div>
        </div>
        </div>
        
@endsection  





