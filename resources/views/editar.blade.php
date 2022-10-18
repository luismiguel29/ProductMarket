<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('editarAll/style.css') }}">
    <title>Product Market 🛒</title>
</head>
<!--VA LA PARTE DE LOS DATOS DEL NEGOCIO-->
<body>
    <header>
        <img src="./editarAll/img/Group 33.png" width="50x" alt="Logo de ProductMarket">
    </header>

    <main>
        <form action="" class="formularioEditar" method="post">
        @csrf
        @method('PUT')
            <h4>Editar datos del negocio</h4>

            <div class="control" for="nombre">
                <span>Nombre del negocio</span>
                <input type="text" name="nombre" id="nombre" autocomplete="" required value="{{$dato->NOMBRENEG}}">
            </div>

            <div class="control" for="direccion">
                <span>Dirección</span>
                <input type="text" name="direnccion" id="direccion" autocomplete="address-level1" required value="{{$dato->DIRECCIONNEG}}">
            </div>

            <div class="control" for="horario">
                <span>Horario de atención</span>
                <input type="text" name="horario" id="horario" autocomplete="" required value="{{$dato->HORARIONEG}}">
            </div>
                
            <div class="control" for="telefono">
                <span>Teléfono</span>
                <input type="number" name="telefono" id="telefono" autocomplete="" required value="{{$dato->TELEFONONEG}}">
            </div>

            <button type="submit" class="guardar">Guardar</button>
            <!--<input type="submit" value="Nombre" />-->
        </form>

        <section class="botonGral">
            <!--<button type="submit">Que color te gusta?</button>-->
            <div class="boton">
                <button>Editar</button>
            </div>

            <div class="boton">
                <button>Registrar producto</button>
            </div>

            <div class="boton">
                <button>Ver productos</button>
            </div>
        </section>
    </main>

    <footer>

    </footer>
</body>
</html>