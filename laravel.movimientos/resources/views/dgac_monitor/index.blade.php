@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

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

    /* botones */

    .nav-tabs .nav-link {
        color: #333;
        font-weight: bold;
        background-color: #f8f9fa;
        transition: background-color 0.3s, color 0.3s;
    }

    .nav-tabs .nav-link:hover {
        background-color: #ddd;
    }

    .nav-tabs .nav-link.active {
        background-color: #ff5722 !important;
        /* Color fuerte para la pestaña activa */
        color: white !important;
        border: 1px solid #ff5722;
        border-bottom: none;
    }

    #autorizado_speci {
        font-size: 0.8rem;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 4px;
        animation: cambioColorAutorizado 1s infinite alternate;
    }

    @keyframes cambioColorAutorizado {
        0% {
            background-color: #df5b0e;
            color: #fff;
        }

        50% {
            background-color: #dd6d2c;
            color: #fff;
        }

        100% {
            background-color: #a84a13;
            color: #fff;
        }
    }

    .nav-tabs .nav-link {
        padding: 4px 6px !important;
        /* ajusta vertical (4px) y horizontal (6px) */
    }

    /* nabvar */

    .barra-datos {
        display: inline-flex;
        background-color: #e0e0e0;
        border-radius: 4px;
        overflow: hidden;
        font-family: sans-serif;
    }

    .barra-datos .item {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 10px;
        border-right: 1px solid #ccc;
        white-space: nowrap;
        font-size: 14px;
        gap: 6px;
        /* espacio entre ícono y texto */
    }

    .barra-datos .item:last-child {
        border-right: none;
    }

    .barra-datos i {
        font-size: 16px;
    }

    .barra-datos .link {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<style>
    #ssDataTable,
    #ddDataTable,
    #notamDataTable,
    #metDataTable,
    #speciDataTable,
    #atsDataTable,
    #amhsDataTable {
        font-size: 15px;
        table-layout: auto !important;
        width: 100% !important;
    }

    #ssDataTable th,
    #ssDataTable td,
    #ddDataTable th,
    #ddDataTable td,
    #notamDataTable th,
    #notamDataTable td,
    #atsDataTable th,
    #atsDataTable td,
    #metDataTable th,
    #metDataTable td,
    #speciDataTable th,
    #speciDataTable td,
    #amhsDataTable th,
    #amhsDataTable td {
        white-space: nowrap;
        /* Evita saltos de línea */
    }

    #ssDataTable tbody tr.selected,
    #ddDataTable tbody tr.selected,
    #notamDataTable tbody tr.selected,
    #metDataTable tbody tr.selected,
    #speciDataTable tbody tr.selected,
    #atsDataTable tbody tr.selected,
    #amhsDataTable tbody tr.selected {
        background-color: #c8e6c9 !important;
        /* verde claro */
    }

    #notificacion_speci,
    #notificacion_ss,
    #notificacion_dd,
    #notificacion_notam,
    #notificacion_met,
    #notificacion_ats,
    #notificacion_amhs {
        font-size: 0.9rem;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 4px;
        animation: cambioColor 1s infinite alternate;
    }

    @keyframes cambioColor {
        0% {
            background-color: #dc3545;
            color: #fff;
        }

        50% {
            background-color: #a10313;
            color: #fff;
        }

        100% {
            background-color: #ff081c;
            color: #fff;
        }
    }
</style>

