<!DOCTYPE html>
<html>

<head>
    <base href="../../" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-Compatible" content="ie=edge" />
    <title>IRAYA II ✈️</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendors.bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.bundle.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/dist/css/select2.min.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('transito.styles')
    <style>
        #ficha_progreso {
            width: 20cm;
            border-collapse: collapse;
            border: 1px dashed red;
            /* Líneas de cortes alrededor de la tabla */
            /* font-size: 10px; */
        }

        #ficha_progreso .custom-cell {
            vertical-align: middle;
            /* Centra verticalmente el contenido */
            height: calc(2.5cm / 4);
            /* Ajusta la altura para distribuirla uniformemente */
            position: relative;
        }

        #ficha_progreso .custom-cell img {
            /* width: 100%; */
            height: 200%;
            object-fit: cover;
            /* Asegura que la imagen cubra toda la celda */
        }

        #ficha_progreso .custom-cell-top {
            border-top: 2px solid black;
            /* Borde superior */
        }

        #ficha_progreso .custom-cell-right {
            border-right: 2px solid black;
            /* Borde derecho */
        }

        #ficha_progreso .custom-cell-bottom {
            border-bottom: 2px solid black;
            /* Borde inferior */
        }

        #ficha_progreso .custom-cell-left {
            border-left: 2px solid black;
            /* Borde izquierdo */
        }

        @media print {
            #ficha_progreso {
                width: 20cm;
                height: 2.5cm;
            }

            #ficha_progreso .custom-cell {
                height: calc(2.5cm / 4);
            }
        }

        #ficha_progreso .bordered {
            border: 2px solid #000;
            display: inline-block;
            padding: 2px 5px;
            margin: 2px;
        }

        #ficha_progreso .larger-bold {
            font-size: larger;
            font-weight: bold;
        }

        body {
            background-image: url("{{ asset('assets/images/fondo.png') }}");
            background-repeat: repeat;
            background-size: auto;
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0">
        <div class="main-content-body p-0 m-0">
            <div class="row gx-0 gy-0"> <!-- sin separación horizontal ni vertical -->
                <div class="col-lg-5 px-1">
                    @include('transito.amhs')
                </div>
                <div class="col-lg-7 px-1">
                    @include('transito.vuelo_form')
                </div>
                <div class="col-lg-6 px-1">
                    @include('transito.meteo')
                    @include('transito.amhs_script')
                </div>
                <div class="col-lg-6 px-1">
                    @include('transito.impresion_ficha')
                </div>
            </div>
        </div>
    </div>
    @include('transito.script')

</body>

</html>
