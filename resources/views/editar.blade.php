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
    <title>Product Market</title>
    <!-- 🛒
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

        <section class="d-flex flex-column  align-self-center gap-4 mb-4 mb-md-0 order-2 order-md-1">
            <button class="btn btn-dark fs-5 btnb">Editar</button>
            <a href="categoria" class="btn btn-dark fs-5 btnb">Registrar producto</a>
            <a href="proveedor/listaproducto" class="btn btn-dark fs-5 btnb">Ver productos</a>
            <a href="/novedades" class="btn btn-dark fs-5 btnb">Cerrar sesión</a>
        </section>


        <div class="d-flex justify-content-around order-1 order-md-2" style="padding-top: 20px;">

            <div class="card mb-5" style="width: 25rem;">
            
                <div class="card-header" style="background:#FFD507; padding: 25px;"></div>

                <div class="card-body text-dark card-custom-p">
        
                    <form action="{{ route('datosNego.update', $dato->idnegocio) }}" method="post" class="formularioEditar">
                        @csrf
                        @method('PUT')
                        <h5 class="text-center fs-5">Editar datos del negocio</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('message') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!--pattern="[A-Z][A-Z,a-z, ,ñ,á,í,é,ó,ú]+"-->
                        <div class="mb-3">
                            <span>Nombre del negocio</span>
                            <input class="form-control" type="text" name="nombre" required="" minlength="1"
                                maxlength="30" id="nombre" autocomplete="" required value="{{ $dato->nombre }}">
                        </div>

                        <!--pattern="[A-Z][A-Z,a-z,0-9, ,ñ,á,í,é,ó,ú]+" minlength="10">-->
                        <div class="mb-3">
                            <span>Dirección</span>
                            <input class="form-control" type="text" name="direccion" required=""
                                pattern="{1,50}" minlength="10" maxlength="50" id="direccion" autocomplete="address-level1"
                                required value="{{ $dato->direccion }}"
                                onkeypress="return ( (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32 || event.charCode == 44 || event.charCode == 46) )">
                        </div>

                        <div class="mb-3">
                            <span>Horario de apertura</span>
                            <input class="form-control" type="time" name="horario1" required="" id="horario1"
                                autocomplete="" required value="{{ $dato->horarioinicio }}">
                        </div>

                        <div class="mb-3">
                            <span>Horario de cierre</span>
                            <input class="form-control" type="time" name="horario2" required="" id="horario2"
                                autocomplete="" required value="{{ $dato->horariofin }}">
                        </div>

                        <!--TC-66-->
                        <!--onkeypress="return( event.charCode != 32 || event.charCode != 39 || event.charCode != 34 || event.charCode != 44 || event.charCode != 46 ||  event.charCode != 47 || event.charCode != 92 || event.charCode != 64 || event.charCode !=209 || event.charCode !=241)"-->
                        <div class="mb-3">
                            <span>Teléfono</span>
                            <input class="form-control" type="tel" name="telefono" id="telefono"
                                required="" pattern="^[6|7]\d{7}$" minlength="8" maxlength="8"
                                autocomplete="" required value="{{ $dato->telefono }}"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                        </div>

                        <div class="d-flex justify-content-evenly ">
                            <button type="submit" class="btn btn-dark fs-5 ">Guardar</button>
                            <a href="proveedor/paginaprincipal" type="reset"
                                class="btn btn-dark fs-5 ">Cancelar</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>


    </div>

    <div class="footer"></div>
</body>

</html>
