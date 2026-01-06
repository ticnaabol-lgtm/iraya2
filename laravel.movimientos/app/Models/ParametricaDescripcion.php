<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametricaDescripcion extends Model
{
    use HasFactory;
    protected $primaryKey = 'pk_id_parametrica_descripcion';

    protected $fillable = [
        'sigla',
        'nivel',
        'fk_user',
        'activo',
        'fk_id_parametrica',
    ];

    protected function Parametrica(){
        return $this->belongTo('App\Models\Parametrica', 'fk_id_parametrica', 'pk_id_parametrica');
    }
    protected function ParametricaMaterial(){
        return $this->hasMany('App\Models\ParametricaMaterial', 'fk_id_parametrica_descripcion', 'pk_id_parametrica_descripcion');
    }
}
