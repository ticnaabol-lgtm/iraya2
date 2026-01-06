<div class="modal fade" id="addNewCardModalRol" tabindex="-1" role="dialog" aria-labelledby="addNewCardModalRolTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalRolTitle">Formulario - Registro Rol</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="usuarioForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="rol_id">

                    <div class="row">
                        <div class="col-md-6 mb-md">
                            <div class="control-group">
                                <label for="rol">Rol:</label>
                                <input type="text" class="form-control text-uppercase" name="rol" id="rol"
                                    style="text-transform: uppercase;" required />
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
        $('#rolForm input[type="text"]').on('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Envío del formulario por AJAX
        $('#rolForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: "{{ route('listado_roles.store') }}", 
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message || "Rol registrado con éxito",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#addNewCardModalRol').modal('hide');
                    $('#rolForm').trigger("reset");
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
