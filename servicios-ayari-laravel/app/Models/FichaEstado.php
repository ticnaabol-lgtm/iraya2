<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaEstado extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'ficha_estados';

    // Especifica los campos que se pueden asignar en masa
    protected $fillable = [
        'estado',
        'activo',
        'fk_user',
        'created_at',
        'updated_at'
    ];

    // Indica que el identificador será auto-incremental
    public $incrementing = true;

    // Especifica el tipo de clave primaria
    protected $keyType = 'int';

    // Habilita las marcas de tiempo de Laravel
    public $timestamps = true;
 
}