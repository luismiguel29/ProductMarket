@extends('layouts.template')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="{{ asset('css/styleluis.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

        <link rel="stylesheet" href="{{ asset('slider/css/styleslider.css') }}">
        <link rel="stylesheet" href="{{ asset('slider/css/swiper-bundle.min.css') }}">

        <link rel="stylesheet" href="style">
        <title>Product Market</title>
        @yield ('style')
    </head>

    <body class="d-flex flex-column">


        <header class="bann">
            <div class="logo">
                <img src="{{ $categoria->url }}" width="100px">
                <h2 class="nombreCat">
                    <strong>{{ $categoria->nombre }}</strong>
                </h2>

            </div>
        </header>

        <div class="boton">
            <a style="color: #000000" href="{{ route('verproductos.show', $categoria->idcategoria) }}"><strong>Volver</strong></a>
            {{-- <a style="color: #000000" href="{{ url()->previous() }}"><strong>Volver</strong></a> --}}
            @if (session('alerta'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 100%">
                    <strong>{{ session('alerta') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
                    <strong>{{ session('mensaje') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        @php
            $id = $producto->idproducto;
        @endphp

        <form action="{{ route('addcarrito', $id) }}" method="POST">
            @csrf
            <div class="container">
                <div class="card-container">

                    <div class="header">
                        <a href="">
                            <img src="{{ $producto->url }}" alt="">
                        </a>
                    </div>
                    <div class="description">
                        {{-- <h5><strong>{{ $producto->descripcion }}</strong></h5>
                        <h5><span style="color: #7D7D7D">Antes Bs. <s>{{ $producto->precio }}</span></s> / <strong>Ahora Bs. {{ $producto->preciodesc }}</strong></h4>
                        <h5><strong>Oferta hasta: {{ $producto->fechafin }}</strong></h5>
                        <h5><span style="color: #7D7D7D">Fecha de venc: {{ $producto->fechaven }}</span></h5>
                        <h5><span style="color: #7D7D7D">Stock: {{ $producto->stock }}</span></h5>
                        <hr class="separador">
                        <h5><strong>{{ $negocio->nombre }}</strong></h5>
                        <h5><strong>{{ $negocio->direccion }}</strong></h5>
                        <h5><span style="color: #7D7D7D">Horario: {{ $negocio->horarioinicio }} - {{ $negocio->horariofin }}</span> </h5>
                        
                        <div class="botonCarrito">
                            <button type="submit" class="btn btn-dark fs-5 btn-lg" style="font-size: 40px">Agregar al Carrito</button>
                        </div> --}}

                        <h5>{{ $producto->descripcion }}</h5>
                        <h5><span style="color: #7D7D7D">Antes Bs. <s >{{ $producto->precio }}</s></span> / Ahora Bs.
                            {{ $producto->preciodesc }}</h4>
                            <h5>Oferta hasta: {{ $producto->fechafin }}</h5>
                            <h5><span style="color: #7D7D7D">Fecha de venc: {{ $producto->fechaven }}</span></h5>
                            <h5><span style="color: #7D7D7D">Stock: {{ $producto->stock }}</span></h5>
                            <hr class="separador">
                            <h5>{{ $negocio->nombre }}</h5>
                            <h5>{{ $negocio->direccion }}</h5>
                            <h5><span style="color: #7D7D7D">Horario: {{ $negocio->horarioinicio }} -
                                    {{ $negocio->horariofin }}</span> </h5>

                            <div class="botonCarrito">
                                <button type="submit" class="btn btn-dark fs-5 btn-lg" style="font-size: 40px">Agregar al
                                    Carrito</button>
                            </div>
                    </div>
                </div>

            </div>
        </form>





    </body>

    <script src="{{ asset('slider/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('slider/js/script.js') }}"></script>

    </html>

    </section>
@endsection
