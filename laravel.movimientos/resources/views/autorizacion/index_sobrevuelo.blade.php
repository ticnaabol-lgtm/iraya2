@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>


@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <h4>Autorizacion Sobrevuelos</h4>

        <br />

        <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalAutorizacion">
            <i class="fa-solid fa-plus"></i> Nuevo
        </button>

        <div class="card-body" style="overflow-x: auto;">
            <table id="autorizacionDataTable" class="table" style="width:100%; font-size: 10px;">
                <thead style="font-size: 10px;">
                    <tr>
                        <th>Autorización</th>
                        <th>Fecha</th>
                        <th>Operador</th>
                        <th>Tipo Aeronave</th>
                        <th>Matricula</th>
                        <th>Peso</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Ultimo Aeropuerto</th>
                        <th>Aeropuerto Destino</th>
                        <th>Ruta</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autorizaciones as $item)
                        <tr>
                            <td>{{ $item->numero_autorizacion }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->fecha_autorizacion)->format('d/m/Y') }}</td>
                            <td>{{ Str::limit($item->razon_social, 20) }}</td>
                            <td>{{ $item->tipo_aeronave }}</td>
                            <td>{{ $item->matricula }}</td>
                            <td>{{ $item->peso }} ({{ $item->medida_peso }})</td>
                            <td>{{ \Carbon\Carbon::parse($item->tiempo_validez_inicio)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tiempo_validez_fin)->format('d/m/Y') }}</td>
                            <td>{{ $item->ultimo_aeropuerto }}</td>
                            <td>{{ $item->aeropuerto_destino }}</td>
                            <td>{{ Str::limit($item->ruta, 20) }}</td>
                            <td>
                                <!-- Botón Detalle -->
                                <button class="btn btn-info btn-icon rounded-circle btn-detalles-autorizacion"
                                    data-id="{{ $item->id }}"
                                    data-numero_autorizacion="{{ $item->numero_autorizacion }}"
                                    data-fecha_autorizacion="{{ $item->fecha_autorizacion }}"
                                    data-razon_social="{{ $item->razon_social }}"
                                    data-tipo_aeronave="{{ $item->tipo_aeronave }}"
                                    data-matricula="{{ $item->matricula }}" data-pais="{{ $item->pais }}"
                                    data-peso="{{ $item->peso }}" data-medida_peso="{{ $item->medida_peso }}"
                                    data-piloto="{{ $item->piloto }}"
                                    data-tiempo_validez_inicio="{{ $item->tiempo_validez_inicio }}"
                                    data-tiempo_validez_fin="{{ $item->tiempo_validez_fin }}"
                                    data-ultimo_aeropuerto="{{ $item->ultimo_aeropuerto }}"
                                    data-aeropuerto_destino="{{ $item->aeropuerto_destino }}"
                                    data-aeropuerto_alterno="{{ $item->aeropuerto_alterno }}"
                                    data-tipo_autorizacion="{{ $item->tipo_autorizacion }}"
                                    data-objeto_vuelo="{{ $item->objeto_vuelo }}"
                                    data-observaciones="{{ $item->observaciones }}" data-ruta="{{ $item->ruta }}"
                                    title="Ver detalles">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <!-- Botón Editar -->
                                <button class="btn btn-primary btn-icon rounded-circle btn-editar-autorizacion"
                                    data-id="{{ $item->id }}"
                                    data-numero_autorizacion="{{ $item->numero_autorizacion }}"
                                    data-fecha_autorizacion="{{ $item->fecha_autorizacion }}"
                                    data-razon_social="{{ $item->razon_social }}"
                                    data-tipo_aeronave="{{ $item->tipo_aeronave }}"
                                    data-matricula="{{ $item->matricula }}" data-pais="{{ $item->pais }}"
                                    data-peso="{{ $item->peso }}" data-piloto="{{ $item->piloto }}"
                                    data-tiempo_validez_inicio="{{ $item->tiempo_validez_inicio }}"
                                    data-tiempo_validez_fin="{{ $item->tiempo_validez_fin }}"
                                    data-ultimo_aeropuerto="{{ $item->ultimo_aeropuerto }}"
                                    data-aeropuerto_destino="{{ $item->aeropuerto_destino }}"
                                    data-aeropuerto_alterno="{{ $item->aeropuerto_alterno }}"
                                    data-objeto_vuelo="{{ $item->objeto_vuelo }}"
                                    data-observaciones="{{ $item->observaciones }}" data-ruta="{{ $item->ruta }}"
                                    data-medida_peso="{{ $item->medida_peso }}"
                                    data-tipo_autorizacion="{{ $item->tipo_autorizacion }}"
                                    data-tipo_array='@json($item->tipo_array)'
                                    data-matricula_array='@json($item->matricula_array)'
                                    data-peso_array='@json($item->peso_array)' title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Botón Eliminar -->
                                <button class="btn btn-danger btn-icon rounded-circle btn-eliminar-autorizacion"
                                    data-id="{{ $item->id }}" title="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    @include('autorizacion.modal_autorizacion')
    @include('autorizacion.modal_autorizacion_detalles')
