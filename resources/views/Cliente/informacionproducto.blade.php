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
                <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

                <link rel="stylesheet" href="style">
                <title>Product Market</title>
                @yield ('style')
            </head>

            <body class="d-flex flex-column">


                <header class="bann">
                    <div class="logo">
                        <img src="{{$categoria->url}}" width="100px">
                        <h2 class="nombreCat">
                            <strong>{{ $categoria->nombre }}</strong>
                        </h2>

                    </div>
                </header>

                <div class="boton">
                    <a style="color: #000000" href="/novedades"><strong>Volver </strong></a>
                </div>
            <div class="container">
                <div class="card-container">
                    <div class="header">
                        <a href="">
                            <img src="{{ $producto->url }}" alt="">
                        </a>
                    </div>
                    <div class="description">
                        <h1>{{ $producto->descripcion }}</h1>
                        <h1>{{ $producto->precio }}</h1>
                        
                    </div>
                </div>

            </div>


            </body>


        </html>

    </section>
@endsection
