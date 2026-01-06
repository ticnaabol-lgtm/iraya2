<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoRutasPredeterminadas extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'proceso_rutas_predeterminadas';

    // Campos que se pueden llenar
    protected $fillable = [
        'origen',
        'destino',
        'array_option_select',
        'id_rutas_encontradas',
        'name_rutas_encontradas',
        'id_vector_viaje',
        'llave_select',
        'name_vector_viaje',
        'distancia_vector_viaje',
        'puntos_mensaje',
        'ruta_vector_viaje',
        'fpl_punto_seleccionado',
        'activo',
        'fk_user',
        'vuelo',
        'popular',
        'tipo_ficha',
    ];
}