@endsection

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

<script>
    function formatearFecha(fechaISO) {
        const fecha = new Date(fechaISO);
        const dia = String(fecha.getDate()).padStart(2, '0');
        const mes = String(fecha.getMonth() + 1).padStart(2, '0');
        const anio = fecha.getFullYear();
        return `${dia}/${mes}/${anio}`;
    }

    function limitarTexto(texto, max = 70) {
        if (!texto) return '';
        return texto.length > max ? texto.substring(0, max - 3) + '...' : texto;
    }

    function formatearNumero(numero) {
        if (!numero) return '0';
        return Number(numero).toLocaleString('es-BO'); // O usa 'es-ES' si prefieres formato español general
    }

    $(document).ready(function() {
        // Inicializa el DataTable en español
        const table = $('#autorizacionDataTable').DataTable({
            columnDefs: [{
                    targets: -1,
                    width: '200px'
                } // Última columna
            ],
            responsive: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });

        var socket = io("{{ env('SOCKET_URL') }}", {
            withCredentials: true,
            reconnection: true,
            reconnectionAttempts: 5,
            reconnectionDelay: 1000,
            timeout: 20000,
            transports: ['websocket', 'polling'],
            upgrade: true
        });

        socket.on('connect', () => {
            // console.log('✅ Conectado al socket');
        });

        // Escucha el evento del socket
        socket.on('registro_autorizacion', function(data) {
            table.clear(); // Limpia el contenido actual

            // console.log('data', data);

            data.forEach(function(item, index) {

                // Filtrar solo los que sean "SOBREVUELO"
                if (item.tipo_autorizacion === "SOBREVUELO") {

                    const detalleBtn = `
                    <button class="btn btn-info btn-icon rounded-circle btn-detalles-autorizacion"
                        data-id="${item.id}"
                        data-numero_autorizacion="${item.numero_autorizacion}"
                        data-fecha_autorizacion="${item.fecha_autorizacion}"
                        data-razon_social="${item.razon_social}"
                        data-tipo_aeronave="${item.tipo_aeronave}"
                        data-matricula="${item.matricula}"
                        data-pais="${item.pais}"
                        data-peso="${item.peso}"
                        data-medida_peso="${item.medida_peso}"
                        data-piloto="${item.piloto}"
                        data-tiempo_validez_inicio="${item.tiempo_validez_inicio}"
                        data-tiempo_validez_fin="${item.tiempo_validez_fin}"
                        data-ultimo_aeropuerto="${item.ultimo_aeropuerto}"
                        data-aeropuerto_destino="${item.aeropuerto_destino}"
                        data-aeropuerto_alterno="${item.aeropuerto_alterno}"
                        data-tipo_autorizacion="${item.tipo_autorizacion}"
                        data-objeto_vuelo="${item.objeto_vuelo}"
                        data-observaciones="${item.observaciones}"
                        data-ruta="${item.ruta}"
                        title="Ver detalles">
                        <i class="fa-solid fa-eye"></i>
                    </button>`;

                    const editarBtn = `
                    <button class="btn btn-primary btn-icon rounded-circle btn-editar-autorizacion"
                        data-id="${item.id}"
                        data-numero_autorizacion="${item.numero_autorizacion}"
                        data-fecha_autorizacion="${item.fecha_autorizacion}"
                        data-razon_social="${item.razon_social}"
                        data-tipo_aeronave="${item.tipo_aeronave}"
                        data-matricula="${item.matricula}"
                        data-pais="${item.pais}"
                        data-peso="${item.peso}"
                        data-piloto="${item.piloto}"
                        data-tiempo_validez_inicio="${item.tiempo_validez_inicio}"
                        data-tiempo_validez_fin="${item.tiempo_validez_fin}"
                        data-ultimo_aeropuerto="${item.ultimo_aeropuerto}"
                        data-aeropuerto_destino="${item.aeropuerto_destino}"
                        data-aeropuerto_alterno="${item.aeropuerto_alterno}"
                        data-objeto_vuelo="${item.objeto_vuelo}"
                        data-observaciones="${item.observaciones}"
                        data-ruta="${item.ruta}"
                        data-medida_peso="${item.medida_peso}"
                        data-tipo_autorizacion="${item.tipo_autorizacion}"
                        data-tipo_array='${item.tipo_array}'
                        data-matricula_array='${item.matricula_array}'
                        data-peso_array='${item.peso_array}'
                        title="Editar">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>`;

                    const eliminarBtn = `
                    <button class="btn btn-danger btn-icon rounded-circle btn-eliminar-autorizacion"
                        data-id="${item.id}" title="Eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </button>`;

                    const fechaAutorizacion = formatearFecha(item.fecha_autorizacion);
                    const fechaInicio = formatearFecha(item.tiempo_validez_inicio);
                    const fechaFin = formatearFecha(item.tiempo_validez_fin);

                    table.row.add([
                        limitarTexto(item.numero_autorizacion),
                        formatearFecha(item.fecha_autorizacion),
                        limitarTexto(item.razon_social),
                        limitarTexto(item.tipo_aeronave),
                        limitarTexto(item.matricula),
                        item.peso + ' (' + item.medida_peso + ')',
                        formatearFecha(item.tiempo_validez_inicio),
                        formatearFecha(item.tiempo_validez_fin),
                        limitarTexto(item.ultimo_aeropuerto),
                        limitarTexto(item.aeropuerto_destino),
                        limitarTexto(item.ruta),
                        detalleBtn + editarBtn + eliminarBtn
                    ]).draw(false);
                }
            });

            table.draw(); // Redibuja la tabla
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-editar-autorizacion', function(e) {
            e.preventDefault();

            const button = $(this);

            // Mostrar modal
            $('#addNewCardModalAutorizacion').modal('show');

            const tipoAutorizacion = button.data('tipo_autorizacion') ?? '';

            /* console.log('button.data(aeropuerto_destino)', button.data('aeropuerto_destino'));
            console.log('button.data(aeropuerto_alterno)', button.data(
                'aeropuerto_alterno')); */

            // Cargar campos simples
            $('#autorizacion_id').val(button.data('id'));
            $('#numero_autorizacion').val(button.data('numero_autorizacion'));
            $('#fecha_autorizacion').val(button.data('fecha_autorizacion')?.substring(0, 10));
            $('#razon_social').val(button.data('razon_social'));
            $('#pais').val(button.data('pais')).trigger('change');
            $('#piloto').val(button.data('piloto'));
            $('#tipo_autorizacion').val(tipoAutorizacion).trigger('change');
            $('#medida_peso').val(button.data('medida_peso'));
            $('#tiempo_validez_inicio').val(button.data('tiempo_validez_inicio')?.substring(0, 10));
            $('#tiempo_validez_fin').val(button.data('tiempo_validez_fin')?.substring(0, 10));
            $('#ultimo_aeropuerto').val(button.data('ultimo_aeropuerto'));
            $('#aeropuerto_destino').val(button.data('aeropuerto_destino'));
            $('#aeropuerto_destino_alterno').val(button.data('aeropuerto_alterno'));
            $('#objeto_vuelo').val(button.data('objeto_vuelo'));
            $('#ruta').val(button.data('ruta'));
            $('#observaciones').val(button.data('observaciones'));

            // Limpiar la tabla de aeronaves
            const tbody = $('#tablaAeronavesBody');
            tbody.empty();

            // Obtener los arrays desde los atributos data-*
            const tipoArray = JSON.parse(button.attr('data-tipo_array') || '[]');
            const matriculaArray = JSON.parse(button.attr('data-matricula_array') || '[]');
            const pesoArray = JSON.parse(button.attr('data-peso_array') || '[]');

            /* console.log('tipoArray', tipoArray);
            console.log('matriculaArray', matriculaArray);
            console.log('pesoArray', pesoArray); */

            // Llenar filas dinámicamente
            tipoArray.forEach((tipo, index) => {
                const peso = pesoArray[index] ?? '';
                const matricula = matriculaArray[index] ?? '';

                const row = `
                    <tr>
                        <td><input type="text" name="tipo_aeronave_${index}" class="form-control text-uppercase" value="${tipo}"></td>
                        <td><input type="number" name="peso_${index}" class="form-control" step="0.01" value="${peso}"></td>
                        <td><input type="text" name="matricula_${index}" class="form-control text-uppercase" value="${matricula}"></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success btn-sm agregar-fila me-1">
                                <i class="fa fa-plus"></i> Agregar
                            </button>
                            <button type="button" class="btn btn-danger btn-sm eliminar-fila">
                                <i class="fa fa-times"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                 `;
                tbody.append(row);
            });
        });

        // Delegar eliminación de fila de aeronave
        $(document).on('click', '.eliminar-fila', function() {
            $(this).closest('tr').remove();
        });
    });
