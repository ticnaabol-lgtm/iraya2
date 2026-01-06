<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'registro_matricula';

    protected $fillable = [
        'matricula',
        'fabricante',
        'modelo',
        'version',
        'peso',
        'medida_peso',
        'activo',
        'fk_user',
        'peso_toneladas',
    ];
}
