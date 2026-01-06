<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'registro_cliente';

    protected $fillable = [
        'codigo_oaci',
        'nombre',
        'direccion',
        'telefono',
        'fax',
        'casilla',
        'email',
        'representante',
        'pais',
        'ciudad',
        'nit',
        'activo',
        'fk_user',
        'codigo_contable',
    ];
}
