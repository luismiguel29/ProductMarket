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
                <link rel="stylesheet" href="{{ asset('css/style2.css') }}">


                <link rel="stylesheet" href="style">
                <title>Product Market</title>
                @yield ('style')
            </head>

            <body class="d-flex flex-column">


                <header class="bann">
                    <div class="logo">
                        <img src="{{$categoryName->url}}" width="100px">
                        <h2 class="nombreCat">
                            <strong>{{$categoryName->nombre}}</strong>
                        </h2>

                    </div>
                </header>


             <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ( $productos as $producto )
                    <div class="col" >
                        <div class="card" style="width: 18rem;">
                        <div class="card-header" style="background-color: #000000" >
                            <div style="color: #ffffff">Super oferta</div>
                        </div>
                        <img class="card-img-top" src="{{$producto->url}}" alt="Card image cap">
                        <div class="card-body">
                        <p class="card-text">{{$producto->nombre}}</p>
                        </div>
                        <div class="card-footer overflow-hidden" style="background-color: #FFD507">
                            @if ($producto->preciodesc>0)
                                <span> <strong>Bs</strong> <s>{{$producto->precio}}</s> /</span>
                                <span> <strong>Bs</strong> {{$producto->preciodesc}}</span>
                            @else
                                <span>{{$producto->precio}}</span>
                            @endif
                        </div>
                        </div>
                    </div>
                @endforeach


                </div>
                <div class="lis">
                    {!!$productos->links()!!}
                </div>


            </body>


        </html>

    </section>
@endsection
