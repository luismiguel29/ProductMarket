@extends('layouts.template')

@section('content')
        <!DOCTYPE html>
         <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="{{ asset('css/style3.css') }}">


                <link rel="stylesheet" href="style">
                <title>Product Market</title>
                @yield ('style')
            </head>

            <body class="d-flex flex-column">


                <header class="bann">
                    <div class="logo">
                        <img src="\Imagenes\tienda.png" width="100px">
                        <h2 class="nombreCat">
                            <strong>Negocios</strong>
                        </h2>

                    </div>
                </header>

                <div class="boton">
                    <a style="color: #000000" href="/novedades"><strong>Volver </strong></a>
                </div>
            <div class="container">
                @if($datos-> isNotEmpty())
                        <div class="row row-cols-2">
                            @foreach ( $datos as $dato )
                                <div class="col" >
                                    <div class="card" style="width: 18rem;">
                                    <div class="card-header" style="background-color: #FF0000" >
                                        <div style="color: #FF0000"><strong>l</strong></div>
                                    </div>
                                    <img class="card-img-top" src="{{$dato->url}}" alt="Card image cap">
                                    <div class="card-body">
                                    <p class="card-text"><strong>{{$dato->nombre}}</strong></p>
                                    <p class="card-text">{{$dato->direccion}}</p>
                                    </div>
                                    <div class="card-footer overflow-hidden" style="background-color: #FFD507">

                                            <span><strong>Hr.de atencion de </strong>{{$dato->horarioinicio}} </span>
                                            <span><strong>a </strong>{{$dato->horariofin}}</span>

                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                 @else

                    <div class="alert alert-dark" role="alert">
                        No se registraron negocios!
                    </div>
                @endif

            </div>

            <div class="lis">
                {!!$datos->links()!!}
            </div>

            </body>


        </html>

    </section>
@endsection

