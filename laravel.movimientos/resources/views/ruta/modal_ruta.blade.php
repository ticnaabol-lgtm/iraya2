<div class="modal fade" id="addNewCardModalRuta" tabindex="-1" role="dialog"
    aria-labelledby="addNewCardModalRutaTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalAeropuertoTitle">Formulario - Registro Ruta DCT</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="rutaForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="ruta_id">

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="nombre" class="form-label">Ruta DCT</label>
                            <input type="text" class="form-control text-uppercase" name="ruta" id="ruta"
                                placeholder="Ingrese la Ruta DCT" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="cd_oaci" class="form-label">Distancia (NM)</label>
                            <input type="text" class="form-control text-uppercase" name="distancia" id="distancia"
                                maxlength="4" placeholder="Distancia" required>
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
        // Convierte todos los inputs de texto a mayúsculas mientras se escribe
        $('#rutaForm input[type="text"]').on('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Maneja el envío del formulario por AJAX
        $('#rutaForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: "{{ route('ruta.store') }}", 
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message ||
                            "Ruta DCT registrada con éxito",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#addNewCardModalRuta').modal('hide');
                    $('#rutaForm').trigger("reset");

                    // Actualizar la Tabla
                    $('#rutaDataTable').DataTable().ajax.reload(null, false);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al registrar',
                        text: 'Verifica los datos o contacta soporte técnico.',
                    });
                }
            });
        });
    });
</script>
