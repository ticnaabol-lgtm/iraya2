<style>
    .card-body-scroll {
        max-height: 230px;
        /* Puedes ajustar esta altura según tus necesidades */
        overflow-y: auto;
    }

    .form-control,
    .col-form-label {
        font-size: 13px;
        padding: .25rem .5rem;
        height: calc(1.5em + .5rem + 2px);
    }

    .form-row {
        margin-bottom: .5rem;
    }

    .form-inline .form-group {
        margin-right: .5rem;
    }

    .zoom {
        width: 100%;
        height: 200px;
        /* Habilita el scroll */
        overflow: auto;
        /* Deshabilita el cambio de tamaño manual */
        resize: none;
        /* Tamaño de letra inicial */
        font-size: 15px;
    }
</style>

<div class="row gx-0 gy-0">
    <!-- Card 1 (Column 5) -->
    <div class="col-lg-3 px-1">
        <div class="card" style="border-top: 5px solid #0e4e7e;">

            <!-- Card Header -->
            <div class="card-header">
                <button type="button" class="btn btn-raised btn-raised-secondary btn-sm" id="edit_fpl"
                    onclick="updateFlightPlan()">
                    <span class="fa fa-pencil"></span>&nbsp;&nbsp;
                    Editar Plan de Vuelo
                </button>
            </div>

            <div class="card-body card-body-scroll">

                <input type="hidden" class="form-control" id="id" name="id">
                <input type="hidden" class="form-control" id="id_estado" name="id_estado">
                <input type="hidden" class="form-control" id="name_estado" name="name_estado">
                <input type="hidden" class="form-control" id="color_estado" name="color_estado">
                <input type="hidden" class="form-control" id="fecha_impresion" name="fecha_impresion">

                {{-- <input type="hidden" class="form-control" id="hora" name="hora">
                <input type="hidden" class="form-control" id="puntos" name="puntos">
                <input type="hidden" class="form-control" id="dep" name="dep">
                <input type="hidden" class="form-control" id="tipo_fpl" name="tipo_fpl">

                <input type="hidden" class="form-control" id="array_option_select" name="array_option_select">
                <input type="hidden" class="form-control" id="id_rutas_encontradas" name="id_rutas_encontradas">
                <input type="hidden" class="form-control" id="name_rutas_encontradas" name="name_rutas_encontradas">
                <input type="hidden" class="form-control" id="id_vector_viaje" name="id_vector_viaje">
                <input type="hidden" class="form-control" id="llave_select" name="llave_select">
                <input type="hidden" class="form-control" id="name_vector_viaje" name="name_vector_viaje">
                <input type="hidden" class="form-control" id="distancia_vector_viaje" name="distancia_vector_viaje">
                <input type="hidden" class="form-control" id="puntos_mensaje" name="puntos_mensaje">
                <input type="hidden" class="form-control" id="ruta_vector_viaje" name="ruta_vector_viaje">

                <input type="hidden" class="form-control" id="fpl_id_punto" name="fpl_id_punto">
                <input type="hidden" class="form-control" id="fpl_punto" name="fpl_punto">
                <input type="hidden" class="form-control" id="fpl_id_ruta" name="fpl_id_ruta">
                <input type="hidden" class="form-control" id="fpl_ruta" name="fpl_ruta">
                <input type="hidden" class="form-control" id="est_array" name="est_array">
                <input type="hidden" class="form-control" id="chg_ruta_array" name="chg_ruta_array">
                <input type="hidden" class="form-control" id="dt_cmp_array" name="dt_cmp_array">
                <input type="hidden" class="form-control" id="spl_punto_array" name="spl_punto_array">
                <input type="hidden" class="form-control" id="spl_est" name="spl_est">
                <input type="hidden" class="form-control" id="fpl_punto_seleccionado"
                    name="fpl_punto_seleccionado">
                <input type="hidden" class="form-control" id="fpl_distancia" name="fpl_distancia">
                <input type="hidden" class="form-control" id="fpl_nivel" name="fpl_nivel">

                <input type="hidden" class="form-control" id="selectedRutaId" name="selectedRutaId">
                <input type="hidden" class="form-control" id="id_ruta_predeterminada"
                    name="id_ruta_predeterminada">
                <input type="hidden" class="form-control" id="llave_ruta_predeterminada"
                    name="llave_ruta_predeterminada">
                <input type="hidden" class="form-control" id="tipo_ficha" name="tipo_ficha">
                <input type="hidden" class="form-control" id="last_est" name="last_est">
                <input type="hidden" class="form-control" id="rpl" name="rpl">
                <input type="hidden" class="form-control" id="cod_trans" name="cod_trans">
                <input type="hidden" class="form-control" id="ruta_propuesta_atc" name="ruta_propuesta_atc">
                <input type="hidden" class="form-control" id="primer_punto" name="primer_punto"> --}}

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="vuelo" class="col-form-label">Fecha</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="fecha" name="fecha">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="vuelo" class="col-form-label">Vuelo</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="vuelo" name="vuelo">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="tipo" class="col-form-label">Tipo</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="tipo" name="tipo">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="origen" class="col-form-label">DEP</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="origen" name="origen">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="etd" class="col-form-label">ETD</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="etd" name="etd">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="destino" class="col-form-label">DEST</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="destino" name="destino">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="reg" class="col-form-label">REG/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="reg" name="reg">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="sel" class="col-form-label">SEL/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="sel" name="sel">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="dta" class="col-form-label">DTA</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="dta" name="dta">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="regla_tipo" class="col-form-label">Regla Tipo</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="regla_tipo" name="regla_tipo">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="eobt" class="col-form-label">EOBT</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="eobt" name="eobt">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="linea_aerea" class="col-form-label">Línea Aérea</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="linea_aerea"
                            name="linea_aerea">
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="velocidad" class="col-form-label">Velocidad (N)</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="velocidad" name="velocidad">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="equipo" class="col-form-label">Equipo</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="equipo" name="equipo">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="eet" class="col-form-label">EET</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="eet" name="eet">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="opr" class="col-form-label">OPR/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="opr" name="opr">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="turbulencia" class="col-form-label">Turbulencia</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="turbulencia"
                            name="turbulencia">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="aeronaves" class="col-form-label">Aeronaves</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="aeronaves" name="aeronaves">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="aed_alternos" class="col-form-label">Aed. Alternos</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="aed_alternos"
                            name="aed_alternos">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="dof" class="col-form-label">DOF/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="dof" name="dof">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="nav" class="col-form-label">NAV/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="nav" name="nav">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="rmk" class="col-form-label">RMK/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="rmk" name="rmk">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="sts" class="col-form-label">STS/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="sts" name="sts">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="rvr" class="col-form-label">RVR/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="rvr" name="rvr">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="rvr" class="col-form-label">DEST/</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="dest2" name="dest2">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="rvr" class="col-form-label">Nivel Prop.</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="nivel_propuesto"
                            name="nivel_propuesto">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="rvr" class="col-form-label">Ruta Prop.</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="ruta_propuesta"
                            name="ruta_propuesta">
                    </div>
                </div>

                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="rvr" class="col-form-label">Otros Datos.</label>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control campo-edit-fpl" id="otros_datos"
                            name="otros_datos">
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Card 2 (Column 7) -->
    <div class="col-lg-9 px-1">
        <div class="card" style="border-top: 5px solid #00758f;">
            <div class="card-body">
                <div class="ul-list-group-1 mb-md">
                    <textarea rows="20" class="zoom" name="descripcion" id="descripcion"
                        style="font-size: 15px; background-image: url('{{ asset('assets/images/avion.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></textarea>
                    <br>
                    <button class="boton" onclick="cambiarTamanoLetra(1)">+</button>
                    <button class="boton" onclick="cambiarTamanoLetra(-1)">-</button>
                    <button class="boton" name="descripcion_print" id="descripcion_print"
                        onclick="imprimirDescripcion()">🖨️ Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" style="border-top: 5px solid #6c5979;">
    <div class="card-body">
        <form id="vuelo_form">
            <div class="table-responsive-lg2">

                <div id="loadingIndicatorForm" style="display: none; text-align: center;">
                    <i class="fa-solid fa-spinner fa-spin"></i> Cargando...
                </div>

                <div class="row">
                    <div class="col-md-3 mb-md">
                        <div class="control-group ">
                            @if ($userTip->pk_id_tipo_ficha != 22)
                                <select class="form-control" name="id_rutas" id="id_rutas">
                                    <option value="">Seleccionar</option>
                                </select>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-9 mb-md">
                        <div class="control-group ">
                            @if ($userTip->pk_id_tipo_ficha != 22)
                                <div class="btn-group btn-group-sm d-flex flex-wrap" role="group">
                                    <button type="button" id="rutaButton"
                                        class="btn btn-raised btn-raised-info btn-sm" style="width: 15%;"
                                        data-toggle="modal" data-target="#addNewCardModalRuta">
                                        + Ruta
                                    </button>

                                    <button type="button" id="btnTest"
                                        class="btn btn-raised btn-raised-primary btn-sm" style="width: 15%;">
                                        Test
                                    </button>

                                    <button type="button" id="btnAutorizado"
                                        class="btn btn-raised btn-raised-success btn-sm" style="width: 15%;">
                                        Autori.
                                    </button>

                                    <button type="button" id="btnPrint"
                                        class="btn btn-raised btn-raised-dark btn-sm" style="width: 15%;">
                                        Print
                                    </button>

                                    <button type="button" id="btnRepetido"
                                        class="btn btn-raised btn-raised-warning btn-sm" style="width: 15%;">
                                        Repet.
                                    </button>

                                    <button type="button" id="btnCancelado"
                                        class="btn btn-raised btn-raised-danger btn-sm" style="width: 15%;">
                                        Cancel.
                                    </button>

                                    <button type="button" id="btnReset"
                                        class="btn btn-raised btn-raised-light btn-sm" style="width: 10%;">
                                        <i class="fas fa-redo-alt"></i> <!-- Ícono de reinicio -->
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row"
                    style="background-color: #d9eaf7; border: 1px solid #000; padding: 1px; border-radius: 1px;">

                    @if ($userTip->pk_id_tipo_ficha != 22)
                        <div class="col mb-md">
                            <div class="control-group">
                                <div class="controls">
                                    <label for="atd" style="font-size: 12px"><b>ATD:</b></label>
                                    <input type="number" class="form-control" name="atd" id="atd"
                                        autocomplete="off" placeholder="ATD" style="font-size: 15px" />
                                </div>
                            </div>
                        </div>
                        <div class="col mb-md">
                            <div class="control-group ">
                                <div class="controls">
                                    <label for="est" style="font-size: 12px"><b>EST:</b></label>
                                    <input type="number" class="form-control" name="est" id="est"
                                        autocomplete="off" placeholder="EST" style="font-size: 15px" />
                                </div>
                            </div>
                        </div>
                        <div class="col mb-md">
                            <div class="control-group">
                                <div class="controls">
                                    <label for="nivel" style="font-size: 12px"><b>NIVEL:</b></label>
                                    <input type="number" class="form-control" name="nivel" id="nivel"
                                        autocomplete="off" placeholder="NIVEL" style="font-size: 15px" />
                                </div>
                            </div>
                        </div>
                        <div class="col mb-md">
                            <div class="control-group ">
                                <div class="controls">
                                    <label for="sq" style="font-size: 12px"><b>SQ:</b></label>
                                    <input type="number" class="form-control" name="sq" id="sq"
                                        autocomplete="off" placeholder="SQ" style="font-size: 15px" />
                                </div>
                            </div>
                        </div>
                        <div class="col mb-md">
                            <div class="control-group ">
                                <div class="controls">
                                    <label for="ha" style="font-size: 12px"><b>Autorizado:</b></label>
                                    <input type="number" class="form-control" name="ha" id="ha"
                                        autocomplete="off" placeholder="Autorizado" style="font-size: 15px" />
                                </div>
                            </div>
                        </div>
                        <div class="col mb-md" id="select-container">
                            <div class="control-group ">
                                <div class="controls">
                                    <label for="ha" style="font-size: 12px"><b>Tipo Ficha:</b></label>
                                    <select name="sub_tipo_ficha" id="sub_tipo_ficha" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach ($subTipoFicha as $subTipo)
                                            <option value="{{ $subTipo->pk_id_parametrica_descripcion }}">
                                                {{ $subTipo->descripcion }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>



                        {{-- <div class="col-md-2 mb-md">
                        <div class="control-group ">
                            <div class="controls">
                                <label for="ha" style="font-size: 12px"><b>Tipo de Ficha:</b></label>
                                <select class="form-control" name="tipo_ficha" id="tipo_ficha">
                                    <option>Seleccionar</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    @else
                        <!-- Aquí puedes mostrar algo diferente si el valor es 22 -->
                        <div class="row mb-md">
                            <div class="col mb-md">
                                <div class="btn-group" role="group" aria-label="Opciones">
                                    <button type="button" id="btnTest_tower"
                                        class="btn btn-raised btn-raised-primary btn-sm">
                                        Test
                                    </button>
                                    <button type="button" id="btnAutorizado_tower"
                                        class="btn btn-raised btn-raised-success btn-sm">
                                        Autorizado
                                    </button>
                                    <button type="button" id="btnCancelado_tower"
                                        class="btn btn-raised btn-raised-danger btn-sm">
                                        Cancelado
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-md">

                            <div class="col mb-md">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="atd" style="font-size: 12px"><b>ATD:</b></label>
                                        <input type="number" class="form-control" name="atd_tower" id="atd_tower"
                                            autocomplete="off" placeholder="ATD" style="font-size: 15px" />
                                    </div>
                                </div>
                            </div>

                            <div class="col mb-md">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="atd" style="font-size: 12px"><b>SQ:</b></label>
                                        <input type="number" class="form-control" name="sq_tower" id="sq_tower"
                                            autocomplete="off" placeholder="SQ" style="font-size: 15px" />
                                    </div>
                                </div>
                            </div>

                            <div class="col mb-md">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="atd" style="font-size: 12px"><b>ETA:</b></label>
                                        <input type="number" class="form-control" name="eta_tower" id="eta_tower"
                                            autocomplete="off" placeholder="ETA" style="font-size: 15px" />
                                    </div>
                                </div>
                            </div>

                            {{-- @if ($llave_atc_group_002 == 1) --}}
                            <div class="col mb-md" id="inputContainerTra">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="atd" style="font-size: 12px"><b>TRA:</b></label>
                                        <input type="text" class="form-control" name="tra_tower" id="tra_tower"
                                            autocomplete="off" placeholder="TRA" style="font-size: 15px" />
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}

                            <div class="col mb-md">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="atd" style="font-size: 12px"><b>Nivel:</b></label>
                                        <input type="number" class="form-control" name="nivel_tower"
                                            id="nivel_tower" autocomplete="off" placeholder="Nivel"
                                            style="font-size: 15px" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 mb-md">
                                <div class="control-group">
                                    <div class="controls">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label for="atd" style="font-size: 12px"><b>EAT:</b></label>
                                                </td>
                                                <td>
                                                    <select name="eat_tower_0" id="eat_tower_0" class="form-control">
                                                        <option value="">Seleccione</option>
                                                        <option value="eat">EAT</option>
                                                        <option value="eto">ETO</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" class="form-control" name="eat_tower_1"
                                                        id="eat_tower_1" autocomplete="off" placeholder="EAT"
                                                        style="font-size: 12px" /></td>
                                                <td><input type="text" class="form-control" name="eat_tower_2"
                                                        id="eat_tower_2" autocomplete="off" placeholder="PUNTO"
                                                        style="font-size: 12px" /></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col mb-md">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="atd" style="font-size: 12px"><b>Autorizado:</b></label>
                                        <input type="number" class="form-control" name="ha_tower" id="ha_tower"
                                            autocomplete="off" placeholder="HA" style="font-size: 15px" />
                                    </div>
                                </div>
                            </div>

                            <div class="col mb-md" id="select-container" style="display: none;">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="ha" style="font-size: 12px"><b>Tipo Ficha:</b></label>
                                        <select name="sub_tipo_ficha" id="sub_tipo_ficha" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($subTipoFicha as $subTipo)
                                                <option value="{{ $subTipo->pk_id_parametrica_descripcion }}">
                                                    {{ $subTipo->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- @if ($llave_atc_group_002 == 1) --}}
                            <div class="col mb-md" id="selectContainerAtc002">
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="ha" style="font-size: 11px"><b>Ficha ATC002:</b></label>
                                        <select id="ficha_atc2" name="ficha_atc2" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach ($subTipoFichaATC2 as $ficha)
                                                <option value="{{ $ficha->pk_id_parametrica_descripcion }}">
                                                    {{ $ficha->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}

                        </div>
                    @endif
                </div>

                @if ($userTip->pk_id_tipo_ficha != 22)
                    <table class="table table-hover table-bordered table-striped" id="datatableFPL" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">OK</th>
                                <th scope="col">Punto</th>
                                <th scope="col">Distancia</th>
                                <th scope="col">Estimado</th>
                                <th scope="col">Velocidad</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Ruta</th>
                                <th scope="col">Chg Ruta</th>
                                <th scope="col">Datos Complem.</th>
                                <th scope="col">spl Punto</th>
                                <th scope="col">spl Est</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- More rows as needed -->
                        </tbody>
                    </table>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- Modal Crear Ruta --}}
@include('transito.modal_crear_ruta')
{{-- Modal Crear Ruta --}}
<script>
    $(document).ready(function() {

        $('#ha').on('focus click', function() {

            // Solo si NO está disabled y NO está readonly
            if (!$(this).prop('disabled') && !$(this).prop('readonly')) {

                if (!$(this).prop('')) {

                    var now = new Date();
                    var hours = now.getUTCHours().toString().padStart(2, '0');
                    var minutes = now.getUTCMinutes().toString().padStart(2, '0');
                    var timeHHMM = hours + minutes;

                    $(this).val(timeHHMM); // Asigna la hora en formato HHMM (UTC)

                    // Cambiar el Estado a Autoriza si HA > 0
                    const haValue = Number($('#ha').val());
                    console.log('Autorizado haValue', haValue);

                    if (haValue > 0) {
                        /* var id_estado_autorizado = 3; // Autorizado
                        var nombre_estado = "AUTORIZADO";
                        var color = "#D02090";

                        // Guardar Registro en la Base de Datos
                        const id_amhs = $('#id').val();

                        console.log('Autorizado id_amhs', id_amhs);
                        console.log('Nombre del Estado TEST:', nombre_estado);
                        console.log('Color del Estado TEST:', color);

                        const estadoCell = document.getElementById('estado' + id_amhs);
                        if (estadoCell) {
                            estadoCell.textContent = nombre_estado;
                            estadoCell.style.color = color;
                            estadoCell.style.fontWeight = "bold";
                        }

                        $('#id_estado').val(id_estado_autorizado);
                        $('#name_estado').val(nombre_estado);
                        $('#color_estado').val(color);

                        var table = document.getElementById("amhs-dataAutorizados");

                        if (table) {
                            const row = table.querySelector(`tr[data-id="${id_amhs}"]`);
                            if (!row) {
                                checkForNewRecordsAutorizados(id_amhs);
                            }
                        }

                        const procesoVueloData = {
                            id_amhs: id_amhs,
                            id_estado: id_estado_autorizado,
                            name_estado: nombre_estado,
                            color_estado: color,
                        };

                        sendProcesoVueloData(procesoVueloData);

                        // Proceso para fichas ATC-004 --> ATC-002
                        if (userTip.pk_id_tipo_ficha === 16) {
                            if (document.getElementById('destino').value === userTip.descripcion) {
                                autorizado_atc02();
                            }
                        } */
                        // Proceso para fichas ATC-004 --> ATC-002

                        // Evita el comportamiento por defecto (como enviar el formulario)
                        event.preventDefault();

                        const btnAutorizado = document.getElementById('btnAutorizado');

                        // Simula un clic en el botón Test
                        if (btnAutorizado) {
                            btnAutorizado.click();
                        }

                    }
                }

            }

        });

    });
</script>

{{-- TECLA ENTER TEST --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona el formulario específico
        const form = document.getElementById('vuelo_form');

        // Selecciona el botón Test
        const btnTest = document.getElementById('btnTest');

        // Escucha el evento 'keydown' en todos los campos de entrada dentro del formulario
        if (form) {
            form.addEventListener('keydown', function(event) {
                // Verifica si la tecla presionada es 'Enter' (código 13)
                if (event.key === 'Enter') {
                    // Evita el comportamiento por defecto (como enviar el formulario)
                    event.preventDefault();

                    // Simula un clic en el botón Test
                    if (btnTest) {
                        btnTest.click();
                    }
                }
            });
        }
    });
</script>

{{--  TECLA SHIFT DERECHO PASAR CAMPOS --}}
<script>
    document.addEventListener('keydown', function(event) {
        // Detecta Shift derecho sin combinaciones
        const isShiftRight = event.key === 'Shift' && event.location === KeyboardEvent.DOM_KEY_LOCATION_RIGHT;
        if (!isShiftRight || event.repeat || event.ctrlKey || event.altKey || event.metaKey) return;

        event.preventDefault();

        const actual = document.activeElement;

        // Caso 1: si el campo tiene la clase .campo-edit-fpl
        if (actual.classList.contains('campo-edit-fpl')) {
            const campos = Array.from(document.querySelectorAll('.campo-edit-fpl'));
            const index = campos.indexOf(actual);

            if (index > -1 && index < campos.length - 1) {
                campos[index + 1].focus();
                campos[index + 1].select();
            } else {
                campos[0].focus();
                campos[0].select();
            }

        } else {
            // Caso 2: cualquier otro campo del formulario con ID vuelo_form
            const form = document.getElementById('vuelo_form');
            if (!form) return;

            const inputs = Array.from(form.querySelectorAll('input, select, textarea, button'));
            const index = inputs.indexOf(actual);

            if (index > -1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            } else {
                inputs[0].focus();
            }
        }
    });
</script>

{{-- TECLA ALT DERECHO IMPRIMIR --}}
<script>
    const formulario = document.getElementById('vuelo_form');

    if (formulario) {
        formulario.addEventListener('keydown', function(event) {
            if (event.key === 'AltGraph') {
                event.preventDefault();

                const btnPrint = document.getElementById('btnPrint');
                if (btnPrint && !btnPrint.disabled) {
                    btnPrint.click();
                }
            }
        });
    }
</script>

{{-- ACTUALIZAR PLAN DE VUELO --}}
<script>
    function updateFlightPlan() {
        // Obtener los valores de los inputs
        const procesoVueloData = {
            id_amhs: document.getElementById('id').value,
            /*  fecha: document.getElementById('fecha').value || null, */
            /*  hora: document.getElementById('hora').value || null, */
            vuelo: document.getElementById('vuelo').value || null,
            tipo: document.getElementById('tipo').value || null,
            origen: document.getElementById('origen').value || null,
            destino: document.getElementById('destino').value || null,
            eobt: document.getElementById('eobt').value || null,
            //puntos: document.getElementById('puntos').value || null,
            linea_aerea: document.getElementById('linea_aerea').value || null,
            velocidad: document.getElementById('velocidad').value || null,
            //dep: document.getElementById('dep').value || null,
            etd: document.getElementById('etd').value || null,
            reg: document.getElementById('reg').value || null,
            sel: document.getElementById('sel').value || null,
            mensaje: document.getElementById('descripcion').value || null,
            id_estado: document.getElementById('id_estado').value || null,
            name_estado: document.getElementById('name_estado').value || null,
            color_estado: document.getElementById('color_estado').value || null,
            regla_tipo: document.getElementById('regla_tipo').value || null,
            //tipo_fpl: document.getElementById('tipo_fpl').value || null,
            equipo: document.getElementById('equipo').value || null,
            eet: document.getElementById('eet').value || null,
            opr: document.getElementById('opr').value || null,
            turbulencia: document.getElementById('turbulencia').value || null,
            aeronaves: document.getElementById('aeronaves').value || null,
            aed_alternos: document.getElementById('aed_alternos').value || null,
            /* ralt: document.getElementById('ralt').value || null, */
            dof: document.getElementById('dof').value || null,
            nav: document.getElementById('nav').value || null,
            /* eet_alt: document.getElementById('eet2').value || null, */
            rmk: document.getElementById('rmk').value || null,
            /* rif: document.getElementById('rif').value || null, */
            sts: document.getElementById('sts').value || null,
            /* typ: document.getElementById('typ').value || null, */
            /* per: document.getElementById('per').value || null, */
            /* com: document.getElementById('com').value || null, */
            /* dat: document.getElementById('dat').value || null, */
            /* altn: document.getElementById('altn').value || null, */
            /* code: document.getElementById('code').value || null, */
            rvr: document.getElementById('rvr').value || null,
            dta: document.getElementById('dta').value || null,
            dest2: document.getElementById('dest2').value || null,
            nivel_propuesto: document.getElementById('nivel_propuesto').value || null,
            ruta_propuesta: document.getElementById('ruta_propuesta').value || null,
            // tipo_ficha: document.getElementById('tipo_ficha').value,
            otros_datos: document.getElementById('otros_datos').value,
            origen_save: 14,
        };

        console.log('procesoVueloData', procesoVueloData);

        // Validación: Asegurarse que id_estado sea mayor a 0
        if (procesoVueloData.id_amhs > 0) {
            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Información Actualizada",
                showConfirmButton: false,
                timer: 1000,
                width: "250px", // Reduce el tamaño del modal
                customClass: {
                    title: "small-title", // Clase para reducir el tamaño del texto
                    popup: "small-popup" // Clase para modificar el modal
                }
            });

        } else {
            console.log('El estado del vuelo no es válido. Asegúrese de que id_estado sea mayor a 0.');
        }
    }

    function cambiarTamanoLetra(cambio) {
        const textarea = document.getElementById('descripcion');
        let estiloActual = window.getComputedStyle(textarea, null).getPropertyValue('font-size');
        let tamanoActual = parseFloat(estiloActual);
        textarea.style.fontSize = (tamanoActual + cambio) + 'px';
    }
