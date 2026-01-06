<div class="modal fade" id="addNewCardModalAutorizacion" tabindex="-1" role="dialog" aria-labelledby="addNewCardModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="card-title m-0" id="addNewCardModalTitle">Formulario - Registro Autorización</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="AutorizacionForm" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="autorizacion_id">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="razon_social" class="form-label">Nombre Cliente</label>
                            <input type="text" class="form-control text-uppercase" name="razon_social"
                                id="razon_social" placeholder="Razón Social" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="fecha_autorizacion" class="form-label">Fecha de Autorización</label>
                            <input type="date" class="form-control" name="fecha_autorizacion" id="fecha_autorizacion"
                                required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="numero_autorizacion" class="form-label">Número de Autorización</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="numero_autorizacion"
                                    id="numero_autorizacion" min="1" maxlength="5" style="max-width: 100px;"
                                    oninput="this.value = this.value.slice(0, 5);" required>
                                <span class="input-group-text px-2">/</span>
                                <select class="form-select" name="gestion_autorizacion" id="gestion_autorizacion"
                                    style="max-width: 80px;" required>
                                    <!-- Opciones generadas dinámicamente -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="cliente" class="form-label">Cliente (OACI)</label>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">
                                    <i class="fa-solid fa-user-tie" title="Cliente"></i>
                                </span>
                                <input type="text" class="form-control text-uppercase" name="cliente" id="cliente"
                                    placeholder="Cliente" value="" oninput="this.value = this.value.toUpperCase()"
                                    required>

                                <input type="hidden" class="form-control" name="origen_cliente" id="origen_cliente"
                                    value="">
                            </div>

                            <ul id="resultado-clientes" class="list-group mt-1" style="cursor: pointer;"></ul>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="cliente2" class="form-label">Cliente 2 (OACI)</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-user-tie" title="Cliente 2"></i>
                                </span>
                                <input type="text" class="form-control text-uppercase" name="cliente2" id="cliente2"
                                    placeholder="Cliente 2" oninput="this.value = this.value.toUpperCase()">

                                <input type="hidden" class="form-control" name="origen_cliente2" id="origen_cliente2"
                                    value="">
                            </div>

                            <ul id="resultado-clientes2" class="list-group mt-1" style="cursor: pointer;"></ul>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tipo_aeronave" class="form-label">Tipo de Aeronave(s)</label>
                            <input type="text" class="form-control text-uppercase" name="tipo_aeronave"
                                id="tipo_aeronave">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="pais" class="form-label">Nacionalidad</label>
                            <select name="nacionalidad" id="nacionalidad" class="form-control text-uppercase select2"
                                required>
                                <option value="" disabled selected>Seleccione un país</option>
                                @foreach ($paises as $pais)
                                    <option value="{{ $pais->pais }}">{{ strtoupper($pais->pais) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="peso" class="form-label">Peso(s)</label>
                            <input type="number" step="0.01" class="form-control" name="peso"
                                id="peso">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="medida_peso" class="form-label">Medida Peso</label>
                            <select name="medida_peso" id="medida_peso" class="form-control">
                                <option value="" disabled selected>Seleccione unidad</option>
                                <option value="KG">Kilogramos (KG)</option>
                                <option value="LBS">Libras (LBS)</option>
                                <option value="TON">Toneladas (TON)</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="piloto" class="form-label">Piloto(s) al mando</label>
                            <input type="text" class="form-control text-uppercase" name="piloto" id="piloto">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="ruta" class="form-label">Rutas a Usar</label>
                            <input type="text" class="form-control text-uppercase" name="ruta" id="ruta">
                        </div>

                        <div class="col-md-4 mb-3"></div>

                        <div class="col-md-4 mb-3">
                            <label for="ultimo_aeropuerto" class="form-label">Último Aeropuerto</label>
                            <input type="text" class="form-control text-uppercase" name="ultimo_aeropuerto"
                                id="ultimo_aeropuerto" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="aeropuerto_destino" class="form-label">Aeropuerto Destino</label>
                            <input type="text" class="form-control text-uppercase" name="aeropuerto_destino"
                                id="aeropuerto_destino" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="objeto_vuelo" class="form-label">Objeto del Vuelo</label>
                            <input type="text" class="form-control text-uppercase" name="objeto_vuelo"
                                id="objeto_vuelo">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tiempo_validez_inicio" class="form-label">Inicio de Validez</label>
                            <input type="date" class="form-control text-uppercase" name="tiempo_validez_inicio"
                                id="tiempo_validez_inicio" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="tiempo_validez_fin" class="form-label">Fin de Validez</label>
                            <input type="date" class="form-control" name="tiempo_validez_fin"
                                id="tiempo_validez_fin" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="dias_adelanto" class="form-label">Días de Adelanto / Retraso</label>
                            <input type="number" class="form-control" name="dias_adelanto" id="dias_adelanto"
                                value="0" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control text-uppercase" name="observaciones" id="observaciones" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-opacity btn-danger"
                            data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%' // Asegura que se ajuste bien al form-control
        });
    });
