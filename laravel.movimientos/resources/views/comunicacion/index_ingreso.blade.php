@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>


@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <h4>AUTORIZACIÓN {{ $tipo }}</h4>

        <br />

        <button id="btnNuevoAutorizacion" class="btn btn-twitter" data-toggle="modal" data-target="#addNewCardModalAutorizacion"
            data-nuevo="1">
            <i class="fa-solid fa-plus"></i> Nueva Autorización
        </button>

        <div class="card-body" style="overflow-x: auto;">
            <table id="autorizacionDataTable" class="table" style="width:100%; font-size: 12px;">
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
                        <th>Usuario</th>
                        <th style="width: 200px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>

    @include('comunicacion.modal_autorizacion')
    @include('comunicacion.modal_autorizacion_detalles')
@endsection

<script>
    function limitarTexto(texto, max = 70) {
        if (!texto) return '';
        return texto.length > max ? texto.substring(0, max - 3) + '...' : texto;
    }

    function formatearNumero(numero) {
        if (!numero) return '0';
        return Number(numero).toLocaleString('es-BO');
    }

    $(document).ready(function() {
        $('#autorizacionDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('/comunicacion/autorizacion_data') }}/" + @json($tipo),
                type: "GET"
            },
            pageLength: 25,
            columns: [{
                    data: 'numero_autorizacion',
                    render: function(data, type, row) {
                        if (row.id_padre !== null) {
                            return `${data} <span class="badge badge-warning text-white font-weight-bold">ENMIENDA ${row.n_enmienda}</span>`;
                        }
                        return data;
                    }
                },
                {
                    data: 'fecha_autorizacion',
                },
                {
                    data: 'razon_social',
                    render: function(data) {
                        return limitarTexto(data, 20);
                    }
                },
                {
                    data: 'tipo_aeronave',
                    render: function(data) {
                        return limitarTexto(data, 20);
                    }
                },
                {
                    data: 'matricula',
                    render: function(data) {
                        return limitarTexto(data, 20);
                    }
                },
                {
                    data: 'peso',
                    render: function(data, type, row) {
                        return `${row.peso} (${row.medida_peso})`;
                    }
                },
                {
                    data: 'tiempo_validez_inicio',
                },
                {
                    data: 'tiempo_validez_fin',
                },
                {
                    data: 'usuario',
                },
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        const detalleBtn = `
                            <button class="btn btn-info btn-icon rounded-circle btn-detalles-autorizacion"
                                data-id='${data.id}'
                                data-numero_autorizacion='${data.numero_autorizacion}'
                                data-fecha_autorizacion='${data.fecha_autorizacion}'
                                data-razon_social='${data.razon_social}'
                                data-tipo_aeronave='${data.tipo_aeronave}'
                                data-matricula='${data.matricula}'
                                data-pais='${data.pais}'
                                data-peso='${data.peso}'
                                data-piloto='${data.piloto}'
                                data-tiempo_validez_inicio='${data.tiempo_validez_inicio}'
                                data-tiempo_validez_fin='${data.tiempo_validez_fin}'
                                data-ultimo_aeropuerto='${data.ultimo_aeropuerto}'
                                data-aeropuerto_entrada='${data.aeropuerto_entrada}'
                                data-aeropuerto_entrada_alterno='${data.aeropuerto_entrada_alterno}'
                                data-aeropuerto_salida='${data.aeropuerto_salida}'
                                data-aeropuerto_salida_alterno='${data.aeropuerto_salida_alterno}'
                                data-objeto_vuelo='${data.objeto_vuelo}'
                                data-observaciones='${data.observaciones}'
                                data-ruta='${data.ruta}'
                                data-medida_peso='${data.medida_peso}'
                                data-tipo_autorizacion='${data.tipo_autorizacion}'
                                data-tipo_array='${data.tipo_array}'
                                data-matricula_array='${data.matricula_array}'
                                data-peso_array='${data.peso_array}'
                                data-autorizacion_file='${data.autorizacion_file}'
                                data-adjunto_file='${data.adjunto_file}'
                                data-id_padre='${data.id_padre}'
                                title="Ver detalles">
                                <i class="fa-solid fa-eye"></i>
                            </button>`;

                        const editarBtn = `
                            <button class="btn btn-primary btn-icon rounded-circle btn-editar-autorizacion"
                                data-id='${data.id}'
                                data-numero_autorizacion='${data.numero_autorizacion}'
                                data-fecha_autorizacion='${data.fecha_autorizacion}'
                                data-razon_social='${data.razon_social}'
                                data-tipo_aeronave='${data.tipo_aeronave}'
                                data-matricula='${data.matricula}'
                                data-pais='${data.pais}'
                                data-peso='${data.peso}'
                                data-piloto='${data.piloto}'
                                data-tiempo_validez_inicio='${data.tiempo_validez_inicio}'
                                data-tiempo_validez_fin='${data.tiempo_validez_fin}'
                                data-ultimo_aeropuerto='${data.ultimo_aeropuerto}'
                                data-aeropuerto_entrada='${data.aeropuerto_entrada}'
                                data-aeropuerto_entrada_alterno='${data.aeropuerto_entrada_alterno}'
                                data-aeropuerto_salida='${data.aeropuerto_salida}'
                                data-aeropuerto_salida_alterno='${data.aeropuerto_salida_alterno}'
                                data-objeto_vuelo='${data.objeto_vuelo}'
                                data-observaciones='${data.observaciones}'
                                data-ruta='${data.ruta}'
                                data-medida_peso='${data.medida_peso}'
                                data-tipo_autorizacion='${data.tipo_autorizacion}'
                                data-tipo_array='${data.tipo_array}'
                                data-matricula_array='${data.matricula_array}'
                                data-peso_array='${data.peso_array}'
                                data-autorizacion_file='${data.autorizacion_file}'
                                data-adjunto_file='${data.adjunto_file}'
                                data-id_padre='${data.id_padre}'
                                title="Editar">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>`;

                        const enmiendaBtn = `
                            <button class="btn btn-warning btn-icon rounded-circle btn-enmienda-autorizacion"
                                title="Enmienda">
                                <i class="fa-solid fa-e"></i>
                            </button>`;

                        const eliminarBtn = `
                            <button class="btn btn-danger btn-icon rounded-circle btn-eliminar-autorizacion"
                                data-id="${data.id}" title="Eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </button>`;


                        let btns = '';

                        if (data.id_padre === null) {
                            // Es padre → incluye todos los botones
                            btns = `${detalleBtn} ${editarBtn} ${enmiendaBtn} ${eliminarBtn}`;
                        } else {
                            // Es enmienda → sin el botón de enmienda
                            btns = `${editarBtn} ${eliminarBtn}`;
                        }

                        return btns;
                    }
                }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-editar-autorizacion', function(e) {
            e.preventDefault();

            const button = $(this);

            // 🔹 Limpiar todos los campos del formulario antes de cargar datos
            $('#AutorizacionForm')[0].reset();

            // Mostrar modal
            $('#addNewCardModalAutorizacion').modal('show');

            const tipoAutorizacion = button.data('tipo_autorizacion') ?? '';

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
            $('#aeropuerto_entrada').val(button.data('aeropuerto_entrada'));
            $('#aeropuerto_entrada_alterno').val(button.data('aeropuerto_entrada_alterno'));
            $('#aeropuerto_salida').val(button.data('aeropuerto_salida'));
            $('#aeropuerto_salida_alterno').val(button.data('aeropuerto_salida_alterno'));
            $('#objeto_vuelo').val(button.data('objeto_vuelo'));
            $('#ruta').val(button.data('ruta'));
            $('#observaciones').val(button.data('observaciones'));
            $('#id_padre').val(button.data('id_padre'));
            $('#enmienda').val(0);

            // Archivos ya guardados (en caso de edición)
            const autorizacionFile = button.data('autorizacion_file') || '';
            const adjuntoFiles = button.data('adjunto_file') || [];

            // Mostrar archivos de autorización
            if (autorizacionFile) {
                let files = [];

                // Parsear si viene como string JSON
                if (typeof autorizacionFile === 'string') {
                    try {
                        files = JSON.parse(autorizacionFile);
                    } catch (e) {
                        // Si no es JSON, puede que sea solo una ruta única
                        files = [autorizacionFile];
                    }
                } else if (Array.isArray(autorizacionFile)) {
                    files = autorizacionFile;
                }

                // Construir lista HTML
                if (files.length > 0) {
                    let html = '<div>Archivos actuales:</div><ul class="list-unstyled mb-0">';
                    files.forEach((path, index) => {
                        html += `<li>
                        <a href="/${path}" target="_blank">
                            PDF ${index + 1}
                        </a>
                     </li>`;
                    });
                    html += '</ul>';

                    $('#autorizacion_pdf_info').html(html).show();
                    $('#autorizacion_pdf').removeAttr('required'); // no forzar si ya hay archivos
                } else {
                    $('#autorizacion_pdf_info').hide().empty();
                    $('#autorizacion_pdf').attr('required', true);
                }
            } else {
                $('#autorizacion_pdf_info').hide().empty();
                $('#autorizacion_pdf').attr('required', true);
            }

            // Si viene como string JSON desde PHP, lo parseamos
            let adjuntoArray = [];
            if (typeof adjuntoFiles === 'string') {
                try {
                    adjuntoArray = JSON.parse(adjuntoFiles) || [];
                } catch {
                    adjuntoArray = adjuntoFiles ? [adjuntoFiles] : [];
                }
            } else if (Array.isArray(adjuntoFiles)) {
                adjuntoArray = adjuntoFiles;
            }

            // Generar lista de enlaces
            let adjuntoLinksHtml = '';
            if (adjuntoArray.length > 0) {
                adjuntoArray.forEach((filePath, i) => {
                    adjuntoLinksHtml += `
            <small class="d-block mt-1">
                PDF ${i + 1}: <a href="/${filePath}" target="_blank">ver</a>
            </small>
            `;
                });
            }

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

            let matricula = (button.data('matricula') || '').toString();
            let valor = '';

            // Captura lo que sigue a "ALT." (o "ALT") hasta espacio o "/"
            let match = matricula.match(/ALT\.?\s*([^\s\/]+)/i);
            if (match) {
                valor = match[1]; // ej: "MAT1 ALT. MAT2/MAT3" => "MAT2"
            }

            // Llenar filas dinámicamente
            tipoArray.forEach((tipo, index) => {
                const peso = pesoArray[index] ?? '';
                const matricula = matriculaArray[index] ?? '';

                const row = `
                            <tr>
                                <td><input type="text" name="tipo_aeronave_${index}" class="form-control text-uppercase" value="${tipo}"></td>
                                <td><input type="text" name="peso_${index}" class="form-control" step="0.01" value="${peso}"></td>
                                <td><input type="text" name="matricula_${index}" class="form-control text-uppercase" value="${matricula}"></td>
                                <td>
                                    ${index === 0 ? `
                                    <input type="text" name="matricula_alt" class="form-control text-uppercase" value="${valor}">
                                    ` : ''}
                                </td>
                                <td>
                                    ${index === 0 ? `
                                        <input type="file" name="adjunto_pdf[]" id="adjunto_pdf" multiple accept="application/pdf">
                                        <small class="text-muted">Solo archivos PDF, máximo 1 MB c/u</small>
                                        <span id="adjunto_pdf_error" class="text-danger d-block mt-1" style="display:none;"></span>
                                        <div id="adjunto_pdf_info" class="text-info mt-1">
                                            ${adjuntoLinksHtml || ''}
                                        </div>
                                    ` : ''}
                                </td>
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
    $(document).on('click', '.btn-enmienda-autorizacion', function(e) {
        e.preventDefault();

        // Buscar el botón editar de la misma fila y simular el click
        const btnEditar = $(this).closest('tr').find('.btn-editar-autorizacion').get(0);
        if (btnEditar) {
            btnEditar.click();
        }

        $('#enmienda').val(1);
        $('#autorizacion_pdf').attr('required', true);
    });
</script>

<script>
    function escapeHtml(s) {
        if (s == null) return '';
        return String(s)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;')
            .replace(/>/g, '&gt;').replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    $(document).on('click', '.btn-detalles-autorizacion', function(e) {
        e.preventDefault();
        const btn = $(this);

        // Mostrar datos en el modal
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
        $('#detalle_aeropuerto_entrada').text(btn.data('aeropuerto_entrada'));
        $('#detalle_aeropuerto_entrada_alterno').text(btn.data('aeropuerto_entrada_alterno'));
        $('#detalle_aeropuerto_salida').text(btn.data('aeropuerto_salida'));
        $('#detalle_aeropuerto_salida_alterno').text(btn.data('aeropuerto_salida_alterno'));
        $('#detalle_objeto_vuelo').text(btn.data('objeto_vuelo'));
        $('#detalle_ruta').text(btn.data('ruta'));
        $('#detalle_observaciones').text(btn.data('observaciones'));

        // Mostrar PDFs
        let pdfFiles = btn.data('autorizacion_file');
        if (pdfFiles) {
            try {
                // Si viene como JSON, convertir a array
                if (typeof pdfFiles === 'string') {
                    pdfFiles = JSON.parse(pdfFiles);
                }
            } catch (e) {
                // Si falla el parseo, convertir a array con un solo elemento
                pdfFiles = [pdfFiles];
            }

            // Aseguramos que sea un array
            if (!Array.isArray(pdfFiles)) {
                pdfFiles = [pdfFiles];
            }

            // Generar lista de enlaces
            let linksHtml = pdfFiles.map(file => {
                const fileName = file.split('/').pop();
                return `
            <a href="/${file}" target="_blank" style="text-decoration:none; display:inline-flex; align-items:center; gap:5px; margin-right:10px;">
                <i class="fas fa-file-pdf" style="color:red; font-size:1.5rem;"></i> Ver Adjunto
            </a>
            `;
            }).join('');

            $('#detalle_pdf_autorizacion').html(linksHtml);
        } else {
            $('#detalle_pdf_autorizacion').html('<span style="color:gray;">No hay PDF disponible</span>');
        }

        let adjuntoFiles = btn.data('adjunto_file');
        if (adjuntoFiles) {
            try {
                // Si viene como JSON, convertir a array
                if (typeof adjuntoFiles === 'string') {
                    adjuntoFiles = JSON.parse(adjuntoFiles);
                }
            } catch (e) {
                // Si falla el parseo, meter como único elemento
                adjuntoFiles = [adjuntoFiles];
            }

            // Aseguramos que sea un array
            if (!Array.isArray(adjuntoFiles)) {
                adjuntoFiles = [adjuntoFiles];
            }

            // Generar lista de enlaces
            let linksHtml = adjuntoFiles.map(file => {
                const fileName = file.split('/').pop();
                return `
            <a href="/${file}" target="_blank" style="text-decoration:none; display:inline-flex; align-items:center; gap:5px; margin-right:10px;">
                <i class="fas fa-file-pdf" style="color:red; font-size:1.5rem;"></i> Ver adjunto
            </a>
        `;
            }).join('');

            $('#detalle_pdf_adjunto').html(linksHtml);
        } else {
            $('#detalle_pdf_adjunto').html('<span style="color:gray;">No hay PDF disponible</span>');
        }

        // Enviar datos al controlador enmienda (POST)
        $.ajax({
            url: '{{ route('comunicacion.enmienda') }}',
            method: 'POST',
            data: {
                id: btn.data('id'),
                numero_autorizacion: btn.data('numero_autorizacion'),
                fecha_autorizacion: btn.data('fecha_autorizacion'),
                razon_social: btn.data('razon_social'),
                tipo_aeronave: btn.data('tipo_aeronave'),
                matricula: btn.data('matricula'),
                pais: btn.data('pais'),
                peso: btn.data('peso'),
                medida_peso: btn.data('medida_peso'),
                piloto: btn.data('piloto'),
                tiempo_validez_inicio: btn.data('tiempo_validez_inicio'),
                tiempo_validez_fin: btn.data('tiempo_validez_fin'),
                ultimo_aeropuerto: btn.data('ultimo_aeropuerto'),
                aeropuerto_entrada: btn.data('aeropuerto_entrada'),
                aeropuerto_entrada_alterno: btn.data('aeropuerto_entrada_alterno'),
                aeropuerto_salida: btn.data('aeropuerto_salida'),
                aeropuerto_salida_alterno: btn.data('aeropuerto_salida_alterno'),
                tipo_autorizacion: btn.data('tipo_autorizacion'),
                objeto_vuelo: btn.data('objeto_vuelo'),
                observaciones: btn.data('observaciones'),
                ruta: btn.data('ruta'),
                autorizacion_file: btn.data('autorizacion_file'),
                adjunto_file: btn.data('adjunto_file'),
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                var $box = $('#detalle_enmienda');

                if (!response || response.success === false) {
                    $box.html('<span class="text-danger">No se encontraron registros.</span>');
                    return;
                }

                var tiene = (response.llave_enmienda === 1 || response.llave_enmienda === '1' ||
                    response.llave_enmienda === true);
                if (!tiene) {
                    $box.html('<span class="badge bg-success">Sin enmienda</span>');
                    return;
                }

                // Helpers render
                var escapeHtml = function(s) {
                    if (s == null) return '';
                    return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;')
                        .replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');
                };
                var short = function(v) {
                    return v ? String(v).substring(0, 10) : '';
                };
                var isBlank = function(v) {
                    return v == null || (typeof v === 'string' && v.trim() === '');
                };
                var isFileField = function(k) {
                    return k === 'autorizacion_file' || k === 'adjunto_file';
                };
                var toHref = function(v) {
                    if (isBlank(v)) return '';
                    var s = String(v);
                    if (/^https?:\/\//i.test(s)) return s;
                    s = s.replace(/^\/+/, ''); // evita // al inicio
                    return '/' + s; // 1 sola barra
                };

                var labels = {
                    numero_autorizacion: 'Número de autorización',
                    fecha_autorizacion: 'Fecha autorización',
                    razon_social: 'Razón social',
                    tipo_aeronave: 'Tipo aeronave',
                    matricula: 'Matrícula',
                    pais: 'País',
                    peso: 'Peso',
                    medida_peso: 'Unidad de peso',
                    piloto: 'Piloto',
                    tiempo_validez_inicio: 'Validez inicio',
                    tiempo_validez_fin: 'Validez fin',
                    ultimo_aeropuerto: 'Último aeropuerto',
                    aeropuerto_entrada: 'Aeropuerto entrada',
                    aeropuerto_entrada_alterno: 'Entrada alterno',
                    aeropuerto_salida: 'Aeropuerto salida',
                    aeropuerto_salida_alterno: 'Salida alterno',
                    tipo_autorizacion: 'Tipo de autorización',
                    objeto_vuelo: 'Objeto de vuelo',
                    observaciones: 'Observaciones',
                    ruta: 'Ruta',
                    autorizacion_file: 'Archivo enmienda',
                    adjunto_file: 'Archivo adjunto'
                };
                var label = function(k) {
                    return labels[k] || k;
                };

                var diffsArr = response.diffs_por_enmienda || [];
                var enmiendas = response.enmiendas || [];
                var total = enmiendas.length;

                if (!diffsArr.length) {
                    $box.html(
                        '<div><span class="badge bg-warning text-dark">Con enmienda</span> ' +
                        '<small>(' + total + ' registro(s) de enmienda)</small></div>' +
                        '<small class="text-muted d-block mt-2">Sin cambios detectados en los campos comparados.</small>'
                    );
                    return;
                }

                var html = '';
                html += '<div><span class="badge bg-warning text-dark">Con enmienda</span> ' +
                    '<small>(' + total + ' registro(s) de enmienda)</small></div>';

                diffsArr.forEach(function(item, idx) {
                    var encabezado = 'Enmienda #' + (idx + 1);
                    var meta = enmiendas.find(function(e) {
                        return e.id === item.id_enmienda;
                    });
                    if (meta && meta.created_at) encabezado += ' — ' + escapeHtml(String(
                        meta.created_at).slice(0, 19));

                    var changes = item.changes || {};
                    var keys = Object.keys(changes).filter(function(k) {
                        var v = changes[k];
                        if (['fecha_autorizacion', 'tiempo_validez_inicio',
                                'tiempo_validez_fin'
                            ].includes(k)) v = short(v);
                        return !isBlank(v);
                    });

                    var lis = keys.map(function(k) {
                        var v = changes[k];

                        if (['fecha_autorizacion', 'tiempo_validez_inicio',
                                'tiempo_validez_fin'
                            ].includes(k)) {
                            v = short(v);
                        }

                        if (isFileField(k)) {
                            if (isBlank(v)) {
                                return '<li><strong>' + escapeHtml(label(k)) +
                                    ':</strong> <em class="text-muted">Sin archivo</em></li>';
                            }

                            var archivos = [];
                            try {
                                var parsed = JSON.parse(v);
                                if (Array.isArray(parsed)) {
                                    archivos = parsed;
                                } else if (parsed) {
                                    archivos = [parsed];
                                }
                            } catch (e) {
                                archivos = [v]; // fallback si no es JSON válido
                            }

                            if (!archivos.length) {
                                return '<li><strong>' + escapeHtml(label(k)) +
                                    ':</strong> <em class="text-muted">Sin archivo</em></li>';
                            }

                            var links = archivos.map(function(file) {
                                if (isBlank(file)) return '';
                                var href = toHref(file);
                                var nombre = String(file).split('/').pop();
                                return '<li>' +
                                    '<a href="' + escapeHtml(href) +
                                    '" target="_blank" ' +
                                    'style="text-decoration:none; display:inline-flex; align-items:center; gap:6px;">' +
                                    '<i class="fas fa-file-pdf" style="font-size:1rem;"></i>' +
                                    '<span>Ver Adjunto</span></a></li>';
                            }).join('');

                            return '<li><strong>' + escapeHtml(label(k)) +
                                ':</strong><ul class="mb-0 mt-1">' + links +
                                '</ul></li>';
                        }

                        return '<li><strong>' + escapeHtml(label(k)) +
                            ':</strong> ' + escapeHtml(v) + '</li>';
                    }).join('');

                    if (!lis) {
                        lis =
                            '<li><em class="text-muted">Sin cambios con valor no vacío en esta enmienda.</em></li>';
                    }

                    html += '<div class="mt-2">' +
                        '<div class="fw-bold">' + escapeHtml(encabezado) + '</div>' +
                        '<ul class="mb-0 mt-1">' + lis + '</ul>' +
                        '</div>';
                });

                $box.html(html);
            },

            error: function(xhr) {
                console.error('Error al enviar:', xhr.responseText);
            }
        });

        // Mostrar modal al final
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
                    url: `/comunicacion/autorizacion_baja/${id}`,
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
