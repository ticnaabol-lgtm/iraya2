<?php

use App\Http\Controllers\AeropuertoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroAdicionSobrevueloController;
use App\Http\Controllers\AutorizacionVueloController;
use App\Http\Controllers\ComunicacionController;
use App\Http\Controllers\AprobadorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\DGACMonitorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /*Nivel Administrador*/
    Route::group(['middleware' => ['auth', 'Administrador']], function () {
        Route::resource('registro', \App\Http\Controllers\registro_usuario\RegistroController::class);
        Route::get('/usuario/baja/{id}', [\App\Http\Controllers\registro_usuario\RegistroController::class, 'baja'])->name('usuario.baja');
        Route::resource('listado_usuario', \App\Http\Controllers\registro_usuario\ListadoUsuarioController::class);
        Route::resource('listado_roles', \App\Http\Controllers\registro_usuario\ListadoRolesController::class);
        Route::get('/rol/baja/{id}', [\App\Http\Controllers\registro_usuario\ListadoRolesController::class, 'baja'])->name('rol.baja');
        // Route::resource('registro_regional', \App\Http\Controllers\registro_usuario\RegistroRegionalController::class);
        Route::resource('resetear_contrasena', \App\Http\Controllers\registro_usuario\ResetearContrasenaController::class);
    });

    /*Nivel Registro*/
    Route::group(['middleware' => ['auth', 'Registro']], function () {
        Route::get('/registro-adicion-sobrevuelo', [RegistroAdicionSobrevueloController::class, 'index'])->name('registro_adicion_sobrevuelo.index');
        Route::get('/vuelo_autocomplete', [RegistroAdicionSobrevueloController::class, 'vuelo_autocomplete'])->name('vuelo_autocomplete');
        Route::get('/matricula_autocomplete', [RegistroAdicionSobrevueloController::class, 'buscar_matricula'])->name('matricula_autocomplete');
        Route::get('/autorizacion_autocomplete', [RegistroAdicionSobrevueloController::class, 'buscar_autorizacion'])->name('autorizacion_autocomplete');

        Route::get('/clientes/buscar', [RegistroAdicionSobrevueloController::class, 'buscar_cliente'])->name('buscar_cliente');
        Route::post('/registro-sobrevuelo', [RegistroAdicionSobrevueloController::class, 'store'])->name('registro-sobrevuelo.store');
        Route::get('/registro-sobrevuelo/data', [RegistroAdicionSobrevueloController::class, 'getData'])->name('registro-sobrevuelo.data');
        Route::get('/registro-sobrevuelo/{id}', [RegistroAdicionSobrevueloController::class, 'show'])->name('registro-sobrevuelo.show');
        Route::get('/registro-sobrevuelo/baja/{id}', [RegistroAdicionSobrevueloController::class, 'baja'])->name('registro-sobrevuelo.baja');

        Route::get('/autorizacion/index', [AutorizacionVueloController::class, 'index'])->name('autorizacion.index');
        Route::get('/autorizacion/data', [AutorizacionVueloController::class, 'getData'])->name('autorizacion.data');
        Route::post('/autorizacion/store_sobrevuelo', [AutorizacionVueloController::class, 'store_sobrevuelo'])->name('autorizacion.store_sobrevuelo');

        Route::get('/ruta/index', [RutaController::class, 'index'])->name('ruta.index');
        Route::get('/ruta/data', [RutaController::class, 'getData'])->name('ruta.data');
        Route::post('/ruta/store', [RutaController::class, 'store'])->name('ruta.store');
        Route::get('/ruta/baja/{id}', [RutaController::class, 'baja'])->name('ruta.baja');

        Route::post('/registro/leidos_sobrevuelo', [AprobadorController::class, 'leidos_sobrevuelo'])->name('registro-sobrevuelo.leidos_sobrevuelo');
        Route::post('/registro/leidos_all', [AprobadorController::class, 'leidos_all'])->name('registro.leidos_all');

        Route::get('/matricula/index', [MatriculaController::class, 'index'])->name('matricula.index');
        Route::get('/matricula/data', [MatriculaController::class, 'getData'])->name('matricula.data');
        Route::post('/matricula/store', [MatriculaController::class, 'store'])->name('matricula.store');
        Route::get('/matricula/baja/{id}', [MatriculaController::class, 'baja'])->name('matricula.baja');

        Route::get('/cliente/index', [ClienteController::class, 'index'])->name('cliente.index');
        Route::get('/cliente/data', [ClienteController::class, 'getData'])->name('cliente.data');
        Route::post('/cliente/store', [ClienteController::class, 'store'])->name('cliente.store');
        Route::get('/cliente/baja/{id}', [ClienteController::class, 'baja'])->name('cliente.baja');

        Route::get('/aeropuerto/index', [AeropuertoController::class, 'index'])->name('aeropuerto.index');
        Route::get('/aeropuerto/data', [AeropuertoController::class, 'getData'])->name('aeropuerto.data');
        Route::post('/aeropuerto/store', [AeropuertoController::class, 'store'])->name('aeropuerto.store');
        Route::get('/aeropuerto/baja/{id}', [AeropuertoController::class, 'baja'])->name('aeropuerto.baja');

        Route::get('/reporte/resumen_cantidad', [ReporteController::class, 'resumen_cantidad'])->name('reporte.resumen_cantidad');
        Route::get('/reporte/resumen_cantidad_pdf', [ReporteController::class, 'resumen_cantidad_pdf'])->name('reporte.resumen_cantidad_pdf');
        Route::get('/reporte/resumen_cantidad_excel', [ReporteController::class, 'resumen_cantidad_excel'])->name('reporte.resumen_cantidad_excel');

        Route::get('/reporte/formulario002', [ReporteController::class, 'formulario002'])->name('reporte.formulario002');
        Route::get('/reporte/formulario002_pdf', [ReporteController::class, 'formulario002_pdf'])->name('reporte.formulario002_pdf');
        Route::get('/reporte/formulario002_excel', [ReporteController::class, 'formulario002_excel'])->name('reporte.formulario002_excel');

        Route::get('/reporte/por_fecha', [ReporteController::class, 'por_fecha'])->name('reporte.por_fecha');
        Route::get('/reporte/por_fecha_pdf', [ReporteController::class, 'por_fecha_pdf'])->name('reporte.por_fecha_pdf');
        Route::get('/reporte/por_fecha_excel', [ReporteController::class, 'por_fecha_excel'])->name('reporte.por_fecha_excel');

        Route::get('/reporte/rvsm', [ReporteController::class, 'rvsm'])->name('reporte.rvsm');
        Route::get('/reporte/por_rvsm_excel', [ReporteController::class, 'rvsm_excel'])->name('reporte.por_rvsm_excel');
    });

    /*Nivel Comunicación*/
    Route::group(['middleware' => ['auth', 'Comunicacion']], function () {
        Route::get('/sobrevuelos', [ComunicacionController::class, 'sobrevuelos'])->name('sobrevuelos');
        Route::get('/api/sobrevuelos', [ComunicacionController::class, 'getSobrevuelos'])->name('comunicacion.getSobrevuelos');
        Route::post('/comunicacion/actualizar-estado', [ComunicacionController::class, 'actualizarEstado'])->name('comunicacion.actualizarEstado');

        Route::get('/comunicacion/{tipo}', [ComunicacionController::class, 'index_ingreso'])->name('comunicacion.index_ingreso');
        Route::get('/comunicacion/autorizacion_data/{tipo}', [ComunicacionController::class, 'autorizacion_data'])->name('comunicacion.autorizacion_data');
        Route::post('/comunicacion/registro-autorizacion', [ComunicacionController::class, 'store'])->name('comunicacion.registro-autorizacion');
        Route::get('/comunicacion/autorizacion_baja/{id}', [ComunicacionController::class, 'baja'])->name('comunicacion.registro-baja');
        Route::post('/comunicacion/enmienda', [ComunicacionController::class, 'enmienda'])->name('comunicacion.enmienda');
    });

    // Rutas comunes para Registro y Autorización
    Route::group(['middleware' => ['auth', 'RegistroORAutorizacion']], function () {
        Route::get('/autorizacion/index_ingreso', [AutorizacionVueloController::class, 'index_ingreso'])->name('autorizacion.index_ingreso');
        Route::get('/autorizacion/index_sobrevuelo', [AutorizacionVueloController::class, 'index_sobrevuelo'])->name('autorizacion.index_sobrevuelo');
        Route::post('/registro-autorizacion', [AutorizacionVueloController::class, 'store'])->name('registro-autorizacion.store');
        Route::get('/registro-autorizacion/baja/{id}', [AutorizacionVueloController::class, 'baja'])->name('registro-autorizacion.baja');
    });

    /*Nivel Aprobador*/
    Route::group(['middleware' => ['auth', 'Aprobador']], function () {
        Route::get('/aprobar_sobrevuelo', [AprobadorController::class, 'index_sobrevuelo'])->name('aprobador.index_sobrevuelo');
        Route::get('/aprobar_sobrevuelo/data', [AprobadorController::class, 'getData'])->name('aprobador.data');
        Route::get('/aprobar_sobrevuelo/{id}', [AprobadorController::class, 'aprobar_sobrevuelo'])->name('aprobador.aprobar_sobrevuelo');
        Route::post('/aprobar_sobrevuelos', [AprobadorController::class, 'aprobar_sobrevuelos'])->name('aprobador.aprobar_sobrevuelos');
        Route::post('/rechazar_sobrevuelo', [AprobadorController::class, 'rechazar_sobrevuelo'])->name('aprobador.rechazar_sobrevuelo');

        Route::post('/aprobador/leidos_sobrevuelo', [AprobadorController::class, 'leidos_sobrevuelo'])->name('aprobador.leidos_sobrevuelo');
        Route::post('/aprobador/leidos_all', [AprobadorController::class, 'leidos_all'])->name('aprobador.leidos_all');
    });

    /* Nivel DGACMonitor */
    Route::group(['middleware' => ['auth', 'DGACMonitor']], function () {
        Route::get('/dgac_monitor', [DGACMonitorController::class, 'index'])->name('dgac_monitor');
        Route::get('/amhs/data', [DGACMonitorController::class, 'amhs_data'])->name('amhs_data');
        Route::get('/dgac/ats/data', [DGACMonitorController::class, 'ats_data'])->name('dgac_ats_data');
        Route::get('/dgac/met/data', [DGACMonitorController::class, 'met_data'])->name('dgac_met_data');
        Route::get('/dgac/speci/data', [DGACMonitorController::class, 'speci_data'])->name('dgac_speci_data');
        Route::get('/dgac/ss/data', [DGACMonitorController::class, 'ss_data'])->name('dgac_ss_data');
        Route::get('/dgac/dd/data', [DGACMonitorController::class, 'dd_data'])->name('dgac_dd_data');
        Route::get('/dgac/notam/data', [DGACMonitorController::class, 'notam_data'])->name('dgac_notam_data');
    });

    /*Nivel Controlador*/
    Route::group(['middleware' => ['auth', 'AdminRegional']], function () {
        Route::resource('transito_aereo', \App\Http\Controllers\transito\TransitoAereoController::class);

        Route::get('/transito_aereo2', [\App\Http\Controllers\transito\TransitoAereoController::class, 'index2'])->name('index2');
        Route::get('/busqueda-historica', [\App\Http\Controllers\transito\TransitoAereoController::class, 'busqueda_historica'])->name('busqueda_historica');
        Route::get('/fetch-data-amhs', [\App\Http\Controllers\transito\TransitoAereoController::class, 'fetchDataAmhs'])->name('fetch.data.amhs');
        Route::get('/search_amhs/{id}', [\App\Http\Controllers\transito\TransitoAereoController::class, 'search_amhs'])->name('search_amhs');
        Route::get('/ficha-estado/{id}', [\App\Http\Controllers\transito\TransitoAereoController::class, 'ficha_estado'])->name('ficha_estado');
        Route::post('/neo_plan_vuelo/store', [\App\Http\Controllers\transito\TransitoAereoController::class, 'store_neo_plan_vuelo'])->name('store_neo_plan_vuelo');
        Route::post('/select-ruta', [\App\Http\Controllers\transito\TransitoAereoController::class, 'selectRuta'])->name('selectRuta');
        Route::post('/crear-ruta', [\App\Http\Controllers\transito\TransitoAereoController::class, 'crearRuta'])->name('crearRuta');
        Route::post('/crear-ruta-predeterminada', [\App\Http\Controllers\transito\TransitoAereoController::class, 'storeRutaPredeterminada'])->name('storeRutaPredeterminada');
        Route::post('/actualizar-ruta-predeterminada', [\App\Http\Controllers\transito\TransitoAereoController::class, 'updateRutaPredeterminada'])->name('updateRutaPredeterminada');
        Route::get('/filtrar-rutas', [\App\Http\Controllers\transito\TransitoAereoController::class, 'filtrarRutas'])->name('filtrarRutas');
        Route::post('/filtrar-ruta', [\App\Http\Controllers\transito\TransitoAereoController::class, 'filtrarRuta'])->name('filtrarRuta');
        Route::get('/load-more-data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'loadMoreData'])->name('loadMoreData');
        Route::get('/load-new-data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'loadNewData'])->name('loadNewData');
        Route::post('/proceso-vuelo', [\App\Http\Controllers\transito\TransitoAereoController::class, 'storeOrUpdate'])->name('storeOrUpdate');
        Route::get('/proceso-vuelo/{id_amhs}', [\App\Http\Controllers\transito\TransitoAereoController::class, 'getByIdAmhs'])->name('getByIdAmhs');
        Route::get('/obtener-amhs-pag', [\App\Http\Controllers\transito\TransitoAereoController::class, 'obtenerAmhsPag'])->name('obtenerAmhsPag');
        Route::get('/obtener-amhs-autorizados', [\App\Http\Controllers\transito\TransitoAereoController::class, 'obtenerAmhsAutorizados'])->name('obtenerAmhsAutorizados');
        Route::get('/obtener-new-amhs-autorizados', [\App\Http\Controllers\transito\TransitoAereoController::class, 'obtenerAmhsNewAutorizados'])->name('obtenerAmhsNewAutorizados');
        Route::post('/obtener-old-amhs-autorizados', [\App\Http\Controllers\transito\TransitoAereoController::class, 'obtenerAmhsOldAutorizados'])->name('obtenerAmhsOldAutorizados');
        Route::get('/obtener-estados', [\App\Http\Controllers\transito\TransitoAereoController::class, 'obtenerEstados'])->name('obtenerEstados');
        Route::get('/fpl-creados', [\App\Http\Controllers\transito\TransitoAereoController::class, 'FPLCreados'])->name('FPLCreados');
        Route::post('/busqueda_query', [\App\Http\Controllers\transito\TransitoAereoController::class, 'busqueda_query'])->name('busqueda_query');

        /* Route::get('/fetch-data-met', [\App\Http\Controllers\transito\TransitoAereoController::class, 'fetchDataMet'])->name('fetch.data.met');
        Route::get('/metars', [\App\Http\Controllers\transito\TransitoAereoController::class, 'obtenerDatMetPag'])->name('obtenerDatMetPag');
        Route::get('/load-new-data-metars', [\App\Http\Controllers\transito\TransitoAereoController::class, 'loadNewDataMet'])->name('loadNewDataMet');
        Route::get('/load-new-data-ats', [\App\Http\Controllers\transito\TransitoAereoController::class, 'loadNewDataATS'])->name('loadNewDataATS');
        Route::get('/load-more-data-metars', [\App\Http\Controllers\transito\TransitoAereoController::class, 'loadMoreDataMet'])->name('loadMoreDataMet');
        Route::get('/load-more-data-ats', [\App\Http\Controllers\transito\TransitoAereoController::class, 'loadMoreDataATS'])->name('loadMoreDataATS');
        Route::get('/arrivos', [\App\Http\Controllers\transito\TransitoAereoController::class, 'obtenerATSPag'])->name('obtenerATSPag'); */

        Route::post('/ficha-acc4', [\App\Http\Controllers\transito\TransitoAereoController::class, 'fichaACC4'])->name('fichaACC4');
        Route::post('/ficha-acc4-notificacion', [\App\Http\Controllers\transito\TransitoAereoController::class, 'fichaACC4Notificacion'])->name('fichaACC4Notificacion');
        Route::post('/buscador_amhs', [\App\Http\Controllers\transito\TransitoAereoController::class, 'buscador_amhs'])->name('buscador_amhs');
        Route::post('/fpl_reset', [\App\Http\Controllers\transito\TransitoAereoController::class, 'fpl_reset'])->name('fpl_reset');
        Route::post('/save_meteo', [\App\Http\Controllers\transito\TransitoAereoController::class, 'save_meteo'])->name('save_meteo');
        Route::get('/ats/data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'ats_data'])->name('ats_data');
        Route::get('/met/data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'met_data'])->name('met_data');
        Route::get('/speci/data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'speci_data'])->name('speci_data');
        Route::get('/ss/data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'ss_data'])->name('ss_data');
        Route::get('/dd/data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'dd_data'])->name('dd_data');
        Route::get('/notam/data', [\App\Http\Controllers\transito\TransitoAereoController::class, 'notam_data'])->name('notam_data');
    });

    /*Nivel Usuario*/
    Route::group(['middleware' => ['auth', 'Usuario']], function () {});

    Route::resource('rol_usuario', \App\Http\Controllers\RolUsuarioController::class);
    Route::resource('actualizar_contrasena', \App\Http\Controllers\registro_usuario\ActualizarContrasenaController::class);
});
