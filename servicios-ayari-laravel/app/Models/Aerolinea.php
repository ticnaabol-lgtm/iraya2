<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aerolinea extends Model
{
    use HasFactory;

    protected $table = 'aerolineas';

    protected $fillable = [
        'codigo',
        'cod_oaci',
        'cod_cont',
        'nombre_comercial',
        'razon_social',
        'pais',
        'telefono',
        'email',
        'nit',
        'direccion',
        'activo',
        'fk_user',
    ];
}
