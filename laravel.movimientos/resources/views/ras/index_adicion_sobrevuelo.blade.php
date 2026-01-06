@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('#') }}">Sobrevuelo</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <div class="row mb-3 align-items-center">
            <!-- Columna del botón -->
            <div class="col-auto">
                <button class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalSobreVuelo">
                    <i class="fa-solid fa-plus"></i> Nuevo Sobrevuelo
                </button>
            </div>

            <!-- Columna del input de fecha -->
            <div class="col-auto">
                <input type="date" id="fechaFiltro" class="form-control"
                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
        </div>

        <div class="card-body">
            <table id="sobreVueloDataTable" class="table" style="width:100%">
                <thead>
                    <tr>
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

    @include('ras.modal_sobrevuelo')

    {{-- Enviar el valor de fecha a la modal --}}
    <script>
        document.querySelector('.btn-twitter').addEventListener('click', function() {
            const valorFecha = document.getElementById('fechaFiltro').value;
            document.getElementById('fecha').value = valorFecha;
        });
    </script>

    <script>
        $(document).ready(function() {
            // Guardamos la instancia en "table"
            let table = $('#sobreVueloDataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('registro-sobrevuelo.data') }}",
                    data: function(d) {
                        // Enviamos el valor del input fecha al servidor
                        d.fecha = $('#fechaFiltro').val();
                    }
                },
                pageLength: 25,
                columns: [{
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
                            const editarBtn = `
                            <a href="#" class="btn btn-sm btn-primary btn-editar-sobrevuelo"
                                data-id="${row.id}"
                                data-fecha="${row.fecha}"
                                data-razon_social="${row.razon_social}"
                                data-distancia="${row.distancia}"
                                data-origen="${row.origen}"
                                data-destino="${row.destino}"
                                data-responsable="${row.responsable}"
                                data-cliente="${row.cliente}"
                                data-matricula="${row.matricula}"
                                data-modelo="${row.modelo}"
                                data-version="${row.version}"
                                data-peso="${row.peso}"
                                data-peso_dimension="${row.peso_dimension}"
                                data-origen_oaci="${row.origen_oaci}"
                                data-destino_oaci="${row.destino_oaci}"
                                data-vuelo="${row.vuelo}"
                                data-control1="${row.control1}"
                                data-control2="${row.control2}"
                                data-ruta="${row.ruta}"
                                data-autorizacion="${row.autorizacion}"
                                data-fl_fijo_entrada="${row.fl_fijo_entrada}"
                                data-fijo1="${row.fijo1}"
                                data-fijo2="${row.fijo2}"
                                data-fijo3="${row.fijo3}"
                                data-fl_fijo_salida="${row.fl_fijo_salida}"
                                data-hora_fijo1="${row.hora_fijo1}"
                                data-hora_fijo2="${row.hora_fijo2}"
                                data-hora_fijo3="${row.hora_fijo3}"
                                data-fl_fijo1="${row.fl_fijo1}"
                                data-fl_fijo2="${row.fl_fijo2}"
                                data-fl_fijo3="${row.fl_fijo3}"
                                data-observaciones="${row.observaciones}"
                                data-id_proceso_vuelo="${row.id_proceso_vuelo}"
                                data-activo="${row.activo}"
                                data-fk_user="${row.fk_user}"
                                data-created_at="${row.created_at}"
                                data-updated_at="${row.updated_at}"
                                data-aprobado="${row.aprobado}"
                                data-texto_rechazo="${row.texto_rechazo}"
                                data-leido="${row.leido}"
                                data-origen_cliente="${row.origen_cliente}"
                                data-origen_matricula="${row.origen_matricula}"
                                data-ruta_vuelo="${row.ruta_vuelo}"
                                data-primer_punto="${row.primer_punto}"
                                data-ultimo_punto="${row.ultimo_punto}"
                                data-observacion_otro="${row.observacion_otro}"
                                data-ruta_dct="${row.ruta_dct}"
                                title="Editar">
                                <i class="fa-solid fa-pen-to-square fa-lg"></i>
                            </a>`;

                            const eliminarBtn = `
                            <a href="#" class="btn btn-sm btn-danger btn-eliminar-sobrevuelo"
                                data-id="${row.id}" title="Eliminar">
                                <i class="fa-solid fa-trash fa-lg"></i>
                            </a>`;

                            return editarBtn + ' ' + eliminarBtn;
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

            // 🔹 Esto refresca la tabla al cambiar la fecha
            $('#fechaFiltro').on('change', function() {
                // Copiar el valor de #fechaFiltro al input #fecha
                $('#fecha').val($(this).val());

                // Recargar la tabla filtrando por la nueva fecha
                table.ajax.reload();
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-editar-sobrevuelo', function(e) {
                e.preventDefault();
                const button = $(this);

                // Abrir modal
                $('#addNewCardModalSobreVuelo').modal('show');

                // Campo oculto ID
                $('#registro_id').val(button.data('id'));

                // CLIENTE
                $('#fecha').val(button.data('fecha'));
                $('#razon_social').val(button.data('razon_social'));
                $('#distancia').val(button.data('distancia'));
                $('#origen').val(button.data('origen'));
                $('#destino').val(button.data('destino'));

                // VUELO
                $('#vuelo').val(button.data('vuelo'));
                $('#responsable').val(button.data('responsable'));
                $('#cliente').val(button.data('cliente'));
                $('#origen_cliente').val(button.data('origen_cliente'));
                $('#matricula').val(button.data('matricula'));
                $('#origen_matricula').val(button.data('origen_matricula'));
                $('#modelo').val(button.data('modelo'));
                $('#version').val(button.data('version'));
                $('#peso').val(button.data('peso'));
                $('#origen_oaci').val(button.data('origen_oaci'));
                $('#destino_oaci').val(button.data('destino_oaci'));
                $('#control1').val(button.data('control1'));
                $('#control2').val(button.data('control2'));
                $('#ruta').val(button.data('ruta'));

                const rutaDctValor = button.data('ruta_dct');
                $('#toggleDCT').prop('checked', rutaDctValor === 1);

                const valorAutorizacion = button.data('autorizacion');

                // Primero, verificamos si ya existe la opción en el select
                if (!$('#autorizacion option[value="' + valorAutorizacion + '"]').length) {
                    // Si no existe, la agregamos manualmente
                    $('#autorizacion').prepend(
                        $('<option>', {
                            value: valorAutorizacion,
                            text: valorAutorizacion,
                            selected: true
                        })
                    );
                } else {
                    // Si ya existe, simplemente la seleccionamos
                    $('#autorizacion').val(valorAutorizacion).change();
                }

                // RVSM
                $('#fl_fijo_entrada').val(button.data('fl_fijo_entrada'));
                $('#fl_fijo_salida').val(button.data('fl_fijo_salida'));

                $('#fijo1').val(button.data('fijo1'));
                $('#hora_fijo1').val(button.data('hora_fijo1'));
                $('#fl_fijo1').val(button.data('fl_fijo1'));

                $('#fijo2').val(button.data('fijo2'));
                $('#hora_fijo2').val(button.data('hora_fijo2'));
                $('#fl_fijo2').val(button.data('fl_fijo2'));

                $('#fijo3').val(button.data('fijo3'));
                $('#hora_fijo3').val(button.data('hora_fijo3'));
                $('#fl_fijo3').val(button.data('fl_fijo3'));

                // Campos ocultos adicionales
                $('#id_proceso_vuelo').val(button.data('id_proceso_vuelo'));
                $('#ruta_vuelo').val(button.data('ruta_vuelo'));
                $('#primer_punto').val(button.data('primer_punto'));
                $('#ultimo_punto').val(button.data('ultimo_punto'));

                // Observación principal
                $('#observacion').val(button.data('observaciones')).trigger('change');

                // Si la observación es "Otro", y tienes un campo adicional
                if (button.data('observaciones') === 'Otro' && button.data('observacion_otro')) {
                    $('#observacion_otro').val(button.data('observacion_otro'));
                }

            });
        });
    </script>

    <script>
        $(document).on('click', '.btn-eliminar-sobrevuelo', function(e) {
            e.preventDefault();

            const button = $(this);
            const id = button.data('id');
            if (!id) return;

            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción eliminará el sobrevuelo y no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/registro-sobrevuelo/baja/${id}`,
                        type: 'GET',
                        success: function(response) {

                            // Actualizar la Tabla
                            $('#sobreVueloDataTable').DataTable().ajax.reload(null, false);

                            Swal.fire({
                                title: "¡Eliminado!",
                                text: response.success ??
                                    "El sobrevuelo fue eliminado correctamente.",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });

                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error",
                                text: "No se pudo eliminar el sobrevuelo.",
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
