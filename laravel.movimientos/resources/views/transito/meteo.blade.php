{{-- Datos Metereológicos en Linea --}}

<style>
    #ssDataTable,
    #ddDataTable,
    #notamDataTable,
    #metDataTable,
    #speciDataTable,
    #atsDataTable {
        font-size: 15px;
        table-layout: auto !important;
        width: 100% !important;
    }

    #ssDataTable th,
    #ssDataTable td,
    #ddDataTable th,
    #ddDataTable td,
    #notamDataTable th,
    #notamDataTable td,
    #atsDataTable th,
    #atsDataTable td,
    #metDataTable th,
    #metDataTable td,
    #speciDataTable th,
    #speciDataTable td {
        white-space: nowrap;
    }

    #ssDataTable tbody tr.selected,
    #ddDataTable tbody tr.selected,
    #notamDataTable tbody tr.selected,
    #metDataTable tbody tr.selected,
    #speciDataTable tbody tr.selected,
    #atsDataTable tbody tr.selected {
        background-color: #c8e6c9 !important;
        /* verde claro */
    }

    #notificacion_speci,
    #notificacion_ss,
    #notificacion_dd,
    #notificacion_notam,
    #notificacion_met,
    #notificacion_speci,
    #notificacion_ats {
        font-size: 0.9rem;
        font-weight: bold;
        padding: 4px 6px;
        border-radius: 4px;
        animation: cambioColor 1s infinite alternate;
    }

    @keyframes cambioColor {
        0% {
            background-color: #dc3545;
            color: #fff;
        }

        50% {
            background-color: #a10313;
            color: #fff;
        }

        100% {
            background-color: #ff081c;
            color: #fff;
        }
    }
</style>

