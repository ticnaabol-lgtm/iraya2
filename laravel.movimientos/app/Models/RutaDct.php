<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutaDct extends Model
{
    use HasFactory;

    protected $table = 'registro_ruta_dct';

    protected $fillable = [
        'id',
        'ruta',
        'distancia',
        'activo',
        'fk_user',
    ];
}
