<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametrica extends Model
{
    use HasFactory;
    protected $primaryKey = 'pk_id_parametrica';

    protected $fillable = [
        'descripcion',
        'fk_user',
        'activo',
    ];
}
