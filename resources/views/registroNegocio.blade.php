<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Market 🛒</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>
<body>

    <!--d-flex justify-content-center align-items-center-->
    <div class="border m-5">
    
    
    <div class="card border-dark" style="width: 25rem;">
    
        <div class="card-header" style="background:#FFD507"></div>

        <div class="card-body text-dark card-custom-p">

            <form action="" class="row g-3"> <!--mt-3-->

                <h5 class="text-center fs-5">Registro del negocio</h5>

                <div class="col-12">
                    <label for="nombre" class="form-label">Nombre del negocio</label>
                    <input type="text" class="form-control" id="nombre">
                </div>

                <div class="col-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion">
                </div>

                <div class="col-12">
                    <label for="horarioA" class="form-label">Horario de apertura</label>
                    <input type="text" class="form-control" id="horario">
                </div>

                <div class="col-12">
                    <label for="horarioC" class="form-label">Horario de cierre</label>
                    <input type="text" class="form-control" id="horarioC">
                </div>

                <div class="col-12">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="celular">
                </div>

                <div class="d-flex justify-content-evenly">
                    <button type="submit" class="btn btn-dark fs-5">Guardar</button>
                    <a href="proveedor/paginaprincipal" type="reset"
                        class="btn btn-dark fs-5">Cancelar</a>
                </div>

            </form>

        </div>
        
    </div>


    </div>

</body>
</html>