<script src="{{ asset('assets/js/vendors.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendors/select2/dist/js/select2.min.js') }}"></script>

<script>
    // Función para obtener estado y color de la base de datos por id_amhs
    function getEstado(id_amhs) {
        return new Promise((resolve, reject) => {
            const estadoCell = document.getElementById('estado' + id_amhs);

            if (!estadoCell) {
                console.error('No se encontró la celda con el ID: estado' + id_amhs);
                reject('No se encontró la celda con el ID: estado' + id_amhs);
                return;
            }

            $.ajax({
                url: '/search_amhs/' + id_amhs,
                method: 'GET',
                success: function(response) {
                    resolve([response.nombre_estado, response.color_estado]);
                },
                error: function(xhr, status, error) {
                    console.error('Error al buscar ficha de progreso:', error);
                    resolve(['Error', '#FF073A']); // Retorna el array en caso de error
                }
            });
        });
    }

    async function ficha_estado(id_estado) {
        try {
            const response = await $.ajax({
                url: '/ficha-estado/' + id_estado,
                method: 'GET'
            });

            if (response.error) {
                console.error('Error en la respuesta:', response.error);
                throw new Error(response.error);
            }

            return {
                nombre_estado: response.estado,
                color: response.color_estado
            };
        } catch (error) {
            console.error('Error en la solicitud:', error);
            throw error;
        }
    }

    // Función para procesar filas en lotes de 20
    function processRows(startIndex, endIndex) {
        const rows = document.querySelectorAll('#amhs-data tr');
        for (let i = startIndex; i < endIndex && i < rows.length; i++) {
            const row = rows[i];
            const id_amhs = row.getAttribute('data-id');
            const estadoCell = document.getElementById('estado' + id_amhs);

            getEstado(id_amhs, function(estado, color) {
                estadoCell.textContent = estado;
                estadoCell.style.color = color;
            });
        }
    }

    // Función para crear la Tabla FPL
    function populateTable(id_vector_viaje, punto_seleccionado,
        name_vector_viaje, distancia_vector_viaje,
        tableBody, estimado_vector, velocidad, nivel, ruta_vector,
        chgRuta_vector, datosComp_vector, splPunto_vector,
        splEst_vector) {

        console.log('JOE TABLA');

        console.log('id_vector_viaje', id_vector_viaje);
        console.log('punto_seleccionado', punto_seleccionado);
        console.log('name_vector_viaje', name_vector_viaje);
        console.log('distancia_vector_viaje', distancia_vector_viaje);
        console.log('tableBody', tableBody);
        console.log('estimado_vector', estimado_vector);
        console.log('velocidad', velocidad);
        console.log('nivel', nivel);
        console.log('ruta_vector', ruta_vector);
        console.log('chgRuta_vector', chgRuta_vector);
        console.log('datosComp_vector', datosComp_vector);
        console.log('splPunto_vector', splPunto_vector);
        console.log('splEst_vector', splEst_vector);

        // Determinar el índice donde cambia de ruta
        var indice_cambio = [];

        for (let i = 0; i < ruta_vector.length - 1; i++) {

            if (ruta_vector[i] !== ruta_vector[i + 1]) {
                var cambioIndice = i + 1; // Índice donde ocurre el cambio
                indice_cambio.push(cambioIndice);
            } else {
                indice_cambio.push(0);
            }
        }

        console.log('INDICE CAMBIO', indice_cambio);

        id_vector_viaje.forEach(function(id, index) {
            // Verifica si el punto está seleccionado
            var isChecked = Number(punto_seleccionado[index]) === 1 ? 'checked' : '';
            var chgRuta = chgRuta_vector[index] ?? '';
            var datosComp = datosComp_vector[index] ?? '';
            var splPunto = splPunto_vector[index] ?? '';
            var splEst = splEst_vector[index] ?? '';

            // Crear una fila de la tabla
            var row = '<tr>' +
                '<td class="checkbox-cell align-middle">' +
                '<div class="custom-control custom-checkbox checkbox-light">' +
                '<input type="checkbox" class="custom-control-input" id="customCheck' + id + '" ' + isChecked +
                '>' +
                '<label class="custom-control-label" for="customCheck' + id + '"></label>' +
                '</div>' +
                '</td>' +

                '<td class="align-middle"><input type="text" class="form-control" name="punto' + id +
                '" id="punto' + id + '" placeholder="Punto" value="' + name_vector_viaje[index] + '"></td>' +

                '<td class="align-middle"><input type="text" class="form-control" name="distancia' + id +
                '" id="distancia' + id + '" placeholder="Distancia" value="' + distancia_vector_viaje[index] +
                '"></td>' +

                '<td class="align-middle"><input type="text" class="form-control" name="estimado' + id +
                '" id="estimado' + id + '" placeholder="Estimado" value="' + estimado_vector[index] +
                '"></td>' +

                '<td class="align-middle"><input type="text" class="form-control" name="velocidad' + id +
                '" id="velocidad' + id + '" placeholder="Velocidad" value="' + velocidad + '"></td>' +

                '<td class="align-middle"><input type="text" class="form-control" name="nivel' + id +
                '" id="nivel' + id + '" placeholder="Nivel" value="' + nivel + '"></td>' +

                '<td class="align-middle"><input type="text" class="form-control" name="ruta' + id +
                '" id="ruta' + id + '" placeholder="Ruta" value="' + ruta_vector[index] + '"></td>';

            /* '<td class="align-middle">' + name_vector_viaje[index] + '</td>' + */
            /* '<td class="align-middle">' + distancia_vector_viaje[index] + '</td>' + */
            /* '<td class="align-middle">' + estimado_vector[index] + '</td>' + */
            /* '<td class="align-middle">' + velocidad + '</td>' + */
            /* '<td class="align-middle">' + nivel + '</td>' + */
            /* '<td class="align-middle">' + ruta_vector[index] + '</td>'; */

            // Verificar si el índice actual es igual al cambioIndice
            if (indice_cambio[index] > 0) {
                // Cambiar el valor de chg_ruta cuando el índice coincide con cambioIndice
                row += '<td class="align-middle"><input type="text" class="form-control" name="chg_ruta' + id +
                    '" id="chg_ruta' + id + '" placeholder="Chg Ruta" value="' + ruta_vector[indice_cambio[
                        index]] +
                    '"></td>';
            } else {
                // Caso normal cuando no hay cambio
                row += '<td class="align-middle"><input type="text" class="form-control" name="chg_ruta' + id +
                    '" id="chg_ruta' + id + '" placeholder="Chg Ruta" value="' + chgRuta + '"></td>';
            }

            row += '<td class="align-middle"><input type="text" class="form-control" name="dat_comp' + id +
                '" id="dat_comp' + id + '" placeholder="Dat Comp" value="' + datosComp + '"></td>' +
                '<td class="align-middle"><input type="text" class="form-control" name="spl_punto' + id +
                '" id="spl_punto' + id + '" placeholder="spl Punto" value="' + splPunto + '"></td>' +
                '<td class="align-middle"><input type="text" class="form-control" name="spl_est' + id +
                '" id="spl_est' + id + '" placeholder="spl Est" value="' + splEst + '"></td>' +
                '</tr>';

            tableBody.append(row);

        });
    }

    function showLoadingIndicatorForm() {
        document.getElementById('loadingIndicatorForm').style.display = 'block';
    }

    function hideLoadingIndicatorForm() {
        document.getElementById('loadingIndicatorForm').style.display = 'none';
    }

    // Funcion para Los options del select "id_rutas""
    function fetchAndPopulateRoutes(url, puntos, selected) {

        // Llamar a la función que muestra el indicador de carga
        showLoadingIndicatorForm();

        var origen = $('#origen').val();
        var destino = $('#destino').val();
        var ruta_predeterminada = 0;

        console.log('ORIGEN', origen);
        console.log('DESTINO', destino);

        var array_option_select = [];
        var id_rutas_encontradas = [];
        var name_rutas_encontradas = [];
        var id_vector_viaje = [];
        var llave_select = [];
        var name_vector_viaje = [];
        var distancia_vector_viaje = [];
        var puntos_mensaje = [];
        var ruta_vector_viaje = [];
        var fpl_punto_seleccionado = [];

        $.ajax({
            url: '/filtrar-rutas',
            type: 'GET',
            data: {
                origen: origen,
                destino: destino
            },
            success: function(response) {
                console.log('Rutas filtradas', response);

                ruta_predeterminada = 1;
                $('#llave_ruta_predeterminada').val(ruta_predeterminada);

                if (response && response.length > 0) {

                    // Recorrer la respuesta usando forEach correctamente
                    response.forEach(function(item) {
                        array_option_select.push(item.array_option_select);
                        id_rutas_encontradas.push(item.id_rutas_encontradas);
                        name_rutas_encontradas.push(item.name_rutas_encontradas);
                        id_vector_viaje.push(item.id_vector_viaje);
                        name_vector_viaje.push(item.name_vector_viaje);
                        distancia_vector_viaje.push(item.distancia_vector_viaje);
                        puntos_mensaje.push(item.puntos_mensaje);
                        ruta_vector_viaje.push(item.ruta_vector_viaje);
                        fpl_punto_seleccionado.push(item.fpl_punto_seleccionado);
                    });

                    /* $('#array_option_select').val(array_option_select);
                    $('#id_rutas_encontradas').val(id_rutas_encontradas);
                    $('#name_rutas_encontradas').val(name_rutas_encontradas);
                    $('#id_vector_viaje').val(id_vector_viaje);
                    $('#name_vector_viaje').val(name_vector_viaje);
                    $('#distancia_vector_viaje').val(distancia_vector_viaje);
                    $('#puntos_mensaje').val(puntos_mensaje);
                    $('#ruta_vector_viaje').val(ruta_vector_viaje); */

                    $('#array_option_select').val(JSON.stringify(array_option_select));
                    $('#id_rutas_encontradas').val(JSON.stringify(
                        id_rutas_encontradas));
                    $('#name_rutas_encontradas').val(JSON.stringify(
                        name_rutas_encontradas));
                    $('#id_vector_viaje').val(JSON.stringify(id_vector_viaje));
                    $('#name_vector_viaje').val(JSON.stringify(name_vector_viaje));
                    $('#distancia_vector_viaje').val(JSON.stringify(
                        distancia_vector_viaje));
                    $('#puntos_mensaje').val(JSON.stringify(puntos_mensaje));
                    $('#ruta_vector_viaje').val(JSON.stringify(ruta_vector_viaje));
                    $('#fpl_punto_seleccionado').val(JSON.stringify(fpl_punto_seleccionado));

                    // Verificar si el array tiene un solo elemento o más de uno
                    /* if (array_option_select.length === 1) {
                        llave_select = 1;
                    } else if (array_option_select.length > 1) {
                        llave_select = 2;
                    } */

                    $('#llave_select').val(llave_select);

                    // Obtener el select por su id
                    const select = document.getElementById("id_rutas");

                    // Resetear el select
                    select.innerHTML = "";

                    // Añadir opción por defecto
                    const defaultOption = document.createElement("option");
                    defaultOption.text = "Seleccione ruta";
                    select.add(defaultOption);

                    // Switch para manejar las distintas respuestas según llave_select

                    array_option_select.forEach(function(optionText, index) {
                        const newOption = document.createElement("option");
                        newOption.text = optionText;
                        newOption.value = index;

                        /* if (selected != -1 && newOption.value === selected) {
                            // Marcar como seleccionada si cumple la condición
                            newOption.selected = true;
                        } */

                        select.add(newOption);
                    });

                    console.log('Array option select:', array_option_select);
                    // Puedes añadir más consolas o manejar los datos como necesites.

                } else {

                    ruta_predeterminada = 0;
                    $('#llave_ruta_predeterminada').val(ruta_predeterminada);

                    // Los options del select "id_rutas"
                    $.ajax({
                        url: '/select-ruta',
                        method: 'POST',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr(
                                'content'), // Incluir el token CSRF para seguridad
                            puntos: puntos // Enviar la variable puntos
                        },
                        success: function(response) {
                            // Imprimir puntos en la consola
                            console.log('Select:', response);

                            var array_option_select = response.array_option_select;
                            var id_rutas_encontradas = response.id_rutas_encontradas;
                            var name_rutas_encontradas = response.name_rutas_encontradas;
                            var id_vector_viaje = response.id_vector_viaje;
                            var llave_select = response.llave_select;
                            var name_vector_viaje = response.name_vector_viaje;
                            var distancia_vector_viaje = response.distancia_vector_viaje;
                            var puntos_mensaje = JSON.stringify(response.puntos_mensaje);
                            var ruta_vector_viaje = response.ruta_vector_viaje;

                            $('#array_option_select').val(JSON.stringify(array_option_select));
                            $('#id_rutas_encontradas').val(JSON.stringify(
                                id_rutas_encontradas));
                            $('#name_rutas_encontradas').val(JSON.stringify(
                                name_rutas_encontradas));
                            $('#id_vector_viaje').val(JSON.stringify(id_vector_viaje));
                            $('#llave_select').val(JSON.stringify(llave_select));
                            $('#name_vector_viaje').val(JSON.stringify(name_vector_viaje));
                            $('#distancia_vector_viaje').val(JSON.stringify(
                                distancia_vector_viaje));
                            $('#puntos_mensaje').val(JSON.stringify(puntos_mensaje));
                            $('#ruta_vector_viaje').val(JSON.stringify(ruta_vector_viaje));

                            // Obtener el select por su id
                            const select = document.getElementById("id_rutas");

                            // Resetear el select
                            select.innerHTML = "";

                            // Añadir opción por defecto
                            const defaultOption = document.createElement("option");
                            defaultOption.text = "Seleccione ruta";
                            select.add(defaultOption);

                            // Switch para manejar las distintas respuestas según llave_select
                            switch (llave_select) {
                                case 1:
                                case 3: {
                                    const newOption = document.createElement("option");
                                    newOption.text = array_option_select;
                                    newOption.value = 'OP1';

                                    console.log('selected', selected);
                                    console.log('newOption.value', newOption.value);

                                    if (selected != -1 && newOption.value === selected) {
                                        // Marcar como seleccionada si cumple la condición
                                        newOption.selected = true;
                                    }

                                    select.add(newOption);
                                    break;
                                }
                                case 2:
                                case 4: {
                                    array_option_select.forEach(function(optionText, index) {
                                        const newOption = document.createElement(
                                            "option");
                                        newOption.text = optionText;
                                        newOption.value = index;

                                        if (selected != -1 && newOption.value ===
                                            selected) {
                                            // Marcar como seleccionada si cumple la condición
                                            newOption.selected = true;
                                        }

                                        select.add(newOption);
                                    });
                                    break;
                                }
                                default: {
                                    // Obtener las rutas desde la variable PHP
                                    var data1 = @json($data1);

                                    console.log('data1',data1);

                                    array_option_select = [];
                                    data1.forEach(function(ruta) {

                                        const newOption = document.createElement(
                                            "option");
                                        newOption.text = ruta.ruta + ' ' + ruta
                                            .cadena_puntos;
                                        newOption.value = ruta.id_ruta;

                                        if (selected != -1 && newOption.value ===
                                            selected) {
                                            // Marcar como seleccionada si cumple la condición
                                            newOption.selected = true;
                                        }

                                        select.add(newOption);
                                    });

                                    id_rutas_encontradas = [0];
                                    name_rutas_encontradas = [''];
                                    $('#id_rutas_encontradas').val(JSON.stringify(
                                        id_rutas_encontradas));
                                    $('#name_rutas_encontradas').val(JSON.stringify(
                                        name_rutas_encontradas));

                                }
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                        }
                    });

                }

            },
            error: function(xhr) {
                console.log('Error al filtrar las rutas');
                console.log(xhr.responseText);
            },
            complete: function() {
                // Llamar a la función que oculta el indicador de carga cuando la operación termine
                hideLoadingIndicatorForm();
            }
        });
    }
