
@extends('layouts.index')

@section('body')
        <div class="container-fluid">
<div class="row " style="min-height:600px">
            
            <div class="btn-vertical col d-flex flex-column align-self-center" >
              <div class="my-3 mx-auto"><a class="btn btn-dark fs-5 " href="/datosNego" style="width:200px">Editar</a></div>
              <div class="my-3 mx-auto"><a class="btn btn-dark fs-5" href="/registrar" style="width:200px">Registra producto</a></div> 
              <div  class="my-3 mx-auto"><a  class="btn btn-dark fs-5" href="{{route('paginaprincipal')}}" style="width:200px">Ver productos</a></div>
          </div>
          
    
          <div class="col">
            @yield('Contenido')
          </div>
      </div>
</div>
        
@endsection  





