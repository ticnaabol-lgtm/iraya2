{{-- Limpiar Inputs --}}
<script>
    $(document).ready(function() {
        // Limpiar todos los campos input
        $('input').val('');
        $('input[type="hidden"], input[type="text"]').val('');
    });
</script>

{{-- Obtener Estados --}}
{{-- <script>
    function obtenerEstados(limit) {
        // Hacer la solicitud AJAX para obtener los procesos con un límite
        $.ajax({
            url: '{{ route('obtenerEstados') }}', // Ruta al controlador corregida
            method: 'GET',
            data: {
                limit: limit // Enviar el límite como parámetro
            },
            success: function(response) {
                if (response.success) {
                    var procesos = response.data;
                    var rows = '';

                    console.log('PROCESOS', procesos);

                    if (procesos.length > 0) {
                        // Iterar sobre los datos de procesos
                        procesos.forEach(function(proceso) {
                            // Buscar la fila con el data-id que coincida con el proceso.id_amhs
                            var fila = $('tr[data-id="' + proceso.id_amhs + '"]');

                            if (fila.length > 0) {
                                // Si se encuentra la fila, modificar el contenido del <td> correspondiente
                                var estadoCelda = fila.find('td[id^="estado"]');
                                
                                if (estadoCelda.length > 0) {
                                    // Buscar si hay un <span> dentro del <td> (badge)
                                    let badge = estadoCelda.find('span');

                                    if (badge.length === 0) {
                                        // Si no existe el badge, lo creamos y lo agregamos al <td>
                                        badge = $('<span></span>')
                                            .addClass(
                                                'badge rounded-pill text-white'
                                            ) // Clases de Bootstrap para el badge
                                            .appendTo(estadoCelda); // Agregar el badge al <td>
                                    }

                                    // Actualizar el texto y el color del badge
                                    badge.text(proceso.name_estado.toUpperCase());
                                    badge.css({
                                        'background-color': proceso
                                            .color_estado,
                                        'color': '#ffffff',
                                        'font-weight': 'bold'
                                    });
                                }

                                // Actualizar el atributo data-id_estado en el <tr>
                                fila.attr('data-id_estado', proceso.id_estado);

                                var usuarioCelda = fila.find('td[id^="usuario"]');
                                if (usuarioCelda.length > 0) {
                                    // Cambiar el contenido de la celda al nombre del estado del proceso
                                    usuarioCelda.text(proceso.name);
                                }

                            }
                        });
                    }

                } else {
                    // Manejo de error si la respuesta no tiene éxito
                    console.error('Error en la respuesta del servidor: ', response.message);
                }
            },
            error: function(xhr, status, error) {
                // Manejo de errores en la solicitud
                console.error('Error en la solicitud AJAX: ', error);
            }
        });
    }

    // Llamar a obtenerEstados cada 30 segundos
    setInterval(function() {
        console.log('Estado 30s');
        obtenerEstados(20);
    }, 20000);
</script> --}}

