<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_nivel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RolUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $IdUsuario = Auth::user()->id;
        $listar_user = User_nivel::select('pk_id_user_nivel', 'logueado', 'fk_id_user')
            ->orderBy('pk_id_user_nivel', 'asc')
            ->where('fk_id_user', '=', $IdUsuario)
            ->get();

        foreach ($listar_user as $l) {
            $update = User_nivel::find($l->pk_id_user_nivel);
            $update->logueado = '0';
            $update->fk_id_user = $IdUsuario;
            $update->save();
        }

        $idrol = $request->id_rol;

        $buscar_nivel = User_nivel::select('pk_id_user_nivel', 'fkp_rol','fk_id_user')
            ->where('pk_id_user_nivel', '=', $idrol)
            ->where('activo','=','1')
            ->first();
        $nivel = $buscar_nivel->fkp_rol;
        $fk_id_user = $buscar_nivel->fk_id_user;


        $update1 = User::find($fk_id_user);
        $update1->nivel = $nivel;
        $update1->fk_user = $IdUsuario;
        $update1->save();

        $update = User_nivel::find($idrol);
        $update->logueado = '1';
        $update->fk_id_user = $IdUsuario;
        $update->save();

        if ($update->save()) {
            Toastr::success('Los datos de actualizados correctamente.', 'Rol Actualizado');
            return redirect()->back();
        } else {
            Toastr::error('Error al guardar datos...', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
