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
    <div class="d-flex justify-content-around" style="padding-top: 52px;">

        <div class="card mb-5" style="width: 25rem;">
        
            <div class="card-header" style="background:#FFD507; padding: 25px;"></div>

            <div class="card-body text-dark card-custom-p">

                <form action="{{route('datosNego.store')}}" method="post" class="row g-3"> <!--mt-3-->
                    @csrf
                    <h5 class="text-center fs-5">Registro del negocio</h5>

                    <!--------------------------------------------------->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    @if (session('message')) 
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <!--------------------------------------------------->

                    <div class="col-12">
                        <label for="nombre" class="form-label">Nombre del negocio</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required maxlength="30">
                    </div>

                    <div class="col-12">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" required maxlength="50">
                    </div>

                    <div class="col-12">
                        <label for="horarioA" class="form-label">Horario de apertura</label>
                        <input type="time" name="horarioA" class="form-control" id="horarioA" required>
                    </div>

                    <div class="col-12">
                        <label for="horarioC" class="form-label">Horario de cierre</label>
                        <input type="time" name="horarioC" class="form-control" id="horarioC" required>
                    </div>

                    <div class="col-12">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="tel" name="celular" class="form-control" id="celular" required 
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" 
                                minlength="8" maxlength="8" pattern="^[6|7]\d{7}$">
                    </div>

                    <div class="d-flex justify-content-evenly">
                        <button type="submit" class="btn btn-dark fs-5">Guardar</button>
                        <a href="" type="reset"
                            class="btn btn-dark fs-5">Cancelar</a>
                    </div>

                </form>

            </div>
            
        </div>

    </div>

</body>
</html>