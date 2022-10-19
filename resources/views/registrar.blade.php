<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('style/main.css') }}">
    <title>Document</title>

</head>

<body class="d-flex flex-column">
    <header>
        <img src="./style/logo.png" width="50px" alt="Logo de ProductMarket">
    </header>header



    <div class="d-flex justify-content-around">
        <section class="d-flex flex-column  align-self-center gap-4">
            <button type="button" class="btn btn-secondary fs-5">Editar</button>
            <a type="button" class="btn btn-secondary fs-5">Registrar</a>
            <button type="button" class="btn btn-secondary fs-5">Ver productos</button>
        </section>

        <div class="card border-dark mb-3" style="width: 30rem;">
            <div class="card-body text-dark card-custom-p">

                <h5 class="text-center fs-5">Información del producto</h5>

                <form action="{{route('producto.store')}}" method="post">
                    @csrf
                    <!--<div class=" mb-3 input-group">
                                <input type="file" class="form-control" id="inputImg">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>-->

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

                   <!-- <div class="mb-3">
                        <label for="">Categoría</label>
                        <select class="form-select" id="seleccionarCategoría" name="categprod" aria-label="Floating label select example">
                
                            <option selected>Seleccionar una categoría</option>
                            <option value="1">Lacteos</option>
                            <option value="2">Refrescos</option>
                            <option value="3">Cereales</option>
                            <option value="3">Detergentes</option>
                         
                        </select>
                    </div>
                    -->
                    <div class="mb-3">
                        <label for="" class="form-label">URL de la imágen</label>
                        <input type="text" class="form-control" name="url_img" id="url_img">
                    </div>

                    <!--<button type="submit" class="btn btn-secondary botton1">Registrar</button>-->
                    <div class="d-flex justify-content-evenly ">
                        <button type="submit" class="btn btn-secondary fs-5 ">Registrar</button>
                       <a type="button" href="" class="btn btn-secondary fs-5">Cancelar</a>
                    </div>


                </form>
                <!--<button type="submit" class="btn btn-secondary botton2">Cancelar</button>-->

            </div>
        </div>
    </div>

    <div class="footer"></div>
</body>


</html>