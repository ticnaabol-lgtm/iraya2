<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\AeropuertoController;
use App\Http\Controllers\RutasPuntoController;
use App\Http\Controllers\AerolineaController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\AeronaveController;
use App\Http\Controllers\FichaProgresoController;
use App\Http\Controllers\FichaEstadoController;
use App\Http\Controllers\FichaNeoPlanVueloController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* Rutas */
Route::get('/vista_ruta_puntos', [RutaController::class, 'index_vista_ruta_puntos']);
Route::get('/vista_ruta_puntos_ad', [RutaController::class, 'asdesc_vista_ruta_puntos']);
Route::get('/vista_ruta_punto/{id}', [RutaController::class, 'show_vista_ruta_punto']);
Route::resource('rutas', RutaController::class);
Route::get('/rutas/{id}/delete', [RutaController::class, 'delete']);

/* Aeropuerto */
Route::resource('aeropuertos', AeropuertoController::class);
Route::get('/aeropuertos/{id}/delete', [AeropuertoController::class, 'delete']);

/* RutasPunto */
Route::resource('rutas-puntos', RutasPuntoController::class);
Route::get('/rutas-puntos/{id}/delete', [RutasPuntoController::class, 'delete']);
Route::post('/rutas-puntos/search_ruta', [RutasPuntoController::class, 'search_ruta']);
Route::post('/rutas-puntos/crear_ruta', [RutasPuntoController::class, 'crear_ruta']);

/* Aerolinea */
Route::resource('aerolineas', AerolineaController::class);
Route::get('/aerolineas/{id}/delete', [AerolineaController::class, 'delete']);

/* Pais */
Route::resource('paises', PaisController::class);
Route::get('/paises/{id}/delete', [PaisController::class, 'delete']);

/* Aeronave */
Route::get('/vista_aeronaves_aerolineas', [AeronaveController::class, 'index_vista_aeronaves_aerolineas']);
Route::get('/vista_aeronaves_aerolineas/{id}', [AeronaveController::class, 'show_vista_aeronaves_aerolineas']);
Route::resource('aeronaves', AeronaveController::class);
Route::get('/aeronaves/{id}/delete', [AeronaveController::class, 'delete']);
Route::get('/aeronave/buscarPorMatricula/{matricula}', [AeronaveController::class, 'buscarPorMatricula']);

/* Ficha Progreso */
/* Route::resource('ficha_progreso', FichaProgresoController::class);
Route::get('/ficha_progreso/{id}/search_amhs', [FichaProgresoController::class, 'search_amhs']);
Route::get('/ficha_progreso/{fecha}/{vuelo}/{origen?}/{destino?}/{reg?}/buscar', [FichaProgresoController::class, 'buscar'])->name('buscar'); */

/* Ficha Progreso */
Route::resource('ficha_estado', FichaEstadoController::class);

/* Ficha Nuevo Plan Vuelo */
Route::resource('ficha_neo_plan_vuelo', FichaNeoPlanVueloController::class);
