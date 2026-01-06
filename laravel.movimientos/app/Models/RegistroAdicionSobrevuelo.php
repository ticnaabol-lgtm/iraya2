<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAdicionSobrevuelo extends Model
{
    use HasFactory;

    protected $table = 'registro_adicion_sobrevuelo';

    protected $fillable = [
        'fecha',
        'razon_social',
        'distancia',
        'origen',
        'destino',
        'responsable',
        'cliente',
        'matricula',
        'modelo',
        'version',
        'peso',
        'peso_dimension',
        'origen_oaci',
        'destino_oaci',
        'vuelo',
        'control1',
        'control2',
        'ruta',
        'autorizacion',
        'fl_fijo_entrada',
        'fijo1',
        'fijo2',
        'fijo3',
        'fl_fijo_salida',
        'hora_fijo1',
        'hora_fijo2',
        'hora_fijo3',
        'fl_fijo1',
        'fl_fijo2',
        'fl_fijo3',
        'observaciones',
        'id_proceso_vuelo',
        'activo',
        'fk_user',
        'aprobado',
        'texto_rechazo',
        'leido',
        'origen_cliente',
        'origen_el matricula',
        'ruta_vuelo',
        'primer_punto',
        'ultimo_punto',
        'observacion_otro',
        'ruta_dct'
    ];
}
