@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item">Busqueda Historica</li>
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">
        <div class="">
            <form id="formBusqueda" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="fecha_inicio">Fecha Inicio:</label>
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="">
                        </div>
                    </div>

                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="fecha_fin">Fecha Fin:</label>
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="">
                        </div>
                    </div>

                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="estado">Estado:</label>
                            <select class="form-control" name="estado" id="estado">
                                <option value="">Seleccione Estado</option>
                                <option value="2">Trabajado</option>
                                <option value="3">Autorizado</option>
                                <option value="4">Impreso</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="vuelo">Vuelo:</label>
                            <input type="text" class="form-control" name="vuelo" id="vuelo"
                                placeholder="Introduzca Vuelo" value="">
                        </div>
                    </div>

                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="tipo">Tipo:</label>
                            <input type="text" class="form-control" name="tipo" id="tipo"
                                placeholder="Introduzca Tipo" value="">
                        </div>
                    </div>

                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="origen">Origen:</label>
                            <input type="text" class="form-control" name="origen_input" id="origen_input"
                                placeholder="Introduzca Origen" value="">
                        </div>
                    </div>

                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="destino">Destino:</label>
                            <input type="text" class="form-control" name="destino" id="destino"
                                placeholder="Introduzca Destino" value="">
                        </div>
                    </div>

                    <div class="col-md-3 mb-md">
                        <div class="control-group">
                            <label for="linea_aerea">Linea Aérea:</label>
                            <input type="text" class="form-control" name="linea_aerea" id="linea_aerea"
                                placeholder="Introduzca Linea Aérea" value="">
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex-grow-1"></div>
                        <button type="submit" class="btn btn-flat btn-warning">Buscar</button>
                    </div>
                </div>
            </form>

            <br>
            <div class="row">
                <table id="basicDatatable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Vuelo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Destino</th>
                            <th scope="col">EOBT</th>
                            <th scope="col">Regla</th>
                            <th scope="col">Linea Aérea</th>
                            <th scope="col">ATD</th>
                            <th scope="col">EST</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">SQ</th>
                            <th scope="col">H.A.</th>
                            <th scope="col">Detalle</th>
                            <th scope="col" style="width: 150px">Impresión Ficha</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addNewCardModalDetalle" tabindex="-1" role="dialog"
        aria-labelledby="addNewCardModaltitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="card-title m-0" id="addNewCardModaltitle">Detalle</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">

                </div>
            </div>
        </div>
    </div>

    <div id="ficha_progreso_container">

    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#ficha_progreso_container').hide(); // Oculta el div al cargar la página
        });
    </script>

    <script>
        // FUNCIONES PARA IMPRESION FICHA DE PROCESO DE VUELO
        //funcion_ficha_tabla
        function ficha_tabla(puntoIdPunto, vuelo, tipo, velocidad, etd, dep, ruta, destino, sel, reg, sq, ha, formattedDate,
            atd, nivel,
            puntoValue, estValue, primeraFicha, ultimaFicha, chgRuta, datComplem, splPunto, splEst, equipo) {

            console.log('IMP CR', chgRuta);
            console.log('IMP DC', datComplem);
            console.log('IMP SP', splPunto);
            console.log('IMP SE', splEst);
            console.log('IMP DEP', dep);

            // Validar y reemplazar valores nulos con una cadena vacía
            chgRuta = chgRuta || '';
            datComplem = datComplem || '';
            splPunto = splPunto || '';
            splEst = splEst || '';
            sel = sel || '';
            reg = reg || '';

            console.log('IMP NIVEL', nivel);
            console.log('IMP ORIGEN', dep);
            console.log('IMP DESTINO', destino);

            // Extraer los dos primeros caracteres de dep y dest
            var tipo_ficha = '';
            let depDosPrimeros = dep.substring(0, 2);
            let destDosPrimeros = destino.substring(0, 2);

            // Verificar si ambos no son iguales a "SL"
            if (depDosPrimeros !== "SL" && destDosPrimeros !== "SL") {
                tipo_ficha = "ACC-003"; // Imprimir "ACC-003" si ambos no son "SL"
            } else {
                if (nivel) {
                    // Extraer el dígito del medio (índice 1, ya que es el segundo dígito)
                    var digitoDelMedio = parseInt(nivel.charAt(1));

                    // Verificar si el dígito es impar o par y mostrar el resultado correspondiente
                    if (digitoDelMedio % 2 !== 0) {
                        tipo_ficha = "ACC-001"; // El dígito es impar
                    } else {
                        tipo_ficha = "ACC-002"; // El dígito es par
                    }
                }
            }

            // Variables comunes
            var baseTableHtml = `
                            <div id="div_${puntoIdPunto}">
                                <table id="ficha_progreso" style="font-size: 11px; display: block;">
                                    <tr>
                                        <td rowspan="4" width="17%" class="custom-cell custom-cell-right">
                                             <span style="font-size: 18px; font-weight: bold;">&nbsp;${vuelo}</span><br><span style="font-size: 15px;">&nbsp;${tipo}/${equipo}</span><br><span style="font-size: 15px;">&nbsp;${velocidad}</span>
                                        </td>
                                        <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom">
                                            ${primeraFicha === 0 ? '<span style="font-size: 24px; font-weight: bold;">D</span><br>' + etd : splPunto}
                                        </td>
                                        <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom">
                                            &nbsp;
                                        </td>
                                        <td rowspan="2" width="10%" class="custom-cell">
                                           <img src="{{ asset('img/raya.png') }}" alt="Diagonal Line" />
                                        </td>
                                        <td width="9%" class="custom-cell custom-cell-right" style="font-size: 14px;">${puntoValue}</td>
                                        <td rowspan="4" width="12%" class="custom-cell custom-cell-right" style="font-size: 14px;">${nivel}</td>
                                        <td width="9%" class="custom-cell" style="font-size: 14px;">${dep}</td>
                                        <td width="9%" class="custom-cell" style="font-size: 14px;">${ruta}</td>
                                        <td width="9%" class="custom-cell" style="font-size: 14px;">${destino}</td>
                                        <td width="9%" class="custom-cell custom-cell-bottom custom-cell-right custom-cell-left">
                                            &nbsp;
                                        </td>
                                        <td class="custom-cell">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3" class="custom-cell custom-cell-top custom-cell-left custom-cell-right">
                                            <img src="{{ asset('img/raya.png') }}" alt="Diagonal Line" />
                                        </td>
                                        <td colspan="3" rowspan="2" class="custom-cell custom-cell-top" align="center" valign="middle">
                                            ${chgRuta}<br />${datComplem}
                                        </td>
                                        <td colspan="2" rowspan="2" class="custom-cell custom-cell-left">
                                            ${primeraFicha !== 0 ? '' : `<span class="bordered">A</span>: <span class="small-text">${ha}</span>`}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="custom-cell custom-cell-right" style="background: url('{{ asset('img/raya.png') }}') no-repeat left top; background-size: cover; text-align: left; padding: 0px; vertical-align: top;">
                                            ${primeraFicha === 0 ? atd : splEst}
                                        </td>
                                        <td rowspan="2" class="custom-cell custom-cell-right">
                                            <img src="{{ asset('img/raya.png') }}" alt="Diagonal Line" />
                                        </td>
                                        <td rowspan="2" class="custom-cell" style="font-size: 14px;">${estValue}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="custom-cell">
                                            ${primeraFicha === 0 ? `SEL/ ${sel}<br />REG/ ${reg}` : ''}
                                        </td>
                                        <td class="custom-cell">SQ/ ${sq}</td>
                                        <td colspan="2" class="custom-cell custom-cell-left" style="font-weight: bold;">${ultimaFicha === 1 ? `TNR` : ''}</br>${tipo_ficha}</td>
                                    </tr>
                                </table>
                            </div>
                            `;

            // Asignación de HTML a la variable tableHtml
            var tableHtml = baseTableHtml;
            // Crear la estructura de la tabla dinámicamente
            return tableHtml;
        }

        //Windows Print
        function printContent(content) {
            var printWindow = window.open('', '_blank', 'height=600,width=800');

            printWindow.document.write('<html><head><title>Imprimir</title>');
            printWindow.document.write('<style>');
            printWindow.document.write(
                '#ficha_progreso { width: 20cm; height: 2.5cm; border-collapse: collapse; border: 1px dashed red; margin: 0; padding: 0; }'
            );
            printWindow.document.write(
                '#ficha_progreso .custom-cell { vertical-align: middle; height: calc(2.5cm / 4); position: relative; }');
            printWindow.document.write(
                '#ficha_progreso .custom-cell img { width: 100%; height: 180%; object-fit: cover; }');
            printWindow.document.write('#ficha_progreso .custom-cell-top { border-top: 2px solid black; }');
            printWindow.document.write('#ficha_progreso .custom-cell-right { border-right: 2px solid black; }');
            printWindow.document.write('#ficha_progreso .custom-cell-bottom { border-bottom: 2px solid black; }');
            printWindow.document.write('#ficha_progreso .custom-cell-left { border-left: 2px solid black; }');
            printWindow.document.write(
                '#ficha_progreso .bordered { border: 2px solid #000; display: inline-block; padding: 2px 5px; margin: 2px; }'
            );
            printWindow.document.write(
                '@media print { #ficha_progreso { width: 20cm; height: 2.5cm; } #ficha_progreso .custom-cell { height: calc(2.5cm / 4); } }'
            );
            printWindow.document.write('@page { size: letter; margin: 0; }');
            printWindow.document.write('</style>');

            printWindow.document.write('<style>');
            printWindow.document.write('</style>');

            printWindow.document.write('</head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#formBusqueda').on('submit', function(e) {
                e.preventDefault();

                // Mostrar el indicador de carga
                let loadingMessage = `<div id="loadingIndicator" class="alert alert-info text-center">
                                        <span class="fa fa-spinner fa-spin"></span>&nbsp;&nbsp;Procesando la consulta, por favor espere...
                                      </div>`;
                // Insertamos el mensaje de carga antes de la tabla
                $('#basicDatatable').before(loadingMessage);

                $.ajax({
                    url: '/busqueda_query', // La URL debe coincidir con tu ruta correcta
                    method: 'POST',
                    data: $(this).serialize(),

                    beforeSend: function() {
                        // Mostrar el indicador de carga
                        $('#loadingIndicator').show();
                    },

                    success: function(response) {
                        // Limpiar el tbody antes de agregar nuevos datos
                        $('#basicDatatable tbody').empty();

                        // Recorrer la respuesta y construir las filas
                        $.each(response, function(index, vuelo) {
                            // Crear la fila con los datos del vuelo
                            let fila = `
                                        <tr>
                                            <td style="color: ${vuelo.color_estado || 'black'};">${vuelo.name_estado || '-'}</td>
                                            <td>${vuelo.fecha || '-'}</td>
                                            <td>${vuelo.hora || '-'}</td>
                                            <td>${vuelo.vuelo || '-'}</td>
                                            <td>${vuelo.tipo || '-'}</td>
                                            <td>${vuelo.origen || '-'}</td>
                                            <td>${vuelo.destino || '-'}</td>
                                            <td>${vuelo.eobt || '-'}</td>
                                            <td>${vuelo.regla || '-'}</td>
                                            <td>${vuelo.linea_aerea || '-'}</td>
                                            <td>${vuelo.atd || '-'}</td>
                                            <td>${vuelo.est || '-'}</td>
                                            <td>${vuelo.nivel || '-'}</td>
                                            <td>${vuelo.sq || '-'}</td>
                                            <td>${vuelo.ha || '-'}</td>
                                            <td>
                                                <a href="#" class="btn btn-raised btn-raised-info btn-sm" data-toggle="modal" data-target="#ModalDetalle${vuelo.id_amhs}">
                                                    <span class="fa fa-info-circle"></span>&nbsp;&nbsp;Detalle
                                                </a>
                                            </td>
                                            <td>
                                                <button id="printButton${vuelo.id_amhs}" class="btn btn-raised btn-raised-primary btn-sm"
                                                        ${vuelo.name_estado === 'Impreso' || vuelo.name_estado === 'Autorizado' ? '' : 'disabled'}>
                                                    <span class="fa fa-print"></span>&nbsp;&nbsp;Imprimir
                                                </button>
                                            </td>
                                        </tr>`;

                            // Crear el modal dinámico para el vuelo
                            let modal = `
                                <div class="modal fade" id="ModalDetalle${vuelo.id_amhs}" tabindex="-1" role="dialog"
                                    aria-labelledby="addNewCardModaltitle" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="alert btn btn-outline btn-outline-success">
                                                    <p class="card-title m-0" id="addNewCardModaltitle">
                                                        <span class="fa fa-plane"></span>&nbsp;&nbsp;Detalle del vuelo: ${vuelo.vuelo} (ID: ${vuelo.id_amhs})
                                                    </p>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                                                <div class="row">
                                                    <div class="col-md-3 mb-md"><strong>Fecha:</strong> ${vuelo.fecha || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Hora:</strong> ${vuelo.hora || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Vuelo:</strong> ${vuelo.vuelo || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Origen:</strong> ${vuelo.origen || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Destino:</strong> ${vuelo.destino || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Tipo:</strong> ${vuelo.tipo || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Linea Aérea:</strong> ${vuelo.linea_aerea || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Nivel:</strong> ${vuelo.nivel || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Regla:</strong> ${vuelo.regla || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>EOBT:</strong> ${vuelo.eobt || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>ATD:</strong> ${vuelo.atd || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>EST:</strong> ${vuelo.est || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>H.A.:</strong> ${vuelo.ha || '-'}</div>

                                                    <!-- Nuevos campos agregados con validación de null -->
                                                    <div class="col-md-3 mb-md"><strong>REG/:</strong> ${vuelo.reg || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>SEL/:</strong> ${vuelo.sel || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>DTA:</strong> ${vuelo.dta || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Velocidad:</strong> ${vuelo.velocidad || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Equipo:</strong> ${vuelo.equipo || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>EET:</strong> ${vuelo.eet || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>OPR/:</strong> ${vuelo.opr || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Turbulencia:</strong> ${vuelo.turbulencia || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Aeronaves:</strong> ${vuelo.aeronaves || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>Aed. Alternos:</strong> ${vuelo.aed_alternos || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>DOF/:</strong> ${vuelo.dof || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>NAV/:</strong> ${vuelo.nav || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>RMK/:</strong> ${vuelo.rmk || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>STS/:</strong> ${vuelo.sts || '-'}</div>
                                                    <div class="col-md-3 mb-md"><strong>RVR/:</strong> ${vuelo.rvr || '-'}</div>
                                                    <div class="col-md-3 mb-md">
                                                        <strong>Estado:</strong>
                                                        <span style="color: ${vuelo.color_estado};">${vuelo.name_estado || '-'}</span>
                                                    </div>
                                                    <div class="col-md-12 mb-md alert-message">
                                                        <strong>Mensaje:</strong> ${vuelo.mensaje || '-'}
                                                    </div>

                                                    <style>
                                                        .alert-message {
                                                            border-left: 5px solid #17a2b8; /* Barra de color azul */
                                                            padding-left: 15px; /* Espacio entre la barra y el contenido */
                                                            background-color: #d1ecf1; /* Fondo más claro, color info suave */
                                                            padding: 10px;
                                                            border-radius: 4px; /* Bordes redondeados opcionales */
                                                        }
                                                    </style>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

                            // Añadir la fila al tbody de la tabla
                            $('#basicDatatable tbody').append(fila);

                            // Añadir el modal al final del body para asegurarse que no hay duplicados
                            $('body').append(modal);

                            console.log(vuelo);

                            // Evento para manejar el clic en el botón de imprimir
                            $(document).on('click', `#printButton${vuelo.id_amhs}`,
                                function() {
                                    console.log(vuelo);

                                    // Recuperacion de Ficha Impresa
                                    var puntoIdPunto = 0;
                                    var atd = vuelo.atd;
                                    var sq = vuelo.sq;
                                    var ha = vuelo.ha;
                                    var nivel = vuelo.nivel;
                                    var velocidad = vuelo.velocidad;
                                    var formattedDate = '';
                                    var vuelo_texto = vuelo.vuelo;
                                    var tipo = vuelo.tipo;
                                    var etd = vuelo.etd;
                                    var dep = vuelo.dep;
                                    var destino = vuelo.destino;
                                    var sel = vuelo.sel;
                                    var reg = vuelo.reg;
                                    var primeraFicha = 0;
                                    var equipo = vuelo.equipo;

                                    var fpl_id_punto = JSON.parse(vuelo
                                        .fpl_id_punto);

                                    /* var rutaId = parseInt($(
                                        '#id_ruta_predeterminada').val()) + 0;
                                    var llave_ruta_predeterminada = parseInt($(
                                        '#llave_ruta_predeterminada').val());
                                    var selectedRutaId = $('#selectedRutaId').val();

                                    console.log('rutaId', rutaId); */

                                    var fpl_punto_seleccionado = JSON.parse(vuelo
                                        .fpl_punto_seleccionado);

                                    console.log('fpl_punto_seleccionado',
                                        fpl_punto_seleccionado);

                                    // Limpia el contenedor de la tabla al principio
                                    $('#ficha_progreso_container').empty();

                                    punto_array = [];
                                    ruta_array = [];
                                    CR_array = [];
                                    DC_array = [];
                                    SP_array = [];
                                    SE_array = [];
                                    var indexUltimaFicha = 0;

                                    fpl_punto_seleccionado.forEach((value,
                                        index) => {
                                        if (parseInt(value) === 1) {
                                            indexUltimaFicha = index;
                                        }
                                    });

                                    fpl_punto_seleccionado.forEach((value,
                                        index) => {

                                        var estValue_array = JSON.parse(
                                            vuelo.est_array);
                                        var puntoValue_array = JSON.parse(
                                            vuelo
                                            .fpl_punto);
                                        var ruta_array = JSON.parse(vuelo
                                            .fpl_ruta);
                                        var chgRuta_array = JSON.parse(vuelo
                                            .chg_ruta_array);
                                        var datComplem_array = JSON.parse(
                                            vuelo
                                            .dt_cmp_array);
                                        var splPunto_array = JSON.parse(
                                            vuelo
                                            .spl_punto_array);
                                        var splEst_array = JSON.parse(vuelo
                                            .spl_est);

                                        var estValue = estValue_array[
                                            index];
                                        var puntoValue = puntoValue_array[
                                            index];
                                        var ruta = ruta_array[index];
                                        var chgRuta = chgRuta_array[index];
                                        var datComplem = datComplem_array[
                                            index];
                                        var splPunto = splPunto_array[
                                            index];

                                        var splEst = splEst_array[index];

                                        if (parseInt(value) === 1) {

                                            if (index ===
                                                indexUltimaFicha) {
                                                var ultimaFicha = 1;
                                            }

                                            // Crear la estructura de la tabla dinámicamente
                                            var tableHtml = ficha_tabla(
                                                puntoIdPunto,
                                                vuelo_texto,
                                                tipo,
                                                velocidad, etd, dep,
                                                ruta, destino, sel, reg,
                                                sq, ha,
                                                formattedDate, atd,
                                                nivel, puntoValue,
                                                estValue, primeraFicha,
                                                ultimaFicha, chgRuta,
                                                datComplem, splPunto,
                                                splEst, equipo);

                                            primeraFicha = 1;

                                        }

                                        // Añadir la tabla dentro de un nuevo div al contenedor
                                        $('#ficha_progreso_container')
                                            .append(tableHtml);
                                    });

                                    var printContents = document.getElementById(
                                        'ficha_progreso_container').innerHTML;

                                    // Llamar a la función de impresión
                                    printContent(printContents);

                                });

                        });
                    },

                    error: function(xhr) {
                        console.error(xhr);
                    },

                    complete: function() {
                        // Ocultar el indicador de carga cuando la solicitud se completa
                        $('#loadingIndicator').remove();
                    }
                });
            });
        });
    </script>

    <script>
        // Capturar el evento click en el botón de "Detalle"
        $(document).on('click', '[data-target="#addNewCardModalDetalle"]', function() {
            // Obtener el ID del vuelo desde el atributo "data-id"
            var vueloId = $(this).data('id');

            // Aquí puedes hacer una llamada AJAX o manipular el contenido del modal según el vueloId.
            // En este ejemplo, simplemente actualizamos el contenido con el ID del vuelo.

            $('#addNewCardModalDetalle .modal-body').html(`
        <p>Detalles del vuelo ID: ${vueloId}</p>
        <!-- Puedes agregar más información aquí sobre el vuelo -->
    `);
        });
    </script>
@endsection
