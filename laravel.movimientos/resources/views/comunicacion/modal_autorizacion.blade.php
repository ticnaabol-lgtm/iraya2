<div class="modal fade" id="addNewCardModalAutorizacion" tabindex="-1" role="dialog"
    aria-labelledby="addNewCardModalAutorizacionTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalAutorizacionTitle">FORMULARIO - REGISTRO AUTORIZACIÓN
                    {{ $tipo }} &nbsp;&nbsp;
                </p>

                <button type="button" id="btnResetAutorizacion" class="btn btn-warning">
                    <i class="fa fa-undo"></i> Resetear
                </button>

                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="AutorizacionForm" method="POST" action="{{ route('comunicacion.registro-autorizacion') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="autorizacion_id">
                    <input type="hidden" name="enmienda" id="enmienda">
                    <input type="hidden" name="id_padre" id="id_padre">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="numero_autorizacion" class="form-label">Número Autorización <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <input type="text" class="form-control" name="numero_autorizacion"
                                id="numero_autorizacion" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="fecha_autorizacion" class="form-label">Fecha Autorización <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <input type="date" class="form-control" name="fecha_autorizacion" id="fecha_autorizacion"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="razon_social" class="form-label">Nombre o Razón Social del Operador <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <input type="text" class="form-control text-uppercase" name="razon_social"
                                id="razon_social" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="pais" class="form-label">Nacionalidad <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <select name="pais" id="pais" class="form-control text-uppercase select2" required>
                                <option value="" disabled selected>Seleccione un país</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->pais }}">{{ strtoupper($pais->pais) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="piloto" class="form-label">Piloto(s) al Mando</label>
                            <input type="text" class="form-control text-uppercase" name="piloto" id="piloto">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="autorizacion_pdf" class="form-label">
                                <i class="material-icons text-danger me-1">picture_as_pdf</i> Documento PDF
                                <span style="color: orange; font-size: 18px">*</span>
                            </label>
                            <input type="file" name="autorizacion_pdf[]" id="autorizacion_pdf"
                                accept="application/pdf" multiple>
                            <div id="autorizacion_pdf_info" class="mt-1"></div>
                            <!-- <- aquí se mostrará el archivo actual -->
                            <small class="text-muted">Solo archivos PDF, máximo 1 MB</small>
                            <span id="autorizacion_pdf_error" class="text-danger d-block mt-1"
                                style="display:none;"></span>
                        </div>

                        <input type="hidden" name="tipo_autorizacion" id="tipo_autorizacion"
                            value="{{ $tipo }}">

                    </div>
                    <div class="row">

                        <table class="table borderless table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Tipo de Aeronave</th>
                                    <th>Peso (PBMD)</th>
                                    <th>Matrícula</th>
                                    <th>Matrícula ALT</th>
                                    <th>Adjunto</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody id="tablaAeronavesBody">
                                <tr>
                                    <td><input type="text" name="tipo_aeronave_0"
                                            class="form-control text-uppercase" required></td>
                                    <td><input type="text" name="peso_0" class="form-control" step="0.01"
                                            required></td>
                                    <td><input type="text" name="matricula_0" class="form-control text-uppercase"
                                            required></td>
                                    <td><input type="text" name="matricula_alt"
                                            class="form-control text-uppercase"></td>
                                    <td>
                                        <input type="file" name="adjunto_pdf[]" id="adjunto_pdf" multiple
                                            accept="application/pdf">
                                        <small class="text-muted">Solo archivos PDF, máximo 1 MB</small>
                                        <span id="adjunto_pdf_error" class="text-danger d-block mt-1"
                                            style="display:none;"></span>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success btn-sm agregar-fila">
                                            <i class="fa fa-plus"></i> Agregar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label for="medida_peso" class="form-label">Medida Peso <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <select name="medida_peso" id="medida_peso" class="form-control" required>
                                <option value="" disabled selected>Seleccione unidad</option>
                                <option value="KG">Kilogramos (KG)</option>
                                <option value="LBS">Libras (LBS)</option>
                                <option value="TON">Toneladas (TON)</option>
                                <option value="ADJUNTO">SEGUN DETALLE ADJUNTO</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tiempo_validez_inicio" class="form-label">Fecha Inicio <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <input type="date" class="form-control" name="tiempo_validez_inicio"
                                id="tiempo_validez_inicio" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tiempo_validez_fin" class="form-label">Fecha Fin <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <input type="date" class="form-control" name="tiempo_validez_fin"
                                id="tiempo_validez_fin" required>
                        </div>

                    </div>

                    <div class="row">

                        @if ($tipo === 'INGRESO')
                            <div class="col-md-6 mb-3" id="aeropuerto_entrada_div">
                                <label for="aeropuerto_entrada" class="form-label">Aeropuerto Entrada <span
                                        style="color: orange; font-size: 18px">*</span></label>
                                <input type="text" class="form-control text-uppercase" name="aeropuerto_entrada"
                                    id="aeropuerto_entrada" required>
                            </div>

                            <div class="col-md-6 mb-3" id="aeropuerto_entrada_alterno_div">
                                <label for="aeropuerto_entrada_alterno" class="form-label">Aeropuerto Entrada
                                    Alterno</label>
                                <input type="text" class="form-control text-uppercase"
                                    name="aeropuerto_entrada_alterno" id="aeropuerto_entrada_alterno">
                            </div>

                            <div class="col-md-6 mb-3" id="aeropuerto_salida_div">
                                <label for="aeropuerto_salida" class="form-label">Aeropuerto Salida <span
                                        style="color: orange; font-size: 18px">*</span></label>
                                <input type="text" class="form-control text-uppercase" name="aeropuerto_salida"
                                    id="aeropuerto_salida" required>
                            </div>

                            <div class="col-md-6 mb-3" id="aeropuerto_salida_alterno_div">
                                <label for="aeropuerto_salida_alterno" class="form-label">Aeropuerto Salida
                                    Alterno</label>
                                <input type="text" class="form-control text-uppercase"
                                    name="aeropuerto_salida_alterno" id="aeropuerto_salida_alterno">
                            </div>
                        @endif

                        @if ($tipo === 'SALIDA')
                            <div class="col-md-6 mb-3" id="aeropuerto_entrada_div">
                                <label for="aeropuerto_entrada" class="form-label">Aeropuerto Salida <span
                                        style="color: orange; font-size: 18px">*</span></label>
                                <input type="text" class="form-control text-uppercase" name="aeropuerto_entrada"
                                    id="aeropuerto_entrada" required>
                            </div>

                            <div class="col-md-6 mb-3" id="aeropuerto_entrada_alterno_div">
                                <label for="aeropuerto_entrada_alterno" class="form-label">Aeropuerto Salida
                                    Alterno</label>
                                <input type="text" class="form-control text-uppercase"
                                    name="aeropuerto_entrada_alterno" id="aeropuerto_entrada_alterno">
                            </div>

                            <div class="col-md-6 mb-3" id="aeropuerto_salida_div">
                                <label for="aeropuerto_salida" class="form-label">Aeropuerto Destino <span
                                        style="color: orange; font-size: 18px">*</span></label>
                                <input type="text" class="form-control text-uppercase" name="aeropuerto_salida"
                                    id="aeropuerto_salida" required>
                            </div>

                            <div class="col-md-6 mb-3" id="aeropuerto_salida_alterno_div">
                                <label for="aeropuerto_salida_alterno" class="form-label">Aeropuerto Destino
                                    Alterno</label>
                                <input type="text" class="form-control text-uppercase"
                                    name="aeropuerto_salida_alterno" id="aeropuerto_salida_alterno">
                            </div>
                        @endif

                        @if ($tipo === 'SOBREVUELO')
                            <div class="col-md-6 mb-3" id="aeropuerto_destino_div">
                                <label for="aeropuerto_entrada" class="form-label">Aeropuerto Destino <span
                                        style="color: orange; font-size: 18px">*</span></label>
                                <input type="text" class="form-control text-uppercase" name="aeropuerto_destino"
                                    id="aeropuerto_destino" required>
                            </div>

                            <div class="col-md-6 mb-3" id="aeropuerto_destino_alterno_div">
                                <label for="aeropuerto_entrada_alterno" class="form-label">Aeropuerto Destino
                                    Alterno</label>
                                <input type="text" class="form-control text-uppercase"
                                    name="aeropuerto_destino_alterno" id="aeropuerto_destino_alterno">
                            </div>
                        @endif

                        @if ($tipo !== 'SALIDA')
                            <div class="col-md-6 mb-3" id="aeropuerto_sobrevuelo_div">
                                <label for="ultimo_aeropuerto" class="form-label">Último Aeropuerto <span
                                        style="color: orange; font-size: 18px">*</span></label>
                                <input type="text" class="form-control text-uppercase" name="ultimo_aeropuerto"
                                    id="ultimo_aeropuerto" required>
                            </div>
                        @endif

                        <div class="col-md-6 mb-3">
                            <label for="objeto_vuelo" class="form-label">Objeto del Vuelo <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <input type="text" class="form-control text-uppercase" name="objeto_vuelo"
                                id="objeto_vuelo" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="ruta" class="form-label">Ruta <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <textarea class="form-control text-uppercase" name="ruta" id="ruta" rows="5" required></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="observaciones" class="form-label">Observaciones <span
                                    style="color: orange; font-size: 18px">*</span></label>
                            <textarea class="form-control text-uppercase" name="observaciones" id="observaciones" rows="5" required></textarea>
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
    // Guardamos la lógica en una función reutilizable
    function resetAutorizacionForm() {
        // 1) Reset general del formulario
        $('#AutorizacionForm')[0].reset();

        // 2) Texto y flags
        $('#enmienda').val(0);
        $('#autorizacion_pdf').attr('required', true);

        // 3) Reset de errores y textos informativos
        $('#adjunto_pdf_error').text('').hide();
        $('#autorizacion_pdf_info').empty();
        $('#adjunto_pdf_info').empty();

        // 4) Dejar la tabla en su estado inicial (UNA sola fila base)
        const filaBase = `
            <tr>
                <td><input type="text" name="tipo_aeronave_0" class="form-control text-uppercase" required></td>
                <td><input type="text" name="peso_0" class="form-control" step="0.01" required></td>
                <td><input type="text" name="matricula_0" class="form-control text-uppercase" required></td>
                <td><input type="text" name="matricula_alt" class="form-control text-uppercase"></td>
                <td>
                    <input type="file" name="adjunto_pdf[]" id="adjunto_pdf" multiple accept="application/pdf">
                    <small class="text-muted">Solo archivos PDF, máximo 1 MB</small>
                    <span id="adjunto_pdf_error" class="text-danger d-block mt-1" style="display:none;"></span>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-success btn-sm agregar-fila">
                        <i class="fa fa-plus"></i> Agregar
                    </button>
                </td>
            </tr>
        `;
        $('#tablaAeronavesBody').html(filaBase);
    }

    // Antes: lo hacía el botón nuevo. Ahora solo abre modal o lo que necesites
    $('#btnNuevoAutorizacion').on('click', function() {
        // Aquí ya NO reseteamos el form, solo puedes abrir modal, etc.
        $('#miModalAutorizacion').modal('show');
    });

    // Nuevo botón que sí hace el reset real
    $('#btnResetAutorizacion').on('click', function() {
        resetAutorizacionForm();
    });
