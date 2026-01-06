<?php

namespace App\Http\Controllers\registro_usuario;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ResetearContrasenaController extends Controller
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
        //
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
        $IdUsuario = Auth::user()->id;

        $buscar_id = User::select('activo','email')
            ->where('id', '=', $id)
            ->first();
        $activo = $buscar_id->activo;
        $email = $buscar_id->email;

        $servicio = new Client([
            'base_uri' => 'http://sarh2.abc.gob.bo/api/servicio_sarhv2?api_key=key_sarhv2_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBB',
            'timeout' => 4.0,
        ]);

        $response1 = $servicio->request('GET');
        $listado_usuarios = json_decode($response1->getBody()->getContents());

        foreach ($listado_usuarios as $l) {
            if ($l->email == $email) {
                $ci = $l->ci;
            }
        }

        $update = User::find($id);
        $update->password = Hash::make($ci);
        $update->remember_token = $request->_token;
        $update->fk_user = $IdUsuario;
        $update->save();

        if ($update->save()) {
            Toastr::success('Los datos se actualizaron correctamente', 'Datos Actualizados');
            return redirect()->back();
        } else {
            Toastr::error('Error al guardar datos...', 'Error');
            return redirect()->back();
        }
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
