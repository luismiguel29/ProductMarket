@extends('layouts.template')

@section('content')
    <!--d-flex justify-content-center align-items-center-->
    <div class="d-flex justify-content-around" style="padding-top: 52px;">

        <div class="card mb-5" style="width: 25rem;">

            <div class="card-header" style="background:#FFD507; padding: 25px;"></div>

            <div class="card-body text-dark card-custom-p">

                <form action="{{ route('login.store') }}" method="post" class="row g-3" id="formulario"
                    enctype="multipart/form-data">
                    <!--mt-3-->
                    @csrf
                    <h5 class="text-center fs-5">Bienvenido a Product Market</h5>

                    <!--------------------------------------------------->

                    @if (session('alerta'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('alerta') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('cerrar'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('cerrar') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!--------------------------------------------------->

                    <div class="col-12">
                        <label for="email" class="form-label">Correo Electronico</label>
                        <input type="text" name="email" class="form-control" id="" value="{{ old('email') }}"
                            required>
                    </div>

                    <div class="col-12">
                        <label for="contraseña" class="form-label">Contraseña</label>

                        <div class="col-12">
                            <div class="input-group">
                                <input ID="txtPassword" type="Password" Class="form-control" name="password" required>
                                <span class="input-group-btn">
                                    <button id="show_password" class="btn btn-secondary" type="button"
                                        onclick="mostrarPassword()">
                                        <span class="fa fa-eye-slash icon"></span> </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly">
                        <!--onclick="validarHorarios()"-->
                            <button type="submit" class="btn btn-dark fs-5" style="width:140px">Iniciar Sesión</button>

                            <a href="novedades" type="reset" class="btn btn-dark fs-5 ">Cancelar</a>

                            <!--<a href="/novedades" type="submit"
                                            class="btn btn-dark fs-5" style="width:140px">Guardar</a>-->
                            <!--<a href="proveedor/paginaprincipal" type="submit"
                                            class="btn btn-dark fs-5" style="width:140px">Inci</a>-->

                    </div>

                </form>

            </div>

        </div>

    </div>
@endsection
