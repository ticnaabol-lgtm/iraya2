<div class="modal fade" id="addNewCardModalPV" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle"
    aria-hidden="true">

    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModaltitle">Nuevo Plan de Vuelo</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <form id="planVueloForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="vuelo_pv">Vuelo:</label>
                                <input type="text" class="form-control" name="vuelo_pv" id="vuelo_pv"
                                    placeholder="Introduzca Vuelo" value="">
                            </div>
                        </div>

                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="tipo_pv">Tipo:</label>
                                <input type="text" class="form-control" name="tipo_pv" id="tipo_pv"
                                    placeholder="Introduzca Tipo" value="">
                            </div>
                        </div>

                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="dep_pv">ETD:</label>
                                <input type="number" class="form-control" name="etd_pv" id="etd_pv"
                                    placeholder="Introduzca ETD" value="">
                            </div>
                        </div>

                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="dep_pv">DEP:</label>
                                <input type="text" class="form-control" name="dep_pv" id="dep_pv"
                                    placeholder="Introduzca DEP" value="">
                            </div>
                        </div>

                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="destino_pv">DEST:</label>
                                <input type="text" class="form-control" name="dest_pv" id="dest_pv"
                                    placeholder="Introduzca DEST" value="">
                            </div>
                        </div>

                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="regla_tipo_pv">Regla Tipo:</label>
                                <input type="text" class="form-control" name="regla_tipo_pv" id="regla_tipo_pv"
                                    placeholder="Introduzca Regla Tipo" value="">
                            </div>
                        </div>


                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="reg_pv">REG:</label>
                                <input type="text" class="form-control" name="reg_pv" id="reg_pv"
                                    placeholder="Introduzca REG" value="">
                            </div>
                        </div>

                        <div class="col-md-4 mb-md">
                            <div class="control-group">
                                <label for="dep_pv">Velocidad:</label>
                                <input type="number" class="form-control" name="velocidad_pv" id="velocidad_pv"
                                    placeholder="Introduzca Velocidad" value="">
                            </div>
                        </div>

                    </div>

                    <br>
                    <div class="d-flex">
                        <div class="flex-grow-1"></div>
                        <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
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
    $(document).ready(function() {
        $('#planVueloForm').on('submit', function(event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

            // Recuperar la fecha actual en formato UTC
            let fecha = new Date().toISOString();

            let ahora = new Date();
            let hora = ahora.toTimeString().substring(0, 5); // HH:MM

            var id_estado = 0;
            var color_estado = "#FFFF33";
            var name_estado = "CREADO";
            var tipo_fpl = 1;

            // Selecciona el primer <tr> que tiene el atributo data-id en la tabla con el id 'datatableScrollY'
            let firstTr = document.querySelector('#datatableScrollY tr[data-id]');
            let lastId = firstTr.getAttribute('data-id');

            if (lastId) {
                lastId = parseInt(lastId); // Asegúrate de convertirlo a número
            }

            console.log('LastID', lastId);

            const url = '/proceso-vuelo';

            const procesoVueloData = {
                id_amhs: 0,
                fecha: fecha,
                hora: hora,
                id_estado: id_estado,
                name_estado: name_estado,
                color_estado: color_estado,
                tipo_ficha: userTip.pk_id_tipo_ficha,
                                             
                vuelo: document.getElementById("vuelo_pv").value,
                tipo: document.getElementById("tipo_pv").value,
                etd: document.getElementById("etd_pv").value,
                origen: document.getElementById("dep_pv").value,
                destino: document.getElementById("dest_pv").value,
                regla_tipo: document.getElementById("regla_tipo_pv").value,
                reg: document.getElementById("reg_pv").value,
                velocidad: document.getElementById("velocidad_pv").value,
                eobt: '',
                linea_aerea: '',
                dep: document.getElementById("dep_pv").value,
                tipo_fpl: tipo_fpl,
                fecha_creado: fecha,
                id_amhs_creado: lastId,
                origen_save: 0,
            };

            // Llamar a la función para enviar los datos
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute(
                                'content')
                    },
                    body: JSON.stringify(procesoVueloData)
                })
                .then(response => response.json()) // Asumir que la respuesta será JSON
                .then(jsonData => {
                    console.log('Operación exitosa:', jsonData.message);
                    console.log('Registro creado o actualizado:', jsonData.data);

                    // Puedes cerrar la modal y mostrar un mensaje de éxito
                    $('#addNewCardModalPV').modal('hide');

                    // Añadir una nueva fila a la tabla
                    var fichaProgreso = jsonData.data;
                    // Crear un objeto Date a partir de la cadena de fecha y hora
                    let fecha = new Date(fichaProgreso.fecha_creado);

                    // Extraer la fecha
                    let year = fecha.getFullYear();
                    let month = String(fecha.getMonth() + 1).padStart(2, '0');
                    let day = String(fecha.getDate()).padStart(2, '0');

                    // Formatear la salida
                    let fechaFormato = `${year}-${month}-${day}`;

                    // Extraer el día, hora y minutos en el formato dd HH:MM
                    let dia = String(fecha.getDate()).padStart(2, '0');
                    let horas = String(fecha.getHours()).padStart(2, '0');
                    let minutos = String(fecha.getMinutes()).padStart(2, '0');

                    // Formatear la salida
                    let formatoDiaHoraMin = `${dia} ${horas}:${minutos}`;

                    var newRow = `
                        <tr
                            data-id="${fichaProgreso.id_amhs_creado}"
                            data-id_amhs="${fichaProgreso.id}"
                            data-id_estado="${id_estado}"
                            data-fecha="${fechaFormato}"
                            data-hora="${formatoDiaHoraMin}"
                            data-vuelo="${fichaProgreso.vuelo}"
                            data-tipo="${fichaProgreso.tipo}"
                            data-origen="${fichaProgreso.origen}"
                            data-destino="${fichaProgreso.destino}"
                            data-eobt=""
                            data-linea_aerea=""
                            data-velocidad="${fichaProgreso.velocidad}"
                            data-mensaje=""
                            data-dep="${fichaProgreso.dep}"
                            data-etd="${fichaProgreso.etd}"
                            data-reg="${fichaProgreso.reg}"
                            data-sel=""
                            data-puntos=""
                            data-regla_tipo="${fichaProgreso.regla_tipo}"
                            data-tipo_fpl="${fichaProgreso.tipo_fpl}"
                        >
                        <td class="align-middle">${fichaProgreso.id_amhs}</td>
                        
                        <td class="align-middle" id="estado${fichaProgreso.id}">
                            <span class="badge rounded-pill text-dark" style="background-color: #FFFF33;">
                                CREADO
                            </span>
                        </td>
                        
                        <td class="align-middle">${formatoDiaHoraMin}</td>
                            <td class="align-middle">${fichaProgreso.vuelo}</td>
                            <td class="align-middle">${fichaProgreso.tipo}</td>
                            <td class="align-middle">${fichaProgreso.origen}</td>
                            <td class="align-middle">${fichaProgreso.destino}</td>
                            <td class="align-middle"></td>
                            <td class="align-middle">${fichaProgreso.regla_tipo}</td>
                            <td class="align-middle"></td>
                            <td class="align-middle" id="usuario${fichaProgreso.id}" style="font-size: 10px;"></td>
                        </tr>`;

                    $('#amhs-data').prepend(newRow);

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Plan de vuelo creado exitosamente",
                        showConfirmButton: false,
                        timer: 1500,
                        width: "250px", // Reduce el tamaño del modal
                        customClass: {
                            title: "small-title", // Clase para reducir el tamaño del texto
                            popup: "small-popup" // Clase para modificar el modal
                        }
                    });

                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                    console.error('Hubo un problema con la solicitud:', error.message);
                });

        });

    });
</script>
