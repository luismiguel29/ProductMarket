<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('editarAll/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <title>Product Market 🛒</title>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    -->
</head>
<!--VA LA PARTE DE LOS DATOS DEL NEGOCIO-->

<body class="d-flex flex-column" style="background: #E3E9E6">
    <header>
        <img src="./editarAll/img/Group 33.png" width="60px" alt="Logo de ProductMarket">
    </header>

    <!-- id="espacio"-->
    <div class="d-flex justify-content-evenly flex-column flex-md-row" style="padding-top: 50px;">
        <section class="d-flex flex-column  align-self-center gap-4 order-2 order-md-1">
            <button class="btn btn-dark fs-5 btnb">Editar</button>
            <a href="categoria" class="btn btn-dark fs-5 btnb">Registrar producto</a>
            <a href="proveedor/listaproducto" class="btn btn-dark fs-5 btnb">Ver productos</a>
            <a href="/novedades" class="btn btn-dark fs-5 btnb">Cerrar sesión</a>
        </section>


        <div class="d-flex card mb-5 align-self-center order-1 order-md-2" style="width: 25rem;">
            <div class="card-header c-header" style="background-color: #FFD507; padding:25px"> </div>
            <div class="card-body text-dark card-custom-p">

                

            </div>

        </div>


    </div>

    <div class="footer"></div>
</body>

</html>
