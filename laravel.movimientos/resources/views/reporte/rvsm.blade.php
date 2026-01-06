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
                    <h2 class="doc-section-title" id="raised">Reporte Separación Mínima Vertical Reducida (RVSM)</h2>
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

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" id="reporte_excel" class="btn btn-raised btn-raised-success">
                            <i class="bi bi-file-earmark-excel"></i> Descargar Excel
                        </button>
                    </div>

                </div>
            </div>
        </form>

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
        document.getElementById('reporte_excel').addEventListener('click', function() {
            const desde = document.getElementById('fechaDesde').value;
            const hasta = document.getElementById('fechaHasta').value;

            // Validación simple
            if (!desde || !hasta) {
                alert('Por favor seleccione ambas fechas: desde y hasta.');
                return;
            }

            const url = new URL("{{ route('reporte.por_rvsm_excel') }}", window.location.origin);
            url.searchParams.append('desde', desde);
            url.searchParams.append('hasta', hasta);

            window.open(url.toString(), '_blank');
        });
    </script>
@endsection
