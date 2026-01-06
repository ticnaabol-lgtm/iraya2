<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="modal fade" id="addNewCardModalCliente" tabindex="-1" role="dialog"
    aria-labelledby="addNewCardModalClienteTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalClienteTitle">Formulario - Registro Cliente</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="clienteForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="cliente_id">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="codigo_oaci" class="form-label">Código OACI</label>
                            <input type="text" class="form-control text-uppercase" name="codigo_oaci"
                                id="codigo_oaci" maxlength="3" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="codigo_contable" class="form-label">Código Contable</label>
                            <input type="text" class="form-control text-uppercase" name="codigo_contable"
                                id="codigo_contable">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control text-uppercase" name="nombre" id="nombre"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control text-uppercase" name="direccion" id="direccion" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="fax" class="form-label">Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="casilla" class="form-label">Casilla</label>
                            <input type="text" class="form-control" name="casilla" id="casilla">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="representante" class="form-label">Representante</label>
                            <input type="text" class="form-control text-uppercase" name="representante"
                                id="representante">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="pais" class="form-label">País</label><br>
                            <select name="pais" id="pais" class="form-control select2 w-100" required>
                                <option value="" disabled selected>Seleccione un país</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->pais }}">{{ $pais->pais }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="nit" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="nit" class="form-label">NIT</label>
                            <input type="text" class="form-control" name="nit" id="nit">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-opacity btn-danger"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Convierte todos los inputs de texto a mayúsculas mientras se escribe
        $('#clienteForm input[type="text"]').on('input', function() {
            this.value = this.value.toUpperCase();
        });

        // Maneja el envío del formulario por AJAX
        $('#clienteForm').on('submit', function(e) {
            e.preventDefault();

            let form = $(this);
            let formData = form.serialize();

            $.ajax({
                url: "{{ route('cliente.store') }}", // Asegúrate de definir esta ruta
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message || "Cliente registrado con éxito",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#addNewCardModalCliente').modal('hide');
                    $('#clienteForm').trigger("reset");

                    // Actualizar la Tabla
                    $('#clienteDataTable').DataTable().ajax.reload(null, false);
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

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pais').select2({
            placeholder: 'Seleccione un país',
            width: '100%',
        });
    });
</script>