</script>

<script>
    $(document).ready(function() {
        $('#pais').select2({
            placeholder: 'Seleccione un país',
            width: '100%'
        });
    });
</script>

{{-- Validacion PDF --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ['autorizacion_pdf', 'adjunto_pdf'].forEach(function(id) {
            const input = document.getElementById(id);
            if (!input) return;

            input.addEventListener('change', function() {
                const file = this.files[0];
                const errorSpan = document.getElementById(id + '_error');
                if (!errorSpan) return;

                // Limpiar error anterior
                errorSpan.style.display = 'none';
                errorSpan.textContent = '';

                if (file) {
                    const maxSize = 1 * 1024 * 1024; // 1 MB
                    const isPdf = file.type === 'application/pdf' || /\.pdf$/i.test(file.name);

                    if (!isPdf) {
                        errorSpan.textContent = 'Solo se permiten archivos PDF.';
                        errorSpan.style.display = 'block';
                        this.value = '';
                    } else if (file.size > maxSize) {
                        errorSpan.textContent = 'El archivo no debe superar 1 MB.';
                        errorSpan.style.display = 'block';
                        this.value = '';
                    }
                }
            });
        });
    });
</script>

<script>
    let index = 1;

    $(document).ready(function() {
        // Agregar fila nueva
        $(document).on('click', '.agregar-fila', function() {
            const nuevaFila = `
                <tr>
                    <td><input type="text" name="tipo_aeronave_${index}" class="form-control text-uppercase" required></td>
                    <td><input type="number" name="peso_${index}" class="form-control" step="0.01" required></td>
                    <td><input type="text" name="matricula_${index}" class="form-control text-uppercase" required></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-success btn-sm agregar-fila me-1">
                            <i class="fa fa-plus"></i>Agregar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm eliminar-fila">
                            <i class="fa fa-times"></i>Eliminar
                        </button>
                    </td>
                </tr>`;
            $('#tablaAeronavesBody').append(nuevaFila);
            index++;
        });

        // Eliminar solo la fila donde se hace clic en "X"
        $(document).on('click', '.eliminar-fila', function() {
            $(this).closest('tr').remove();
        });
    });
