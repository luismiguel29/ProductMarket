<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <title>Document</title>

</head>

<body class="d-flex flex-column">
    <header>
        <img src="./style/logo.png" width="50px" alt="Logo de ProductMarket">
    </header>header

    

    <div class="d-flex justify-content-around">
        <section class="d-flex flex-column  align-self-center ">
            <button type="button" class="btn btn-secondary ">Editar</button> <br>
            <button type="button" class="btn btn-secondary">Registrar</button><br>
            <button type="button" class="btn btn-secondary">Ver productos</button>
        </section>

        <div class="card border-dark mb-3" style="width: 30rem;">

            <div class="card-body text-dark">

                <section class="card-text-center" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="text-center fs-5">Información del producto</h5>

                        <form action="{{route('producto.store')}}" method="post">
                            @csrf
                            <div class=" mb-3 input-group">
                                <input type="file" class="form-control" id="inputImg">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" name="nombreprod" id="categoria">
                            </div>


                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Precio antes</label>
                                <input type="number" step="any" class="form-control" name="preciodesc" id="pantes">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Precio ahora</label>
                                <input type="number" step="any" class="form-control" name="precionormal" id="pahora">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Fecha vencimiento</label>
                                <input type="date" class="form-control" name="fechavenprod" id="fvenc">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stockprod" id="stock">
                            </div>


                            <div class="mb-3">
                                <label for="floatingTextarea2">Descripción</label>
                                <textarea class="form-control" placeholder="Descripción general del producto" name="descripprod" id="descripcion" style="height: 100px"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Categorías</label>
                                <select class="form-select" id="seleccionarCategoría" name="categprod" aria-label="Floating label select example">
                                    <option selected>Seleccionar una categoría</option>
                                    <option value="1">Lacteos</option>
                                    <option value="2">Refrescos</option>
                                    <option value="3">Cereales</option>
                                    <option value="3">Detergentes</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-secondary botton1">Registrar</button>

                        </form>
                        <button type="submit" class="btn btn-secondary botton2">Cancelar</button>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <div class="footer"></div>
</body>


</html>