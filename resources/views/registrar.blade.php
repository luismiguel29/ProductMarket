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
    <link rel="stylesheet" href="{{ asset('style/main.css') }}">
    <title>Product Market</title>

</head>

<body class="d-flex flex-column">
    <header>
        <img src="./style/logo.png" width="60px" alt="Logo de ProductMarket">
    </header>

    <div class="d-flex justify-content-evenly flex-column flex-md-row" style="padding-top: 50px;">
        <!--<section class="d-flex flex-column  align-self-center gap-4">
            <button type="button" class="btn btn-secondary fs-5">Editar</button>
            <a type="button" class="btn btn-secondary fs-5">Registrar</a>
            <button type="button" class="btn btn-secondary fs-5">Ver productos</button>
        </section>-->

        <section class="d-flex flex-column align-self-center gap-4 order-2 order-md-1">
            <a href="datosNego" class="btn btn-dark fs-5 btnb" style="">Editar</a>
            <a href="categoria" class="btn btn-dark fs-5  btnb">Registrar producto</a>
            <a href="proveedor/listaproducto" class="btn btn-dark fs-5  btnb">Ver productos</a>
            <a href="/novedades" class="btn btn-dark fs-5 btnb">Cerrar sesión</a>
        </section>

        <div class="d-flex justify-content-around order-1 order-md-2" style="padding-top: 20px;">

            <div class="card mb-5" style="width: 25rem;">
            
                <div class="card-header" style="background:#FFD507; padding: 25px;"></div>

                <div class="card-body text-dark card-custom-p">
        
                    <h5 class="text-center fs-5">Información del producto</h5>
                        {{-- @include('components.flash_alerts') --}}
                        <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--<div class=" mb-3 input-group">
                                <input type="file" class="form-control" id="inputImg">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>-->

                            <div class="mb-3">
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif --}}
                                @if (session('message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('message') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session('alerta'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session('alerta') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <label for="" class="form-label">Nombre del producto</label>
                                <input class="form-control" name="nombreprod" required="" id="categoria"
                                    type="text" value="{{isset($producto)? $producto->nombre: old('nombreprod') }}"
                                    onkeypress="return ( (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) )"
                                    minlength="3" maxlength="50">
                            </div>


                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Precio antes</label>
                                <input type="number" step="any" class="form-control" name="precio"
                                    value="{{isset($producto)? $producto->precio: old('precio') }}" required="" id="pantes" min="1"
                                    max="1000">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Precio ahora</label>
                                <input type="number" step="any" class="form-control" name="preciodesc"
                                    value="{{isset($producto)? $producto->preciodesc: old('preciodesc') }}" required="" id="pahora" min="1"
                                    max="1000">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Categoria</label>
                                <select name="categoria" class="form-select" aria-label="Default select example"
                                    required="">
                                    <option selected>Selecione una categoria</option>
                                    @foreach ($categoria as $item)
                                        <option value="{{ $item->idcategoria }}" {{(isset($producto) && $producto->id_categoria ==$item->idcategoria)? 'selected':'' }}>{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!--update date-->
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Fecha inicio promo</label>
                                <input type="date" class="form-control" name="fechainiciopromo" max="2023-01-22"
                                    value="{{isset($producto)? $producto->fechainicio: old('fechainiciopromo') }}" required=""
                                    placeholder="Introduce una fecha" required min=<?php $hoy = date('Y-m-d');
                                    echo $hoy; ?> id="fvenc">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Fecha fin promo</label>
                                <input type="date" class="form-control" name="fechafinpromo" max="2023-01-22"
                                    value="{{isset($producto)? $producto->fechafin: old('fechafinpromo') }}" required=""
                                    placeholder="Introduce una fecha" required min=<?php $hoy = date('Y-m-d');
                                    echo $hoy; ?> id="fvenc">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Fecha vencimiento</label>
                                <input type="date" class="form-control" name="fechavenprod" max="2023-01-22"
                                    value="{{isset($producto)? $producto->fechaven: old('fechavenprod') }}" required=""
                                    placeholder="Introduce una fecha" required min=<?php $hoy = date('Y-m-d');
                                    echo $hoy; ?> id="fvenc">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stockprod"
                                    value="{{isset($producto)? $producto->stock: old('stockprod') }}"
                                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required=""
                                    id="stock" min="1" max="999">
                            </div>


                            <div class="mb-3">
                                <label for="floatingTextarea2">Descripción</label>
                                <textarea class="form-control" placeholder="Descripción general del producto" name="descripprod" required=""
                                    id="descripcion" pattern="[a-zA-Z]{3,50}" minlength="3" maxlength="50" style="height: 100px"
                                    onkeypress="return ( (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57)|| (event.charCode == 164) || (event.charCode == 165)|| (event.charCode == 239))">{{isset($producto)? $producto->descripcion:''}}</textarea>
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
                    </div>-->

                            <div class="mb-3">
                                <label for="" class="form-label">URL de la imágen</label>

                                <input type="file" class="form-control" name="url_img" required="" onchange="preview()"
                                    id="url_img" accept="image/*">
                                    <img style="max-width:200px"src="" alt="" id="uno"/>
                            </div>

                            <!--<button type="submit" class="btn btn-secondary botton1">Registrar</button>-->
                            <div class="d-flex justify-content-evenly ">
                                <button type="submit" class="btn btn-dark fs-5 ">Registrar</button>
                                <a type="button" href="proveedor/paginaprincipal"
                                    class="btn btn-dark fs-5">Cancelar</a>
                            </div>


                        </form>
                        <!--<button type="submit" class="btn btn-secondary botton2">Cancelar</button>-->
                        <script>
                          var image="{{isset($producto)? $producto->url:''}}"   
                          if(image !=""){
                            document.getElementById ("uno").src= image
                        }
                        function preview() {
                            document.getElementById ("uno").src= URL.createObjectURL(event.target.files[0]);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>
        <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ¡Hola Mundo! Este es un mensaje de toast.
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <div class="footer"></div>

</body>


</html>