<div class="row">
    <div class="col-lg-6 px-1">
        <div class="card" style="border-top: 5px solid #798da5;">

            <div class="card-body">
                <div class="table-responsive-lg">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">ATS
                                &nbsp;&nbsp;
                                <span class="badge animate__animated animate__flash animate__infinite"
                                    id="notificacion_ats" style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">MET</a>
                        </li>
                        {{-- <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                            role="tab" aria-controls="contact" aria-selected="false">SPECI</a>
                                    </li> --}}
                        <li class="nav-item" role="presentation">
                            <button class="nav-link position-relative" id="contact-tab2" data-toggle="tab"
                                data-target="#contact" type="button" role="tab" aria-controls="contact"
                                aria-selected="false">
                                SPECI &nbsp;&nbsp;
                                <span class="badge animate__animated animate__flash animate__infinite"
                                    id="notificacion_speci" style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </button>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ss-tab" data-toggle="tab" href="#ss" role="tab"
                                aria-controls="ss" aria-selected="false">SS&nbsp;&nbsp;
                                <span class="badge animate__animated animate__flash animate__infinite"
                                    id="notificacion_ss" style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="dd-tab" data-toggle="tab" href="#dd" role="tab"
                                aria-controls="dd" aria-selected="false">DD
                                <span class="badge animate__animated animate__flash animate__infinite"
                                    id="notificacion_dd" style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="notam-tab" data-toggle="tab" href="#notam" role="tab"
                                aria-controls="notam" aria-selected="false">NOTAM
                                <span class="badge animate__animated animate__flash animate__infinite"
                                    id="notificacion_notam" style="display: none;">
                                    <i class="fas fa-exclamation-triangle"></i>NEW
                                </span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        {{-- ATS --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">

                            <div class="table-responsive-lg" id="tableContainerATS">

                                <br />
                                <table id="atsDataTable" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Vuelo</th>
                                        </tr>
                                    </thead>

                                    <tbody id="contenido-ats">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                        {{-- MET --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            <div class="table-responsive-lg" id="tableContainerDat">

                                <br />
                                <table id="metDataTable" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Indicador</th>
                                        </tr>
                                    </thead>

                                    <tbody id="contenido-met">

                                    </tbody>
                                </table>

                            </div>

                        </div>

                        {{-- SPECI --}}
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab2">

                            <div class="table-responsive-lg" id="tableContainerDatSpeci">

                                <br />
                                <table id="speciDataTable" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Estado</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Indicador</th>
                                        </tr>
                                    </thead>

                                    <tbody id="contenido-speci">

                                    </tbody>
                                </table>

                                <!-- Elemento de Loading -->
                                <div id="loading" style="display: none; text-align: center;">
                                    <i class="fa-solid fa-spinner fa-spin"></i> Cargando datos...
                                </div>
                            </div>

                        </div>

                        {{-- SS --}}
                        <div class="tab-pane fade" id="ss" role="tabpanel" aria-labelledby="ss-tab">

                            <br />
                            <table id="ssDataTable" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>

                                <tbody id="contenido-ss">

                                </tbody>
                            </table>
                        </div>

                        {{-- DD --}}
                        <div class="tab-pane fade" id="dd" role="tabpanel" aria-labelledby="dd-tab">

                            <br />
                            <table id="ddDataTable" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>

                                <tbody id="contenido-dd">

                                </tbody>
                            </table>
                        </div>

                        {{-- NOTAM --}}
                        <div class="tab-pane fade" id="notam" role="tabpanel" aria-labelledby="notam-tab">

                            <br />
                            <table id="notamDataTable" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Indicador</th>
                                    </tr>
                                </thead>

                                <tbody id="contenido-notam">

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 px-1">
        <div class="card" style="border-top: 5px solid #00758f;">
            <div class="card-body">
                <div class="ul-list-group-1 mb-md">
                    <textarea class="zoom" name="meteo" id="meteo" style="height: 470px; font-size: 15px;">
                    </textarea>
                    <br>
                    <button class="boton" onclick="cambiarTamanoLetraMet(1)">+</button>
                    <button class="boton" onclick="cambiarTamanoLetraMet(-1)">-</button>
                    <button class="boton" name="meteo_print" id="meteo_print" onclick="imprimirMeteo()">🖨️
                        Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function cambiarTamanoLetraMet(delta) {
        const textarea = document.getElementById('meteo');
        let currentSize = parseFloat(window.getComputedStyle(textarea).fontSize);
        let newSize = currentSize + delta;

        // Limita tamaño entre 10px y 40px
        if (newSize < 10) newSize = 10;
        if (newSize > 40) newSize = 40;

        textarea.style.fontSize = newSize + 'px';
    }
</script>

{{-- IMPRESION METEO --}}
<script>
    function imprimirMeteo() {
        let contenido = document.getElementById('meteo').value;

        // 🧹 Limpiar espacios innecesarios
        contenido = contenido
            .trim() // elimina espacios al inicio y fin
            .replace(/\s{2,}/g, ' ') // múltiples espacios seguidos → uno solo
            .replace(/\n{3,}/g, '\n\n'); // más de 2 saltos → 2

        if (!contenido) {
            alert('⚠️ No hay contenido para imprimir.');
            return;
        }

        // 🕓 Fecha y hora UTC
        const ahora = new Date();
        const fechaUTC = ahora.toISOString().slice(0, 19).replace('T', ' ') + ' UTC';

        const ventanaImpresion = window.open('', '_blank');
        ventanaImpresion.document.write(`
                <html>
                <head>
                    <title>Reporte ATS/MET/SPECI/SS/DD/NOTAM</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 40px; }
                        h2 { text-align: center; color: #00758f; margin-bottom: 5px; }
                        .fecha { text-align: center; color: #555; font-size: 13px; margin-bottom: 15px; }
                        pre {
                            white-space: pre-wrap;
                            word-wrap: break-word;
                            font-size: 15px;
                            line-height: 1.5;
                        }
                    </style>
                </head>
                <body>
                    <h2>Reporte ATS/MET/SPECI/SS/DD/NOTAM</h2>
                    <div class="fecha">Generado: ${fechaUTC}</div>
                    <hr>
                    <pre>${contenido}</pre>
                </body>
                </html>
            `);
        ventanaImpresion.document.close();
        ventanaImpresion.print();
    }
</script>

{{-- Datos Metereológicos en Linea --}}

<!-- Modal -->
{{-- <div class="modal fade" id="ModalMet" tabindex="-1" role="dialog" aria-labelledby="ModalMet"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModaltitle"
                    style="font-size: 1.5rem; font-weight: bold; text-transform: uppercase;">
                    <span id="modalTitle"></span>
                </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <!-- Aquí se mostrará la información recuperada -->
                <p><strong>ID:</strong> <span id="modalId"></span></p>
                <p><strong>Hora:</strong> <span id="modalHora"></span></p>
                <p><strong>Tipo de Mensaje:</strong> <span id="modalTipoMensaje"></span></p>
                <p><strong>Cabecera:</strong> <span id="modalCabecera"></span></p>
                <p><strong>Mensaje:</strong> <span id="modalMensaje"></span></p>
            </div>
        </div>
    </div>
</div> --}}

{{-- Mover modal --}}
{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.querySelector("#ModalMet .modal-dialog");
        const header = document.querySelector("#ModalMet .modal-header");

        let isDragging = false,
            startX, startY, offsetX, offsetY;

        header.addEventListener("mousedown", function(e) {
            isDragging = true;
            startX = e.clientX;
            startY = e.clientY;
            offsetX = modal.offsetLeft;
            offsetY = modal.offsetTop;
        });

        document.addEventListener("mousemove", function(e) {
            if (isDragging) {
                const newX = offsetX + (e.clientX - startX);
                const newY = offsetY + (e.clientY - startY);
                modal.style.position = "absolute";
                modal.style.left = newX + "px";
                modal.style.top = newY + "px";
                modal.style.zIndex = 1050; // Asegura que esté por encima
            }
        });

        document.addEventListener("mouseup", function() {
            isDragging = false;
        });
    });
</script> --}}