</script>

<!-- Primer bloque de script: Definición de funciones -->
<script>
    // Función para obtener los valores de los campos ocultos y los inputs de número
    function getFormData(estado) {
        // Recuperar el objeto FPL de localStorage
        var storedFPL = localStorage.getItem('FPL');
        var FPL = storedFPL ? JSON.parse(storedFPL) : null;
        var id_ruta = FPL ? FPL.idRuta[0] : null;

        return {
            id_amhs: document.getElementById('id').value,
            fecha: document.getElementById('fecha').value,
            hora: document.getElementById('hora').value,
            vuelo: document.getElementById('vuelo').value,
            tipo: document.getElementById('tipo').value,
            origen: document.getElementById('origen').value,
            destino: document.getElementById('destino').value,
            eobt: document.getElementById('eobt').value,
            dep: document.getElementById('dep').value,
            etd: document.getElementById('etd').value,
            reg: document.getElementById('reg').value,
            sel: document.getElementById('sel').value,
            linea_aerea: document.getElementById('linea_aerea').value,
            id_ruta: id_ruta,
            atd: document.getElementById('atd').value,
            est: document.getElementById('est').value,
            nivel: document.getElementById('nivel').value,
            sq: document.getElementById('sq').value,
            ha: document.getElementById('ha').value,
            fpl_json: FPL ? FPL : null,
            velocidad: document.getElementById('velocidad').value,
            mensaje: document.getElementById('descripcion').value,
            estado: estado,
        };
    }

    // Función para enviar los datos mediante AJAX
    function sendDataSave(estado) {
        var data = getFormData(estado);

        return fetch('/transito_aereo', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                return data; // Devolver los datos para su uso posterior
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    // Función para enviar los datos mediante AJAX (PUT)
    function sendDataUpdate(recordId, estado) {
        var data = getFormData(estado);

        fetch('/transito_aereo/' + recordId, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }

    function RegistrarTransito(estado, id) {

        // Enviar la solicitud AJAX al método search_amhs
        $.ajax({
            url: '/search_amhs/' + id,
            method: 'GET',
            success: function(response) {
                if (response.id === null) {
                    sendDataSave(estado);
                    console.log('SAVE');
                } else {
                    sendDataUpdate(id, estado);
                    console.log('UPDATE');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al buscar ficha de progreso:', error);
            }
        });
    }

    function sendProcesoVueloData(data) {

        const url = '/proceso-vuelo';

        fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json()) // Asumir que la respuesta será JSON
            .then(jsonData => {
                console.log('Operación exitosa:', jsonData.message);
                console.log('Registro creado o actualizado:', jsonData.data);
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
                console.error('Hubo un problema con la solicitud:', error.message);
            });
    }

    function fetchProcesoVueloData(id_amhs) {
        const url = `/proceso-vuelo/${id_amhs}`;

        return fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }
                return response.json();
            })
            .then(function(jsonData) {
                return jsonData.data; // Retorna id_estado
            })
            .catch(function(error) {
                // console.error('Error en la solicitud:', error);
                return null; // O un valor por defecto
            });
    }

    function validacion_nivel0() {
        // Selecciona solo los inputs específicos por su id y les agrega readonly
        const ids = [
            "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
            "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
            "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dep2",
            "dest2", "ralt", "dof", "nav", "eet2", "rmk", "rif", "sts", "typ",
            "per", "com", "dat", "altn", "code", "rvr"
        ];

        ids.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.setAttribute('readonly', true); // Poner readonly a los inputs seleccionados
            }
        });

        // Selecciona el textarea y lo pone en readonly
        const textarea = document.getElementById('descripcion');
        if (textarea) {
            textarea.setAttribute('readonly', true); // Poner readonly al textarea
        }

        // Desactivar el botón "edit_fpl"
        const boton = document.getElementById('edit_fpl');
        if (boton) {
            boton.setAttribute('disabled', true); // Desactiva el botón
        }

        // Poner readonly a los inputs específicos
        document.getElementById('atd').readOnly = true;
        document.getElementById('est').readOnly = true;
        document.getElementById('nivel').readOnly = true;
        document.getElementById('sq').readOnly = true;
        document.getElementById('ha').readOnly = true;

        // Desactivar los botones "Test" y "Autorizado"
        const btnTest = document.getElementById('btnTest');
        const btnAutorizado = document.getElementById('btnAutorizado');
        if (btnTest) {
            btnTest.setAttribute('disabled', true); // Desactiva el botón "Test"
        }
        if (btnAutorizado) {
            btnAutorizado.setAttribute('disabled', true); // Desactiva el botón "Autorizado"
        }
        if (rutaButton) {
            rutaButton.setAttribute('disabled', true); // Desactiva el botón "Crear Ruta"
        }

        // Activar el botón "Imprimir"
        const printButton = document.getElementById('printButton');
        if (printButton) {
            printButton.setAttribute('disabled', true); // Desactiva el botón
        }

        // Limpiar la tabla
        var tableBody = $('#datatableFPL tbody');
        tableBody.empty();

        // Limpia el contenedor de la tabla al principio
        $('#ficha_progreso_container').empty();

    }

    function validacion_nivel1() {
        // Selecciona solo los inputs específicos por su id
        const ids = [
            "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
            "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
            "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dep2",
            "dest2", "ralt", "dof", "nav", "eet2", "rmk", "rif", "sts", "typ",
            "per", "com", "dat", "altn", "code", "rvr"
        ];

        // Recorre cada id y quita el atributo readonly
        ids.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.removeAttribute('readonly');
            }
        });

        // Quitar el atributo disabled del botón
        const boton = document.getElementById('edit_fpl');
        if (boton) {
            boton.removeAttribute('disabled');
        }

        const boton2 = document.getElementById('rutaButton');
        if (boton2) {
            boton2.removeAttribute('disabled');
        }

        const boton3 = document.getElementById('btnTest');
        if (boton3) {
            boton3.removeAttribute('disabled');
        }

        const boton4 = document.getElementById('btnAutorizado');
        if (boton4) {
            // boton4.removeAttribute('disabled');
        }

    }

    function validacion_nivel2() {
        // Quitar el atributo readonly de los inputs
        document.getElementById('atd').removeAttribute('readonly');
        document.getElementById('est').removeAttribute('readonly');
        document.getElementById('nivel').removeAttribute('readonly');
        document.getElementById('sq').removeAttribute('readonly');
        // document.getElementById('ha').removeAttribute('readonly');
    }

    function validacion_nivel3() {
        // Selecciona solo los inputs específicos por su id y les agrega readonly
        const ids = [
            "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
            "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
            "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dep2",
            "dest2", "ralt", "dof", "nav", "eet2", "rmk", "rif", "sts", "typ",
            "per", "com", "dat", "altn", "code", "rvr"
        ];

        ids.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                // input.setAttribute('readonly', true); // Poner readonly a los inputs seleccionados
            }
        });

        // Selecciona el textarea y lo pone en readonly
        const textarea = document.getElementById('descripcion');
        if (textarea) {
            // textarea.setAttribute('readonly', true); // Poner readonly al textarea
        }

        // Desactivar el botón "edit_fpl"
        const boton = document.getElementById('edit_fpl');
        if (boton) {
            // boton.setAttribute('disabled', true); // Desactiva el botón
        }

        // Poner readonly a los inputs específicos
        // document.getElementById('atd').readOnly = true;
        // document.getElementById('est').readOnly = true;
        // document.getElementById('nivel').readOnly = true;
        // document.getElementById('sq').readOnly = true;
        // document.getElementById('ha').readOnly = true;

        // Desactivar los botones "Test" y "Autorizado"
        const btnTest = document.getElementById('btnTest');
        const btnAutorizado = document.getElementById('btnAutorizado');
        if (btnTest) {
            // btnTest.setAttribute('disabled', true); // Desactiva el botón "Test"
        }
        if (btnAutorizado) {
            // btnAutorizado.setAttribute('disabled', true); // Desactiva el botón "Autorizado"
        }

        // Activar el botón "Imprimir"
        const printButton = document.getElementById('printButton');
        if (printButton) {
            printButton.removeAttribute('disabled'); // Activa el botón "Imprimir"
        }

        /* fetchProcesoVueloData($('#id').val()).then(function(resultado) {

            var id_vector_viaje = JSON.parse(resultado.id_vector_viaje);
            id_vector_viaje.forEach(function(id, index) {

                checkbox = 'customCheck' + id;
                punto = 'punto' + id;
                distancia = 'distancia' + id;
                estimado = 'estimado' + id;
                velocidad = 'velocidad' + id;
                nivel = 'nivel' + id;
                ruta = 'ruta' + id;
                chg_ruta = 'chg_ruta' + id;
                dat_comp = 'dat_comp' + id;
                spl_punto = 'spl_punto' + id;
                spl_est = 'spl_est' + id;

                // Checkbox con disabled
                document.getElementById(checkbox).disabled = true;

                // Inputs de texto con readonly
                document.getElementById(punto).readOnly = true;
                document.getElementById(distancia).readOnly = true;
                document.getElementById(estimado).readOnly = true;
                document.getElementById(velocidad).readOnly = true;
                document.getElementById(nivel).readOnly = true;
                document.getElementById(ruta).readOnly = true;
                document.getElementById(chg_ruta).readOnly = true;
                document.getElementById(dat_comp).readOnly = true;
                document.getElementById(spl_punto).readOnly = true;
                document.getElementById(spl_est).readOnly = true;
            });

        }); */
    }

    function validacion_cierre() {
        // Selecciona solo los inputs específicos por su id y les agrega readonly
        const ids = [
            "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
            "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
            "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dep2",
            "dest2", "ralt", "dof", "nav", "eet2", "rmk", "rif", "sts", "typ",
            "per", "com", "dat", "altn", "code", "rvr"
        ];

        ids.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.setAttribute('readonly', true); // Poner readonly a los inputs seleccionados
            }
        });

        // Selecciona el textarea y lo pone en readonly
        const textarea = document.getElementById('descripcion');
        if (textarea) {
            textarea.setAttribute('readonly', true); // Poner readonly al textarea
        }

        // Desactivar el botón "edit_fpl"
        const boton = document.getElementById('edit_fpl');
        if (boton) {
            boton.setAttribute('disabled', true); // Desactiva el botón
        }

        // Poner readonly a los inputs específicos
        document.getElementById('atd').readOnly = true;
        document.getElementById('est').readOnly = true;
        document.getElementById('nivel').readOnly = true;
        document.getElementById('sq').readOnly = true;
        document.getElementById('ha').readOnly = true;

        // Deshabilitar el select
        const selectElement = document.getElementById('id_rutas');
        selectElement.disabled = true;

        // Desactivar los botones "Test" y "Autorizado"
        const btnTest = document.getElementById('btnTest');
        const btnAutorizado = document.getElementById('btnAutorizado');
        if (btnTest) {
            btnTest.setAttribute('disabled', true); // Desactiva el botón "Test"
        }
        if (btnAutorizado) {
            btnAutorizado.setAttribute('disabled', true); // Desactiva el botón "Autorizado"
        }
        if (rutaButton) {
            rutaButton.setAttribute('disabled', true); // Desactiva el botón "Crear Ruta"
        }

        // Activar el botón "Imprimir"
        const printButton = document.getElementById('printButton');
        if (printButton) {
            printButton.removeAttribute('disabled'); // Activa el botón "Imprimir"
        }

        fetchProcesoVueloData($('#id').val()).then(function(resultado) {

            var id_vector_viaje = JSON.parse(resultado.id_vector_viaje);
            id_vector_viaje.forEach(function(id, index) {

                checkbox = 'customCheck' + id;
                punto = 'punto' + id;
                distancia = 'distancia' + id;
                estimado = 'estimado' + id;
                velocidad = 'velocidad' + id;
                nivel = 'nivel' + id;
                ruta = 'ruta' + id;
                chg_ruta = 'chg_ruta' + id;
                dat_comp = 'dat_comp' + id;
                spl_punto = 'spl_punto' + id;
                spl_est = 'spl_est' + id;

                // Checkbox con disabled
                document.getElementById(checkbox).disabled = true;

                // Inputs de texto con readonly
                document.getElementById(punto).readOnly = true;
                document.getElementById(distancia).readOnly = true;
                document.getElementById(estimado).readOnly = true;
                document.getElementById(velocidad).readOnly = true;
                document.getElementById(nivel).readOnly = true;
                document.getElementById(ruta).readOnly = true;
                document.getElementById(chg_ruta).readOnly = true;
                document.getElementById(dat_comp).readOnly = true;
                document.getElementById(spl_punto).readOnly = true;
                document.getElementById(spl_est).readOnly = true;
            });

        });
    }

    function limpiarCamposEditFPL() {
        const campos = [
            '#sel', '#dta', '#equipo', '#eet', '#opr', '#turbulencia', '#aeronaves',
            '#aed_alternos', '#dep2', '#dest2', '#ralt', '#dof', '#nav', '#eet2',
            '#rmk', '#rif', '#sts', '#typ', '#per', '#com', '#dat', '#altn', '#code', '#rvr'
        ];

        campos.forEach(function(campo) {
            $(campo).val('');
        });
    }

    function limpiarCamposHidden() {
        // Limpiar valores de los inputs de tipo texto
        $('#id').val('');
        $('#id_estado').val('');
        $('#name_estado').val('');
        $('#color_estado').val('');
        $('#hora').val('');
        $('#puntos').val('');
        $('#dep').val('');
        $('#tipo_fpl').val('');
        $('#array_option_select').val('');
        $('#id_rutas_encontradas').val('');
        $('#name_rutas_encontradas').val('');
        $('#id_vector_viaje').val('');
        $('#llave_select').val('');
        $('#name_vector_viaje').val('');
        $('#distancia_vector_viaje').val('');
        $('#puntos_mensaje').val('');
        $('#ruta_vector_viaje').val('');
    }
