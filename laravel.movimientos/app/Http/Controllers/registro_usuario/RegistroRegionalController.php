<?php

namespace App\Http\Controllers\registro_usuario;

use App\Http\Controllers\Controller;
use App\Models\ParametricaDescripcion;
use App\Models\User;
use App\Models\User_nivel;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class RegistroRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $servicio = new Client([
            'base_uri' => 'http://sarh2.abc.gob.bo/api/servicio_sarhv2?api_key=key_sarhv2_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBB',
            'timeout' => 2.0,
        ]);
        // Eliminando el Array y convirtiendo en RestApi
        $response1 = $servicio->request('GET');
        $response = json_decode($response1->getBody()->getContents());


        $listar_regionales = ParametricaDescripcion::select('pk_id_parametrica_descripcion', 'descripcion', 'nivel')
            ->orderBy('descripcion', 'asc')
            ->where('fk_id_parametrica', '=', '1')
            ->where('activo', '=', '1')
            ->get();

        return view('registro_usuario.registro_regional',compact('listar_regionales','response'));
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
        $email = $request->email;
        if ($email == null) {
            Toastr::error('No se encontro correo, revise datos del usuario desde SARH2', 'Error');
            return redirect()->back();
        } else {

            $response = Http::get('http://sarh2.abc.gob.bo/api/servicio_sarhv2?api_key=key_sarhv2_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBB')->json();
            foreach ($response as $t) {
                if ($t['email'] == $email) {
                    $ci = $t['ci'];
                }
            }

            $buscar_email = User::select('email')
                ->where('email', '=', $email)
                ->first();
            if ($buscar_email == null){
                $email_encontrado = '0';
            } else {
                $email_encontrado= $buscar_email->email;
            }

            if ($email_encontrado == $email) {
                Toastr::error('Ya existe es correo..', 'Error');
                return redirect()->back();
            } else {
                $IdUsuario = Auth::user()->id;
                DB::beginTransaction();
                try {
                    $new = new User();
                    $new->name = $request->name;
                    $new->email = $request->email;
                    $new->nivel = '3';
                    $new->password = Hash::make($ci);
                    $new->remember_token = $request->_token;
                    $new->fk_id_user = $IdUsuario;
                    $new->save();
                    $pk_id = $new->id;

                    $new = new User_nivel();
                    $new->fkp_rol = '3';
                    $new->fkp_regional = $request->fkp_regional;
                    $new->logueado = '1';
                    $new->fk_id_user = $IdUsuario;
                    $new->fk_id_usuario = $pk_id;
                    $new->save();

                    DB::commit();

                    if ($new->save()) {
                        Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
                        return redirect()->back();
                    } else {
                        Toastr::error('Error al guardar datos...', 'Error');
                        return redirect()->back();
                    }
                } catch (\Exception $e) {
                    DB::rollback();
                    Toastr::error('Error al guardar datos...', 'Error');
                    return redirect()->back();
                }
            }
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
