<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_nivel extends Model
{
    use HasFactory;

    protected $fillable = [
        'pk_id_user_nivel',
        'fkp_rol',
        'fkp_regional',
        'fk_id_area',
        'logueado',
        'fk_user',
        'activo',
        'fk_id_user'
    ];

    protected $table = 'user_nivels';
    protected $guarded = ['pk_id_uer_nivel','created_at','updated_at'];
    protected $primaryKey = 'pk_id_user_nivel';

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'fk_id_user', 'id');
    }
}