</script>

<!-- Primer bloque de script: Definición de funciones de guardado -->
<script>
    $(document).ready(function() {
        $(".select2basico").select2();
    });
</script>

<script>
    $(document).ready(function() {
        $('#datatableScrollY').DataTable({
            "scrollCollapse": true, // Allow table to reduce height when fewer rows are present
            "paging": false, // Disable paging
            "searching": false, // Enable search functionality
            "ordering": true, // Enable ordering
            "info": false, // Disable info text
            "autoWidth": false, // Disable auto width
            "order": [], // No initial order
            "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                } // Disable ordering on first column
            ]
        });
        $('#datatableMet2').DataTable({
            "scrollCollapse": true, // Allow table to reduce height when fewer rows are present
            "paging": false, // Disable paging
            "searching": false, // Enable search functionality
            "ordering": true, // Enable ordering
            "info": false, // Disable info text
            "autoWidth": false // Disable auto width
        });
        $('#datatableFPL').DataTable({
            "scrollY": "400px", // Set vertical scroll height to show approximately 15 rows
            "scrollCollapse": true, // Allow table to reduce height when fewer rows are present
            "paging": false, // Disable paging
            "searching": false, // Disable search functionality
            "ordering": true, // Enable ordering
            "info": false, // Disable info text
            "autoWidth": false // Disable auto width
        });
        // Assign unique IDs to checkboxes
        $('#datatableFPL tbody tr').each(function(index, element) {
            var checkbox = $(this).find('.custom-control-input');
            var label = $(this).find('.custom-control-label');
            var uniqueId = 'customCheck' + index;
            checkbox.attr('id', uniqueId);
            label.attr('for', uniqueId);
        });

        // Copy row text to textarea on row click
        $('#datatableScrollY tbody').on('click', 'tr', function() {

            // Remover fondo de cualquier fila seleccionada previamente
            $('#datatableScrollY tbody tr').css('background-color', '');
            // Aplicar el fondo a la fila seleccionada
            $(this).css('background-color', '#d9eaf7');

            limpiarCamposEditFPL();
            limpiarCamposHidden();
            validacion_nivel0();

            // Recuperar datos del DataTable
            var tipo_fpl = $(this).data('tipo_fpl');

            if (tipo_fpl === 1) {
                var id = $(this).data('id_amhs');
            } else {
                var id = $(this).data('id');
            }

            console.log('id', id);

            var id_estado = $(this).data('id_estado');
            var fecha = $(this).data('fecha');
            var hora = $(this).data('hora'); // "dd HH:MM"
            var partes = hora.split(' '); // ["dd", "HH:MM"]
            var horaSolo = partes[1]; // "HH:MM"
            var vuelo = $(this).data('vuelo');
            var tipo = $(this).data('tipo');
            var origen = $(this).data('origen');
            // var dep = $(this).data('origen');
            var destino = $(this).data('destino');
            var eobt = $(this).data('eobt');
            var linea_aerea = $(this).data('linea_aerea');
            var velocidad = $(this).data('velocidad');
            var mensaje = $(this).data('mensaje');
            var dep = $(this).data('dep');
            var etd = $(this).data('etd');
            var reg = $(this).data('reg');
            var sel = $(this).data('sel');
            var puntos = $(this).data('puntos');
            var regla_tipo = $(this).data('regla_tipo');
            var turbulencia = $(this).data('turbulencia');
            var equipo = $(this).data('equipo');
            var eet = $(this).data('eet');
            var aed_alternos = $(this).data('aed_alternos');
            var dof = $(this).data('dof');
            var rmk = $(this).data('rmk');
            var sts = $(this).data('sts');
            var opr = $(this).data('opr');
            var sel = $(this).data('sel');
            var nav = $(this).data('nav');
            var rvr = $(this).data('rvr');

            // Asignar los valores a los inputs
            $('input[name="id"]').val(id);
            $('#id_estado').val(id_estado);
            $('#fecha').val(fecha);
            $('#hora').val(horaSolo);
            $('#vuelo').val(vuelo);
            $('#tipo').val(tipo);
            $('#origen').val(origen);
            $('#destino').val(destino);
            $('#eobt').val(eobt);
            $('#linea_aerea').val(linea_aerea);
            $('#velocidad').val(velocidad);
            $('#dep').val(dep);
            $('#etd').val(etd);
            $('#reg').val(reg);
            $('#sel').val(sel);
            $('#puntos').val(puntos);
            $('#regla_tipo').val(regla_tipo);
            $('#tipo_fpl').val(tipo_fpl);
            $('#turbulencia').val(turbulencia);
            $('#equipo').val(equipo);
            $('#eet').val(eet);
            $('#aed_alternos').val(aed_alternos);
            $('#dof').val(dof);
            $('#rmk').val(rmk);
            $('#sts').val(sts);
            $('#opr').val(opr);
            $('#sel').val(sel);
            $('#nav').val(nav);
            $('#rvr').val(rvr);

            // Asignar el valor del mensaje al textarea
            $('#descripcion').val(mensaje);

            // Resetear los valores de los inputs a una cadena vacía
            document.getElementById('atd').value = '';
            document.getElementById('est').value = '';
            document.getElementById('nivel').value = '';
            document.getElementById('sq').value = '';
            document.getElementById('ha').value = '';

            // quitar readonly a los inputs Edit FPl
            validacion_nivel1();

            // CORTE
            console.log('PRIMER PASO');

            // Llamar a la función que muestra el indicador de carga
            showLoadingIndicatorForm();

            $.ajax({
                url: `/proceso-vuelo/${$('#id').val()}`,
                method: 'GET',
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content') // CSRF Token para seguridad
                },
                success: function(response) {

                    console.log('RESPONSE', response.data);

                    if (response.data === null) {

                        console.log('El resultado es null');
                        console.log('velocidad', velocidad);

                        console.log('JOE1');

                        // Los options del select "id_rutas"
                        var selected = -1;

                        fetchAndPopulateRoutes('/select-ruta', puntos, selected);

                        //Guardar Registro en la Base de Datos
                        var id_estado_leido = 1; //Leido
                        var nombre_estado = "Leido";
                        var color = "#FF4500";

                        $('#id_estado').val(id_estado_leido);
                        var id_amhs = $('#id').val();
                        // RegistrarTransito(id_estado, id_amhs);

                        console.log("MenoriD AMHS", id_amhs);
                        console.log("MenoriD ID Estado", id_estado_leido);
                        console.log('Nombre del Estado:', nombre_estado);
                        console.log('Color del Estado:', color);

                        const estadoCell = document.getElementById('estado' + id_amhs);
                        estadoCell.textContent = nombre_estado;
                        estadoCell.style.color = color;

                        $('#id_estado').val(id_estado_leido);
                        $('#name_estado').val(nombre_estado);
                        $('#color_estado').val(color);

                    } else {

                        // Loguea la respuesta recibida en la consola
                        console.log('Select:', response);

                        fetchProcesoVueloData($('#id').val()).then(function(resultado) {
                            $('#linea_aerea').val(resultado.linea_aerea);
                            $('#sel').val(resultado.sel);
                            $('#dta').val(resultado.dta);
                            $('#equipo').val(resultado.equipo);
                            $('#eet').val(resultado.eet);
                            $('#opr').val(resultado.opr);
                            $('#turbulencia').val(resultado.turbulencia);
                            $('#aeronaves').val(resultado.aeronaves);
                            $('#aed_alternos').val(resultado.aed_alternos);
                            $('#dep2').val(resultado.dep_alt);
                            $('#dest2').val(resultado.dest_alt);
                            $('#ralt').val(resultado.ralt);
                            $('#dof').val(resultado.dof);
                            $('#nav').val(resultado.nav);
                            $('#eet2').val(resultado.eet_alt);
                            $('#rmk').val(resultado.rmk);
                            $('#rif').val(resultado.rif);
                            $('#sts').val(resultado.sts);
                            $('#typ').val(resultado.typ);
                            $('#per').val(resultado.per);
                            $('#com').val(resultado.com);
                            /* $('#dat').val(resultado.dat); */
                            $('#altn').val(resultado.altn);
                            $('#code').val(resultado.code);
                            $('#rvr').val(resultado.rvr);
                        });

                        resultado = response.data;
                        let id_estado = Number(resultado.id_estado);
                        console.log('resultado', resultado);

                        // Los options del select "id_rutas"
                        var selected = resultado.selected;
                        fetchAndPopulateRoutes('/select-ruta', puntos, selected);

                        if (id_estado >= 2) {

                            // fetchProcesoVueloData($('#id').val()).then(function(resultado) {
                            // Asignar valores a los inputs si no son nulos
                            if (resultado.atd !== null) {
                                document.getElementById('atd').value = resultado.atd;
                            }
                            if (resultado.est !== null) {
                                document.getElementById('est').value = resultado.est;
                            }
                            if (resultado.nivel !== null) {
                                document.getElementById('nivel').value = resultado.nivel;
                            }
                            if (resultado.sq !== null) {
                                document.getElementById('sq').value = resultado.sq;
                            }
                            if (resultado.ha !== null) {
                                document.getElementById('ha').value = resultado.ha;
                            }

                            // Cierre de Edicion de Data

                            if (id_estado >= 3) {

                                // Supongamos que $resultado.updated_at tiene el formato de "YYYY-MM-DDTHH:MM:SS"
                                let updatedAt = resultado.updated_at;
                                let ha = resultado.ha;

                                // Dividimos la fecha y la hora de updatedAt
                                let [fecha, horaCompleta] = updatedAt.split("T");

                                // Extraemos la hora y minutos de resultado.ha
                                let hora = ha.substring(0, 2); // "15"
                                let minutos = ha.substring(2, 4); // "30"

                                // Creamos una nueva fecha y hora combinada
                                let fechaConHora = `${fecha}T${hora}:${minutos}:00`;
                                // Convertimos fechaConHora y la fecha actual en objetos Date
                                let fechaProgramada = new Date(fechaConHora);

                                // Convertir la cadena a un objeto Date
                                const fecha_prog = new Date(fechaProgramada);

                                // Obtener los componentes de la fecha
                                const anio = fecha_prog.getFullYear();
                                const mes = String(fecha_prog.getMonth() + 1).padStart(2,
                                    '0');
                                const dia = String(fecha_prog.getDate()).padStart(2, '0');
                                const horas = String(fecha_prog.getHours()).padStart(2,
                                    '0');
                                const minutos_prog = String(fecha_prog.getMinutes())
                                    .padStart(2,
                                        '0');

                                // Formatear la fecha en el formato deseado
                                const fechaFormateada =
                                    `${anio}-${mes}-${dia} ${horas}:${minutos_prog}`;

                                console.log('fechaProgramada', fechaFormateada);

                                var fechaActual = new Date();

                                // Hora UTC (Tiempo Universal Coordinado)
                                let horaUTC = fechaActual.toUTCString();

                                // Convertir la cadena a un objeto Date
                                const fecha_utc = new Date(horaUTC);

                                // Obtener los componentes de la fecha
                                const anio_utc = fecha_utc.getUTCFullYear();
                                const mes_utc = String(fecha_utc.getUTCMonth() + 1)
                                    .padStart(2, '0');
                                const dia_utc = String(fecha_utc.getUTCDate()).padStart(2,
                                    '0');
                                const horas_utc = String(fecha_utc.getUTCHours()).padStart(
                                    2, '0');
                                const minutos_utc = String(fecha_utc.getUTCMinutes())
                                    .padStart(2, '0');

                                // Formatear la fecha en el formato deseado
                                const fechaFormateada_utc =
                                    `${anio_utc}-${mes_utc}-${dia_utc} ${horas_utc}:${minutos_utc}`;

                                console.log('fechaFormateada_utc', fechaFormateada_utc);

                                // Convertir las fechas a objetos Date
                                const inicio = new Date(fechaFormateada);
                                const fin = new Date(fechaFormateada_utc);

                                // Calcular la diferencia en milisegundos
                                const diferenciaMilisegundos = fin - inicio;

                                // Convertir la diferencia a minutos
                                const diferenciaMinutos = Math.floor(
                                    diferenciaMilisegundos / (1000 * 60));

                                console.log(
                                    `La diferencia en minutos es: ${diferenciaMinutos}`);

                                if (diferenciaMinutos > 60) {
                                    validacion_cierre();

                                    $('#id_estado').val(id_estado_leido);
                                    var id_amhs = $('#id').val();
                                    const estadoCell = document.getElementById('estado' +
                                        id_amhs);

                                    if (estadoCell) { // Asegúrate de que el elemento existe antes de modificarlo

                                        // Eliminar cualquier icono de candado existente (opcional, por si agregas múltiples veces)
                                        const existingIcon = estadoCell.querySelector(
                                            '.fa-lock');
                                        if (existingIcon) {
                                            existingIcon.remove();
                                        }

                                        // Crear el icono de candado usando Font Awesome
                                        const lockIcon = document.createElement("i");
                                        lockIcon.className = "fas fa-lock";
                                        lockIcon.style.marginRight = "5px";

                                        // Insertar el icono antes del texto "Autorizado"
                                        estadoCell.insertBefore(lockIcon, estadoCell
                                            .firstChild);

                                        const procesoVueloData = {
                                            id_amhs: $('#id').val(),
                                            cerrado: 1,
                                        };

                                        // Llamar a la función para enviar los datos
                                        sendProcesoVueloData(procesoVueloData);

                                    } else {
                                        console.error(
                                            "No se encontró el elemento con el ID 'estado" +
                                            id_amhs + "'");
                                    }

                                }

                            }

                            // Cierre de Edicion de Data

                            // Tabla FPL
                            // Limpiar las tablas
                            var tableBody = $('#datatableFPL tbody');
                            tableBody.empty();

                            // Accede a las propiedades del objeto fplObject
                            var id_vector_viaje = JSON.parse(resultado.id_vector_viaje);
                            var punto_seleccionado = JSON.parse(resultado
                                .fpl_punto_seleccionado);
                            var name_vector_viaje = JSON.parse(resultado.fpl_punto);
                            var distancia_vector_viaje = JSON.parse(resultado
                                .fpl_distancia);
                            var estimado_vector = JSON.parse(resultado.est_array);
                            var velocidad = resultado.velocidad;
                            var nivel = resultado.nivel;
                            var ruta_vector = JSON.parse(resultado.fpl_ruta);
                            var chgRuta_vector = JSON.parse(resultado.chg_ruta_array);
                            var datosComp_vector = JSON.parse(resultado.dt_cmp_array);
                            var splPunto_vector = JSON.parse(resultado.spl_punto_array);
                            var splEst_vector = JSON.parse(resultado.spl_est);

                            console.log('PASO GUARDADO');
                            console.log('id_vector_viaje', id_vector_viaje);
                            console.log('punto_seleccionado', punto_seleccionado);
                            console.log('name_vector_viaje', name_vector_viaje);
                            console.log('distancia_vector_via', distancia_vector_viaje);
                            console.log('estimado_vector', estimado_vector);
                            console.log('velocidad', velocidad);
                            console.log('nivel', nivel);
                            console.log('ruta_vector', ruta_vector);
                            console.log('chgRuta_vector', chgRuta_vector);
                            console.log('datosComp_vector', datosComp_vector);
                            console.log('splPunto_vector', splPunto_vector);
                            console.log('splEst_vector', splEst_vector);

                            // Llamar a la función para poblar la tabla
                            populateTable(id_vector_viaje, punto_seleccionado,
                                name_vector_viaje, distancia_vector_viaje,
                                tableBody, estimado_vector, velocidad, nivel,
                                ruta_vector, chgRuta_vector, datosComp_vector,
                                splPunto_vector, splEst_vector);

                            let cod_estado = Number(resultado.id_estado);

                            if (cod_estado === 2) {
                                validacion_nivel2();
                            } else if (cod_estado === 3 || cod_estado === 4) {
                                validacion_nivel3();
                            }

                            //Recuperacion de Ficha Impresa
                            var puntoIdPunto = 0;
                            var sq = resultado.sq;
                            var ha = resultado.ha;
                            var atd = resultado.atd;
                            var nivel = resultado.nivel;
                            var primeraFicha = 0;
                            var formattedDate = '';
                            var equipo = $('#equipo').val();
                            console.log('Equipo impresion', equipo);

                            // Limpia el contenedor de la tabla al principio
                            $('#ficha_progreso_container').empty();

                            var indexUltimaFicha = 0;

                            punto_seleccionado.forEach((value, index) => {
                                if (value === 1) {
                                    indexUltimaFicha = index;
                                }
                            });

                            punto_seleccionado.forEach((value, index) => {
                                if (value === 1) {

                                    console.log('Movimiento2');

                                    var puntoValue_array = JSON.parse(resultado
                                        .fpl_punto);
                                    var puntoValue = puntoValue_array[index];

                                    var estValue_array = JSON.parse(resultado
                                        .est_array);
                                    var estValue = estValue_array[index];

                                    var ruta_array = JSON.parse(resultado.fpl_ruta);
                                    var ruta = ruta_array[index];

                                    var chgRuta_array = JSON.parse(resultado
                                        .chg_ruta_array);
                                    var chgRuta = chgRuta_array[index];

                                    var datComplem_array = JSON.parse(resultado
                                        .dt_cmp_array);
                                    var datComplem = datComplem_array[index];

                                    var splPunto_array = JSON.parse(resultado
                                        .spl_punto_array);
                                    var splPunto = splPunto_array[index];

                                    var splEst_array = JSON.parse(resultado
                                        .spl_est);
                                    var splEst = splEst_array[index];

                                    if (index === indexUltimaFicha) {
                                        var ultimaFicha = 1;
                                    }

                                    // Crear la estructura de la tabla dinámicamente
                                    var tableHtml = ficha_tabla(puntoIdPunto, vuelo,
                                        tipo, velocidad, etd, dep, ruta,
                                        destino, sel, reg, sq, ha,
                                        formattedDate, atd, nivel, puntoValue,
                                        estValue, primeraFicha, ultimaFicha,
                                        chgRuta, datComplem, splPunto,
                                        splEst, equipo);

                                    primeraFicha = 1;

                                    // Añadir la tabla dentro de un nuevo div al contenedor
                                    $('#ficha_progreso_container')
                                        .append(tableHtml);
                                    $('#ficha_progreso_container')
                                        .css('display',
                                            'block'
                                        ); // Asegúrate de que el contenedor esté visible
                                }
                            });

                        } else {
                            //Guardar Registro en la Base de Datos
                            var id_estado_leido = 1; //Leido
                            var nombre_estado = "Leido";
                            var color = "#FF4500";
                            $('#id_estado').val(id_estado_leido);
                            var id_amhs = $('#id').val();
                            const estadoCell = document.getElementById('estado' + id_amhs);
                            estadoCell.textContent = nombre_estado;
                            estadoCell.style.color = color;
                        }

                    }

                },
                error: function() {
                    // Mostrar mensaje de que no se encontró un registro
                    console.log('No se encontró el registro solicitado.');

                },
                complete: function() {
                    // Llamar a la función que oculta el indicador de carga cuando la operación termine
                    hideLoadingIndicatorForm();
                }
            });
        });

    });
