@extends('Proveedor.Paginaproveedor')
@section('style')
<link href="{{ asset('css/bodyproveedor.css') }}" rel="stylesheet">

@endsection
@section('Contenido')

<div class="container">
  <div class="row">
    <div class="col">
      <div class="table-responsive bg-white ">
        <table class="table table-bordered table-striped table-primary caption-top">
          <caption>Lista de Productos</caption>
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
              <td> {{$producto->PRECIONORMAL}} </td>
              <td>{{$producto->PRECIODESC}}</td>
              <td>14</td>
              <td>14</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{var_dump($productos[0])}}
      </div>

    </div>
  </div>
</div>


@endsection

    



