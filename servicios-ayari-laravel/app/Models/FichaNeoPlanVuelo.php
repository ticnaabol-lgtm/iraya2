<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaNeoPlanVuelo extends Model
{
    use HasFactory;
    protected $table = 'ficha_neo_plan_vuelo';

    protected $fillable = [
        'vuelo',
        'tipo',
        'dep',
        'etd',
        'dest',
        'reg',
        'sel',
        'dta',
        'regla_tipo',
        'equipo',
        'eet',
        'opr',
        'turbulencia',
        'aeronaves',
        'aed_alternos',
        'dep_alt',
        'dest_alt',
        'ralt',
        'dof',
        'nav',
        'eet_alt',
        'rmk',
        'rif',
        'sts',
        'typ',
        'per',
        'com',
        'dat',
        'altn',
        'code',
        'rvr',
        'activo',
        'fk_user',
        'velocidad',
        'fecha_hora',
    ];
}
