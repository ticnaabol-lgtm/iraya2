@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li> --}}
@endsection

@section('content')
    <div class="px-lg py-lg bg-card">
        <div class="container">
            <div class="row">
                <div class="container mt-4">
                    <div class="p-3 bg-success border rounded-3 shadow-sm text-center">
                        <h5 class="mb-0 fw-bold">Tutoriales Fichas ATC-003, ATC-004 y Fichas ATC-001, ATC-002</h5>
                    </div>
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-6">
                    <h4>Fichas ATC [ATC-003 ATC-004 y Fichas ATC-001 y ATC-002]</h4>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/ib467mTxq-o"
                        title="Capacitacion Regional Trinidad IRAYA II" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="col-md-6">
                    <h4>Capacitación Cochabamba Fichas ATC</h4>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/AnociY-PX9Q"
                        title="Capacitación Sistema Aire Tierra Regional Cochabamba 23/04/2026" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

            <div class="row">
                <div class="container mt-4">
                    <div class="p-3 bg-success border rounded-3 shadow-sm text-center">
                        <h5 class="mb-0 fw-bold">Tutoriales Fichas ACC</h5>
                    </div>
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-md-6">
                    <h4>Primer Video - Aspectos Basicos</h4>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/YUkE6FsTmb4"
                        title="Primer Video Tutorial Sistema Iraya 2" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="col-md-6">
                    <h4>Segundo Video - Creación de Rutas Preterminadas</h4>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/PmOfIjK5hr4"
                        title="Segundo Video Tutorial - Creación de Rutas Predeterminadas" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="col-md-6">
                    <h4>Tercer Video - Creación de Plan de Vuelos</h4>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/UleMSpqJMjg"
                        title="Tercer Video - Creación de Planes de Vuelo" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

                <div class="col-md-6">
                    <h4>Cuarto Video - Búsqueda Histórica</h4>
                    <iframe width="100%" height="500" src="https://www.youtube.com/embed/63XsfH318Qc"
                        title="Cuarto Video - Búsqueda Histórica" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </div>

    <br>
@endsection
