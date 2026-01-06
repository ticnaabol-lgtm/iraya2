<div class="modal fade" id="addNewCardModalSobreVuelo" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModaltitle">Formulario - Adición Sobrevuelo</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="">
                <form id="sobrevueloForm" method="POST">
                    @csrf

                    <input type="hidden" name="registro_id" id="registro_id">

                    <fieldset class="border p-3">
                        <legend class="float-none w-auto px-1 text-secondary fw-bold">CLIENTE</legend>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="fecha" class="form-label" data-field="fecha">Fecha
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="date" class="form-control" name="fecha" id="fecha"
                                    placeholder="Fecha" value="" required readonly>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="razon_social" class="form-label" data-field="razon_social">Razón Social
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="razon_social"
                                    id="razon_social" placeholder="Razón Social" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="distancia" class="form-label" data-field="distancia">Distancia (NM)
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="number" class="form-control" name="distancia" id="distancia"
                                    placeholder="Distancia" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="origen" class="form-label" data-field="origen">Origen
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="origen" id="origen"
                                    placeholder="Origen" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="destino" class="form-label" data-field="destino">Destino
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="destino" id="destino"
                                    placeholder="Destino" value="">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border p-3">
                        <legend class="float-none w-auto px-1 text-secondary fw-bold">VUELO</legend>

                        <div class="row">

                            <div class="col-md-4 mb-4">
                                <label for="responsable" class="form-label" data-field="responsable">Responsable
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="responsable"
                                    id="responsable" placeholder="Responsable" value="">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="cliente" class="form-label" data-field="cliente">Cliente
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>

                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <i class="fa-solid fa-user-tie" title="Cliente"></i>
                                    </span>
                                    <input type="text" class="form-control text-uppercase" name="cliente"
                                        id="cliente" placeholder="Cliente" value=""
                                        oninput="this.value = this.value.toUpperCase()">

                                    <input type="hidden" class="form-control" name="origen_cliente"
                                        id="origen_cliente" value="">
                                </div>

                                <ul id="resultado-clientes" class="list-group mt-1" style="cursor: pointer;"></ul>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="cliente" class="form-label" data-field="matricula">Matrícula
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>

                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <i class="fa-solid fa-barcode" title="Matrícula"></i>
                                    </span>
                                    <input type="text" class="form-control text-uppercase" name="matricula"
                                        id="matricula" placeholder="Matrícula" value=""
                                        oninput="this.value = this.value.toUpperCase()">

                                    <input type="hidden" class="form-control" name="origen_matricula"
                                        id="origen_matricula" value="">

                                </div>

                                <ul id="resultado-matriculas" class="list-group mt-1" style="cursor: pointer;"></ul>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="modelo" class="form-label" data-field="modelo">Modelo
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="modelo"
                                    id="modelo" placeholder="Modelo" value="">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="version" class="form-label" data-field="version">Versión
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="version"
                                    id="version" placeholder="Version" value="">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="peso" class="form-label" data-field="peso">Peso (Toneladas)
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control" name="peso" id="peso"
                                    placeholder="Peso" value="">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="origen_oaci" class="form-label" data-field="origen_oaci">Origen (OACI)
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="origen_oaci"
                                    id="origen_oaci" placeholder="Origen" value="">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="destino_oaci" class="form-label" data-field="destino_oaci">Destino (OACI)
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="destino_oaci"
                                    id="destino_oaci" placeholder="Destino" value="">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="vuelo" class="form-label" data-field="vuelo">Vuelo
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <i class="fa-solid fa-plane"></i>
                                    </span>
                                    <input type="text" class="form-control text-uppercase" placeholder="Vuelo"
                                        name="vuelo" id="vuelo" aria-label="vuelo"
                                        aria-describedby="addon-wrapping"
                                        oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <ul id="vuelo_suggestions"></ul>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label class="form-label" data-field="control1">Control
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <table>
                                    <tr>
                                        <td><input type="text" class="form-control text-center" name="control1"
                                                id="control1" placeholder="Control" value=""></td>
                                        <td class="px-1">-</td>
                                        <td><input type="text" class="form-control text-uppercase text-center"
                                                name="control2" id="control2" placeholder="" value=""></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="ruta"
                                    class="form-label d-flex justify-content-between align-items-center"
                                    data-field="ruta">
                                    <span>Ruta
                                        <i class="fa-solid fa-circle-exclamation icono-alerta"
                                            style="display:none;"></i>
                                    </span>

                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input custom-toggle-dct" type="checkbox"
                                            name="toggleDCT" id="toggleDCT">
                                        <label class="form-check-label" for="toggleDCT" style="">Usar
                                            DCT</label>
                                        <span data-bs-toggle="tooltip"
                                            title="Al activar esta función usted podrá poner de manera manual la ruta, recuperando una Ruta DCT ya creada o creando una nueva.">
                                            <i class="fas fa-info-circle text-primary"></i>
                                        </span>
                                    </div>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="ruta"
                                    id="ruta" placeholder="Ruta" value="">

                                <div id="rutaList" class="list-group position-absolute w-100"
                                    style="z-index: 1000;"></div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="autorizacion" class="form-label" data-field="autorizacion">Autorización
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>

                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <i class="fa-solid fa-file-signature" title="Documento de Autorización"></i>
                                    </span>

                                    <select class="form-select text-uppercase" name="autorizacion" id="autorizacion">
                                        <option value="" disabled selected>Seleccione una autorización</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset class="border p-3">
                        <legend class="w-auto px-2 text-secondary fw-bold">Separación Mínima Vertical Reducida (RVSM)
                        </legend>

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label for="fl_fijo_entrada" class="form-label" data-field="fl_fijo_entrante">FL Fijo
                                    Entrada
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control" name="fl_fijo_entrada"
                                    id="fl_fijo_entrada" placeholder="FL Fijo Entrada" value="">
                                <input type="hidden" id="id_proceso_vuelo" name="id_proceso_vuelo">
                                <input type="hidden" id="ruta_vuelo" name="ruta_vuelo">
                                <input type="hidden" id="primer_punto" name="primer_punto">
                                <input type="hidden" id="ultimo_punto" name="ultimo_punto">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fl_fijo_salida" class="form-label" data-field="fl_fijo_salida">FL Fijo
                                    Salida
                                    <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                                </label>
                                <input type="text" class="form-control text-uppercase" name="fl_fijo_salida"
                                    id="fl_fijo_salida" placeholder="FL Fijo Salida" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <!-- Espacio vacío reservado -->
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fijo1" class="form-label">Fijo 1</label>
                                <input type="text" class="form-control text-uppercase" name="fijo1"
                                    id="fijo1" placeholder="Fijo 1" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="hora_fijo1" class="form-label">Hora Fijo 1</label>
                                <input type="number" class="form-control text-uppercase" name="hora_fijo1"
                                    id="hora_fijo1" placeholder="Hora Fijo 1" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fl_fijo1" class="form-label">FL Fijo 1</label>
                                <input type="number" class="form-control text-uppercase" name="fl_fijo1"
                                    id="fl_fijo1" placeholder="FL Fijo 1" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fijo2" class="form-label">Fijo 2</label>
                                <input type="text" class="form-control text-uppercase" name="fijo2"
                                    id="fijo2" placeholder="Fijo 2" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="hora_fijo2" class="form-label">Hora Fijo 2</label>
                                <input type="number" class="form-control text-uppercase" name="hora_fijo2"
                                    id="hora_fijo2" placeholder="Hora Fijo 2" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fl_fijo2" class="form-label">FL Fijo 2</label>
                                <input type="number" class="form-control text-uppercase" name="fl_fijo2"
                                    id="fl_fijo2" placeholder="FL Fijo 2" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fijo3" class="form-label">Fijo 3</label>
                                <input type="text" class="form-control text-uppercase" name="fijo3"
                                    id="fijo3" placeholder="Fijo 3" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="hora_fijo3" class="form-label">Hora Fijo 3</label>
                                <input type="number" class="form-control text-uppercase" name="hora_fijo3"
                                    id="hora_fijo3" placeholder="Hora Fijo 3" value="">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="fl_fijo3" class="form-label">FL Fijo 3</label>
                                <input type="number" class="form-control text-uppercase" name="fl_fijo3"
                                    id="fl_fijo3" placeholder="FL Fijo 3" value="">
                            </div>

                        </div>
                    </fieldset>

                    </br></br>

                    <div class="row">

                        <label for="fl_fijo2" class="form-label" data-field="observacion">Observación:
                            <i class="fa-solid fa-circle-exclamation icono-alerta" style="display:none;"></i>
                        </label>
                        <div class="col-md-4 mb-3">
                            <select class="form-control" name="observacion" id="observacion">
                                <option value="" selected>Seleccione una opción</option>
                                <option value="Ninguno">Ninguno</option>
                                <option value="Matricula">Matrícula</option>
                                <option value="Modelo">Modelo</option>
                                <option value="Vuelo">Vuelo</option>
                                <option value="Origen/Destino">Origen/Destino</option>
                                <option value="Peso">Peso</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>

                        <!-- Campo adicional para "Otro", oculto por defecto -->
                        <div class="col-md-8 mb-3" id="observacion_otro_container" style="display: none;">
                            <label for="observacion_otro" class="form-label">Especifique la observación</label>
                            <input type="text" class="form-control text-uppercase" name="observacion_otro"
                                id="observacion_otro" placeholder="Especifique la observación">
                        </div>

                    </div>

                    <div class="d-flex">
                        <div class="flex-grow-1"></div>
                        <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-opacity btn-danger mr-md"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Validacion Faltan Llenar --}}
