<?php

namespace App\Http\Controllers\registro_usuario;

use App\Http\Controllers\Controller;
use App\Models\ParametricaDescripcion;
use App\Models\Pp_descripcion_parametrica;
use App\Models\User;
use App\Models\User_nivel;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class RegistroController extends Controller
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

        return view('registro_usuario.registro', compact('tipo_ficha', 'oaci', 'roles'));
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
        $isUpdate = $request->filled('id');
        $userId = $request->input('id');

        // Validación
        $request->validate([
            'usuario' => 'nullable|string|max:255',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                $isUpdate
                    ? Rule::unique('users', 'email')->ignore($userId)
                    : Rule::unique('users', 'email')
            ],
            'password' => $isUpdate ? 'nullable|string|min:6' : 'required|string|min:6',
            'rol' => 'required|integer',
            'tipo_ficha' => 'nullable',
            'oaci' => 'nullable',
        ]);

        DB::beginTransaction();

        try {
            // Crear o actualizar usuario
            if ($isUpdate) {
                $user = User::findOrFail($userId);
                $user->name = $request->input('usuario');
                $user->email = $request->input('email');
                $user->nivel = $request->input('rol');
                $user->fk_user = Auth::id();
                $user->activo = 1;

                if ($request->filled('password')) {
                    $user->password = Hash::make($request->input('password'));
                }

                $user->save();
            } else {
                $user = User::create([
                    'name' => $request->input('usuario'),
                    'email' => $request->input('email'),
                    'nivel' => $request->input('rol'),
                    'password' => Hash::make($request->input('password')),
                    'fk_user' => Auth::id(),
                    'activo' => 1,
                ]);
            }

            // Si el rol es 13, actualizar o crear en user_tips
            if ((int)$request->input('rol') === 13) {
                DB::table('user_tips')->updateOrInsert(
                    ['pk_id_user' => $user->id],
                    [
                        'pk_id_tipo_ficha' => $request->input('tipo_ficha'),
                        'pk_oaci' => $request->input('oaci'),
                        'fk_user' => Auth::id(),
                        'activo' => 1,
                        'updated_at' => now(),
                        'created_at' => now(), // Se ignora si ya existe
                    ]
                );
            } else {
                // Elimina si existe entrada previa en user_tips
                DB::table('user_tips')->where('pk_id_user', $user->id)->delete();
            }

            DB::commit();

            // Si se usa con AJAX
            if ($request->ajax()) {
                return response()->json([
                    'message' => $isUpdate ? 'Usuario actualizado correctamente' : 'Usuario registrado correctamente'
                ]);
            }

            // Normal
            Toastr::success('Los datos se guardaron correctamente.', $isUpdate ? 'Usuario Actualizado' : 'Usuario Registrado');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            if ($request->ajax()) {
                return response()->json(['message' => 'Error interno: ' . $e->getMessage()], 500);
            }

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

    public function baja(string $id)
    {
        $registro = User::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        DB::beginTransaction();

        try {
            // Desactivar el usuario
            $registro->activo = 0;
            $registro->save();

            // Si el usuario tiene nivel 13, desactivar también en user_tips
            if ((int) $registro->nivel === 13) {
                DB::table('user_tips')
                    ->where('pk_id_user', $registro->id)
                    ->update(['activo' => 0, 'updated_at' => now()]);
            }

            DB::commit();
            return response()->json(['success' => 'Registro eliminado correctamente.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error al eliminar el registro.'], 500);
        }
    }
}
