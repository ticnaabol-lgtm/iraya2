@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('#') }}">Reportes</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <style>
        .modal-xxl-custom {
            max-width: 95vw;
        }
    </style>

    <div class="px-lg py-lg bg-card">

        <!-- Bootstrap 5 Modal -->
        <form id="formReportePDF">
            <div class="card">
                <div class="card-header">
                    <h2 class="doc-section-title" id="raised">Reporte Por Fecha</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fechaDesde" class="form-label"><strong>De Fecha:</strong></label>
                            <input type="date" class="form-control" id="fechaDesde" name="fecha_desde">
                        </div>
                        <div class="col-md-6">
                            <label for="fechaHasta" class="form-label"><strong>A Fecha:</strong></label>
                            <input type="date" class="form-control" id="fechaHasta" name="fecha_hasta">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 position-relative">
                            <label for="cliente" class="form-label">Cliente:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie" title="Cliente"></i>
                                </span>
                                <input type="text" class="form-control" name="cliente" id="cliente"
                                    placeholder="Cliente" autocomplete="off"
                                    oninput="this.value = this.value.toUpperCase()">
                                <input type="hidden" name="origen_cliente" id="origen_cliente" value="">
                            </div>
                            <ul id="resultado-clientes"
                                class="list-group position-absolute w-100 shadow-sm bg-white border border-secondary rounded"
                                style="display: none; max-height: 200px; overflow-y: auto; z-index: 999;">
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <label for="todos" class="form-label">Todos los Clientes:</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">
                                    {{-- <i class="fa-solid fa-users" title="Todos los Clientes"></i> --}}
                                </span>
                                <div class="form-check form-control d-flex align-items-center m-0">
                                    <input class="form-check-input me-2" type="checkbox" name="todos" id="todos">
                                    <label class="form-check-label mb-0" for="todos">Seleccionar todos</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="revisados" value="revisados"
                                checked>
                            <label class="form-check-label" for="revisados">
                                Ver Sobrevuelos Revisados
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="pendientes"
                                value="pendientes">
                            <label class="form-check-label" for="pendientes">
                                Ver Sobrevuelos Pendientes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="observados"
                                value="observados">
                            <label class="form-check-label" for="observados">
                                Ver Sobrevuelos Observados
                            </label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" id="reporte_pdf" class="btn btn-raised btn-raised-primary">
                            <i class="bi bi-eye"></i> Ver Reporte
                        </button>
                        <button type="submit" id="reporte_excel" class="btn btn-raised btn-raised-success">
                            <i class="bi bi-file-earmark-excel"></i> Descargar Excel
                        </button>
                    </div>

                </div>
            </div>
        </form>

    </div>

    <!-- Modal para ver el PDF -->
    <div class="modal fade" id="modalVerPDF" tabindex="-1" aria-labelledby="modalVerPDFLabel" aria-hidden="true">
        <div class="modal-dialog modal-xxl-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVerPDFLabel">Reporte PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body p-0">

                    <div id="pdfLoader" style="display: none; text-align: center; padding: 30px;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Cargando PDF...</span>
                        </div>
                        <p class="mt-2">Generando reporte, por favor espera...</p>
                    </div>

                    <iframe id="iframeReportePDF" src="" width="100%" height="900px"
                        frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS (incluye Popper.js necesario para modales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hoy = new Date().toISOString().split('T')[0];
            document.getElementById('fechaDesde').value = hoy;
            document.getElementById('fechaHasta').value = hoy;
        });
    </script>

    {{-- CLIENTE --}}
    <script>
        $(document).ready(function() {
            $('#cliente').on('input', function() {
                let query = $(this).val();

                if (query.length >= 2) {
                    $.ajax({
                        url: '/clientes/buscar',
                        method: 'GET',
                        data: {
                            cliente: query
                        },
                        success: function(response) {
                            $('#resultado-clientes').empty().show();

                            if (Array.isArray(response) && response.length > 0) {
                                response.forEach(function(item) {
                                    $('#resultado-clientes').append(`
                                <li class="cliente-item list-group-item"
                                    data-codigo="${item.codigo}"
                                    data-nombre="${item.nombre}"
                                    data-origen="${item.origen}">
                                    <strong>${item.codigo}</strong> ${item.nombre}
                                    <span class="badge ${item.origen === 'Nemesis' ? 'bg-primary' : 'bg-success'} ms-2">
                                        ${item.origen}
                                    </span>
                                </li>`);
                                });
                            } else {
                                $('#resultado-clientes').append(
                                    '<li class="list-group-item disabled">No se encontraron clientes</li>'
                                );
                            }
                        },
                        error: function() {
                            $('#resultado-clientes').html(
                                '<li class="list-group-item disabled">Error al buscar clientes</li>'
                            ).show();
                        }
                    });
                } else {
                    $('#resultado-clientes').hide();
                }
            });

            $(document).on('click', '.cliente-item', function() {
                const codigo = $(this).data('codigo');
                const nombre = $(this).data('nombre');
                const origen = $(this).data('origen');

                $('#cliente').val(codigo);
                $('#origen_cliente').val(origen);

                // Solo si existe razon_social
                if ($('#razon_social').length) {
                    $('#razon_social').val(nombre);
                }

                $('#resultado-clientes').hide();
            });
        });
    </script>

    <script>
        document.getElementById('formReportePDF').addEventListener('submit', function(e) {
            e.preventDefault();

            const desde = document.getElementById('fechaDesde').value;
            const hasta = document.getElementById('fechaHasta').value;
            const estado = document.querySelector('input[name="estado"]:checked').value;
            const cliente = document.getElementById('cliente').value;
            const todos = document.getElementById('todos').checked ? 1 : 0;

            const url =
                `/reporte/por_fecha_pdf?desde=${encodeURIComponent(desde)}&hasta=${encodeURIComponent(hasta)}&estado=${encodeURIComponent(estado)}&cliente=${encodeURIComponent(cliente)}&todos=${todos}`;

            // Mostrar loading
            const loader = document.getElementById('pdfLoader');
            loader.style.display = 'block';

            const iframe = document.getElementById('iframeReportePDF');
            iframe.style.display = 'none';
            iframe.src = url;

            // Mostrar modal
            const modal = new bootstrap.Modal(document.getElementById('modalVerPDF'));
            modal.show();

            // Ocultar loading al terminar
            iframe.onload = function() {
                loader.style.display = 'none';
                iframe.style.display = 'block';
            };
        });
    </script>

    <script>
        document.getElementById('reporte_excel').addEventListener('click', function(e) {
            e.preventDefault(); // evita que el form se envíe como submit normal

            const desde = document.getElementById('fechaDesde').value;
            const hasta = document.getElementById('fechaHasta').value;
            const estado = document.querySelector('input[name="estado"]:checked').value;
            const cliente = document.getElementById('cliente').value;
            const todos = document.getElementById('todos').checked ? 1 : 0;

            const url = new URL("{{ route('reporte.por_fecha_excel') }}", window.location.origin);
            url.searchParams.append('desde', desde);
            url.searchParams.append('hasta', hasta);
            url.searchParams.append('estado', estado);
            url.searchParams.append('cliente', cliente);
            url.searchParams.append('todos', todos);

            window.open(url.toString(), '_blank');
        });
    </script>
@endsection
