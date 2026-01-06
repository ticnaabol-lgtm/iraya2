<div class="modal fade" id="addNewCardModalMatricula" tabindex="-1" role="dialog"
    aria-labelledby="addNewCardModalMatriculaTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalMatriculaTitle">Formulario - Registro Matrícula</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="matriculaForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="matricula_id">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="matricula" class="form-label">Matrícula</label>
                            <input type="text" class="form-control text-uppercase" name="matricula" id="matricula"
                                placeholder="Ingrese la matrícula" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="fabricante" class="form-label">Fabricante</label>
                            <input type="text" class="form-control text-uppercase" name="fabricante" id="fabricante"
                                placeholder="Ingrese el fabricante">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" class="form-control text-uppercase" name="modelo" id="modelo"
                                placeholder="Ingrese el modelo" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="version" class="form-label">Versión</label>
                            <input type="text" class="form-control text-uppercase" name="version" id="version"
                                placeholder="Ingrese la versión" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="peso" class="form-label">Peso</label>
                            <input type="number" step="0.01" class="form-control" name="peso" id="peso"
                                placeholder="Ingrese el peso" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="medida_peso" class="form-label">Dimensión</label>
                            <select class="form-control" name="medida_peso" id="medida_peso" required>
                                <option value="" disabled selected>Seleccione una opción</option>
                                <option value="Kilogramos">Kilogramos</option>
                                <option value="Libras">Libras</option>
                                <option value="Toneladas">Toneladas</option>
                            </select>
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
        $('#matriculaForm input[type="text"]').on('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Maneja el envío del formulario por AJAX
        $('#matriculaForm').on('submit', function(e) {
            e.preventDefault(); // Previene envío tradicional

            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: "{{ route('matricula.store') }}", // Asegúrate de que esta ruta exista en web.php
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message || "Matrícula registrada con éxito",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Cierra el modal
                    $('#addNewCardModalMatricula').modal('hide');

                    // Limpia el formulario
                    $('#matriculaForm').trigger("reset");

                    // Actualizar la Tabla
                    $('#matriculaDataTable').DataTable().ajax.reload(null, false);
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
