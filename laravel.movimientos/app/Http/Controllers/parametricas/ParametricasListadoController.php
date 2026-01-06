<?php

namespace App\Http\Controllers\parametricas;

use App\Http\Controllers\Controller;
use App\Models\Licencia;
use App\Models\ParametricaDescripcion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ParametricasListadoController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $IdUsuario = Auth::user()->id;

        $new = new ParametricaDescripcion();
        $new->descripcion = $request->descripcion;
        $new->sigla = $request->sigla;
        $new->fk_id_parametrica = $request->pk_id_parametrica;
        $new->fk_user = $IdUsuario;
        $new->save();
        if ($new->save()) {
            Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
            return redirect()->back();
        } else {
            Toastr::error('Error al guardar datos...', 'Error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pk_id_parametrica = $id;

        $listar_parametricas = ParametricaDescripcion::select('pk_id_parametrica_descripcion','descripcion','sigla','nivel','activo','fk_user','fk_id_parametrica')
            ->orderBy('descripcion', 'asc')
            ->where('fk_id_parametrica','=',$pk_id_parametrica)
            ->get();

        return view('parametricas.parametricas_listado', compact('pk_id_parametrica','listar_parametricas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buscar_permiso = ParametricaDescripcion::select('pk_id_parametrica_descripcion', 'activo')
            ->where('pk_id_parametrica_descripcion', '=', $id)
            ->first();
        $activo = $buscar_permiso->activo;

        $IdUsuario = Auth::user()->id;
        if ($activo == '1'){
            $update = ParametricaDescripcion::find($id);
            $update->activo = '0';
            $update->fk_user = $IdUsuario;
            $update->save();
        } else {
            $update = ParametricaDescripcion::find($id);
            $update->activo = '1';
            $update->fk_user = $IdUsuario;
            $update->save();
        }

        if ($update->save()) {
            Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
            return redirect()->back();
        } else {
            Toastr::error('Error al guardar datos...', 'Error');
            return redirect()->back();
        }
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
        $IdUsuario = Auth::user()->id;
        $update = ParametricaDescripcion::find($id);
        $update->descripcion = $request->descripcion;
        $update->sigla = $request->sigla;
        $update->fk_user = $IdUsuario;
        $update->save();

        if ($update->save()) {
            Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
            return redirect()->back();
        } else {
            Toastr::error('Error al guardar datos...', 'Error');
            return redirect()->back();
        }

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
