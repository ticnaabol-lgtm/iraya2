<div class="modal fade" id="addNewCardModalAutorizacion" tabindex="-1" role="dialog"
    aria-labelledby="addNewCardModalAutorizacionTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalAutorizacionTitle">Formulario - Registro Autorizacion</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="AutorizacionForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="autorizacion_id">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="numero_autorizacion" class="form-label">Número Autorización</label>
                            <input type="text" class="form-control" name="numero_autorizacion"
                                id="numero_autorizacion" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="fecha_autorizacion" class="form-label">Fecha Autorización</label>
                            <input type="date" class="form-control" name="fecha_autorizacion" id="fecha_autorizacion"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="razon_social" class="form-label">Nombre o Razón Social del Operador</label>
                            <input type="text" class="form-control text-uppercase" name="razon_social"
                                id="razon_social" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="pais" class="form-label">Nacionalidad</label>
                            <select name="pais" id="pais" class="form-control text-uppercase select2" required>
                                <option value="" disabled selected>Seleccione un país</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->pais }}">{{ strtoupper($pais->pais) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="piloto" class="form-label">Piloto(s) al Mando</label>
                            <input type="text" class="form-control text-uppercase" name="piloto" id="piloto"
                                required>
                        </div>

                        @if ($tipo === 'ingreso')
                            <div class="col-md-4 mb-3">
                                <label for="tipo_autorizacion" class="form-label">Tipo de Autorización</label>
                                <select name="tipo_autorizacion" id="tipo_autorizacion" class="form-control" required>
                                    <option value="" disabled selected>Seleccione tipo</option>
                                    <option value="Ingreso">Ingreso</option>
                                    <option value="Salida">Salida</option>
                                </select>
                            </div>
                        @else
                            <input type="hidden" name="tipo_autorizacion" id="tipo_autorizacion" value="SOBREVUELO">
                        @endif

                    </div>
                    <div class="row">

                        <table class="table borderless table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Tipo de Aeronave</th>
                                    <th>Peso (PBMD)</th>
                                    <th>Matrícula</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaAeronavesBody">
                                <tr>
                                    <td><input type="text" name="tipo_aeronave_0" class="form-control text-uppercase"
                                            required></td>
                                    <td><input type="number" name="peso_0" class="form-control" step="0.01"
                                            required></td>
                                    <td><input type="text" name="matricula_0" class="form-control text-uppercase"
                                            required></td>
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
                            <label for="medida_peso" class="form-label">Medida Peso</label>
                            <select name="medida_peso" id="medida_peso" class="form-control" required>
                                <option value="" disabled selected>Seleccione unidad</option>
                                <option value="KG">Kilogramos (KG)</option>
                                <option value="LBS">Libras (LBS)</option>
                                <option value="TON">Toneladas (TON)</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tiempo_validez_inicio" class="form-label">Fecha Inicio</label>
                            <input type="date" class="form-control" name="tiempo_validez_inicio"
                                id="tiempo_validez_inicio" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tiempo_validez_fin" class="form-label">Fecha Fin</label>
                            <input type="date" class="form-control" name="tiempo_validez_fin"
                                id="tiempo_validez_fin" required>
                        </div>

                        <div class="col-md-4 mb-3" id="aeropuerto_sobrevuelo_div" style="display: none;">
                            <label for="ultimo_aeropuerto" class="form-label">Último Aeropuerto</label>
                            <input type="text" class="form-control text-uppercase" name="ultimo_aeropuerto"
                                id="ultimo_aeropuerto">
                        </div>

                        <div class="col-md-4 mb-3" id="aeropuerto_destino_div" style="display: none;">
                            <label for="aeropuerto_entrada" class="form-label">Aeropuerto Destino</label>
                            <input type="text" class="form-control text-uppercase" name="aeropuerto_destino"
                                id="aeropuerto_destino">
                        </div>

                        <div class="col-md-4 mb-3" id="aeropuerto_destino_alterno_div" style="display: none;">
                            <label for="aeropuerto_entrada_alterno" class="form-label">Aeropuerto Destino
                                Alterno</label>
                            <input type="text" class="form-control text-uppercase"
                                name="aeropuerto_destino_alterno" id="aeropuerto_destino_alterno">
                        </div>

                        <div class="col-md-4 mb-3" id="aeropuerto_entrada_div" style="display: none;">
                            <label for="aeropuerto_entrada" class="form-label">Aeropuerto Entrada</label>
                            <input type="text" class="form-control text-uppercase" name="aeropuerto_entrada"
                                id="aeropuerto_entrada">
                        </div>

                        <div class="col-md-4 mb-3" id="aeropuerto_entrada_alterno_div" style="display: none;">
                            <label for="aeropuerto_entrada_alterno" class="form-label">Aeropuerto Entrada
                                Alterno</label>
                            <input type="text" class="form-control text-uppercase"
                                name="aeropuerto_entrada_alterno" id="aeropuerto_entrada_alterno">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4 mb-3" id="aeropuerto_salida_div" style="display: none;">
                            <label for="aeropuerto_salida" class="form-label">Aeropuerto Salida</label>
                            <input type="text" class="form-control text-uppercase" name="aeropuerto_salida"
                                id="aeropuerto_salida">
                        </div>

                        <div class="col-md-4 mb-3" id="aeropuerto_salida_alterno_div" style="display: none;">
                            <label for="aeropuerto_salida_alterno" class="form-label">Aeropuerto Salida
                                Alterno</label>
                            <input type="text" class="form-control text-uppercase"
                                name="aeropuerto_salida_alterno" id="aeropuerto_salida_alterno">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="objeto_vuelo" class="form-label">Objeto del Vuelo</label>
                            <input type="text" class="form-control text-uppercase" name="objeto_vuelo"
                                id="objeto_vuelo">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="ruta" class="form-label">Ruta</label>
                            <textarea class="form-control text-uppercase" name="ruta" id="ruta" rows="2"></textarea>
                        </div>

                        <div class="col-8 mb-3">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control text-uppercase" name="observaciones" id="observaciones" rows="2"></textarea>
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
        // Recupera el valor de tipo desde Blade
        const tipo = @json($tipo); // convierte PHP a JS seguro

        console.log('tipo:', tipo);

        $('#addNewCardModalAutorizacion').on('show.bs.modal', function() {
            if (tipo === 'ingreso') {
                $('#aeropuerto_entrada_div').show();
                $('#aeropuerto_entrada_alterno_div').show();
                $('#aeropuerto_salida_div').show();
                $('#aeropuerto_salida_alterno_div').show();
                $('#aeropuerto_sobrevuelo_div').hide();
                $('#aeropuerto_destino_div').hide();
                $('#aeropuerto_destino_alterno_div').hide();
            } else {
                $('#aeropuerto_entrada_div').hide();
                $('#aeropuerto_entrada_alterno_div').hide();
                $('#aeropuerto_salida_div').hide();
                $('#aeropuerto_salida_alterno_div').hide();
                $('#aeropuerto_sobrevuelo_div').show();
                $('#aeropuerto_destino_div').show();
                $('#aeropuerto_destino_alterno_div').show();
            }
        });
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

        let form = $(this);

        // Inicializamos los arrays
        let tipo_array = [];
        let peso_array = [];
        let matricula_array = [];

        // Recorremos cada fila de la tabla de aeronaves
        $('#tablaAeronavesBody tr').each(function() {
            const tipo = $(this).find('input[name^="tipo_aeronave"]').val();
            const peso = $(this).find('input[name^="peso"]').val();
            const matricula = $(this).find('input[name^="matricula"]').val();

            // Solo si todos los campos tienen valor
            if (tipo && peso && matricula) {
                tipo_array.push(tipo);
                peso_array.push(peso);
                matricula_array.push(matricula);
            }
        });

        // Convertimos el formulario a objeto para añadir arrays
        let formData = form.serializeArray();
        formData.push({
            name: 'tipo_array',
            value: JSON.stringify(tipo_array)
        });
        formData.push({
            name: 'peso_array',
            value: JSON.stringify(peso_array)
        });
        formData.push({
            name: 'matricula_array',
            value: JSON.stringify(matricula_array)
        });

        $.ajax({
            url: "{{ route('registro-autorizacion.store') }}",
            type: "POST",
            data: $.param(formData),
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
                $('#AutorizacionForm')[0].reset();
                $('.select2').val(null).trigger('change');
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error al registrar',
                    text: 'Verifica los datos o contacta al soporte técnico.',
                });
            }
        });
    });
</script>
