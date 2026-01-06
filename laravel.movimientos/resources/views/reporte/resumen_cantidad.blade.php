@extends('layouts.app')

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('#') }}">Reportes</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">

        <!-- Bootstrap 5 Modal -->
        <form id="formReportePDF">
            <div class="card">
                <div class="card-header">
                    <h2 class="doc-section-title" id="raised">Resumen Cantidad</h2>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalVerPDFLabel">Reporte PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe id="iframeReportePDF" src="" width="100%" height="600px" frameborder="0"></iframe>
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

    <script>
        document.getElementById('formReportePDF').addEventListener('submit', function(e) {
            e.preventDefault();

            const desde = document.getElementById('fechaDesde').value;
            const hasta = document.getElementById('fechaHasta').value;
            const estado = document.querySelector('input[name="estado"]:checked').value;

            const url =
                `/reporte/resumen_cantidad_pdf?desde=${encodeURIComponent(desde)}&hasta=${encodeURIComponent(hasta)}&estado=${encodeURIComponent(estado)}`;

            document.getElementById('iframeReportePDF').src = url;

            const modal = new bootstrap.Modal(document.getElementById('modalVerPDF'));
            modal.show();
        });
    </script>

    <script>
        document.getElementById('reporte_excel').addEventListener('click', function() {
            const desde = document.getElementById('fechaDesde').value;
            const hasta = document.getElementById('fechaHasta').value;
            const estado = document.querySelector('input[name="estado"]:checked').value;

            const url = new URL("{{ route('reporte.resumen_cantidad_excel') }}", window.location.origin);
            url.searchParams.append('desde', desde);
            url.searchParams.append('hasta', hasta);
            url.searchParams.append('estado', estado);

            window.open(url.toString(), '_blank');
        });
    </script>
@endsection