</script>

<script>
    $('#AutorizacionForm').on('submit', function(e) {
        e.preventDefault();

        const form = this;
        const fd = new FormData(form); // incluye inputs y archivos

        // --- Helper para (re)armar inputs file múltiples con validación ---
        const rebuildFiles = (fd, inputId, fieldName) => {
            fd.delete(fieldName); // limpia lo que puso el browser
            const input = document.getElementById(inputId);
            let skipped = [];

            if (input && input.files && input.files.length) {
                for (const file of input.files) {
                    if (file.type !== 'application/pdf' || file.size > 1024 * 1024) {
                        skipped.push(file.name);
                        continue;
                    }
                    fd.append(fieldName, file);
                }
            }
            return skipped;
        };

        // autorizacion_pdf[]  (múltiple)
        const skippedAut = rebuildFiles(fd, 'autorizacion_pdf', 'autorizacion_pdf[]');

        // adjunto_pdf[]  (múltiple)
        const skippedAdj = rebuildFiles(fd, 'adjunto_pdf', 'adjunto_pdf[]');

        // --- Armar arrays desde la tabla (como ya lo haces) ---
        const tipo_array = [];
        const peso_array = [];
        const matricula_array = [];

        $('#tablaAeronavesBody tr').each(function() {
            const tipo = $(this).find('input[name^="tipo_aeronave"]').val();
            const peso = $(this).find('input[name^="peso"]').val();
            const matricula = $(this).find('input[name^="matricula"]').val();

            if (tipo && peso && matricula) {
                tipo_array.push(tipo);
                peso_array.push(peso);
                matricula_array.push(matricula);
            }
        });

        fd.set('tipo_array', JSON.stringify(tipo_array));
        fd.set('peso_array', JSON.stringify(peso_array));
        fd.set('matricula_array', JSON.stringify(matricula_array));

        // (Opcional) Aviso si se omitieron archivos inválidos
        const omitidos = [...skippedAut, ...skippedAdj];
        if (omitidos.length) {
            console.warn('Archivos omitidos por tipo/tamaño:', omitidos);
        }

        $.ajax({
            url: form.action,
            type: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.message || "Autorización registrada con éxito",
                    showConfirmButton: false,
                    timer: 1500
                });

                $('#addNewCardModalAutorizacion').modal('hide');
                form.reset();
                $('.select2').val(null).trigger('change');
                $('#autorizacionDataTable').DataTable().ajax.reload(null, false);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                let mensaje = 'Verifica los datos o contacta al soporte técnico.';
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.message) {
                    mensaje = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error al registrar',
                    text: mensaje
                });
            }
        });
    });
</script>
