@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro</li>
@endsection

@section('content')
    <div class="container my-lg">
        <h2 class="doc-section-title" id="examples">Habilitación de Usuario<a class="section-link"></a></h2>
        <div class="doc-example">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="post" action="{{ url('registro') }}" id="ValidarModal"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-md">
                                <div class="control-group ">
                                    <label for="exampleFormControlInput1">Usuario:</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" required />
                                </div>
                            </div>

                            <div class="col-md-6 mb-md">
                                <div class="control-group ">
                                    <div class="controls">
                                        <label for="exampleInputEmail1">Correo:</label>
                                        <input type="email" class="form-control" name="email" id="email" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-md">
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button"
                                                onclick="togglePassword()">
                                                <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">
                                        La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula y un
                                        símbolo especial.
                                    </small>
                                    <small id="passwordError" class="form-text text-danger" style="display:none;">
                                        La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula y un
                                        símbolo especial.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6 mb-md">
                                <div class="control-group ">
                                    <div class="controls">
                                        <label for="exampleInputEmail1">Rol:</label>
                                        <select class="form-control" name="rol" id="rol" required>
                                            <option value="">Seleccionar</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->rol_nivel }}">
                                                    {{ $rol->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="ficha_aeropuerto_block" style="display: none;">
                            <div class="col-md-6 mb-md">
                                <div class="control-group ">
                                    <label for="exampleFormControlInput1">Tipo Ficha:</label>
                                    <select class="form-control" name="tipo_ficha" id="tipo_ficha">
                                        <option value="">Seleccionar</option>
                                        @foreach ($tipo_ficha as $ficha)
                                            <option value="{{ $ficha->pk_id_parametrica_descripcion }}">
                                                {{ $ficha->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-md">
                                <div class="control-group ">
                                    <div class="controls">
                                        <label for="exampleInputEmail1">Aeropuerto:</label>
                                        <select class="form-control" name="oaci" id="oaci">
                                            <option value="">Seleccionar</option>
                                            @foreach ($oaci as $aeropuerto)
                                                <option value="{{ $aeropuerto->pk_id_parametrica_descripcion }}">
                                                    {{ $aeropuerto->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="d-flex">
                            <div class="flex-grow-1"></div>
                            <button type="submit" class="btn btn-raised-primary mr-md"><i class="fa fa-save"></i> Guardar
                            </button>
                            <a href="{{ url('home') }}" type="button" class="btn btn-opacity btn-danger"
                                data-dismiss="modal">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const icon = document.getElementById("togglePasswordIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
    
    <script>
        document.getElementById("ValidarModal").addEventListener("submit", function(e) {
            const password = document.getElementById("password").value;
            const errorMsg = document.getElementById("passwordError");

            const tieneMayuscula = /[A-Z]/.test(password);
            const tieneEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
            const tieneLongitud = password.length >= 8;

            if (!tieneMayuscula || !tieneEspecial || !tieneLongitud) {
                e.preventDefault(); // No envía el formulario
                errorMsg.style.display = "block";
            } else {
                errorMsg.style.display = "none";
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#rol').on('change', function() {
                if ($(this).val() === '13') {
                    $('#ficha_aeropuerto_block').show();
                } else {
                    $('#ficha_aeropuerto_block').hide();
                }
            });
        });
    </script>
@endsection
