<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';

    protected $fillable = [
        'ruta',
        'distancia_total',
        'espacio_aereo',
        'activo',
        'fk_user',
        'created_at',
        'updated_at'
    ];
}
