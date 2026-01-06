<div class="modal fade" id="detallesAutorizacionModal" tabindex="-1" role="dialog"
    aria-labelledby="detallesAutorizacionTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border border-primary shadow">
            <div class="modal-header bg-white text-white">
                <h4 class="modal-title fw-bold text-uppercase">
                    AUTORIZACIÓN DE <span id="detalle_tipo_autorizacion"></span> N° <span
                        id="detalle_numero_autorizacion"></span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Fecha de Autorización:</div>
                    <div class="col-9" id="detalle_fecha_autorizacion"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Nombre o razón social del operador:</div>
                    <div class="col-9" id="detalle_razon_social"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Tipo de aeronave(s):</div>
                    <div class="col-3" id="detalle_tipo_aeronave"></div>
                    <div class="col-3 fw-bold">Nacionalidad:</div>
                    <div class="col-3" id="detalle_pais"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Matrícula(s):</div>
                    <div class="col-9" id="detalle_matricula"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Peso (PBMD):</div>
                    <div class="col-9" id="detalle_peso"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Piloto(s) al mando:</div>
                    <div class="col-9" id="detalle_piloto"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Fecha de:</div>
                    <div class="col-3" id="detalle_fecha_inicio"></div>
                    <div class="col-3 fw-bold">Fecha al:</div>
                    <div class="col-3" id="detalle_fecha_fin"></div>
                </div>
                @if ($tipo === 'ingreso')
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Aeropuerto de Entrada:</div>
                        <div class="col-3" id="detalle_aeropuerto_entrada"></div>
                        <div class="col-3 fw-bold">Alterno:</div>
                        <div class="col-3" id="detalle_aeropuerto_entrada_alterno"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Aeropuerto de Salida:</div>
                        <div class="col-3" id="detalle_aeropuerto_salida"></div>
                        <div class="col-3 fw-bold">Alterno:</div>
                        <div class="col-3" id="detalle_aeropuerto_salida_alterno"></div>
                    </div>
                @else
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Ultimo Aeropuerto:</div>
                        <div class="col-9" id="detalle_ultimo_aeropuerto"></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-3 fw-bold">Aeropuerto de Destino:</div>
                        <div class="col-3" id="detalle_aeropuerto_destino"></div>
                        <div class="col-3 fw-bold">Alterno:</div>
                        <div class="col-3" id="detalle_aeropuerto_destino_alterno"></div>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Objeto del Vuelo:</div>
                    <div class="col-9" id="detalle_objeto_vuelo"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Ruta:</div>
                    <div class="col-9" id="detalle_ruta"></div>
                </div>
                <div class="row mb-2">
                    <div class="col-3 fw-bold">Observaciones:</div>
                    <div class="col-9" id="detalle_observaciones"></div>
                </div>
            </div>
        </div>
    </div>
</div>
