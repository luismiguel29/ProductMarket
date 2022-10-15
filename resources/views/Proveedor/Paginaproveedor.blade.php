head body con los botones y footer
@extends('layouts.headproveedor')

@section('body')
        <div class="container-fluid">
          <div class="row">
            <div class="btn-vertical col d-flex flex-column" >
              <a class="btn btn-dark btn-lg ms-3" style="background-color:#575555">Editar</a>
              <a  class="btn btn-dark btn-lg" style="background-color:#575555">Registra producto</a>
              <a  class="btn btn-dark btn-lg" href="{{route('listaproducto')}}" style="background-color:#2D2D2D">Ver productos</a>
          </div>
          <div class="col">
            @yield('Contenido')
          </div>
        </div>
        </div>
        
@endsection  