</script>

{{-- Select Escogido y Generacion de Tabla FPL --}}
<script>
    /* // Recuperar el valor del input con id "id_estado"
    var id_estado_value = document.getElementById('id_estado').value;

    // Convertir el valor a número
    var id_estado = Number(id_estado_value); */

    $(document).ready(function() {

        // Inicializar select2
        $(".select2basico").select2();

        // TABLA GENERADA POR EL SELECT RUTA
        // Manejar cambio en el select
        $('#id_rutas').on('change', function() {

            validacion_nivel2();

            var selectedRutaId = $(this).val();

            console.log('selectedRutaId CRUTA', selectedRutaId);

            // Uso de la función async/await
            var id_estado;
            // fetchProcesoVueloData($('#id').val()).then(function(resultado) {
            var id_estado = $('#id_estado').val();

            console.log("CHANGE SELECT", id_estado);

            //if (id_estado < 2) {

            // Convertir llave_select a número
            var llave_select = Number($('#llave_select').val());
            console.log('llave_select', llave_select);

            var llave_ruta_predeterminada = JSON.parse($('#llave_ruta_predeterminada').val());
            console.log('llave_ruta_predeterminada', llave_ruta_predeterminada);

            // Ruta y Puntos de Origen Ruta Predeterminada
            if (llave_ruta_predeterminada === 1) {

                console.log('llave_select 222', llave_select);
                console.log('selectedRutaId 222', selectedRutaId);
                console.log('llave_select 222', llave_select);

                const selectedIndex = parseInt(selectedRutaId);
                console.log('selectedIndex', selectedIndex);

                var array_option_select_array = JSON.parse($('#array_option_select').val());
                console.log('array_option_select_array', array_option_select_array);

                var id_rutas_encontradas_array = JSON.parse($('#id_rutas_encontradas').val());
                console.log('id_rutas_encontradas_array', id_rutas_encontradas_array);

                var name_rutas_encontradas_array = JSON.parse($('#name_rutas_encontradas')
                    .val());
                console.log('name_rutas_encontradas_array', name_rutas_encontradas_array);

                var id_vector_viaje_array = JSON.parse($('#id_vector_viaje').val());
                console.log('id_vector_viaje_array', id_vector_viaje_array);

                var name_vector_viaje_array = JSON.parse($('#name_vector_viaje').val());
                console.log('name_vector_viaje_array', name_vector_viaje_array);

                var distancia_vector_viaje_array = JSON.parse($('#distancia_vector_viaje')
                    .val());
                console.log('distancia_vector_viaje_array', distancia_vector_viaje_array);

                var ruta_vector_viaje_array = JSON.parse($('#ruta_vector_viaje').val());
                console.log('ruta_vector_viaje_array', ruta_vector_viaje_array);

                var array_option_select = array_option_select_array[selectedIndex];
                console.log('array_option_select', array_option_select);

                var id_rutas_encontradas = JSON.parse(id_rutas_encontradas_array[selectedIndex]);
                console.log('id_rutas_encontradas', id_rutas_encontradas);

                var name_rutas_encontradas = JSON.parse(name_rutas_encontradas_array[selectedIndex]);
                console.log('name_rutas_encontradas', name_rutas_encontradas);

                var id_vector_viaje = JSON.parse(id_vector_viaje_array[selectedIndex]);
                console.log('id_vector_viaje', id_vector_viaje);

                var name_vector_viaje = JSON.parse(name_vector_viaje_array[selectedIndex]);
                console.log('name_vector_viaje', name_vector_viaje);

                var distancia_vector_viaje = JSON.parse(distancia_vector_viaje_array[selectedIndex]);
                console.log('distancia_vector_viaje', distancia_vector_viaje);

                var ruta_vector_viaje = JSON.parse(ruta_vector_viaje_array[selectedIndex]);
                console.log('id_rutas_encontradas_array', id_rutas_encontradas_array);

                /*  $('#id_rutas_encontradas').val(JSON.stringify(id_rutas_encontradas));
                 $('#name_rutas_encontradas').val(JSON.stringify(name_rutas_encontradas));
                 $('#id_vector_viaje').val(JSON.stringify(id_vector_viaje));
                 $('#name_vector_viaje').val(JSON.stringify(name_vector_viaje));
                 $('#distancia_vector_viaje').val(JSON.stringify(distancia_vector_viaje));
                 $('#ruta_vector_viaje').val(JSON.stringify(ruta_vector_viaje)); */

            } else {

                // Asegurar que id_rutas_encontradas y name_rutas_encontradas son arrays
                var id_rutas_encontradas = JSON.parse($('#id_rutas_encontradas').val());
                var name_rutas_encontradas = JSON.parse($('#name_rutas_encontradas').val());

                console.log('llave_select', llave_select);
                console.log('id_rutas_encontradas', id_rutas_encontradas);
                console.log('name_rutas_encontradas', name_rutas_encontradas);
                console.log('selectedRutaId', selectedRutaId);

                switch (llave_select) {
                    case 1: {

                        var id_vector_viaje = JSON.parse($('#id_vector_viaje').val());
                        var name_vector_viaje = JSON.parse($('#name_vector_viaje').val());
                        var distancia_vector_viaje = JSON.parse($('#distancia_vector_viaje').val());
                        var ruta_vector_viaje = JSON.parse($('#ruta_vector_viaje').val());

                    }
                    break;
                    case 2: {

                        console.log('selectedRutaId', selectedRutaId);

                        const selectedIndex = parseInt(selectedRutaId);

                        var id_vector_viaje_array = JSON.parse($('#id_vector_viaje').val());
                        var name_vector_viaje_array = JSON.parse($('#name_vector_viaje').val());
                        var distancia_vector_viaje_array = JSON.parse($('#distancia_vector_viaje')
                            .val());
                        var ruta_vector_viaje_array = JSON.parse($('#ruta_vector_viaje').val());

                        var id_vector_viaje = id_vector_viaje_array[selectedIndex];
                        var name_vector_viaje = name_vector_viaje_array[selectedIndex];
                        var distancia_vector_viaje = distancia_vector_viaje_array[selectedIndex];
                        var ruta_vector_viaje = ruta_vector_viaje_array[selectedIndex];

                        console.log('id_vector_viaje_array', id_vector_viaje_array);
                        console.log('id_vector_viaje', id_vector_viaje);

                    }
                    break;
                    case 3: {

                        var id_vector_viaje = JSON.parse($('#id_vector_viaje').val());
                        var name_vector_viaje = JSON.parse($('#name_vector_viaje').val());
                        var distancia_vector_viaje = JSON.parse($('#distancia_vector_viaje').val());
                        var ruta_vector_viaje = JSON.parse($('#ruta_vector_viaje').val());

                    }
                    break;
                    case 4: {

                        const selectedIndex = parseInt(selectedRutaId);

                        var id_vector_viaje_array = JSON.parse($('#id_vector_viaje').val());
                        var name_vector_viaje_array = JSON.parse($('#name_vector_viaje').val());
                        var distancia_vector_viaje_array = JSON.parse($('#distancia_vector_viaje')
                            .val());
                        var ruta_vector_viaje_array = JSON.parse($('#ruta_vector_viaje').val());

                        var id_vector_viaje = id_vector_viaje_array[selectedIndex];
                        var name_vector_viaje = name_vector_viaje_array[selectedIndex];
                        var distancia_vector_viaje = distancia_vector_viaje_array[
                            selectedIndex];
                        var ruta_vector_viaje = ruta_vector_viaje_array[selectedIndex];

                    }
                    break;
                    default:
                        console.log("Llave select no válida.");

                        const selectedIndex = selectedRutaId;
                        var data1 = @json($data1);

                        var rutaSeleccionada = data1.find(function(ruta) {
                            return ruta.id_ruta === selectedIndex;
                        });

                        if (rutaSeleccionada) {
                            // Recuperar los puntos de la ruta seleccionada
                            var puntos = rutaSeleccionada.puntos;

                            // Mostrar los puntos en la consola
                            console.log('Puntos de la ruta seleccionada:', puntos);

                            // Opcionalmente puedes recorrer los puntos

                            var id_vector_viaje = [];
                            var name_vector_viaje = [];
                            var distancia_vector_viaje = [];
                            var ruta_vector_viaje = [];

                            // Usamos split para separar por "/" y luego convertirlo a número
                            var id_ruta_numerico = parseInt(rutaSeleccionada.id_ruta.split('/')[
                                0], 10);
                            var name_rutas_encontradas = [];
                            name_rutas_encontradas.push(rutaSeleccionada.ruta);
                            var id_rutas_encontradas = [];
                            id_rutas_encontradas.push(id_ruta_numerico);

                            puntos.forEach(function(punto) {
                                id_vector_viaje.push(punto.id_punto);
                                name_vector_viaje.push(punto.punto);
                                if (punto.distancia !== null) {
                                    distancia_vector_viaje.push(punto.distancia);
                                }
                                ruta_vector_viaje.push(id_ruta_numerico);
                            });

                            distancia_vector_viaje.push('');

                        }
                }

            }

            console.log('id_rutas_encontradas', id_rutas_encontradas);
            console.log('name_rutas_encontradas', name_rutas_encontradas);
            console.log('id_vector_viaje', id_vector_viaje);
            console.log('name_vector_viaje', name_vector_viaje);
            console.log('distancia_vector_viaje', distancia_vector_viaje);
            console.log('ruta_vector_viaje', ruta_vector_viaje);

            // Limpiar la tabla
            var tableBody = $('#datatableFPL tbody');
            tableBody.empty();

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

            // Añadir filas a la tabla y llenar el objeto FPL
            // Iterar sobre id_vector_viaje
            id_vector_viaje.forEach(function(id, index) {
                // Llenar los arrays de FPL
                FPL.idPunto.push(id);
                FPL.Punto.push(name_vector_viaje[index]);
                FPL.idRuta.push(ruta_vector_viaje[index]);
                const valorABuscar = ruta_vector_viaje[index];
                const indice = id_rutas_encontradas.indexOf(valorABuscar);
                const nombreRuta = indice !== -1 ? name_rutas_encontradas[
                        indice] :
                    "No encontrado";
                FPL.Ruta.push(nombreRuta);
                FPL.puntoSeleccionado.push(0);
                FPL.Distancia.push(distancia_vector_viaje[index]);

                FPL.Estimado.push(""); // Inicializar con valores vacíos
                FPL.chgRuta.push(""); // Inicializar con valores vacíos
                FPL.datosComp.push(""); // Inicializar con valores vacíos
                FPL.splPunto.push(""); // Inicializar con valores vacíos
                FPL.splEst.push(""); // Inicializar con valores vacíos
            });

            console.log('FPL', FPL);

            /* FPL.id_estado = id_estado; */

            // Almacenar el objeto FPL en localStorage
            /* localStorage.setItem('FPL', JSON.stringify(FPL));
            console.log('FPL Select', FPL); */

            // Accede al array FPL
            var punto_seleccionado = FPL.puntoSeleccionado;
            var estimado_vector = FPL.Estimado;
            var velocidad = $('#velocidad').val();
            var nivel = $('#nivel').val();
            var chgRuta_vector = FPL.chgRuta;
            var datosComp_vector = FPL.datosComp;
            var splPunto_vector = FPL.splPunto;
            var splEst_vector = FPL.splEst;
            var ruta_vector = FPL.Ruta;

            // Limpiar la tabla
            var tableBody = $('#datatableFPL tbody');
            tableBody.empty();

            // Llamar a la función para poblar la tabla
            populateTable(id_vector_viaje, punto_seleccionado,
                name_vector_viaje, distancia_vector_viaje,
                tableBody, estimado_vector, velocidad, nivel, ruta_vector,
                chgRuta_vector, datosComp_vector, splPunto_vector,
                splEst_vector);

            if (llave_ruta_predeterminada === 1) {

                const selectedIndex = parseInt(selectedRutaId);
                var fpl_id_punto = FPL.idPunto;
                console.log('fpl_id_punto', fpl_id_punto);

                var fpl_punto_seleccionado_array = JSON.parse($('#fpl_punto_seleccionado').val());
                console.log('fpl_punto_seleccionado_array', fpl_punto_seleccionado_array);

                // Validar si fpl_punto_seleccionado_array es un array y no es null
                if (Array.isArray(fpl_punto_seleccionado_array) && fpl_punto_seleccionado_array.length >
                    0 && fpl_punto_seleccionado_array[selectedIndex] !== null) {
                    var fpl_punto_seleccionado = JSON.parse(fpl_punto_seleccionado_array[
                        selectedIndex]);
                    FPL.puntoSeleccionado = fpl_punto_seleccionado;
                    console.log('fpl_punto_seleccionado 333', fpl_punto_seleccionado);

                    FPL.puntoSeleccionado = fpl_punto_seleccionado;

                    fpl_punto_seleccionado.forEach((value, index) => {
                        console.log('index', index);
                        console.log('value', value);

                        if (Number(value) === 1) {
                            // Obtener el id_punto real desde fpl_id_punto usando el index
                            var id_punto = fpl_id_punto[index];

                            // Si el id_punto es válido, marcar el checkbox
                            if (id_punto !== undefined) {
                                $('#customCheck' + id_punto).prop('checked', true);
                            }
                        }
                    });
                }
            }

            $('#fpl_id_punto').val(JSON.stringify(FPL.idPunto));
            $('#fpl_punto').val(JSON.stringify(FPL.Punto));
            $('#fpl_id_ruta').val(JSON.stringify(FPL.idRuta));
            $('#fpl_ruta').val(JSON.stringify(FPL.Ruta));
            $('#est_array').val(JSON.stringify(FPL.Estimado));
            $('#chg_ruta_array').val(JSON.stringify(FPL.chgRuta));
            $('#dt_cmp_array').val(JSON.stringify(FPL.datosComp));
            $('#spl_punto_array').val(JSON.stringify(FPL.splPunto));
            $('#spl_est').val(JSON.stringify(FPL.splEst));

            if (llave_ruta_predeterminada !== 1) {
                $('#fpl_punto_seleccionado').val(JSON.stringify(FPL.puntoSeleccionado));
            }

            $('#fpl_distancia').val(JSON.stringify(FPL.Distancia));
            $('#selectedRutaId').val(selectedRutaId);

            //Guardar Registro en la Base de Datos
            /* RegistrarTransito(id_estado, id_amhs);
            FPL.selected = selectedRutaId; */

            var id_amhs = $('#id').val();
            var id_estado_trabajando = 2;
            var nombre_estado = "Trabajado";
            var color = "#00FFFF";

            console.log('Nombre del Estado TR:', nombre_estado);
            console.log('Color del Estado TR:', color);

            const estadoCell = document.getElementById('estado' + id_amhs);
            estadoCell.textContent = nombre_estado;
            estadoCell.style.color = color;

            $('#id_estado').val(id_estado_trabajando);
            $('#name_estado').val(nombre_estado);
            $('#color_estado').val(color);

            // Actualizar Estado del DataTable
            /* ficha_estado(id_estado_trabajando).then(estado => {
                const estadoCell = document.getElementById('estado' + id_amhs);
                estadoCell.textContent = estado.nombre_estado;
                estadoCell.style.color = estado.color;

                const procesoVueloData = {
                    id_amhs: $('#id').val(),
                    fpl_id_punto: FPL.idPunto,
                    fpl_punto: FPL.Punto,
                    fpl_id_ruta: FPL.idRuta,
                    fpl_ruta: FPL.Ruta,
                    est_array: FPL.Estimado,
                    chg_ruta_array: FPL.chgRuta,
                    dt_cmp_array: FPL.datosComp,
                    spl_punto_array: FPL.splPunto,
                    spl_est: FPL.splEst,
                    fpl_punto_seleccionado: FPL.puntoSeleccionado,
                    fpl_distancia: FPL.Distancia,
                    selected: selectedRutaId,
                    id_estado: id_estado_trabajando,
                    name_estado: estado.nombre_estado,
                    color_estado: estado.color
                };

                // Llamar a la función para enviar los datos
                sendProcesoVueloData(procesoVueloData);

            }).catch(error => {
                console.error('Error:', error);
            }); */

            console.log('', );
            console.log('id_estado:', $('#id_estado').val());
            console.log('name_estado:', $('#name_estado').val());
            console.log('color_estado:', $('#color_estado').val());

            console.log('fpl_id_punto:', FPL.idPunto);
            console.log('fpl_punto:', FPL.Punto);
            console.log('fpl_id_ruta:', FPL.idRuta);
            console.log('fpl_ruta:', FPL.Ruta);
            console.log('est_array:', FPL.Estimado);
            console.log('chg_ruta_array:', FPL.chgRuta);
            console.log('dt_cmp_array:', FPL.datosComp);
            console.log('spl_punto_array:', FPL.splPunto);
            console.log('spl_est:', FPL.splEst);
            console.log('fpl_punto_seleccionado:', FPL.puntoSeleccionado);
            console.log('fpl_distancia:', FPL.Distancia);
            console.log('selected:', selectedRutaId);

            const procesoVueloData = {
                id_amhs: $('#id').val(),

                hora: $('#hora').val(),
                puntos: $('#puntos').val(),
                dep: $('#dep').val(),
                tipo_fpl: $('#tipo_fpl').val(),

                /* array_option_select: $('#array_option_select').val(),
                id_rutas_encontradas: $('#id_rutas_encontradas').val(),
                name_rutas_encontradas: $('#name_rutas_encontradas').val(),
                id_vector_viaje: $('#id_vector_viaje').val(),
                llave_select: $('#llave_select').val(),
                name_vector_viaje: $('#name_vector_viaje').val(), */

                array_option_select: array_option_select,
                id_rutas_encontradas: JSON.stringify(id_rutas_encontradas),
                name_rutas_encontradas: JSON.stringify(name_rutas_encontradas),
                id_vector_viaje: JSON.stringify(id_vector_viaje),
                llave_select: JSON.stringify(llave_select),
                name_vector_viaje: JSON.stringify(name_vector_viaje),
                distancia_vector_viaje: JSON.stringify(distancia_vector_viaje),
                ruta_vector_viaje: JSON.stringify(ruta_vector_viaje),

                fecha: $('#fecha').val(),
                vuelo: $('#vuelo').val(),
                tipo: $('#tipo').val(),
                origen: $('#origen').val(),
                etd: $('#etd').val(),
                destino: $('#destino').val(),
                reg: $('#reg').val(),
                sel: $('#sel').val(),
                dta: $('#dta').val(),
                regla_tipo: $('#regla_tipo').val(),
                eobt: $('#eobt').val(),
                linea_aerea: $('#linea_aerea').val(),
                velocidad: $('#velocidad').val(),
                equipo: $('#equipo').val(),
                eet: $('#eet').val(),
                opr: $('#opr').val(),
                turbulencia: $('#turbulencia').val(),
                aeronaves: $('#aeronaves').val(),
                aed_alternos: $('#aed_alternos').val(),
                dof: $('#dof').val(),
                nav: $('#nav').val(),
                rmk: $('#rmk').val(),
                sts: $('#sts').val(),
                rvr: $('#rvr').val(),
                mensaje: $('#descripcion').val(),

                /* fpl_id_punto: $('#fpl_id_punto').val(),
                fpl_punto: $('#fpl_punto').val(),
                fpl_id_ruta: $('#fpl_id_ruta').val(),
                fpl_ruta: $('#fpl_ruta').val(),
                est_array: $('#est_array').val(),
                chg_ruta_array: $('#chg_ruta_array').val(),
                dt_cmp_array: $('#dt_cmp_array').val(),
                spl_punto_array: $('#spl_punto_array').val(),
                spl_est: $('#spl_est').val(),
                fpl_punto_seleccionado: $('#fpl_punto_seleccionado').val(),
                fpl_distancia: $('#fpl_distancia').val(),
                selected: $('#selectedRutaId').val(), */

                fpl_id_punto: JSON.stringify(FPL.idPunto),
                fpl_punto: JSON.stringify(FPL.Punto),
                fpl_id_ruta: JSON.stringify(FPL.idRuta),
                fpl_ruta: JSON.stringify(FPL.Ruta),
                est_array: $('#est_array').val(),
                chg_ruta_array: JSON.stringify(FPL.chgRuta),
                dt_cmp_array: JSON.stringify(FPL.datosComp),
                spl_punto_array: JSON.stringify(FPL.splPunto),
                spl_est: JSON.stringify(FPL.splEst),
                fpl_punto_seleccionado: JSON.stringify(FPL.puntoSeleccionado),
                fpl_distancia: JSON.stringify(FPL.Distancia),
                selected: selectedRutaId,

                id_estado: $('#id_estado').val(),
                name_estado: $('#name_estado').val(),
                color_estado: $('#color_estado').val()
            };

            console.log('sendProcesoVueloData 222');
            sendProcesoVueloData(procesoVueloData);

            /* } else {
                console.error("No se pudo obtener id_estado");
            } */
            /*             }).catch(function(error) {
                            console.error('Error al obtener el estado del vuelo:', error);
            }); */

        });
        // TABLA GENERADA POR EL SELECT RUTA

    });