</script>

<script>
    $(document).on('click', '.btn-detalles-autorizacion', function(e) {
        e.preventDefault();
        const btn = $(this);

        // console.log('button.data(ultimo_aeropuerto)', btn.data('ultimo_aeropuerto'));

        $('#detalle_numero_autorizacion').text(btn.data('numero_autorizacion'));
        $('#detalle_tipo_autorizacion').text(btn.data('tipo_autorizacion'));
        $('#detalle_fecha_autorizacion').text(btn.data('fecha_autorizacion')?.substring(0, 10));
        $('#detalle_razon_social').text(btn.data('razon_social'));
        $('#detalle_tipo_aeronave').text(btn.data('tipo_aeronave'));
        $('#detalle_pais').text(btn.data('pais'));
        $('#detalle_matricula').text(btn.data('matricula'));
        $('#detalle_peso').text(btn.data('peso') + ' (' + btn.data('medida_peso') + ')');
        $('#detalle_piloto').text(btn.data('piloto'));
        $('#detalle_fecha_inicio').text(btn.data('tiempo_validez_inicio')?.substring(0, 10));
        $('#detalle_fecha_fin').text(btn.data('tiempo_validez_fin')?.substring(0, 10));
        $('#detalle_ultimo_aeropuerto').text(btn.data('ultimo_aeropuerto'));
        $('#detalle_aeropuerto_destino').text(btn.data('aeropuerto_destino'));
        $('#detalle_aeropuerto_destino_alterno').text(btn.data('aeropuerto_alterno'));
        $('#detalle_objeto_vuelo').text(btn.data('objeto_vuelo'));
        $('#detalle_ruta').text(btn.data('ruta'));
        $('#detalle_observaciones').text(btn.data('observaciones'));

        $('#detallesAutorizacionModal').modal('show');
    });
</script>

<script>
    $(document).on('click', '.btn-eliminar-autorizacion', function(e) {
        e.preventDefault();

        const button = $(this);
        const id = button.data('id');
        if (!id) return;

        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción eliminará la autorización y no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/registro-autorizacion/baja/${id}`,
                    type: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: response.success ??
                                "La autorización fue eliminada correctamente.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        const row = button.closest('tr');
                        $('#autorizacionDatatable').DataTable().row(row).remove().draw(
                            false);
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar la autorización.",
                            icon: "error"
                        });
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