<script>
    function obtenerEstados(limit) {
        $.ajax({
            url: '{{ route('obtenerEstados') }}',
            method: 'GET',
            success: function(response) {
                if (response.success) {
                    var procesos = response.data;

                    console.log('ESTADO PROCESOS', procesos);

                    if (procesos.length > 0) {
                        procesos.forEach(function(proceso) {
                            // Buscar la fila por ID
                            var fila = $('tr[data-id="' + proceso.id_amhs + '"]');

                            // Verificar si la fila existe
                            if (fila.length > 0) {
                                // Recuperar y convertir ambos valores a número
                                var idEstadoActual = Number(fila.attr('data-id_estado'));
                                var idEstadoBD = Number(proceso.id_estado);

                                // Comparar como números
                                if (idEstadoActual !== idEstadoBD) {

                                    console.log('ESTADO FILA', proceso.id_amhs + ' ' + proceso
                                        .id_estado + ' ' + idEstadoActual);

                                    // Obtener la celda de estado 
                                    var estadoCelda = fila.find('td').eq(1);

                                    if (estadoCelda.length > 0) {
                                        // Buscar si hay un <span> dentro del <td> (badge)
                                        let badge = estadoCelda.find('span');

                                        if (badge.length === 0) {
                                            // Si no existe el badge, lo creamos y lo agregamos al <td>
                                            badge = $('<span></span>')
                                                .addClass('badge rounded-pill text-white')
                                                .appendTo(estadoCelda);
                                        }

                                        // Actualizar el texto y el color del badge
                                        badge.text(proceso.name_estado.toUpperCase());
                                        badge.css({
                                            'background-color': proceso.color_estado,
                                            'color': '#ffffff',
                                            'font-weight': 'bold'
                                        });
                                    }

                                    // Actualizar el atributo data-id_estado en el <tr>
                                    fila.attr('data-id_estado', proceso.id_estado);
                                }

                                // Cerrado 
                                var Cerrado = Number(proceso.cerrado);
                                if (Cerrado === 1) {

                                    // Obtener la celda de estado (si no la tenemos ya)
                                    var estadoCelda = fila.find('td').eq(1);

                                    if (estadoCelda.length > 0) {
                                        // Buscar el badge
                                        let badge = estadoCelda.find('span');

                                        if (badge.length > 0) {
                                            // Concatenar el candadito al texto existente del badge
                                            let currentText = badge.text();

                                            // Solo agregar el candadito si no lo tiene ya
                                            if (!currentText.includes('🔒')) {
                                                badge.text(currentText + ' 🔒');
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    }
                } else {
                    console.error('Error en la respuesta del servidor: ', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX: ', error);
            }
        });
    }

    // Ejecutar cada 20 segundos
    setInterval(function() {
        console.log('Estado 20s');
        obtenerEstados(20);
    }, 20000);
</script>

{{-- FPLs Creados --}}
<script>
    function FPLCreados() {
        // Hacer la solicitud AJAX para obtener los procesos con un límite
        $.ajax({
            url: '{{ route('FPLCreados') }}', // Ruta al controlador corregida
            method: 'GET',
            data: {
                // limit: limit
            },
            success: function(response) {
                if (response.success) {
                    var data = response.data;
                    console.log('creados', data);

                    var rows = '';
                    // Asegurarse de que haya datos antes de continuar
                    if (data.length > 0) {
                        $.each(data, function(index, d) {

                            // Extraer el día de d.fecha
                            if (d.fecha) {
                                var dia = d.fecha.split('-')[2];
                            }

                            var diaHora = dia + ' ' + d.hora;

                            rows = `
                                <tr
                                    data-id="${d.id_amhs_creado}"
                                    data-id_amhs="${d.id}"
                                    data-id_estado="${d.id_estado}"
                                    data-fecha="${d.fecha}"
                                    data-hora="${d.hora}"
                                    data-vuelo="${d.vuelo}"
                                    data-tipo="${d.tipo}"
                                    data-origen="${d.origen}"
                                    data-destino="${d.destino}"
                                    data-eobt="${d.eobt}"
                                    data-linea_aerea="${d.linea_aerea}"
                                    data-velocidad="${d.velocidad}"
                                    data-mensaje="${d.mensaje}"
                                    data-dep="${d.dep}"
                                    data-etd="${d.etd}"
                                    data-reg="${d.reg}"
                                    data-rpl="${d.rpl}"
                                    data-sel="${d.sel}"
                                    data-puntos="${d.puntos}"
                                    data-regla_tipo="${d.regla_tipo}"
                                    data-tipo_fpl="${d.tipo_fpl}"
                                    data-turbulencia="${d.turbulencia}"
                                    data-equipo="${d.equipo}"
                                    data-eet="${d.eet}"
                                    data-aed_alternos="${d.aed_alternos}"
                                    data-dof="${d.dof}"
                                    data-rmk="${d.rmk}"
                                    data-sts="${d.sts}"
                                    data-opr="${d.opr}"
                                    data-nav="${d.nav}"
                                    data-rvr="${d.rvr}"
                                    data-dest2="${d.dest2}"
                                >
                                    <td class="align-middle">${d.id}</td>
                                    <td class="align-middle" id="estado${d.id}">
                                        <span class="badge rounded-pill text-white" style="background-color: ${d.color_estado};">
                                            ${d.name_estado}
                                        </span>
                                    </td>
                                    <td class="align-middle">${diaHora}</td>
                                    <td class="align-middle"><strong>${d.vuelo.substring(0, 7)}</strong></td>
                                    <td class="align-middle">${d.tipo}</td>
                                    <td class="align-middle"><strong>${d.origen}</strong></td>
                                    <td class="align-middle"><strong>${d.destino}</strong></td>
                                    <td class="align-middle">${d.eobt}</td>
                                    <td class="align-middle"><strong>${d.regla_tipo}</strong></td>
                                </tr>
                            `;

                            var id_amhs_creado = d.id_amhs_creado;

                            // Buscar la fila existente con data-id igual a id_amhs_creado
                            var existingRow = $('tr[data-id="' + id_amhs_creado + '"]');

                            if (existingRow.length > 0) {
                                // Insertar la nueva fila antes de la fila existente
                                existingRow.before(rows);
                            }
                        });
                    }
                }
            },
            error: function(xhr, status, error) {
                // Manejo de errores en la solicitud
                console.error('Error en la solicitud AJAX: ', error);
            }
        });
    }
</script>
{{-- AMHS --}}
{{-- <script>
    $('#profile-tab').on('click', function() {
        // Oculta el span con id autorizado_speci
        $('#autorizado_speci').hide();
    });
</script> --}}
<script>
    $(document).ready(function() {
        // Mostrar el spinner de carga al inicio
        $('#loadingIndicator').show();

        // Hacer la solicitud AJAX obtenerAmhsPag
        $.ajax({
            url: '{{ route('obtenerAmhsPag') }}', // La ruta que apunta al método obtenerAmhsPag en el controlador
            method: 'GET',
            data: {
                inicio: 0,
                fin: 500
            },
            success: function(response) {
                if (response.success) {
                    var amhsData = response.data;
                    var rows = '';

                    // Asegurarse de que haya datos antes de continuar
                    if (amhsData.length > 0) {
                        $.each(amhsData, function(index, d) {
                            rows += `
                                <tr
                                    data-id="${d.id}"
                                    data-id_estado="${d.id_estado}"
                                    data-fecha="${d.fecha}"
                                    data-hora="${d.hora}"
                                    data-vuelo="${d.vuelo}"
                                    data-tipo="${d.tipo}"
                                    data-origen="${d.origen}"
                                    data-destino="${d.destino}"
                                    data-eobt="${d.eobt}"
                                    data-nivel_propuesto="${d.nivel_propuesto}"
                                    data-ruta_propuesta="${d.ruta_propuesta}"
                                    data-linea_aerea="${d.linea_aerea}"
                                    data-velocidad="${d.velocidad}"
                                    data-mensaje="${d.mensaje}"
                                    data-dep="${d.dep}"
                                    data-etd="${d.etd}"
                                    data-reg="${d.reg}"
                                    data-rpl="${d.rpl}"
                                    data-sel="${d.sel}"
                                    data-puntos="${d.puntos}"
                                    data-regla_tipo="${d.regla_tipo}"
                                    data-tipo_fpl="${d.tipo_fpl}"
                                    data-turbulencia="${d.turbulencia}"
                                    data-equipo="${d.equipo}"
                                    data-eet="${d.eet}"
                                    data-aed_alternos="${d.aed_alternos}"
                                    data-dof="${d.dof}"
                                    data-rmk="${d.rmk}"
                                    data-sts="${d.sts}"
                                    data-opr="${d.opr}"
                                    data-nav="${d.nav}"
                                    data-rvr="${d.rvr}"
                                    data-dest2="${d.dest2}"
                                >
                                    <td class="align-middle">${d.id}</td>
                                    <td class="align-middle" id="estado${d.id}">
                                        <span class="badge rounded-pill text-white" style="background-color: ${d.color_estado};">
                                            ${d.estado}
                                        </span>
                                    </td>
                                    <td class="align-middle">${d.hora}</td>
                                    <td class="align-middle"><strong>${d.vuelo.substring(0, 7)}</strong></td>
                                    <td class="align-middle">${d.tipo}</td>
                                    <td class="align-middle"><strong>${d.origen}</strong></td>
                                    <td class="align-middle"><strong>${d.destino}</strong></td>
                                    <td class="align-middle">${d.eobt}</td>
                                    <td class="align-middle"><strong>${d.regla_tipo}</strong></td>
                                </tr>
                            `;
                        });

                        // Insertar las filas generadas en la tabla
                        $('#amhs-data').html(rows);

                        // Obtener el último valor de id (fuera del loop para optimización)
                        let currentID = amhsData[amhsData.length - 1].id;

                        // Eliminar cualquier valor previo y guardar el nuevo valor de ID
                        localStorage.removeItem('currentID');
                        localStorage.setItem('currentID', currentID);

                        // Verificar que se guardó correctamente
                        console.log('El último ID es:', localStorage.getItem('currentID'));

                        // Filtrar los datos de la tabla en tiempo real
                        $('#searchInput').on('keyup', function() {
                            var value = $(this).val().toLowerCase();
                            $('#amhs-data tr').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(
                                    value) > -1);
                            });
                        });

                        // Filtro Origen y Destino
                        var userTipo = @json($userTip);

                        // Flag global para saber si el filtro de autorizados está activo
                        var filtroAutorizadosActivo = false;

                        // Función principal para aplicar todos los filtros
                        function filtrarTabla() {
                            var filtrarOrigen = $('#origen_filtro').prop('checked');
                            var filtrarDestino = $('#destino_filtro').prop('checked');

                            $('#amhs-data tr').each(function() {
                                var origenValue = $(this).data('origen');
                                var destinoValue = $(this).data('destino');
                                var estadoValue = $(this).find('td:eq(1)').text()
                                    .trim(); // Segunda columna: Estado

                                var mostrarFila = true;

                                // Filtro por Origen
                                if (filtrarOrigen && origenValue !== userTipo.descripcion) {
                                    mostrarFila = false;
                                }

                                // Filtro por Destino
                                if (filtrarDestino && destinoValue !== userTipo
                                    .descripcion) {
                                    mostrarFila = false;
                                }

                                // Filtro por Estado: solo si está activo
                                if (filtroAutorizadosActivo && estadoValue !==
                                    'AUTORIZADO') {
                                    mostrarFila = false;
                                }

                                $(this).toggle(mostrarFila);
                            });
                        }

                        // Detectar cambios en los checkboxes
                        $('#origen_filtro, #destino_filtro').on('change', function() {
                            filtrarTabla();
                        });

                        // Activar filtro de autorizados al hacer clic en la pestaña
                        $('#autorizados_filtro').on('click', function() {
                            filtroAutorizadosActivo = true;
                            filtrarTabla();
                        });

                        // Desactivar filtro de autorizados al cambiar a otra pestaña
                        $('.nav-link').on('click', function() {
                            if ($(this).attr('id') !== 'autorizados_filtro') {
                                filtroAutorizadosActivo = false;
                                filtrarTabla();
                            }
                        });

                        // Filtro Origen y Destino

                    } else {
                        // En caso de que no haya datos, mostrar un mensaje en la tabla
                        $('#amhs-data').html(
                            '<tr><td colspan="10">No se encontraron datos.</td></tr>');
                    }

                } else {
                    // Si hay un error en la respuesta
                    $('#amhs-data').html('<tr><td colspan="10">Error cargando datos.</td></tr>');
                    console.error('Error en la respuesta del servidor');
                }
            },
            error: function(xhr, status, error) {
                // En caso de error, mostrar un mensaje en la tabla y en la consola
                $('#amhs-data').html('<tr><td colspan="10">Error cargando datos.</td></tr>');
                console.error('Error:', error, 'Estado:', status, 'XHR:', xhr);
            },
            complete: function() {
                // Ocultar el indicador de carga una vez finalizada la solicitud
                // obtenerEstados(500);
                FPLCreados();
                $('#loadingIndicator').hide();
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // let lastId = 0;
        // let perPage = 100;
        let loading = false;
        // Declarar e inicializar currentPage
        // let currentPage = 1;

        // Inicializar lastId con el último ID en el DOM
        /* const initializeLastId = () => {
            const lastRow = document.querySelector('#amhs-data tr:last-child');
            if (lastRow) {
                lastId = parseInt(lastRow.getAttribute('data-id')) || 0;
            }
        }; */

        // initializeLastId();

        function showLoadingIndicator() {
            document.getElementById('loadingIndicator').style.display = 'block';
        }

        function hideLoadingIndicator() {
            document.getElementById('loadingIndicator').style.display = 'none';
        }

        /* function checkForNewRecords() {

            // Selecciona todas las filas <tr> que tienen el atributo data-id dentro de la tabla
            let rows = document.querySelectorAll('#datatableScrollY tr[data-id]');

            // Cuenta el número de filas encontradas
            let rowCount = rows.length;
            console.log('rowCount', rowCount);

            if (rowCount > 20) {

                // Si ya se está cargando, no hacer nada
                if (loading) return;
                loading = true;
                showLoadingIndicator();

                // Selecciona el primer <tr> que tiene el atributo data-id en la tabla con el id 'datatableScrollY'
                let firstTr = document.querySelector('#datatableScrollY tr[data-id]');
                let lastId = firstTr.getAttribute('data-id');

                if (lastId) {
                    lastId = parseInt(lastId); // Asegúrate de convertirlo a número
                }

                console.log('LastID', lastId);

                $.ajax({
                    url: '/load-new-data',
                    method: 'GET',
                    data: {
                        lastId: lastId
                    },
                    success: function(response) {
                        console.log('Respuesta del servidor:', response);
                        let data = response.data || response;

                        console.log('DATA:', data);

                        if (Array.isArray(data)) {
                            let rows = '';
                            data.forEach(function(d) {
                                rows += '<tr ' +
                                    'data-id="' + d.id + '" ' +
                                    'data-id_estado="' + d.id_estado + '" ' +
                                    'data-fecha="' + d.fecha + '" ' +
                                    'data-hora="' + d.hora + '" ' +
                                    'data-vuelo="' + d.vuelo + '" ' +
                                    'data-tipo="' + d.tipo + '" ' +
                                    'data-origen="' + d.origen + '" ' +
                                    'data-destino="' + d.destino + '" ' +
                                    'data-eobt="' + d.eobt + '" ' +
                                    'data-nivel_propuesto="' + d.nivel_propuesto + '" ' +
                                    'data-ruta_propuesta="' + d.ruta_propuesta + '" ' +
                                    'data-linea_aerea="' + d.linea_aerea + '" ' +
                                    'data-velocidad="' + d.velocidad + '" ' +
                                    'data-dep="' + d.dep + '" ' +
                                    'data-etd="' + d.etd + '" ' +
                                    'data-reg="' + d.reg + '" ' +
                                    'data-rpl="' + d.rpl + '" ' +
                                    'data-sel="' + d.sel + '" ' +
                                    'data-puntos="' + d.puntos + '" ' +
                                    'data-regla_tipo="' + d.regla_tipo + '" ' +
                                    'data-tipo_fpl="' + d.tipo_fpl + '" ' +
                                    'data-turbulencia="' + d.turbulencia + '" ' +
                                    'data-equipo="' + d.equipo + '" ' +
                                    'data-eet="' + d.eet + '" ' +
                                    'data-aed_alternos="' + d.aed_alternos + '" ' +
                                    'data-dof="' + d.dof + '" ' +
                                    'data-rmk="' + d.rmk + '" ' +
                                    'data-dest2="' + d.dest2 + '" ' +
                                    'data-sts="' + d.sts + '" ' +
                                    'data-opr="' + d.opr + '" ' +
                                    'data-sel="' + d.sel + '" ' +
                                    'data-nav="' + d.nav + '" ' +
                                    'data-rvr="' + d.rvr + '" ' +
                                    'data-mensaje="' + d.mensaje + '">' +
                                    '<td class="align-middle">' + d.id + '</td>' +
                                    '<td class="align-middle" id="estado' + d.id +
                                    '" style="color:' + d.color_estado + ';">' + d.estado +
                                    '</td>' +
                                    '<td class="align-middle">' + d.hora + '</td>' +
                                    '<td class="align-middle">' + d.vuelo + '</td>' +
                                    '<td class="align-middle">' + d.tipo + '</td>' +
                                    '<td class="align-middle">' + d.origen + '</td>' +
                                    '<td class="align-middle">' + d.destino + '</td>' +
                                    '<td class="align-middle">' + d.eobt + '</td>' +
                                    '<td class="align-middle">' + d.regla_tipo + '</td>' +
                                    '<td class="align-middle">' + d.linea_aerea + '</td>' +
                                    '<td class="align-middle" id="usuario' + d.id +
                                    '" ></td>' +
                                    '</tr>';
                            });

                            // Insertar nuevos registros al inicio de la tabla
                            $('#amhs-data').prepend(rows);

                        } else {
                            console.error('La respuesta del servidor no es un array:', response);
                        }
                        loading = false; // Resetear el estado de carga
                        hideLoadingIndicator(); // Ocultar el indicador de carga
                    },
                    error: function() {
                        console.error('Error al verificar nuevos registros');
                        loading = false; // Resetear el estado de carga incluso en error
                        hideLoadingIndicator(); // Ocultar el indicador de carga en caso de error
                    }
                });
            }

        } */

        // Configurar intervalos regulares para verificar nuevos registros
        // setInterval(checkForNewRecords, 30000); // Verificar cada 50 segundos

        let isChecking = false; // Control de concurrencia

        async function checkForNewRecords() {
            if (isChecking) return; // Evita ejecutar múltiples peticiones al mismo tiempo
            isChecking = true;

            try {
                let rows = document.querySelectorAll('#datatableScrollY tr[data-id]');
                let rowCount = rows.length;
                console.log('🔄 Verificando nuevos registros... rowCount:', rowCount);

                if (rowCount > 20) {
                    showLoadingIndicator();

                    let firstTr = document.querySelector('#datatableScrollY tr[data-id]');
                    let lastId = firstTr ? parseInt(firstTr.getAttribute('data-id')) : null;

                    console.log('📌 Último ID encontrado:', lastId);

                    let response = await fetch(`/load-new-data?lastId=${lastId}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    });

                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                    let data = await response.json();

                    console.log('🚀 Respuesta del servidor:', data);

                    // Extraer datos si vienen dentro de `data.data`
                    if (data.data && Array.isArray(data.data)) {
                        data = data.data;
                    }

                    if (Array.isArray(data) && data.length > 0) {
                        console.log('✅ Nuevos registros encontrados:', data.length);

                        let rowsHtml = data.map(d => `
                    <tr data-id="${d.id}"
                        data-id_estado="${d.id_estado}"
                        data-fecha="${d.fecha}"
                        data-hora="${d.hora}"
                        data-vuelo="${d.vuelo}"
                        data-tipo="${d.tipo}"
                        data-origen="${d.origen}"
                        data-destino="${d.destino}"
                        data-eobt="${d.eobt}"
                        data-nivel_propuesto="${d.nivel_propuesto}"
                        data-ruta_propuesta="${d.ruta_propuesta}"
                        data-linea_aerea="${d.linea_aerea}"
                        data-velocidad="${d.velocidad}"
                        data-dep="${d.dep}"
                        data-etd="${d.etd}"
                        data-reg="${d.reg}"
                        data-rpl="${d.rpl}"
                        data-sel="${d.sel}"
                        data-puntos="${d.puntos}"
                        data-regla_tipo="${d.regla_tipo}"
                        data-tipo_fpl="${d.tipo_fpl}"
                        data-turbulencia="${d.turbulencia}"
                        data-equipo="${d.equipo}"
                        data-eet="${d.eet}"
                        data-aed_alternos="${d.aed_alternos}"
                        data-dof="${d.dof}"
                        data-rmk="${d.rmk}"
                        data-dest2="${d.dest2}"
                        data-sts="${d.sts}"
                        data-opr="${d.opr}"
                        data-nav="${d.nav}"
                        data-rvr="${d.rvr}"
                        data-mensaje="${d.mensaje}">
                        <td class="align-middle">${d.id}</td>
                        <td class="align-middle" id="estado${d.id}">
                            <span class="badge rounded-pill text-white" style="background-color: ${d.color_estado};">
                                ${d.estado}
                            </span>
                        </td>
                        <td class="align-middle">${d.hora}</td>
                        <td class="align-middle"><strong>${d.vuelo.substring(0, 7)}</strong></td>
                        <td class="align-middle">${d.tipo}</td>
                        <td class="align-middle"><strong>${d.origen}</strong></td>
                        <td class="align-middle"><strong>${d.destino}</strong></td>
                        <td class="align-middle">${d.eobt}</td>
                        <td class="align-middle"><strong>${d.regla_tipo}</strong></td>
                    </tr>
                `).join('');

                        // Insertar nuevos registros al inicio de la tabla
                        document.querySelector('#amhs-data').insertAdjacentHTML('afterbegin', rowsHtml);
                    } else {
                        console.warn('⚠ No se encontraron nuevos registros.');
                    }
                }
            } catch (error) {
                console.error('🔥 Error al verificar nuevos registros:', error);
            } finally {
                isChecking = false; // Habilita la siguiente ejecución
                hideLoadingIndicator(); // Ocultar el indicador de carga
            }
        }

        // Ejecutar la función cada 30 segundos
        setInterval(checkForNewRecords, 20000);

        // Inicializar la carga inicial de datos
        // checkForNewRecords();

        // Función para cargar más datos en scroll
        function loadMoreData(page) {

            if (loading) return; // Si ya se está cargando, no hacer nada
            loading = true;
            showLoadingIndicator(); // Mostrar el indicador de carga

            // Calcular los valores de inicio y fin
            let inicio = page;
            let fin = 100;

            $.ajax({
                url: '/load-more-data', // La ruta del controlador
                method: 'GET',
                data: {
                    inicio: inicio,
                    fin: fin
                },
                success: function(response) {
                    console.log('MORE-DATA Respuesta del servidor:',
                        response
                    ); // Log de la respuesta
                    // Manejar diferentes estructuras de respuesta
                    var data = response.data || response;

                    // Recupera el valor de currentID desde localStorage
                    let currentID = localStorage.getItem('currentID');

                    // Si el array 'data' tiene elementos, actualiza currentID con el último id
                    if (data && data.length > 0) {
                        currentID = data[data.length - 1].id;
                        // Guardar el nuevo valor en localStorage
                        localStorage.setItem('currentID', currentID);
                        // Verificar que se guardó correctamente
                        console.log('El último ID es:', localStorage.getItem('currentID'));
                    } else {
                        console.log('No hay datos para actualizar currentID.');
                    }

                    if (Array.isArray(data)) {
                        var rows = '';
                        data.forEach(function(d) {
                            rows += '<tr ' +
                                'data-id="' + d.id + '" ' +
                                'data-id_estado="' + d.id_estado + '" ' +
                                'data-fecha="' + d.fecha + '" ' +
                                'data-hora="' + d.hora + '" ' +
                                'data-vuelo="' + d.vuelo + '" ' +
                                'data-tipo="' + d.tipo + '" ' +
                                'data-origen="' + d.origen + '" ' +
                                'data-destino="' + d.destino + '" ' +
                                'data-eobt="' + d.eobt + '" ' +
                                'data-nivel_propuesto="' + d.nivel_propuesto + '" ' +
                                'data-ruta_propuesta="' + d.ruta_propuesta + '" ' +
                                'data-linea_aerea="' + d.linea_aerea + '" ' +
                                'data-velocidad="' + d.velocidad + '" ' +
                                'data-dep="' + d.dep + '" ' +
                                'data-etd="' + d.etd + '" ' +
                                'data-reg="' + d.reg + '" ' +
                                'data-rpl="' + d.rpl + '" ' +
                                'data-sel="' + d.sel + '" ' +
                                'data-puntos="' + d.puntos + '" ' +
                                'data-regla_tipo="' + d.regla_tipo + '" ' +
                                'data-tipo_fpl="' + d.tipo_fpl + '" ' +
                                'data-turbulencia="' + d.turbulencia + '" ' +
                                'data-equipo="' + d.equipo + '" ' +
                                'data-eet="' + d.eet + '" ' +
                                'data-aed_alternos="' + d.aed_alternos + '" ' +
                                'data-dof="' + d.dof + '" ' +
                                'data-rmk="' + d.rmk + '" ' +
                                'data-dest2="' + d.dest2 + '" ' +
                                'data-sts="' + d.sts + '" ' +
                                'data-opr="' + d.opr + '" ' +
                                'data-sel="' + d.sel + '" ' +
                                'data-nav="' + d.nav + '" ' +
                                'data-rvr="' + d.rvr + '" ' +
                                'data-mensaje="' + d.mensaje + '">' +
                                '<td class="align-middle">' + d.id + '</td>' +
                                '<td class="align-middle" id="estado' + d.id + '">' +
                                '<span class="badge rounded-pill text-white" style="background-color:' +
                                d.color_estado + ';">' +
                                d.estado +
                                '</span>' +
                                '</td>' +
                                '<td class="align-middle">' + d.hora + '</td>' +
                                '<td class="align-middle"><strong>' + d.vuelo.substring(0,
                                    7) +
                                '</strong></td>' +
                                '<td class="align-middle">' + d.tipo + '</td>' +
                                '<td class="align-middle"><strong>' + d.origen +
                                '</strong></td>' +
                                '<td class="align-middle"><strong>' + d.destino +
                                '</strong></td>' +
                                '<td class="align-middle">' + d.eobt + '</td>' +
                                '<td class="align-middle"><strong>' + d.regla_tipo +
                                '</strong></td>' +
                                '</tr>';
                        });
                        $('#amhs-data').append(rows);

                        // Actualizar lastId con el ID del último registro recibido
                        if (data.length > 0) {
                            lastId = data[data.length - 1].id;
                        }
                    } else {
                        console.error('La respuesta del servidor no es un array:', response);
                    }
                    loading = false; // Resetear el estado de carga
                    hideLoadingIndicator(); // Ocultar el indicador de carga
                },
                error: function() {
                    console.error('Error al cargar más datos');
                    loading = false; // Resetear el estado de carga incluso en error
                    hideLoadingIndicator(); // Ocultar el indicador de carga en caso de error
                }
            });
        }

        // Obtén la referencia al contenedor de la tabla
        var container = document.getElementById('tableContainer');

        // Asegúrate de que el contenedor existe
        if (container) {
            // Agrega un event listener al evento de scroll del contenedor
            container.addEventListener('scroll', function() {

                // Calcula el porcentaje de scroll vertical
                var scrollTop = container.scrollTop;
                var scrollHeight = container.scrollHeight - container.clientHeight;
                var scrollPercent = (scrollTop / scrollHeight) * 100;

                // Imprime el porcentaje en la consola
                console.log('Scroll vertical: ' + scrollPercent.toFixed(2) + '%');

                // Selecciona todas las filas <tr> que tienen el atributo data-id dentro de la tabla
                let rows = document.querySelectorAll('#datatableScrollY tr[data-id]');

                // Cuenta el número de filas encontradas
                let rowCount = rows.length;
                console.log('rowCount', rowCount);

                // Selecciona el input del campo de búsqueda
                let searchInput = document.querySelector(
                    'input[type="search"].form-control.form-control-sm');

                // Verifica si el valor del input no es null ni vacío
                let searchValue = searchInput ? searchInput.value : null;
                console.log('searchValue', searchValue);

                // Verifica si el scroll es mayor o igual al 95%
                if (scrollPercent >= 95 && !loading) {

                    // Recupera el valor de currentID desde localStorage
                    let currentID = localStorage.getItem('currentID');

                    if (currentID) {
                        currentID = parseInt(currentID); // Asegúrate de convertirlo a número
                    }

                    // currentPage++;
                    console.log('Cargando más datos... ID: ' + currentID);
                    loadMoreData(currentID);
                }
            });
        } else {
            console.error('No se encontró un contenedor con el id "tableContainer".');
        }
    });
</script>

{{-- Buscador AMHS --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttonSearch = document.getElementById("button_search");

        buttonSearch.addEventListener("click", function(event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del botón submit

            // Reiniciar el contenido antes de agregar nuevos rows
            $('#amhs-data-search').html('');

            // Recuperar los valores de los inputs
            const fechaInicio = document.getElementById("fecha_inicio_search").value;
            const fechaFin = document.getElementById("fecha_fin_search").value;
            let vuelo = document.getElementById("vuelo_search").value;
            let origen = document.getElementById("origen_search").value;
            let destino = document.getElementById("destino_search").value;
            let estado = document.getElementById("estado_search").value;

            console.log('estado', estado);

            vuelo = vuelo.toUpperCase();
            origen = origen.toUpperCase();
            destino = destino.toUpperCase();

            // Crear un objeto con los datos
            const data = {
                fecha_inicio: fechaInicio,
                fecha_fin: fechaFin,
                vuelo: vuelo,
                origen: origen,
                destino: destino,
                estado: estado,
            };

            // Mostrar el spinner de carga al inicio
            $('#loadingIndicatorSearch').show();

            // Enviar los datos mediante AJAX usando fetch
            fetch('/buscador_amhs', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content') // Token CSRF
                    },
                    body: JSON.stringify(data) // Convertir el objeto a JSON
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error: ${response.statusText}`);
                    }
                    return response.json(); // Parsear la respuesta como JSON
                })
                .then(result => {
                    // Manejar la respuesta del servidor
                    console.log('Respuesta del servidor:', result);

                    var amhsData = result.data;
                    var rows = '';

                    // Asegurarse de que haya datos antes de continuar
                    if (amhsData.length > 0) {
                        $.each(amhsData, function(index, d) {

                            // convertir fecha YYYY-MM-DD → DD/MM
                            let ddmm = "";
                            if (d.fecha) {
                                const partes = d.fecha.split("-");
                                if (partes.length === 3) {
                                    ddmm = partes[2] + "/" + partes[1]; // DD/MM
                                }
                            }

                            // de d.hora que es "DD HH:MM" solo agarramos la hora
                            let hora = "";
                            if (d.hora) {
                                const partesHora = d.hora.trim().split(" ");
                                hora = partesHora.length === 2 ? partesHora[1] : d.hora;
                            }

                            // concatenamos -> "DD/MM HH:MM"
                            const fechaHoraBonita = `${ddmm} ${hora}`;

                            rows += `
                                <tr
                                    data-id="${d.id}"
                                    data-id_estado="${d.id_estado}"
                                    data-fecha="${d.fecha}"
                                    data-hora="${d.hora}"
                                    data-vuelo="${d.vuelo}"
                                    data-tipo="${d.tipo}"
                                    data-origen="${d.origen}"
                                    data-destino="${d.destino}"
                                    data-eobt="${d.eobt}"
                                    data-nivel_propuesto="${d.nivel_propuesto}"
                                    data-ruta_propuesta="${d.ruta_propuesta}"
                                    data-linea_aerea="${d.linea_aerea}"
                                    data-velocidad="${d.velocidad}"
                                    data-mensaje="${d.mensaje}"
                                    data-dep="${d.dep}"
                                    data-etd="${d.etd}"
                                    data-reg="${d.reg}"
                                    data-rpl="${d.rpl}"
                                    data-sel="${d.sel}"
                                    data-puntos="${d.puntos}"
                                    data-regla_tipo="${d.regla_tipo}"
                                    data-tipo_fpl="${d.tipo_fpl}"
                                    data-turbulencia="${d.turbulencia}"
                                    data-equipo="${d.equipo}"
                                    data-eet="${d.eet}"
                                    data-aed_alternos="${d.aed_alternos}"
                                    data-dof="${d.dof}"
                                    data-rmk="${d.rmk}"
                                    data-dest2="${d.dest2}"
                                    data-sts="${d.sts}"
                                    data-opr="${d.opr}"
                                    data-nav="${d.nav}"
                                    data-rvr="${d.rvr}"
                                >
                                    <td class="align-middle">${d.id}</td>
                                    <td class="align-middle" id="estado${d.id}">
                                        <span class="badge rounded-pill text-white" style="background-color: ${d.color_estado};">
                                            ${d.estado} ${d.cerrado == 1 ? '🔒' : ''}
                                        </span>
                                    </td>
                                    <td class="align-middle">${fechaHoraBonita}</td>
                                    <td class="align-middle"><strong>${d.vuelo.substring(0, 7)}</strong></td>
                                    <td class="align-middle">${d.tipo}</td>
                                    <td class="align-middle"><strong>${d.origen}</strong></td>
                                    <td class="align-middle"><strong>${d.destino}</strong></td>
                                    <td class="align-middle">${d.eobt}</td>
                                    <td class="align-middle"><strong>${d.regla_tipo}</strong></td>
                                </tr>
                            `;
                        });

                        // Insertar las filas generadas en la tabla
                        $('#amhs-data-search').html(rows);

                    } else {
                        // En caso de que no haya datos, mostrar un mensaje en la tabla
                        $('#amhs-data-search').html(
                            '<tr><td colspan="10">No se encontraron datos.</td></tr>');
                    }

                    $('#loadingIndicatorSearch').hide();

                })
                .catch(error => {
                    // Manejar errores
                    console.error('Error:', error);
                    //alert('Ocurrió un error al realizar la búsqueda.');
                });
        });
    });
</script>

<script>
    document.getElementById("button_search_reset").addEventListener("click", function(event) {
        event.preventDefault(); // Evita que el formulario se envíe si está dentro de un <form>

        // Limpiar los valores de los inputs
        document.getElementById("fecha_inicio_search").value = "";
        document.getElementById("fecha_fin_search").value = "";
        document.getElementById("vuelo_search").value = "";
        document.getElementById("origen_search").value = "";
        document.getElementById("destino_search").value = "";

        // Limpiar el contenido del tbody
        document.getElementById("amhs-data-search").innerHTML = "";
    });
</script>

{{-- AMHS Autorizado --}}
<script>
    $(document).ready(function() {

        // Cuando hagan click en el tab "Autorizados2"
        $('#profile-tab').on('click', function() {

            console.log('AUTORIZADOS TABLE');

            // Mostrar el spinner de carga
            $('#loadingIndicator').show();

            // Hacer la solicitud AJAX obtenerAmhsAutorizados
            $.ajax({
                url: '{{ route('obtenerAmhsAutorizados') }}',
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        var amhsData = response.data;
                        var rows = '';

                        let ids = amhsData.map(d => d.id);
                        console.log("AUTORIZADO IDs recibidos:", ids);

                        if (amhsData.length > 0) {
                            $.each(amhsData, function(index, d) {

                                rows += `
                                    <tr
                                        data-id="${d.id}"
                                        data-id_estado="${d.id_estado}"
                                        data-fecha="${d.fecha}"
                                        data-hora="${d.hora}"
                                        data-vuelo="${d.vuelo}"
                                        data-tipo="${d.tipo}"
                                        data-origen="${d.origen}"
                                        data-destino="${d.destino}"
                                        data-eobt="${d.eobt}"
                                        data-nivel_propuesto="${d.nivel_propuesto}"
                                        data-ruta_propuesta="${d.ruta_propuesta}"
                                        data-linea_aerea="${d.linea_aerea}"
                                        data-velocidad="${d.velocidad}"
                                        data-mensaje="${d.mensaje}"
                                        data-dep="${d.dep}"
                                        data-etd="${d.etd}"
                                        data-reg="${d.reg}"
                                        data-rpl="${d.rpl}"
                                        data-sel="${d.sel}"
                                        data-puntos="${d.puntos}"
                                        data-regla_tipo="${d.regla_tipo}"
                                        data-tipo_fpl="${d.tipo_fpl}"
                                        data-turbulencia="${d.turbulencia}"
                                        data-equipo="${d.equipo}"
                                        data-eet="${d.eet}"
                                        data-aed_alternos="${d.aed_alternos}"
                                        data-dof="${d.dof}"
                                        data-rmk="${d.rmk}"
                                        data-sts="${d.sts}"
                                        data-opr="${d.opr}"
                                        data-nav="${d.nav}"
                                        data-rvr="${d.rvr}"
                                        data-dest2="${d.dest2}"
                                    >
                                        <td class="align-middle">${d.id}</td>
                                        <td class="align-middle" id="estado${d.id}">
                                            <span class="badge rounded-pill text-white" style="background-color: ${d.color_estado};">
                                                ${d.estado}
                                            </span>
                                        </td>
                                        <td class="align-middle">${d.hora}</td>
                                        <td class="align-middle"><strong>${d.vuelo.substring(0, 7)}</strong></td>
                                        <td class="align-middle">${d.tipo}</td>
                                        <td class="align-middle"><strong>${d.origen}</strong></td>
                                        <td class="align-middle"><strong>${d.destino}</strong></td>
                                        <td class="align-middle">${d.eobt}</td>
                                        <td class="align-middle"><strong>${d.regla_tipo}</strong></td>
                                    </tr>
                                `;
                            });

                            $('#amhs-dataAutorizados').html(rows);

                            // Filtro en tiempo real
                            $('#searchInputAutorizado').off('keyup').on('keyup',
                                function() {
                                    var value = $(this).val().toLowerCase();
                                    $('#amhs-dataAutorizados tr').filter(function() {
                                        $(this).toggle($(this).text()
                                            .toLowerCase().indexOf(value) >
                                            -1);
                                    });
                                });
                        } else {
                            $('#amhs-dataAutorizados').html(
                                '<tr><td colspan="10">No se encontraron datos.</td></tr>'
                            );
                        }
                    } else {
                        $('#amhs-dataAutorizados').html(
                            '<tr><td colspan="10">Error cargando datos.</td></tr>');
                        console.error('Error en la respuesta del servidor');
                    }
                },
                error: function(xhr, status, error) {
                    $('#amhs-dataAutorizados').html(
                        '<tr><td colspan="10">Error cargando datos.</td></tr>');
                    console.error('Error:', error, 'Estado:', status, 'XHR:', xhr);
                },
                complete: function() {
                    $('#loadingIndicator').hide();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {

        /* function newAutorizado() {

            $.ajax({
                url: "{{ route('obtenerAmhsNewAutorizados') }}", // Se usa el helper de Laravel para generar la URL
                type: 'GET', // Tipo de petición
                dataType: 'json', // Se espera una respuesta en formato JSON
                success: function(response) {

                    var amhsDataNew = response.data;
                    console.log('amhsData Autorizado', amhsDataNew);

                    var rows = '';

                    // Asegurarse de que haya datos antes de continuar
                    if (amhsDataNew.length > 0) {
                        $.each(amhsDataNew, function(index, d) {

                            const table = document.getElementById("amhs-dataAutorizados");

                            if (table) {
                                const row = table.querySelector(
                                    `tr[data-id="${d.id_amhs}"]`);
                                if (!row) {

                                    // Mostrar el span con el id autorizado_speci
                                    document.getElementById('autorizado_speci').style
                                        .display = 'inline';

                                    var dia = d.fecha.split('-')[2];
                                    var diaHora = dia + ' ' + d.hora;

                                    // Validar valores para evitar null
                                    const vuelo = d.vuelo || '';
                                    const tipo = d.tipo || '';
                                    const origen = d.origen || '';
                                    const destino = d.destino || '';
                                    const eobt = d.eobt || '';
                                    const regla_tipo = d.regla_tipo || '';
                                    const linea_aerea = d.linea_aerea || '';
                                    const usuario = d.user_name || '';

                                    // Construcción de la fila
                                    var newRow = `
                                                    <tr
                                                        data-id="${d.id_amhs}"
                                                        data-id_estado="${d.id_estado}"
                                                        data-fecha="${d.fecha}"
                                                        data-hora="${d.hora}"
                                                        data-vuelo="${d.vuelo}"
                                                        data-tipo="${d.tipo}"
                                                        data-origen="${d.origen}"
                                                        data-destino="${d.destino}"
                                                        data-eobt="${d.eobt}"
                                                        data-nivel_propuesto="${d.nivel_propuesto}"
                                                        data-ruta_propuesta="${d.ruta_propuesta}"
                                                        data-linea_aerea="${d.linea_aerea}"
                                                        data-velocidad="${d.velocidad}"
                                                        data-mensaje="${d.mensaje}"
                                                        data-dep="${d.dep}"
                                                        data-etd="${d.etd}"
                                                        data-reg="${d.reg}"
                                                        data-rpl="${d.rpl}"
                                                        data-sel="${d.sel}"
                                                        data-puntos="${d.puntos}"
                                                        data-regla_tipo="${d.regla_tipo}"
                                                        data-tipo_fpl="${d.tipo_fpl}"
                                                        data-turbulencia="${d.turbulencia}"
                                                        data-equipo="${d.equipo}"
                                                        data-eet="${d.eet}"
                                                        data-aed_alternos="${d.aed_alternos}"
                                                        data-dof="${d.dof}"
                                                        data-rmk="${d.rmk}"
                                                        data-dest2="${d.dest2}"
                                                        data-sts="${d.sts}"
                                                        data-opr="${d.opr}"
                                                        data-nav="${d.nav}"
                                                        data-rvr="${d.rvr}"
                                                        data-dest2="${d.dest2}"
                                                    >
                                                        <td class="align-middle">${d.id_amhs}</td>
                                                        <td class="align-middle">
                                                            <span class="badge rounded-pill text-white" style="background-color: ${d.color_estado};">
                                                                ${d.name_estado}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">${diaHora}</td>
                                                        <td class="align-middle"><strong>${vuelo}</strong></td>
                                                        <td class="align-middle">${tipo}</td>
                                                        <td class="align-middle"><strong>${origen}</strong></td>
                                                        <td class="align-middle"><strong>${destino}</strong></td>
                                                        <td class="align-middle">${eobt}</td>
                                                        <td class="align-middle"><strong>${regla_tipo}</strong></td>
                                                        <td class="align-middle">
                                                            ${linea_aerea.length > 15 ? linea_aerea.substring(0, 15) + '...' : linea_aerea}
                                                        </td>
                                                        <td class="align-middle" style="font-size: 10px;">${usuario}</td>
                                                    </tr>`;

                                    // Añadir la fila al principio sin borrar las existentes
                                    $('#amhs-dataAutorizados').prepend(newRow);

                                }
                            }

                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Manejo de errores
                    console.error("Error al obtener los datos:", errorThrown);
                }
            });

        } */

        /* function oldAutorizado() {
            const table = document.getElementById("datatableScrollYAutorizados");
            const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

            let ids = [];
            var id_amhs = '';

            for (let i = 0; i < rows.length; i++) {
                const idCell = rows[i].getElementsByTagName("td")[0]; // Primera columna = ID
                if (idCell) {
                    ids.push(idCell.textContent.trim());
                    id_amhs = id_amhs + idCell.textContent.trim() + ',';
                }
            }

            console.log("IDs encontrados:", id_amhs);

            // Enviar por AJAX con POST
            $.ajax({
                url: "{{ route('obtenerAmhsOldAutorizados') }}",
                method: "POST",
                data: {
                    ids: id_amhs
                },
                traditional: true, // Para que los arrays se envíen como ids[]=1&ids[]=2...
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content') // Laravel necesita esto para POST
                },
                success: function(response) {
                    const ids = response.ids;
                    const autorizados = response.autorizado_old;

                    const table = document.getElementById("datatableScrollYAutorizados");
                    const tbody = table.getElementsByTagName("tbody")[0];
                    const rows = Array.from(tbody.getElementsByTagName(
                        "tr")); // Convertimos en array para recorrer fácilmente

                    // Recorremos los IDs recibidos
                    ids.forEach((id, index) => {
                        if (autorizados[index] === 0 || autorizados[index] === '0') {
                            // Buscar la fila cuyo primer <td> (columna ID) tenga ese valor
                            rows.forEach((row) => {
                                const idCell = row.getElementsByTagName("td")[0];
                                if (idCell && idCell.textContent.trim() === id
                                    .toString()) {
                                    row.remove(); // Eliminamos la fila
                                }
                            });
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", xhr.responseText);
                }
            });
        } */

        // Llamar a la función cada 30 segundos
        // setInterval(checkForNewRecordsAutorizados, 30000);

        // Mostrar el spinner de carga al inicio
        // $('#loadingIndicatorAutorizados').show();

        // Hacer la solicitud AJAX
        /* $.ajax({
            url: '{{ route('obtenerAmhsAutorizados') }}', // La ruta que apunta al método obtenerAmhsPag en el controlador
            method: 'GET',
            data: {
                inicio: 0,
                fin: 100
            },
            success: function(response) {
                if (response.success) {
                    var amhsData = response.data;

                    console.log('amhsData Autorizado', amhsData);

                    var rows = '';

                    // Asegurarse de que haya datos antes de continuar
                    if (amhsData.length > 0) {
                        $.each(amhsData, function(index, d) {

                            var dia = d.fecha.split('-')[2];
                            var diaHora = dia + ' ' + d.hora;

                            // Validar valores para evitar null
                            const vuelo = d.vuelo || '';
                            const tipo = d.tipo || '';
                            const origen = d.origen || '';
                            const destino = d.destino || '';
                            const eobt = d.eobt || '';
                            const regla_tipo = d.regla_tipo || '';
                            const linea_aerea = d.linea_aerea || '';

                            rows += `
                                <tr
                                    data-id="${d.id_amhs}"
                                    data-id_estado="${d.id_estado}"
                                    data-fecha="${d.fecha}"
                                    data-hora="${d.hora}"
                                    data-vuelo="${d.vuelo}"
                                    data-tipo="${d.tipo}"
                                    data-origen="${d.origen}"
                                    data-destino="${d.destino}"
                                    data-eobt="${d.eobt}"
                                    data-nivel_propuesto="${d.nivel_propuesto}"
                                    data-ruta_propuesta="${d.ruta_propuesta}"
                                    data-linea_aerea="${d.linea_aerea}"
                                    data-velocidad="${d.velocidad}"
                                    data-mensaje="${d.mensaje}"
                                    data-dep="${d.dep}"
                                    data-etd="${d.etd}"
                                    data-reg="${d.reg}"
                                    data-rpl="${d.rpl}"
                                    data-sel="${d.sel}"
                                    data-puntos="${d.puntos}"
                                    data-regla_tipo="${d.regla_tipo}"
                                    data-tipo_fpl="${d.tipo_fpl}"
                                    data-turbulencia="${d.turbulencia}"
                                    data-equipo="${d.equipo}"
                                    data-eet="${d.eet}"
                                    data-aed_alternos="${d.aed_alternos}"
                                    data-dof="${d.dof}"
                                    data-rmk="${d.rmk}"
                                    data-dest2="${d.dest2}"
                                    data-sts="${d.sts}"
                                    data-opr="${d.opr}"
                                    data-nav="${d.nav}"
                                    data-rvr="${d.rvr}"
                                    data-dest2="${d.dest2}"
                                >
                                    <td class="align-middle">${d.id_amhs}</td>
                                    <td class="align-middle">
                                        <span class="badge rounded-pill text-white" style="background-color: ${d.color_estado};">
                                            ${d.name_estado}
                                        </span>
                                    </td>
                                    <td class="align-middle">${diaHora}</td>
                                    <td class="align-middle"><strong>${vuelo}</strong></td>
                                    <td class="align-middle">${tipo}</td>
                                    <td class="align-middle"><strong>${origen}</strong></td>
                                    <td class="align-middle"><strong>${destino}</strong></td>
                                    <td class="align-middle">${eobt}</td>
                                    <td class="align-middle"><strong>${regla_tipo}</strong></td>
                                    <td class="align-middle">
                                        ${linea_aerea.length > 15 ? linea_aerea.substring(0, 15) + '...' : linea_aerea}
                                    </td>
                                    <td class="align-middle" style="font-size: 10px;">${d.user_name}</td>
                                </tr>
                            `;
                        });

                        // Insertar las filas generadas en la tabla
                        $('#amhs-dataAutorizados').html(rows);

                        // Filtrar los datos de la tabla en tiempo real
                        $('#searchInputAutorizado').on('keyup', function() {
                            var value = $(this).val().toLowerCase();
                            $('#amhs-dataAutorizados tr').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(
                                    value) > -1);
                            });
                        });

                    } else {
                        // En caso de que no haya datos, mostrar un mensaje en la tabla
                        $('#amhs-dataAutorizados').html(
                            '<tr><td colspan="10"></td></tr>');
                    }

                } else {
                    // Si hay un error en la respuesta
                    $('#amhs-dataAutorizados').html(
                        '<tr><td colspan="10">Error cargando datos.</td></tr>');
                    console.error('Error en la respuesta del servidor');
                }
            },
            error: function(xhr, status, error) {
                // En caso de error, mostrar un mensaje en la tabla y en la consola
                $('#amhs-dataAutorizados').html(
                    '<tr><td colspan="10">Error cargando datos.</td></tr>');
                console.error('Error:', error, 'Estado:', status, 'XHR:', xhr);
            },
            complete: function() {
                // Ocultar el indicador de carga una vez finalizada la solicitud
                // newAutorizado();
                $('#loadingIndicatorAutorizados').hide();
            }
        }); */

        // AMHS New Autorizado
        /* setInterval(function() {
            newAutorizado();
            oldAutorizado();
        }, 20000); */

    });
</script>

{{-- ATC-004 --> ATC-002 --}}
<script>
    $(document).ready(function() {
        function fetchFichaACC4() {

            let tipo_ficha;
            let pk_oaci;

            if (userTip.pk_id_tipo_ficha === 16) {
                tipo_ficha = 22;
                pk_oaci = userTip.pk_oaci;
            } else if (userTip.pk_id_tipo_ficha === 22) {
                tipo_ficha = 16;
                pk_oaci = userTip.pk_oaci;
            } else {
                console.warn('Tipo de ficha no válido');
                return;
            }

            // Recolectar los primeros 100 id-amhs del tbody
            let idAmhsList = [];
            $('#amhs-data tr').each(function(index) {
                if (index < 200) {
                    let id = $(this).data('id');
                    if (id) {
                        idAmhsList.push(id);
                    }
                }
            });

            if (idAmhsList.length === 0) {
                console.warn('No hay ID para enviar');
                return;
            }

            // console.log('acc4 notificacion idamhs', idAmhsList);

            $.ajax({
                url: '{{ route('fichaACC4Notificacion') }}',
                method: 'POST',
                data: {
                    'id-amhs': idAmhsList,
                    'tipo-ficha': tipo_ficha,
                    'pk-oaci': pk_oaci,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    if (response.success) {
                        var dataACC4 = response.data;

                        console.log('acc4 notificacion data', response.data);

                        response.data.forEach(function(id_amhs) {
                            // Buscar la fila con data-id igual a id_amhs
                            const fila = $(`#amhs-data tr[data-id="${id_amhs}"]`);

                            if (fila.length > 0) {
                                const origen = fila.data('origen');
                                const destino = fila.data('destino');

                                // Accede al primer <td> de esa fila
                                const primeraColumna = fila.find('td').first();

                                // Limpia cualquier badge anterior (A1 o A4) antes de agregar uno nuevo
                                primeraColumna.find('.badge-a1, .badge-a4').remove();

                                if (userTip.pk_id_tipo_ficha === 16 && userTip
                                    .descripcion === origen) {
                                    primeraColumna.append(
                                        `<span class="badge rounded-pill badge-a1 text-dark" style="background-color: #D9C077;" title="Coincidencia A1">&nbsp;A1</span>`
                                    );
                                }

                                if (userTip.pk_id_tipo_ficha === 22 && userTip
                                    .descripcion === destino) {
                                    primeraColumna.append(
                                        `<span class="badge rounded-pill badge-a4 text-dark" style="background-color: #D9C077;" title="Coincidencia A4">&nbsp;A4</span>`
                                    );
                                }
                            }
                        });

                    } else {
                        // Si no hay éxito, muestra un mensaje en la tabla
                        console.log('No se encontraron datos');
                    }

                },
                error: function(xhr, status, error) {
                    // Solo mostramos error en consola, NO tocamos la tabla
                    console.error('Error en la solicitud:', error, 'Estado:', status, 'XHR:', xhr);
                },
                complete: function() {
                    // Aquí puedes ocultar un indicador de carga
                    // console.log('Solicitud completada.');
                }
            });

        }

        const userTipo = @json($userTip);
        if (userTipo.pk_id_tipo_ficha !== 17) {
            setInterval(function() {
                fetchFichaACC4();
            }, 30000);
        }

    });
</script>

{{-- ATS --}}
<script>
    let filaSeleccionadaIdAts = null;

    $(document).ready(function() {
        const tabla = $('#atsDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/ats/data') }}",
            pageLength: 10,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
                    data: 'estado',
                    name: 'estado',
                    render: function(data, type, row) {
                        let texto = row.estado == 1 ? 'LEÍDO' : 'PENDIENTE';
                        let color = row.estado == 1 ? '#737373' : '#ff5722';
                        return `<span class="badge-custom" style="
                            background-color: ${color};
                            color: #fff;
                            padding: 1px 1px;
                            border-radius: 2px;
                            display: inline-block;
                            font-size: 13px;
                            font-weight: bold;
                        ">${texto}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'fecha',
                    render: function(data) {
                        if (!data) return '';
                        const fecha = new Date(data);
                        const dia = String(fecha.getDate()).padStart(2, '0');
                        const mes = String(fecha.getMonth() + 1).padStart(2, '0');
                        const horas = String(fecha.getHours()).padStart(2, '0');
                        const minutos = String(fecha.getMinutes()).padStart(2, '0');
                        return `${dia}/${mes} ${horas}:${minutos}`;
                    }
                },
                {
                    data: 'tipoMensaje',
                    name: 'tipo',
                },
                {
                    data: 'mensaje',
                    name: 'vuelo',
                    render: function(data) {
                        if (!data) return '';
                        const partes = data.split('-');
                        if (partes.length < 2) return '';
                        let vuelo = partes[1].substring(0, 7);
                        vuelo = vuelo.replace(/[^A-Za-z0-9]/g, '');
                        return vuelo;
                    }
                },
            ],
            drawCallback: function(settings) {
                $('#atsDataTable tbody tr').each(function() {
                    const rowData = tabla.row(this).data();
                    if (!rowData) return;
                    $(this).attr({
                        'data-id': rowData.id,
                        'data-id_amhs': rowData.id_amhs || '',
                        'data-fechaHora': rowData.created_at || '',
                        'data-mensaje': rowData.mensaje || ''
                    });
                });

                if (filaSeleccionadaIdAts) {
                    $('#atsDataTable tbody tr').each(function() {
                        if ($(this).data('id') == filaSeleccionadaIdAts) {
                            $(this).addClass('selected');
                            //$('#meteo').val($(this).data('mensaje'));
                        }
                    });
                }
            },
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": ">>",
                    "previous": "<<"
                }
            }
        });

        // Recarga automática cada 30 segundos (sin notificación)
        setInterval(function() {
            tabla.ajax.reload(null, false);
        }, 30000);

        $('#atsDataTable tbody').on('click', 'tr', function() {
            $('#atsDataTable tbody tr').removeClass('selected');
            $(this).addClass('selected');

            const mensaje = $(this).data('mensaje');
            const id = $(this).data('id_amhs');

            $('#meteo').val(mensaje);
            filaSeleccionadaIdAts = $(this).data('id');

            const dataToSend = {
                id_amhs: id,
                oaci: userTip.pk_oaci,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                tipo_meteo: 1, // ATS
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('save_meteo') }}",
                type: "POST",
                data: dataToSend,
                success: function(response) {
                    tabla.ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    console.error("ATS Error en la petición AJAX:", error);
                }
            });
        });

    });
</script>

{{-- MET --}}
<script>
    let filaSeleccionadaIdMet = null;

    $(document).ready(function() {
        const tablaMet = $('#metDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/met/data') }}",
            pageLength: 10,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
                    data: 'estado',
                    name: 'estado',
                    render: function(data, type, row) {
                        let texto = row.estado == 1 ? 'LEÍDO' : 'PENDIENTE';
                        let color = row.estado == 1 ? '#737373' : '#ff5722';
                        return `<span class="badge-custom" style="
                            background-color: ${color};
                            color: #fff;
                            padding: 1px 1px;
                            border-radius: 2px;
                            display: inline-block;
                            font-size: 11px;
                            font-weight: bold;
                        ">${texto}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'fecha',
                    render: function(data) {
                        if (!data) return '';
                        const fecha = new Date(data);
                        const dia = String(fecha.getDate()).padStart(2, '0');
                        const mes = String(fecha.getMonth() + 1).padStart(2, '0');
                        const horas = String(fecha.getHours()).padStart(2, '0');
                        const minutos = String(fecha.getMinutes()).padStart(2, '0');
                        return `${dia}/${mes} ${horas}:${minutos}`;
                    }
                },
                {
                    data: 'tipoMensaje',
                    name: 'tipo',
                },

                {
                    data: 'mensaje',
                    name: 'indicador',
                    render: function(data, type, row) {
                        if (!data) return '';

                        // Divide el contenido por líneas
                        const lineas = data.trim().split('\n');

                        if (lineas.length > 0) {
                            const palabras = lineas[0].trim().split(
                                /\s+/); // Divide por espacios
                            const segunda = palabras[1] ?? '';
                            const tercera = palabras[2] ?? '';
                            return `${segunda} ${tercera}`.trim();
                        }

                        return '';
                    }
                },
            ],
            drawCallback: function(settings) {
                $('#metDataTable tbody tr').each(function() {
                    const rowData = tablaMet.row(this).data();
                    if (!rowData) return;

                    $(this).attr({
                        'data-id': rowData.id,
                        'data-id_amhs': rowData.id_amhs || '',
                        'data-fechaHora': rowData.created_at || '',
                        'data-mensaje': rowData.mensaje || ''
                    });
                });

                if (filaSeleccionadaIdMet) {
                    $('#metDataTable tbody tr').each(function() {
                        if ($(this).data('id') == filaSeleccionadaIdMet) {
                            $(this).addClass('selected');
                            //$('#meteo').val($(this).data('mensaje'));
                        }
                    });
                }
            },
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": ">>",
                    "previous": "<<"
                }
            }
        });

        setInterval(function() {
            tablaMet.ajax.reload(null, false);
        }, 30000);

        $('#metDataTable tbody').on('click', 'tr', function() {
            $('#metDataTable tbody tr').removeClass('selected');
            $(this).addClass('selected');

            const mensaje = $(this).data('mensaje');
            const id = $(this).data('id');

            $('#meteo').val(mensaje);
            filaSeleccionadaIdMet = id;

            const dataToSend = {
                id_amhs: id,
                oaci: userTip.pk_oaci,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                tipo_meteo: 2, // MET
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('save_meteo') }}",
                type: "POST",
                data: dataToSend,
                success: function(response) {
                    tablaMet.ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    console.error("MET Error en la petición AJAX:", error);
                }
            });
        });
    });
</script>

{{-- SPECI --}}
<script>
    let filaSeleccionadaIdSpeci = null;

    $(document).ready(function() {
        const tablaSpeci = $('#speciDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/speci/data') }}",
            pageLength: 10,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
                    data: 'estado',
                    name: 'estado',
                    render: function(data, type, row) {
                        let texto = row.estado == 1 ? 'LEÍDO' : 'PENDIENTE';
                        let color = row.estado == 1 ? '#737373' : '#ff5722';
                        return `<span class="badge-custom" style="
                            background-color: ${color};
                            color: #fff;
                            padding: 1px 1px;
                            border-radius: 2px;
                            display: inline-block;
                            font-size: 11px;
                            font-weight: bold;
                        ">${texto}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'fecha',
                    render: function(data) {
                        if (!data) return '';
                        const fecha = new Date(data);
                        const dia = String(fecha.getDate()).padStart(2, '0');
                        const mes = String(fecha.getMonth() + 1).padStart(2, '0');
                        const horas = String(fecha.getHours()).padStart(2, '0');
                        const minutos = String(fecha.getMinutes()).padStart(2, '0');
                        return `${dia}/${mes} ${horas}:${minutos}`;
                    }
                },
                {
                    data: 'tipoMensaje',
                    name: 'tipo',
                },
                {
                    data: 'mensaje',
                    name: 'indicador',
                    render: function(data, type, row) {
                        if (!data) return '';

                        // Divide el contenido por líneas
                        const lineas = data.trim().split('\n');

                        if (lineas.length > 0) {
                            const palabras = lineas[0].trim().split(
                                /\s+/); // Divide por espacios
                            const segunda = palabras[1] ?? '';
                            const tercera = palabras[2] ?? '';
                            return `${segunda} ${tercera}`.trim();
                        }

                        return '';
                    }
                },
            ],
            drawCallback: function(settings) {
                $('#speciDataTable tbody tr').each(function() {
                    const rowData = tablaSpeci.row(this).data();
                    if (!rowData) return;

                    $(this).attr({
                        'data-id': rowData.id,
                        'data-id_amhs': rowData.id_amhs || '',
                        'data-fechaHora': rowData.created_at || '',
                        'data-mensaje': rowData.mensaje || ''
                    });
                });

                if (filaSeleccionadaIdSpeci) {
                    $('#speciDataTable tbody tr').each(function() {
                        if ($(this).data('id') == filaSeleccionadaIdSpeci) {
                            $(this).addClass('selected');
                            //$('#meteo').val($(this).data('mensaje'));
                        }
                    });
                }
            },
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": ">>",
                    "previous": "<<"
                }
            }
        });

        /* Notificacion */

        let totalRegistrosSpeci = 0;
        let totalAnteriorSpeci = 0;
        let primeraCargaSpeci = true;

        tablaSpeci.on('xhr.dt', function(e, settings, json) {
            totalAnteriorSpeci = totalRegistrosSpeci;
            totalRegistrosSpeci = json.recordsTotal;

            console.log('totalRegistrosSpeci', totalRegistrosSpeci);

            if (primeraCargaSpeci) {
                primeraCargaSpeci = false;
                return;
            }

            if (totalRegistrosSpeci > totalAnteriorSpeci) {
                // Mostrar notificación
                $('#notificacion_speci').show();

                // Limpiar campo de búsqueda
                tablaSpeci.search('').draw();
            }

            $('#totalRegistrosSpeci').text(totalRegistrosSpeci);
        });

        $('.nav').on('click', '#contact-tab2', function() {
            $('#notificacion_speci').hide();
        });

        setInterval(function() {
            tablaSpeci.ajax.reload(null, false);
        }, 30000);

        $('#speciDataTable tbody').on('click', 'tr', function() {
            $('#speciDataTable tbody tr').removeClass('selected');
            $(this).addClass('selected');

            const mensaje = $(this).data('mensaje');
            const id = $(this).data('id');

            $('#meteo').val(mensaje);
            filaSeleccionadaIdSpeci = id;

            const dataToSend = {
                id_amhs: id,
                oaci: userTip.pk_oaci,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                tipo_meteo: 2, // SPECI
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('save_meteo') }}",
                type: "POST",
                data: dataToSend,
                success: function(response) {
                    tablaSpeci.ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    console.error("SPECI Error en la petición AJAX:", error);
                }
            });
        });
    });
</script>

{{-- SS --}}
<script>
    let filaSeleccionadaIdSs = null;

    $(document).ready(function() {
        const tablaSs = $('#ssDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/ss/data') }}",
            pageLength: 10,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
                    data: 'estado',
                    name: 'estado',
                    render: function(data, type, row) {
                        let texto = row.estado == 1 ? 'LEIDO' : 'PENDIENTE';
                        let color = row.estado == 1 ? '#737373' : '#ff5722';
                        return `<span class="badge-custom" style="
                            background-color: ${color};
                            color: #fff;
                            padding: 1px 1px;
                            border-radius: 2px;
                            display: inline-block;
                            font-size: 13px;
                            font-weight: bold;
                        ">${texto}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'fecha',
                    render: function(data) {
                        if (!data) return '';
                        const fecha = new Date(data);
                        const dia = String(fecha.getDate()).padStart(2, '0');
                        const mes = String(fecha.getMonth() + 1).padStart(2, '0');
                        const horas = String(fecha.getHours()).padStart(2, '0');
                        const minutos = String(fecha.getMinutes()).padStart(2, '0');
                        return `${dia}/${mes} ${horas}:${minutos}`;
                    }
                },
                {
                    data: 'mensaje',
                    name: 'tipo',
                    render: function(data) {
                        if (!data) return '';
                        let partes = data.trim().split(/\s+/);
                        return partes.slice(0, 3).join(' ');
                    }
                },
            ],
            drawCallback: function(settings) {
                $('#ssDataTable tbody tr').each(function() {
                    const rowData = tablaSs.row(this).data();
                    if (!rowData) return;

                    $(this).attr({
                        'data-id': rowData.id,
                        'data-id_amhs': rowData.id_amhs || '',
                        'data-fechaHora': rowData.created_at || '',
                        'data-mensaje': rowData.mensaje || ''
                    });
                });

                if (filaSeleccionadaIdSs) {
                    $('#ssDataTable tbody tr').each(function() {
                        if ($(this).data('id') == filaSeleccionadaIdSs) {
                            $(this).addClass('selected');
                            //$('#meteo').val($(this).data('mensaje'));
                        }
                    });
                }
            },
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": ">>",
                    "previous": "<<"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna ascendente",
                    "sortDescending": ": activar para ordenar la columna descendente"
                }
            }
        });

        /* Notificación para SS */

        let totalRegistrosSs = 0;
        let totalAnteriorSs = 0;
        let primeraCargaSs = true;

        tablaSs.on('xhr.dt', function(e, settings, json) {
            totalAnteriorSs = totalRegistrosSs;
            totalRegistrosSs = json.recordsTotal;

            console.log('totalRegistrosSs', totalRegistrosSs);

            if (primeraCargaSs) {
                primeraCargaSs = false;
                return;
            }

            if (totalRegistrosSs > totalAnteriorSs) {
                $('#notificacion_ss').show();
                tablaSs.search('').draw();
            }

            $('#totalRegistrosSs').text(totalRegistrosSs);
        });

        $('.nav').on('click', '#ss-tab', function() {
            $('#notificacion_ss').hide();
        });

        setInterval(function() {
            tablaSs.ajax.reload(null, false);
        }, 30000);

        $('#ssDataTable tbody').on('click', 'tr', function() {
            $('#ssDataTable tbody tr').removeClass('selected');
            $(this).addClass('selected');

            const mensaje = $(this).data('mensaje');
            const id = $(this).data('id_amhs');
            $('#meteo').val(mensaje);
            filaSeleccionadaIdSs = $(this).data('id');

            const dataToSend = {
                id_amhs: id,
                oaci: userTip.pk_oaci,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                tipo_meteo: 3, // SS
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('save_meteo') }}",
                type: "POST",
                data: dataToSend,
                success: function(response) {
                    tablaSs.ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    console.error("METEO Error en la petición AJAX:", error);
                }
            });
        });
    });
