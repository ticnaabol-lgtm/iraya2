<div class="modal fade" id="addNewCardModalUsuario" tabindex="-1" role="dialog"
    aria-labelledby="addNewCardModalUsuarioTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalUsuarioTitle">Formulario - Registro Usuario</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="usuarioForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="usuario_id">

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

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-opacity btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Convierte a mayúsculas todos los inputs de texto dentro del formulario
        $('#usuarioForm input[type="text"]').on('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Envío del formulario por AJAX
        $('#usuarioForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: "{{ route('registro.store') }}", 
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // más seguro y estándar
                },
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message || "Usuario registrado con éxito",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#addNewCardModalUsuario').modal('hide');
                    $('#usuarioForm').trigger("reset");
                    $('#ficha_aeropuerto_block').hide();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    let errorMsg = 'Verifica los datos o contacta soporte técnico.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error al registrar',
                        text: errorMsg,
                    });
                }
            });
        });
    });
</script>
