@extends('layouts.app')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <style>
        .badge-lg {
            font-size: 1rem;
            /* Tamaño estándar, ajusta según necesites */
            padding: 0.5em 0.8em;
            /* Más relleno para mejor aspecto */
            font-weight: 600;
            /* Texto un poco más grueso */
        }

        /* Opcional: ajustes específicos para cada tipo de badge */
        .badge.bg-success.badge-lg {
            /* Estilos adicionales para el badge "Leído" */
        }

        .badge.bg-primary.badge-lg {
            /* Estilos adicionales para el badge "Registrado" */
        }

        #SobreVuelo td {
            white-space: nowrap;
            /* evita que el texto se corte en varias líneas */
        }
    </style>

    <div class="px-lg py-lg bg-card">

        <div class="card-body">
            <table id="SobreVuelo" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 150px;">Acción</th>
                        <th>Fecha AMHS</th>
                        <th>Fecha Impresión</th>
                        <th>Autorización</th>
                        <th>Vuelo</th>
                        <th>Tipo</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Registro</th>
                        <th>EOBT</th>
                        <th>Linea Aérea</th>
                        <th>Puntos y Estimados</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <script>
        $('#SobreVuelo').DataTable({
            scrollX: true, // permite scroll horizontal
            autoWidth: false, // desactiva ancho automático excesivo
            responsive: true, // tabla adaptable
            columnDefs: [{
                    targets: 0,
                    width: '1%'
                }, // número de fila muy estrecho
                {
                    targets: 1,
                    width: '1%'
                } // acciones muy estrecho
            ]
        });
    </script>

    <script>
        let tablaSobrevuelos;

        function cargarTablaSobrevuelos() {
            tablaSobrevuelos = $('#SobreVuelo').DataTable({
                destroy: true, // Destruye instancia previa si existe
                processing: true,
                serverSide: false,
                ajax: '{{ route('comunicacion.getSobrevuelos') }}',
                columns: [{
                        data: null,
                        name: 'index',
                        render: (data, type, row, meta) => meta.row + 1
                    },

                    {
                        data: null,
                        name: 'acciones',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            let id = row.id_amhs;
                            let html = '';

                            if (row.estado_comunicacion === 1) {
                                html += `
                        <button class="btn btn-twitter btn-icon-sm" id="com_leido_${id}" 
                            title="Lectura" onclick="actualizarEstadoAMHS(${id}, 1)" style="display:none;">
                            <i class="fas fa-eye"></i>
                        </button>
                        <span class="badge bg-success me-2 badge-lg" id="badge_leido_${id}">Leído</span>
                        <button class="btn btn-facebook btn-icon-sm" id="com_registro_${id}" 
                            title="Registrar" onclick="actualizarEstadoAMHS(${id}, 3)">
                            <i class="fas fa-save"></i>
                        </button>
                        <span class="badge bg-primary badge-lg" id="badge_registro_${id}" style="display:none;">Registrado</span>
                    `;
                            } else if (row.estado_comunicacion === 3) {
                                html += `
                        <button class="btn btn-twitter btn-icon-sm" id="com_leido_${id}" 
                            title="Lectura" onclick="actualizarEstadoAMHS(${id}, 1)">
                            <i class="fas fa-eye"></i>
                        </button>
                        <span class="badge bg-success me-2 badge-lg" id="badge_leido_${id}" style="display:none;">Leído</span>
                        <button class="btn btn-facebook btn-icon-sm" id="com_registro_${id}" 
                            title="Registrar" onclick="actualizarEstadoAMHS(${id}, 3)" style="display:none;">
                            <i class="fas fa-save"></i>
                        </button>
                        <span class="badge bg-primary badge-lg" id="badge_registro_${id}">Registrado</span>
                    `;
                            } else {
                                html += `
                        <button class="btn btn-twitter btn-icon-sm" id="com_leido_${id}" 
                            title="Lectura" onclick="actualizarEstadoAMHS(${id}, 1)">
                            <i class="fas fa-eye"></i>
                        </button>
                        <span class="badge bg-success me-2 badge-lg" id="badge_leido_${id}" style="display:none;">Leído</span>
                        <button class="btn btn-facebook btn-icon-sm" id="com_registro_${id}" 
                            title="Registrar" onclick="actualizarEstadoAMHS(${id}, 3)">
                            <i class="fas fa-save"></i>
                        </button>
                        <span class="badge bg-primary badge-lg" id="badge_registro_${id}" style="display:none;">Registrado</span>
                    `;
                            }

                            return html;
                        }
                    },

                    {
                        data: null,
                        render: function(data, type, row) {
                            if (!row.fecha || !row.hora) return '';

                            // Día: últimos 2 caracteres de la fecha
                            let dd = row.fecha.slice(-2);

                            // Hora: quitar ":" de HH:MM
                            let hhmm = row.hora.replace(':', '').slice(0, 4);

                            return `${dd} ${hhmm}`;
                        }
                    },

                    {
                        data: 'fecha_impresion',
                        render: function(data, type, row) {
                            if (!data) return '';

                            let fechaObj = new Date(data);
                            if (isNaN(fechaObj)) return data; // Si no se puede convertir, devuelve tal cual

                            let dd = String(fechaObj.getDate()).padStart(2, '0');
                            let hh = String(fechaObj.getHours()).padStart(2, '0');
                            let mm = String(fechaObj.getMinutes()).padStart(2, '0');

                            // Para DataTables: si es para ordenar, devolver la fecha completa ISO
                            if (type === 'sort' || type === 'type') {
                                return fechaObj.toISOString();
                            }

                            // Para mostrar: DD HHMM
                            return `${dd} ${hh}${mm}`;
                        }
                    },

                    {
                        data: 'ha'
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
                        data: 'reg'
                    },
                    {
                        data: 'eobt'
                    },
                    {
                        data: 'linea_aerea'
                    },
                    {
                        data: null,
                        name: 'puntos_estimados',
                        render: function(data, type, row) {
                            let rutas = [],
                                puntos = [],
                                estimados = [],
                                seleccionados = [];
                            try {
                                rutas = row.fpl_ruta ? JSON.parse(row.fpl_ruta) : [];
                            } catch (e) {
                                console.error('Error parsing fpl_ruta:', e);
                            }
                            try {
                                puntos = row.fpl_punto ? JSON.parse(row.fpl_punto) : [];
                            } catch (e) {
                                console.error('Error parsing fpl_punto:', e);
                            }
                            try {
                                estimados = row.est_array ? JSON.parse(row.est_array) : [];
                            } catch (e) {
                                console.error('Error parsing est_array:', e);
                            }
                            try {
                                seleccionados = row.fpl_punto_seleccionado ? JSON.parse(row
                                    .fpl_punto_seleccionado).map(v => parseInt(v)) : [];
                            } catch (e) {
                                console.error('Error parsing fpl_punto_seleccionado:', e);
                            }

                            if (puntos.length === 0 || estimados.length === 0 || seleccionados.length === 0)
                                return '';

                            let html = '<table class="table table-sm table-bordered mb-0">';
                            html +=
                                '<thead style="background-color: #f2f2f2;"><tr><th>Ruta</th><th>Puntos</th><th>Estimados</th></tr></thead><tbody>';

                            for (let i = 0; i < puntos.length; i++) {
                                if (seleccionados[i] === 1) {
                                    html +=
                                        `<tr><td>${rutas[i]}</td><td>${puntos[i]}</td><td>${estimados[i] || ''}</td></tr>`;
                                }
                            }

                            html += '</tbody></table>';
                            return html;
                        }
                    }
                ],
                createdRow: function(row, data, dataIndex) {
                    if (data.estado_comunicacion === 1) {
                        $(row).css('background-color', '#d4edda'); // Verde clarito
                    } else if (data.estado_comunicacion === 3) {
                        $(row).css('background-color', '#d1ecf1'); // Celeste clarito
                    }
                }

            });
        }

        function actualizarEstadoAMHS(id_amhs, estado) {
            $.ajax({
                url: '{{ route('comunicacion.actualizarEstado') }}',
                method: 'POST',
                data: {
                    id_amhs: id_amhs,
                    estado: estado,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Estado actualizado:', response);

                    const $btnLeido = $(`#com_leido_${id_amhs}`);
                    const $btnRegistro = $(`#com_registro_${id_amhs}`);
                    const $badgeLeido = $(`#badge_leido_${id_amhs}`);
                    const $badgeRegistro = $(`#badge_registro_${id_amhs}`);

                    // Buscar la fila <tr> que contiene estos elementos
                    const $row = $btnLeido.closest('tr');

                    if (estado === 1) {
                        // Mostrar badge Leído y botón Registrar
                        $badgeLeido.show();
                        $btnRegistro.show();

                        // Ocultar badge Registrado y botón Lectura
                        $badgeRegistro.hide();
                        $btnLeido.hide();

                        // Cambiar color de fondo a verde clarito
                        $row.css('background-color', '#d4edda');
                    } else if (estado === 3) {
                        // Mostrar badge Registrado y botón Lectura
                        $badgeRegistro.show();
                        $btnLeido.show();

                        // Ocultar badge Leído y botón Registrar
                        $badgeLeido.hide();
                        $btnRegistro.hide();

                        // Cambiar color de fondo a celeste clarito
                        $row.css('background-color', '#d1ecf1');
                    }
                },
                error: function(xhr) {
                    console.error('Error al actualizar estado:', xhr.responseText);
                    alert('Ocurrió un error al actualizar el estado.');
                }
            });
        }


        function recargarDatosCada(segundos) {
            setInterval(function() {
                if (tablaSobrevuelos) {
                    tablaSobrevuelos.ajax.reload(null, false); // no reinicia paginación
                    console.log(`[${new Date().toLocaleTimeString()}] Tabla SobreVuelo recargada.`);
                }
            }, segundos * 1000);
        }

        $(document).ready(function() {
            cargarTablaSobrevuelos();
            recargarDatosCada(60); // recarga cada minuto
        });
    </script>
@endsection
