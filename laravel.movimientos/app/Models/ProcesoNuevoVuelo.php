<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoNuevoVuelo extends Model
{
    use HasFactory;

    protected $table = 'proceso_nuevo_vuelo';

    protected $fillable = [
        'n_registro_nuevo',
        'activo',
        'fk_user',
    ];

    protected $primaryKey = 'id';
}
