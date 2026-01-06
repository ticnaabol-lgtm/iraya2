<?php

namespace App\Http\Controllers\registro_usuario;

use App\Http\Controllers\Controller;
use App\Models\ParametricaDescripcion;
use App\Models\Pp_descripcion_parametrica;
use App\Models\UnidadOrganizacional;
use App\Models\User;
use App\Models\User_nivel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ListadoRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Consulta a la base de datos roles
        $roles = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion', 'rol_nivel')
            ->where('activo', 1)
            ->where('rol_nivel', '!=', 0)
            ->get();

        return view('registro_usuario.listado_roles', compact('roles'));
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
        $request->validate([
            'rol' => 'required|string|max:255',
            'id' => 'nullable|integer'
        ]);

        $isUpdate = $request->filled('id');

        try {
            if ($isUpdate) {
                // 🔁 ACTUALIZACIÓN del nombre del rol
                DB::table('parametrica_descripcions')
                    ->where('pk_id_parametrica_descripcion', $request->id)
                    ->update([
                        'descripcion' => strtoupper($request->rol),
                        'updated_at' => now()
                    ]);
            } else {
                // ➕ INSERCIÓN de nuevo rol
                $ultimoNivel = DB::table('parametrica_descripcions')
                    ->where('rol_nivel', '!=', 0)
                    ->orderBy('rol_nivel', 'desc')
                    ->value('rol_nivel');

                $nuevoNivel = $ultimoNivel ? $ultimoNivel + 1 : 1;

                DB::table('parametrica_descripcions')->insert([
                    'descripcion' => strtoupper($request->rol),
                    'nivel' => 2,
                    'activo' => 1,
                    'fk_id_parametrica' => 2,
                    'rol_nivel' => $nuevoNivel,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

            // Retorno según tipo de petición
            if ($request->ajax()) {
                return response()->json([
                    'message' => $isUpdate ? 'Rol actualizado correctamente' : 'Rol registrado correctamente'
                ]);
            }

            Toastr::success('Los datos se guardaron correctamente.', $isUpdate ? 'Rol Actualizado' : 'Rol Registrado');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error al guardar rol: ' . $e->getMessage());

            if ($request->ajax()) {
                return response()->json([
                    'message' => 'Ocurrió un error al guardar el rol.',
                    'error' => $e->getMessage()
                ], 500);
            }

            Toastr::error('Ocurrió un error al guardar el rol.', 'Error');
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
        $pk_id = $id;
        $listar_roles = ParametricaDescripcion::select('pk_id_parametrica_descripcion', 'descripcion', 'activo', 'fk_id_parametrica')
            ->orderBy('descripcion', 'asc')
            ->where('fk_id_parametrica', '=', '2')
            ->get();

        $listar_niveles = User::from('users as u')
            ->join('user_nivels as n', 'n.fk_id_user', '=', 'u.id')
            ->join('parametrica_descripcions as p1', 'p1.pk_id_parametrica_descripcion', '=', 'n.fkp_rol')
            ->join('parametrica_descripcions as p2', 'p2.pk_id_parametrica_descripcion', '=', 'n.fkp_regional')
            ->select('u.id', 'u.name', 'u.email', 'u.nivel', 'n.logueado', 'n.activo', 'p1.descripcion as rol', 'n.pk_id_user_nivel', 'n.fkp_regional', 'p2.descripcion as regional', 'n.fkp_regional', 'n.fk_id_area')
            ->orderBy('u.name', 'asc')
            ->where('n.fk_id_user', '=', $id)
            ->get();

        $listar_regionales = ParametricaDescripcion::select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('fk_id_parametrica', '=', '1')
            ->where('pk_id_parametrica_descripcion', '<>', '1')
            ->where('pk_id_parametrica_descripcion', '<>', '11')
            ->orderBy('pk_id_parametrica_descripcion', 'asc')
            ->where('activo', '=', '1')
            ->get();


        return view('registro_usuario.listado_roles', compact('listar_niveles', 'listar_roles', 'pk_id', 'listar_regionales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buscar_id = User_nivel::select('activo')
            ->where('pk_id_user_nivel', '=', $id)
            ->first();
        $activo = $buscar_id->activo;

        $IdUsuario = Auth::user()->id;
        if ($activo == 1) {
            $update = User_nivel::find($id);
            $update->logueado = '0';
            $update->activo = '0';
            $update->fk_user = $IdUsuario;
            $update->save();
        } else {
            $update = User_nivel::find($id);
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
        $rol = $request->fkp_rol;
        $fkp_regional = $request->fkp_regional;

        $listar_roles = ParametricaDescripcion::select('pk_id_parametrica_descripcion', 'descripcion', 'nivel', 'activo', 'fk_id_parametrica')
            ->orderBy('descripcion', 'asc')
            ->where('pk_id_parametrica_descripcion', '=', $rol)
            ->first();
        $nivel = $listar_roles->pk_id_parametrica_descripcion;


        if ($rol == '12') {
            $buscar_rol = User_nivel::select('pk_id_user_nivel', 'fkp_rol', 'fkp_regional', 'fk_id_user')
                ->where('fk_id_user', '=', $id)
                ->where('fkp_rol', '=', $rol)
                ->first();
        }
        if ($rol == '13') {
            $buscar_rol = User_nivel::select('pk_id_user_nivel', 'fkp_rol', 'fkp_regional', 'fk_id_user')
                ->where('fk_id_user', '=', $id)
                ->where('fkp_rol', '=', $rol)
                ->where('fkp_regional', '=', $fkp_regional)
                ->first();
        }


        if ($buscar_rol != null) {
            Toastr::error('Ya esta registrado...', 'Error');
            return redirect()->back();
        } else {
            if ($nivel == '12') {
                $new = new User_nivel();
                $new->fkp_rol = $nivel;
                $new->logueado = '0';
                $new->fk_id_user = $id;
                $new->fk_user = $IdUsuario;
                $new->save();
                if ($new->save()) {
                    Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
                    return redirect()->back();
                } else {
                    Toastr::error('Error al guardar datos...', 'Error');
                    return redirect()->back();
                }
            } else {

                if ($fkp_regional == null) {
                    Toastr::error('Seleccione la Regional...', 'Error');
                    return redirect()->back();
                } else {
                    $new = new User_nivel();
                    $new->fkp_rol = $nivel;
                    $new->fkp_regional = $fkp_regional;
                    $new->logueado = '0';
                    $new->fk_id_user = $id;
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
            }
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

    public function baja(string $id)
    {
        try {
            $rol = DB::table('parametrica_descripcions')
                ->where('pk_id_parametrica_descripcion', $id)
                ->first();

            if (!$rol) {
                return response()->json([
                    'message' => 'Rol no encontrado.'
                ], 404);
            }

            DB::table('parametrica_descripcions')
                ->where('pk_id_parametrica_descripcion', $id)
                ->update([
                    'activo' => 0,
                    'updated_at' => now()
                ]);

            return response()->json([
                'success' => 'Rol eliminado correctamente.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error al eliminar rol: ' . $e->getMessage());

            return response()->json([
                'message' => 'Ocurrió un error al intentar eliminar el rol.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
