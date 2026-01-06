<style>
    /* Ajusta el modal */
    #addNewCardModalRuta .modal-dialog {
        max-width: 600px !important;
        /* Ancho de 600px */
        margin-left: 10% !important;
        /* Desplaza el modal más a la izquierda */
    }
</style>

<div class="modal fade" id="addNewCardModalRuta" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModaltitle">Creación de Ruta</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <form id="RutaForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-md">
                            <div class="control-group">
                                <label for="vuelo_pv">Puntos:</label>
                                <input type="text" class="form-control" name="ruta_puntos" id="ruta_puntos"
                                    placeholder="Introduzca Puntos" value=""
                                    style="text-transform: uppercase; width: 550px;">

                            </div>
                            <div id="mensaje-error" style="color: red; display: none;"></div>
                        </div>
                    </div>
                    <div id="loadingIndicatorRuta" style="display: none; text-align: center; padding: 10px;">
                        <i class="fa-solid fa-spinner fa-spin"></i> Procesando...
                    </div>
                    <br>
                    <div class="d-flex">
                        <div class="flex-grow-1"></div>
                        <button type="submit" class="btn btn-flat btn-primary">Enviar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-opacity btn-danger mr-md"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalHeader = document.querySelector("#addNewCardModalRuta .modal-header");
        const modalDialog = document.querySelector("#addNewCardModalRuta .modal-dialog");

        let isDragging = false,
            startX, startY, startLeft, startTop;

        modalHeader.addEventListener("mousedown", function(e) {
            isDragging = true;
            startX = e.clientX;
            startY = e.clientY;
            const rect = modalDialog.getBoundingClientRect();
            startLeft = rect.left;
            startTop = rect.top;

            document.addEventListener("mousemove", onMouseMove);
            document.addEventListener("mouseup", onMouseUp);
        });

        function onMouseMove(e) {
            if (!isDragging) return;
            let newX = startLeft + (e.clientX - startX);
            let newY = startTop + (e.clientY - startY);
            modalDialog.style.position = "absolute";
            modalDialog.style.left = newX + "px";
            modalDialog.style.top = newY + "px";
            modalDialog.style.margin = "0"; // Elimina el margen para evitar saltos
        }

        function onMouseUp() {
            isDragging = false;
            document.removeEventListener("mousemove", onMouseMove);
            document.removeEventListener("mouseup", onMouseUp);
        }
    });
</script>

<script>
    document.getElementById('ruta_puntos').addEventListener('input', function() {
        // Oculta el mensaje de error cuando el usuario escribe algo
        document.getElementById('mensaje-error').style.display = 'none';
    });
</script>

