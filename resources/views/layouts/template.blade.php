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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('template/mainstyle.css') }}">
    <title>Product Market</title>

</head>

<header>
    <nav class="navbar bg-white fixed-top">

        <div class="container-fluid">
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="{{ route('novedades.index') }}">
                    <!--<img src="./style/logo.png" class="logo">-->
                    <img src="{{ asset('template/logo.png') }}" width="60px" alt="Logo de ProductMarket">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbarRR" aria-controls="offcanvasNavbaR">
                    <span class="fa-solid fa-cart-shopping fa-2x"></span>

                </button>
            </div>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENÚ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a href="/registroNegocio" class="nav-link active" aria-current="page"
                                href="#">Registrar mi negocio</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('login.index') }}" class="nav-link active" aria-current="page"
                                href="#">Iniciar Sesion</a>
                        </li>

                        <li class="nav-item">
                            <a href="/listanegocio" class="nav-link active" aria-current="page" href="#">Ver
                                Negocios</a>
                        </li>
                </div>
            </div>

        
            <div class="offcanvas offcanvas-end" tabindex="{{-- -1 --}}1" id="offcanvasNavbarRR"
                aria-labelledby="offcanvasNavbarLabel">
                <div class=" header-carrito d-flex justify-content-between offcanvas-header">
                    <div class="d-flex flex-column center">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Tu carrito</h5>
                        <span class="fa-solid fa-cart-shopping fa-2x"></span>
                    </div>

                    <span type="submit" class="fa-sharp fa-solid fa-circle-xmark fa-2x"
                        data-bs-dismiss="offcanvas"></span>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            @foreach ($auxarr as $item)
                                <div class="card mb-1" style="max-width:540px;">
                                    <div class="d-flex justify-content-center row g-0">
                                        <div class="col-sm-4">
                                            <img src="{{ $item->url }}" class="card-img-top">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                {{--  <span class="card-title"><b>Stock {{ $item->stock}}</b></span> --}}
                                                <h6 class="card-title"><b>{{ $item->nombre }}</b></h6>
                                                {{--  <span style="color:#5D5D5D">Antes <s>Bs.{{ $item->precio }}</s></span> --}}
                                                <span>Ahora <strong>Bs. {{ $item->preciodesc }}</strong></spa </div>
                                                    <a href=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 align-self-center">
                                            <div class="d-flex justify-content-around">
                                                <a href="/decrementar/{{ $item->idcarrito }}"
                                                    class="fa-solid fa-square-minus fa-2x"
                                                    style="text-decoration: none;color:black"></a>
                                                <span style="font-size:20px">{{ $item->cantidad }}</span>
                                                <a href="/incrementar/{{ $item->idcarrito }}"
                                                    class="fa-solid fa-square-plus fa-2x"
                                                    style="text-decoration: none;color:black"></a>


                                                <form action="{{ route('carrito.destroy', $item->idcarrito) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="fa-solid fa-trash fa-2x"
                                                        value="Eliminar" style="border:none"> </button>
                                                </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                        </li>
                        @endforeach


                    </ul>

                    <div class="d-flex justify-content-around">
                        <h5><strong>TOTAL</strong></h5>
                        <H5><strong>Bs. {{ $total }}</strong></H5>
                    </div>
                    <div class="botonCompra">
                        <button type="submit" class="btn btn-dark fs-5 {{-- btn-block --}}" style="width: 300px"
                            style="font-size: 60px" --}}>Finalizar Compra</button>
                    </div>
                </div>


            </div>
    </nav>


</header>

<body class="d-flex flex-column">
    <h1></h1>
    <!-- <header>
        <img src="{{ asset('template/logo.png') }}" width="60px" alt="Logo de ProductMarket">
    </header> -->

    <div class="margen" style="background: #E3E9E6; min-height:700px">
        @yield('content') @section('content')
        </div>

        <div class="footer"></div>
    </body>

    </html>
