<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutasPunto extends Model
{
    use HasFactory;

    protected $table = 'rutas_puntos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id_ruta',
        'punto',
        'distancia',
        'orden',
        'activo',
        'fk_user',
        'latitud',
        'longitud',
        'tramo_inicial',
        'tramo_final',
        'punto_salida',
    ];
}
