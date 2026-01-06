<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunicacionRegistro extends Model
{
    use HasFactory;

    protected $table = 'comunicacion_registro';

    protected $fillable = [
        'id_amhs',
        'estado',
        'activo',
        'fk_user',
    ];
}