</script>
{{-- Select Escogido y Generacion de Tabla FPL --}}

<!-- checkInputs -->
<script>
    $(document).ready(function() {

        /* Impresion de Fichas de Proceso de Vuelo */
        $(document).on('change', '.custom-control-input', function() {

            var isChecked = $(this).is(':checked');
            var checkboxId = $(this).attr('id'); // Obtener el id del checkbox
            var puntoIdPunto = checkboxId.replace('customCheck', ''); // Extraer punto.id_punto
            puntoIdPunto = parseInt(puntoIdPunto, 10); // Convertir puntoIdPunto a número

            console.log('puntoIdPunto', puntoIdPunto);
            var fpl_id_punto = JSON.parse($('#fpl_id_punto').val());

            var llave_ruta_predeterminada = parseInt($('#llave_ruta_predeterminada').val());
            var selectedRutaId = $('#selectedRutaId').val();

            if (llave_ruta_predeterminada === 1) {

                const selectedIndex = parseInt(selectedRutaId);
                var fpl_punto_seleccionado_array = JSON.parse($('#fpl_punto_seleccionado').val());

                console.log('selectedIndex', selectedIndex);

                // Obtener una copia del array seleccionado en la posición selectedIndex
                var fpl_punto_seleccionado = JSON.parse(fpl_punto_seleccionado_array[selectedIndex]);

                console.log('fpl_punto_seleccionado ANTES', fpl_punto_seleccionado);
                console.log('fpl_punto_seleccionado_array ANTES', fpl_punto_seleccionado_array);

                // Encontrar el índice del valor en el array fpl_id_punto
                var indice = fpl_id_punto.indexOf(puntoIdPunto);

                // Verificar si el índice es válido (mayor o igual a 0)
                if (indice !== -1) {
                    // Asignar puntoIdPunto al array fpl_punto_seleccionado en la misma posición
                    fpl_punto_seleccionado[indice] = 1;

                    // Guardar los cambios en fpl_punto_seleccionado_array sin afectar los demás arrays
                    fpl_punto_seleccionado_array[selectedIndex] = JSON.stringify(
                        fpl_punto_seleccionado);

                    console.log('fpl_punto_seleccionado DESPUES', fpl_punto_seleccionado);
                    console.log('fpl_punto_seleccionado_array DESPUES', fpl_punto_seleccionado_array);

                    // Actualizar el campo con el array modificado
                    $('#fpl_punto_seleccionado').val(JSON.stringify(fpl_punto_seleccionado_array));
                } else {
                    console.log("puntoIdPunto no se encuentra en el array fpl_id_punto");
                }

            } else {

                var fpl_punto_seleccionado = JSON.parse($('#fpl_punto_seleccionado').val());

                // Encontrar el índice del valor en el array fpl_id_punto
                var indice = fpl_id_punto.indexOf(puntoIdPunto);

                // Verificar si el índice es válido (mayor o igual a 0)
                if (indice !== -1) {
                    // Asignar puntoIdPunto al array fpl_punto_seleccionado en la misma posición
                    fpl_punto_seleccionado[indice] = 1;

                    console.log("Valor grabado en fpl_punto_seleccionado:", fpl_punto_seleccionado);
                } else {
                    console.log("puntoIdPunto no se encuentra en el array fpl_id_punto");
                }

                $('#fpl_punto_seleccionado').val(JSON.stringify(fpl_punto_seleccionado));

            }

        });
    });