<script>
    function validarCamposVacios() {
        $('label[data-field]').each(function() {
            const fieldName = $(this).data('field');
            const field = $('#' + fieldName);

            if (field.length) {
                const valor = field.val()?.trim();

                const icono = $(this).find('.icono-alerta');

                if (!valor) {
                    icono.show();
                } else {
                    icono.hide();
                }
            }
        });
    }

    // Ejecutar al cargar el DOM y cada vez que se cambie un campo
    $(document).ready(function() {
        validarCamposVacios();

        $('input, select, textarea').on('input change', function() {
            validarCamposVacios();
        });
    });
</script>

{{-- VUELO --}}
<script>
    $(document).ready(function() {
        $('#vuelo').on('keyup', function() {
            let vuelo = $(this).val().toUpperCase();

            if (vuelo.length >= 3) {
                $.ajax({
                    url: "{{ route('vuelo_autocomplete') }}",
                    type: "GET",
                    data: {
                        vuelo: vuelo,
                    },
                    success: function(data) {
                        console.log('DATA VUELO', data);

                        $('#vuelo_suggestions').empty();

                        if (data.resultados && data.resultados.length > 0) {
                            $.each(data.resultados, function(index, item) {
                                let rutaText = item.ruta;
                                let rutaArray;

                                if (typeof item.ruta === 'string' && item.ruta
                                    .startsWith('[') && item.ruta.endsWith(']')) {
                                    rutaArray = JSON.parse(item.ruta);
                                } else if (Array.isArray(item.ruta)) {
                                    rutaArray = item.ruta;
                                }

                                if (Array.isArray(rutaArray)) {
                                    let selectedIndex = Number(item.selected);
                                    if (!isNaN(selectedIndex) && selectedIndex >=
                                        0 && selectedIndex < rutaArray.length) {
                                        rutaText = rutaArray[selectedIndex];
                                    }
                                }

                                let fecha = new Date(item.fecha_impresion);
                                let dia = String(fecha.getDate()).padStart(2, '0');
                                let mes = String(fecha.getMonth() + 1).padStart(2,
                                    '0');
                                let fechaFormateada = `${dia}/${mes}`;

                                let vuelo = `<strong>${item.vuelo}</strong>`;
                                let autorizado = new Date(item.autorizado)
                                    .toTimeString().slice(0, 5);

                                $('#vuelo_suggestions').append(
                                    `<li class="vuelo-item list-group-item" 
                                        data-id_proceso_vuelo="${item.id_amhs}" 
                                        data-vuelo="${item.vuelo}" 
                                        data-ruta="${rutaText}" 
                                        data-selected="${item.selected}" 
                                        data-est_array='${item.est_array}' 
                                        data-fpl_punto_seleccionado='${item.fpl_punto_seleccionado}' 
                                        data-fpl_punto='${item.fpl_punto}'
                                        data-fpl_ruta='${item.fpl_ruta}' 
                                        data-fpl_distancia='${item.fpl_distancia}' 
                                        data-fpl_nivel='${item.fpl_nivel}' 
                                        data-origen="${item.origen}" 
                                        data-destino="${item.destino}"
                                        data-cliente="${data.cliente.codigo}"
                                        data-razon_social="${data.cliente.nombre}"
                                        >
                                        ${fechaFormateada}&nbsp;&nbsp;${vuelo}${autorizado} 
                                    </li>`
                                );
                            });
                        } else {
                            $('#vuelo_suggestions').append(
                                '<li class="list-group-item disabled">No se encontraron resultados</li>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseJSON);
                        alert('Error: ' + (xhr.responseJSON?.error ||
                            'Ocurrió un problema'));
                    }
                });
            } else {
                $('#vuelo_suggestions').empty();
            }
        });

        $(document).on('click', '.vuelo-item', function() {
            let vueloSeleccionado = $(this).data('vuelo');
            let rutaSeleccionada = $(this).data('ruta');
            let origenSeleccionado = $(this).data('origen');
            let destinoSeleccionado = $(this).data('destino');
            let est_array = $(this).data('est_array');
            let fpl_punto = $(this).data('fpl_punto');
            let fpl_punto_seleccionado = $(this).data('fpl_punto_seleccionado');
            let fpl_distancia = $(this).data('fpl_distancia');
            let fpl_nivel = $(this).data('fpl_nivel');
            let fpl_ruta = $(this).data('fpl_ruta');
            let id_proceso_vuelo = $(this).data('id_proceso_vuelo');

            let cliente = $(this).data('cliente');
            let razon_social = $(this).data('razon_social');

            let aeropuertosActivos = @json($aeropuertos);
            let aeropuerto_origen = aeropuertosActivos.find(a => a.cd_oaci === origenSeleccionado);
            let aeropuerto_destino = aeropuertosActivos.find(a => a.cd_oaci === destinoSeleccionado);

            if (aeropuerto_origen) $('#origen').val(aeropuerto_origen.nombre);
            if (aeropuerto_destino) $('#destino').val(aeropuerto_destino.nombre);

            $('#vuelo').val(vueloSeleccionado);
            $('#ruta').val(rutaSeleccionada);
            $('#origen_oaci').val(origenSeleccionado);
            $('#destino_oaci').val(destinoSeleccionado);
            $('#id_proceso_vuelo').val(id_proceso_vuelo);

            $('#cliente').val(cliente);
            $('#razon_social').val(razon_social);

            if (est_array.length > 0) {
                $('#control1').val(est_array[0]);
                $('#control2').val(est_array[est_array.length - 1]);
            }

            if (fpl_nivel.length > 0) {
                $('#fl_fijo_entrada').val(fpl_nivel[0]);
                $('#fl_fijo_salida').val(fpl_nivel[fpl_nivel.length - 1]);
            }

            if (fpl_ruta.length > 0) {
                $('#ruta_vuelo').val(fpl_ruta[0]);
            }

            if (fpl_punto.length > 0) {
                $('#primer_punto').val(fpl_punto[0]);
                $('#ultimo_punto').val(fpl_punto[fpl_punto.length - 1]);
            }

            let totalDistancia = 0;
            fpl_distancia.forEach(valor => {
                if (!isNaN(valor) && isFinite(valor)) {
                    totalDistancia += Number(valor);
                }
            });
            $('#distancia').val(totalDistancia);

            let puntosSeleccionados = [];
            let estSeleccionados = [];
            let nivelSeleccionados = [];

            for (let i = 0; i < fpl_punto.length; i++) {
                if (parseInt(fpl_punto_seleccionado[i]) === 1) {
                    puntosSeleccionados.push(fpl_punto[i]);
                    estSeleccionados.push(est_array[i]);
                    nivelSeleccionados.push(fpl_nivel[i]);
                }
            }

            if (puntosSeleccionados.length > 0) {
                $('#fijo1').val(puntosSeleccionados[0]);
                $('#hora_fijo1').val(estSeleccionados[0]);
                $('#fl_fijo1').val(nivelSeleccionados[0]);
            }
            if (puntosSeleccionados.length > 1) {
                $('#fijo2').val(puntosSeleccionados[1]);
                $('#hora_fijo2').val(estSeleccionados[1]);
                $('#fl_fijo2').val(nivelSeleccionados[1]);
            }
            if (puntosSeleccionados.length > 2) {
                let last = puntosSeleccionados.length - 1;
                $('#fijo3').val(puntosSeleccionados[last]);
                $('#hora_fijo3').val(estSeleccionados[last]);
                $('#fl_fijo3').val(nivelSeleccionados[last]);
            }

            $('#vuelo_suggestions').empty();
        });
    });
</script>

{{-- CLIENTE --}}
<script>
    $(document).ready(function() {
        $('#cliente').on('input', function() {
            let query = $(this).val();

            if (query.length >= 3) {
                $.ajax({
                    url: '/clientes/buscar',
                    method: 'GET',
                    data: {
                        cliente: query
                    },
                    success: function(response) {
                        $('#resultado-clientes').empty();

                        console.log('Clientes', response);

                        if (Array.isArray(response) && response.length > 0) {
                            response.forEach(function(item) {
                                $('#resultado-clientes').append(
                                    `<li class="cliente-item list-group-item"
                                        data-codigo="${item.codigo}"
                                        data-nombre="${item.nombre}"
                                        data-origen="${item.origen}">
                                        <strong>${item.codigo}</strong> ${item.nombre}&nbsp;&nbsp;
                                        <span class="badge ${item.origen === 'Nemesis' ? 'bg-primary' : 'bg-success'}">
                                        ${item.origen}
                                        </span>
                                    </li>`
                                );
                            });
                        } else {
                            $('#resultado-clientes').append(
                                '<li class="list-group-item disabled">No se encontraron clientes</li>'
                            );
                        }

                        $('#resultado-clientes').show();
                    },
                    error: function() {
                        $('#resultado-clientes').html(
                            '<li class="list-group-item disabled">Error al buscar clientes</li>'
                        ).show();
                    }
                });
            } else {
                $('#resultado-clientes').hide();
            }
        });

        $(document).on('click', '.cliente-item', function(e) {
            e.preventDefault();

            const codigo = $(this).data('codigo');
            const nombre = $(this).data('nombre');
            const origen = $(this).data('origen');

            $('#cliente').val(codigo);
            $('#razon_social').val(nombre);
            $('#origen_cliente').val(origen);

            $('#resultado-clientes').hide();
        });
    });
</script>

{{-- MATRICULA --}}
<script>
    $(document).ready(function() {
        $('#matricula').on('input', function() {
            let query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: '/matricula_autocomplete',
                    method: 'GET',
                    data: {
                        matricula: query
                    },
                    success: function(response) {
                        $('#resultado-matriculas').empty();

                        console.log('Matrículas', response);

                        if (Array.isArray(response) && response.length > 0) {
                            response.forEach(function(item) {
                                $('#resultado-matriculas').append(
                                    `<li class="matricula-item list-group-item"
                                        data-matricula="${item.matricula}"
                                        data-modelo="${item.modelo}"
                                        data-version="${item.version}"
                                        data-peso="${item.peso_toneladas}"
                                        data-origen="${item.origen}">
                                        <strong>${item.matricula}</strong> &nbsp;&nbsp;
                                        <span class="badge ${item.origen === 'Nemesis' ? 'bg-primary' : 'bg-success'}">
                                            ${item.origen}
                                        </span>
                                    </li>`
                                );
                            });
                        } else {
                            $('#resultado-matriculas').append(
                                '<li class="list-group-item disabled">No se encontraron matrículas</li>'
                            );
                        }

                        $('#resultado-matriculas').show();
                    },
                    error: function() {
                        $('#resultado-matriculas').html(
                            '<li class="list-group-item disabled">Error al buscar matrículas</li>'
                        ).show();
                    }
                });
            } else {
                $('#resultado-matriculas').hide();
            }
        });

        $(document).on('click', '.matricula-item', function(e) {
            e.preventDefault();

            const matricula = $(this).data('matricula');
            const modelo = $(this).data('modelo');
            const version = $(this).data('version');
            const peso = $(this).data('peso');
            const origen = $(this).data('origen');

            $('#matricula').val(matricula);
            $('#modelo').val(modelo);
            $('#version').val(version);
            $('#peso').val(peso);
            $('#origen_matricula').val(origen);

            $('#resultado-matriculas').hide();
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

{{-- Autorizaciones --}}
<script>
    $('#autorizacion').on('focus', function() {
        const clienteId = $('#cliente').val(); // tomamos el valor actual del input cliente

        if (clienteId.length >= 3) {
            $.ajax({
                url: '/autorizacion_autocomplete',
                method: 'GET',
                data: {
                    clienteId: clienteId
                },
                success: function(data) {
                    console.log('Autorizaciones', data);

                    $('#autorizacion').empty();
                    $('#autorizacion').append(
                        '<option value="" disabled selected>Seleccione una autorización</option>'
                    );

                    if (data.resultados && data.resultados.length > 0) {
                        $.each(data.resultados, function(index, item) {
                            $('#autorizacion').append(
                                $('<option>', {
                                    value: item.numero_autorizacion,
                                    html: `<strong>${item.numero_autorizacion}</strong> - ${item.fecha_autorizacion}`
                                })
                            );
                        });
                    } else {
                        $('#autorizacion').append(
                            '<option disabled>No se encontraron autorizaciones, Verifique Cliente</option>'
                        );
                    }
                },
                error: function(xhr) {
                    console.error('Error al recuperar autorizaciones', xhr.responseText);
                }
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#observacion').on('change', function() {
            if ($(this).val() === 'Otro') {
                $('#observacion_otro_container').show();
                $('#observacion_otro').prop('required', true);
            } else {
                $('#observacion_otro_container').hide();
                $('#observacion_otro').val('');
                $('#observacion_otro').prop('required', false);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#sobrevueloForm').on('submit', function(e) {
            e.preventDefault(); // Previene que el form se envíe de forma tradicional

            let form = $(this);
            let formData = form.serialize(); // Puedes usar FormData si manejas archivos

            $.ajax({
                url: "{{ route('registro-sobrevuelo.store') }}", // Asegúrate que la ruta sea correcta
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val() // CSRF Token
                },
                success: function(response) {
                    // ✅ Éxito - puedes mostrar notificación, cerrar modal, etc.
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Cierra el modal (usa el ID del modal correctamente)
                    $('#addNewCardModalSobreVuelo').modal('hide');

                    // Limpia el formulario (opcional)
                    $('#sobrevueloForm').trigger("reset");

                    // Actualizar la Tabla
                    $('#sobreVueloDataTable').DataTable().ajax.reload(null, false);

                },
                error: function(xhr) {
                    // ❌ Error - puedes mostrar errores específicos
                    console.error(xhr.responseText);
                    alert('Ocurrió un error al registrar el sobrevuelo');
                }
            });
        });
    });
</script>

{{-- Ruta DCT --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#toggleDCT').on('change', function() {
            const isChecked = $(this).is(':checked');
            const rutaInput = $('#ruta');
            const distanciaInput = $('#distancia');

            if (isChecked) {
                // RUTA
                rutaInput.val('');
                rutaInput.css('background-color', '#ffd6a5'); // Naranja claro
                rutaInput.attr('placeholder', 'RUTA DCT');

                // DISTANCIA
                distanciaInput.val('');
                distanciaInput.css('background-color', '#ffd6a5');
                distanciaInput.attr('placeholder', 'Distancia DCT');
            } else {
                // RUTA
                rutaInput.val(''); // Limpia valor
                rutaInput.css('background-color', '');
                rutaInput.attr('placeholder', 'Ruta');

                // DISTANCIA
                distanciaInput.val(''); // Limpia valor
                distanciaInput.css('background-color', '');
                distanciaInput.attr('placeholder', 'Distancia');
            }

        });
    });
</script>

<script>
    const rutas = @json($rutas);

    $(document).ready(function() {
        const $inputRuta = $('#ruta');
        const $inputDistancia = $('#distancia');
        const $inputIdRuta = $('#id_ruta_dct');
        const $listaRuta = $('#rutaList');
        const $toggle = $('#toggleDCT');

        $inputRuta.on('keyup', function() {
            if (!$toggle.is(':checked')) {
                $listaRuta.empty().hide();
                return;
            }

            const query = $(this).val().toLowerCase().trim();

            if (query.length < 2) {
                $listaRuta.empty().hide();
                return;
            }

            const resultados = rutas.filter(item => item.ruta.toLowerCase().includes(query));

            let html = '';
            resultados.slice(0, 10).forEach(item => {
                html += `
                    <a href="#" class="list-group-item list-group-item-action bg-white"
                       data-value="${item.ruta}"
                       data-distancia="${item.distancia}"
                       data-id="${item.id}">
                        <b>${item.ruta}</b> — ${item.distancia} NM
                    </a>`;
            });

            if (html) {
                $listaRuta.html(html).show();
            } else {
                $listaRuta.empty().hide();
            }
        });

        $(document).on('click', '#rutaList a', function(e) {
            e.preventDefault();
            const $a = $(this);
            const rutaSeleccionada = $a.data('value');
            const distancia = $a.data('distancia');
            const idRuta = $a.data('id');

            $inputRuta.val(rutaSeleccionada);
            $inputDistancia.val(distancia);

            $listaRuta.empty().hide();
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#ruta, #rutaList').length) {
                $listaRuta.empty().hide();
            }
        });
    });
</script>

<style>
    /* Estilos mejorados para la lista de sugerencias */
    #vuelo_suggestions {
        position: absolute;
        width: 100%;
        /* Se ajusta al ancho del input */
        max-height: 200px;
        overflow-y: auto;
        list-style: none;
        padding: 0;
        margin: 0;
        background-color: #fff;
        /* Fondo sólido blanco */
        border: 1px solid #ccc;
        /* Borde más definido */
        border-radius: 5px;
        /* Bordes redondeados */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        /* Sombra ligera */
        z-index: 1000;
        /* Asegura que esté por encima de otros elementos */
    }

    /* Estilos para los elementos de la lista */
    .suggestion-item {
        padding: 10px;
        font-size: 14px;
        color: #333;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
    }

    /* Efecto al pasar el mouse */
    .suggestion-item:hover {
        background-color: #007bff;
        /* Color azul */
        color: white;
        /* Texto blanco */
    }

    /* Estilo para el último elemento para evitar bordes en la parte inferior */
    .suggestion-item:last-child {
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .custom-toggle-dct {
        width: 20px;
        height: 20px;
        accent-color: orange;
        /* Soporte moderno para navegadores compatibles */
        cursor: pointer;
    }

    /* Para navegadores que no soportan accent-color */
    .custom-toggle-dct:checked {
        background-color: orange;
        border-color: orange;
    }

    .icono-alerta {
        color: orange;
        margin-left: 5px;
        display: inline-block;
    }
</style>
