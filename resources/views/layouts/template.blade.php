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
    <link rel="stylesheet" href="{{ asset('template/mainstyle.css') }}">
    <title>Product Market</title>

</head>

<header>
    <nav class="navbar bg-white fixed-top">

            <div class="container-fluid">
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="{{ route('novedades.index') }}">
                        <!--<img src="./style/logo.png" class="logo">-->
                        <img src="{{ asset('template/logo.png') }}" width="60px" alt="Logo de ProductMarket">
                    </a>
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
                                <a href="/registroNegocio" class="nav-link active" aria-current="page" href="#">Registrar mi negocio</a>
                            </li>

                            <li class="nav-item">
                                <a href="/proveedor/paginaprincipal" class="nav-link active" aria-current="page" href="#">Ingresar como proveedor</a>
                            </li>

                            <li class="nav-item">
                                <a href="/listanegocio" class="nav-link active" aria-current="page" href="#">Ver Negocios</a>
                            </li>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<body class="d-flex flex-column">
    <!-- <header>
        <img src="{{ asset('template/logo.png') }}" width="60px" alt="Logo de ProductMarket">
    </header> -->

    <div class="margen" style="background: #E3E9E6; min-height:700px">
        @yield('content')  @section('content')
    </div>

    <div class="footer"></div>
</body>

</html>

