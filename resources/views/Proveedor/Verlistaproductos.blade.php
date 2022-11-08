@extends('Proveedor.Paginaproveedor')
@section('style')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection
@section('Contenido')

<div class="d-flex justify-content-around "  >

  <div class="bg-white border  mb-3 overflow-auto " style="border-radius: 0px; max-height:550px ">
    <div class="card-header" style="background-color: #FFD507; width: 100%; padding: 8px" >
      <p class="text-center mt-3  fs-4"><b>Lista de Productos</b></p>
    </div>
    <div class="table-responsive pb-3 ps-5 pe-5 overflow-auto ">
      @if($productos-> isNotEmpty())
        <table class="table table-bordered border-dark table-hover">

          <thead class="table-dark" >
            <tr>
              <th>Nombre</th>
              <th>Precio Normal</th>
              <th>Precio Descuento</th>
              <th>Stock</th>
              <th>Fecha de vencimiento</th>
              <!--<th>Imagen</th>-->
            </tr>
          </thead>
          <tbody class="table-light">
            @foreach ($productos as $producto)
            <tr>
              <td>{{$producto->nombre}}</td>

              <td> {{$producto->precio}}</td>
              <td>{{$producto->preciodesc}}</td>
              <td>{{$producto->stock}}</td>
              <td>{{$producto->fechaven}}</td>
              <!--<td><img style="max-width: 100px; max-heidth:100px" src="{{$producto->url}}"   alt=""></td>-->

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