@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Actualizar Contraseña</li>
@endsection

@section('content')
    <div class="container my-lg">
        <h2 class="doc-section-title" id="examples">Actualizar Contraseña<a class="section-link"></a></h2>
        <div class="doc-example">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="post"
                        action="{{ route('actualizar_contrasena.update', $buscar_usuario->id) }}"
                        class="needs-validation error" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Completo:</label>
                            <input type="text" class="form-control" name="name" required pattern="[A-Za-z0-9]+"
                                value="{{ $buscar_usuario->name }}" readonly>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo:</label>
                            <input type="email" class="form-control" name="email" required
                                value="{{ $buscar_usuario->email }}" readonly>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Ingrese nueva contraseña..." autocomplete="off" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                        <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                            </div>
                            <small class="form-text text-muted">
                                La contraseña debe tener al menos 8 caracteres, incluir una letra mayúscula y un símbolo
                                especial.
                            </small>
                            <small id="passwordError" class="form-text text-danger" style="display:none;">
                                La contraseña no cumple con los requisitos.
                            </small>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-raised-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        document.querySelector('form.needs-validation').addEventListener("submit", function(e) {
            const passwordInput = document.getElementById("password");
            const password = passwordInput.value;
            const errorMsg = document.getElementById("passwordError");

            const tieneMayuscula = /[A-Z]/.test(password);
            const tieneEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
            const tieneLongitud = password.length >= 8;

            if (!tieneMayuscula || !tieneEspecial || !tieneLongitud) {
                e.preventDefault(); // Evita el envío del formulario
                errorMsg.style.display = "block";
                passwordInput.classList.add("is-invalid");
            } else {
                errorMsg.style.display = "none";
                passwordInput.classList.remove("is-invalid");
            }
        });
    </script>
@endsection
