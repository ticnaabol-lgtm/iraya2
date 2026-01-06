<div class="modal fade" id="addNewCardModalAeropuerto" tabindex="-1" role="dialog"
    aria-labelledby="addNewCardModalAeropuertoTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalAeropuertoTitle">Formulario - Registro Aeropuerto</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="aeropuertoForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="aeropuerto_id">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre del Aeropuerto</label>
                            <input type="text" class="form-control text-uppercase" name="nombre" id="nombre"
                                placeholder="Ingrese el nombre del aeropuerto" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="cd_oaci" class="form-label">Código OACI</label>
                            <input type="text" class="form-control text-uppercase" name="cd_oaci" id="cd_oaci"
                                maxlength="4" placeholder="Ej: SLVR" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="" disabled selected>Seleccione categoría</option>
                                <option value="">Sin Categoría</option>
                                <option value="1">1 - Internacional</option>
                                <option value="2">2 - Nacional</option>
                                <option value="3">3 - Regional</option>
                                <option value="4">4 - Local</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input type="text" class="form-control text-uppercase" name="ciudad" id="ciudad"
                                placeholder="Ciudad donde se ubica el aeropuerto">
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
        $('#aeropuertoForm input[type="text"]').on('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Maneja el envío del formulario por AJAX
        $('#aeropuertoForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: "{{ route('aeropuerto.store') }}", // Asegúrate de definir esta ruta en web.php
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
                            "Aeropuerto registrado con éxito",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#addNewCardModalAeropuerto').modal('hide');
                    $('#aeropuertoForm').trigger("reset");

                    // Actualizar la Tabla
                    $('#aeropuertoDataTable').DataTable().ajax.reload(null, false);
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