</script>

{{-- DD --}}
<script>
    let filaSeleccionadaIdDD = null;

    $(document).ready(function() {
        const tablaDD = $('#ddDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/dd/data') }}",
            pageLength: 10,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
                    data: 'estado',
                    name: 'estado',
                    render: function(data, type, row) {
                        let texto = row.estado == 1 ? 'LEIDO' : 'PENDIENTE';
                        let color = row.estado == 1 ? '#737373' : '#ff5722';
                        return `<span class="badge-custom" style="
                            background-color: ${color};
                            color: #fff;
                            padding: 1px 1px;
                            border-radius: 2px;
                            display: inline-block;
                            font-size: 13px;
                            font-weight: bold;
                        ">${texto}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'fecha',
                    render: function(data) {
                        if (!data) return '';
                        const fecha = new Date(data);
                        const dia = String(fecha.getDate()).padStart(2, '0');
                        const mes = String(fecha.getMonth() + 1).padStart(2, '0');
                        const horas = String(fecha.getHours()).padStart(2, '0');
                        const minutos = String(fecha.getMinutes()).padStart(2, '0');
                        return `${dia}/${mes} ${horas}:${minutos}`;
                    }
                },
                {
                    data: 'mensaje',
                    name: 'tipo',
                    render: function(data, type, row) {
                        if (!data) return '';
                        let partes = data.trim().split(/\s+/);
                        return partes.slice(0, 3).join(' ');
                    }
                },
            ],
            drawCallback: function(settings) {
                $('#ddDataTable tbody tr').each(function() {
                    const rowData = tablaDD.row(this).data();
                    if (!rowData) return;

                    $(this).attr({
                        'data-id': rowData.id,
                        'data-id_amhs': rowData.id_amhs || '',
                        'data-fechaHora': rowData.created_at || '',
                        'data-mensaje': rowData.mensaje || ''
                    });
                });

                if (filaSeleccionadaIdDD) {
                    $('#ddDataTable tbody tr').each(function() {
                        if ($(this).data('id') == filaSeleccionadaIdDD) {
                            $(this).addClass('selected');
                            //$('#meteo').val($(this).data('mensaje'));
                        }
                    });
                }
            },
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": ">>",
                    "previous": "<<"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna ascendente",
                    "sortDescending": ": activar para ordenar la columna descendente"
                }
            }
        });

        /* Notificación para DD */

        let totalRegistrosDd = 0;
        let totalAnteriorDd = 0;
        let primeraCargaDd = true;

        tablaDD.on('xhr.dt', function(e, settings, json) {
            totalAnteriorDd = totalRegistrosDd;
            totalRegistrosDd = json.recordsTotal;

            console.log('totalRegistrosDd', totalRegistrosDd);

            if (primeraCargaDd) {
                primeraCargaDd = false;
                return;
            }

            if (totalRegistrosDd > totalAnteriorDd) {
                // Mostrar notificación
                $('#notificacion_dd').show();

                // Limpiar campo de búsqueda
                tablaDD.search('').draw();
            }

            $('#totalRegistrosDd').text(totalRegistrosDd);
        });

        // Ocultar notificación al hacer clic en el tab de DD
        $('.nav').on('click', '#dd-tab', function() {
            $('#notificacion_dd').hide();
        });

        setInterval(function() {
            tablaDD.ajax.reload(null, false);
        }, 30000);

        $('#ddDataTable tbody').on('click', 'tr', function() {
            $('#ddDataTable tbody tr').removeClass('selected');
            $(this).addClass('selected');

            const mensaje = $(this).data('mensaje');
            const id = $(this).data('id_amhs');

            $('#meteo').val(mensaje);
            filaSeleccionadaIdDD = $(this).data('id');

            const dataToSend = {
                id_amhs: id,
                oaci: userTip.pk_oaci,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                tipo_meteo: 4, // DD
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('save_meteo') }}",
                type: "POST",
                data: dataToSend,
                success: function(response) {
                    tablaDD.ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    console.error("METEO Error en la petición AJAX:", error);
                }
            });
        });
    });
</script>

{{-- NOTAM --}}
<script>
    let filaSeleccionadaIdNOTAM = null;

    $(document).ready(function() {
        const tablaNOTAM = $('#notamDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/notam/data') }}",
            pageLength: 10,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
                    data: 'estado',
                    name: 'estado',
                    render: function(data, type, row) {
                        let texto = row.estado == 1 ? 'LEIDO' : 'PENDIENTE';
                        let color = row.estado == 1 ? '#737373' : '#ff5722';
                        return `<span class="badge-custom" style="
                            background-color: ${color};
                            color: #fff;
                            padding: 1px 1px;
                            border-radius: 2px;
                            display: inline-block;
                            font-size: 13px;
                            font-weight: bold;
                        ">${texto}</span>`;
                    }
                },
                {
                    data: 'created_at',
                    name: 'fecha',
                    render: function(data) {
                        if (!data) return '';
                        const fecha = new Date(data);
                        const dia = String(fecha.getDate()).padStart(2, '0');
                        const mes = String(fecha.getMonth() + 1).padStart(2, '0');
                        const horas = String(fecha.getHours()).padStart(2, '0');
                        const minutos = String(fecha.getMinutes()).padStart(2, '0');
                        return `${dia}/${mes} ${horas}:${minutos}`;
                    }
                },
                {
                    data: 'mensaje',
                    name: 'tipo',
                    render: function(data) {
                        if (!data) return '';

                        const partes = data.trim().split(/\s+/);
                        const tipo = partes[7] ?? '';
                        return tipo;
                    }
                },
                {
                    data: 'mensaje',
                    name: 'indicador',
                    render: function(data) {
                        if (!data) return '';

                        const partes = data.trim().split(/\s+/);
                        const tipo = partes[5] ?? '';
                        return tipo;
                    }
                },
            ],
            drawCallback: function(settings) {
                $('#notamDataTable tbody tr').each(function() {
                    const rowData = tablaNOTAM.row(this).data();
                    if (!rowData) return;

                    $(this).attr({
                        'data-id': rowData.id,
                        'data-id_amhs': rowData.id_amhs || '',
                        'data-fechaHora': rowData.created_at || '',
                        'data-mensaje': rowData.mensaje || ''
                    });
                });

                if (filaSeleccionadaIdNOTAM) {
                    $('#notamDataTable tbody tr').each(function() {
                        if ($(this).data('id') == filaSeleccionadaIdNOTAM) {
                            $(this).addClass('selected');
                            //$('#meteo').val($(this).data('mensaje'));
                        }
                    });
                }
            },
            language: {
                "decimal": "",
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": ">>",
                    "previous": "<<"
                },
                "aria": {
                    "sortAscending": ": activar para ordenar la columna ascendente",
                    "sortDescending": ": activar para ordenar la columna descendente"
                }
            }
        });

        /* Notificación para NOTAM */

        let totalRegistrosNotam = 0;
        let totalAnteriorNotam = 0;
        let primeraCargaNotam = true;

        tablaNOTAM.on('xhr.dt', function(e, settings, json) {
            totalAnteriorNotam = totalRegistrosNotam;
            totalRegistrosNotam = json.recordsTotal;

            console.log('totalRegistrosNotam', totalRegistrosNotam);

            if (primeraCargaNotam) {
                primeraCargaNotam = false;
                return;
            }

            if (totalRegistrosNotam > totalAnteriorNotam) {
                // Mostrar notificación
                $('#notificacion_notam').show();

                // Limpiar campo de búsqueda
                tablaNOTAM.search('').draw();
            }

            $('#totalRegistrosNotam').text(totalRegistrosNotam);
        });

        // Ocultar notificación al hacer clic en el tab de NOTAM
        $('.nav').on('click', '#notam-tab', function() {
            $('#notificacion_notam').hide();
        });

        setInterval(function() {
            tablaNOTAM.ajax.reload(null, false);
        }, 30000);

        $('#notamDataTable tbody').on('click', 'tr', function() {
            $('#notamDataTable tbody tr').removeClass('selected');
            $(this).addClass('selected');

            const mensaje = $(this).data('mensaje');
            const id = $(this).data('id_amhs');

            $('#meteo').val(mensaje);
            filaSeleccionadaIdNOTAM = $(this).data('id');

            const dataToSend = {
                id_amhs: id,
                oaci: userTip.pk_oaci,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                tipo_meteo: 5, // NOTAM
                _token: "{{ csrf_token() }}"
            };

            $.ajax({
                url: "{{ route('save_meteo') }}",
                type: "POST",
                data: dataToSend,
                success: function(response) {
                    tablaNOTAM.ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    console.error("METEO Error en la petición AJAX:", error);
                }
            });
        });
    });
