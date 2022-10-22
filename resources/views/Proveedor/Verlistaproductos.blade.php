@extends('Proveedor.Paginaproveedor')
@section('style')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection
@section('Contenido')

<div class="bg-white border border-dark mt-3 mb-3 overflow-hidden " style="border-radius: 15px; max-height:550px ">
  <p class="text-center mt-3  fs-4"><b>Lista de Productos</b></p>
    
      <div class="table-responsive pb-5 ps-5 pe-5 overflow-auto">
        @if($productos-> isNotEmpty())
        <table class="table table-bordered border-dark" style="background-color: #9C9C9C; border-radius: 15px;">
          
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Precio Normal</th>
              <th>Precio Descuento</th>
              <th>Stock</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $producto)
            <tr>
              <td>{{$producto->NOMBREPROD}}</td>
              <td> {{$producto->PRECIONORMAL}}</td>
              <td>{{$producto->PRECIODESC}}</td>
              <td>{{$producto->STOCKPROD}}</td>
            </tr>
            @endforeach

            


          </tbody>
        </table>
     
        @else
            
      

        <div class="alert alert-primary" role="alert">
          No existe productos!
        </div>
        
      @endif
            
    
        <div class="d-flex justify-content-end">{!!$productos->links()!!}</div>
        <div class="d-flex justify-content-evenly">
          <a type="button" href="{{route('listaproducto')}}" class="btn btn-dark fs-5">Salir</a></div>
      </div>

</div>


@endsection

    



