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
                estadoCell.style.fontWeight = "bold";
            });
        }
    }

    // Teclas para tabla FLP
    function inicializarNavegacionTipoExcel() {
        const filas = document.querySelectorAll("table tbody tr");

        filas.forEach((fila, filaIndex) => {
            const inputs = fila.querySelectorAll(".celda");

            inputs.forEach((input, colIndex) => {
                input.setAttribute("data-row", filaIndex);
                input.setAttribute("data-col", colIndex);
            });
        });

        document.querySelectorAll('.celda').forEach(input => {
            input.addEventListener('keydown', function(e) {
                const row = parseInt(this.dataset.row);
                const col = parseInt(this.dataset.col);

                let nextInput;

                switch (e.key) {
                    case 'ArrowUp':
                        nextInput = document.querySelector(
                            `.celda[data-row="${row - 1}"][data-col="${col}"]`);
                        break;
                    case 'ArrowDown':
                        nextInput = document.querySelector(
                            `.celda[data-row="${row + 1}"][data-col="${col}"]`);
                        break;
                    case 'ArrowLeft':
                        nextInput = document.querySelector(
                            `.celda[data-row="${row}"][data-col="${col - 1}"]`);
                        break;
                    case 'ArrowRight':
                        nextInput = document.querySelector(
                            `.celda[data-row="${row}"][data-col="${col + 1}"]`);
                        break;
                    default:
                        return; // no hacemos nada para otras teclas
                }

                if (nextInput) {
                    e.preventDefault();
                    nextInput.focus();
                }
            });
        });
    }

    // Función para crear la Tabla FPL
    function populateTable(id_vector_viaje, punto_seleccionado,
        name_vector_viaje, distancia_vector_viaje,
        tableBody, estimado_vector, velocidad, nivel_vector, ruta_vector,
        chgRuta_vector, datosComp_vector, splPunto_vector,
        splEst_vector) {

        console.log('JOE TABLA');
        console.log('JOE TABLA id_vector_viaje', id_vector_viaje);
        console.log('JOE TABLA punto_seleccionado', punto_seleccionado);
        console.log('JOE TABLA name_vector_viaje', name_vector_viaje);
        console.log('JOE TABLA distancia_vector_viaje', distancia_vector_viaje);
        console.log('JOE TABLA tableBody', tableBody);
        console.log('JOE TABLA estimado_vector', estimado_vector);
        console.log('JOE TABLA velocidad', velocidad);
        console.log('JOE TABLA nivel_vector', nivel_vector);
        console.log('JOE TABLA ruta_vector', ruta_vector);
        console.log('JOE TABLA chgRuta_vector', chgRuta_vector);
        console.log('JOE TABLA datosComp_vector', datosComp_vector);
        console.log('JOE TABLA splPunto_vector', splPunto_vector);
        console.log('JOE TABLA splEst_vector', splEst_vector);

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
            var estimado_value = estimado_vector[index] ?? '';
            var chgRuta = chgRuta_vector[index] ?? '';
            var datosComp = datosComp_vector[index] ?? '';
            var splPunto = splPunto_vector[index] ?? '';
            var splEst = splEst_vector[index] ?? '';
            var nivel = nivel_vector[index] ?? '';
            var ruta = ruta_vector[index] ?? '';
            var name_viaje = name_vector_viaje[index] ?? '';

            // Crear una fila de la tabla
            var row = '<tr>' +
                '<td class="checkbox-cell align-middle">' +
                '<div class="custom-control custom-checkbox checkbox-light">' +
                '<input type="checkbox" class="custom-control-input" id="customCheck' + id + '" ' + isChecked +
                '>' +
                '<label class="custom-control-label" for="customCheck' + id + '"></label>' +
                '</div>' +
                '</td>' +

                '<td class="align-middle"><input type="text" class="form-control celda" name="punto' + id +
                '" id="punto' + id + '" placeholder="Punto" value="' + name_viaje +
                '" style="text-transform: uppercase;"></td>' +

                '<td class="align-middle"><input type="number" class="form-control celda" name="distancia' +
                id +
                '" id="distancia' + id + '" placeholder="Distancia" value="' + distancia_vector_viaje[index] +
                '" oninput="this.value = this.value.replace(/[^0-9]/g, \'\');" readonly></td>' +

                '<td class="align-middle"><input type="text" class="form-control celda" name="estimado' + id +
                '" id="estimado' + id + '" placeholder="Estimado" value="' + estimado_value +
                '"></td>' +

                '<td class="align-middle"><input type="number" class="form-control celda" name="velocidad' +
                id +
                '" id="velocidad' + id + '" placeholder="Velocidad" value="' + velocidad +
                '" oninput="this.value = this.value.replace(/[^0-9]/g, \'\');"></td>' +

                '<td class="align-middle"><input type="text" class="form-control celda" name="nivel' + id +
                '" id="nivel' + id + '" placeholder="Nivel" value="' + nivel +
                '"></td>' +

                '<td class="align-middle"><input type="text" class="form-control celda" name="ruta' + id +
                '" id="ruta' + id + '" placeholder="Ruta" value="' + ruta +
                '" style="text-transform: uppercase;"></td>';

            /* '<td class="align-middle">' + name_vector_viaje[index] + '</td>' + */
            /* '<td class="align-middle">' + distancia_vector_viaje[index] + '</td>' + */
            /* '<td class="align-middle">' + estimado_vector[index] + '</td>' + */
            /* '<td class="align-middle">' + velocidad + '</td>' + */
            /* '<td class="align-middle">' + nivel + '</td>' + */
            /* '<td class="align-middle">' + ruta_vector[index] + '</td>'; */

            // Verificar si el índice actual es igual al cambioIndice
            if (indice_cambio[index] > 0) {
                // Cambiar el valor de chg_ruta cuando el índice coincide con cambioIndice
                let valorRuta;

                if (
                    chgRuta_vector[index] !== null &&
                    chgRuta_vector[index] !== undefined &&
                    chgRuta_vector[index] !== ''
                ) {
                    valorRuta = chgRuta_vector[index];
                } else {
                    valorRuta = ruta_vector[indice_cambio[index]];
                }

                row += '<td class="align-middle">' +
                    '<input type="text" class="form-control celda" ' +
                    'name="chg_ruta' + id + '" ' +
                    'id="chg_ruta' + id + '" ' +
                    'placeholder="Chg Ruta" ' +
                    'value="' + valorRuta + '">' +
                    '</td>';

                console.log('JOE RUTA CHG', chgRuta_vector[index]);
                console.log('JOE RUTA ORIGINAL', ruta_vector[indice_cambio[index]]);
                console.log('JOE RUTA FINAL', valorRuta);

            } else {
                // Caso normal cuando no hay cambio
                row += '<td class="align-middle"><input type="text" class="form-control celda" name="chg_ruta' +
                    id +
                    '" id="chg_ruta' + id + '" placeholder="Chg Ruta" value="' + chgRuta + '"></td>';
            }

            row += '<td class="align-middle"><input type="text" class="form-control celda" name="dat_comp' +
                id +
                '" id="dat_comp' + id + '" placeholder="Dat Comp" value="' + datosComp + '"></td>' +
                '<td class="align-middle"><input type="text" class="form-control celda" name="spl_punto' + id +
                '" id="spl_punto' + id + '" placeholder="spl Punto" value="' + splPunto + '"></td>' +
                '<td class="align-middle"><input type="text" class="form-control celda" name="spl_est' + id +
                '" id="spl_est' + id + '" placeholder="spl Est" value="' + splEst + '"></td>' +
                '</tr>';

            tableBody.append(row);

        });

        inicializarNavegacionTipoExcel();

    }

    function showLoadingIndicatorForm() {
        document.getElementById('loadingIndicatorForm').style.display = 'block';
    }

    function hideLoadingIndicatorForm() {
        document.getElementById('loadingIndicatorForm').style.display = 'none';
    }

    // Funcion para Los options del select "id_rutas"
    function fetchAndPopulateRoutes(
        url,
        puntos,
        selected,
        vuelo,
        array_option_select,
        id_rutas_encontradas,
        name_rutas_encontradas,
        id_vector_viaje,
        name_vector_viaje,
        distancia_vector_viaje,
        puntos_mensaje,
        ruta_vector_viaje,
        fpl_punto_seleccionado) {
        showLoadingIndicatorForm(); // Mostrar loading

        const select = document.getElementById("id_rutas");
        const isTipoFicha22 = userTip.pk_id_tipo_ficha === 22;
        const isTipoFicha16 = userTip.pk_id_tipo_ficha === 16;

        $.ajax({
            url: '/filtrar-rutas',
            type: 'GET',
            data: {
                vuelo
            },
            success: function(response) {
                console.log('Rutas filtradas', response);

                const tieneRutas = Array.isArray(response) && response.length > 0;
                $('#llave_ruta_predeterminada').val(tieneRutas ? 1 : 0);

                if (!isTipoFicha22) {
                    // Reset y opción por defecto
                    select.innerHTML = '';
                    select.appendChild(new Option("Seleccione ruta", "SelectRuta"));
                }

                if (tieneRutas) {
                    response.forEach((item, index) => {
                        const option = new Option(item.array_option_select, index);

                        // Agregar atributos personalizados
                        option.dataset.array_option_select = item.array_option_select;
                        option.dataset.id_rutas_encontradas = item.id_rutas_encontradas;
                        option.dataset.name_rutas_encontradas = item.name_rutas_encontradas;
                        option.dataset.id_vector_viaje = item.id_vector_viaje;
                        option.dataset.name_vector_viaje = item.name_vector_viaje;
                        option.dataset.distancia_vector_viaje = item.distancia_vector_viaje;
                        option.dataset.puntos_mensaje = item.puntos_mensaje;
                        option.dataset.ruta_vector_viaje = item.ruta_vector_viaje;
                        option.dataset.fpl_punto_seleccionado = item.fpl_punto_seleccionado;

                        // Marcar como seleccionada
                        if (selected != -1 && index.toString() === selected) {
                            option.selected = true;

                            option.dataset.array_option_select = array_option_select;
                            option.dataset.id_rutas_encontradas = id_rutas_encontradas;
                            option.dataset.name_rutas_encontradas = name_rutas_encontradas;
                            option.dataset.id_vector_viaje = id_vector_viaje;
                            option.dataset.name_vector_viaje = name_vector_viaje;
                            option.dataset.distancia_vector_viaje = distancia_vector_viaje;
                            option.dataset.puntos_mensaje = puntos_mensaje;
                            option.dataset.ruta_vector_viaje = ruta_vector_viaje;
                            option.dataset.fpl_punto_seleccionado = fpl_punto_seleccionado;

                        }

                        if (!isTipoFicha22) {
                            select.add(option);
                        }
                    });
                }

                // Añadir opción DCT si corresponde
                if (isTipoFicha16) {
                    const dctOption = new Option("Ruta DCT (Radial)", "DCT");

                    dctOption.dataset.array_option_select = "DCT";
                    dctOption.dataset.id_rutas_encontradas = [];
                    dctOption.dataset.name_rutas_encontradas = [];
                    dctOption.dataset.id_vector_viaje = [];
                    dctOption.dataset.name_vector_viaje = [];
                    dctOption.dataset.distancia_vector_viaje = [];
                    dctOption.dataset.puntos_mensaje = [];
                    dctOption.dataset.ruta_vector_viaje = [];
                    dctOption.dataset.fpl_punto_seleccionado = [];

                    // Marcar como seleccionada
                    if (selected != -1 && selected === "DCT") {
                        dctOption.selected = true;

                        dctOption.dataset.array_option_select = array_option_select;
                        dctOption.dataset.id_rutas_encontradas = id_rutas_encontradas;
                        dctOption.dataset.name_rutas_encontradas = name_rutas_encontradas;
                        dctOption.dataset.id_vector_viaje = id_vector_viaje;
                        dctOption.dataset.name_vector_viaje = name_vector_viaje;
                        dctOption.dataset.distancia_vector_viaje = distancia_vector_viaje;
                        dctOption.dataset.puntos_mensaje = puntos_mensaje;
                        dctOption.dataset.ruta_vector_viaje = ruta_vector_viaje;
                        dctOption.dataset.fpl_punto_seleccionado = fpl_punto_seleccionado;

                    }

                    select.add(dctOption);
                }
            },
            error: function(xhr) {
                console.error('Error al filtrar las rutas', xhr.responseText);
            },
            complete: function() {
                hideLoadingIndicatorForm(); // Ocultar loading
            }
        });
    }
</script>