<script>
    $(document).ready(function() {

        $('#RutaForm').on('keypress', function(e) {
            if (e.key === "Enter") {
                e.preventDefault(); // Evita que se envíe automáticamente
                $('#RutaForm').submit(); // Envía el formulario manualmente
            }
        });

        $('#RutaForm').on('submit', function(e) {

            $('#loadingIndicatorRuta').show();

            e.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

            // Validador para verificar que puntos tiene al menos tres cadenas de texto separadas
            function validarPuntos(puntos) {
                // Divide el string en palabras usando espacios como separador
                var palabras = puntos.trim().split(/\s+/);

                // Verifica si hay al menos 3 palabras
                if (palabras.length >= 3) {
                    console.log("Puntos válidos:", palabras);
                    return true;
                } else {
                    console.error(
                        "Error: Los puntos deben contener al menos tres cadenas de texto separadas."
                    );
                    return false;
                }
            }

            var puntos = $('#ruta_puntos').val().trim();
            puntos = puntos.toUpperCase();
            var vuelo = $('#vuelo').val();
            var tipo_ficha = userTip.pk_id_tipo_ficha;

            console.log('CRUTA tipo_ficha', tipo_ficha);

            if (validarPuntos(puntos)) {
                // Si es válido, continuar con el flujo
                console.log("CRUTA Validación exitosa. Procediendo...");
                console.log('CRUTA RESPONSE PUNTOS MAYUSCULA', puntos);

                $.ajax({
                    url: '/crear-ruta',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}', // Agrega el token CSRF
                        puntos: puntos,
                        vuelo: vuelo,
                        tipo_ficha: tipo_ficha,
                    },

                    success: function(response) {
                        // Maneja la respuesta exitosa del servidor
                        console.log('CRUTA RESPONSE CREAR RUTA', response);

                        if (response.validador === 1) {

                            function parseJSON(selector) {
                                var rawValue = $(selector).val();
                                return rawValue ? JSON.parse(rawValue) : [];
                            }

                            /* var array_option_select_input = parseJSON(
                                '#array_option_select');
                            var id_rutas_encontradas_input = parseJSON(
                                '#id_rutas_encontradas');
                            var name_rutas_encontradas_input = parseJSON(
                                '#name_rutas_encontradas');
                            var id_vector_viaje_input = parseJSON('#id_vector_viaje');
                            var name_vector_viaje_input = parseJSON('#name_vector_viaje');
                            var distancia_vector_viaje_input = parseJSON(
                                '#distancia_vector_viaje');
                            var puntos_mensaje_input = parseJSON('#puntos_mensaje');
                            var ruta_vector_viaje_input = parseJSON('#ruta_vector_viaje');
                            var fpl_punto_seleccionado_input = parseJSON(
                                '#fpl_punto_seleccionado');
                            var vuelo = $('#vuelo').val();
                            var llave_ruta_predeterminada = parseInt($(
                                    '#llave_ruta_predeterminada')
                                .val());

                            console.log('llave_ruta_predeterminada',
                                llave_ruta_predeterminada); */

                            // Crear el nuevo select
                            var id_amhs = $('#id').val();
                            var id_estado = $('#id_estado').val();
                            const select = document.getElementById("id_rutas");
                            var array_option_select = response.array_option_select;
                            var llave_select = response.llave_select;
                            var puntos_mensajes = response.puntos_mensaje;
                            var primer_punto = response.primerPunto;
                            // $('input[name="primer_punto"]').val(primer_punto);

                            // Resetear el select
                            // select.innerHTML = "";

                            console.log('CRUTA array_option_select', array_option_select);
                            console.log('CRUTA llave_select', llave_select);
                            console.log('CRUTA puntos_mensaje', puntos_mensajes);

                            // Añadir opción por defecto
                            /* const defaultOption = document.createElement("option");
                            defaultOption.text = "Seleccione ruta";
                            defaultOption.value = "SelectRuta";
                            select.add(defaultOption); */

                            // if (llave_ruta_predeterminada === 1) {
                            /* array_option_select_input.forEach(function(option, index) {
                                const newOption = document.createElement("option");
                                newOption.text = option;
                                newOption.value = index;
                                select.add(newOption);
                            }); */
                            // }

                            /* var arrayLength = array_option_select_input.length;
                            const newOption = document.createElement("option");
                            newOption.text = array_option_select;
                            newOption.value = arrayLength;
                            newOption.selected = true;
                            select.add(newOption); */

                            // Asegurarse de que id_rutas_encontradas y name_rutas_encontradas sean arrays o cadenas válidas
                            var id_rutas_encontradas = response.id_rutas_encontradas || [];
                            var name_rutas_encontradas = response.name_rutas_encontradas ||
                                [];

                            console.log('CRUTA id_rutas_encontradas', id_rutas_encontradas);
                            console.log('CRUTA name_rutas_encontradas',
                                name_rutas_encontradas);

                            // Variables para la segunda solicitud AJAX
                            var origen = $('#origen').val();
                            var destino = $('#destino').val();
                            var vuelo = $('#vuelo').val();
                            var id_vector_viaje = response.id_vector_viaje || [];
                            var name_vector_viaje = response.name_vector_viaje || [];
                            var distancia_vector_viaje = response.distancia_vector_viaje ||
                                [];
                            var ruta_vector_viaje = response.ruta_vector_viaje || [];
                            var fpl_punto_seleccionado = id_vector_viaje.length === 0 ? [] :
                                Array(id_vector_viaje.length).fill("0");
                            var popular = 1;

                            // Aumentando los valores al select
                            let lastNumericValue = -1;

                            for (let i = select.options.length - 1; i >= 0; i--) {
                                const value = select.options[i].value;

                                if (!isNaN(value) && value.trim() !== "") {
                                    lastNumericValue = parseInt(value);
                                    break; // Encontró el último numérico de abajo hacia arriba
                                }
                            }

                            // Crear la opción de forma manual
                            const option = document.createElement("option");
                            option.text = response.array_option_select;
                            option.value = lastNumericValue + 1;

                            // Agregar atributos personalizados usando dataset
                            option.dataset.array_option_select = response
                                .array_option_select;
                            option.dataset.id_rutas_encontradas = JSON.stringify(response
                                .id_rutas_encontradas);
                            option.dataset.name_rutas_encontradas = JSON.stringify(response
                                .name_rutas_encontradas);
                            option.dataset.id_vector_viaje = JSON.stringify(response
                                .id_vector_viaje);
                            option.dataset.name_vector_viaje = JSON.stringify(response
                                .name_vector_viaje);
                            option.dataset.distancia_vector_viaje = JSON.stringify(response
                                .distancia_vector_viaje);
                            option.dataset.puntos_mensaje = JSON.stringify(response
                                .puntos_mensaje);
                            option.dataset.ruta_vector_viaje = JSON.stringify(response
                                .ruta_vector_viaje);
                            option.dataset.fpl_punto_seleccionado = JSON.stringify(
                                fpl_punto_seleccionado);

                            // Marcar la opción como seleccionada
                            option.selected = true;

                            // Agregar la opción al select
                            select.add(option);

                            // Segunda solicitud AJAX para crear ruta predeterminada
                            $.ajax({
                                url: '/crear-ruta-predeterminada',
                                type: "POST",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    origen: origen,
                                    destino: destino,
                                    array_option_select: array_option_select,
                                    id_rutas_encontradas: JSON.stringify(
                                        id_rutas_encontradas),
                                    name_rutas_encontradas: JSON.stringify(
                                        name_rutas_encontradas),
                                    id_vector_viaje: JSON.stringify(
                                        id_vector_viaje),
                                    llave_select: llave_select,
                                    name_vector_viaje: JSON.stringify(
                                        name_vector_viaje),
                                    distancia_vector_viaje: JSON.stringify(
                                        distancia_vector_viaje),
                                    puntos_mensaje: JSON.stringify(puntos_mensajes),
                                    ruta_vector_viaje: JSON.stringify(
                                        ruta_vector_viaje),
                                    fpl_punto_seleccionado: JSON.stringify(
                                        fpl_punto_seleccionado),
                                    vuelo: vuelo,
                                    popular: popular,
                                },
                                success: function(response) {
                                    $('input[name="id_ruta_predeterminada"]')
                                        .val(
                                            response.data.id);
                                },
                                error: function(xhr) {
                                    console.log(
                                        'Error al crear la ruta predeterminada'
                                    );
                                    console.log(xhr.responseText);
                                }
                            });

                            console.log('CRUTA RUTA CREADA');

                            // Código para manejar la tabla (FPL)
                            var FPL = {
                                idPunto: [],
                                Punto: [],
                                idRuta: [],
                                Ruta: [],
                                puntoSeleccionado: [],
                                Distancia: [],
                                Estimado: [],
                                chgRuta: [],
                                datosComp: [],
                                splPunto: [],
                                splEst: [],
                            };

                            // Llenar los arrays de FPL basados en id_vector_viaje
                            id_vector_viaje.forEach(function(id, index) {
                                FPL.idPunto.push(id);
                                FPL.Punto.push(name_vector_viaje[index] || "N/A");
                                FPL.idRuta.push(ruta_vector_viaje[index] || "N/A");

                                // Buscar el nombre de la ruta correspondiente
                                const valorABuscar = ruta_vector_viaje[index];
                                const indice = id_rutas_encontradas.indexOf(
                                    valorABuscar);
                                const nombreRuta = indice !== -1 ?
                                    name_rutas_encontradas[
                                        indice] : "No encontrado";
                                FPL.Ruta.push(nombreRuta);

                                // Inicializar otros campos vacíos
                                FPL.puntoSeleccionado.push(0);
                                FPL.Distancia.push(distancia_vector_viaje[index] ||
                                    "N/A");
                                FPL.Estimado.push("");
                                FPL.chgRuta.push("");
                                FPL.datosComp.push("");
                                FPL.splPunto.push("");
                                FPL.splEst.push("");
                            });

                            console.log('CRUTA FPL', FPL);
                            console.log('CRUTA CR distancia_vector_viaje',
                                distancia_vector_viaje);

                            // Llamar a la función para poblar la tabla
                            var tableBody = $('#datatableFPL tbody');
                            tableBody.empty();
                            populateTable(id_vector_viaje, FPL.puntoSeleccionado,
                                name_vector_viaje,
                                distancia_vector_viaje, tableBody, FPL.Estimado, $(
                                    '#velocidad')
                                .val(), $('#nivel').val(), FPL.Ruta, FPL.chgRuta, FPL
                                .datosComp,
                                FPL.splPunto, FPL.splEst);

                            /* $('input[name="array_option_select"]').val(array_option_select);
                            $('input[name="id_rutas_encontradas"]').val(JSON.stringify(
                                id_rutas_encontradas));
                            $('input[name="name_rutas_encontradas"]').val(JSON.stringify(
                                name_rutas_encontradas));
                            $('input[name="id_vector_viaje"]').val(JSON.stringify(
                                id_vector_viaje));
                            $('input[name="llave_select"]').val(llave_select);
                            $('input[name="name_vector_viaje"]').val(JSON.stringify(
                                name_vector_viaje));
                            $('input[name="distancia_vector_viaje"]').val(JSON.stringify(
                                distancia_vector_viaje));
                            $('input[name="puntos_mensajes"]').val(JSON.stringify(
                                puntos_mensajes));
                            $('input[name="ruta_vector_viaje"]').val(JSON.stringify(
                                ruta_vector_viaje));

                            $('input[name="fpl_id_punto"]').val(JSON.stringify(FPL
                                .idPunto));
                            $('input[name="fpl_punto"]').val(JSON.stringify(FPL.Punto));
                            $('input[name="fpl_id_ruta"]').val(JSON.stringify(FPL.idRuta));
                            $('input[name="fpl_ruta"]').val(JSON.stringify(FPL.Ruta));
                            $('input[name="est_array"]').val(JSON.stringify(FPL.Estimado));
                            $('input[name="chg_ruta_array"]').val(JSON.stringify(FPL
                                .chgRuta));
                            $('input[name="dt_cmp_array"]').val(JSON.stringify(FPL
                                .datosComp));
                            $('input[name="spl_punto_array"]').val(JSON.stringify(FPL
                                .splPunto));
                            $('input[name="spl_est"]').val(JSON.stringify(FPL.splEst));
                            $('input[name="fpl_punto_seleccionado"]').val(JSON.stringify(FPL
                                .puntoSeleccionado));
                            $('input[name="fpl_distancia"]').val(JSON.stringify(FPL
                                .Distancia));
                            $('input[name="selected"]').val(selectedRutaId); */

                            console.log('CRUTA CR id_estado', $('#id_estado').val());

                            if ($('#id_estado').val() < 2) {

                                var id_estado_trabajando = 2;
                                var nombre_estado = "TRABAJADO";
                                var color = "#004DC9";

                                $('#id_estado').val(id_estado_trabajando);
                                $('#name_estado').val(nombre_estado);
                                $('#color_estado').val(color);

                                console.log('CRUTA Nombre del Estado TR:', nombre_estado);
                                console.log('CRUTA Color del Estado TR:', color);

                                const estadoCell = document.getElementById('estado' +
                                    id_amhs);

                                if (estadoCell) {
                                    // Buscar el span dentro del td que contiene el badge
                                    const badge = estadoCell.querySelector('span');

                                    if (badge) {
                                        badge.textContent = nombre_estado;
                                        badge.style.backgroundColor = color;
                                        badge.style.color = "#ffffff";
                                        badge.style.fontWeight = "bold";
                                    }
                                }

                            }

                            const procesoVueloData = {
                                id_amhs: $('#id').val(),
                                id_estado: $('#id_estado').val(),
                                name_estado: $('#name_estado').val(),
                                color_estado: $('#color_estado').val(),
                                tipo_ficha: userTip.pk_id_tipo_ficha,

                                array_option_select: array_option_select,
                                id_rutas_encontradas: id_rutas_encontradas,
                                name_rutas_encontradas: name_rutas_encontradas,
                                id_vector_viaje: id_vector_viaje,
                                llave_select: lastNumericValue + 1,
                                name_vector_viaje: name_vector_viaje,
                                distancia_vector_viaje: distancia_vector_viaje,
                                puntos_mensaje: puntos_mensajes,
                                ruta_vector_viaje: ruta_vector_viaje,

                                fpl_id_punto: id_vector_viaje,
                                fpl_punto: name_vector_viaje,
                                fpl_id_ruta: ruta_vector_viaje,
                                fpl_ruta: FPL.Ruta,
                                est_array: FPL.Estimado,
                                chg_ruta_array: FPL.chgRuta,
                                dt_cmp_array: FPL.datosComp,
                                spl_punto_array: FPL.splPunto,
                                spl_est: FPL.splEst,
                                fpl_punto_seleccionado: FPL.puntoSeleccionado,
                                // fpl_nivel: nivel_vector,
                                fpl_distancia: FPL.Distancia,
                                selected: lastNumericValue + 1,

                                origen_save: 2,
                            };

                            console.log('CRUTA CR procesoVueloData', procesoVueloData);
                            sendProcesoVueloData(procesoVueloData);

                            // const select = document.getElementById("id_rutas");

                            /* array_option_select_input.push($('#array_option_select').val());
                            id_rutas_encontradas_input.push($('#id_rutas_encontradas')
                                .val());
                            name_rutas_encontradas_input.push($('#name_rutas_encontradas')
                                .val());
                            id_vector_viaje_input.push($('#id_vector_viaje').val());
                            name_vector_viaje_input.push($('#name_vector_viaje').val());
                            distancia_vector_viaje_input.push($('#name_vector_viaje')
                                .val());
                            puntos_mensaje_input.push($('#puntos_mensaje').val());
                            ruta_vector_viaje_input.push($('#ruta_vector_viaje').val());
                            fpl_punto_seleccionado_input.push($('#fpl_punto_seleccionado')
                                .val()); */

                            /* $('input[name="array_option_select"]').val(JSON.stringify(
                                array_option_select_input));
                            $('input[name="id_rutas_encontradas"]').val(JSON.stringify(
                                id_rutas_encontradas_input));
                            $('input[name="name_rutas_encontradas"]').val(JSON.stringify(
                                name_rutas_encontradas_input));
                            $('input[name="id_vector_viaje"]').val(JSON.stringify(
                                id_vector_viaje_input));
                            $('input[name="name_vector_viaje"]').val(JSON.stringify(
                                name_vector_viaje_input));
                            $('input[name="distancia_vector_viaje"]').val(JSON.stringify(
                                distancia_vector_viaje_input));
                            $('input[name="puntos_mensaje"]').val(JSON.stringify(
                                puntos_mensaje_input));
                            $('input[name="ruta_vector_viaje"]').val(JSON.stringify(
                                ruta_vector_viaje_input));
                            $('input[name="fpl_punto_seleccionado"]').val(JSON.stringify(
                                fpl_punto_seleccionado_input)); */

                            /* $('#selectedRutaId').val(arrayLength); */

                            validacion_nivel2();

                            // $('#llave_ruta_predeterminada').val(1);

                            //alert('Ruta creada exitosamente');
                            // Ocultar el indicador de carga cuando la solicitud haya terminado (ya sea éxito o error)
                            // Alerta Exitosa
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Ruta Creada",
                                showConfirmButton: false,
                                timer: 1000,
                                width: "250px", // Reduce el tamaño del modal
                                customClass: {
                                    title: "small-title", // Clase para reducir el tamaño del texto
                                    popup: "small-popup" // Clase para modificar el modal
                                }
                            });

                            $('#loadingIndicatorRuta').hide();
                            $('#addNewCardModalRuta').modal('hide');

                        } else {
                            /* alert(
                                "Favor revise si los puntos o rutas sean correctas y existen"
                            ); */
                            $('#loadingIndicatorRuta').hide();
                            document.getElementById('mensaje-error').style.display =
                                'block';
                            document.getElementById('mensaje-error').innerText = response
                                .error;
                        }

                    },

                    error: function(xhr, status, error) {
                        console.error('Error al crear la ruta', error);
                        // alert('Error al crear la ruta');
                    },

                    complete: function() {
                        // Puedes cerrar la modal y mostrar un mensaje de éxito
                    },

                });

            } else {
                // Si no es válido, detener el flujo o mostrar un mensaje de error
                document.getElementById('mensaje-error').style.display = 'block';
                document.getElementById('mensaje-error').innerText =
                    "Debe contener al menos un Punto Inicial, la Ruta y el Punto Final. Ej: PAZ UT711 AKRUD";
            }

        });
    });
</script>
