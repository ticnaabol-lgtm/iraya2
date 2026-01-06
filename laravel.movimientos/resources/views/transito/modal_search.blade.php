<div class="modal fade" id="addNewCardModal" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModaltitle">Búsqueda Histórica</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="busquedaHistoricaForm">

                    <div class="row">
                        <div class="col-md-6 mb-md">
                            <div class="control-group">
                                <label for="fecha_vuelo">Fecha de Vuelo:(*)</label>
                                <input type="date" class="form-control" name="fecha_search" id="fecha_search"
                                    value="" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-md">
                            <div class="control-group">
                                <label for="vuelo">Vuelo:(*)</label>
                                <input type="text" class="form-control" name="vuelo_search" id="vuelo_search"
                                    placeholder="Introduzca vuelo" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-md">
                            <label for="origen">Origen</label>
                            <select class="select2basico" name="origen_search" id="origen_search">
                                <option value="">Seleccione Origen</option>
                                {{-- @foreach ($data4 as $aeropuerto)
                                <option value="{{ $aeropuerto->cd_oaci }}">{{ $aeropuerto->cd_oaci }} -
                                    {{ $aeropuerto->nombre }}
                                </option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-md-6 mb-md">
                            <label for="destino">Destino</label>
                            <select class="select2basico" name="destino_search" id="destino_search">
                                <option value="">Seleccione Destino</option>
                                {{-- @foreach ($data4 as $aeropuerto)
                                <option value="{{ $aeropuerto->cd_oaci }}">{{ $aeropuerto->cd_oaci }} -
                                    {{ $aeropuerto->nombre }}
                                </option>
                                @endforeach --}}
                            </select>
                        </div>
                        <div class="col-md-6 mb-md">
                            <div class="control-group">
                                <label for="matricula">Matrícula:</label>
                                <input type="text" class="form-control" name="reg_search" id="reg_search"
                                    onkeyup="mayusculas(this)" placeholder="Introduzca Matrícula" value="">
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="d-flex">
                        <div class="flex-grow-1"></div>
                        <button type="submit" class="btn btn-flat btn-primary">Buscar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-opacity btn-danger mr-md"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                <br>
                <div class="row">
                    <table id="basicDatatable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">FECHA</th>
                                <th scope="col">VUELO</th>
                                <th scope="col">RUTA</th>
                                <th scope="col">ATD</th>
                                <th scope="col">EST</th>
                                <th scope="col">NIVEL</th>
                                <th scope="col">SQ</th>
                                <th scope="col">H.A.</th>
                                <th scope="col" style="width: 150px"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #ficha_progreso_search_container {
        visibility: hidden;
    }
</style>

<div id="ficha_progreso_search_container">

</div>

<script>
    $(document).ready(function() {
        $('#busquedaHistoricaForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('busqueda_historica') }}",
                method: 'GET', // o 'POST' dependiendo de tu configuración de ruta
                data: formData,
                success: function(response) {
                    // Manejar la respuesta y actualizar la tabla con los resultados
                    console.log('Response ', response);
                    var tableBody = $('#basicDatatable tbody');
                    tableBody.empty();

                    if (response.message) {
                        tableBody.append('<tr><td colspan="9">' + response.message +
                            '</td></tr>');
                    } else {
                        response.forEach(function(item) {
                            //Recuperacion de Ficha Impresa
                            var puntoIdPunto = 0;
                            var vuelo = item.vuelo;
                            var tipo = item.tipo;
                            var velocidad = item.velocidad;
                            var etd = item.etd;
                            var dep = item.dep;
                            var fpl_json = item.fpl_json;
                            var fplObject = JSON.parse(fpl_json);
                            var ruta = fplObject.Ruta[0];
                            var destino = item.destino;
                            var sel = item.sel;
                            var reg = item.reg;
                            var sq = item.sq;
                            var ha = item.ha;
                            var atd = item.atd;
                            var nivel = item.nivel;
                            var primeraFicha = 0;
                            var ultimaFicha = 0;
                            var formattedDate = new Date(item.fecha)
                                .toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: '2-digit'
                                }).replace(/\//g, '');

                            tableBody.append('<tr>' +
                                '<td>' + item.fecha + '</td>' +
                                '<td>' + item.vuelo + '</td>' +
                                '<td>' + ruta + '</td>' +
                                '<td>' + item.atd + '</td>' +
                                '<td>' + item.est + '</td>' +
                                '<td>' + item.nivel + '</td>' +
                                '<td>' + item.sq + '</td>' +
                                '<td>' + item.ha + '</td>' +
                                '<td><button id="printSearchButton' + item
                                .id_amhs +
                                '" class="btn btn-raised btn-raised-primary btn-sm">' +
                                '<span class="fa fa-print"></span>&nbsp;&nbsp;Imprimir</button></td>' +
                                '</tr>');

                            const filteredValues = [];
                            fplObject.puntoSeleccionado.forEach(value => {
                                if (value === 1) {
                                    var puntoValue = fplObject.Punto[value];
                                    var estValue = fplObject.Estimado[
                                        value];
                                    var chgRuta = fplObject.chgRuta[value];
                                    var datComplem = fplObject.datosComp[
                                        value];
                                    var splPunto = fplObject.splPunto[
                                        value];
                                    var splEst = fplObject.splEst[value];

                                    // Crear la estructura de la tabla dinámicamente
                                    var tableHtml = ficha_tabla(puntoIdPunto, vuelo, tipo, velocidad, etd, dep, ruta, destino, sel, reg, sq, ha,
                                        formattedDate, atd, nivel, puntoValue, estValue, primeraFicha, ultimaFicha, chgRuta, datComplem, splPunto,
                                        splEst, equipo);

                                    primeraFicha = 1;

                                    // Añadir la tabla dentro de un nuevo div al contenedor
                                    $('#ficha_progreso_search_container')
                                        .append(tableHtml);
                                }
                            });
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        // Delegar evento de click para los botones de impresión generados dinámicamente
        $(document).on('click', '[id^=printSearchButton]', function() {
            var printContents = document.getElementById('ficha_progreso_search_container').innerHTML;

            // Llamar a la función de impresión
            printContent(printContents);
        });
    });
</script>

{{-- <script>
    // Evento de click para el botón de imprimir
    document.getElementById('printSearchButton').addEventListener('click', function() {
        var printContents = document.getElementById('ficha_progreso_container').innerHTML;

        // Llamar a la función de impresión
        printContent(printContents);
    });
</script>

 --}}