</script>
<!-- checkInputs -->

{{-- Validacion de los Campos de Autorizacion FPL --}}
{{-- Maneja los calculos de Estimado a partir de la escritura en el campo EST --}}
<script>
    $(document).ready(function() {

        // Función para completar con ceros a la izquierda y validar formato HHMM
        function completarYValidarHHMM(value) {
            // Completar con ceros a la izquierda para asegurar que tenga 4 dígitos
            value = ('0000' + value).slice(-4);

            // Validar formato HHMM
            var regex = /^([01]\d|2[0-3])[0-5]\d$/; // Regex para validar HHMM
            if (!regex.test(value)) {
                return {
                    valid: false,
                    value: value
                };
            }

            return {
                valid: true,
                value: value
            };
        }

        // Aplicar la función de validación a un input específico
        function validarInput(inputId, errorId) {
            $(inputId).on('input', function() {
                var inputValue = $(this).val(); // Obtener el valor del campo de entrada

                var result = completarYValidarHHMM(inputValue);

                if (!result.valid) {
                    $(errorId).remove(); // Eliminar cualquier mensaje de error previo
                    $('<div id="' + errorId.substring(1) +
                        '" style="color: red;">Formato no válido HHMM</div>').insertAfter(inputId);

                    // Desactiva el botón "Autorizado"
                    btnAutorizado.setAttribute('disabled', true);

                } else {
                    $(errorId).remove(); // Eliminar mensaje de error si el formato es válido

                    // Activa el botón "Autorizado"
                    // btnAutorizado.removeAttribute('disabled');

                }

                // Actualizar el valor del input con el valor completado
                $(this).val(result.value);
            });
        }

        // Aplicar la validación a los inputs ATD y HA
        validarInput('#atd', '#atd-error');
        // validarInput('#ha', '#ha-error');

        // Función de validación para el input #est
        $('#est').on('input', function() {
            // Obtener el valor del campo de entrada
            var estValue = $(this).val();
            console.log('Estimado Value', estValue);

            var result = completarYValidarHHMM(estValue);

            if (!result.valid) {
                $('#est-error').remove(); // Eliminar cualquier mensaje de error previo
                $('<div id="est-error" style="color: red;">Formato no válido HHMM</div>').insertAfter(
                    '#est');

                // Desactiva el botón "Autorizado"
                btnAutorizado.setAttribute('disabled', true);

                return; // Salir de la función si el formato no es válido
            } else {
                $('#est-error').remove(); // Eliminar mensaje de error si el formato es válido

                // Activa el botón "Autorizado"
                // btnAutorizado.removeAttribute('disabled');

            }

            // Actualizar el valor del input con el valor completado
            $(this).val(result.value);

            // Convertir estValue a número
            var estValueNum = parseFloat(result.value);
            // Obtener y convertir el valor del input hidden con id "velocidad" a número
            var velocidad = parseFloat($('#velocidad').val());

            // Verificar si estValue y velocidad son números válidos
            if (isNaN(estValueNum) || isNaN(velocidad)) {
                // console.error('El valor de EST o la velocidad no son números válidos');
                return;
            }

            if (result.valid) {
                // Calculo de Estimado
                // fetchProcesoVueloData($('#id').val()).then(function(resultado) {
                // var fpl_id_punto = JSON.parse(resultado.fpl_id_punto);
                var fpl_id_punto = JSON.parse($('#fpl_id_punto').val());
                console.log('EST fpl_id_punto', fpl_id_punto);

                contador_fila = 0;
                vector_est = [];
                vector_distancia = [];

                fpl_id_punto.forEach((value,
                    index) => {

                    console.log('JOSE INCIO');
                    console.log('contador_fila', contador_fila);

                    if (contador_fila === 0) {
                        var estimadoActualizado = result.value;

                        console.log('Estimado Actualizado', estimadoActualizado);

                        var estimado_value = 'estimado' + fpl_id_punto[index];
                        $('input[name="' + estimado_value + '"]').val(estimadoActualizado);

                    } else {
                        index_anterior = contador_fila - 1;
                        var prevDistancia = vector_distancia[index_anterior];
                        var prevEstimado = vector_est[index_anterior];

                        // Convertir prevEstimado a minutos
                        var prevHoras = parseInt(prevEstimado.substring(0, 2));
                        var prevMinutos = parseInt(prevEstimado.substring(2, 4));
                        var totalPrevMinutos = (prevHoras * 60) + prevMinutos;

                        console.log('totalPrevMinutos', totalPrevMinutos);
                        console.log('prevDistancia', prevDistancia);

                        // Verificar si prevDistancia y prevEstimado son números válidos
                        if (isNaN(prevDistancia) || isNaN(totalPrevMinutos)) {
                            console.error(
                                'El valor de distancia o estimado de la fila anterior no es un número válido'
                            );
                            return;
                        }

                        // Calcular los minutos adicionales
                        var minutosAdicionales = (prevDistancia / velocidad) * 60;

                        // Calcular el estimado actualizado en minutos totales
                        var estimadoActualizadoMinutos = totalPrevMinutos + minutosAdicionales;

                        // Convertir el estimado actualizado a formato hhmm
                        var horasActualizadas = Math.floor(estimadoActualizadoMinutos / 60);
                        var minutosActualizados = Math.round(
                            estimadoActualizadoMinutos % 60);

                        // Formatear horas y minutos a dos dígitos
                        var estimadoActualizado = ('0' + horasActualizadas).slice(-2) + ('0' +
                            minutosActualizados).slice(-2);

                        // Actualizar la columna "Estimado" de la fila actual
                        // $(this).find('td').eq(3).text(estimadoActualizado);

                        var estimado_value = 'estimado' + fpl_id_punto[index];
                        $('input[name="' + estimado_value + '"]').val(estimadoActualizado);

                        // Actualizar FPL.Estimado[] con el nuevo valor
                        // FPL.Estimado[index] = estimadoActualizado;

                    }

                    console.log('Estimado Actualizado', estimadoActualizado);
                    vector_est[contador_fila] = estimadoActualizado;
                    distancia_value = 'distancia' + fpl_id_punto[index];
                    vector_distancia[contador_fila] = $('#' + distancia_value).val();
                    contador_fila++;

                    console.log('Vector EST', vector_est);
                    console.log('Distancia EST', vector_distancia);

                });

                /* const procesoVueloData = {
                    id_amhs: $('#id').val(),
                    est: vector_est[0],
                    est_array: vector_est,
                };

                sendProcesoVueloData(procesoVueloData); */

                /* $('#est').val(vector_est[0]); */
                $('#est_array').val(JSON.stringify(vector_est));

                // });

            }

        });

        // Función para validar el nivel
        function validarNivel(value) {
            // Completar con ceros a la izquierda para asegurar que tenga 3 dígitos
            value = ('000' + value).slice(-3);

            // Convertir el valor a número
            var nivelNum = parseInt(value);

            // Validar el nivel según las reglas especificadas
            if (nivelNum <= 195) {
                if (nivelNum % 5 !== 0) {
                    return {
                        valid: false,
                        value: value
                    };
                }
            } else if (nivelNum >= 200) {
                if (nivelNum % 10 !== 0) {
                    return {
                        valid: false,
                        value: value
                    };
                }
            } else {
                return {
                    valid: false,
                    value: value
                };
            }

            return {
                valid: true,
                value: value
            };
        }

        // Aplicar la función de validación al input #nivel
        function validarInputNivel(inputId, errorId) {
            $(inputId).on('input', function() {
                var inputValue = $(this).val(); // Obtener el valor del campo de entrada

                var result = validarNivel(inputValue);

                if (!result.valid) {
                    $(errorId).remove(); // Eliminar cualquier mensaje de error previo
                    $('<div id="' + errorId.substring(1) +
                        '" style="color: red;">Formato no válido</div>').insertAfter(inputId);

                    // Desactiva el botón "Autorizado"
                    btnAutorizado.setAttribute('disabled', true);

                } else {
                    $(errorId).remove(); // Eliminar mensaje de error si el formato es válido

                    // Activa el botón "Autorizado"
                    // btnAutorizado.removeAttribute('disabled');

                }

                // Actualizar el valor del input con el valor completado
                $(this).val(result.value);
            });
        }

        // Aplicar la validación al input NIVEL
        validarInputNivel('#nivel', '#nivel-error');

        // Evento para llenar la columna Nivel
        $('input[name="nivel"]').on('input', function() {
            var nivelValue = $(this).val(); // Obtener el valor del campo de entrada

            // Recuperar el objeto FPL de localStorage
            /* var storedFPL = localStorage.getItem('FPL');
            var FPL = storedFPL ? JSON.parse(storedFPL) : null;
            if (!FPL) {
                console.error('No se encontró el objeto FPL en localStorage');
                return;
            } */

            // Actualizar FPL.Nivel[0] con el valor de velocidad
            /* FPL.Nivel[0] = nivelValue; */

            // Guardar el objeto FPL actualizado en localStorage
            /* localStorage.setItem('FPL', JSON.stringify(FPL));
            console.log('FPL Nivel', FPL); */

            // Seleccionar todas las celdas de la columna "Nivel" y actualizar su valor
            $('#datatableFPL tbody tr').each(function() {
                // $(this).find('td').eq(5).text(nivelValue);
                fetchProcesoVueloData($('#id').val()).then(function(resultado) {
                    var fpl_id_punto = JSON.parse(resultado.fpl_id_punto);

                    fpl_id_punto.forEach((value,
                        index) => {
                        var estimado_value = 'nivel' + fpl_id_punto[index];
                        $('input[name="' + estimado_value + '"]').val(
                            nivelValue);
                    });

                });
            });

        });

        // Evento para cargar SQ
        /* $('input[name="nivel"]').on('input', function() {
            var nivelValue = $(this).val(); // Obtener el valor del campo de entrada

            // Recuperar el objeto FPL de localStorage
            var storedFPL = localStorage.getItem('FPL');
            var FPL = storedFPL ? JSON.parse(storedFPL) : null;
            if (!FPL) {
                console.error('No se encontró el objeto FPL en localStorage');
                return;
            }

            // Actualizar FPL.Nivel[0] con el valor de velocidad
            FPL.Nivel[0] = nivelValue;

            // Guardar el objeto FPL actualizado en localStorage
            localStorage.setItem('FPL', JSON.stringify(FPL));
            console.log('FPL SQ', FPL);

            // Seleccionar todas las celdas de la columna "Nivel" y actualizar su valor
            $('#datatableFPL tbody tr').each(function() {
                $(this).find('td').eq(5).text(
                    nivelValue); // Cambiar el índice de columna si es necesario
            });

        }); */

        // Función para validar el campo SQ
        function validarSQ(value) {
            // Validar que el número no sea 7500, 7600 o 7700
            var sqNum = parseInt(value);
            if (sqNum === 7500 || sqNum === 7600 || sqNum === 7700) {
                return {
                    valid: false,
                    value: value,
                    mensaje: "El código ingresado está reservado para emergencias. ¿Estás seguro de querer poner este código?"
                };
            }

            // Completar con ceros a la izquierda para asegurar que tenga 4 dígitos
            value = ('0000' + value).slice(-4);

            return {
                valid: true,
                value: value
            };
        }

        // Aplicar la función de validación al input #sq
        function validarInputSQ(inputId, errorId) {
            $(inputId).on('input', function(e) {
                var inputValue = $(this).val();

                // Impedir escribir los dígitos 8 y 9
                if (/8|9/.test(inputValue)) {
                    $(this).val(inputValue.replace(/8|9/g, ''));
                    return;
                }

                var result = validarSQ(inputValue);

                if (!result.valid) {
                    $(errorId).remove(); // Eliminar cualquier mensaje de error previo
                    $('<div id="' + errorId.substring(1) + '" style="color: red;">' + result.mensaje +
                        '</div>').insertAfter(inputId);

                    // Si el código está reservado para emergencias, mostrar una alerta
                    if (result.mensaje.includes("reservado para emergencias")) {
                        var confirmacion = confirm(result.mensaje);
                        if (!confirmacion) {
                            $(this).val('0000'); // Completar el campo con 0000 si no está seguro
                        }
                    }
                } else {
                    $(errorId).remove(); // Eliminar mensaje de error si el formato es válido
                    // Actualizar el valor del input con el valor completado
                    $(this).val(result.value);
                }
            });

            // Impedir pegar los dígitos 8 y 9
            $(inputId).on('paste', function(e) {
                var pasteData = e.originalEvent.clipboardData.getData('text');
                if (/8|9/.test(pasteData)) {
                    e.preventDefault();
                }
            });
        }

        // Aplicar la validación al input SQ
        validarInputSQ('#sq', '#sq-error');

    });
