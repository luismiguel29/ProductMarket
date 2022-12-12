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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                {{--  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbarRR" aria-controls="offcanvasNavbaR">
                    <span class="fa-solid fa-cart-shopping fa-2x"></span>

                </button> --}}
            </div>

            <!--
            <div class="busqueda">
          <form class="example" action="{{ route('buscar') }}">
            <input type="text" placeholder="Encuentra Lo Que Buscas de forma Rapida" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
               -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENÚ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">



                        @guest
                            {{-- <li class="nav-item">
                                <a href="{{ route('registroUsuario') }}" class="nav-link active" aria-current="page"
                                    href="#">Registrarse</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('registroNegocio.store') }}" class="nav-link active" aria-current="page"
                                    href="#">Registrar Negocio</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('login.index') }}" class="nav-link active" aria-current="page"
                                    href="#">Iniciar Sesion</a>
                            </li>
                            <li class="nav-item">
                                <a href="/listanegocio" class="nav-link active" aria-current="page" href="#">Ver
                                    Negocios</a>
                            </li>
                        @endguest

                        @auth
                            <div class="">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="#" class="nav-link active" aria-current="page"
                                        onclick="this.closest('form').submit()">
                                        Cerrar sesi&oacute;n
                                    </a>
                                </form>
                            </div>
                            {{-- <div class="">                            
                            <a href="{{ route('login.show', $verificar->idnegocio) }}" class="nav-link active" aria-current="page">
                                Ir a ventana Proveedor
                            </a>
                        </div> --}}
                        @endauth


                </div>
            </div>
            <!------------------------------------------------------------------------->
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbarRR" aria-controls="offcanvasNavbaR">
                    <span class="fa-solid fa-cart-shopping fa-2x"></span>

                </button>
                <a href="{{ route('novedades.index') }}">
                    <!--<img src="./style/logo.png" class="logo">-->

                </a>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarRR"
                aria-labelledby="offcanvasNavbarLabel">
                <div class=" header-carrito d-flex justify-content-between offcanvas-header">
                    <div class="d-flex flex-column center">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Tu carrito</h5>
                        <span class="fa-solid fa-cart-shopping fa-2x"></span>
                    </div>

                    <span type="submit" class="fa-sharp fa-solid fa-circle-xmark fa-2x"
                        data-bs-dismiss="offcanvas"></span>
                </div>


                @if ($total == 0)
                    <div class="botonCompra">
                        <img src="{{ asset('editarAll/img/carritovacio.png') }}" style="width: 100px; height: 100px;">
                    </div>

                    <p class="fs-4 text-center">Tu carrito está vacio</p>

                    <div class="botonCompra">
                        <a href="/novedades" class="btn btn-dark fs-5" style="width: 300px"
                            style="font-size: 60px">ELEGIR PRODUCTOS</a>
                    </div>
                @else
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                @foreach ($auxarr as $item)
                                    <div class="{{ $item->idcarrito }}" class="card mb-1" style="max-width:540px;">
                                        <div class="d-flex justify-content-center row g-0">
                                            <div class="col-sm-4">
                                                <img src="{{ $item->url }}" class="card-img-top">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    {{--  <span class="card-title"><b>Stock {{ $item->stock}}</b></span> --}}
                                                    <h6 class="card-title"><b>{{ $item->nombre }}</b></h6>
                                                    {{--  <span style="color:#5D5D5D">Antes <s>Bs.{{ $item->precio }}</s></span> --}}
                                                    <span><strong>Bs. {{ $item->preciodesc }}</strong></spa </div>
                                                        <a href=""></a>
                                                </div>
                                            </div>
                                            <div class="col-md-4 align-self-center">

                                                <div class="d-flex justify-content-around">
                                                    {{-- <a href="/decrementar/{{ $item->idcarrito }}"
                                                        class="fa-solid fa-square-minus fa-2x"
                                                        style="text-decoration: none;color:black"></a>
                                                    <span id="cant" style="font-size:20px">{{ $item->cantidad }}</span> --}}
                                                    <a type="button" onclick="remove({{ $item->idcarrito }});"
                                                        class="fa-solid fa-square-minus fa-2x"
                                                        style="text-decoration: none;color:black"></a>
                                                    <span id="{{ $item->idcarrito }}"
                                                        style="font-size:20px">{{ $item->cantidad }}</span>
                                                    {{-- <a href="/incrementar/{{ $item->idcarrito }}"
                                                    class="fa-solid fa-square-plus fa-2x"
                                                    style="text-decoration: none;color:black"></a> --}}

                                                    <a type="button" onclick="add({{ $item->idcarrito }});"
                                                        class="fa-solid fa-square-plus fa-2x"
                                                        style="text-decoration: none;color:black"></a>

                                                        <a type="button" onclick="refrescar({{ $item->idcarrito }});"
                                                            class="fa-solid fa-trash fa-2x"
                                                            style="text-decoration: none;color:black"></a>


                                                    {{-- <form action="{{ route('carrito.destroy', $item->idcarrito) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="fa-solid fa-trash fa-2x"
                                                            value="Eliminar" style="border:none"> </button>
                                                    </form> --}}

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </li>
                @endforeach
                </ul>

                <div class="d-flex justify-content-around">
                    <h5><strong>TOTAL</strong></h5>
                    <H5><strong id="total">Bs. {{ $total }}</strong></H5>
                </div>
                <!--<div class="botonCompra">
                            <button type="submit" class="btn btn-dark fs-5 {{-- btn-block --}}" style="width: 300px"
                                style="font-size: 60px" --}}>Finalizar Compra</button>
                        </div>-->
                <div class="botonCompra">
                    <a href="/endC" class="btn btn-dark fs-5 {{-- btn-block --}}" style="width: 300px"
                        style="font-size: 60px">Finalizar Compra</a>
                </div>

            </div>
            @endif
        </div>
        <!------------------------------------------------------------------------->
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

        <script src="{{ asset('js/ajax-post.js') }}" defer></script>

    </body>

    <script>
        function add(idcar) {
            $(document).ready(function() {
                $.ajax({
                    url: '/incrementar',
                    method: 'GET',
                    data: {
                        id: idcar,
                        _token: $('input[name="_token"]').val()
                    }
                }).done(function(res) {
                    $("#" + idcar + "").text(res.totalInc);
                    $("#total").text(res.totalF);
                    //alert(res);
                });
            });
        }

        function remove(idcar) {
            $(document).ready(function() {
                $.ajax({
                    url: '/decrementar',
                    method: 'GET',
                    data: {
                        id: idcar,
                        _token: $('input[name="_token"]').val()
                    }
                }).done(function(res) {
                    $("#" + idcar + "").text(res.totalDec);
                    $("#total").text(res.totalF);
                    //alert(res);
                });
            });
        }

        function refrescar(idcar){
                $(document).ready(function() {
                $.ajax({
                    url: '/eliminar',
                    method: 'GET',
                    data: {
                        id: idcar,
                        _token: $('input[name="_token"]').val()
                    }
                }).done(function(res) {
                    $("."+idcar+"").remove();
                    $("#total").text(res.totalF);
                    //alert(res);
                });
            });
        }
    </script>

    <script type="text/javascript">
        function mostrarPassword() {
            var cambio = document.getElementById("txtPassword");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }

        function mostrarPasswordrep() {
            var cambio = document.getElementById("txtPasswordrep");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>


    </html>
