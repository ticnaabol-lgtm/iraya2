<div class="card" style="border-top: 5px solid #52c8a8;">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-md">
                <button id="printButton" class="btn btn-raised btn-raised-primary btn-sm">
                    <span class="fa fa-print"></span> Impresión
                </button>
            </div>
            <div class="col-md-2 mb-md">
                <button id="printButtonTermic" class="btn btn-raised btn-raised-warning btn-sm">
                    <span class="fa fa-print"></span> Termica
                </button>
            </div>
        </div>
        <div id="ficha_progreso_container">
            {{-- <p>Tipo de ficha: {{ $userTip->pk_id_tipo_ficha }}</p>
            <p>OACI: {{ $userTip->descripcion }}</p> --}}
        </div>

        <!-- Content for "Impresiones de Boletas" -->
    </div>
</div>

{{-- Llena Dinamicamente datos en la Tabla Autorizacion de FPL a partir de la Seleccion --}}
<script>
    // FUNCIONES PARA IMPRESION FICHA DE PROCESO DE VUELO
    function ficha_tabla(puntoIdPunto, vuelo, tipo, velocidad, etd, dep, ruta, destino, sel, reg, sq, ha,
        atd, nivel, puntoValue, estValue, primeraFicha, ultimaFicha, chgRuta, datComplem, splPunto, splEst, equipo,
        primerPunto, indexPunto) {

        const userTip = @json($userTip);
        // Obtener el valor del campo hidden
        var dta = document.getElementById('dta').value;
        var sts = document.getElementById('sts').value.toUpperCase();

        console.log('IMP userTip', userTip);
        console.log('IMP CR', chgRuta);
        console.log('IMP DC', datComplem);
        console.log('IMP SP', splPunto);
        console.log('IMP SE', splEst);
        console.log('IMP DEP', dep);
        console.log('IMP index', indexPunto);
        console.log('IMP PRIMER PUNTO', primerPunto);

        // Validar y reemplazar valores nulos con una cadena vacía
        ruta = (ruta && ruta !== 'null' && ruta !== 'undefined') ? ruta.toUpperCase() : '';
        chgRuta = (chgRuta || '').toUpperCase();
        datComplem = (datComplem || '').toUpperCase();

        console.log('IMP1 splPunto1', splPunto);
        splPunto = (splPunto || '').toUpperCase();
        console.log('IMP1 splPunto2', splPunto);

        splEst = (splEst || '').toUpperCase();
        sel = (sel || '').toUpperCase();
        reg = (reg || '').toUpperCase();

        puntoValue = (puntoValue && puntoValue !== 'null' && puntoValue !== 'undefined') ?
            puntoValue.toUpperCase() :
            '';

        dta = (dta || '').toUpperCase();
        sts = (sts || '').toUpperCase();

        nivel = (nivel || '');

        console.log('IMP splPunto', splPunto);
        // nivel = (nivel === 'null' || nivel === null || nivel === '000') ? '' : nivel.toUpperCase();
        estValue = (estValue === 'null' || estValue === null) ? '' : estValue.toUpperCase();
        // ruta = (ruta === 'null' || ruta === null) ? '' : ruta.toUpperCase();
        console.log('IMP puntoValue', puntoValue);
        // puntoValue = (puntoValue === 'null' || puntoValue === null) ? '' : puntoValue.toUpperCase();

        console.log('IMP puntoValue', puntoValue);
        console.log('IMP estValue', estValue);
        console.log('IMP ORIGEN', dep);
        console.log('IMP DESTINO', destino);
        console.log('USER COD OACI', userTip.descripcion);

        // Extraer los dos primeros caracteres de dep y dest
        var tipo_ficha = '';
        var tipo_ficha_atc = 'NO ASIGNADO';
        let depDosPrimeros = dep.substring(0, 2);
        let destDosPrimeros = destino.substring(0, 2);

        // Verificar si ambos no son iguales a "SL"
        if (depDosPrimeros !== "SL" && destDosPrimeros !== "SL") {
            tipo_ficha = "ACC-003"; // Imprimir "ACC-003" si ambos no son "SL"
        } else {
            if (nivel) {
                // Extraer el dígito del medio (índice 1, ya que es el segundo dígito)
                var digitoDelMedio = parseInt(nivel.charAt(1));

                // Verificar si el dígito es impar o par y mostrar el resultado correspondiente
                if (digitoDelMedio % 2 !== 0) {
                    tipo_ficha = "ACC-001"; // El dígito es impar
                } else {
                    tipo_ficha = "ACC-002"; // El dígito es par
                }
            }
        }

        if (dep === userTip.descripcion) {
            tipo_ficha_atc = "ATC-003";
        }

        if (destino === userTip.descripcion) {
            tipo_ficha_atc = "ATC-004";
        }

        if (dep !== userTip.descripcion && destino !== userTip.descripcion) {
            tipo_ficha_atc = "ATC-005";
        }

        if (userTip.pk_id_tipo_ficha === 17) {
            var baseTableHtml = `
                            <div id="div_${puntoIdPunto}" class="ficha">
                                <table id="ficha_progreso" border="0" style="line-height: 1;">
                                    <tr>
                                        <td rowspan="4" width="12%" class="custom-cell custom-cell-right">
                                             <span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;${vuelo}</span><br><span style="font-size: 15px;">&nbsp;&nbsp;${tipo}/${equipo}</span>
                                             <br><span style="font-size: 15px;">&nbsp;&nbsp;${velocidad}</span>
                                        </td>
                                        <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom" style="height: 1.3cm; font-size: 15px;">
                                            ${indexPunto === primerPunto ? '<span style="font-size: 20px; font-weight: bold;">D</span><br>' + etd : splPunto}
                                        </td>
                                        <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom" style="font-size: 15px;">
                                            ${indexPunto === primerPunto ? splPunto : ''}
                                        </td>
                                        <td rowspan="2" width="10%" class="custom-cell"
                                            style="
                                                background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                vertical-align: top;">
                                        </td>
                                        <td width="9%" class="custom-cell custom-cell-right" style="font-size: 15px; padding-top: 8px;">${puntoValue}</td>
                                        <td rowspan="4" width="12%" class="custom-cell custom-cell-right" style="font-size: 16px; text-align: center; vertical-align: top; padding-top: 5px;">
                                            </br>${nivel}
                                        </td>
                                        <td width="8%" class="custom-cell" style="font-size: 15px; padding-top: 8px;">${dep}</td>
                                        <td width="8%" class="custom-cell" style="font-size: 15px; padding-top: 8px;">${ruta}</td>
                                        <td width="10%" class="custom-cell" style="font-size: 15px; padding-top: 8px;">${destino}</td>
                                        <td width="8%" class="custom-cell custom-cell-bottom custom-cell-right custom-cell-left">&nbsp;</td>
                                        <td width="10%" class="custom-cell">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3" class="custom-cell custom-cell-top custom-cell-left custom-cell-right"
                                                style="
                                                background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                vertical-align: top;">
                                        </td>
                                        <td colspan="3" rowspan="2" class="custom-cell custom-cell-top" align="center" valign="middle" style="font-size: 13px;">
                                            ${chgRuta}<br />${datComplem}
                                        </td>
                                        <td colspan="2" rowspan="3" class="custom-cell custom-cell-left" style="padding-bottom: 3px; font-size: 15px;" >
                                        ${indexPunto !== primerPunto ? '' : `<img src="{{ asset('img/da_logo.png') }}" alt="Diagonal Line" style="height:20px;"/>:
                                        <span class="small-text" style=" font-size: 14px;">${ha}</span><br/><span style=" font-size: 14px;">${dta ? `DTA:${dta}<br/>` : ''}</span>`}
                                        ${ultimaFicha === 1 ? `TNR` : ''}${(indexPunto !== primerPunto && ultimaFicha !== 1) ? '<br/>' : ''}</br>
                                        <span class="small-text" style=" font-size: 12px;">${tipo_ficha}</span>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="custom-cell custom-cell-right"
                                            style="height: 1.20cm;
                                            background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                            background-size: 100% 100%;
                                            text-align: left;
                                            padding: 0px;
                                            vertical-align: top; ">
                                                ${indexPunto === primerPunto ? atd : splEst}
                                        </td>
                                        <td rowspan="2" class="custom-cell custom-cell-right"
                                            style="height: 1.20cm;
                                            background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                            background-size: 100% 100%;
                                            text-align: left;
                                            padding: 0px;
                                            vertical-align: top; ">
                                             ${indexPunto === primerPunto ? splEst : ''}
                                        </td>
                                        <td rowspan='2' class='custom-cell' style='font-size: 16px; vertical-align: bottom; text-align: right; padding-bottom: 10px;'>${estValue}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="custom-cell" style="padding-bottom: 3px; font-size: 15px;">
                                            ${indexPunto === primerPunto ? `SEL/ ${sel}<br />REG/ ${reg}` : ''}
                                        </td>
                                        <td class="custom-cell" style="padding-bottom: 3px; font-size: 13px;">SQ/${sq}</td>
                                    </tr>
                                </table>
                            </div>
                            `;
        }

        if (userTip.pk_id_tipo_ficha === 16) {

            if (dep === destino) {
                // Recuperar el texto del option seleccionado
                var tipo_ficha_atc_val = parseInt($('#sub_tipo_ficha').val(), 10);
                console.log('tipo_ficha_atc_val', tipo_ficha_atc_val);

                if (tipo_ficha_atc_val === 33) {
                    tipo_ficha_atc = "ATC-003";
                }
                if (tipo_ficha_atc_val === 35) {
                    tipo_ficha_atc = "ATC-004";
                }
                if (tipo_ficha_atc_val === 36) {
                    tipo_ficha_atc = "ATC-005";
                }
            }

            var rutaPropuesta = document.getElementById('ruta_propuesta').value;

            /* if (rutaPropuesta) {
                            // Si 'ruta_propuesta_atc' tiene un valor
                            var rutaPropuestaFinal = rutaPropuesta;
                        } else {
                            // Si 'ruta_propuesta_atc' no tiene valor, usar el de 'nivel_propuesto'
                            rutaPropuestaFinal = document.getElementById('ruta_propuesta').value;
                        } */

            var baseTableHtml = `
                            <div id="div_${puntoIdPunto}" class="ficha">
                                <table id="ficha_progreso" style="font-size: 13px;" border="0">
                                    <tr>
                                        <td rowspan="4" width="14%" class="custom-cell custom-cell-right">
                                             <span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;${vuelo}</span><br><span style="font-size: 15px;">&nbsp;&nbsp;${tipo}/${equipo}</span>
                                             <br><span style="font-size: 15px;">&nbsp;&nbsp;${velocidad}</span>
                                        </td>
                                        <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom" style="height: 1.25cm;">
                                            ${splPunto}
                                        </td>
                                        <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom">
                                            &nbsp;
                                        </td>
                                        <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom">
                                            &nbsp;
                                        </td>
                                        <td rowspan="2" width="7%" class="custom-cell"
                                        style="
                                                background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                padding-top: 7px;
                                                vertical-align: top;"
                                        >
                                           ${indexPunto === primerPunto && tipo_ficha_atc === "ATC-003" ? etd : ''}
                                        </td>
                                        <td width="9%" class="custom-cell custom-cell-right" style="font-size: 14px; padding-top: 8px;">
                                            ${indexPunto === primerPunto && tipo_ficha_atc === "ATC-003" ? 'D' : puntoValue}
                                        </td>
                                        <td rowspan="4" width="12%" class="custom-cell custom-cell-right"
                                        style="font-size: 14px; text-align: left; vertical-align: top; padding-top: 10px;">
                                            ${nivel}
                                        </td>
                                        <td width="9%" class="custom-cell" style="font-size: 14px; padding-top: 8px;">${dep}</td>
                                        <td width="9%" class="custom-cell" style="font-size: 14px; padding-top: 8px;">${ruta}</td>
                                        <td width="9%" class="custom-cell" style="font-size: 14px; padding-top: 8px;">${destino}</td>
                                        <td width="9%" class="custom-cell custom-cell-bottom custom-cell-right custom-cell-left">
                                            &nbsp;
                                        </td>
                                        <td class="custom-cell">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3" class="custom-cell custom-cell-top custom-cell-left custom-cell-right"
                                        style="
                                                background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                vertical-align: top;
                                                position: relative; padding: 5px;"
                                        >
                                            ${tipo_ficha_atc === "ATC-003" && indexPunto === primerPunto ? `
                                                <span style="position: absolute; top: 5px; left: 5px;">${ha}</span>
                                                <span style="position: absolute; bottom: 5px; right: 5px;">${ha}</span>
                                            ` : ''}
                                        </td>
                                        <td colspan="3" rowspan="2" class="custom-cell custom-cell-top" valign="middle" style="font-size: 12px;">
                                            <div style="text-align: center;">
                                                ${chgRuta ? `${chgRuta}<br/>` : ''}
                                                ${datComplem ? datComplem : ''}
                                            </div>
                                            <span style="text-align: left;">${sts}</span>
                                        </td>
                                        <td colspan="2" rowspan="2" class="custom-cell custom-cell-left" >
                                            ${indexPunto === primerPunto && tipo_ficha_atc !== "ATC-003" ? `<img src="{{ asset('img/da_logo.png') }}" alt="Diagonal Line" style="height:20px;"/>:
                                            <span class="small-text" style=" font-size: 14px;">${ha}</span>` : ''}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="custom-cell custom-cell-right"
                                        style="
                                                height: 1.25cm;
                                                background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                vertical-align: top;"
                                        >
                                            ${splEst}
                                        </td>
                                        <td rowspan="2" class="custom-cell custom-cell-right"
                                        style="
                                                background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                vertical-align: top;"
                                        >
                                            &nbsp;
                                        </td>
                                        <td rowspan="2" class="custom-cell custom-cell-right"
                                        style="
                                                background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                vertical-align: top;"
                                        >
                                            &nbsp;
                                        </td>
                                        <td rowspan="2" class="custom-cell" style="font-size: 14px;">${estValue}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="custom-cell">
                                            ${indexPunto === primerPunto ? `SEL/ ${sel}<br />REG/ ${reg}` : '&nbsp;<br />&nbsp;'}
                                        </td>
                                        <td class="custom-cell">SQ/ ${sq}</td>
                                        <td colspan="2" class="custom-cell custom-cell-left" style="font-weight: bold;">${tipo_ficha_atc}</td>
                                    </tr>
                                </table>
                            </div>
                            `;
        }

        if (userTip.pk_id_tipo_ficha === 65) {

            var eet = document.getElementById('eet').value;
            var dest2 = document.getElementById('dest2').value.toUpperCase();
            var est = document.getElementById('est').value;
            var ruta_propuesta = document.getElementById('ruta_propuesta').value;
            var nivel_propuesto = document.getElementById('nivel_propuesto').value.toUpperCase();

            var baseTableHtml = `
                <div id="div_${puntoIdPunto}" class="ficha">
                    <table id="ficha_progreso" style="font-size: 14px; line-height: 1;" border="0">
                        <tr>
                            <td rowspan="4" width="14%" class="custom-cell custom-cell-right">
                                 <span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;${vuelo}</span><br><span style="font-size: 15px;">&nbsp;&nbsp;${tipo}/${equipo}</span>
                                 <br><span style="font-size: 15px;">&nbsp;&nbsp;${velocidad}</span>
                            </td>
                            <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom" style="height: 1.25cm;">
                                ${primeraFicha === 0 ? `D <br> ${etd}` : ''}
                            </td>
                            <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom"
                            style="
                                    background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    padding: 0;
                                    vertical-align: top;"
                            >
                                &nbsp;
                            </td>
                            <td rowspan="2" width="6.3%" class="custom-cell custom-cell-right custom-cell-bottom"
                            style="
                                    background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    padding: 0;
                                    vertical-align: top;"
                            >
                                &nbsp;
                            </td>
                            <td rowspan="2" width="7%" class="custom-cell"
                            style="
                                    background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    padding: 0;
                                    vertical-align: top;"
                            >
                               &nbsp;
                            </td>
                            <td width="9%" class="custom-cell custom-cell-right" style="font-size: 14px;">
                                ${destino !== "ZZZZ" ? destino : (
                                    dest2.length > 15
                                    ? `<span style="font-size: 10px;">${dest2.length > 20 ? dest2.substring(0, 20) + "" : dest2}</span>`
                                    : dest2
                                )}
                            </td>
                            <td rowspan="4" width="12%" class="custom-cell custom-cell-right" style="font-size: 14px; text-align: left; vertical-align: top;">
                                ${nivel_propuesto}
                            </td>
                            <td width="9%" class="custom-cell" style="font-size: 14px; text-align: left;">${dep}</td>
                            <td width="9%" class="custom-cell" style="font-size: 14px; text-align: center;">
                                ${ruta_propuesta.length > 15 ? ruta_propuesta.substring(0, 15) + "" : ruta_propuesta}
                            </td>
                            <td width="9%" class="custom-cell" style="font-size: 14px; text-align: right;">${destino}</td>
                            <td width="9%" class="custom-cell custom-cell-bottom custom-cell-right custom-cell-left">
                                &nbsp;
                            </td>
                            <td class="custom-cell">&nbsp;</td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="custom-cell custom-cell-top custom-cell-left custom-cell-right"
                            style="
                                    background: url('{{ asset('img/raya.png') }}') no-repeat top left;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    padding: 0;
                                    vertical-align: top;
                                    position: relative; padding: 5px;"
                            >
                                &nbsp;
                            </td>
                            <td colspan="3" rowspan="2" class="custom-cell custom-cell-top" valign="middle" style="font-size: 12px;">
                                <div style="text-align: center;">
                                    ${chgRuta ? `${chgRuta}<br/>` : ''}
                                    ${datComplem ? datComplem : ''}
                                </div>
                            </td>
                            <td colspan="2" rowspan="2" class="custom-cell custom-cell-left" >
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="custom-cell custom-cell-right" style="height: 1.25cm;">
                                ${atd}
                            </td>
                            <td rowspan="2" class="custom-cell custom-cell-right">
                                &nbsp;
                            </td>
                            <td rowspan="2" class="custom-cell custom-cell-right">
                                &nbsp;
                            </td>
                            <td rowspan="2" class="custom-cell" style="font-size: 14px; text-align: left; vertical-align: bottom;">${est}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="custom-cell">
                                STS:${sts}<br />EET: ${eet}
                            </td>
                            <td class="custom-cell">SQ/ ${sq}</td>
                            <td colspan="2" class="custom-cell custom-cell-left" style="font-weight: bold;">ATC-005</td>
                        </tr>
                    </table>
                </div>
                `;
        }

        // Asignación de HTML a la variable tableHtml
        var tableHtml = baseTableHtml;
        // Crear la estructura de la tabla dinámicamente
        return tableHtml;
    }

    function ficha_tabla_tower(vuelo, tipo, dep, reg, etd, equipo, destino, nivel_propuesto, ruta_propuesta, last_est,
        rpl, sq_tower, nivel_tower, eat_tower, atd_tower, ha_tower, rmk) {

        var baseTableHtml = `<div>NO ASIGNADO</div>`;
        console.log('last_est', last_est);

        console.log('IMP dep', dep);
        console.log('IMP destino', destino);
        console.log('IMP userTip.descripcion', userTip.descripcion);
        console.log('IMP EAT TOWER 1', eat_tower[0]);
        console.log('IMP EAT TOWER 2', eat_tower[1]);
        console.log('IMP EAT TOWER 0', eat_tower[2]);

        var sts = document.getElementById('sts').value.toUpperCase();
        var otros_datos = document.getElementById('otros_datos').value.toUpperCase();
        var tipo_ficha_atc = "";
        var tipoFicha = 0;
        var dest2 = document.getElementById('dest2').value.toUpperCase();

        if (reg && rmk) {
            rpl_text = (reg + ' ' + rmk).toUpperCase();
        } else if (reg) {
            rpl_text = reg.toUpperCase();
        } else if (rmk) {
            rpl_text = rmk.toUpperCase();
        }

        if (dep === userTip.descripcion) {
            tipo_ficha_atc = "ATC-001";
            tipoFicha = 1;
        }

        if (destino === userTip.descripcion) {
            tipo_ficha_atc = "ATC-002";
            tipoFicha = 2;

            // ATC LCL SLCB
            if (parseInt($('#ficha_atc2').val(), 10) === 52) {
                tipoFicha = 52;
            }
        }

        console.log('IMP TIPO FICHA', tipoFicha);

        if (dep === destino) {
            // Recuperar el texto del option seleccionado
            tipo_ficha_atc = $('#sub_tipo_ficha option:selected').text();
            var tipo_ficha_atc_val = parseInt($('#sub_tipo_ficha').val(), 10);
            if (tipo_ficha_atc_val === 30) {
                tipoFicha = 1;
            } else {
                tipoFicha = 2;
            }

            // ATC LCL SLCB
            if (tipo_ficha_atc_val === 52) {
                tipoFicha = 52;
            }
        }

        console.log('tipo_ficha_atc', tipo_ficha_atc);
        console.log('tipoFicha', tipoFicha);

        if (tipoFicha === 1) {

            let tipo_nivel = nivel_propuesto.charAt(0);

            let nivel_propuesto_f = null;
            // Verificar si la primera letra es "F"
            if (tipo_nivel === "F") {
                nivel_propuesto_f = nivel_propuesto.slice(1);
            }

            ha_tower = Number(ha_tower);
            console.log('ha_tower ', ha_tower);

            baseTableHtml = `
                            <div class="ficha">
                                <table id="ficha_progreso" style="font-size: 11px; line-height: 1;" border="0">
                                     <tr>
                                        <td colspan="2" width="18%" class="custom-cell custom-cell-right custom-cell-bottom" style="padding-top: 10px;">
                                            <span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;${vuelo}</span></td>
                                        <td width="8%">&nbsp;</td>
                                        <td width="13%" style="font-size: 14px; padding-top: 10px;">${rpl_text}</td>
                                        <td width="10%" style="font-size: 14px; padding-top: 10px;">
                                            ${sts ? `STS/${sts}` : ''}
                                        </td>
                                        <td width="10%">&nbsp;</td>
                                        <td width="2%">&nbsp;</td>
                                        <td colspan="2" width="18%" class="custom-cell custom-cell-left custom-cell-bottom" style="font-size: 14px; padding-top: 10px;">${etd}</td>
                                        <td colspan="2" width="18%" class="custom-cell custom-cell-left custom-cell-bottom" style="font-size: 14px; padding-top: 10px;">${atd_tower}</td>
                                    </tr>
                                    <tr>
                                        <td width="9%" class="custom-cell custom-cell-right custom-cell-bottom" style="padding-top: 10px;"><span style="font-size: 15px; font-weight: bold;">&nbsp;&nbsp;${tipo}</span></td>
                                        <td width="9%" class="custom-cell custom-cell-right custom-cell-bottom" style="padding-top: 10px;"><span style="font-size: 15px;">${equipo}</span></td>
                                        <td>&nbsp;</td>
                                        <td colspan="4" style="font-size: 14px; text-align: center; padding-right: 1px;">
                                            ${ruta_propuesta}
                                            ${
                                                tipo_nivel === "F"
                                                    ? `<img src="{{ asset('img/M_logo.png') }}" alt="Diagonal Line" style="font-size: 14px; height:13px; vertical-align: middle;" />${nivel_propuesto_f}`
                                                    : nivel_propuesto
                                            }
                                        </td>
                                        <td width="9%">${ha_tower === 0 ? '' : `<img src="{{ asset('img/ca_logo.png') }}" alt="Diagonal Line" style="height:20px;"/>:
                                        <span class="small-text" style=" font-size: 14px;">${ha_tower}</span>`}</td>
                                        <td width="9%">&nbsp;</td>
                                        <td width="9%" class="custom-cell custom-cell-left custom-cell-bottom">&nbsp;</td>
                                        <td width="9%" class="custom-cell custom-cell-left custom-cell-bottom">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="custom-cell custom-cell-right"
                                            style="font-size: 14px; height: 0.8cm; text-align: center; vertical-align: top;">
                                            &nbsp;&nbsp;
                                            ${destino !== "ZZZZ" ? destino : (
                                                dest2.length > 15
                                                    ? `<span style="font-size: 10px;">${dest2.length > 20 ? dest2.substring(0, 20) + "" : dest2}</span>`
                                                    : dest2
                                            )}
                                        </td>
                                        <td>&nbsp;</td>
                                        <td colspan="4" style="font-size: 14px; padding-bottom: 10px;" >${otros_datos}</td>
                                        <td style="font-size: 12px; text-align: left; vertical-align: bottom; padding-bottom: 10px;">
                                            SQ/${sq_tower}
                                        </td>
                                        <td style="font-size: 12px; font-weight: bold; text-align: left; vertical-align: bottom; padding-bottom: 10px;">
                                            ${tipo_ficha_atc}
                                        </td>
                                        <td class="custom-cell custom-cell-left custom-cell-bottom">&nbsp;</td>
                                        <td class="custom-cell custom-cell-left custom-cell-bottom">&nbsp;</td>
                                    </tr>
                                </table>
                            </div>
                            `;
        }

        if (tipoFicha === 2) {

            equipo = equipo.includes("G") ? "/G" : "";

            baseTableHtml = `
                            <div class="ficha">
                                <table id="ficha_progreso" style="font-size: 11px;" border="0">
                                     <tr>
                                        <td width="9%" rowspan="4"><span style="font-size: 18px; font-weight: bold; padding-top: 10px;">&nbsp;&nbsp;${vuelo}</span><br>
                                            <span style="font-size: 15px;">&nbsp;&nbsp;${tipo}${equipo}</span></td>
                                        <td width="13%" class="custom-cell custom-cell-right">&nbsp;</td>
                                        <td colspan="2" rowspan="4" width="14%" class="custom-cell custom-cell-right" style="font-size: 14px; padding-top: 10px;">${last_est}<BR />
                                        <BR />
                                        ${rpl_text}<br />${sts}</td>
                                        <td width="14%" colspan="2" rowspan="4" align="right" class="custom-cell custom-cell-right"
                                            style="position: relative; text-align: left; vertical-align: top; padding-top: 5px; font-size: 14px; padding-top: 10px;">${nivel_tower}<BR /><BR /></td>
                                        <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom">&nbsp;</td>
                                        <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom"
                                            style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                                background-size: 100% 100%;
                                                text-align: left;
                                                padding: 0;
                                                vertical-align: top;">&nbsp;

                                        </td>
                                        <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom">&nbsp;</td>
                                        <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom">&nbsp;</td>

                                        ${eat_tower[0] !== '' && eat_tower[1] !== '' ?
                                            `<td width="7%" rowspan="2" style="font-size: 14px; text-align: right; vertical-align: middle;">${eat_tower[2]}:</td>` :
                                            '<td width="13%" rowspan="2" style="text-align: center; vertical-align: top;"><img src="{{ asset('img/v_inverse.png') }}" alt="Diagonal Line" style="height:13px;"/></td>'
                                        }
                                        ${eat_tower[0] !== '' && eat_tower[1] !== '' ?
                                            `<td width="7%" class="custom-cell custom-cell-bottom" style="font-size: 14px; text-align: center;">${eat_tower[0]}</td>` :
                                            `<td width="1%" style="text-align: center;"></td>`
                                        }
                                    </tr>
                                    <tr>
                                        <td rowspan="3" class="custom-cell custom-cell-right"
                                            style="background: url('{{ asset('img/raya.png') }}') no-repeat bottom right;
                                                    background-size: 85% 85%;
                                                    text-align: left;
                                                    padding: 0;
                                                    vertical-align: top; font-size: 14px;">
                                            <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${dep}
                                        </td>
                                        ${eat_tower[0] !== '' && eat_tower[1] !== '' ?
                                            `<td style="text-align: center; font-size: 14px;">${eat_tower[1]}</td>`:
                                            `<td style="text-align: center;"></td>`
                                        }
                                    </tr>
                                    <tr>
                                        <td rowspan="2" class="custom-cell custom-cell-right">&nbsp;</td>
                                        <td width="9%" rowspan="2" class="custom-cell custom-cell-right"
                                            style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                                background-size: 100% 100%;
                                                text-align: left; psp vita
                                                padding: 0;
                                                vertical-align: top;">&nbsp;

                                        </td>
                                        <td rowspan="2" class="custom-cell custom-cell-right">&nbsp;</td>
                                        <td rowspan="2" class="custom-cell custom-cell-right">&nbsp;</td>
                                        <td colspan="2" rowspan="2" style="font-size: 12px;">SQ/${sq_tower}<br/><b>${tipo_ficha_atc}</b></td>
                                    </tr>

                                </table>
                            </div>
                            `;
        }

        if (tipoFicha === 52) {

            equipo = equipo.includes("G") ? "/G" : "";
            var tra = document.getElementById('tra_tower').value.toUpperCase();
            var eobt = document.getElementById('eobt').value.toUpperCase();
            var eet = document.getElementById('eet').value.toUpperCase();

            baseTableHtml = `
                <div class="ficha">
                    <table id="ficha_progreso" border="0" style="line-height: 1;">
                         <tr>
                            <td width="9%" rowspan="4"><span style="font-size: 18px; font-weight: bold;">&nbsp;&nbsp;${vuelo}</span><br>
                                <span style="font-size: 15px;">&nbsp;&nbsp;${tipo}${equipo}</span></td>
                            <td width="13%" class="custom-cell custom-cell-right">&nbsp;</td>
                            <td colspan="2" rowspan="4" width="14%" class="custom-cell custom-cell-right"
                                style="font-size: 14px; text-align: center; vertical-align: top; padding-top: 5px;">
                                ${tra ? `${tra} <br />
                                <img src="{{ asset('img/linea_trazos.png') }}" alt="Diagonal Line" style="height: 0.3cm; margin-top: 5px;"/>` : ''}
                            </td>
                            <td width="14%" colspan="2" rowspan="4" align="right" class="custom-cell custom-cell-right"
                                style="position: relative; text-align: left; vertical-align: top; padding-top: 5px; font-size: 14px;">${nivel_tower}<BR /><BR /></td>
                            <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom"
                                style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    font-size: 14px;
                                    padding: 0;
                                    padding-top: 3px;
                                    vertical-align: top;">${atd_tower}
                            </td>
                            <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom"
                                style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    padding: 0;
                                    vertical-align: top;">&nbsp;
                            </td>
                            <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom"
                                style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    padding: 0;
                                    vertical-align: top;">&nbsp;
                            </td>
                            <td width="9%" rowspan="2" class="custom-cell custom-cell-right custom-cell-bottom"
                                style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                    background-size: 100% 100%;
                                    text-align: left;
                                    padding: 0;
                                    vertical-align: top;">&nbsp;
                            </td>

                            <td rowspan="2" style="font-size: 12px; text-align: left; vertical-align: top;">
                                EOBT:${eobt}
                                <br>EET:${eet}
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3" class="custom-cell custom-cell-right"
                                style="background: url('{{ asset('img/raya.png') }}') no-repeat bottom right;
                                        background-size: 85% 85%;
                                        text-align: left;
                                        padding: 0;
                                        vertical-align: top; font-size: 14px;">
                                <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LCL
                            </td>
                        </tr>
                        <tr>
                            <td width="9%" rowspan="2" class="custom-cell custom-cell-right"
                                style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                    background-size: 100% 100%;
                                    text-align: left; psp vita
                                    padding: 0;
                                    vertical-align: top;">&nbsp;

                            </td>
                            <td width="9%" rowspan="2" class="custom-cell custom-cell-right"
                                style="height: 1.25cm; background: url('{{ asset('img/raya.png') }}') no-repeat center center;
                                    background-size: 100% 100%;
                                    text-align: left; psp vita
                                    padding: 0;
                                    vertical-align: top;">&nbsp;

                            </td>
                            <td rowspan="2" class="custom-cell custom-cell-right">&nbsp;</td>
                            <td rowspan="2" class="custom-cell custom-cell-right">&nbsp;</td>
                            <td rowspan="2" style="font-size: 12px; text-align: right; vertical-align: bottom;">
                                SQ/${sq_tower}
                                <br/><b>${tipo_ficha_atc}</b>
                            </td>
                        </tr>
                    </table>
                </div>
                `;
        }

        // Asignación de HTML a la variable tableHtml
        var tableHtml = baseTableHtml;
        // Crear la estructura de la tabla dinámicamente
        return tableHtml;
    }

    //Windows Print
    function printContent(content) {
        var printWindow = window.open('', '_blank', 'height=600,width=800');

        printWindow.document.write('<html><head><title>Imprimir</title>');
        printWindow.document.write('<style>');
        printWindow.document.write(
            'body, #ficha_progreso { font-family: sans-serif; }'
        );
        printWindow.document.write(
            '#ficha_progreso { width: 20cm; border-collapse: collapse; border-top: 1px dashed red; border-bottom: 1px dashed red; margin: 0; padding: 0; }'
        );

        printWindow.document.write(
            '#ficha_progreso .custom-cell { vertical-align: middle; height: calc(2.5cm / 4); position: relative; }'
        );

        const userTip = @json($userTip);
        if (userTip.pk_id_tipo_ficha === 16) {
            printWindow.document.write(
                /* '#ficha_progreso .custom-cell img { height: 180%; object-fit: cover; }' */
                /* '#ficha_progreso .custom-cell img { width: 100%; height: 100%; object-fit: cover; }' */
                '#ficha_progreso .custom-cell img { height: 100%; object-fit: cover; }'
            );
        } else {
            printWindow.document.write(
                '#ficha_progreso .custom-cell img { height: 180%; object-fit: cover; }'
                /* '#ficha_progreso .custom-cell img { width: 100%; height: 180%; object-fit: cover; }' */
            );
        };

        printWindow.document.write('#ficha_progreso .custom-cell-top { border-top: 2px solid black; }');
        printWindow.document.write('#ficha_progreso .custom-cell-right { border-right: 2px solid black; }');
        printWindow.document.write('#ficha_progreso .custom-cell-bottom { border-bottom: 2px solid black; }');
        printWindow.document.write('#ficha_progreso .custom-cell-left { border-left: 2px solid black; }');
        printWindow.document.write(
            '#ficha_progreso .bordered { border: 2px solid #000; display: inline-block; padding: 2px 5px; margin: 2px; }'
        );
        printWindow.document.write(
            '@media print { #ficha_progreso { width: 20cm; height: 2.5cm; } #ficha_progreso .custom-cell { height: calc(2.5cm / 4); } }'
        );
        printWindow.document.write('@page { size: letter; margin: 0; }');
        printWindow.document.write('</style>');

        printWindow.document.write('<style>');
        printWindow.document.write('</style>');

        printWindow.document.write('</head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        // printWindow.print();

        printWindow.onload = function() {
            printWindow.print();

            // Usar setTimeout como respaldo
            setTimeout(function() {
                printWindow.close();
            }, 500); // Esperar 500 ms para asegurarse de que la impresión haya comenzado
        };
    }

    function printContentTicket(content, anchoCm = 2.5, altoCm = 20) {
        // anchoCm = ancho final de la página (después de girar)  → ej. 2.5cm (25mm)
        // altoCm  = alto  final de la página (después de girar) → ej. 20cm

        var win = window.open('', '_blank', 'height=600,width=400');

        win.document.write('<html><head><title>Imprimir</title><style>');

        /* ===== Tamaño de página EXACTO al ticket y sin márgenes ===== */
        win.document.write(`@page{ size:${anchoCm}cm ${altoCm}cm; margin:0; }`);
        win.document.write(`html,body{ margin:0; padding:0; } body{ width:${anchoCm}cm; }`);

        /* ===== Una ficha por hoja (usa class="ficha" en cada contenedor) ===== */
        win.document.write(`
        .ficha{
        page-break-after: always;
        break-after: page;
        width:${anchoCm}cm;
        height:${altoCm}cm;
        position: relative;
        overflow: hidden;
        margin:0; padding:0;
        }
        .ficha:last-of-type{ page-break-after:auto; break-after:auto; }
  `);

        /* ====== Tus estilos base del #ficha_progreso ====== */
        win.document.write(`
        body, #ficha_progreso{ font-family:sans-serif; }
        #ficha_progreso{
        width:20cm;                 /* tamaño original de la ficha en horizontal */
        height:2.5cm;
        border-collapse:collapse;
        border-top:1px dashed red;
        border-bottom:1px dashed red;
        margin:0; padding:0;
        }
        #ficha_progreso .custom-cell{
        vertical-align:middle;
        height:calc(2.5cm / 4);
        position:relative;
        }
        #ficha_progreso .custom-cell-top{ border-top:2px solid #000; }
        #ficha_progreso .custom-cell-right{ border-right:2px solid #000; }
        #ficha_progreso .custom-cell-bottom{ border-bottom:2px solid #000; }
        #ficha_progreso .custom-cell-left{ border-left:2px solid #000; }
        #ficha_progreso .bordered{ border:2px solid #000; display:inline-block; padding:2px 5px; margin:2px; }
        @media print{
        #ficha_progreso{ width:20cm; height:2.5cm; }
        #ficha_progreso .custom-cell{ height:calc(2.5cm / 4); }
        }
  `);

        /* ====== Ajuste de imagen según userTip ====== */
        const userTip = @json($userTip);
        if (userTip.pk_id_tipo_ficha === 16) {
            win.document.write('#ficha_progreso .custom-cell img{ height:100%; object-fit:cover; }');
        } else {
            win.document.write('#ficha_progreso .custom-cell img{ height:180%; object-fit:cover; }');
        }

        /* ====== Giro 90° y anclado al vértice superior-izquierdo ======
           - Rotamos la tabla horizontal (20cm×2.5cm) para que quede vertical.
           - transform-origin en (0,0) y translateY(-100%) para que quede pegada al TOP-LEFT.
        */
        win.document.write(`
                            .ficha #ficha_progreso{
                            position:absolute;
                            top:0; left:0;                 /* pegado a la esquina superior-izquierda */
                            transform-origin:0 0;
                            transform: rotate(90deg) translateY(-100%);
                            }
                        `);

        win.document.write('</style></head><body>');
        win.document.write(content);
        win.document.write('</body></html>');
        win.document.close();

        win.onload = function() {
            win.print();
            setTimeout(() => win.close(), 400);
        };
    }

    // FUNCIONES PARA IMPRESION FICHA DE PROCESO DE VUELO
    /* Impresion de Fichas de Proceso de Vuelo */
</script>
{{-- Llena Dinamicamente datos en la Tabla Autorizacion de FPL a partir de la Seleccion --}}

{{-- Impresion de Fichas de Proceso de Vuelo --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Evento de click para el botón de imprimir
        document.getElementById('printButton').addEventListener('click', function() {
            var printContents = document.getElementById('ficha_progreso_container').innerHTML;

            // Llamar a la función de impresión
            printContent(printContents);

            // Guardar Registro en la Base de Datos
            var id_estado_impreso = 4; // Impreso
            var nombre_estado = "IMPRESO";
            var color = "#005C53";

            $('#id_estado').val(id_estado_impreso);
            $('#name_estado').val(nombre_estado);
            $('#color_estado').val(color);

            const id_amhs = $('#id').val(); // Obtener el valor del input hidden con id "id"
            // RegistrarTransito(id_estado, id_amhs);

            console.log('Nombre del Estado IM:', nombre_estado);
            console.log('Color del Estado IM:', color);

            /* const estadoCell = document.getElementById('estado' +
                id_amhs);

            if (estadoCell) {
                estadoCell.textContent = nombre_estado;
                estadoCell.style.color = color;
                estadoCell.style.fontWeight = "bold";
            } */

            const estadoCell = document.getElementById('estado' + id_amhs);

            if (estadoCell) {
                const badge = estadoCell.querySelector('span'); // Busca el badge dentro del td

                if (badge) {
                    badge.textContent = nombre_estado;
                    badge.style.backgroundColor = color;
                    badge.style.color = "#ffffff";
                    badge.style.fontWeight = "bold";
                }
            }

            // Fecha Impresion
            console.log('IMP HORA UTC', $('#fecha_impresion').val());

            let utcDateTime = $('#fecha_impresion').val();

            if ($('#fecha_impresion').val().trim() === "") {

                let now = new Date();
                utcDateTime = now.toISOString().replace("T", " ").substring(0, 19);
                $('#fecha_impresion').val(utcDateTime);
            }

            const procesoVueloData = {
                id_amhs: id_amhs,
                id_estado: id_estado_impreso,
                name_estado: nombre_estado,
                color_estado: color,
                tipo_ficha: userTip.pk_id_tipo_ficha,

                fecha_impresion: utcDateTime,
                origen_save: 1,
            };

            console.log('procesoVueloData', procesoVueloData);

            // Llamar a la función para enviar los datos
            sendProcesoVueloData(procesoVueloData);

            /*  $('#amhs-dataAutorizados tr[data-id="' + id_amhs + '"]').remove(); */

        });

        document.getElementById('printButtonTermic').addEventListener('click', function() {
            const cont = document.getElementById('ficha_progreso_container');

            // Buscar celdas con padding-top 8px o 10px
            const celdas = cont.querySelectorAll(
                'td[style*="padding-top: 8px"], td[style*="padding-top: 10px"]');
            celdas.forEach(td => {
                const match = td.style.paddingTop.match(/\d+/);
                if (match) {
                    let paddingActual = parseInt(match[0], 10);
                    td.style.paddingTop = (paddingActual + 6) + "px"; // aumenta +6px
                }
            });

            // Imprimir con el nuevo padding
            printContentTicket(cont.innerHTML);
        });

    });
</script>
{{-- Impresion de Fichas de Proceso de Vuelo --}}
