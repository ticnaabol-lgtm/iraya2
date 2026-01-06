<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class FichaProgreso extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'ficha_progreso';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_amhs',
        'fecha',
        'hora',
        'vuelo',
        'tipo',
        'origen',
        'destino',
        'eobt',
        'dep',
        'etd',
        'reg',
        'sel',
        'linea_aerea',
        'id_ruta',
        'atd',
        'est',
        'nivel',
        'sq',
        'ha',
        'fpl_json',
        'estado',
        'activo',
        'fk_user',
        'velocidad',
        'mensaje',
        'creado',
    ];

    protected $casts = [
/*      'json' => 'array', // Esto permitirá que Laravel maneje automáticamente el casting a/desde JSON
        'fecha' => 'date',
        'hora' => 'datetime:H:i:s.u', */
    ];
}
