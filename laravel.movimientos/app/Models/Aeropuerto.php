<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Aeropuerto extends Model
{
    use HasFactory;

    protected $table = 'aeropuertos';

    public $incrementing = false; // Desactiva auto-incremento
    protected $keyType = 'string'; // Define que la clave es string (UUID)

    protected $fillable = [
        'id',
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

    // Asignar UUID automáticamente si no existe
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
