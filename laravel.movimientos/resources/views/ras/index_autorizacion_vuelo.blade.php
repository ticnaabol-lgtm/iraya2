@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>


@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
        <li class="breadcrumb-item"><a href="{{ url('#') }}">Autorización</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalAutorizacion">
            <i class="fa-solid fa-plus"></i>Nueva Autorización</button>

        <div class="card-body">
            <table id="autorizacionDataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Autorización</th>
                        <th>Fecha</th>
                        <th>OACI</th>
                        <th>Cliente</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    @include('ras.modal_autorizacion')

    <script>
        $(document).ready(function() {
            $('#autorizacionDataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/autorizacion/data') }}",
                pageLength: 25,
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'numero_autorizacion',
                        name: 'numero_autorizacion'
                    },
                    {
                        data: 'fecha_autorizacion',
                        name: 'fecha_autorizacion'
                    },
                    {
                        data: 'cliente',
                        name: 'cliente'
                    },
                    {
                        data: 'razon_social',
                        name: 'razon_social'
                    },
                    {
                        data: 'tiempo_validez_inicio',
                        name: 'tiempo_validez_inicio'
                    },
                    {
                        data: 'tiempo_validez_fin',
                        name: 'tiempo_validez_fin'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            const editarBtn = `
                            <a href="#" class="btn btn-sm btn-primary btn-editar-autorizacion"
                                data-id="${row.id}"
                                data-numero="${row.numero_autorizacion || ''}"
                                data-fecha="${row.fecha_autorizacion || ''}"
                                data-cliente="${row.cliente || ''}"
                                data-cliente2="${row.cliente2 || ''}"
                                data-razon_social="${row.razon_social || ''}"
                                data-objeto="${row.objeto_vuelo || ''}"
                                data-objeto_aux="${row.objeto_vuelo_aux || ''}"
                                data-tipo_aeronave="${row.tipo_aeronave || ''}"
                                data-nacionalidad="${row.nacionalidad || ''}"
                                data-peso="${row.peso || ''}"
                                data-medida_peso="${row.medida_peso || ''}"
                                data-piloto="${row.piloto || ''}"
                                data-matricula="${row.matricula || ''}"
                                data-modelo="${row.modelo || ''}"
                                data-desde="${row.tiempo_validez_inicio || ''}"
                                data-hasta="${row.tiempo_validez_fin || ''}"
                                data-dias="${row.dias_adelanto || ''}"
                                data-ruta="${row.ruta || ''}"
                                data-ultimo_aeropuerto="${row.ultimo_aeropuerto || ''}"
                                data-aeropuerto_destino="${row.aeropuerto_destino || ''}"
                                data-aeropuerto_alterno="${row.aeropuerto_alterno || ''}"
                                data-aeropuerto_entrada="${row.aeropuerto_entrada || ''}"
                                data-aeropuerto_entrada_alterno="${row.aeropuerto_entrada_alterno || ''}"
                                data-aeropuerto_salida="${row.aeropuerto_salida || ''}"
                                data-aeropuerto_salida_alterno="${row.aeropuerto_salida_alterno || ''}"
                                data-pais="${row.pais || ''}"
                                data-tipo_autorizacion="${row.tipo_autorizacion || ''}"
                                data-tipo_array="${row.tipo_array || ''}"
                                data-matricula_array="${row.matricula_array || ''}"
                                data-peso_array="${row.peso_array || ''}"
                                data-observaciones="${row.observaciones || ''}"
                                title="Editar">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>`;

                            const eliminarBtn = `
                            <a href="#" class="btn btn-sm btn-danger btn-eliminar-autorizacion"
                                data-id="${row.id}" title="Eliminar">
                                <i class="fa-solid fa-trash fa-lg"></i>
                            </a>`;

                            return editarBtn + ' ' + eliminarBtn;
                        }
                    },
                ],
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
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activar para ordenar la columna ascendente",
                        "sortDescending": ": activar para ordenar la columna descendente"
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-editar-autorizacion', function(e) {
                e.preventDefault();

                const btn = $(this);

                // Abrir el modal
                $('#addNewCardModalAutorizacion').modal('show');

                // Rellenar campos del formulario
                $('#autorizacion_id').val(btn.data('id'));
                $('#razon_social').val(btn.data('razon_social'));
                $('#fecha_autorizacion').val(btn.data('fecha'));

                // Separar número y gestión
                let numeroCompleto = btn.data('numero') || '';
                let [numero, gestion] = numeroCompleto.split('/');
                $('#numero_autorizacion').val(numero || '');
                $('#gestion_autorizacion').val(gestion || '').trigger('change');

                $('#cliente').val(btn.data('cliente'));
                $('#cliente2').val(btn.data('cliente2'));
                $('#origen_cliente').val(''); // Opcional, si lo gestionas
                $('#origen_cliente2').val(''); // Opcional

                $('#tipo_aeronave').val(btn.data('tipo_aeronave'));
                $('#nacionalidad').val(btn.data('nacionalidad')).trigger('change');
                $('#peso').val(btn.data('peso'));
                $('#medida_peso').val(btn.data('medida_peso')).trigger('change');
                $('#piloto').val(btn.data('piloto'));
                $('#ruta').val(btn.data('ruta'));

                $('#ultimo_aeropuerto').val(btn.data('ultimo_aeropuerto'));
                $('#aeropuerto_destino').val(btn.data('aeropuerto_destino'));
                $('#objeto_vuelo').val(btn.data('objeto'));

                $('#tiempo_validez_inicio').val(btn.data('desde'));
                $('#tiempo_validez_fin').val(btn.data('hasta'));
                $('#dias_adelanto').val(btn.data('dias'));
                $('#observaciones').val(btn.data('observaciones'));
            });
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

                            // Actualizar la Tabla
                            $('#autorizacionDataTable').DataTable().ajax.reload(null, false);

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
@endsection
