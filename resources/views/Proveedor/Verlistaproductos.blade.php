@extends('Proveedor.Paginaproveedor')
@section('style')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection
@section('Contenido')

<div class="d-flex justify-content-around "  >

  <div class="bg-white border  mb-3 overflow-auto " style="border-radius: 0px; max-height:550px ">
    <div class="card-header" style="background-color: #FFD507; width: 100%; padding: 6px" >
      <p class="text-center mt-3  fs-4"><b>Lista de Productos</b></p>
    </div>
    <div class="table-responsive mt-3 pb-3 ps-5 pe-5 overflow-auto ">
      @if($productos-> isNotEmpty())
        <table class="table table-bordered border-dark table-hover">

          <thead class="table-dark" >
            <tr>
              <th>Nombre</th>
              <th>Precio Normal</th>
              <th>Precio Descuento</th>
              <th>Stock</th>
              <th>Categoria</th>
              <th>Fecha de promocion</th>
              <th>Imagen</th>
              <th>Acciones</th>
            
            </tr>
          </thead>
          <tbody class="table-light">
            @foreach ($productos as $producto)
            <tr>
              <td>{{$producto->nombre}}</td>

              <td> {{$producto->precio}}</td>
              <td>{{$producto->preciodesc}}</td>
              <td>{{$producto->stock}}</td>
              <td>{{$producto->catnombre}}</td>
              <td> 
                @if ( is_null ($producto->fechainicio))
                    Sin fecha
                @else
                {{$producto->fechainicio}} &nbsp; / {{$producto->fechafin}} 
                @endif
                </td>
              <td><img style="max-width: 100px; max-heidth:100px" src="{{$producto->url}}"  alt=""></td>
              
                  <td><a href="{{route('editarProductos',['id'=>$producto->idproducto])}}" class="btn"><i data-feather="edit"></i></a>
                    <button class="btn delete-btn" data-bs-toggle="modal" data-id="{{$producto->idproducto}}" data-bs-target="#deleteModal"><i data-feather="trash-2" ></i></button></td>
              

            </tr>
            @endforeach

          </tbody>
        </table>
        <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Producto</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('eliminarProductos') }}" method="post">
                  <div class="modal-body">
                    @csrf
                    @method('delete')
                    <input id="id" name="id" hidden>
                    ¿Esta seguro de eliminar este producto?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button  class="btn btn-dark">Eliminar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

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
  <script>
    $(document).ready(function(){

        $('.delete-btn').on('click', function(){

          let id = $(this).attr('data-id');
              $('#id').val(id);

        });
    });
  </script>

</div>
@endsection