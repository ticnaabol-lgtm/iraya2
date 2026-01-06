<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoMetar extends Model
{
    use HasFactory;

    protected $table = 'proceso_metars';

    protected $fillable = [
        'id_amhs',
        'oaci',
        'tipo_ficha',
        'activo',
        'fk_user',
        'tipo_meteo',
    ];
}