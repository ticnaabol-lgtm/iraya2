<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AutorizacionVuelo extends Model
{
    use HasFactory;

    protected $table = 'registro_autorizacion';

    protected $fillable = [
        'razon_social',
        'fecha_autorizacion',
        'numero_autorizacion',
        'cliente',
        'cliente2',
        'tipo_aeronave',
        'nacionalidad',
        'peso',
        'piloto',
        'ruta',
        'ultimo_aeropuerto',
        'aeropuerto_destino',
        'objeto_vuelo',
        'tiempo_validez_inicio',
        'tiempo_validez_fin',
        'dias_adelanto',
        'observaciones',
        'activo',
        'fk_user',
        'matricula',
        'pais',
        'medida_peso',
        'aeropuerto_alterno',
        'objeto_vuelo_aux',
        'tipo_autorizacion',
        'aeropuerto_entrada',
        'aeropuerto_entrada_alterno',
        'aeropuerto_salida',
        'aeropuerto_salida_alterno',
        'modelo',
        'tipo_array',
        'matricula_array',
        'peso_array',
        'autorizacion_file',
        'adjunto_file',
        'id_padre',
        'n_enmienda',
    ];
}
