<?php

namespace App\Http\Controllers\registro_usuario;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListadoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Consulta a la base de datos tipo_ficha
        $tipo_ficha = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('activo', 1)
            ->where('fk_id_parametrica', 3)
            ->get();

        // Consulta a la base de datos oaci
        $oaci = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('activo', 1)
            ->where('fk_id_parametrica', 4)
            ->get();

        // Consulta a la base de datos roles
        $roles = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion', 'rol_nivel')
            ->where('activo', 1)
            ->where('rol_nivel', '!=', 0)
            ->get();

        $listar_user = DB::table('vista_usuarios')
            ->where('activo', 1)
            ->orderBy('nivel', 'desc')
            ->get();

        return view('registro_usuario.listado_usuario', compact('listar_user', 'tipo_ficha', 'oaci', 'roles'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buscar_id = User::select('activo')
            ->where('id', '=', $id)
            ->first();
        $activo = $buscar_id->activo;

        $IdUsuario = Auth::user()->id;
        if ($activo == 1) {

            $update = User::find($id);
            $update->activo = '0';
            $update->password = bcrypt('d3shab1l1t4d0p4ssw0r4dm1n');
            $update->fk_user = $IdUsuario;
            $update->save();

            if ($update->save()) {
                Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
                return redirect()->back();
            } else {
                Toastr::error('Error al guardar datos...', 'Error');
                return redirect()->back();
            }
        } else {

            $update = User::find($id);
            $update->activo = '1';
            $update->fk_user = $IdUsuario;
            $update->save();

            if ($update->save()) {
                Toastr::info('Los datos se actualizaron correctamente.', 'RESETEE LA CONTRASEÑA DEL USUARIO.', ['timeOut' => 6000]);
                return redirect()->back();
            } else {
                Toastr::error('Error al guardar datos...', 'Error');
                return redirect()->back();
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