</script>

{{-- IMPRESION PLAN DE VUELO --}}
<script>
    function cambiarTamanoLetra(factor) {
        const textarea = document.getElementById('descripcion');
        const estiloActual = window.getComputedStyle(textarea, null).getPropertyValue('font-size');
        const tamañoActual = parseFloat(estiloActual);
        textarea.style.fontSize = (tamañoActual + factor) + 'px';
    }

    function imprimirDescripcion() {
        let contenido = document.getElementById('descripcion').value;

        // 🧹 Limpiar espacios innecesarios
        contenido = contenido
            .trim()
            .replace(/\s{2,}/g, ' ')
            .replace(/\n{3,}/g, '\n\n');

        if (!contenido) {
            alert('⚠️ No hay contenido para imprimir.');
            return;
        }

        // 🕓 Fecha y hora UTC
        const ahora = new Date();
        const fechaUTC = ahora.toISOString().slice(0, 19).replace('T', ' ') + ' UTC';

        // 🖨️ Ventana de impresión
        const ventanaImpresion = window.open('', '_blank');
        ventanaImpresion.document.write(`
        <html>
        <head>
            <title>PLAN DE VUELO - NAABOL</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 40px; }
                h2 { text-align: center; color: #00758f; margin-bottom: 5px; }
                .header {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-bottom: 10px;
                }
                .logo {
                    width: 150px;
                }
                .fecha {
                    text-align: right;
                    color: #555;
                    font-size: 13px;
                    flex-grow: 1;
                    margin-top: 15px;
                }
                hr { border: 0; border-top: 2px solid #00758f; margin: 15px 0; }
                pre {
                    white-space: pre-wrap;
                    word-wrap: break-word;
                    font-size: 15px;
                    line-height: 1.5;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <img src="${window.location.origin}/img/logo_naabol.png" alt="Logo NAABOL" class="logo">
                <div class="fecha">Generado: ${fechaUTC}</div>
            </div>
            <h2>PLAN DE VUELO</h2>
            <hr>
            <pre>${contenido}</pre>
        </body>
        </html>
    `);
        ventanaImpresion.document.close();
        ventanaImpresion.print();
    }
</script>
