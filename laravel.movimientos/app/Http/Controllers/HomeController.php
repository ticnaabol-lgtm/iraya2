<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $IdUsuario = Auth::user()->id;

        $listar_roles = User::from('users as u')
            ->join('user_nivels as n', 'u.id', '=', 'n.fk_id_user')
            ->join('parametrica_descripcions as p', 'p.pk_id_parametrica_descripcion', '=', 'n.fkp_rol')
            ->join('parametrica_descripcions as p2', 'p2.pk_id_parametrica_descripcion', '=', 'n.fkp_regional')
            ->select('u.id', 'u.name', 'u.email', 'n.fkp_rol', 'p.descripcion as rol','n.fkp_regional','p2.descripcion as regional', 'n.logueado', 'n.pk_id_user_nivel','n.activo')
            ->where('n.fk_id_user', '=', $IdUsuario)
            ->orderBy('p.descripcion', 'asc')
            ->where('n.activo', '=', '1')
            ->get();

        return view('home',compact('listar_roles'));
    }
}