</script>
{{-- Maneja los calculos de Estimado a partir de la escritura en el campo EST --}}

{{-- Actualizar campos ATD SQ HA en el objeto FPL --}}
<script>
    // Validacion Boton Test y Autorizado
    document.addEventListener('DOMContentLoaded', function() {
        // Obtén los elementos de los inputs y los botones
        const estInput = document.getElementById('est');
        const nivelInput = document.getElementById('nivel');
        const sqInput = document.getElementById('sq');
        // const haInput = document.getElementById('ha');
        // const btnTest = document.getElementById('btnTest'); // Botón "Test"
        const btnAutorizado = document.getElementById('btnAutorizado'); // Botón "Autorizado"

        // Función que revisa si todos los inputs están llenos y nivel es mayor a 0
        function checkInputs() {
            const nivelValue = parseFloat(nivelInput.value); // Convertir a número

            if (estInput.value !== '' && nivelValue > 0 && sqInput.value !== '') {
                // btnTest.removeAttribute('disabled'); // Activa el botón "Test" si todos están llenos y nivel > 0
                // Activa el botón "Autorizado" si todos están llenos y nivel > 0
                btnAutorizado.removeAttribute('disabled');
            } else {
                // btnTest.setAttribute('disabled', true); // Desactiva el botón "Test" si alguno está vacío o nivel <= 0
                // Desactiva el botón "Autorizado"
                btnAutorizado.setAttribute('disabled', true);
            }
        }

        // Añadir eventos de cambio o input a los campos para verificar
        estInput.addEventListener('input', checkInputs);
        nivelInput.addEventListener('input', checkInputs);
        sqInput.addEventListener('input', checkInputs);
    });
