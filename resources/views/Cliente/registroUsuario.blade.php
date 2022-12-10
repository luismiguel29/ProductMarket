@extends('layouts.template3')

@section('content')
    <!--d-flex justify-content-center align-items-center-->
    <div class="d-flex justify-content-around" style="padding-top: 52px;">

        <div class="card mb-5" style="width: 25rem;">

            <div class="card-header" style="background:#FFD507; padding: 25px;"></div>

            <div class="card-body text-dark card-custom-p">

                <form action="{{ route('registrarUser', Crypt::encrypt($verificar->idnegocio)) }}" method="post" class="row g-3"
                    id="formulario" enctype="multipart/form-data">
                    <!--mt-3-->
                    @csrf
                    <h5 class="text-center fs-5">Registro de Usuario</h5>

                    <!--------------------------------------------------->

                    @if (session('alerta'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('alerta') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('mensaje'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('mensaje') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('existe'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('existe') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (!empty($existe))
                        <div class="alert alert-warning"> {{ $existe }}</div>
                    @endif

                    <!--------------------------------------------------->

                    <div class="col-12">
                        <label for="email" class="form-label">Correo Electronico</label>
                        <input type="email" name="email" class="form-control" id="" value="{{ old('email') }}"
                            required pattern=".+@gmail\.com" minlength="4" maxlength="30"
                            title="El correo electronico debe tener la extension gmail.com. Letras mayuculas, minuscula y numeros"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)
                            || (event.charCode == 64) || (event.charCode == 46))">
                    </div>

                    <div class="col-12">
                        <label for="contraseña" class="form-label">Contraseña</label>

                        <div class="col-12">
                            <div class="input-group">
                                <input ID="txtPassword" type="Password" Class="form-control" name="password" required
                                    minlength="6" maxlength="20"
                                    onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
                                <span class="input-group-btn">
                                    <button id="show_password" class="btn btn-secondary" type="button"
                                        onclick="mostrarPassword()">
                                        <span class="fa fa-eye-slash icon"></span> </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="contraseña" class="form-label">Repetir contraseña</label>

                        <div class="col-12">
                            <div class="input-group">
                                <input ID="txtPasswordrep" type="Password" Class="form-control" name="passwordrep" required
                                    minlength="6" maxlength="20"
                                    onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
                                <span class="input-group-btn">
                                    <button id="show_passwordrep" class="btn btn-secondary" type="button"
                                        onclick="mostrarPasswordrep()">
                                        <span class="fa fa-eye-slash icon2"></span> </button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-evenly">
                        <!--onclick="validarHorarios()"-->
                            <button type="submit" class="btn btn-dark fs-5" style="width:140px">Registrarse</button>
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
