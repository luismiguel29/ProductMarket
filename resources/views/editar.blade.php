<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('editarAll/style.css') }}">
    <title>Product Market 🛒</title>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    -->
</head>
<!--VA LA PARTE DE LOS DATOS DEL NEGOCIO-->
<body>
    <header>
        <img src="./editarAll/img/Group 33.png" width="50x" alt="Logo de ProductMarket">
    </header>

    <main>
        <form action="{{ route('datosNego.update',$dato->IDNEG) }}" method="post" class="formularioEditar">
            @csrf
            @method('PUT')
            <h4>Editar datos del negocio</h4>

            <div class="control" for="nombre">
                <span>Nombre del negocio</span>
                <input type="text" name="nombre" required="" pattern="{1,50}" id="nombre"  autocomplete="" required value="{{$dato->NOMBRENEG}}" >
            </div>

            <div class="control" for="direccion">
                <span>Dirección</span>
                <input type="text" name="direccion" required="" pattern="{1,50}" id="direccion" autocomplete="address-level1" required value="{{$dato->DIRECCIONNEG}}">
            </div>

            <div class="control" for="horario">
                <span>Horario de atención</span>
                <input type="time" name="horario" required="" id="horario" autocomplete="" required value="{{$dato->HORARIONEG}}">
            </div>

            <div class="control" for="telefono">
                <span>Teléfono</span>
                <input type="number" name="telefono" id="telefono" autocomplete="" required value="{{$dato->TELEFONONEG}}" min="40000000" max="79999999">
            </div>

            <div>
                <button type="submit" class="guardar">Guardar</button>
                <a href="proveedor/paginaprincipal" type="reset" class="guardar">Cancelar</a>
            </div>

        </form>

        <section class="botonGral">
            <div class="boton">
                <button>Editar</button>
            </div>

            <div class="boton">
                <a href="registrar"><button>Registrar producto</button></a>
            </div>

            <div class="boton">
                <!--<button>Ver productos</button>-->
                <a href="proveedor/listaproducto"><button>Ver producto</button></a>
            </div>
        </section>
    </main>

    <footer>

    </footer>
</body>
</html>
