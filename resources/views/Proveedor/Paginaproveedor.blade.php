
    @extends('layouts.index')

        @section('body')

        <div class="d-flex justify-content-around " style="padding-top: 15px;" >
        <div class="container-fluid">
        <div class="row " style="min-height:600px">

            <div class="btn-vertical col d-flex  flex-column align-self-center   d-flex justify-content-start" style="padding-right:15em">
            <div class="my-3 mx-auto"><a class="btn btn-dark fs-5 " href="/datosNego" style="width:185px">Editar</a></div>
            <div class="my-3 mx-auto"><a class="btn btn-dark fs-5" href="/categoria" style="width:185px">Registrar producto</a></div>
            <div class="my-3 mx-auto"><a class="btn btn-dark fs-5" href="{{route('listaproducto')}}" style="width:185px">Ver productos</a></div>
            <div class="my-3 mx-auto"><a class="btn btn-dark fs-5" href="/novedades" style="width:185px">Cerrar sesi&oacute;n</a></div>
            </div>


            <div class="col">
            @yield('Contenido')
            </div>
        </div>
        </div>


        <div></div>
        </div>
    @endsection
