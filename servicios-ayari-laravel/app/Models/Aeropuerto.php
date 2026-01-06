<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Aeropuerto extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'aeropuertos';

    // Indica que el identificador no será auto-incremental
    public $incrementing = false;

    // Especifica el tipo de clave primaria
    protected $keyType = 'string';

    protected $fillable = [
        'geocode',
        'nombre',
        'cd_iata',
        'cd_oaci',
        'longitud',
        'latitud',
        'categoria',
        'ciudad',
        'activo',
        'fk_user',
    ];
}