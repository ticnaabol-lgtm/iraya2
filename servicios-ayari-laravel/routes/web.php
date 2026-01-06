<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;

Route::get('/', function () {
    return view('welcome');
});


/* Route::get('/rutas', [RutaController::class, 'index']);
Route::get('/rutas/{id}', [RutaController::class, 'show']); */ 
/* Route::post('/rutas', [RutaController::class, 'store']);
Route::put('/rutas/{id}', [RutaController::class, 'update']);
Route::delete('/rutas/{id}', [RutaController::class, 'destroy']); */