</script>
{{-- Actualizar campos ATD SQ HA en el objeto FPL --}}

{{-- Validacion Boton Autorizado --}}
<script>
    // Función para verificar si los campos tienen valor mayor a 0
    function checkInputs() {
        const atd = parseFloat(document.getElementById('atd').value) || 0;
        const est = parseFloat(document.getElementById('est').value) || 0;
        const nivel = parseFloat(document.getElementById('nivel').value) || 0;
        const sq = parseFloat(document.getElementById('sq').value) || 0;

        // Verificar si todos los valores son mayores a 0
        if (atd > 0 && est > 0 && nivel > 0 && sq > 0) {
            document.getElementById('btnAutorizado').disabled = false;
            console.log('AUTORIZADO ON');

        } else {
            document.getElementById('btnAutorizado').disabled = true;
            console.log('AUTORIZADO OFF');
        }
    }

    // Agregar eventos de cambio en los campos para verificar los valores
    document.getElementById('atd').addEventListener('input', checkInputs);
    document.getElementById('est').addEventListener('input', checkInputs);
    document.getElementById('nivel').addEventListener('input', checkInputs);
    document.getElementById('sq').addEventListener('input', checkInputs);
</script>
{{-- Validacion Boton Autorizado --}}

<!-- Segundo bloque de script: Lógica del DOM y eventos -->
{{-- Boton Autorizado --}}
<script>
    document.getElementById('btnAutorizado').addEventListener('click', function() {

        validacion_nivel3();
        var id_estado_autorizado = 3; // Autorizado
        var nombre_estado = "Autorizado";
        var color = "#D02090";

        // Guardar Registro en la Base de Datos
        const id_amhs = $('#id').val();

        console.log('Nombre del Estado AU:', nombre_estado);
        console.log('Color del Estado AU:', color);

        // Obtener la fecha y hora actual en UTC
        let now = new Date();
        let hoursUTC = now.getUTCHours();
        let minutesUTC = now.getUTCMinutes();

        // Formatear la hora y los minutos para que siempre tengan 2 dígitos
        let formattedTime = hoursUTC.toString().padStart(2, '0') + minutesUTC.toString()
            .padStart(2, '0');

        // Poner el valor formateado en el campo de entrada
        $('#ha').val(formattedTime);

        const estadoCell = document.getElementById('estado' + id_amhs);
        estadoCell.textContent = nombre_estado;
        estadoCell.style.color = color;

        const procesoVueloData = {
            id_amhs: id_amhs,
            ha: formattedTime,
            id_estado: id_estado_autorizado,
            name_estado: nombre_estado,
            color_estado: color,
        };

        console.log('procesoVueloData', procesoVueloData);

        // Llamar a la función para enviar los datos
        sendProcesoVueloData(procesoVueloData);

    });
</script>
{{-- Boton Autorizado --}}

{{-- Boton Test --}}
<script>
    $(document).ready(function() {
        $('#btnTest').on('click', function() {

            // Obtener la fecha y hora actual en UTC
            let now = new Date();
            let hoursUTC = now.getUTCHours();
            let minutesUTC = now.getUTCMinutes();

            // Formatear la hora y los minutos para que siempre tengan 2 dígitos
            let formattedTime = hoursUTC.toString().padStart(2, '0') + minutesUTC.toString()
                .padStart(2, '0');

            // Poner el valor formateado en el campo de entrada
            $('#ha').val(formattedTime);

            //Recuperacion de Ficha Impresa
            var puntoIdPunto = 0;
            var atd = $('#atd').val();
            var sq = $('#sq').val();
            var ha = $('#ha').val();
            var nivel = $('#nivel').val();
            var velocidad = $('#velocidad').val();
            var formattedDate = '';
            var vuelo = $('#vuelo').val();
            var tipo = $('#tipo').val();
            var etd = $('#etd').val();
            var dep = $('#dep').val();
            var destino = $('#destino').val();
            var sel = $('#sel').val();
            var reg = $('#reg').val();
            var primeraFicha = 0;
            var equipo = $('#equipo').val();
            var est = $('#est').val();

            var fpl_id_punto = JSON.parse($('#fpl_id_punto').val());
            var rutaId = parseInt($('#id_ruta_predeterminada').val()) + 0;

            var llave_ruta_predeterminada = parseInt($('#llave_ruta_predeterminada').val());
            var selectedRutaId = $('#selectedRutaId').val();

            console.log('rutaId', rutaId);

            if (llave_ruta_predeterminada === 1 || rutaId > 0) {

                console.log('llave_ruta_predeterminada', llave_ruta_predeterminada);

                if (llave_ruta_predeterminada === 1) {
                    const selectedIndex = parseInt(selectedRutaId);
                    var fpl_punto_seleccionado_array = JSON.parse($('#fpl_punto_seleccionado').val());
                    var fpl_punto_seleccionado = JSON.parse(fpl_punto_seleccionado_array[
                        selectedIndex]);

                    var array_option_select_array = JSON.parse($('#array_option_select').val());
                    console.log('array_option_select_array', array_option_select_array);

                    var array_option_select = array_option_select_array[selectedIndex];
                    console.log('array_option_select', array_option_select);
                } else {
                    var array_option_select = $('#array_option_select').val();
                    var fpl_punto_seleccionado = JSON.parse($('#fpl_punto_seleccionado').val());
                }

                // Llamar a la función que muestra el indicador de carga
                showLoadingIndicatorForm();

                // Actualizar los Puntos Seleccionados en la Ruta Predeterminada
                $.ajax({
                    url: '/actualizar-ruta-predeterminada', // URL sin rutaId
                    type: 'POST', // Cambiado a POST
                    data: {
                        _token: "{{ csrf_token() }}", // Token CSRF para proteger la solicitud
                        origen: dep,
                        destino: destino,
                        array_option_select: array_option_select,
                        fpl_punto_seleccionado: fpl_punto_seleccionado,
                    },
                    success: function(response) {
                        console.log('Ruta Predeterminada actualizada exitosamente');
                        console.log('Response', response);

                    },
                    error: function(xhr) {
                        console.log('Error al actualizar la ruta');
                        console.log(xhr.responseText);
                    },
                    complete: function() {
                        // Llamar a la función que oculta el indicador de carga cuando la operación termine
                        hideLoadingIndicatorForm();
                    }
                });

            } else {

                var fpl_punto_seleccionado = JSON.parse($('#fpl_punto_seleccionado').val());

            }

            console.log('fpl_punto_seleccionado', fpl_punto_seleccionado);
            console.log('id_ruta_predeterminada', rutaId);

            // Limpia el contenedor de la tabla al principio
            $('#ficha_progreso_container').empty();

            punto_array = [];
            ruta_array = [];
            CR_array = [];
            DC_array = [];
            SP_array = [];
            SE_array = [];
            var indexUltimaFicha = 0;

            fpl_punto_seleccionado.forEach((value, index) => {
                if (parseInt(value) === 1) {
                    indexUltimaFicha = index;
                }
            });

            fpl_punto_seleccionado.forEach((value, index) => {

                var estValue_array = JSON.parse($('#est_array').val());
                var estValue = estValue_array[index];
                var puntoValue = $('#punto' + fpl_id_punto[index]).val();
                var ruta = $('#ruta' + fpl_id_punto[index]).val();
                var chgRuta = $('#chg_ruta' + fpl_id_punto[index]).val();
                var datComplem = $('#dat_comp' + fpl_id_punto[index]).val();
                var splPunto = $('#spl_punto' + fpl_id_punto[index]).val();
                var splEst = $('#spl_est' + fpl_id_punto[index]).val();

                punto_array[index] = puntoValue;
                ruta_array[index] = ruta;
                CR_array[index] = chgRuta;
                DC_array[index] = datComplem;
                SP_array[index] = splPunto;
                SE_array[index] = splEst;

                if (parseInt(value) === 1) {

                    if (index === indexUltimaFicha) {
                        var ultimaFicha = 1;
                    }

                    // Crear la estructura de la tabla dinámicamente
                    var tableHtml = ficha_tabla(puntoIdPunto, vuelo, tipo,
                        velocidad, etd, dep, ruta, destino, sel, reg, sq, ha,
                        formattedDate, atd, nivel, puntoValue, estValue, primeraFicha,
                        ultimaFicha, chgRuta,
                        datComplem, splPunto, splEst, equipo);

                    primeraFicha = 1;

                }

                // Añadir la tabla dentro de un nuevo div al contenedor
                $('#ficha_progreso_container').append(tableHtml);
                // Asegúrate de que el contenedor esté visible
                $('#ficha_progreso_container').css('display', 'block');

            });

            console.log('CR', CR_array);
            console.log('DC', DC_array);
            console.log('SP', SP_array);
            console.log('SE', SE_array);

            const procesoVueloData = {
                id_amhs: $('#id').val(),
                fpl_punto: punto_array,
                fpl_ruta: ruta_array,
                fpl_punto_seleccionado: fpl_punto_seleccionado,
                est_array: JSON.parse($('#est_array').val()),
                chg_ruta_array: CR_array,
                dt_cmp_array: DC_array,
                spl_punto_array: SP_array,
                spl_est: SE_array,
                atd: atd,
                est: est,
                nivel: nivel,
                sq: sq,
                ha: ha,
            };

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

            // });

        });
    });
</script>
{{-- Boton Test --}}

{{-- Estilo Text Fecha Tabla de Impresion de Fichas --}}
<style>
    .small-text {
        font-size: 10px;
        font-weight: bold;
    }
</style>
{{-- Estilo Text Fecha Tabla de Impresion de Fichas --}}
