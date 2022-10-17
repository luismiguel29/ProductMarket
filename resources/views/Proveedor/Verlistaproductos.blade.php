@extends('Proveedor.Paginaproveedor')
@section('style')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection
@section('Contenido')

<div class="bg-white border border-dark mt-3 mb-3 overflow-hidden " style="border-radius: 15px; ">
  <p class="text-center "><b>Lista de Productos</b></p>
      <div class="table-responsive  p-5 overflow-auto">
        <table class="table table-bordered border-dark" style="background-color: #9C9C9C; border-radius: 15px;">
          
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Precio unitario</th>
              <th>Precio total</th>
              <th>Stok</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $producto)
            <tr>
              <td>{{$producto->NOMBREPROD}}</td>
              <td> {{$producto->PRECIONORMAL}}</td>
              <td>{{$producto->PRECIODESC}}</td>
              <td>{{$producto->STOCKPROD}}</td>
              <td></td>
            </tr>
            @endforeach
            @foreach ($productos as $producto)
            <tr>
              <td>{{$producto->NOMBREPROD}}</td>
              <td> {{$producto->PRECIONORMAL}}</td>
              <td>{{$producto->PRECIODESC}}</td>
              <td>{{$producto->STOCKPROD}}</td>
              <td></td>
            </tr>
            
            @endforeach
          </tbody>
        </table>
        
      </div>

</div>


@endsection

    