@section('content')
    <!-- Row superior: col-8 y col-4 -->
    <div class="row mb-3">
        <div class="col-6">
            <!-- Contenido columna 1 -->
            <div>

                <table id="amhsDataTable" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Vuelo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Origen</th>
                            <th scope="col">Destino</th>
                            <th scope="col">EOBT</th>
                            <th scope="col">Regla</th>
                        </tr>
                    </thead>

                    <tbody id="amhs-data">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-6"
            style="
                        height: 100%;
                        padding: 0;
                        border: 2px solid black;
                        position: relative;
                        overflow: auto;
                    ">
            <div style="height: 100%; width: 100%; padding: 10px;">
                <span id="amhs_mensaje"
                    style="
                            display: block;
                            width: 100%;
                            height: 100%;
                            font-size: 15px;
                            white-space: pre-wrap;
                            word-break: break-word;
                            color: #000;
                        "></span>
            </div>
        </div>
    </div>

    <hr>

    <!-- Row inferior: col-6 y col-6 -->
    <div class="row">
        <div class="col-4">
            <!-- Contenido columna 1 -->
            <div>
                <div class="table-responsive-lg">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">ATS
                                &nbsp;&nbsp;
                                <span class="badge animate__animated animate__flash animate__infinite" id="notificacion_ats"
                                    style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">MET</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link position-relative" id="contact-tab2" data-toggle="tab"
                                data-target="#contact" type="button" role="tab" aria-controls="contact"
                                aria-selected="false">
                                SPECI &nbsp;&nbsp;
                                <span class="badge animate__animated animate__flash animate__infinite"
                                    id="notificacion_speci" style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </button>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ss-tab" data-toggle="tab" href="#ss" role="tab"
                                aria-controls="ss" aria-selected="false">SS&nbsp;&nbsp;
                                <span class="badge animate__animated animate__flash animate__infinite" id="notificacion_ss"
                                    style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="dd-tab" data-toggle="tab" href="#dd" role="tab"
                                aria-controls="dd" aria-selected="false">DD
                                <span class="badge animate__animated animate__flash animate__infinite" id="notificacion_dd"
                                    style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notam-tab" data-toggle="tab" href="#notam" role="tab"
                                aria-controls="notam" aria-selected="false">NOTAM
                                <span class="badge animate__animated animate__flash animate__infinite"
                                    id="notificacion_notam" style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        {{-- ATS --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="table-responsive-lg" id="tableContainerATS">

                                <br />
                                <table id="atsDataTable" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Vuelo</th>
                                        </tr>
                                    </thead>

                                    <tbody id="contenido-ats">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                        {{-- MET --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="table-responsive-lg" id="tableContainerDat">

                                <br />
                                <table id="metDataTable" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>

                                    <tbody id="contenido-met">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                        {{-- SPECI --}}
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab2">

                            <div class="table-responsive-lg" id="tableContainerDatSpeci">

                                <br />
                                <table id="speciDataTable" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>

                                    <tbody id="contenido-speci">

                                    </tbody>
                                </table>

                                <!-- Elemento de Loading -->
                                <div id="loading" style="display: none; text-align: center;">
                                    <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                                </div>
                            </div>

                        </div>

                        {{-- SS --}}
                        <div class="tab-pane fade" id="ss" role="tabpanel" aria-labelledby="ss-tab">

                            <br />
                            <table id="ssDataTable" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>

                                <tbody id="contenido-ss">

                                </tbody>
                            </table>
                        </div>

                        {{-- DD --}}
                        <div class="tab-pane fade" id="dd" role="tabpanel" aria-labelledby="dd-tab">

                            <br />
                            <table id="ddDataTable" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>

                                <tbody id="contenido-dd">

                                </tbody>
                            </table>
                        </div>

                        {{-- NOTAM --}}
                        <div class="tab-pane fade" id="notam" role="tabpanel" aria-labelledby="notam-tab">

                            <br />
                            <table id="notamDataTable" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>

                                <tbody id="contenido-notam">

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-8"
            style="
            height: 100%;
            padding: 0;
            border: 2px solid black;
            position: relative;
            overflow: auto;
        ">
            <div style="height: 100%; width: 100%; padding: 10px;">
                <span id="meteo"
                    style="
                    display: block;
                    width: 100%;
                    height: 100%;
                    font-size: 15px;
                    white-space: pre-wrap;
                    word-break: break-word;
                    color: #000;
                "></span>
            </div>
        </div>
    </div>
@endsection

{{-- AMHS --}}
<script>
    let filaSeleccionadaIdAmhs = null;

    $(document).ready(function() {
        const tablaAmhs = $('#amhsDataTable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: "{{ url('/amhs/data') }}",
            pageLength: 5,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
                    data: 'fecha_formateada'
                },
                {
                    data: 'vuelo'
                },
                {
                    data: 'tipo'
                },
                {
                    data: 'origen'
                },
                {
                    data: 'destino'
                },
                {
                    data: 'eobt'
                },
                {
                    data: 'regla'
                }
            ],
            drawCallback: function(settings) {
                $('#amhsDataTable tbody tr').each(function() {
                    const rowData = tablaAmhs.row(this).data();
                    if (!rowData) return;

                    $(this).attr({
                        'data-id': rowData.id,
                        'data-id_amhs': rowData.id_amhs || '',
                        'data-mensaje': rowData.mensaje || ''
                    });
                });

                if (typeof filaSeleccionadaIdAmhs !== 'undefined' && filaSeleccionadaIdAmhs) {
                    $('#amhsDataTable tbody tr').each(function() {
                        if ($(this).data('id') == filaSeleccionadaIdAmhs) {
                            $(this).addClass('selected');
                            $('#amhs_mensaje').val($(this).data('mensaje'));
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
            tablaAmhs.ajax.reload(null, false);
        }, 30000);

        // Manejar clic sobre filas de AMHS
        $('#amhsDataTable tbody').on('click', 'tr', function() {
            $('#amhsDataTable tbody tr').removeClass('selected');
            $(this).addClass('selected');

            const mensaje = $(this).data('mensaje');
            const idAmhs = $(this).data('id_amhs');
            const id = $(this).data('id');

            $('#amhs_mensaje').text(mensaje);
            filaSeleccionadaIdAmhs = id;
        });

    });
</script>

{{-- ATS --}}
<script>
    let filaSeleccionadaIdAts = null;

    $(document).ready(function() {
        const tabla = $('#atsDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/dgac/ats/data') }}",
            pageLength: 5,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
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
                            $('#meteo').val($(this).data('mensaje'));
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

            $('#meteo').text(mensaje);
            filaSeleccionadaIdAts = $(this).data('id');

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
            ajax: "{{ url('/dgac/met/data') }}",
            pageLength: 5,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
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
                            $('#meteo').val($(this).data('mensaje'));
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

            $('#meteo').text(mensaje);
            filaSeleccionadaIdMet = id;

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
            ajax: "{{ url('/dgac/speci/data') }}",
            pageLength: 5,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
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
                            $('#meteo').val($(this).data('mensaje'));
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

            $('#meteo').text(mensaje);
            filaSeleccionadaIdSpeci = id;

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
            ajax: "{{ url('/dgac/ss/data') }}",
            pageLength: 5,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
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
                            $('#meteo').val($(this).data('mensaje'));
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
            $('#meteo').text(mensaje);
            filaSeleccionadaIdSs = $(this).data('id');

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
            ajax: "{{ url('/dgac/dd/data') }}",
            pageLength: 5,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
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
                            $('#meteo').val($(this).data('mensaje'));
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

            $('#meteo').text(mensaje);
            filaSeleccionadaIdDD = $(this).data('id');

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
            ajax: "{{ url('/dgac/notam/data') }}",
            pageLength: 5,
            lengthChange: false,
            ordering: false,
            info: false,
            columns: [{
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
                        let texto = partes.slice(6, 8).join(' ');
                        return texto.length > 20 ? texto.substring(0, 20) + '.' : texto;
                    }
                }
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
                            $('#meteo').val($(this).data('mensaje'));
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

            $('#meteo').text(mensaje);
            filaSeleccionadaIdNOTAM = $(this).data('id');

        });
    });
</script>
