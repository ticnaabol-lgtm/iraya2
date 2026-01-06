@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <button type="button" class="btn btn-raised btn-raised-success" id="aprobar_varios" onclick="aprobarVarios()">
            <i class="fa-solid fa-check-circle"></i> Aprobar Selección
        </button>

        <div class="card-body">
            <table id="aprobadorDataTable" class="table" style="width:100%">

                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="all_aprove" title="Seleccionar todos">
                        </th>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Matricula</th>
                        <th>Vuelo</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Estado</th>
                        <th>Detalle</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>

                <tbody id="contenido-sobrevuelo">
                </tbody>

            </table>
        </div>
    </div>

    {{-- Modal rechazo --}}

    <div class="modal fade" id="NewCardModalAutorizacion" tabindex="-1" role="dialog" aria-labelledby="NewCardModalTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="card-title m-0" id="addNewCardModalTitle">Rechazar Sobrevuelo</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="aprobarSobrevuelo" onsubmit="enviarFormularioRechazo(event)">

                        <input type="hidden" name="registro_id" id="registro_id">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="razon_social" class="form-label">Motivo del Rechazo</label>
                                <input type="text" class="form-control" name="motivo" id="motivo"
                                    placeholder="Motivo del Rechazo">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-flat btn-primary">Rechazar</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-opacity btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script> --}}

{{-- Seleccionar Todos --}}
<script>
    // Al marcar o desmarcar el checkbox general
    $(document).on('change', '#all_aprove', function() {
        const estado = $(this).is(':checked');
        $('.checkbox_aprove').prop('checked', estado);
    });

    // Opcional: sincronizar el checkbox general si el usuario selecciona manualmente
    $(document).on('change', '.checkbox_aprove', function() {
        const total = $('.checkbox_aprove').length;
        const marcados = $('.checkbox_aprove:checked').length;
        $('#all_aprove').prop('checked', total === marcados);
    });
</script>

{{-- Aprobar Varios Sobrevuelos --}}
<script>
    function aprobarVarios() {
        const idsSeleccionados = [];

        $('.checkbox_aprove:checked').each(function() {
            idsSeleccionados.push($(this).val());
        });

        if (idsSeleccionados.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Sin selección',
                text: 'Por favor, selecciona al menos un sobrevuelo para aprobar.',
            });
            return;
        }

        Swal.fire({
            title: '¿Estás seguro?',
            text: `¿Deseas aprobar ${idsSeleccionados.length} sobrevuelos seleccionados?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, aprobar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ route('aprobador.aprobar_sobrevuelos') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: idsSeleccionados
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Aprobación exitosa',
                                text: data.message ??
                                    'Los sobrevuelos fueron aprobados correctamente.',
                            });
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Atención',
                                text: data.message ?? 'Algunos sobrevuelos ya estaban aprobados.',
                            });
                        }

                        // Actualizar la Tabla
                        $('#aprobadorDataTable').DataTable().ajax.reload(null, false);
                    })
                    .catch(error => {
                        console.error('Error en la aprobación:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al aprobar los elementos.',
                        });
                    });
            }
        });
    }
</script>

{{-- Aprobar Un Sobrevuelo --}}
<script>
    function aprobar(id) {
        if (!id) return;

        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Deseas aprobar este sobrevuelo?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sí, aprobar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/aprobar_sobrevuelo/${id}`,
                    method: 'GET',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Aprobado',
                            text: response.message ??
                                'El sobrevuelo fue aprobado correctamente',
                        });

                        // Aquí puedes actualizar la tabla o el estado visual
                        // Por ejemplo:
                        /* $(`#estado${id}`).html(`
                        <span class="badge rounded-pill bg-success text-white">APROBADO</span>
                    `); */

                        // Actualizar la Tabla
                        $('#aprobadorDataTable').DataTable().ajax.reload(null, false);

                    },
                    error: function(xhr) {
                        console.error(xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al aprobar el sobrevuelo.',
                        });
                    }
                });
            }
        });
    }
</script>

{{-- Modal Rechazo --}}
<script>
    function prepararModalRechazo(id) {
        document.getElementById('registro_id').value = id;
    }
</script>

{{-- Rechazar Sobrevuelo --}}
<script>
    function enviarFormularioRechazo(event) {
        event.preventDefault(); // Evita recargar la página

        const id = document.getElementById('registro_id').value;
        const motivo = document.getElementById('motivo').value;

        console.log('id', id);
        console.log('motivo', motivo);

        fetch("{{ route('aprobador.rechazar_sobrevuelo') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    registro_id: id,
                    motivo: motivo
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                console.log('Respuesta del servidor:', data);
                // Ocultar el modal
                $('#NewCardModalAutorizacion').modal('hide');
                // Limpiar campos si deseas
                document.getElementById('motivo').value = '';
                // Mostrar una alerta o refrescar parte de la tabla

                Swal.fire({
                    icon: 'success',
                    title: 'Rechazado',
                    text: data.message ?? 'El sobrevuelo fue rechazado exitosamente.',
                });

                // Actualizar la Tabla
                $('#aprobadorDataTable').DataTable().ajax.reload(null, false);

            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
                alert('Hubo un problema al rechazar el sobrevuelo.');
            });
    }
</script>

<script>
    $(document).ready(function() {
        $('#aprobadorDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/aprobar_sobrevuelo/data') }}",
            pageLength: 25,
            columns: [{
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return `<input type="checkbox" class="checkbox_aprove" value="${row.id}">`;
                    }
                },
                {
                    data: null,
                    name: 'rownum',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'fecha',
                    name: 'fecha'
                },
                {
                    data: 'cliente',
                    name: 'cliente',
                    render: function(data) {
                        return data ? data.toUpperCase() : '';
                    }
                },
                {
                    data: 'matricula',
                    name: 'matricula'
                },
                {
                    data: 'vuelo',
                    name: 'vuelo'
                },
                {
                    data: 'origen_oaci',
                    name: 'origen_oaci'
                },
                {
                    data: 'destino_oaci',
                    name: 'destino_oaci'
                },
                {
                    data: 'aprobado',
                    name: 'aprobado',
                    render: function(data) {
                        let estadoTexto = '';
                        switch (data) {
                            case 1:
                                estadoTexto = '<span class="badge bg-success">APROBADO</span>';
                                break;
                            case 2:
                                estadoTexto = '<span class="badge bg-danger">RECHAZADO</span>';
                                break;
                            case 3:
                                estadoTexto = '<span class="badge bg-warning">CORREGIDO</span>';
                                break;
                            default:
                                estadoTexto =
                                    '<span class="badge bg-secondary">PENDIENTE</span>';
                                break;
                        }
                        return estadoTexto;
                    }
                },
                {
                    data: 'texto_rechazo',
                    name: 'texto_rechazo'
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {

                        const aprobarBtn = `<button class="btn btn-success btn-sm me-1" onclick="aprobar(${row.id})" title="Aprobar">
                                                <i class="fas fa-check"></i>
                                            </button>`;

                        const rechazarBtn = ` <button class="btn btn-danger btn-sm me-1"
                                                data-toggle="modal"
                                                data-target="#NewCardModalAutorizacion"
                                                onclick="prepararModalRechazo(${row.id})"
                                                title="Rechazar">
                                                <i class="fas fa-times"></i>
                                            </button>`;

                        const detalleBtn = `<button class="btn btn-primary btn-sm" onclick="verDetalles(${row.id})" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>`;

                        // return aprobarBtn + ' ' + rechazarBtn + ' ' + detalleBtn;
                        return aprobarBtn + ' ' + rechazarBtn;
                    }
                }
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
