<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeronave extends Model
{
    use HasFactory;

    protected $table = 'aeronaves';

    protected $fillable = [
        'matricula',
        'modelo',
        'version',
        'fabricante',
        'peso',
        'id_aerolinea',
        'activo',
        'fk_user',
    ];
}