<!-- Primer bloque de script: Definición de funciones -->
<script>
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

    /* Funcion para Grabar o actualizar el plan de Vuelo */
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
            "per", "com", "dat", "altn", "code", "rvr", "dest2", "nivel_propuesto", "ruta_propuesta", "otros_datos"
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

        if (userTip.pk_id_tipo_ficha === 17) {

            // Desactivar el botón "Imprimir"
            const printButton = document.getElementById('printButton');
            const btnPrint = document.getElementById('btnPrint');

            if (printButton) {
                printButton.setAttribute('disabled', true); // Desactiva printButton
            }

            if (btnPrint) {
                btnPrint.setAttribute('disabled', true); // Desactiva btnPrint
            }

        }

        // Poner readonly a los inputs específicos
        if (userTip.pk_id_tipo_ficha !== 22) {
            document.getElementById('atd').readOnly = true;
            document.getElementById('est').readOnly = true;
            document.getElementById('nivel').readOnly = true;
            document.getElementById('sq').readOnly = true;
            document.getElementById('ha').readOnly = true;

            $('#sub_tipo_ficha')
                .prop('selectedIndex', -1);

            // Desactivar los botones
            const btnTest = document.getElementById('btnTest');
            if (btnTest) {
                btnTest.setAttribute('disabled', true); // Desactiva el botón "Test"
            }

            const btnAutorizado = document.getElementById('btnAutorizado');
            if (btnAutorizado) {
                btnAutorizado.setAttribute('disabled', true); // Desactiva el botón "Autorizado"
            }

            const rutaButton = document.getElementById('rutaButton');
            if (rutaButton) {
                rutaButton.setAttribute('disabled', true); // Desactiva el botón "Crear Ruta"
            }

            const btnRepetido = document.getElementById('btnRepetido');
            if (btnRepetido) {
                // btnRepetido.setAttribute('disabled', true); // Desactiva el botón "Repetido"
            }

            const btnCancelado = document.getElementById('btnCancelado');
            if (btnCancelado) {
                // btnCancelado.setAttribute('disabled', true); // Desactiva el botón "Cancelado"
            }

            // Limpiar la tabla
            var tableBody = $('#datatableFPL tbody');
            tableBody.empty();

            // Limpia el contenedor de la tabla al principio
            $('#ficha_progreso_container').empty();

        } else {

            /* document.getElementById('atd_tower').readOnly = true;
            document.getElementById('sq_tower').readOnly = true;
            document.getElementById('eta_tower').readOnly = true;
            document.getElementById('nivel_tower').readOnly = true;
            document.getElementById('eat_tower_1').readOnly = true;
            document.getElementById('eat_tower_2').readOnly = true;
            document.getElementById('ha_tower').readOnly = true; */

            // Desactivar los selects
            /* const selectSubTipoFicha = document.getElementById('sub_tipo_ficha');
            if (selectSubTipoFicha) {
                selectSubTipoFicha.setAttribute('disabled', true);
            }

            const selectFichaAtc2 = document.getElementById('ficha_atc2');
            if (selectFichaAtc2) {
                selectFichaAtc2.setAttribute('disabled', true);
            } */

            // Limpia el contenedor de la tabla al principio
            $('#ficha_progreso_container').empty();

            // Desactivar los botones
            const btnTest_tower = document.getElementById('btnTest_tower');
            if (btnTest_tower) {
                btnTest_tower.setAttribute('disabled', true);
            }

            const btnAutorizado_tower = document.getElementById('btnAutorizado_tower');
            if (btnAutorizado_tower) {
                btnAutorizado_tower.setAttribute('disabled', true);
            }

            const btnCancelado_tower = document.getElementById('btnCancelado_tower');
            if (btnCancelado_tower) {
                btnCancelado_tower.setAttribute('disabled', true);
            }

        }

    }

    function validacion_nivel1() {
        // Selecciona solo los inputs específicos por su id
        const ids = [
            "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
            "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
            "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dep2",
            "dest2", "ralt", "dof", "nav", "eet2", "rmk", "rif", "sts", "typ",
            "per", "com", "dat", "altn", "code", "rvr", "dest2", "nivel_propuesto", "ruta_propuesta", "otros_datos"
        ];

        // Recorre cada id y quita el atributo readonly
        ids.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.removeAttribute('readonly');
            }
        });

        if (userTip.pk_id_tipo_ficha !== 22) {

            // Habilitar el select
            const selectElement = document.getElementById('id_rutas');
            selectElement.disabled = false;

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
                // boton3.removeAttribute('disabled');
            }

            const boton4 = document.getElementById('btnAutorizado');
            if (boton4) {
                boton4.removeAttribute('disabled');
            }

        } else {

            const boton3 = document.getElementById('btnTest_tower');
            if (boton3) {
                boton3.removeAttribute('disabled');
            }

            const boton4 = document.getElementById('btnAutorizado_tower');
            if (boton4) {
                boton4.removeAttribute('disabled');
            }

            const boton5 = document.getElementById('btnCancelado_tower');
            if (boton5) {
                boton5.removeAttribute('disabled');
            }
        }

        // SubTipoFicha
        var userTipo = @json($userTip);
        var llave_atc_group_002 = @json($llave_atc_group_002);
        var selectContainerAtc002 = document.getElementById('selectContainerAtc002');

        /* var origenInput = document.getElementById('origen');
        var destinoInput = document.getElementById('destino');
        var selectContainer = document.getElementById('select-container');
        var selectContainerAtc002 = document.getElementById('selectContainerAtc002');
        var inputContainerTra = document.getElementById('inputContainerTra');
        var selectContainerAtc002 = document.getElementById('selectContainerAtc002');

        const selectContainer = document.getElementById('select-container'); */

        console.log('STF tipo_ficha', userTipo.pk_id_tipo_ficha);
        console.log('STF origen', $('#origen').val());
        console.log('STF destino', $('#destino').val());

        // Verifica condiciones
        console.log('V1 destino', $('#destino').val());
        console.log('V1 llave_atc_group_002', llave_atc_group_002);
        console.log('V1 pk_id_tipo_ficha', userTipo.pk_id_tipo_ficha);

        if ($('#destino').val() === userTipo.descripcion && llave_atc_group_002 === 1 && userTipo.pk_id_tipo_ficha ===
            22) {
            if (selectContainerAtc002) {
                selectContainerAtc002.display = 'block'; // Mostrar el select
                inputContainerTra.display = 'block'; // Mostrar el select
            }
        } else {
            if (selectContainerAtc002) {
                selectContainerAtc002.style.display = 'none'; // Ocultar el select
                inputContainerTra.style.display = 'none'; // Ocultar el select
            }
        }

        if ((userTipo.pk_id_tipo_ficha === 16 || userTipo.pk_id_tipo_ficha === 22) &&
            $('#origen').val() === $('#destino').val()) {

            $('#select-container').show(); // Muestra el div principal
            $('#selectContainerAtc002').hide(); // Oculta el selectContainerAtc002 con jQuery

        } else {
            $('#select-container').hide(); // Oculta el div principal
        }

        // Verificar las condiciones
        /* if (origenInput.value === destinoInput.value && userTipo.pk_id_tipo_ficha !== 17) {
            selectContainer.style.display = 'block'; // Mostrar el select
            if (selectContainerAtc002) {
                selectContainerAtc002.style.display = 'none'; // Ocultar el select
                inputContainerTra.style.display = 'block'; // Ocultar el select
            }
        } else {
            selectContainer.style.display = 'none'; // Ocultar el select
            if (selectContainerAtc002) {
                selectContainerAtc002.display = 'block'; // Mostrar el select
                inputContainerTra.display = 'block'; // Mostrar el select
            }
        }

        if (destinoInput.value === userTipo.descripcion && llave_atc_group_002 === 1 && userTipo.pk_id_tipo_ficha ===
            22) {
            if (selectContainerAtc002) {
                selectContainerAtc002.display = 'block'; // Mostrar el select
                inputContainerTra.display = 'block'; // Mostrar el select
            }
        } else {
            if (selectContainerAtc002) {
                selectContainerAtc002.style.display = 'none'; // Ocultar el select
                inputContainerTra.style.display = 'none'; // Ocultar el select
            }
        } */

    }

    function validacion_nivel2() {

        if (userTip.pk_id_tipo_ficha !== 22) {

            console.log('V2 SELECT', $('#selectedRutaId').val());

            if ($('#selectedRutaId').val() !== "") {

                // Quitar el atributo readonly de los inputs
                document.getElementById('atd').removeAttribute('readonly');
                document.getElementById('est').removeAttribute('readonly');
                document.getElementById('nivel').removeAttribute('readonly');
                document.getElementById('sq').removeAttribute('readonly');
                document.getElementById('ha').removeAttribute('readonly');

                const boton3 = document.getElementById('btnTest');
                if (boton3) {
                    boton3.removeAttribute('disabled');
                }
            }

        } else {
            // Quitar el atributo readonly de los inputs
            document.getElementById('atd_tower').removeAttribute('readonly');
            document.getElementById('sq_tower').removeAttribute('readonly');
            document.getElementById('eta_tower').removeAttribute('readonly');
            document.getElementById('tra_tower').removeAttribute('readonly');
            document.getElementById('nivel_tower').removeAttribute('readonly');
            document.getElementById('eat_tower_1').removeAttribute('readonly');
            document.getElementById('eat_tower_2').removeAttribute('readonly');

            // Quitar el atributo disabled de los selects
            document.getElementById('sub_tipo_ficha').removeAttribute('disabled');
            document.getElementById('ficha_atc2').removeAttribute('disabled');

            const boton3 = document.getElementById('btnTest_tower');
            if (boton3) {
                boton3.removeAttribute('disabled');
            }
        }

    }

    function validacion_nivel3() {
        // Selecciona solo los inputs específicos por su id y les agrega readonly
        const ids = [
            "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
            "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
            "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dep2",
            "dest2", "ralt", "dof", "nav", "eet2", "rmk", "rif", "sts", "typ",
            "per", "com", "dat", "altn", "code", "rvr", "dest2", "otros_datos"
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
        if (userTip.pk_id_tipo_ficha === 17) {

            // Desactivar el botón "Imprimir"
            const printButton = document.getElementById('printButton');
            const btnPrint = document.getElementById('btnPrint');

            if (printButton) {
                printButton.setAttribute('disabled', true); // Desactiva printButton
            }

            if (btnPrint) {
                btnPrint.setAttribute('disabled', true); // Desactiva btnPrint
            }

        }

    }

    function validacion_impresion() {
        if (userTip.pk_id_tipo_ficha === 17) {

            // Desactivar el botón "Imprimir"
            const printButton = document.getElementById('printButton');
            const btnPrint = document.getElementById('btnPrint');

            if (printButton) {
                printButton.setAttribute('disabled', true); // Desactiva printButton
            }

            if (btnPrint) {
                btnPrint.setAttribute('disabled', true); // Desactiva btnPrint
            }

        }
    }

    function validacion_cierre(puntos_array) {
        // Selecciona solo los inputs específicos por su id y les agrega readonly
        const ids = [
            "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
            "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
            "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dof",
            "nav", "rmk", "sts", "rvr", "nivel_propuesto", "ruta_propuesta", "dest2", "otros_datos"
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

        // Deshabilitar el select
        if (userTip.pk_id_tipo_ficha !== 22) {

            // Poner readonly a los inputs específicos
            document.getElementById('atd').readOnly = true;
            document.getElementById('est').readOnly = true;
            document.getElementById('nivel').readOnly = true;
            document.getElementById('sq').readOnly = true;
            document.getElementById('ha').readOnly = true;

            const selectElement = document.getElementById('id_rutas');
            selectElement.disabled = true;

            // Desactivar los botones "Test" y "Autorizado"
            const btnAutorizado = document.getElementById('btnAutorizado');
            const rutaButton = document.getElementById('rutaButton');
            const btnRepetido = document.getElementById('btnRepetido');
            const btnCancelado = document.getElementById('btnCancelado');
            const btnReset = document.getElementById('btnReset');

            if (btnAutorizado) {
                btnAutorizado.setAttribute('disabled', true); // Desactiva el botón "Autorizado"
            }
            if (rutaButton) {
                rutaButton.setAttribute('disabled', true); // Desactiva el botón "Crear Ruta"
            }
            if (btnRepetido) {
                btnRepetido.setAttribute('disabled', true); // Desactiva el botón "Repetido"
            }
            if (btnCancelado) {
                btnCancelado.setAttribute('disabled', true); // Desactiva el botón "Cancelado"
            }
            if (btnReset) {
                btnReset.setAttribute('disabled', true); // Desactiva el botón "Reset"
            }

            // Obtener los id de table FPL
            // Convertir el string a array si es necesario
            var puntos = puntos_array;

            // Asegurarse de que puntos sea un array
            if (typeof puntos === 'string') {
                // Si es un string con formato de array, convertirlo a array
                puntos = puntos.replace(/[\[\]\s]/g, '').split(',').map(Number);
            } else if (!Array.isArray(puntos)) {
                // Si no es un array, intentar convertirlo
                puntos = Array.isArray(puntos_array) ? puntos_array : [];
            }

            console.log('Puntos procesados:', puntos);

            // Recorrer cada punto y deshabilitar los campos relacionados
            puntos.forEach(function(puntoId) {
                // Deshabilitar el checkbox
                var check = document.getElementById('customCheck' + puntoId);
                if (check) {
                    check.disabled = true;
                    console.log('Checkbox deshabilitado:', 'customCheck' + puntoId);
                }

                // Lista de campos a deshabilitar
                let campos = [
                    'punto',
                    'estimado',
                    'velocidad',
                    'nivel',
                    'ruta',
                    'chg_ruta',
                    'dat_comp',
                    'spl_punto',
                    'spl_est'
                ];

                campos.forEach(function(prefijo) {
                    var campo = document.getElementById(prefijo + puntoId);
                    if (campo) {
                        campo.readOnly = true;
                        console.log('Campo readonly:', prefijo + puntoId);
                    } else {
                        console.log('Campo no encontrado:', prefijo + puntoId);
                    }
                });
            });

        } else {
            // Poner readonly a los inputs específicos
            document.getElementById('atd_tower').readOnly = true;
            document.getElementById('sq_tower').readOnly = true;
            document.getElementById('eta_tower').readOnly = true;
            document.getElementById('tra_tower').readOnly = true;
            document.getElementById('nivel_tower').readOnly = true;
            document.getElementById('eat_tower_1').readOnly = true;
            document.getElementById('eat_tower_2').readOnly = true;
            document.getElementById('ha_tower').readOnly = true;

            const sub_tipo_ficha = document.getElementById('sub_tipo_ficha');
            sub_tipo_ficha.disabled = true;

            const ficha_atc2 = document.getElementById('ficha_atc2');
            ficha_atc2.disabled = true;

            const btnAutorizado_tower = document.getElementById('btnAutorizado_tower');
            const btnCancelado_tower = document.getElementById('btnCancelado_tower');

            if (btnAutorizado_tower) {
                btnAutorizado_tower.setAttribute('disabled', true); // Desactiva el botón "Autorizado"
            }

            if (btnCancelado_tower) {
                btnCancelado_tower.setAttribute('disabled', true); // Desactiva el botón "Cancelado"
            }

        }

        // Activar el botón "Imprimir"
        if (userTip.pk_id_tipo_ficha === 17) {

            // Desactivar el botón "Imprimir"
            const printButton = document.getElementById('printButton');
            const btnPrint = document.getElementById('btnPrint');

            if (printButton) {
                printButton.setAttribute('disabled', true); // Desactiva printButton
            }

            if (btnPrint) {
                btnPrint.setAttribute('disabled', true); // Desactiva btnPrint
            }

        }

    }

    function validacion_usuario(response) {
        const userTip = @json($userTip);
        var bloquear = 0;
        console.log('VU response', response);
        console.log('VU userTip', userTip);

        if (userTip.pk_id_user !== response.fk_user) {
            bloquear = 1;
        }

        if (response.traspaso === 1 && response.oaci === userTip.pk_oaci && response.tipo_ficha === userTip
            .pk_id_tipo_ficha) {
            bloquear = 0;
        }

        if (Number(response.id_estado) === 1) {
            bloquear = 0;
        }

        console.log('VU ID ESTADO', response.id_estado);
        console.log('VU bloquear', bloquear);

        if (bloquear === 1) {

            const ids = [
                "fecha", "vuelo", "tipo", "origen", "etd", "destino", "reg", "sel",
                "dta", "regla_tipo", "eobt", "linea_aerea", "velocidad", "equipo",
                "eet", "opr", "turbulencia", "aeronaves", "aed_alternos", "dof",
                "nav", "rmk", "sts", "rvr", "nivel_propuesto", "ruta_propuesta", "dest2", "otros_datos"
            ];

            ids.forEach(id => {
                const input = document.getElementById(id);
                if (input) {
                    // Poner readonly a los inputs seleccionados
                    input.setAttribute('readonly', true);
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

            // Deshabilitar el select
            if (userTip.pk_id_tipo_ficha !== 22) {
                const selectElement = document.getElementById('id_rutas');
                selectElement.disabled = true;

                // Poner readonly a los inputs específicos
                document.getElementById('atd').readOnly = true;
                document.getElementById('est').readOnly = true;
                document.getElementById('nivel').readOnly = true;
                document.getElementById('sq').readOnly = true;
                document.getElementById('ha').readOnly = true;

                // Desactivar los botones "CrearRuta", "Test" y "Autorizado"
                const btnTest = document.getElementById('btnTest');
                const btnAutorizado = document.getElementById('btnAutorizado');
                const rutaButton = document.getElementById('rutaButton');

                if (btnTest) {
                    // btnTest.setAttribute('disabled', true); // Desactiva el botón "Test"
                }
                if (btnAutorizado) {
                    btnAutorizado.setAttribute('disabled', true); // Desactiva el botón "Autorizado"
                }
                if (rutaButton) {
                    rutaButton.setAttribute('disabled', true); // Desactiva el botón "Crear Ruta"
                }
            } else {
                // Poner readonly a los inputs específicos
                document.getElementById('atd_tower').readOnly = true;
                document.getElementById('sq_tower').readOnly = true;
                document.getElementById('eta_tower').readOnly = true;
                document.getElementById('tra_tower').readOnly = true;
                document.getElementById('nivel_tower').readOnly = true;
                document.getElementById('eat_tower_1').readOnly = true;
                document.getElementById('eat_tower_2').readOnly = true;
            }

            if (response.id_estado === 4) {

                // Activar el botón "Imprimir"
                if (userTip.pk_id_tipo_ficha === 17) {

                    // Desactivar el botón "Imprimir"
                    const printButton = document.getElementById('printButton');
                    const btnPrint = document.getElementById('btnPrint');

                    if (printButton) {
                        printButton.setAttribute('disabled', true); // Desactiva printButton
                    }

                    if (btnPrint) {
                        btnPrint.setAttribute('disabled', true); // Desactiva btnPrint
                    }
                }
            }

            fetchProcesoVueloData($('#id').val()).then(function(resultado) {

                // var id_vector_viaje = JSON.parse(resultado.id_vector_viaje);
                var id_vector_viaje = resultado.id_vector_viaje ? JSON.parse(resultado.id_vector_viaje) : [];

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

    }

    function limpiarCamposEditFPL() {
        const campos = [
            '#sel', '#dta', '#equipo', '#eet', '#opr', '#turbulencia', '#aeronaves', '#aed_alternos', '#dep2',
            '#dest2', '#ralt', '#dof', '#nav', '#eet2', '#rmk', '#rif', '#sts', '#typ', '#per', '#com', '#dat',
            '#altn', '#code', '#rvr', "#nivel_propuesto", "#ruta_propuesta", "#dest2", "#otros_datos"
        ];

        campos.forEach(function(campo) {
            $(campo).val('');
        });
    }

    function limpiarCamposHidden() {
        $('#id').val('');
        $('#id_estado').val('');
        $('#name_estado').val('');
        $('#color_estado').val('');
        /* $('#hora').val('');
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
        $('#fpl_id_punto').val('');
        $('#fpl_punto').val('');
        $('#fpl_id_ruta').val('');
        $('#fpl_ruta').val('');
        $('#est_array').val('');
        $('#chg_ruta_array').val('');
        $('#dt_cmp_array').val('');
        $('#spl_punto_array').val('');
        $('#spl_est').val('');
        $('#fpl_punto_seleccionado').val('');
        $('#fpl_distancia').val('');
        $('#fpl_nivel').val('');
        $('#selectedRutaId').val('');
        $('#id_ruta_predeterminada').val('');
        $('#llave_ruta_predeterminada').val('');
        $('#tipo_ficha').val('');
        $('#last_est').val('');
        $('#rpl').val('');
        $('#cod_trans').val('');
        $('#ruta_propuesta_atc').val('');
        $('#primer_punto').val('');
        $('#fecha_impresion').val(''); */
    }

    /* Funcion que procesa la Tabla FPL */
    function handleRowClick(tableSelector) {

        $(tableSelector).on('click', 'tr', function() {

            // Remover fondo de cualquier fila seleccionada previamente
            $(tableSelector + ' tr').css('background-color', '');
            // Aplicar el fondo a la fila seleccionada
            $(this).css('background-color', '#d9eaf7');

            limpiarCamposEditFPL();
            limpiarCamposHidden();

            // Recuperar datos del DataTable
            var tipo_fpl = $(this).data('tipo_fpl');

            // Tipo_fpl id si el FPL es creado
            if (tipo_fpl === 1) {
                var id = $(this).data('id_amhs');
            } else {
                var id = $(this).data('id');
            }

            console.log('id', id);

            var id_estado = $(this).data('id_estado');
            var fecha = $(this).data('fecha');
            var hora = $(this).data('hora'); // "dd HH:MM"

            if (hora && typeof hora === "string") {
                var partes = hora.split(' ');
            } else {
                //console.error("Error: la variable 'hora' es null, undefined o no es una cadena de texto.");
                var partes = []; // Se asigna un array vacío para evitar errores posteriores
            }

            var horaSolo = partes[1]; // "HH:MM"
            var vuelo = $(this).data('vuelo');
            var tipo = $(this).data('tipo');
            var origen = $(this).data('origen');
            // var dep = $(this).data('origen');
            var destino = $(this).data('destino');
            var eobt = $(this).data('eobt');
            var nivel_propuesto = $(this).data('nivel_propuesto');
            var ruta_propuesta = $(this).data('ruta_propuesta');
            var linea_aerea = $(this).data('linea_aerea');
            let velocidad = $(this).data('velocidad');
            var mensaje = $(this).data('mensaje');
            var dep = $(this).data('dep');
            var etd = $(this).data('etd');
            var reg = $(this).data('reg');
            var rpl = $(this).data('rpl');
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
            var dest2 = $(this).data('dest2');

            const userTip = @json($userTip);
            console.log('userTip', userTip);

            // Asignar los valores a los inputs
            $('#id').val(id);
            $('#id_estado').val(id_estado);
            $('#fecha').val(fecha);
            $('#vuelo').val(vuelo);
            $('#tipo').val(tipo);
            $('#origen').val(origen);
            $('#etd').val(etd);
            $('#destino').val(destino);
            $('#eobt').val(eobt);
            $('#nivel_propuesto').val(nivel_propuesto);
            $('#ruta_propuesta').val(ruta_propuesta);
            $('#linea_aerea').val(linea_aerea);
            $('#velocidad').val(velocidad);
            $('#dep').val(dep);
            $('#reg').val(reg);
            $('#rpl').val(rpl);
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
            $('#dest2').val(dest2);
            $('#tipo_ficha').val(userTip.pk_id_tipo_ficha);

            // Asignar el valor del mensaje al textarea
            $('#descripcion').val(mensaje);

            // Resetear los valores de los inputs del Formulario FPL a una cadena vacía
            if (userTip.pk_id_tipo_ficha !== 22) {
                $('#atd').val('');
                $('#est').val('');
                $('#nivel').val('');
                $('#sq').val('');
                $('#ha').val('');

                $('#sub_tipo_ficha').val('');
            } else {
                $('#atd_tower').val('');
                $('#sq_tower').val('');
                $('#eta_tower').val('');
                $('#tra_tower').val('');
                $('#nivel_tower').val('');
                $('#eat_tower_1').val('');
                $('#eat_tower_2').val('');
                $('#ha_tower').val('');

                $('#sub_tipo_ficha').val('');
                $('#ficha_atc2').val('');
            }

            // CORTE
            console.log('PRIMER PASO');

            // Llamar a la función que muestra el indicador de carga
            showLoadingIndicatorForm();

            // Recuperar Codigo Trans de ATC-001
            if (userTip.pk_id_tipo_ficha === 16) {

                $.ajax({
                    url: '{{ route('fichaACC4') }}',
                    method: 'POST',
                    data: {
                        'id-amhs': $('#id').val(),
                        'tipo-ficha': 22,
                        'pk-oaci': userTip.pk_oaci,
                        _token: '{{ csrf_token() }}' // Token CSRF para solicitudes POST en Laravel
                    },
                    success: function(response) {

                        if (response.success) {
                            var dataACC1 = response.data;
                            console.log('16 dataACC1', dataACC1);
                            console.log('16 SQ', dataACC1.sq);
                            console.log('16 DEP', $('#dep').val());
                            console.log('16 OACI', userTip.descripcion);

                            if ($('#origen').val() === userTip.descripcion) {
                                $('#sq').val(dataACC1.sq);
                                $('#ha').val(dataACC1.ha);
                            }

                        } else {
                            // Si no hay éxito, muestra un mensaje en la tabla
                            console.log('No se encontraron datos');
                        }

                    },
                    error: function(xhr, status, error) {
                        // En caso de error, mostrar un mensaje en la tabla y en la consola
                        $('#amhs-data').html(
                            '<tr><td colspan="10">Error cargando datos.</td></tr>');
                        console.error('Error:', error, 'Estado:', status, 'XHR:', xhr);
                    },
                    complete: function() {
                        // Aquí puedes ocultar un indicador de carga
                        // console.log('Solicitud completada.');
                    }
                });

            }
            // FIN Recuperar Codigo Trans de ATC-001

            // Recuperar Codigo Trans de ATC-004
            if (userTip.pk_id_tipo_ficha === 22) {

                $.ajax({
                    url: '{{ route('fichaACC4') }}',
                    method: 'POST',
                    data: {
                        'id-amhs': $('#id').val(),
                        'tipo-ficha': 16,
                        'pk-oaci': userTip.pk_oaci,
                        _token: '{{ csrf_token() }}' // Token CSRF para solicitudes POST en Laravel
                    },
                    success: function(response) {

                        if (response.success) {
                            var dataACC1 = response.data;
                            console.log('22 dataACC1 data', dataACC1);
                            console.log('22 dataACC1 SQ', dataACC1.sq);
                            console.log('22 DESTINO', $('#destino').val());
                            console.log('22 OACI', userTip.descripcion);

                            if ($('#destino').val() === userTip.descripcion) {
                                $('#sq_tower').val(dataACC1.sq);
                                $('#ha_tower').val(dataACC1.ha);

                                // ULTIMO ESTIMADO
                                var last_est = '';
                                var estArray = [];
                                var puntoSeleccionado = [];

                                // Recuperar y convertir `est_array` a un array nativo
                                if (dataACC1 && dataACC1.est_array) {
                                    estArray = JSON.parse(dataACC1.est_array);
                                }

                                if (dataACC1 && dataACC1.fpl_punto_seleccionado) {
                                    puntoSeleccionado = JSON.parse(dataACC1.fpl_punto_seleccionado);
                                }

                                console.log('puntoSeleccionado', puntoSeleccionado);

                                if (Array.isArray(puntoSeleccionado) && puntoSeleccionado
                                    .length > 0) {
                                    // Inicializar la posición como -1 (en caso de que no se encuentre un 1)
                                    var ultimaPosicion = -1;

                                    // Recorrer el array desde el final hasta el principio
                                    for (var i = puntoSeleccionado.length - 1; i >= 0; i--) {
                                        if (Number(puntoSeleccionado[i]) === 1) {
                                            ultimaPosicion = i;
                                            break; // Detener el bucle al encontrar el último 1
                                        }
                                    }

                                    console.log('ultimaPosicion', ultimaPosicion);
                                }

                                // Validar si es un array y no está vacío
                                if (Array.isArray(estArray) && estArray.length > 0) {
                                    var lastValue = estArray[ultimaPosicion];
                                    console.log('Último valor de estArray:', lastValue);
                                    // Asignar el último valor al input
                                    $('#last_est').val(lastValue);
                                    last_est = lastValue;
                                }

                                $('#eta_tower').val(last_est);
                                // ULTIMO ESTIMADO

                            }

                        } else {
                            // Si no hay éxito, muestra un mensaje en la tabla
                            console.log('No se encontraron datos');
                        }

                    },
                    error: function(xhr, status, error) {
                        // En caso de error, mostrar un mensaje en la tabla y en la consola
                        $('#amhs-data').html(
                            '<tr><td colspan="10">Error cargando datos.</td></tr>');
                        console.error('Error:', error, 'Estado:', status, 'XHR:', xhr);
                    },
                    complete: function() {
                        // Aquí puedes ocultar un indicador de carga
                        // console.log('Solicitud completada.');
                    }
                });

            }
            // FIN Recuperar Codigo Trans de ATC-004

            console.log('TD ID', id);

            validacion_nivel0();
            validacion_nivel1();

            $.ajax({
                url: `/proceso-vuelo/${id}`,
                method: 'GET',
                data: {
                    _token: $('meta[name="csrf-token"]').attr(
                        'content') // CSRF Token para seguridad
                },
                success: function(response) {

                    console.log('RESPONSE', response.data);

                    if (response.data === null) {

                        console.log('El resultado es null');
                        console.log('TD velocidad', velocidad);

                        // Los options del select "id_rutas"
                        var selected = -1;
                        var id_estado_leido = 1; //Leido
                        var nombre_estado = "LEIDO";
                        var color = "#737373";
                        var id_amhs = id;

                        if (userTip.pk_id_tipo_ficha !== 22) {

                            fetchAndPopulateRoutes(
                                '/select-ruta',
                                puntos,
                                selected,
                                vuelo,
                                '',
                                [],
                                [],
                                [],
                                [],
                                [],
                                [],
                                [],
                                [],
                            );

                            console.log("TD MenoriD AMHS", id_amhs);
                            console.log("TD MenoriD ID Estado", id_estado_leido);
                            console.log('TD Nombre del Estado:', nombre_estado);
                            console.log('TD Color del Estado:', color);

                        }

                        var estadoCell = document.getElementById('estado' + id_amhs);

                        if (estadoCell) {
                            var badge = estadoCell.querySelector('span');

                            if (badge) {
                                badge.textContent = nombre_estado;
                                badge.style.backgroundColor = color;
                            }
                        }

                        $('#id_estado').val(id_estado_leido);
                        $('#name_estado').val(nombre_estado);
                        $('#color_estado').val(color);

                        // Actualizar Usuario en tabla AMHS
                        // estadoCell = document.getElementById('usuario' + id_amhs);
                        // estadoCell.textContent = userTip.name;

                        const procesoVueloData = {
                            id_amhs: id_amhs,
                            id_estado: id_estado_leido,
                            name_estado: nombre_estado,
                            color_estado: color,
                            tipo_ficha: userTip.pk_id_tipo_ficha,

                            hora: horaSolo,
                            fecha: $('#fecha').val(),
                            vuelo: $('#vuelo').val(),
                            tipo: $('#tipo').val(),
                            origen: $('#origen').val(),
                            dep: $('#origen').val(),
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
                            dest2: $('#dest2').val(),
                            mensaje: $('#descripcion').val(),

                            // rpl: rpl,
                            puntos: puntos,
                            nivel_propuesto: $('#nivel_propuesto').val(),
                            ruta_propuesta: $('#ruta_propuesta').val(),
                            // primera_ficha: $('#primer_punto').val(),
                            otros_datos: $('#otros_datos').val(),
                            origen_save: 3,
                        };

                        console.log('TD DATA', procesoVueloData);
                        sendProcesoVueloData(procesoVueloData);

                    } else {

                        var resultado = response.data;
                        console.log('TR RESULTADO :', resultado);

                        // Llenar campos directamente desde resultado
                        [
                            'id_estado', 'name_estado', 'color_estado', 'fecha', 'vuelo', 'tipo',
                            'dep', 'origen', 'etd', 'destino', 'reg', 'sel', 'dta', 'regla_tipo',
                            'eobt', 'linea_aerea', 'velocidad', 'equipo', 'eet', 'opr',
                            'turbulencia', 'aeronaves', 'aed_alternos', 'dof', 'nav', 'rmk', 'sts',
                            'rvr', 'dest2', 'nivel_propuesto', 'ruta_propuesta', 'otros_datos',
                            'fecha_impresion',
                        ].forEach(campo => {
                            $('#' + campo).val(resultado[campo]);
                        });

                        validacion_nivel2();

                        console.log('TR resultado.primera_ficha:', resultado.primera_ficha);

                        if (userTip.pk_id_tipo_ficha !== 22) {

                            console.log('TR origen:', resultado.origen);
                            console.log('TR destino:', resultado.destino);

                            // sub_tipo_ficha
                            if (resultado.origen === resultado.destino && userTip
                                .pk_id_tipo_ficha === 16) {
                                const select = document.getElementById('sub_tipo_ficha');

                                if (select) {
                                    Array.from(select.options).forEach(option => {
                                        if (Number(option.value) === Number(resultado
                                                .sub_tipo_ficha)) {
                                            option.selected = true;
                                        }
                                    });
                                } else {
                                    console.log(
                                        '⚠️ No se encontró el select con id="sub_tipo_ficha"');
                                }
                            }

                            console.log('TR puntos:', resultado.puntos);
                            console.log('TR selected:', resultado.selected);
                            console.log('TR vuelo:', resultado.vuelo);

                            fetchAndPopulateRoutes(
                                '/select-ruta',
                                resultado.puntos,
                                resultado.selected,
                                resultado.vuelo,
                                resultado.array_option_select,
                                resultado.id_rutas_encontradas,
                                resultado.name_rutas_encontradas,
                                resultado.id_vector_viaje,
                                resultado.name_vector_viaje,
                                resultado.distancia_vector_viaje,
                                resultado.puntos_mensaje,
                                resultado.ruta_vector_viaje,
                                resultado.fpl_punto_seleccionado,
                            );

                            if (resultado.id_estado >= 2) {

                                // Inputs que requieren validación
                                ['atd', 'est', 'nivel', 'sq', 'ha'].forEach(campo => {
                                    if (resultado[campo] !== null) {
                                        document.getElementById(campo).value = resultado[
                                            campo];
                                    }
                                });

                                console.log('TR UTC id_estado:', resultado.id_estado);

                                let tableBody = $('#datatableFPL tbody');
                                tableBody.empty();

                                // Parseo de datos FPL
                                let id_vector_viaje = JSON.parse(resultado.id_vector_viaje || '[]');
                                let punto_seleccionado = JSON.parse(resultado
                                    .fpl_punto_seleccionado || '[]');
                                let name_vector_viaje = JSON.parse(resultado.fpl_punto || '[]');
                                let distancia_vector_viaje = JSON.parse(resultado.fpl_distancia ||
                                    '[]');
                                let estimado_vector = JSON.parse(resultado.est_array || '[]');
                                let nivel_vector = JSON.parse(resultado.fpl_nivel || '[]');
                                let ruta_vector = JSON.parse(resultado.fpl_ruta || '[]');
                                let chgRuta_vector = JSON.parse(resultado.chg_ruta_array || '[]');
                                let datosComp_vector = JSON.parse(resultado.dt_cmp_array || '[]');
                                let splPunto_vector = JSON.parse(resultado.spl_punto_array || '[]');
                                let splEst_vector = JSON.parse(resultado.spl_est || '[]');

                                console.log('TR LLENADO DE CAMPOS');
                                console.log({
                                    id_vector_viaje,
                                    punto_seleccionado,
                                    name_vector_viaje,
                                    distancia_vector_viaje,
                                    estimado_vector,
                                    velocidad: resultado.velocidad,
                                    nivel: resultado.nivel,
                                    ruta_vector,
                                    chgRuta_vector,
                                    datosComp_vector,
                                    splPunto_vector,
                                    splEst_vector
                                });

                                populateTable(
                                    id_vector_viaje,
                                    punto_seleccionado,
                                    name_vector_viaje,
                                    distancia_vector_viaje,
                                    tableBody,
                                    estimado_vector,
                                    resultado.velocidad,
                                    nivel_vector,
                                    ruta_vector,
                                    chgRuta_vector,
                                    datosComp_vector,
                                    splPunto_vector,
                                    splEst_vector
                                );

                                // Ficha Impresa
                                let indexUltimaFicha = punto_seleccionado.lastIndexOf(1);
                                $('#ficha_progreso_container').empty();

                                /* if (Array.isArray(punto_seleccionado)) {
                                    punto_seleccionado.forEach((value, index) => {
                                        if (value === 1) {
                                            console.log('Movimiento2');

                                            let puntoValue = JSON.parse(resultado
                                                .fpl_punto || '[]')[index];
                                            let estValue = JSON.parse(resultado.est_array ||
                                                '[]')[index];
                                            let ruta = JSON.parse(resultado.fpl_ruta ||
                                                '[]')[index];
                                            let chgRuta = JSON.parse(resultado
                                                .chg_ruta_array || '[]')[index];
                                            let datComplem = JSON.parse(resultado
                                                .dt_cmp_array || '[]')[index];
                                            let splPunto = JSON.parse(resultado
                                                .spl_punto_array || '[]')[index];
                                            let splEst = JSON.parse(resultado.spl_est ||
                                                '[]')[index];

                                            let ultimaFicha = (index === indexUltimaFicha) ?
                                                1 : 0;

                                            // Aquí podrías usar los valores para algo (no estaba implementado)
                                        }
                                    });
                                } */
                            }

                            // Cierre de Edicion de Data
                            if (id_estado === 4) {

                                console.log('CIERRE', resultado.cerrado);
                                console.log('CIERRE puntos:', resultado.fpl_id_punto);

                                // Validacion de Cierre de Planes de Vuelo si resultado.cerrado es 1
                                if (Number(resultado.cerrado) === 1) {
                                    validacion_cierre(resultado.fpl_id_punto);
                                }

                                // let createdAt = new Date(resultado.created_at);
                                // Mostrar como estaba en UTC original (corrigiendo)
                                /* let utcHour = new Date(createdAt.getTime() - createdAt
                                    .getTimezoneOffset() * 60000);
                                console.log('CIERRE CREACIÓN UTC REAL', utcHour.toISOString());

                                var now = new Date();
                                console.log('CIERRE HORA ACTUAL (UTC)', now.toISOString());

                                var diffHours = (now - utcHour) / (1000 * 60 * 60);
                                console.log('CIERRE Horas transcurridas:', diffHours.toFixed(2));

                                if (diffHours >= 4) {
                                    console.log("✅ CIERRE UTC Han pasado 4 horas o más."); */

                                // Validacion de Cierre de Planes de Vuelo
                                //  validacion_cierre();

                                // $('#id_estado').val(id_estado_leido);
                                // var id_amhs = id;
                                // const estadoCell = document.getElementById('estado' + id_amhs);

                                /* var id_amhs = $('#id').val();
                                var tabla = document.getElementById('datatableScrollYSearch');
                                var estadoCell = tabla.querySelector('#estado' + id_amhs);

                                if (estadoCell) {

                                    // Eliminar cualquier icono de candado existente (opcional, por si agregas múltiples veces)
                                    const existingIcon = estadoCell.querySelector('.fa-lock');
                                    if (existingIcon) {
                                        existingIcon.remove();
                                    }

                                    // Crear el icono de candado usando Font Awesome
                                    const lockIcon = document.createElement("i");
                                    lockIcon.className = "fas fa-lock";
                                    lockIcon.style.marginRight = "5px";

                                    // Insertar el icono antes del texto
                                    estadoCell.insertBefore(lockIcon, estadoCell.firstChild);
                                }

                                var id_amhs = $('#id').val();
                                var tabla = document.getElementById('datatableScrollY');
                                var estadoCell = tabla.querySelector('#estado' + id_amhs); */

                                /* if (estadoCell) {

                                    // Eliminar cualquier icono de candado existente (opcional, por si agregas múltiples veces)
                                    const existingIcon = estadoCell.querySelector('.fa-lock');
                                    if (existingIcon) {
                                        existingIcon.remove();
                                    }

                                    // Crear el icono de candado usando Font Awesome
                                    const lockIcon = document.createElement("i");
                                    lockIcon.className = "fas fa-lock";
                                    lockIcon.style.marginRight = "5px";

                                    // Insertar el icono antes del texto
                                    estadoCell.insertBefore(lockIcon, estadoCell.firstChild);
                                } */
                                // }

                            }
                            // Cierre de Edicion de Data

                        } else {

                            let atd_tower = resultado.atd;
                            let sq_tower = resultado.sq;
                            let eta_tower = resultado.eta;
                            let tra_tower = resultado.tra;
                            let nivel_tower = resultado.nivel_tower;
                            let eat_tower = JSON.parse(resultado.eat_tower);
                            let ha_tower = resultado.ha;

                            let sub_tipo_ficha = resultado.sub_tipo_ficha;
                            let ficha_atc2 = resultado.sub_tipo_ficha;
                            let id_estado = resultado.id_estado;

                            console.log('HA TOWER', ha_tower);
                            console.log('SQ TOWER', sq_tower);

                            $('#atd_tower').val(atd_tower);
                            $('#sq_tower').val(sq_tower);
                            $('#eta_tower').val(eta_tower);
                            $('#tra_tower').val(tra_tower);
                            $('#nivel_tower').val(nivel_tower);
                            $('#ha_tower').val(ha_tower);

                            if (eat_tower && eat_tower.length >= 2) {
                                $('#eat_tower_1').val(eat_tower[0]);
                                $('#eat_tower_2').val(eat_tower[1]);

                                var subValue = eat_tower[2];
                                $('#eat_tower_0 option').each(function() {

                                    console.log('EAT TOWER 0', String(subValue));
                                    console.log('EAT TOWER VAL', String($(this).val()));

                                    $('#eat_tower_0 option').each(function() {
                                        if (String($(this).val()).toUpperCase() ===
                                            String(subValue).toUpperCase()) {
                                            $(this).prop('selected', true);
                                        } else {
                                            $(this).prop('selected', false);
                                        }
                                    });
                                });
                            }

                            // Selected Sub Tipo Ficha ORI=DEST
                            const origenInput = document.getElementById('origen');
                            const destinoInput = document.getElementById('destino');

                            if (origenInput.value === destinoInput.value) {

                                var selectElement = document.getElementById('sub_tipo_ficha');
                                // Recorrer todas las opciones del select
                                Array.from(selectElement.options).forEach(option => {
                                    if (Number(option.value) === Number(sub_tipo_ficha)) {
                                        option.selected = true;
                                    } else {
                                        option.selected = false;
                                    }
                                });
                            }

                            // Selected Fichas Especiales LCL
                            var llave_atc_group_002 = @json($llave_atc_group_002);
                            if (destinoInput.value === userTip.descripcion &&
                                llave_atc_group_002 === 1 && userTip.pk_id_tipo_ficha === 22) {

                                var selectElementTra = document.getElementById('ficha_atc2');
                                // Recorrer todas las opciones del select
                                Array.from(selectElementTra.options).forEach(option => {
                                    if (Number(option.value) === Number(ficha_atc2)) {
                                        option.selected = true;
                                    } else {
                                        option.selected = false;
                                    }
                                });
                            }

                            console.log('UTC ID ESTADO', id_estado);

                            // Cierre de Edicion de Data
                            if (id_estado >= 2 && id_estado <= 4) {

                                var createdAt = new Date(resultado.created_at);
                                var now = new Date();
                                var diffHours = (now - createdAt) / (1000 * 60 * 60);

                                if (diffHours >= 4) {

                                    console.log("UTC Han pasado 4 horas o más.");

                                    // validacion_cierre();

                                    // $('#id_estado').val(id_estado_leido);
                                    // var id_amhs = $('#id').val();
                                    // const estadoCell = document.getElementById('estado' + id_amhs);

                                    /* if (estadoCell) {

                                        // Eliminar cualquier icono de candado existente (opcional, por si agregas múltiples veces)
                                        const existingIcon = estadoCell.querySelector('.fa-lock');
                                        if (existingIcon) {
                                            existingIcon.remove();
                                        }

                                        // Crear el icono de candado usando Font Awesome
                                        const lockIcon = document.createElement("i");
                                        lockIcon.className = "fas fa-lock";
                                        lockIcon.style.marginRight = "5px";

                                        // Insertar el icono antes del texto "Autorizado"
                                        estadoCell.insertBefore(lockIcon, estadoCell.firstChild);

                                        const procesoVueloData = {
                                            id_amhs: $('#id').val(),
                                            cerrado: 1,
                                        };

                                        // Llamar a la función para enviar los datos
                                        // sendProcesoVueloData(procesoVueloData);
                                    } */
                                }
                            }
                            // Cierre de Edicion de Data

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

    }

    /* function checkForNewRecordsAutorizados(IdAutorizado) {
        const table = document.getElementById("amhs-dataAutorizados");
        console.log('IdAutorizado', IdAutorizado);

        var fecha = $('#fecha').val();
        var dia = fecha.split('-')[2];
        var hora = $('#hora').val();
        var diaHora = dia + ' ' + hora;

        // Validar valores para evitar null
        const id_amhs = $('#id').val() || '';
        const id_estado = $('#id_estado').val() || '';
        const vuelo = $('#vuelo').val() || '';
        const tipo = $('#tipo').val() || '';
        const origen = $('#origen').val() || '';
        const destino = $('#destino').val() || '';
        const eobt = $('#eobt').val() || '';
        const nivel_propuesto = $('#nivel_propuesto').val() || '';
        const ruta_propuesta = $('#ruta_propuesta').val() || '';
        const linea_aerea = $('#linea_aerea').val() || '';
        const velocidad = $('#velocidad').val() || '';
        const mensaje = $('#descripcion').val() || '';
        const etd = $('#etd').val() || '';
        const reg = $('#reg').val() || '';
        const rpl = $('#rpl').val() || '';
        const sel = $('#sel').val() || '';
        const puntos = $('#puntos').val() || '';
        const regla_tipo = $('#regla_tipo').val() || '';
        const tipo_fpl = $('#tipo_fpl').val() || '';
        const turbulencia = $('#turbulencia').val() || '';
        const equipo = $('#equipo').val() || '';
        const eet = $('#eet').val() || '';
        const aed_alternos = $('#aed_alternos').val() || '';
        const dof = $('#dof').val() || '';
        const rmk = $('#rmk').val() || '';
        const sts = $('#sts').val() || '';
        const opr = $('#opr').val() || '';
        const nav = $('#nav').val() || '';
        const rvr = $('#rvr').val() || '';
        const dest2 = $('#dest2').val() || '';
        const otros_datos = $('#otros_datos').val() || '';
        const color_estado = $('#color_estado').val() || '';
        const name_estado = $('#name_estado').val() || '';
        const userTip = @json($userTip);
        const user_name = userTip.name;

        console.log("id_amhs:", id_amhs);
        console.log("id_estado:", id_estado);
        console.log("fecha:", fecha);
        console.log("hora:", hora);
        console.log("vuelo:", vuelo);
        console.log("tipo:", tipo);
        console.log("origen:", origen);
        console.log("destino:", destino);
        console.log("eobt:", eobt);
        console.log("nivel_propuesto:", nivel_propuesto);
        console.log("ruta_propuesta:", ruta_propuesta);
        console.log("linea_aerea:", linea_aerea);
        console.log("velocidad:", velocidad);
        console.log("mensaje:", mensaje);
        console.log("etd:", etd);
        console.log("reg:", reg);
        console.log("rpl:", rpl);
        console.log("sel:", sel);
        console.log("puntos:", puntos);
        console.log("regla_tipo:", regla_tipo);
        console.log("tipo_fpl:", tipo_fpl);
        console.log("turbulencia:", turbulencia);
        console.log("equipo:", equipo);
        console.log("eet:", eet);
        console.log("aed_alternos:", aed_alternos);
        console.log("dof:", dof);
        console.log("rmk:", rmk);
        console.log("sts:", sts);
        console.log("opr:", opr);
        console.log("nav:", nav);
        console.log("rvr:", rvr);
        console.log("dest2:", dest2);
        console.log("otros_datos:", otros_datos);
        console.log("color_estado:", color_estado);
        console.log("name_estado:", name_estado);
        console.log('userTip', user_name);

        // Construcción de la fila
        var newRow = `
                        <tr
                            data-id="${id_amhs}"
                            data-id_estado="${id_estado}"
                            data-fecha="${fecha}"
                            data-hora="${hora}"
                            data-vuelo="${vuelo}"
                            data-tipo="${tipo}"
                            data-origen="${origen}"
                            data-destino="${destino}"
                            data-eobt="${eobt}"
                            data-nivel_propuesto="${nivel_propuesto}"
                            data-ruta_propuesta="${ruta_propuesta}"
                            data-linea_aerea="${linea_aerea}"
                            data-velocidad="${velocidad}"
                            data-mensaje="${mensaje}"
                            data-dep="${origen}"
                            data-etd="${etd}"
                            data-reg="${reg}"
                            data-rpl="${rpl}"
                            data-sel="${sel}"
                            data-puntos="${puntos}"
                            data-regla_tipo="${regla_tipo}"
                            data-tipo_fpl="${tipo_fpl}"
                            data-turbulencia="${turbulencia}"
                            data-equipo="${equipo}"
                            data-eet="${eet}"
                            data-aed_alternos="${aed_alternos}"
                            data-dof="${dof}"
                            data-rmk="${rmk}"
                            data-sts="${sts}"
                            data-opr="${opr}"
                            data-nav="${nav}"
                            data-rvr="${rvr}"
                            data-dest2="${dest2}"
                        >
                            <td class="align-middle">${id_amhs}</td>
                            <td class="align-middle" id="estado${id_amhs}">
                                <span class="badge rounded-pill text-white" style="background-color: ${color_estado};">
                                    ${name_estado}
                                </span>
                            </td>
                            <td class="align-middle">${diaHora}</td>
                            <td class="align-middle">${vuelo}</td>
                            <td class="align-middle">${tipo}</td>
                            <td class="align-middle">${origen}</td>
                            <td class="align-middle">${destino}</td>
                            <td class="align-middle">${eobt}</td>
                            <td class="align-middle">${regla_tipo}</td>
                            <td class="align-middle">${linea_aerea}</td>
                            <td class="align-middle">${user_name}</td>
                        </tr>`;

        // Añadir la fila al principio sin borrar las existentes
        $('#amhs-dataAutorizados').prepend(newRow);
    } */

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

    function calculoEst(estValue) {

        // Obtener el <option> actualmente seleccionado
        let fpl_id_punto = [];
        let fpl_punto_seleccionado = [];
        const selectedOption = $('#id_rutas option:selected')[0];

        console.log('EST selectedOption', selectedOption);

        if (selectedOption) {
            fpl_id_punto = JSON.parse(selectedOption.dataset.id_vector_viaje || "[]");
            fpl_punto_seleccionado = JSON.parse(selectedOption.dataset.fpl_punto_seleccionado || "[]");
        } else {
            console.warn('No hay opción seleccionada en #id_rutas');
        }

        console.log('EST fpl_id_punto', fpl_id_punto);
        console.log('EST fpl_punto_seleccionado', fpl_punto_seleccionado);

        // var fplIdPuntoVal = $('#fpl_id_punto').val() || "[]"; // Si el valor es vacío, se usa "[]"
        // var parsedData = JSON.parse(fplIdPuntoVal);

        var parsedData = fpl_id_punto;

        if (Array.isArray(parsedData) && parsedData.length >= 1) {

            const userTip = @json($userTip);
            // var llave_ruta_predeterminada = parseInt($('#llave_ruta_predeterminada').val());
            // var selectedRutaId = $('#selectedRutaId').val();

            /* if (llave_ruta_predeterminada === 1) {

                const selectedIndex = parseInt(selectedRutaId);
                var fpl_punto_seleccionado_array = JSON.parse(puntoSeleccionado);
                //var fpl_punto_seleccionado_array = JSON.parse($('#fpl_punto_seleccionado').val());

                console.log('fpl_punto_seleccionado_array', fpl_punto_seleccionado_array);
                console.log('selectedIndex', selectedIndex);

                // Obtener una copia del array seleccionado en la posición selectedIndex
                // var fpl_punto_seleccionado = JSON.parse(fpl_punto_seleccionado_array[selectedIndex]);
                var fpl_punto_seleccionado = fpl_punto_seleccionado_array[selectedIndex] ?
                    JSON.parse(fpl_punto_seleccionado_array[selectedIndex]) : [];

            } else {
                var fpl_punto_seleccionado = JSON.parse(puntoSeleccionado);

            } */

            console.log('fpl_punto_seleccionado', fpl_punto_seleccionado);

            var result = completarYValidarHHMM(estValue);

            if (!result.valid) {
                $('#est-error').remove(); // Eliminar cualquier mensaje de error previo
                $('<div id="est-error" style="color: red;">Formato no válido HHMM</div>').insertAfter('#est');

                // Desactiva el botón "Autorizado"
                // btnAutorizado.setAttribute('disabled', true);

                return; // Salir de la función si el formato no es válido
            } else {
                $('#est-error').remove(); // Eliminar mensaje de error si el formato es válido

                // Activa el botón "Autorizado"
                // btnAutorizado.removeAttribute('disabled');
            }

            // Actualizar el valor del input con el valor completado
            $('#est').val(result.value);

            // Convertir estValue a número
            var estValueNum = parseFloat(result.value);
            // Obtener y convertir el valor del input hidden con id "velocidad" a número
            var velocidad = parseFloat($('#velocidad').val());

            // Verificar si estValue y velocidad son números válidos
            if (isNaN(estValueNum) || isNaN(velocidad)) {
                return;
            }

            if (userTip.pk_id_tipo_ficha === 17) {

                if (result.valid) {
                    // Calculo de Estimado
                    // var fpl_id_punto = JSON.parse($('#fpl_id_punto').val());
                    console.log('EST fpl_id_punto', fpl_id_punto);

                    var contador_fila = 0;
                    var vector_est = [];
                    var vector_distancia = [];
                    var primer_punto_seleccionado = 0;

                    fpl_id_punto.forEach((value, index) => {

                        fpl_punto_seleccionado[index] = parseInt(fpl_punto_seleccionado[index], 10);

                        console.log('EST CAL INICIO');
                        console.log('contador_fila', contador_fila);
                        console.log('fpl_punto_seleccionado_index', fpl_punto_seleccionado[index]);

                        //encontrar el primer punto seleccionado
                        if (fpl_punto_seleccionado[index] === fpl_punto_seleccionado[0]) {
                            primer_punto_seleccionado++;
                        }

                        console.log('primer_punto_seleccionado', primer_punto_seleccionado);

                        if (primer_punto_seleccionado > 0) {

                            if (primer_punto_seleccionado === 1) {

                                // if (userTip.pk_id_tipo_ficha !== 16) {
                                var estimadoActualizado = result.value;
                                console.log('Estimado Actualizado', estimadoActualizado);

                                var estimado_value = 'estimado' + fpl_id_punto[index];
                                $('input[name="' + estimado_value + '"]').val(estimadoActualizado);
                                primer_punto_seleccionado++;
                                // }
                                /* else {

                                    if ($('#origen').val() === userTip.descripcion) {
                                        var estimadoActualizado = document.getElementById("atd").value;
                                    } else {
                                        var estimadoActualizado = document.getElementById("est").value;
                                    }

                                    console.log('Estimado Actualizado', estimadoActualizado);

                                    var estimado_value = 'estimado' + fpl_id_punto[index];
                                    $('input[name="' + estimado_value + '"]').val(estimadoActualizado);
                                    primer_punto_seleccionado++;
                                } */

                            } else {
                                // if (userTip.pk_id_tipo_ficha !== 16) {

                                var index_anterior = contador_fila - 1;
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
                                var horasActualizadas = Math.floor(estimadoActualizadoMinutos / 60) %
                                    24;
                                var minutosActualizados = Math.round(estimadoActualizadoMinutos % 60);

                                // Ajustar si los minutos son 60
                                if (minutosActualizados === 60) {
                                    minutosActualizados = 0;
                                    horasActualizadas = (horasActualizadas + 1) % 24;
                                }

                                console.log('EST horasActualizadas', horasActualizadas);

                                // Formatear horas y minutos a dos dígitos
                                var estimadoActualizado = ('0' + horasActualizadas).slice(-2) + ('0' +
                                    minutosActualizados).slice(-2);

                                console.log('EST estimadoActualizado', estimadoActualizado);

                                var estimado_value = 'estimado' + fpl_id_punto[index];
                                $('input[name="' + estimado_value + '"]').val(estimadoActualizado);

                                //}

                                /* else {

                                    if ($('#origen').val() === userTip.descripcion) {
                                        var estimadoActualizado = document.getElementById("est").value;
                                        var estimado_value = 'estimado' + fpl_id_punto[index];
                                        $('input[name="' + estimado_value + '"]').val(estimadoActualizado);
                                    }
                                } */
                            }

                            console.log('Estimado Actualizado', estimadoActualizado);
                            vector_est[contador_fila] = estimadoActualizado;

                            var distancia_value = 'distancia' + fpl_id_punto[index];
                            vector_distancia[contador_fila] = $('#' + distancia_value).val();
                            contador_fila++;

                            console.log('Vector EST', vector_est);
                            console.log('Distancia EST', vector_distancia);

                        } else {

                            var estimadoActualizado = '-';
                            console.log('Estimado Actualizado', estimadoActualizado);

                            var estimado_value = 'estimado' + fpl_id_punto[index];
                            $('input[name="' + estimado_value + '"]').val(estimadoActualizado);

                            console.log('Estimado Actualizado', estimadoActualizado);
                            vector_est[contador_fila] = estimadoActualizado;

                            var distancia_value = 'distancia' + fpl_id_punto[index];
                            vector_distancia[contador_fila] = $('#' + distancia_value).val();
                            contador_fila++;

                            console.log('Vector EST', vector_est);
                            console.log('Distancia EST', vector_distancia);

                        }

                    });

                    // $('#est_array').val(JSON.stringify(vector_est));
                }

            } else {

                if (result.valid) {
                    console.log('EST fpl_id_punto', fpl_id_punto);

                    // Asignar ATD al primer punto
                    const atd_value = $('#atd').val();
                    $('input[name="estimado' + fpl_id_punto[0] + '"]').val(atd_value);

                    let contador = 0;
                    let index_valor = null;

                    fpl_id_punto.forEach((punto_id, index) => {
                        const seleccionado = parseInt(fpl_punto_seleccionado[index]);
                        console.log('EST fpl_punto_seleccionado:', seleccionado);

                        if (seleccionado === 1) {
                            const estimado_name = 'estimado' + punto_id;
                            console.log('EST estimado_value:', estimado_name);

                            if (contador === 1) {
                                index_valor = index;
                                console.log('EST INDEX VALOR:', index_valor);
                            }

                            contador++;
                        }
                    });

                    // Asignar EST al segundo punto seleccionado (si existe)
                    if (index_valor !== null) {
                        const est_value = $('#est').val();
                        $('input[name="estimado' + fpl_id_punto[index_valor] + '"]').val(est_value);
                    }
                }

            }

        }

    }

    function autorizado_atc02() {
        console.log('autorizado_atc02');

        var id_estado_trabajando = document.getElementById('id_estado').value;
        var nombre_estado = document.getElementById('name_estado').value;
        var color = document.getElementById('color_estado').value;

        const procesoVueloData = {
            id_amhs: $('#id').val(),
            id_estado: id_estado_trabajando,
            name_estado: nombre_estado,
            color_estado: color,
            tipo_ficha: 22,
            sub_tipo_ficha: 32,
            traspaso: 1,

            // Datos Traspasados
            sq: $('#sq').val(),
            ha: $('#ha').val(),

            hora: document.getElementById('hora').value,
            puntos: document.getElementById('puntos').value,
            dep: document.getElementById('dep').value,
            tipo_fpl: document.getElementById('tipo_fpl').value,
            llave_ruta_predeterminada: document.getElementById('llave_ruta_predeterminada')
                .value,
            mensaje: document.getElementById('descripcion').value,
            fecha: document.getElementById('fecha').value,
            vuelo: document.getElementById('vuelo').value,
            tipo: document.getElementById('tipo').value,
            origen: document.getElementById('origen').value,
            etd: document.getElementById('etd').value,
            destino: document.getElementById('destino').value,
            reg: document.getElementById('reg').value,
            sel: document.getElementById('sel').value,
            dta: document.getElementById('dta').value,
            regla_tipo: document.getElementById('regla_tipo').value,
            eobt: document.getElementById('eobt').value,
            linea_aerea: document.getElementById('linea_aerea').value,
            velocidad: document.getElementById('velocidad').value,
            equipo: document.getElementById('equipo').value,
            eet: document.getElementById('eet').value,
            opr: document.getElementById('opr').value,
            turbulencia: document.getElementById('turbulencia').value,
            aeronaves: document.getElementById('aeronaves').value,
            aed_alternos: document.getElementById('aed_alternos').value,
            dof: document.getElementById('dof').value,
            nav: document.getElementById('nav').value,
            rmk: document.getElementById('rmk').value,
            sts: document.getElementById('sts').value,
            rvr: document.getElementById('rvr').value,
            dest2: document.getElementById('dest2').value,
            nivel_propuesto: document.getElementById('nivel_propuesto').value,
            ruta_propuesta: document.getElementById('ruta_propuesta').value,
            otros_datos: document.getElementById('otros_datos').value,
            origen_save: 4,
        };

        console.log('procesoVueloData Tower', procesoVueloData);

        // Llamar a la función para enviar los datos
        sendProcesoVueloData(procesoVueloData);
    }

    function autorizado_atc03() {
        console.log('autorizado_atc03');

        var id_estado = document.getElementById('id_estado').value;
        var nombre_estado = document.getElementById('name_estado').value;
        var color = document.getElementById('color_estado').value;

        var array_fpl_punto_seleccionado = null;
        var fpl_punto_seleccionado = null;
        var array_name_rutas_encontradas = null;
        var name_rutas_encontradas = null;
        var array_id_vector_viaje = null;
        var id_vector_viaje = null;
        var array_name_vector_viaje = null;
        var name_vector_viaje = null;
        var distancia_vector_viaje = null;

        const procesoVueloData = {
            id_amhs: $('#id').val(),
            tipo_ficha: 16,
            sub_tipo_ficha: 33,
            traspaso: 1,

            // Datos Traspasados
            sq: $('#sq').val(),
            ha: $('#ha').val(),

            id_estado: id_estado,
            name_estado: nombre_estado,
            color_estado: color,
            puntos_mensaje: $('#puntos_mensaje').val(),

            array_option_select: $('#array_option_select').val(),
            id_rutas_encontradas: $('#id_rutas_encontradas').val(),
            name_rutas_encontradas: name_rutas_encontradas,
            id_vector_viaje: id_vector_viaje,
            llave_select: $('#llave_select').val(),
            name_vector_viaje: name_vector_viaje,
            distancia_vector_viaje: distancia_vector_viaje,
            ruta_vector_viaje: $('#ruta_vector_viaje').val(),

            fpl_id_punto: $('#fpl_id_punto').val(),
            fpl_punto: $('#fpl_punto').val(),
            fpl_id_ruta: $('#fpl_id_ruta').val(),
            fpl_ruta: $('#fpl_ruta').val(),
            est_array: $('#est_array').val(),
            chg_ruta_array: $('#chg_ruta_array').val(),
            dt_cmp_array: $('#dt_cmp_array').val(),
            spl_punto_array: $('#spl_punto_array').val(),
            spl_est: $('#spl_est').val(),
            fpl_punto_seleccionado: fpl_punto_seleccionado,
            fpl_distancia: $('#fpl_distancia').val(),
            fpl_nivel: $('#fpl_nivel').val(),

            selected: $('#selectedRutaId').val(),

            hora: document.getElementById('hora').value,
            puntos: document.getElementById('puntos').value,
            dep: document.getElementById('dep').value,
            tipo_fpl: document.getElementById('tipo_fpl').value,
            llave_ruta_predeterminada: document.getElementById('llave_ruta_predeterminada').value,
            mensaje: document.getElementById('descripcion').value,
            fecha: document.getElementById('fecha').value,
            vuelo: document.getElementById('vuelo').value,
            tipo: document.getElementById('tipo').value,
            origen: document.getElementById('origen').value,
            etd: document.getElementById('etd').value,
            destino: document.getElementById('destino').value,
            reg: document.getElementById('reg').value,
            sel: document.getElementById('sel').value,
            dta: document.getElementById('dta').value,
            regla_tipo: document.getElementById('regla_tipo').value,
            eobt: document.getElementById('eobt').value,
            linea_aerea: document.getElementById('linea_aerea').value,
            velocidad: document.getElementById('velocidad').value,
            equipo: document.getElementById('equipo').value,
            eet: document.getElementById('eet').value,
            opr: document.getElementById('opr').value,
            turbulencia: document.getElementById('turbulencia').value,
            aeronaves: document.getElementById('aeronaves').value,
            aed_alternos: document.getElementById('aed_alternos').value,
            dof: document.getElementById('dof').value,
            nav: document.getElementById('nav').value,
            rmk: document.getElementById('rmk').value,
            sts: document.getElementById('sts').value,
            rvr: document.getElementById('rvr').value,
            dest2: document.getElementById('dest2').value,
            nivel_propuesto: document.getElementById('nivel_propuesto').value,
            ruta_propuesta: document.getElementById('ruta_propuesta').value,
            otros_datos: document.getElementById('otros_datos').value,
            origen_save: 5,
        };

        console.log('procesoVueloData', procesoVueloData);

        // Llamar a la función para enviar los datos
        sendProcesoVueloData(procesoVueloData);

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
            "ordering": false, // Enable ordering
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
            "scrollY": "200px", // Set vertical scroll height to show approximately 15 rows
            "scrollCollapse": true, // Allow table to reduce height when fewer rows are present
            "paging": false, // Disable paging
            "searching": false, // Disable search functionality
            "ordering": false, // Enable ordering
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
        handleRowClick('#datatableScrollY tbody');
        handleRowClick('#datatableScrollYSearch tbody');
        handleRowClick('#datatableScrollYAutorizados tbody');

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
        // $(".select2basico").select2();

        // TABLA GENERADA POR EL SELECT RUTA
        // Manejar cambio en el select
        $('#id_rutas').on('change', function() {
            const selectedRutaId = $(this).val();
            const select = this;

            console.log('selectedRutaId CRUTA', selectedRutaId);

            // Buscar el <option> seleccionado dentro del select
            const selectedOption = select.options[select.selectedIndex];

            let id;
            let id_estado;
            let array_option_select;
            let id_rutas_encontradas = [];
            let name_rutas_encontradas = [];
            let id_vector_viaje = [];
            let name_vector_viaje = [];
            let distancia_vector_viaje = [];
            let puntos_mensaje = [];
            let ruta_vector_viaje = [];
            let punto_seleccionado = [];


            if (!isNaN(selectedRutaId) && Number.isInteger(Number(selectedRutaId))) {
                console.log("Opción Ruta Seleccionada: 'RUTA'");
                const selectedOption = select.options[select.selectedIndex];

                id = $('#id').val();
                id_estado = $('#id_estado').val();
                array_option_select = selectedOption.dataset.array_option_select;
                id_rutas_encontradas = JSON.parse(selectedOption.dataset.id_rutas_encontradas);
                name_rutas_encontradas = JSON.parse(selectedOption.dataset.name_rutas_encontradas);
                id_vector_viaje = JSON.parse(selectedOption.dataset.id_vector_viaje);
                name_vector_viaje = JSON.parse(selectedOption.dataset.name_vector_viaje);
                distancia_vector_viaje = JSON.parse(selectedOption.dataset.distancia_vector_viaje);
                puntos_mensaje = JSON.parse(selectedOption.dataset.puntos_mensaje);
                ruta_vector_viaje = JSON.parse(selectedOption.dataset.ruta_vector_viaje);
                punto_seleccionado = JSON.parse(selectedOption.dataset.fpl_punto_seleccionado);

            } else if (selectedRutaId === "SelectRuta") {
                console.log("Opción por defecto seleccionada: 'Seleccione ruta'");
                return;
            } else if (selectedRutaId === "DCT") {
                console.log("Opción DCT seleccionada: Ruta radial directa");

                const selectedOption = select.options[select.selectedIndex];
                id = $('#id').val();
                id_estado = $('#id_estado').val();
                array_option_select = "DCT";
                id_rutas_encontradas = ["", ""];
                name_rutas_encontradas = ["", ""];
                id_vector_viaje = [0, 1];
                name_vector_viaje = ["", ""];
                distancia_vector_viaje = ["", ""];
                puntos_mensaje = ["", ""];
                ruta_vector_viaje = ["", ""];
                punto_seleccionado = [1, 1]

                selectedOption.dataset.array_option_select = array_option_select;
                selectedOption.dataset.id_rutas_encontradas = JSON.stringify(id_rutas_encontradas);
                selectedOption.dataset.name_rutas_encontradas = JSON.stringify(name_rutas_encontradas);
                selectedOption.dataset.id_vector_viaje = JSON.stringify(id_vector_viaje);
                selectedOption.dataset.name_vector_viaje = JSON.stringify(name_vector_viaje);
                selectedOption.dataset.distancia_vector_viaje = JSON.stringify(distancia_vector_viaje);
                selectedOption.dataset.puntos_mensaje = JSON.stringify(puntos_mensaje);
                selectedOption.dataset.ruta_vector_viaje = JSON.stringify(ruta_vector_viaje);
                selectedOption.dataset.fpl_punto_seleccionado = JSON.stringify(punto_seleccionado);

            } else {
                console.warn("Valor inesperado en select:", selectedRutaId);
                return;
            }

            console.log('id', id);
            console.log('id_estado', id_estado);
            console.log('id_rutas_encontradas', id_rutas_encontradas);
            console.log('name_rutas_encontradas', name_rutas_encontradas);
            console.log('id_vector_viaje', id_vector_viaje);
            console.log('name_vector_viaje', name_vector_viaje);
            console.log('distancia_vector_viaje', distancia_vector_viaje);
            console.log('ruta_vector_viaje', ruta_vector_viaje);
            console.log('punto_seleccionado', punto_seleccionado);

            let primerPunto = id_vector_viaje[0];
            console.log('primerPunto', primerPunto);

            // Limpiar tabla
            const tableBody = $('#datatableFPL tbody').empty();

            // Obtener datos adicionales
            const velocidad = $('#velocidad').val();

            // Datos auxiliares para poblar la tabla
            // const punto_seleccionado = id_vector_viaje.map(() => 0);
            const estimado_vector = id_vector_viaje.map(() => "");
            const nivel_vector = id_vector_viaje.map(() => "");
            const chgRuta_vector = id_vector_viaje.map(() => "");
            const datosComp_vector = id_vector_viaje.map(() => "");
            const splPunto_vector = id_vector_viaje.map(() => "");
            const splEst_vector = id_vector_viaje.map(() => "");
            const ruta_nombre_vector = ruta_vector_viaje.map((rutaId) => {
                const idx = id_rutas_encontradas.indexOf(rutaId);
                return idx !== -1 ? name_rutas_encontradas[idx] : "No encontrado";
            });

            // Poblar tabla directamente
            populateTable(
                id_vector_viaje,
                punto_seleccionado,
                name_vector_viaje,
                distancia_vector_viaje,
                tableBody,
                estimado_vector,
                velocidad,
                nivel_vector,
                ruta_nombre_vector,
                chgRuta_vector,
                datosComp_vector,
                splPunto_vector,
                splEst_vector
            );

            validacion_nivel2();

            if (id_estado < 2) {

                var id_amhs = id;
                id_estado = 2;
                var nombre_estado = "TRABAJADO";
                var color = "#004DC9";

                $('#id_estado').val(id_estado);
                $('#name_estado').val(nombre_estado);
                $('#color_estado').val(color);

                console.log('Nombre del Estado TR:', nombre_estado);
                console.log('Color del Estado TR:', color);

                const estadoCell = document.getElementById('estado' + id_amhs);

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
                id_amhs: id,
                id_estado: id_estado,
                name_estado: nombre_estado,
                color_estado: color,
                primera_ficha: primerPunto,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                // hora: $('#hora').val(),
                // puntos: $('#puntos').val(),
                // dep: $('#dep').val(),
                // tipo_fpl: $('#tipo_fpl').val(),

                array_option_select: array_option_select,
                id_rutas_encontradas: id_rutas_encontradas,
                name_rutas_encontradas: name_rutas_encontradas,
                id_vector_viaje: id_vector_viaje,
                llave_select: selectedRutaId,
                name_vector_viaje: name_vector_viaje,
                distancia_vector_viaje: distancia_vector_viaje,
                puntos_mensaje: puntos_mensaje,
                ruta_vector_viaje: ruta_vector_viaje,

                // fecha: $('#fecha').val(),
                // vuelo: $('#vuelo').val(),
                // tipo: $('#tipo').val(),
                // origen: $('#origen').val(),
                // etd: $('#etd').val(),
                // destino: $('#destino').val(),
                // reg: $('#reg').val(),
                // sel: $('#sel').val(),
                // dta: $('#dta').val(),
                // regla_tipo: $('#regla_tipo').val(),
                // eobt: $('#eobt').val(),
                // linea_aerea: $('#linea_aerea').val(),
                // velocidad: $('#velocidad').val(),
                // equipo: $('#equipo').val(),
                // eet: $('#eet').val(),
                // opr: $('#opr').val(),
                // turbulencia: $('#turbulencia').val(),
                // aeronaves: $('#aeronaves').val(),
                // aed_alternos: $('#aed_alternos').val(),
                // dof: $('#dof').val(),
                // nav: $('#nav').val(),
                // rmk: $('#rmk').val(),
                // sts: $('#sts').val(),
                // rvr: $('#rvr').val(),
                // dest2: $('#dest2').val(),
                // mensaje: $('#descripcion').val(),

                // nivel_propuesto: $('#nivel_propuesto').val(),
                // ruta_propuesta: $('#ruta_propuesta').val(),
                // tipo_ficha: $('#tipo_ficha').val(),
                // otros_datos: $('#otros_datos').val(),

                // atd: $('#atd').val(),
                // est: $('#est').val(),
                // nivel: $('#nivel').val(),
                // sq: $('#sq').val(),
                // ha: $('#ha').val(),

                fpl_id_punto: id_vector_viaje,
                fpl_punto: name_vector_viaje,
                fpl_id_ruta: ruta_vector_viaje,
                fpl_ruta: ruta_nombre_vector,
                est_array: estimado_vector,
                chg_ruta_array: chgRuta_vector,
                dt_cmp_array: datosComp_vector,
                spl_punto_array: splPunto_vector,
                spl_est: splEst_vector,
                fpl_punto_seleccionado: punto_seleccionado,
                fpl_nivel: nivel_vector,
                fpl_distancia: distancia_vector_viaje,
                selected: selectedRutaId,

                origen_save: 6,
            };

            console.log('sendProcesoVueloData 222', procesoVueloData);
            sendProcesoVueloData(procesoVueloData);

        });

        // TABLA GENERADA POR EL SELECT RUTA

    });
</script>
{{-- Select Escogido y Generacion de Tabla FPL --}}

<!-- checkInputs -->
<script>
    $(document).ready(function() {

        $(document).on('change', '.custom-control-input', function() {
            const isChecked = $(this).is(':checked');
            const checkboxId = $(this).attr('id');
            const puntoIdPunto = parseInt(checkboxId.replace('customCheck', ''), 10);
            console.log('puntoIdPunto', puntoIdPunto);

            // Obtener el <option> actualmente seleccionado
            const selectedOption = $('#id_rutas option:selected')[0];

            if (selectedOption) {
                // Recuperar arrays desde los data-attributes
                let fpl_id_punto = JSON.parse(selectedOption.dataset.id_vector_viaje || "[]");
                let fpl_punto_seleccionado = JSON.parse(selectedOption.dataset.fpl_punto_seleccionado ||
                    "[]");

                // Buscar el índice del puntoIdPunto en el array de puntos
                const indice = fpl_id_punto.indexOf(puntoIdPunto);

                if (indice !== -1) {
                    // Actualizar el valor en el array fpl_punto_seleccionado
                    fpl_punto_seleccionado[indice] = isChecked ? "1" : "0";

                    // Volver a guardar el array actualizado como string
                    selectedOption.dataset.fpl_punto_seleccionado = JSON.stringify(
                        fpl_punto_seleccionado);

                    console.log('fpl_punto_seleccionado actualizado:', fpl_punto_seleccionado);
                } else {
                    console.warn('El puntoIdPunto no fue encontrado en fpl_id_punto');
                }
            } else {
                console.warn('No hay opción seleccionada en #id_rutas');
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

        /* ATD */
        // Aplicar la función de validación a un input específico
        function validarInput(inputId, errorId) {
            $(inputId).on('input', function() {
                var inputValue = $(this).val().slice(0, 4); // Limitar a 4 caracteres

                var regex = /^([01]\d|2[0-3])[0-5]\d$/; // Regex para validar HHMM

                if (!regex.test(inputValue)) {
                    $(errorId).remove(); // Eliminar cualquier mensaje de error previo
                    $('<div id="' + errorId.substring(1) +
                        '" style="color: red;">Formato no válido HHMM</div>').insertAfter(inputId);
                } else {
                    $(errorId).remove(); // Eliminar mensaje de error si el formato es válido
                }

                // Actualizar el valor del input con la versión truncada a 4 caracteres
                $(this).val(inputValue);
            });
        }

        // Aplicar la validación al input ATD
        validarInput('#atd', '#atd-error');

        // Asegurar que el input solo permita 4 caracteres en HTML (Opcional, si lo controlas en el backend también)
        $('#atd').attr('maxlength', 4);
        /* ATD */

        /* ATD TOWER */

        // Aplicar la validación al input ATD
        validarInput('#atd_tower', '#atd-error');

        // Asegurar que el input solo permita 4 caracteres en HTML (Opcional, si lo controlas en el backend también)
        $('#atd_tower').attr('maxlength', 4);

        /* ATD TOWER */

        /* HA */

        // Aplicar la validación al input ATD
        validarInput('#ha', '#atd-error');

        // Asegurar que el input solo permita 4 caracteres en HTML (Opcional, si lo controlas en el backend también)
        $('#ha').attr('maxlength', 4);

        /* HA */

        /* ETA TOWER */

        // Aplicar la validación al input ATD
        validarInput('#eta_tower', '#eta-error');

        // Asegurar que el input solo permita 4 caracteres en HTML (Opcional, si lo controlas en el backend también)
        $('#eta_tower').attr('maxlength', 4);

        /* ETA TOWER */

        /* EAT TOWER */

        // Aplicar la validación al input ATD
        validarInput('#eat_tower_1', '#eat-error');

        // Asegurar que el input solo permita 4 caracteres en HTML (Opcional, si lo controlas en el backend también)
        $('#eat_tower_1').attr('maxlength', 4);

        /* EAT TOWER */

        /* EST */



        $('#est').on('input', function() {
            // Si no hay mensaje de error, ejecutar la función cálculo
            console.log('EST ', $('#est').val());
            calculoEst($('#est').val());
        });

        // Asegurar que el input solo permita 4 caracteres
        $('#est').attr('maxlength', 4);
        /* ETS */

        /* NIVEL */
        // Función para validar el nivel
        function validarNivel(value) {
            // Limitar a 3 dígitos
            value = value.slice(0, 3);

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
                var inputValue = $(this).val().slice(0, 3); // Limitar a 3 caracteres

                var result = validarNivel(inputValue);

                if (!result.valid) {
                    $(errorId).remove(); // Eliminar cualquier mensaje de error previo
                    $('<div id="' + errorId.substring(1) +
                        '" style="color: red;">Formato no válido</div>').insertAfter(inputId);
                } else {
                    $(errorId).remove(); // Eliminar mensaje de error si el formato es válido
                }

                // Actualizar el valor del input con la versión truncada a 3 caracteres
                $(this).val(result.value);
            });
        }

        // Aplicar la validación al input NIVEL
        validarInputNivel('#nivel', '#nivel-error');

        // Evento para llenar la columna Nivel
        $('input[name="nivel"]').on('input', function() {
            const nivelValue = $(this).val().slice(0, 3); // Limitar a 3 caracteres

            const selectedOption = $('#id_rutas option:selected')[0];
            if (!selectedOption) {
                console.warn('No hay opción seleccionada en #id_rutas');
                return;
            }

            const fpl_id_punto = JSON.parse(selectedOption.dataset.id_vector_viaje || "[]");

            // Crear y asignar los valores directamente
            const nivel_array = fpl_id_punto.map(id => {
                $(`input[name="nivel${id}"]`).val(nivelValue);
                return nivelValue;
            });

            $('input[name="fpl_nivel"]').val(JSON.stringify(nivel_array));
        });

        // Limitar el input desde HTML (opcional, si lo controlas en backend también)
        $('#nivel').attr('maxlength', 3);
        /* NIVEL */

        /* NIVEL TOWER */
        function validarInputNivelTower(inputId, errorId) {
            $(inputId).on('input', function() {
                var inputValue = $(this).val().slice(0, 5); // Limitar a 5 caracteres

                // Validar que el último carácter sea "0" o "5"
                if (inputValue.length > 0 && !/^[0-9]*[05]$/.test(inputValue)) {
                    $(errorId).remove(); // Eliminar cualquier mensaje de error previo
                    $('<div id="' + errorId.substring(1) +
                        '" style="color: red;">Formato no válido</div>').insertAfter(inputId);
                } else {
                    $(errorId).remove(); // Eliminar mensaje de error si el formato es válido
                }

                // Actualizar el valor del input con la versión truncada a 5 caracteres
                $(this).val(inputValue);
            });
        }

        // Aplicar la validación al input NIVEL
        validarInputNivelTower('#nivel_tower', '#nivel-error');
        /* NIVEL TOWER */

        /* VELOCIDAD */
        // Evento para llenar la columna Velocidad cuando cambia
        $('input[name="velocidad"]').on('input', function() {
            var velocidadValue = $(this).val(); // Obtener el valor del campo de entrada

            // Seleccionar todas las celdas de la columna "velocidad" y actualizar su valor
            $('#datatableFPL tbody tr').each(function() {

                fetchProcesoVueloData($('#id').val()).then(function(resultado) {
                    var fpl_id_punto = JSON.parse(resultado.fpl_id_punto);

                    fpl_id_punto.forEach((value, index) => {
                        var estimado_value = 'velocidad' + fpl_id_punto[index];
                        $('input[name="' + estimado_value + '"]').val(
                            velocidadValue);
                    });
                });
            });
        });
        /* VELOCIDAD */

        /* SQ */
        // Función para validar el campo SQ
        function validarSQ(value) {
            // Limitar a 4 caracteres
            value = value.slice(0, 4);

            // Validar que el número no sea 7500, 7600 o 7700
            var sqNum = parseInt(value);
            if (sqNum === 7500 || sqNum === 7600 || sqNum === 7700) {
                return {
                    valid: false,
                    value: value,
                    mensaje: "El código ingresado está reservado para emergencias. ¿Estás seguro de querer poner este código?"
                };
            }

            return {
                valid: true,
                value: value
            };
        }

        // Aplicar la función de validación al input #sq
        function validarInputSQ(inputId, errorId) {
            $(inputId).on('input', function(e) {
                var inputValue = $(this).val().slice(0, 4); // Limitar a 4 caracteres

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
                            $(this).val(''); // Dejar vacío si no está seguro
                        }
                    }
                } else {
                    $(errorId).remove(); // Eliminar mensaje de error si el formato es válido
                }

                // Actualizar el valor del input con la versión truncada a 4 caracteres
                $(this).val(result.value);
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

        // Limitar el input desde HTML (opcional, si lo controlas en backend también)
        $('#sq').attr('maxlength', 4);
        /* SQ */

        /* SQ TOWER */
        // Aplicar la validación al input SQ
        validarInputSQ('#sq_tower', '#sq-error');

        // Limitar el input desde HTML (opcional, si lo controlas en backend también)
        $('#sq_tower').attr('maxlength', 4);
        /* SQ TOWER */

    });
</script>
{{-- Maneja los calculos de Estimado a partir de la escritura en el campo EST --}}

{{-- Actualizar campos ATD SQ HA en el objeto FPL --}}
{{-- <script>
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
                // btnAutorizado.removeAttribute('disabled');
            } else {
                // btnTest.setAttribute('disabled', true); // Desactiva el botón "Test" si alguno está vacío o nivel <= 0
                // Desactiva el botón "Autorizado"
                // btnAutorizado.setAttribute('disabled', true);
            }
        }

        // Añadir eventos de cambio o input a los campos para verificar
        if (userTip.pk_id_tipo_ficha !== 22) {
            estInput.addEventListener('input', checkInputs);
            nivelInput.addEventListener('input', checkInputs);
            sqInput.addEventListener('input', checkInputs);
        }
    });
</script> --}}
{{-- Actualizar campos ATD SQ HA en el objeto FPL --}}

{{-- Validacion Boton Autorizado --}}
<script>
    // Función para verificar si los campos tienen valor mayor a 0
    /* function checkInputs() {
        const atd = parseFloat(document.getElementById('atd').value) || 0;
        const est = parseFloat(document.getElementById('est').value) || 0;
        const nivel = parseFloat(document.getElementById('nivel').value) || 0;
        const sq = parseFloat(document.getElementById('sq').value) || 0;

        // Verificar si todos los valores son mayores a 0
        if (atd > 0 && est > 0 && nivel > 0 && sq > 0) {
            // document.getElementById('btnAutorizado').disabled = false;
            console.log('AUTORIZADO ON');

        } else {
            // document.getElementById('btnAutorizado').disabled = true;
            console.log('AUTORIZADO OFF');
        }
    } */

    // Agregar eventos de cambio en los campos para verificar los valores

    /* if (userTip.pk_id_tipo_ficha !== 22) {
        document.getElementById('atd').addEventListener('input', checkInputs);
        document.getElementById('est').addEventListener('input', checkInputs);
        document.getElementById('nivel').addEventListener('input', checkInputs);
        document.getElementById('sq').addEventListener('input', checkInputs);
    } */
</script>
{{-- Validacion Boton Autorizado --}}

<!-- Segundo bloque de script: Lógica del DOM y eventos -->
{{-- Boton Autorizado --}}
<script>
    const userTip = @json($userTip);

    //const userTip = @json($userTip);
    if (userTip.pk_id_tipo_ficha !== 22) {

        document.getElementById('btnAutorizado').addEventListener('click', function() {

            validacion_impresion();

            var id_estado_autorizado = 3; // Autorizado
            var nombre_estado = "AUTORIZADO";
            var color = "#591C21";

            // Obtener opción seleccionada
            /* const selectedOption = $('#id_rutas option:selected')[0];
            if (!selectedOption) {
                console.warn('No hay opción seleccionada en #id_rutas');
                return;
            } */

            $('#id_estado').val(id_estado_autorizado);
            $('#name_estado').val(nombre_estado);
            $('#color_estado').val(color);

            const id_amhs = $('#id').val();

            console.log('Autorizado ID', id_amhs);
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

            if (estadoCell) {
                // Buscar el span dentro del td que contiene el badge
                const badge = estadoCell.querySelector('span');

                if (badge) {
                    badge.textContent = nombre_estado; // Cambiar el texto dentro del badge
                    badge.style.backgroundColor = color; // Cambiar el color de fondo del badge
                    badge.style.color = "#ffffff"; // Asegurar que el texto sea blanco para mejor contraste
                    badge.style.fontWeight = "bold"; // Mantener la negrita en el texto
                }
            }

            const procesoVueloData = {
                id_amhs: id_amhs,
                id_estado: id_estado_autorizado,
                name_estado: nombre_estado,
                color_estado: color,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                ha: formattedTime,
                origen_save: 7,
            };

            console.log('TEST DATA', procesoVueloData);

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

            /* const table = document.getElementById("amhs-dataAutorizados");

            if (table) {
                const row = table.querySelector(`tr[data-id="${id_amhs}"]`);
                if (!row) {
                    checkForNewRecordsAutorizados(id_amhs);
                }
            } */

            // Evita el comportamiento por defecto (como enviar el formulario)
            event.preventDefault();

            const btnTest = document.getElementById('btnTest');

            // Simula un clic en el botón Test
            if (btnTest) {
                btnTest.click();
            }

        });

        document.getElementById('btnRepetido').addEventListener('click', function() {

            var id_amhs = $('#id').val();
            var id_estado_autorizado = 1; // Repetido
            var nombre_estado = "REPETIDO";
            var color = "#7A577A";
            const estadoCell = document.getElementById('estado' + id_amhs);

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

            $('#id_estado').val(id_estado_autorizado);
            $('#name_estado').val(nombre_estado);
            $('#color_estado').val(color);

            const procesoVueloData = {
                id_amhs: id_amhs,
                id_estado: id_estado_autorizado,
                name_estado: nombre_estado,
                color_estado: color,

                tipo_ficha: userTip.pk_id_tipo_ficha,
                selected: -1,
                origen_save: 8,
            };

            console.log('procesoVueloData', procesoVueloData);

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

        });

        document.getElementById('btnCancelado').addEventListener('click', function() {

            var id_amhs = $('#id').val();
            var id_estado_autorizado = 1; // Repetido
            var nombre_estado = "CANCELADO";
            var color = "#D92525";
            const estadoCell = document.getElementById('estado' + id_amhs);

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

            $('#id_estado').val(id_estado_autorizado);
            $('#name_estado').val(nombre_estado);
            $('#color_estado').val(color);

            const procesoVueloData = {
                id_amhs: id_amhs,
                id_estado: id_estado_autorizado,
                name_estado: nombre_estado,
                color_estado: color,

                tipo_ficha: userTip.pk_id_tipo_ficha,
                selected: -1,
                origen_save: 9,
            };

            console.log('procesoVueloData', procesoVueloData);

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

        });

    }
</script>
{{-- Boton Autorizado --}}

{{-- Boton Test --}}
<script>
    $(document).ready(function() {

        $('#btnTest').on('click', function() {
            showLoadingIndicatorForm();

            // Activar botón "Imprimir"
            document.getElementById('printButton')?.removeAttribute('disabled');
            document.getElementById('btnPrint')?.removeAttribute('disabled');

            // Obtener opción seleccionada
            const selectedOption = $('#id_rutas option:selected')[0];
            if (!selectedOption) {
                console.warn('No hay opción seleccionada en #id_rutas');
                return;
            }

            const id = $('#id').val();
            const selectedRutaId = selectedOption.value;
            const arrayOptionSelect = selectedOption.text;
            const fpl_id_punto = JSON.parse(selectedOption.dataset.id_vector_viaje || "[]");
            const fpl_punto_seleccionado = JSON.parse(selectedOption.dataset.fpl_punto_seleccionado ||
                "[]");

            console.log('TEST selectedOption', selectedRutaId);
            console.log('TEST array_option_select', arrayOptionSelect);

            // Recolectar valores por punto
            const valoresEstimados = [];
            const valoresNivel = [];
            const valoresPunto = [];
            const valoresDistancia = [];
            const valoresRuta = [];
            const valoresChgRuta = [];
            const valoresDatComp = [];
            const valoresSplPunto = [];
            const valoresSplEst = [];

            fpl_id_punto.forEach(punto => {

                valoresEstimados.push(document.getElementById(`estimado${punto}`)?.value ||
                    null);
                valoresNivel.push(document.getElementById(`nivel${punto}`)?.value || null);
                valoresPunto.push(document.getElementById(`punto${punto}`)?.value || null);
                valoresDistancia.push(document.getElementById(`distancia${punto}`)?.value ||
                    null);
                valoresRuta.push(document.getElementById(`ruta${punto}`)?.value || null);
                valoresChgRuta.push(document.getElementById(`chg_ruta${punto}`)?.value || null);
                valoresDatComp.push(document.getElementById(`dat_comp${punto}`)?.value || null);
                valoresSplPunto.push(document.getElementById(`spl_punto${punto}`)?.value ||
                    null);
                valoresSplEst.push(document.getElementById(`spl_est${punto}`)?.value || null);
            });

            // Recolectar otros campos del formulario
            const atd = $('#atd').val();
            const sq = $('#sq').val();
            const ha = $('#ha').val();
            const nivel = $('#nivel').val();
            const velocidad = $('#velocidad').val();
            const vuelo = $('#vuelo').val();
            const tipo = $('#tipo').val();
            const etd = $('#etd').val();
            const dep = $('#origen').val();
            const destino = $('#destino').val();
            const sel = $('#sel').val();
            const reg = $('#reg').val();
            const equipo = $('#equipo').val();
            const est = $('#est').val();
            const primerPunto = fpl_id_punto[0];

            const subTipoFicha = (dep === destino && userTip.pk_id_tipo_ficha !== "17") ?
                $('#sub_tipo_ficha').val() :
                null;

            console.log('TEST vuelo', vuelo);
            console.log('TEST array_option_select', arrayOptionSelect);
            console.log('TEST fpl_punto_seleccionado', fpl_punto_seleccionado);

            // Verificar si es un número válido (no "SelectRuta", no "DCT", etc.)
            if (!isNaN(selectedRutaId) && selectedRutaId.trim() !== '') {

                // Actualizar ruta_predeterminada vía AJAX
                $.ajax({
                    url: '/actualizar-ruta-predeterminada',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        vuelo,
                        array_option_select: arrayOptionSelect,
                        fpl_punto_seleccionado
                    },
                    success: function(response) {
                        console.log('Ruta Predeterminada actualizada exitosamente');
                        console.log('Response', response);
                    },
                    error: function(xhr) {
                        console.error('Error al actualizar la ruta');
                        console.error(xhr.responseText);
                    },
                    complete: function() {

                    }
                });

            }

            // Limpiar contenedor de fichas
            $('#ficha_progreso_container').empty();

            // Buscar índice de la última ficha seleccionada
            const indexUltimaFicha = fpl_punto_seleccionado.reduce((acc, val, i) =>
                parseInt(val) === 1 ? i : acc, 0
            );

            let puntoIdPunto = 0;
            let primeraFicha = 0;

            fpl_punto_seleccionado.forEach((value, index) => {
                if (parseInt(value) !== 1) return;

                const estValue = valoresEstimados[index];
                const puntoValue = valoresPunto[index];
                const nivelValue = valoresNivel[index];
                const ruta = valoresRuta[index];
                const chgRuta = valoresChgRuta[index];
                const datComplem = valoresDatComp[index];
                const splPunto = valoresSplPunto[index];
                const splEst = valoresSplEst[index];
                const ultimaFicha = index === indexUltimaFicha ? 1 : 0;

                // Generar tabla dinámica
                const tableHtml = ficha_tabla(
                    puntoIdPunto, vuelo, tipo, velocidad, etd, dep, ruta, destino,
                    sel, reg, sq, ha, atd, nivelValue, puntoValue, estValue,
                    primeraFicha, ultimaFicha, chgRuta, datComplem, splPunto, splEst,
                    equipo, primerPunto, fpl_id_punto[index]
                );

                primeraFicha = 1;

                $('#ficha_progreso_container')
                    .append(tableHtml)
                    .css('display', 'block');
            });

            console.log('TEST ID', id);

            const procesoVueloData = {
                /* id_estado: $('#id_estado').val(),
                name_estado: $('#name_estado').val(),
                color_estado: $('#color_estado').val(), */

                id_amhs: id,
                primera_ficha: primerPunto,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                sub_tipo_ficha: subTipoFicha,

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
                dest2: $('#dest2').val(),
                nivel_propuesto: $('#nivel_propuesto').val(),
                ruta_propuesta: $('#ruta_propuesta').val(),
                otros_datos: $('#otros_datos').val(),

                atd: $('#atd').val(),
                est: $('#est').val(),
                nivel: $('#nivel').val(),
                sq: $('#sq').val(),
                ha: $('#ha').val(),

                fpl_punto_seleccionado: fpl_punto_seleccionado,
                fpl_punto: valoresPunto,
                fpl_distancia: valoresDistancia,
                est_array: valoresEstimados,
                fpl_nivel: valoresNivel,
                fpl_ruta: valoresRuta,
                chg_ruta_array: valoresChgRuta,
                dt_cmp_array: valoresDatComp,
                spl_punto_array: valoresSplPunto,
                spl_est: valoresSplEst,

                origen_save: 10,

            };

            console.log('TEST DATA', procesoVueloData);

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

            hideLoadingIndicatorForm();

        });

        $('#btnReset').on('click', function(event) {
            event.preventDefault(); // Evita la acción por defecto del botón

            // Obtiene los valores a enviar
            const userTip = @json($userTip);
            console.log('RS UserTip', userTip);
            console.log('RS OACI', userTip.pk_oaci);
            console.log('RS TIPO FICHA', userTip.pk_id_tipo_ficha);
            console.log('RS VUELO', $('#vuelo').val());

            const select = document.getElementById('id_rutas');
            const selectedText = select.options[select.selectedIndex].text;
            console.log('RS SELECT', selectedText);

            // Construcción del objeto de datos
            const dataToSend = {
                id_amhs: $('#id').val(),
                oaci: userTip.pk_oaci,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                vuelo: $('#vuelo').val(),
                array_option_select: selectedText,
                _token: "{{ csrf_token() }}" // Token CSRF de Laravel
            };

            // Alerta de confirmación con SweetAlert2
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Resetear Plan de Vuelo",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, Resetear"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, se envía la petición AJAX
                    $.ajax({
                        url: "{{ route('fpl_reset') }}", // Ruta definida en Laravel
                        type: "POST",
                        data: dataToSend,
                        success: function(response) {
                            console.log("Respuesta del servidor:", response);

                            // Mostrar mensaje de éxito con SweetAlert2
                            Swal.fire({
                                title: "Reseteado!",
                                text: "Los datos han sido reseteados correctamente. VUELVE A SELECCIONAR EL PLAN DE VUELO",
                                icon: "success"
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Error en la petición AJAX:", error);

                            // Mostrar mensaje de error con SweetAlert2
                            Swal.fire({
                                title: "Error",
                                text: "Ocurrió un error al intentar eliminar los datos.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });

        $('#btnTest_tower').on('click', function() {

            var vuelo = $('#vuelo').val();
            var tipo = $('#tipo').val();
            var dep = $('#origen').val();
            var reg = $('#reg').val();
            var etd = $('#etd').val();
            var equipo = $('#equipo').val();
            var destino = $('#destino').val();
            var nivel_propuesto = $('#nivel_propuesto').val();
            var ruta_propuesta = $('#ruta_propuesta').val();
            var idAmhs = $('#id').val();
            var rpl = $('#rmk').val();
            var atd_tower = $('#atd_tower').val();
            var sq_tower = $('#sq_tower').val();
            var nivel_tower = $('#nivel_tower').val();
            var eat_tower = [];
            eat_tower[0] = $('#eat_tower_1').val();
            eat_tower[1] = $('#eat_tower_2').val().toUpperCase();
            eat_tower[2] = $('#eat_tower_0').val().toUpperCase();

            var ha_tower = $('#ha_tower').val();
            var rmk = $('#rmk').val();

            console.log('RMK TOWER', rmk);

            //Sub Tipo de Ficha
            if (dep === destino && userTip.pk_id_tipo_ficha !== 17) {
                var subTipoFicha = $('#sub_tipo_ficha').val();
            } else {
                var subTipoFicha = null;
            }

            if (destino === userTip.descripcion) {
                // ATC LCL SLCB
                if (parseInt($('#ficha_atc2').val(), 10) === 52) {
                    subTipoFicha = 52;
                }
            }

            console.log('TOWER subTipoFicha', subTipoFicha);

            // Recuperar Ultimo Estimado
            $.ajax({
                url: '{{ route('fichaACC4') }}',
                method: 'POST',
                data: {
                    'id-amhs': idAmhs,
                    'tipo-ficha': 16,
                    'pk-oaci': userTip.pk_oaci,
                    _token: '{{ csrf_token() }}' // Token CSRF para solicitudes POST en Laravel
                },
                success: function(response) {

                    // Limpiar contenedor de fichas
                    $('#ficha_progreso_container').empty();

                    var last_est = $('#eta_tower').val();

                    var tableHtml = ficha_tabla_tower(vuelo, tipo, dep, reg, etd,
                        equipo, destino, nivel_propuesto, ruta_propuesta, last_est, rpl,
                        sq_tower, nivel_tower, eat_tower, atd_tower, ha_tower, rmk);

                    // Sustituir el contenido del contenedor con la nueva tabla
                    $('#ficha_progreso_container').html(tableHtml);

                    // Asegúrate de que el contenedor esté visible
                    $('#ficha_progreso_container').css('display', 'block');

                },
                error: function(xhr, status, error) {
                    // En caso de error, mostrar un mensaje en la tabla y en la consola
                    $('#amhs-data').html(
                        '<tr><td colspan="10">Error cargando datos.</td></tr>');
                    console.error('Error:', error, 'Estado:', status, 'XHR:', xhr);
                },
                complete: function() {
                    // Aquí puedes ocultar un indicador de carga
                    // console.log('Solicitud completada.');
                }
            });

            console.log('userTip.descripcion', userTip.descripcion);

            if (dep === userTip.descripcion || destino === userTip.descripcion) {

                validacion_impresion();

                var id_estado = parseInt($('#id_estado').val(), 10);
                console.log('TOWER ID ESTADO', id_estado);

                if (!id_estado || id_estado < 2) {

                    var id_estado_trabajando = 2;
                    var nombre_estado = "TRABAJADO";
                    var color = "#004DC9";

                    // Guardar Registro en la Base de Datos
                    const id_amhs = $('#id').val();
                    const estadoCell = document.getElementById('estado' + id_amhs);

                    if (estadoCell) {
                        const badge = estadoCell.querySelector('span');

                        if (badge) {
                            badge.textContent = nombre_estado;
                            badge.style.backgroundColor = color;
                            badge.style.color = "#ffffff";
                            badge.style.fontWeight = "bold";
                        }
                    }

                    $('#id_estado').val(id_estado_trabajando);
                    $('#name_estado').val(nombre_estado);
                    $('#color_estado').val(color);

                }

                const procesoVueloData = {
                    id_amhs: $('#id').val(),
                    id_estado: $('#id_estado').val(),
                    name_estado: $('#name_estado').val(),
                    color_estado: $('#color_estado').val(),

                    tipo_ficha: $('#tipo_ficha').val(),
                    atd: $('#atd_tower').val(),
                    sq: $('#sq_tower').val(),
                    nivel_tower: $('#nivel_tower').val(),
                    eat_tower: JSON.stringify(eat_tower),
                    ha: $('#ha_tower').val(),
                    sub_tipo_ficha: subTipoFicha,
                    eta: $('#eta_tower').val(),
                    tra: $('#tra_tower').val(),

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
                    dest2: $('#dest2').val(),
                    nivel_propuesto: $('#nivel_propuesto').val(),
                    ruta_propuesta: $('#ruta_propuesta').val(),
                    otros_datos: $('#otros_datos').val(),
                    origen_save: 11,
                };

                console.log('procesoVueloData Tower', procesoVueloData);

                // Llamar a la función para enviar los datos
                sendProcesoVueloData(procesoVueloData);

                // Proceso para fichas ATC-001 --> ATC-003
                /* if (userTip.pk_id_tipo_ficha === 22) {
                    if (document.getElementById('origen').value === userTip.descripcion) {
                        autorizado_atc03();
                    }
                } */
                // Proceso para fichas ATC-001 --> ATC-003

            }

        });

        $('#btnAutorizado_tower').on('click', function() {

            var id_estado_autorizado = 3; // Autorizado
            var nombre_estado = "AUTORIZADO";
            var color = "#591C21";

            $('#id_estado').val(id_estado_autorizado);
            $('#name_estado').val(nombre_estado);
            $('#color_estado').val(color);

            // Guardar Registro en la Base de Datos
            const id_amhs = $('#id').val();

            // Obtener la fecha y hora actual en UTC
            let now = new Date();
            let hoursUTC = now.getUTCHours();
            let minutesUTC = now.getUTCMinutes();

            // Formatear la hora y los minutos para que siempre tengan 2 dígitos
            let formattedTime = hoursUTC.toString().padStart(2, '0') + minutesUTC.toString()
                .padStart(2, '0');

            // Poner el valor formateado en el campo de entrada
            $('#ha_tower').val(formattedTime);

            console.log('NOMBRE ESTADO TOWER', nombre_estado);
            console.log('ID ESTADO TOWER', id_estado_autorizado);

            const estadoCell = document.getElementById('estado' + id_amhs);

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

            /* var eat_tower = [];
            eat_tower[0] = $('#eat_tower_1').val();
            eat_tower[1] = $('#eat_tower_2').val(); */

            var dep = $('#origen').val();
            var destino = $('#destino').val();

            //Sub Tipo de Ficha
            if (dep === destino && $('#tipo_ficha').val() !== 17) {
                var subTipoFicha = $('#sub_tipo_ficha').val();
            } else {
                var subTipoFicha = null;
            }

            if (destino === userTip.descripcion) {
                // ATC LCL SLCB
                if (parseInt($('#ficha_atc2').val(), 10) === 52) {
                    subTipoFicha = 52;
                }
            }

            const procesoVueloData = {
                id_amhs: $('#id').val(),
                id_estado: id_estado_autorizado,
                name_estado: nombre_estado,
                color_estado: color,

                ha: $('#ha_tower').val(),

                tipo_ficha: $('#tipo_ficha').val(),
                sub_tipo_ficha: subTipoFicha,
                origen_save: 12,
            };

            console.log('procesoVueloData Tower', procesoVueloData);

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

            // Proceso para fichas ATC-001 --> ATC-003
            /* if (userTip.pk_id_tipo_ficha === 22) {
                if (document.getElementById('origen').value === userTip.descripcion) {
                    autorizado_atc03();
                }
            } */
            // Proceso para fichas ATC-001 --> ATC-003

            // Evita el comportamiento por defecto (como enviar el formulario)
            event.preventDefault();

            const btnTest = document.getElementById('btnTest_tower');

            // Simula un clic en el botón Test
            if (btnTest) {
                btnTest.click();
            }

        });

        $('#btnCancelado_tower').on('click', function() {

            var id_amhs = $('#id').val();
            var id_estado_autorizado = 1; // Repetido
            var nombre_estado = "CANCELADO";
            var color = "#D92525";

            /* const estadoCell = document.getElementById('estado' + id_amhs);

            if (estadoCell) {
                estadoCell.textContent = nombre_estado;
                estadoCell.style.color = color;
                estadoCell.style.fontWeight = "bold";
            } */

            const estadoCell = document.getElementById('estado' + id_amhs);

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

            // Eliminar autorizado

            $('#id_estado').val(id_estado_autorizado);
            $('#name_estado').val(nombre_estado);
            $('#color_estado').val(color);

            var dep = $('#origen').val();
            var destino = $('#destino').val();

            //Sub Tipo de Ficha
            if (dep === destino && $('#tipo_ficha').val() !== 17) {
                var subTipoFicha = $('#sub_tipo_ficha').val();
            } else {
                var subTipoFicha = null;
            }

            if (destino === userTip.descripcion) {
                // ATC LCL SLCB
                if (parseInt($('#ficha_atc2').val(), 10) === 52) {
                    subTipoFicha = 52;
                }
            }

            const procesoVueloData = {

                id_amhs: $('#id').val(),
                id_estado: id_estado_autorizado,
                name_estado: nombre_estado,
                color_estado: color,

                tipo_ficha: $('#tipo_ficha').val(),
                sub_tipo_ficha: subTipoFicha,
                origen_save: 13,
            };

            console.log('procesoVueloData Tower', procesoVueloData);

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

        });

    });
</script>
{{-- Boton Test --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnPrint = document.getElementById('btnPrint');

        if (btnPrint) {
            btnPrint.addEventListener('click', function(event) {
                event.preventDefault(); // Evita cualquier acción predeterminada

                const btnAutorizado = document.getElementById('printButton');
                if (btnAutorizado) {
                    btnAutorizado.click(); // Simula el clic en el botón 'printButton'
                }
            });
        }
    });
</script>



{{-- Estilo Text Fecha Tabla de Impresion de Fichas --}}
<style>
    .small-text {
        font-size: 10px;
        font-weight: bold;
    }
</style>
{{-- Estilo Text Fecha Tabla de Impresion de Fichas --}}
