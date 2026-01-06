<?php

namespace App\Http\Controllers\parametricas;

use App\Http\Controllers\Controller;
use App\Models\ParametricaDescripcion;
use App\Models\ParametricaMaterial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametricasMaterialesController extends Controller
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

        $new = new ParametricaMaterial();
        $new->descripcion = $request->descripcion;
        $new->sigla = $request->sigla;
        $new->fk_id_parametrica_descripcion = $request->pk_id_parametrica_descripcion;
        $new->fk_id_user = $IdUsuario;
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
        $pk_id_parametrica_descripcion = $id;

        $listar_descripcion = ParametricaDescripcion::select('pk_id_parametrica_descripcion','fk_id_parametrica')
            ->where('pk_id_parametrica_descripcion', '=', $pk_id_parametrica_descripcion)
            ->first();
        $fk_id_parametrica = $listar_descripcion->fk_id_parametrica;


        $listar_materiales = ParametricaMaterial::select('pk_id_parametrica_material', 'descripcion', 'sigla', 'activo')
            ->where('fk_id_parametrica_descripcion', '=', $pk_id_parametrica_descripcion)
            ->orderBy('descripcion', 'asc')
            ->get();

        return view('parametricas.parametricas_materiales', compact('listar_materiales', 'pk_id_parametrica_descripcion','fk_id_parametrica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buscar_id = ParametricaMaterial::select('activo')
            ->where('pk_id_parametrica_material', '=', $id)
            ->first();
        $activo = $buscar_id->activo;

        $IdUsuario = Auth::user()->id;

        if ($activo == 1) {
            $update = ParametricaMaterial::find($id);
            $update->activo = '0';
            $update->fk_id_user = $IdUsuario;
            $update->save();
        } else {
            $update = ParametricaMaterial::find($id);
            $update->activo = '1';
            $update->fk_id_user = $IdUsuario;
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

        $update = ParametricaMaterial::find($id);
        $update->descripcion = $request->descripcion;
        $update->sigla = $request->sigla;
        $update->fk_id_user = $IdUsuario;
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