</script>

{{-- Reloj Mundial --}}
<script>
    function updateClock() {
        var now = new Date();
        var options = {
            timeZone: 'UTC',
            hour12: false,
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            year: 'numeric',
            month: 'numeric',
            day: 'numeric'
        };
        var formattedTime = now.toLocaleString('es-ES', options).replace(' 24:', ' 00:').replace(',', '');
        document.getElementById('currentTime').innerText = formattedTime;
    }

    setInterval(updateClock, 1000);
    updateClock(); // Llamada inicial para mostrar el reloj de inmediato
</script>

{{-- Tiempo de Inactividad para refrescar la Pagina --}}
{{-- <script>
    (function() {
        const tiempoEnMinutos = 50;
        const refrescarTrasInactividad = tiempoEnMinutos * 60 * 1000;

        let timeout;
        let tiempoRestante = refrescarTrasInactividad;

        function reiniciarTemporizador() {
            clearTimeout(timeout);
            tiempoRestante = refrescarTrasInactividad;

            timeout = setTimeout(() => {
                console.log('%c[Inactividad]', 'color: red;', 'Refrescando página por inactividad...');
                location.reload();
            }, refrescarTrasInactividad);
        }

        // Mostrar el temporizador en consola cada segundo
        setInterval(() => {
            tiempoRestante -= 1000;

            let minutos = Math.floor(tiempoRestante / (1000 * 60));
            let segundos = Math.floor((tiempoRestante % (1000 * 60)) / 1000);

            // console.log(`[Inactividad] Tiempo restante: ${minutos}m ${segundos}s`);
        }, 1000);

        // Escucha actividad del usuario
        ['mousemove', 'keydown', 'scroll', 'touchstart'].forEach(event => {
            window.addEventListener(event, reiniciarTemporizador);
        });

        reiniciarTemporizador();
    })();
</script> --}}

{{-- script para cargar mas datos a la tabla --}}

{{-- Modal Busqueda Historica --}}
{{-- @include('transito.modal_search') --}}
{{-- Modal Busqueda Historica --}}

{{-- Modal Nuevo Plan de Vuelo --}}
@include('transito.modal_plan_vuelo')
{{-- Modal Nuevo Plan de Vuelo --}}
