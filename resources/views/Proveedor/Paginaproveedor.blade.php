head body con los botones y footer
@extends('layouts.headproveedor')

@section('body')
        <div class="btn-vertical">
            <button type="button" class="btn btn-primary btn-lg">Modificar datos</button>
            <button type="button" class="btn btn-secondary btn-lg">Registra producto</button>
            <button type="button" class="btn btn-secondary btn-lg">Ver lista de productos</button>
        </div>
      @yield('Contenido')
@endsection  





