{{-- AMHS en Linea --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .btn-inicio {
        display: inline-flex;
        align-items: center;
        background-color: #282c34;
        color: #ffffff;
        border: none;
        padding: 12px 20px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .btn-inicio i {
        margin-right: 8px;
    }

    .btn-inicio:hover {
        background-color: #3a3f47;
    }

    .btn-inicio:active {
        background-color: #1c2024;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="card" style="border-top: 5px solid #cd1f28;">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f2f2; font-size: 12px;">
        <a class="navbar-brand" href="/transito_aereo">AMHS en línea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/home"><span class="fa fa-home"></span>&nbsp;&nbsp;Inicio <span
                            class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fa fa-bars"></span>&nbsp;&nbsp;MENÚ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#" data-toggle="modal"
                            data-target="#addNewCardModalPV"><span class="fa fa-plane"></span>&nbsp;&nbsp;Nuevo Plan de
                            Vuelo</a>
                        <a class="dropdown-item" href="{{ url('busqueda-historica') }}" target="_blank"><span
                                class="fa fa-search"></span>&nbsp;&nbsp;Búsqueda
                            Histórica</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-clock mr-sm"></i>
                        <span id="currentTime"></span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card-body">
        <div class="table-responsive-lg" id="tableContainer" style="height: 350px; overflow-y: scroll;">

            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home2" role="tab"
                        aria-controls="home" aria-selected="true">Todos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile2" role="tab"
                        aria-controls="profile" aria-selected="false">Autorizados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact2" role="tab"
                        aria-controls="contact" aria-selected="false">Buscador</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                {{-- AMHS General --}}
                <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">

                    <!-- Campo de búsqueda -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" id="searchInput" placeholder="Buscar AMHS..." class="form-control">
                    </div>

                    <table class="table table-hover table-bordered table-striped" id="datatableScrollY" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Vuelo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">EOBT</th>
                                <th scope="col">Regla</th>
                                <th scope="col">Linea Aérea</th>
                                <th scope="col">Usuario</th>
                            </tr>
                        </thead>

                        <tbody id="amhs-data">
                            <!-- Aquí se cargarán los datos por AJAX -->
                        </tbody>
                    </table>

                    <div id="loadingIndicator" style="display: none; text-align: center; padding: 10px;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                    </div>

                </div>

                {{-- AMHS Autorizados --}}
                <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab">

                    <!-- Campo de búsqueda -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" id="searchInputAutorizado" placeholder="Buscar AMHS..."
                            class="form-control">
                    </div>

                    <table class="table table-hover table-bordered table-striped" id="datatableScrollYAutorizados"
                        width="100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Vuelo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">EOBT</th>
                                <th scope="col">Regla</th>
                                <th scope="col">Linea Aérea</th>
                                <th scope="col">Usuario</th>
                            </tr>
                        </thead>

                        <tbody id="amhs-dataAutorizados">
                            <!-- Aquí se cargarán los datos por AJAX -->
                        </tbody>
                    </table>

                    <div id="loadingIndicatorAutorizados" style="display: none; text-align: center; padding: 10px;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                    </div>

                </div>

                {{-- AMHS Buscador --}}
                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab">

                    <table width="100%" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col"><input type="date" class="form-control"
                                        name="fecha_inicio_search" id="fecha_inicio_search" value=""
                                        placeholder="Fecha Inicio"></th>
                                <th scope="col"><input type="date" class="form-control"
                                        name="fecha_fin_search" id="fecha_fin_search" value=""
                                        placeholder="Fecha Final"></th>
                                <th scope="col"><input type="text" class="form-control" name="vuelo_search"
                                        id="vuelo_search" placeholder="Vuelo" value=""></th>
                                <th scope="col"><input type="text" class="form-control" name="origen_search"
                                        id="origen_search" placeholder="Origen" value=""></th>
                                <th scope="col"><input type="text" class="form-control" name="destino_search"
                                        id="destino_search" placeholder="Destino" value=""></th>
                                <th scope="col"><button type="submit" id="button_search"
                                        class="btn btn-flat btn-warning btn-sm">Buscar</button></th>
                                <th scope="col"><button type="submit" id="button_search_reset"
                                        class="btn btn-flat btn-danger btn-sm">X</button></th>
                            </tr>
                        </thead>
                    </table>

                    <div id="loadingIndicatorSearch" style="display: none; text-align: center; padding: 10px;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                    </div>

                    <table class="table table-hover table-bordered table-striped" id="datatableScrollYSearch"
                        width="100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Vuelo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Origen</th>
                                <th scope="col">Destino</th>
                                <th scope="col">EOBT</th>
                                <th scope="col">Regla</th>
                                <th scope="col">Linea Aérea</th>
                                <th scope="col">Usuario</th>
                            </tr>
                        </thead>

                        <tbody id="amhs-data-search">
                            <!-- Aquí se cargarán los datos por AJAX -->
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
{{-- AMHS en Linea --}}

{{-- Datos Metereológicos en Linea --}}
<div class="card" style="border-top: 5px solid #798da5;">

    <!-- Campo de búsqueda -->
    <div class="input-group mb-3">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fas fa-search"></i>
            </span>
        </div>
        <input type="text" id="searchInputDatMet" placeholder="Buscar Datos Metereologicos..."
            class="form-control">
    </div>

    <div class="card-body">
        <div class="table-responsive-lg">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">ATS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">SPECI
                        &nbsp;&nbsp; <span class="badge badge-warning" id="notificacion_speci"
                            style="display: none;">NUEVO</span>
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="table-responsive-lg" id="tableContainerDat"
                        style="height: 350px; overflow-y: scroll;">

                        <table class="table table-hover table-bordered table-striped" id="datatableMet"
                            width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Tipo Mensaje</th>
                                    {{-- <th scope="col">Vuelo</th> --}}
                                    <th scope="col" width="400px">Comienzo Texto</th>
                                </tr>
                            </thead>
                            <tbody id="met-data">
                                {{-- @foreach ($data3 as $d)
                                    <tr>
                                        <td class="align-middle">{{ $d->fecha_hora }}</td>
                                <td class="align-middle">
                                    <div class="mensaje-corto">{{ $d->mensaje }}</div>
                                </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>

                        <!-- Elemento de Loading -->
                        <div id="loading" style="display: none; text-align: center;">
                            <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                        </div>

                    </div>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="table-responsive-lg" id="tableContainerDatSpeci"
                        style="height: 350px; overflow-y: scroll;">

                        <table class="table table-hover table-bordered table-striped" id="datatableMetSpeci"
                            width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Tipo Mensaje</th>
                                    {{-- <th scope="col">Vuelo</th> --}}
                                    <th scope="col" width="400px">Comienzo del Texto</th>
                                </tr>
                            </thead>
                            <tbody id="met-data-speci">
                                {{-- @foreach ($data3 as $d)
                                <tr>
                                    <td class="align-middle">{{ $d->fecha_hora }}</td>
                            <td class="align-middle">
                                <div class="mensaje-corto">{{ $d->mensaje }}</div>
                            </td>
                            </tr>
                            @endforeach --}}
                            </tbody>
                        </table>

                        <!-- Elemento de Loading -->
                        <div id="loading" style="display: none; text-align: center;">
                            <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
{{-- Datos Metereológicos en Linea --}}

<!-- Modal -->
<div class="modal fade" id="ModalMet" tabindex="-1" role="dialog" aria-labelledby="ModalMet"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModaltitle">Dato Meteorológico</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <!-- Aquí se mostrará la información recuperada -->
                <p><strong>ID:</strong> <span id="modalId"></span></p>
                <p><strong>Hora:</strong> <span id="modalHora"></span></p>
                <p><strong>Tipo de Mensaje:</strong> <span id="modalTipoMensaje"></span></p>
                <p><strong>Mensaje:</strong> <span id="modalMensaje"></span></p>
            </div>
        </div>
    </div>
</div>

{{-- Limpiar Inputs --}}
<script>
    $(document).ready(function() {
        // Limpiar todos los campos input
        $('input').val('');
        $('input[type="hidden"], input[type="text"]').val('');
    });
</script>
{{-- Obtener Estados --}}
<script>
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

                    console.log('procesos', procesos);

                    if (procesos.length > 0) {
                        // Iterar sobre los datos de procesos
                        procesos.forEach(function(proceso) {
                            // Buscar la fila con el data-id que coincida con el proceso.id_amhs
                            var fila = $('tr[data-id="' + proceso.id_amhs + '"]');

                            if (fila.length > 0) {
                                // Si se encuentra la fila, modificar el contenido del <td> correspondiente
                                var estadoCelda = fila.find('td[id^="estado"]');
                                if (estadoCelda.length > 0) {
                                    // Cambiar el contenido de la celda al nombre del estado del proceso
                                    estadoCelda.text(proceso.name_estado);
                                    // Cambiar el color en el estilo del <td> usando proceso.color_estado
                                    estadoCelda.attr('style', 'color: ' + proceso.color_estado +
                                        ';');
                                }

                                // Actualizar el atributo data-id_estado en el <tr>
                                fila.attr('data-id_estado', proceso.id_estado);

                                var usuarioCelda = fila.find('td[id^="usuario"]');
                                if (usuarioCelda.length > 0) {
                                    // Cambiar el contenido de la celda al nombre del estado del proceso
                                    usuarioCelda.text(proceso.name);
                                }

                                if (proceso.cerrado === 1) {

                                    var id_amhs = proceso.id_amhs;
                                    const estadoCell = document.getElementById('estado' + id_amhs);

                                    if (estadoCell) { // Asegúrate de que el elemento existe antes de modificarlo

                                        // Crear el icono de candado usando Font Awesome
                                        const lockIcon = document.createElement("i");
                                        lockIcon.className = "fas fa-lock";
                                        lockIcon.style.marginRight = "5px";

                                        // Insertar el icono antes del texto "Autorizado"
                                        estadoCell.insertBefore(lockIcon, estadoCell.firstChild);

                                    }

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
    }, 30000);
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
                                >
                                    <td class="align-middle">${d.id}</td>
                                    <td class="align-middle" id="estado${d.id}" style="color: ${d.color_estado};">${d.name_estado}</td>
                                    <td class="align-middle">${diaHora}</td>
                                    <td class="align-middle">${d.vuelo}</td>
                                    <td class="align-middle">${d.tipo}</td>
                                    <td class="align-middle">${d.origen}</td>
                                    <td class="align-middle">${d.destino}</td>
                                    <td class="align-middle">${d.eobt}</td>
                                    <td class="align-middle">${d.regla_tipo}</td>
                                    <td class="align-middle">${d.linea_aerea}</td>
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
<script>
    $(document).ready(function() {
        // Mostrar el spinner de carga al inicio
        $('#loadingIndicator').show();

        // Hacer la solicitud AJAX
        $.ajax({
            url: '{{ route('obtenerAmhsPag') }}', // La ruta que apunta al método obtenerAmhsPag en el controlador
            method: 'GET',
            data: {
                inicio: 0,
                fin: 100
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
                                >
                                    <td class="align-middle">${d.id}</td>
                                    <td class="align-middle" id="estado${d.id}" style="color: ${d.color_estado};">${d.estado}</td>
                                    <td class="align-middle">${d.hora}</td>
                                    <td class="align-middle">${d.vuelo}</td>
                                    <td class="align-middle">${d.tipo}</td>
                                    <td class="align-middle">${d.origen}</td>
                                    <td class="align-middle">${d.destino}</td>
                                    <td class="align-middle">${d.eobt}</td>
                                    <td class="align-middle">${d.regla_tipo}</td>
                                    <td class="align-middle">${d.linea_aerea}</td>
                                    <td class="align-middle" id="usuario${d.id}"></td>
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
                $('#loadingIndicator').hide();
                obtenerEstados(200);
                FPLCreados();
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

        function checkForNewRecords() {

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

        }

        // Configurar intervalos regulares para verificar nuevos registros
        setInterval(checkForNewRecords, 30000); // Verificar cada 50 segundos

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
                    console.log('Respuesta del servidor:',
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

{{-- Metars --}}
<script>
    $('#profile-tab').on('click', function() {
        // Oculta el span con id notificacion_speci
        $('#notificacion_speci').hide();
    });
</script>
<script>
    var loading = false;
    var lastId = 0;

    // Mostrar el indicador de carga
    function showLoadingIndicator() {
        $('#loading').show();
    }

    // Ocultar el indicador de carga
    function hideLoadingIndicator() {
        $('#loading').hide();
    }

    function formatearHora(hora) {
        let fecha = new Date(hora); // Convertir a objeto Date

        // Obtener los componentes necesarios
        let dia = String(fecha.getDate()).padStart(2, '0'); // Día
        let horas = String(fecha.getHours()).padStart(2, '0'); // Hora en formato 24h
        let minutos = String(fecha.getMinutes()).padStart(2, '0'); // Minutos

        // Formato: dd HH:MM
        return `${dia} ${horas}:${minutos}`;
    }

    // Función para obtener los últimos 200 registros
    function obtenerMetars() {
        if (loading) return; // Evitar múltiples llamadas concurrentes
        loading = true;
        showLoadingIndicator(); // Mostrar el loading antes de hacer la solicitud

        $.ajax({
            url: '/metars', // Asegúrate de que esta ruta sea correcta
            method: 'GET',

            data: {
                lastId: lastId // Si necesitas controlar el ID más reciente
            },

            success: function(response) {
                console.log('Respuesta del servidor:', response);
                let data = response.data || response;

                if (Array.isArray(data)) {
                    let rows = '';
                    let rows_speci = '';
                    data.forEach(function(d) {

                        var estado = "Pendiente";

                        rows += '<tr ' +
                            'data-id="' + d.id + '" ' +
                            'data-hora="' + d.fechaHora + '" ' +
                            'data-tipo_mensaje="' + d.tipoMensaje + '" ' +
                            'data-mensaje="' + d.mensaje + '">' +
                            '<td class="align-middle">' + d.id + '</td>' +
                            '<td class="align-middle">' + estado + '</td>' +
                            '<td class="align-middle">' + (d.fechaHora ? formatearHora(d
                                .fechaHora) : '') + '</td>' +
                            '<td class="align-middle">' + d.tipoMensaje + '</td>' +
                            '<td class="align-middle">' + (d
                                .mensaje ? d.mensaje.substring(0, 50) +
                                (d.mensaje.length > 50 ? '...' : '') : '') + '</td>' +
                            '</tr>';

                        if (d.tipoMensaje === "SPECI") {
                            rows_speci += '<tr ' +
                                'data-id="' + d.id + '" ' +
                                'data-hora="' + d.fechaHora + '" ' +
                                'data-tipo_mensaje="' + d.tipoMensaje + '" ' +
                                'data-mensaje="' + d.mensaje + '">' +
                                '<td class="align-middle">' + d.id + '</td>' +
                                '<td class="align-middle">' + estado + '</td>' +
                                '<td class="align-middle">' + (d.fechaHora ? formatearHora(d
                                    .fechaHora) : '') + '</td>' +
                                '<td class="align-middle">' + d.tipoMensaje + '</td>' +
                                '<td class="align-middle">' + (d
                                    .mensaje ? d.mensaje.substring(0, 50) +
                                    (d.mensaje.length > 50 ? '...' : '') : '') + '</td>' +
                                '</tr>';
                        }

                    });

                    $('#met-data').prepend(rows); // Agregar nuevas filas al comienzo de la tabla
                    $('#met-data-speci').prepend(rows_speci);

                    lastId = data.length > 0 ? data[0].id : lastId; // Actualizar lastId si es necesario

                    // Obtener el último valor de id (fuera del loop para optimización)
                    let currentIDMet = data[data.length - 1].id;

                    // Eliminar cualquier valor previo y guardar el nuevo valor de ID
                    localStorage.removeItem('currentIDMet');
                    localStorage.setItem('currentIDMet', currentIDMet);

                    // Verificar que se guardó correctamente
                    console.log('El último IDMet es:', localStorage.getItem('currentIDMet'));

                } else {
                    console.error('La respuesta del servidor no es un array:', response);
                }
                loading = false; // Resetear el estado de carga
                hideLoadingIndicator(); // Ocultar el indicador de carga

                // Filtrar los datos de la tabla en tiempo real
                $('#searchInputDatMet').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#met-data tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(
                            value) > -1);
                    });
                });

            },
            error: function() {
                console.error('Error al verificar nuevos registros');
                loading = false; // Resetear el estado de carga incluso en error
                hideLoadingIndicator(); // Ocultar el indicador de carga en caso de error
            }
        });
    }

    // Función para verificar si hay nuevos registros
    function checkForNewRecordsDatMet() {
        let rows = document.querySelectorAll('#datatableMet tr[data-id]');
        let rowCount = rows.length;

        console.log('rowCountMet', rowCount);

        if (rowCount > 20) { // Solo si hay más de 20 filas
            if (loading) return; // Evitar cargar si ya se está en proceso
            loading = true;
            showLoadingIndicator();

            // Obtener el ID del primer registro en la tabla
            let firstTr = document.querySelector('#datatableMet tr[data-id]');
            let lastId = firstTr.getAttribute('data-id');

            if (lastId) {
                lastId = parseInt(lastId); // Convertir a número
            }

            console.log('LastIDMet', lastId);

            // Realizar solicitud AJAX para nuevos datos basados en el lastId
            $.ajax({
                url: '/load-new-data-metars',
                method: 'GET',
                data: {
                    lastId: lastId
                },
                success: function(response) {
                    console.log('Respuesta del servidor:', response);
                    let data = response.data || response;

                    if (Array.isArray(data)) {
                        let rows = '';
                        let rows_speci = '';
                        data.forEach(function(d) {

                            rows += '<tr ' +
                                'data-id="' + d.id + '" ' +
                                'data-hora="' + d.fechaHora + '" ' +
                                'data-tipo_mensaje="' + d.tipoMensaje + '" ' +
                                'data-mensaje="' + d.mensaje + '">' +
                                '<td class="align-middle">' + d.id + '</td>' +
                                '<td class="align-middle">' + 'Pendiente' + '</td>' +
                                '<td class="align-middle">' + (d.fechaHora ? formatearHora(d
                                    .fechaHora) : '') + '</td>' +
                                '<td class="align-middle">' + d.tipoMensaje + '</td>' +
                                '<td class="align-middle">' + (d.mensaje ? d.mensaje.substring(0,
                                    50) + (d.mensaje.length > 50 ? '...' : '') : '') + '</td>' +
                                '</tr>';

                            if (d.tipoMensaje === "SPECI") {

                                // Mostrar el span con el id notificacion_speci
                                document.getElementById('notificacion_speci').style.display =
                                    'inline';

                                rows_speci += '<tr ' +
                                    'data-id="' + d.id + '" ' +
                                    'data-hora="' + d.fechaHora + '" ' +
                                    'data-tipo_mensaje="' + d.tipoMensaje + '" ' +
                                    'data-mensaje="' + d.mensaje + '">' +
                                    '<td class="align-middle">' + d.id + '</td>' +
                                    '<td class="align-middle">' + 'Pendiente' + '</td>' +
                                    '<td class="align-middle">' + (d.fechaHora ? formatearHora(d
                                        .fechaHora) : '') + '</td>' +
                                    '<td class="align-middle">' + d.tipoMensaje + '</td>' +
                                    '<td class="align-middle">' + (d.mensaje ? d.mensaje.substring(
                                        0,
                                        50) + (d.mensaje.length > 50 ? '...' : '') : '') + '</td>' +
                                    '</tr>';
                            }

                        });

                        $('#met-data').prepend(rows); // Insertar nuevos registros al inicio de la tabla
                        $('#met-data-speci').prepend(rows_speci);

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
    }

    function loadMoreDataMet(page) {

        if (loading) return; // Si ya se está cargando, no hacer nada
        loading = true;
        showLoadingIndicator(); // Mostrar el indicador de carga

        // Calcular los valores de inicio y fin
        let inicio = page;
        let fin = 100;

        $.ajax({
            url: '/load-more-data-metars', // La ruta del controlador
            method: 'GET',
            data: {
                inicio: inicio,
                fin: fin
            },
            success: function(response) {
                console.log('Respuesta del servidor:', response); // Log de la respuesta
                var data = response.data || response;

                // Recupera el valor de currentID desde localStorage
                let currentIDMet = localStorage.getItem('currentIDMet');

                // Si el array 'data' tiene elementos, actualiza currentID con el último id
                if (data && data.length > 0) {
                    currentIDMet = data[data.length - 1].id;
                    // Guardar el nuevo valor en localStorage
                    localStorage.setItem('currentIDMet', currentIDMet);
                    console.log('El último ID es:', localStorage.getItem('currentIDMet'));
                } else {
                    console.log('No hay datos para actualizar currentID.');
                }

                if (Array.isArray(data)) {
                    var rows = '';
                    var rows_speci = '';

                    data.forEach(function(d) {

                        var estado = 'Pendiente';

                        rows += '<tr ' +
                            'data-id="' + d.id + '" ' +
                            'data-hora="' + d.hora + '" ' +
                            'data-tipo_mensaje="' + d.tipoMensaje + '" ' +
                            'data-mensaje="' + d.mensaje + '">' +
                            '<td class="align-middle">' + d.id + '</td>' +
                            '<td class="align-middle">' + estado + '</td>' +
                            '<td class="align-middle">' + d.hora + '</td>' +
                            '<td class="align-middle">' + d.tipoMensaje + '</td>' +
                            '<td class="align-middle">' + (d.mensaje ? d.mensaje.substring(0, 50) +
                                (d.mensaje.length > 50 ? '...' : '') : '') + '</td>' +
                            '</tr>';

                        if (d.tipoMensaje === "SPECI") {
                            rows_speci += '<tr ' +
                                'data-id="' + d.id + '" ' +
                                'data-hora="' + d.hora + '" ' +
                                'data-tipo_mensaje="' + d.tipoMensaje + '" ' +
                                'data-mensaje="' + d.mensaje + '">' +
                                '<td class="align-middle">' + d.id + '</td>' +
                                '<td class="align-middle">' + estado + '</td>' +
                                '<td class="align-middle">' + d.hora + '</td>' +
                                '<td class="align-middle">' + d.tipoMensaje + '</td>' +
                                '<td class="align-middle">' + (d.mensaje ? d.mensaje.substring(0,
                                        50) +
                                    (d.mensaje.length > 50 ? '...' : '') : '') + '</td>' +
                                '</tr>';
                        }

                    });

                    $('#met-data').append(rows);
                    $('#met-data-speci').prepend(rows_speci);

                    // Actualizar lastId con el ID del último registro recibido
                    /* if (data.length > 0) {
                        lastId = data[data.length - 1].id;
                    } */

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

    // Llamar a la función al cargar la página
    $(document).ready(function() {
        obtenerMetars();
    });

    // Configurar intervalos regulares para verificar nuevos registros cada 30 segundos
    setInterval(checkForNewRecordsDatMet, 30000);

    // Función para manejar el scroll
    var containerDatMet = document.getElementById('tableContainerDat');

    if (containerDatMet) {
        containerDatMet.addEventListener('scroll', function() {
            var scrollTop = containerDatMet.scrollTop;
            var scrollHeight = containerDatMet.scrollHeight - containerDatMet.clientHeight;
            var scrollPercent = (scrollTop / scrollHeight) * 100;

            if (scrollPercent >= 95 && !loading) {
                let currentIDMet = localStorage.getItem('currentIDMet');
                if (currentIDMet) {
                    currentIDMet = parseInt(currentIDMet); // Asegúrate de convertirlo a número
                }
                console.log('Cargando más datos... ID: ' + currentIDMet);
                loadMoreDataMet(currentIDMet);
            }
        });
    } else {
        console.error('No se encontró un contenedor con el id "tableContainerDat".');
    }
</script>
<script>
    // Evento de clic en una fila de la tabla
    $('#datatableMet tbody').on('click', 'tr', function() {
        // Recuperar los atributos data-* de la fila seleccionada
        var id = $(this).data('id');
        var hora = $(this).data('hora');
        var tipoMensaje = $(this).data('tipo_mensaje');
        var mensaje = $(this).data('mensaje');

        // Colocar los datos en los elementos del modal
        $('#modalId').text(id);
        $('#modalHora').text(hora);
        $('#modalTipoMensaje').text(tipoMensaje);
        $('#modalMensaje').text(mensaje);

        // Mostrar el modal
        $('#ModalMet').modal('show');
    });

    $('#datatableMetSpeci tbody').on('click', 'tr', function() {
        // Recuperar los atributos data-* de la fila seleccionada
        var id = $(this).data('id');
        var hora = $(this).data('hora');
        var tipoMensaje = $(this).data('tipo_mensaje');
        var mensaje = $(this).data('mensaje');

        // Colocar los datos en los elementos del modal
        $('#modalId').text(id);
        $('#modalHora').text(hora);
        $('#modalTipoMensaje').text(tipoMensaje);
        $('#modalMensaje').text(mensaje);

        // Mostrar el modal
        $('#ModalMet').modal('show');
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

            vuelo = vuelo.toUpperCase();
            origen = origen.toUpperCase();
            destino = destino.toUpperCase();

            // Crear un objeto con los datos
            const data = {
                fecha_inicio: fechaInicio,
                fecha_fin: fechaFin,
                vuelo: vuelo,
                origen: origen,
                destino: destino
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
                                >
                                    <td class="align-middle">${d.id}</td>
                                    <td class="align-middle" id="estado${d.id}" style="color: ${d.color_estado};">${d.estado}</td>
                                    <td class="align-middle">${d.hora}</td>
                                    <td class="align-middle">${d.vuelo}</td>
                                    <td class="align-middle">${d.tipo}</td>
                                    <td class="align-middle">${d.origen}</td>
                                    <td class="align-middle">${d.destino}</td>
                                    <td class="align-middle">${d.eobt}</td>
                                    <td class="align-middle">${d.regla_tipo}</td>
                                    <td class="align-middle">${d.linea_aerea}</td>
                                    <td class="align-middle" id="usuario${d.id}">${d.user_name}</td>
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

        function checkForNewRecordsAutorizados() {
            // Obtener la tabla
            const table = document.getElementById("amhs-dataAutorizados");

            // Verificar si hay filas en la tabla
            if (table && table.rows.length > 0) {
                // Obtener el valor del primer <td> de la primera fila
                const firstCell = table.rows[0].querySelector("td.align-middle");

                // Enviar el valor mediante AJAX si existe
                if (firstCell) {
                    const lastIdAutorizado = firstCell.textContent.trim();

                    $.ajax({
                        url: '{{ route('obtenerAmhsNewAutorizados') }}',
                        method: 'GET',
                        data: {
                            lastIdAutorizado: lastIdAutorizado,
                        },
                        success: function(response) {
                            console.log("Respuesta del servidor AMHS Autorizado:", response);

                            var amhsData = response.data;

                            console.log('amhsData New Autorizado', amhsData);

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
                                    data-sts="${d.sts}"
                                    data-opr="${d.opr}"
                                    data-nav="${d.nav}"
                                    data-rvr="${d.rvr}"
                                >
                                    <td class="align-middle">${d.id_amhs}</td>
                                    <td class="align-middle" style="color: ${d.color_estado};">${d.name_estado}</td>
                                    <td class="align-middle">${diaHora}</td>
                                    <td class="align-middle">${vuelo}</td>
                                    <td class="align-middle">${tipo}</td>
                                    <td class="align-middle">${origen}</td>
                                    <td class="align-middle">${destino}</td>
                                    <td class="align-middle">${eobt}</td>
                                    <td class="align-middle">${regla_tipo}</td>
                                    <td class="align-middle">${linea_aerea}</td>
                                    <td class="align-middle">${d.user_name}</td>
                                </tr>
                            `;
                                });

                                $('#amhs-dataAutorizados').prepend(rows);
                            }


                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la solicitud AJAX:", error);
                        }
                    });
                } else {
                    console.log("No se encontró ninguna celda.");
                }
            } else {
                console.log("La tabla está vacía o no existe.");
            }
        }

        // Llamar a la función cada 30 segundos
        setInterval(checkForNewRecordsAutorizados, 30000);

        // Mostrar el spinner de carga al inicio
        $('#loadingIndicatorAutorizados').show();

        // Hacer la solicitud AJAX
        $.ajax({
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
                                    data-sts="${d.sts}"
                                    data-opr="${d.opr}"
                                    data-nav="${d.nav}"
                                    data-rvr="${d.rvr}"
                                >
                                    <td class="align-middle">${d.id_amhs}</td>
                                    <td class="align-middle" style="color: ${d.color_estado};">${d.name_estado}</td>
                                    <td class="align-middle">${diaHora}</td>
                                    <td class="align-middle">${vuelo}</td>
                                    <td class="align-middle">${tipo}</td>
                                    <td class="align-middle">${origen}</td>
                                    <td class="align-middle">${destino}</td>
                                    <td class="align-middle">${eobt}</td>
                                    <td class="align-middle">${regla_tipo}</td>
                                    <td class="align-middle">${linea_aerea}</td>
                                    <td class="align-middle">${d.user_name}</td>
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
                            '<tr><td colspan="10">No se encontraron datos.</td></tr>');
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
                $('#loadingIndicatorAutorizados').hide();
                // obtenerEstados(200);
                // FPLCreados();
            }
        });
    });
</script>

{{-- ATC-004 --> ATC-002 --}}
<script>
    $(document).ready(function() {
        function fetchFichaACC4() {

            // Selecciona todas las celdas de la columna ID y almacénalas como números en un array
            let array_id_amhs = [];
            $('#datatableScrollY tbody tr').each(function() {
                let id = $(this).find('td:first').text(); // Obtiene el texto de la primera celda
                array_id_amhs.push(Number(id)); // Convierte a número y lo agrega al array
            });

            console.log('ATC004 IDS', array_id_amhs); // Muestra el array de IDs en la consola

            $.ajax({
                url: '{{ route('fichaACC4Notificacion') }}',
                method: 'POST',
                data: {
                    'id-amhs': array_id_amhs,
                    'tipo-ficha': 16,
                    _token: '{{ csrf_token() }}' // Token CSRF para solicitudes POST en Laravel
                },
                success: function(response) {

                    var last_est = '';

                    if (response.success) {
                        var dataACC4 = response.data;
                        console.log('dataACC4', dataACC4);

                        dataACC4.forEach(function(item) {
                            if (item.resultado === 1) {
                                // Crear un identificador único para el badge
                                var badgeId = 'badge-' + item.id_amhs;

                                // Crear el badge con un id único
                                var badge =
                                    `<span id="${badgeId}" class="badge bg-info text-white">ATC-004</span>`;

                                // Seleccionar la celda específica según el id_amhs
                                var estadoCell = document.getElementById('estado' + item
                                    .id_amhs);

                                if (estadoCell) {
                                    // Verificar si el badge ya existe dentro de la celda
                                    if (!document.getElementById(badgeId)) {
                                        // Si no existe, agregar el badge
                                        estadoCell.innerHTML += badge;
                                    }
                                }
                            }
                        });

                    } else {
                        // Si no hay éxito, muestra un mensaje en la tabla
                        console.log('No se encontraron datos');
                    }

                },
                error: function(xhr, status, error) {
                    // En caso de error, mostrar un mensaje en la tabla y en la consola
                    $('#amhs-data').html(
                        '<tr><td colspan="10">Error cargando datos.</td></tr>');
                    console.error('Error:', error, 'Estado:', status, 'XHR:', xhr);
                },
                complete: function() {
                    // Aquí puedes ocultar un indicador de carga
                    // console.log('Solicitud completada.');
                }
            });

        }

        const userTipo = @json($userTip);
        if (userTipo.pk_id_tipo_ficha === 22) {
            setInterval(function() {
                fetchFichaACC4();
            }, 40000); // Cada 40 segundos
        }

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
            weekday: 'long',
            year: 'numeric',
            month: 'numeric',
            day: 'numeric'
        };
        var formattedTime = now.toLocaleString('es-ES', options).replace(' 24:', ' 00:').replace(',', '');
        document.getElementById('currentTime').innerText = formattedTime;
    }

    setInterval(updateClock, 1000);
    updateClock(); // Initial call to display clock immediately
</script>
{{-- script para cargar mas datos a la tabla --}}

{{-- Modal Busqueda Historica --}}
{{-- @include('transito.modal_search') --}}
{{-- Modal Busqueda Historica --}}

{{-- Modal Nuevo Plan de Vuelo --}}
@include('transito.modal_plan_vuelo')
{{-- Modal Nuevo Plan de Vuelo --}}
