@extends('Proveedor.Paginaproveedor')
@section('style')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection
@section('Contenido')
<div class="d-flex justify-content-around " style="padding-top: 20px;"  >
<div></div>
  <div class="bg-white border border-dark mt-3 mb-3 overflow-hidden " style="border-radius: 15px; max-height:550px ">
    <p class="text-center mt-3  fs-4"><b>Lista de Productos</b></p>

    <div class="table-responsive pb-3 ps-5 pe-5 overflow-auto">
      @if($productos-> isNotEmpty())
      <table class="table table-bordered border-dark" style="background-color: #9C9C9C; ">

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

      <div class="alert alert-dark" role="alert">
        No existen productos registrados!
      </div>

      @endif
      <div class="d-flex justify-content-between align-items-start">
        <div style="width:70px"></div>{!!$productos->links()!!}
        <a type="button" href="{{route('paginaprincipal')}}" class="btn btn-dark fs-5" style="width: 70px; height:38px">Salir</a>
      </div>

    </div>

  </div>

</div>
@endsection