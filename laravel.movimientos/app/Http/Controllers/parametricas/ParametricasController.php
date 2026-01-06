<?php

namespace App\Http\Controllers\parametricas;

use App\Http\Controllers\Controller;
use App\Models\Parametrica;
use App\Models\ParametricaDescripcion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametricasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar_parametricas = Parametrica::select('pk_id_parametrica','descripcion','activo')
            ->orderBy('descripcion', 'asc')
            ->where('pk_id_parametrica','!=','1')
            ->where('pk_id_parametrica','!=','2')
            ->get();

        return view('parametricas.parametricas',compact('listar_parametricas'));
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
        /*registrar la libreria Auth*/
        $IdUsuario = Auth::user()->id;
        $new = new Parametrica();
        $new->descripcion = $request->descripcion;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buscar_permiso = Parametrica::select('pk_id_parametrica', 'activo')
            ->where('pk_id_parametrica', '=', $id)
            ->first();
        $activo = $buscar_permiso->activo;

        $IdUsuario = Auth::user()->id;
        if ($activo == '1'){
            $update = Parametrica::find($id);
            $update->activo = '0';
            $update->fk_user = $IdUsuario;
            $update->save();
        } else {
            $update = Parametrica::find($id);
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
