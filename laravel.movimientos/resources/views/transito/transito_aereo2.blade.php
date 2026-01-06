<!DOCTYPE html>
<html>

<head>
    <base href="../../" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-Compatible" content="ie=edge" />
    <title>Aeropuertos</title>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Contenedor principal */
        .container {
            display: flex;
            width: 100%;
            height: 100vh;
            /* Ocupa toda la altura de la pantalla */
            user-select: none;
            /* Evita selección accidental de texto */
        }

        /* Estilo de los paneles redimensionables */
        .resizable {
            flex-grow: 1;
            min-width: 100px;
            max-width: 90%;
            overflow: auto;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f4f4f4;
            height: 100vh;
            /* Ajusta la altura completa */
        }

        /* Estilo del divisor */
        .divider {
            width: 10px;
            cursor: ew-resize;
            background-color: #888;
            transition: background-color 0.2s;
            height: 100vh;
            /* Asegura que el divisor también tenga el 100% de la altura */
        }

        /* Cambio de color al pasar el mouse */
        .divider:hover {
            background-color: #555;
        }
    </style>

</head>

<body>
    <div class="container">
        <!-- Panel Izquierdo -->
        <div class="resizable" id="leftPanel">
            <h3>Panel Izquierdo</h3>
            {{-- Contenido de la izquierda --}}
            @include('transito.amhs')
            @include('transito.meteo')
            @include('transito.amhs_script')
        </div>

        <!-- Divisor -->
        <div class="divider" id="dragBar"></div>

        <!-- Panel Derecho -->
        <div class="resizable" id="rightPanel">
            <h3>Panel Derecho</h3>
            {{-- Contenido de la derecha --}}
            @include('transito.vuelo_form')
            @include('transito.impresion_ficha')
        </div>
    </div>
    @include('transito.script')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dragBar = document.getElementById("dragBar");
            const leftPanel = document.getElementById("leftPanel");
            const rightPanel = document.getElementById("rightPanel");

            dragBar.addEventListener("mousedown", (event) => {
                event.preventDefault();

                document.addEventListener("mousemove", resizePanels);
                document.addEventListener("mouseup", () => {
                    document.removeEventListener("mousemove", resizePanels);
                });
            });

            function resizePanels(event) {
                let containerWidth = document.querySelector(".container").offsetWidth;
                let newRightWidth = (containerWidth - event.clientX) / containerWidth * 100;
                let newLeftWidth = 100 - newRightWidth;

                if (newRightWidth > 10 && newRightWidth < 80) { // Restricción de tamaños mínimos y máximos
                    rightPanel.style.width = newRightWidth + "%";
                    leftPanel.style.width = newLeftWidth + "%";
                }
            }
        });
    </script>

</body>

</html>
