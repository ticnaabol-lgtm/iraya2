<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaNeoPlanVuelo;
use App\Models\FichaProgreso;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class FichaNeoPlanVueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Obtener solo los planes de vuelo que están activos y ordenarlos por ID en orden descendente
            $planes = FichaNeoPlanVuelo::where('activo', 1)->orderBy('id', 'desc')->get();
            return response()->json($planes, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener los planes de vuelo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener los planes de vuelo'], 500); // Código de estado 500 Internal Server Error
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Registrar los datos recibidos en el log para verificar
        // Log::info('Datos recibidos para crear plan de vuelo: ', $request->all());

        try {
            // Preparar los datos para guardar en la base de datos
            $data = [
                'vuelo' => $request->input('vuelo'),
                'tipo' => $request->input('tipo'),
                'dep' => $request->input('dep'),
                'etd' => $request->input('etd'),
                'dest' => $request->input('dest'),
                'reg' => $request->input('reg'),
                'sel' => $request->input('sel'),
                'dta' => $request->input('dta'),
                'regla_tipo' => $request->input('regla_tipo'),
                'equipo' => $request->input('equipo'),
                'eet' => $request->input('eet'),
                'opr' => $request->input('opr'),
                'turbulencia' => $request->input('turbulencia'),
                'aeronaves' => $request->input('aeronaves'),
                'aed_alternos' => $request->input('aed_alternos'),
                'dep_alt' => $request->input('dep_alt'),
                'dest_alt' => $request->input('dest_alt'),
                'ralt' => $request->input('ralt'),
                'dof' => $request->input('dof'),
                'nav' => $request->input('nav'),
                'eet_alt' => $request->input('eet_alt'),
                'rmk' => $request->input('rmk'),
                'rif' => $request->input('rif'),
                'sts' => $request->input('sts'),
                'typ' => $request->input('typ'),
                'per' => $request->input('per'),
                'com' => $request->input('com'),
                'dat' => $request->input('dat'),
                'altn' => $request->input('altn'),
                'code' => $request->input('code'),
                'rvr' => $request->input('rvr'),
                'activo' => 1,
                'fk_user' => $request->input('fk_user'),
                'velocidad' => $request->input('velocidad'),
                'fecha_hora' => $request->input('fecha_hora'),
            ];

            // Guardar los datos en la base de datos
            $plan = FichaNeoPlanVuelo::create($data);

            /* // Recuperar el id del registro recién creado
            $id_plan_vuelo = $plan->id; */

            // Crear el mensaje AMHS
            /* $mensaje_amhs = "(FPL-{$data['vuelo']}-IS\n";
            $mensaje_amhs .= "-{$data['tipo']}/M-{$data['turbulencia']}{$data['nav']}/{$data['regla_tipo']}\n";
            $mensaje_amhs .= "-{$data['dep']} {$data['etd']} {$data['eet']}\n";
            $mensaje_amhs .= "-N{$data['velocidad']} {$data['equipo']} {$data['aeronaves']}\n";
            $mensaje_amhs .= "-{$data['dest']}{$data['eet']} {$data['dep_alt']} {$data['dest_alt']}\n";
            $mensaje_amhs .= "-PBN/{$data['per']} NAV/{$data['nav']} REG/{$data['reg']} SEL/{$data['sel']} OPR/{$data['opr']} PER/{$data['per']}\n";
            $mensaje_amhs .= "-DOF/{$data['dof']} EET/{$data['eet_alt']} RMK/{$data['rmk']} RIF/{$data['rif']} STS/{$data['sts']} TYP/{$data['typ']}\n ";
            $mensaje_amhs .= "-COM/{$data['com']} DAT/{$data['dat']} ALTN/{$data['altn']} CODE/{$data['code']} RVR/{$data['rvr']}\n";
            $mensaje_amhs .= "-AED/{$data['aed_alternos']} DTA/{$data['dta']})\n";

            $data_amhs = [
                'id_amhs' => $id_plan_vuelo,
                'fecha' => Carbon::now()->toDateString(),
                'hora' => Carbon::now()->toTimeString(),
                'vuelo' => $request->input('vuelo'),
                'tipo' =>  $request->input('tipo'),
                'origen' => $request->input('dep'),
                'destino' => $request->input('dest'),
                'eobt' => $request->input('etd'),
                'dep' => '',
                'etd' => '',
                'reg' => '',
                'sel' => '',
                'linea_aerea' => $request->input('opr'),
                'id_ruta' => 0,
                'atd' => '',
                'est' => '',
                'nivel' => '',
                'sq' => '',
                'ha' => '',
                'fpl_json' => '',
                'estado' => 6,
                'activo' => 1,
                'fk_user' => 1,
                'id_ruta' => 0,
                'velocidad' => $request->input('velocidad'),
                'mensaje' => $mensaje_amhs,
                'creado' => 1,
            ];

            $fichaProgreso = FichaProgreso::create($data_amhs); */

            return response()->json(['plan' => $plan], 201);
        } catch (\Exception $e) {
            Log::error('Error al crear plan de vuelo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el plan de vuelo'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $plan = FichaNeoPlanVuelo::findOrFail($id);
            return response()->json($plan, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Plan de vuelo no encontrado: ' . $e->getMessage());
            return response()->json(['error' => 'Plan de vuelo no encontrado'], 404); // Código de estado 404 Not Found
        } catch (\Exception $e) {
            Log::error('Error al obtener el plan de vuelo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener el plan de vuelo'], 500); // Código de estado 500 Internal Server Error
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Registrar los datos recibidos en el log para verificar
        // Log::info('Datos recibidos para editar plan de vuelo: ', $request->all());

        try {
            $data = [
                'vuelo' => $request->input('data.vuelo'),
                'tipo' => $request->input('data.tipo'),
                'dep' => $request->input('data.dep'),
                'etd' => $request->input('data.etd'),
                'dest' => $request->input('data.dest'),
                'reg' => $request->input('data.reg'),
                'sel' => $request->input('data.sel'),
                'dta' => $request->input('data.dta'),
                'regla_tipo' => $request->input('data.regla_tipo'),
                'equipo' => $request->input('data.equipo'),
                'eet' => $request->input('data.eet'),
                'opr' => $request->input('data.opr'),
                'turbulencia' => $request->input('data.turbulencia'),
                'aeronaves' => $request->input('data.aeronaves'),
                'aed_alternos' => $request->input('data.aed_alternos'),
                'dep_alt' => $request->input('data.dep_alt'),
                'dest_alt' => $request->input('data.dest_alt'),
                'ralt' => $request->input('data.ralt'),
                'dof' => $request->input('data.dof'),
                'nav' => $request->input('data.nav'),
                'eet_alt' => $request->input('data.eet_alt'),
                'rmk' => $request->input('data.rmk'),
                'rif' => $request->input('data.rif'),
                'sts' => $request->input('data.sts'),
                'typ' => $request->input('data.typ'),
                'per' => $request->input('data.per'),
                'com' => $request->input('data.com'),
                'dat' => $request->input('data.dat'),
                'altn' => $request->input('data.altn'),
                'code' => $request->input('data.code'),
                'rvr' => $request->input('data.rvr'),
                'velocidad' => $request->input('data.velocidad'),
                'fecha_hora' => $request->input('data.fecha_hora'),
            ];

            $plan = FichaNeoPlanVuelo::findOrFail($id);
            $plan->update($data);

            return response()->json($plan, 200);
        } catch (\Exception $e) {
            Log::error('Error al editar plan de vuelo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al editar el plan de vuelo'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id)
    {
        try {
            $plan = FichaNeoPlanVuelo::findOrFail($id);
            $plan->update(['activo' => 0]);

            return response()->json(['message' => 'Plan de vuelo desactivado correctamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al desactivar plan de vuelo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al desactivar el plan de vuelo'], 500);
        }
    }
}