</script>

{{-- CLIENTE --}}
<script>
    $(document).ready(function() {
        $('#cliente').on('input', function() {
            let query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: '/clientes/buscar',
                    method: 'GET',
                    data: {
                        cliente: query
                    },
                    success: function(response) {
                        $('#resultado-clientes').empty();

                        console.log('Clientes', response);

                        if (Array.isArray(response) && response.length > 0) {
                            response.forEach(function(item) {
                                $('#resultado-clientes').append(
                                    `<li class="cliente-item list-group-item"
                                        data-codigo="${item.codigo}"
                                        data-nombre="${item.nombre}"
                                        data-origen="${item.origen}">
                                        <strong>${item.codigo}</strong> ${item.nombre}&nbsp;&nbsp;
                                        <span class="badge ${item.origen === 'Nemesis' ? 'bg-primary' : 'bg-success'}">
                                        ${item.origen}
                                        </span>
                                    </li>`
                                );
                            });
                        } else {
                            $('#resultado-clientes').append(
                                '<li class="list-group-item disabled">No se encontraron clientes</li>'
                            );
                        }

                        $('#resultado-clientes').show();
                    },
                    error: function() {
                        $('#resultado-clientes').html(
                            '<li class="list-group-item disabled">Error al buscar clientes</li>'
                        ).show();
                    }
                });
            } else {
                $('#resultado-clientes').hide();
            }
        });

        $(document).on('click', '.cliente-item', function(e) {
            e.preventDefault();

            const codigo = $(this).data('codigo');
            const nombre = $(this).data('nombre');
            const origen = $(this).data('origen');

            $('#cliente').val(codigo);
            $('#razon_social').val(nombre);
            $('#origen_cliente').val(origen);

            $('#resultado-clientes').hide();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#cliente2').on('input', function() {
            let query = $(this).val();

            if (query.length >= 2) {
                $.ajax({
                    url: '/clientes/buscar',
                    method: 'GET',
                    data: {
                        cliente: query
                    },
                    success: function(response) {
                        $('#resultado-clientes2').empty();

                        if (Array.isArray(response) && response.length > 0) {
                            response.forEach(function(item) {
                                $('#resultado-clientes2').append(
                                    `<li class="cliente2-item list-group-item"
                                        data-codigo="${item.codigo}"
                                        data-nombre="${item.nombre}"
                                        data-origen="${item.origen}">
                                        <strong>${item.codigo}</strong> ${item.nombre}&nbsp;&nbsp;
                                        <span class="badge ${item.origen === 'Nemesis' ? 'bg-primary' : 'bg-success'}">
                                        ${item.origen}
                                        </span>
                                    </li>`
                                );
                            });
                        } else {
                            $('#resultado-clientes2').append(
                                '<li class="list-group-item disabled">No se encontraron clientes</li>'
                            );
                        }

                        $('#resultado-clientes2').show();
                    },
                    error: function() {
                        $('#resultado-clientes2').html(
                            '<li class="list-group-item disabled">Error al buscar clientes</li>'
                        ).show();
                    }
                });
            } else {
                $('#resultado-clientes2').hide();
            }
        });

        $(document).on('click', '.cliente2-item', function(e) {
            e.preventDefault();

            const codigo = $(this).data('codigo');
            const origen = $(this).data('origen');

            $('#cliente2').val(codigo);
            $('#origen_cliente2').val(origen);

            $('#resultado-clientes2').hide();
        });
    });
</script>

{{-- GESTION SELECT --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('gestion_autorizacion');
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year >= currentYear - 5; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            if (year === currentYear) {
                option.selected = true;
            }
            select.appendChild(option);
        }
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif

<script>
    $('#AutorizacionForm').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        let formData = form.serialize(); // Solo esto es necesario

        $.ajax({
            url: "{{ route('autorizacion.store_sobrevuelo') }}",
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(response) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: response.message || "Autorización registrada con éxito",
                    showConfirmButton: false,
                    timer: 1500
                });

                $('#addNewCardModalAutorizacion').modal('hide');
                $('#AutorizacionForm')[0].reset();
                $('.select2').val(null).trigger('change');

                // Volver a poner la fecha que tenía #fechaFiltro
                $('#fecha').val($('#fechaFiltro').val());

                // Actualizar la Tabla
                $('#autorizacionDataTable').DataTable().ajax.reload(null, false);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error al registrar',
                    text: 'Verifica los datos o contacta al soporte técnico.',
                });
            }
        });
    });
</script>
