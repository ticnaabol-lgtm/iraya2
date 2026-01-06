<?php

namespace App\Http\Controllers;

use App\Models\AutorizacionVuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AutorizacionVueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $paises = DB::table('pais')
            ->select('id', 'geo_code', 'pais')
            ->where('activo', 1)
            ->orderBy('pais')
            ->get();

        // Retornar la vista con los registros
        return view('ras.index_autorizacion_vuelo', compact('paises'));
    }

    // API para DataTables (AJAX)
    public function getData(Request $request)
    {
        $query = AutorizacionVuelo::where('activo', 1)
            ->where('tipo_autorizacion', 'SOBREVUELO');

        // Filtro global (buscador)
        if ($search = $request->input('search.value')) {
            $searchUpper = strtoupper($search);

            $query->where(function ($q) use ($searchUpper) {
                $q->whereRaw('UPPER(numero_autorizacion) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(fecha_autorizacion) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(cliente) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(razon_social) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(tiempo_validez_inicio) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(tiempo_validez_fin) LIKE ?', ["%{$searchUpper}%"]);
            });
        }

        $total = $query->count();

        $data = $query->orderByDesc('id')
            ->skip($request->input('start'))
            ->take($request->input('length'))
            ->get();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data,
        ]);
    }

    public function index_ingreso()
    {
        $paises = DB::table('pais')
            ->select('id', 'geo_code', 'pais')
            ->where('activo', 1)
            ->orderBy('pais')
            ->get();

        $tipo = "ingreso";

        $autorizaciones = AutorizacionVuelo::where('activo', 1)
            ->where('tipo_autorizacion', '!=', 'SOBREVUELO')
            ->orderBy('id', 'desc')
            ->get();

        return view('autorizacion.index_ingreso', compact('paises', 'tipo', 'autorizaciones'));
    }

    public function index_sobrevuelo()
    {

        $paises = DB::table('pais')
            ->select('id', 'geo_code', 'pais')
            ->where('activo', 1)
            ->orderBy('pais')
            ->get();

        $tipo = "sobrevuelo";

        $autorizaciones = AutorizacionVuelo::where('activo', 1)
            ->where('tipo_autorizacion', 'SOBREVUELO')
            ->orderBy('id', 'desc')
            ->get();

        return view('autorizacion.index_sobrevuelo', compact('paises', 'tipo', 'autorizaciones'));
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
        $tipo_array = json_decode($request->input('tipo_array'), true);
        $peso_array = json_decode($request->input('peso_array'), true);
        $matricula_array = json_decode($request->input('matricula_array'), true);

        // Preparar campos resumen
        if (count($tipo_array) === 1 && count($matricula_array) === 1 && count($peso_array) === 1) {
            $tipo_aeronave = $tipo_array[0];
            $matricula = $matricula_array[0];
            $peso = $peso_array[0];
        } else {
            $agrupados_peso = [];
            $separaciones = [];
            $ultimo_peso = null;

            foreach ($peso_array as $i => $peso_val) {
                if ($peso_val !== $ultimo_peso) {
                    $agrupados_peso[] = $peso_val;
                    if ($i > 0) {
                        $separaciones[] = $i;
                    }
                    $ultimo_peso = $peso_val;
                }
            }

            $grupos_matricula = [];
            $inicio = 0;
            foreach ($separaciones as $sep) {
                $grupo = array_slice($matricula_array, $inicio, $sep - $inicio);
                $grupos_matricula[] = implode(', ', $grupo);
                $inicio = $sep;
            }
            $grupo = array_slice($matricula_array, $inicio);
            $grupos_matricula[] = implode(', ', $grupo);

            if (count(array_unique($tipo_array)) === 1) {
                $tipo_aeronave = $tipo_array[0];
            } else {
                $grupos_tipo = [];
                $inicio = 0;
                foreach ($separaciones as $sep) {
                    $grupo = array_slice($tipo_array, $inicio, $sep - $inicio);
                    $grupos_tipo[] = $grupo[0];
                    $inicio = $sep;
                }
                $grupo = array_slice($tipo_array, $inicio);
                $grupos_tipo[] = $grupo[0];
                $tipo_aeronave = implode('/', $grupos_tipo);
            }

            $matricula = implode('/', $grupos_matricula);
            $peso = implode('/', $agrupados_peso);
        }

        try {
            DB::beginTransaction();

            $autorizacionData = [
                'numero_autorizacion' => strtoupper($request->input('numero_autorizacion')),
                'fecha_autorizacion' => $request->input('fecha_autorizacion'),
                'razon_social' => strtoupper($request->input('razon_social')),
                'tipo_aeronave' => $tipo_aeronave,
                'matricula' => $matricula,
                'peso' => $peso,
                'pais' => strtoupper($request->input('pais')),
                'piloto' => strtoupper($request->input('piloto')),
                'tipo_autorizacion' => $request->input('tipo_autorizacion'),
                'medida_peso' => $request->input('medida_peso'),
                'tiempo_validez_inicio' => $request->input('tiempo_validez_inicio'),
                'tiempo_validez_fin' => $request->input('tiempo_validez_fin'),
                'ultimo_aeropuerto' => strtoupper($request->input('ultimo_aeropuerto')),
                'aeropuerto_destino' => strtoupper($request->input('aeropuerto_destino')),
                'aeropuerto_alterno' => strtoupper($request->input('aeropuerto_destino_alterno')),
                'aeropuerto_entrada' => strtoupper($request->input('aeropuerto_entrada')),
                'aeropuerto_entrada_alterno' => strtoupper($request->input('aeropuerto_entrada_alterno')),
                'aeropuerto_salida' => strtoupper($request->input('aeropuerto_salida')),
                'aeropuerto_salida_alterno' => strtoupper($request->input('aeropuerto_salida_alterno')),
                'objeto_vuelo' => strtoupper($request->input('objeto_vuelo')),
                'ruta' => strtoupper($request->input('ruta')),
                'observaciones' => strtoupper($request->input('observaciones')),
                'tipo_array' => json_encode($tipo_array),
                'matricula_array' => json_encode($matricula_array),
                'peso_array' => json_encode($peso_array),
                'fk_user' => Auth::id(),
                'activo' => 1,
            ];

            // CREATE o UPDATE
            if ($request->filled('id')) {
                $autorizacion = AutorizacionVuelo::findOrFail($request->input('id'));
                $autorizacion->update($autorizacionData);
                $mensaje = 'Autorización actualizada correctamente.';
            } else {
                AutorizacionVuelo::create($autorizacionData);
                $mensaje = 'Autorización registrada correctamente.';
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => $mensaje
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al guardar la autorización.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store_sobrevuelo(Request $request)
    {
        $request->validate([
            'razon_social' => 'required|string|max:255',
            'fecha_autorizacion' => 'required|date',
            'numero_autorizacion' => 'required|numeric|min:1|max:9999',
            'gestion_autorizacion' => 'required|numeric|min:2000|max:2100',
            'cliente' => 'required|string|max:10',
            'tipo_aeronave' => 'nullable|string|max:100',
            'nacionalidad' => 'required|string|max:100',
            'peso' => 'nullable|numeric|min:0',
            'medida_peso' => 'nullable|string|max:10',
            'piloto' => 'nullable|string|max:255',
            'ruta' => 'nullable|string|max:255',
            'ultimo_aeropuerto' => 'required|string|max:255',
            'aeropuerto_destino' => 'required|string|max:255',
            'objeto_vuelo' => 'nullable|string|max:255',
            'tiempo_validez_inicio' => 'required|date',
            'tiempo_validez_fin' => 'required|date|after_or_equal:tiempo_validez_inicio',
            'dias_adelanto' => 'required|integer|min:0',
            'observaciones' => 'nullable|string',
        ]);

        try {
            // Componer número de autorización con ceros
            $numero = str_pad($request->input('numero_autorizacion'), 4, '0', STR_PAD_LEFT);
            $gestion = $request->input('gestion_autorizacion');
            $numero_autorizacion = $numero . '/' . $gestion;

            $data = [
                'numero_autorizacion' => $numero_autorizacion,
                'fecha_autorizacion' => $request->input('fecha_autorizacion'),
                'razon_social' => strtoupper($request->input('razon_social')),
                'cliente' => strtoupper($request->input('cliente')),
                'cliente2' => strtoupper($request->input('cliente2')),
                'tipo_aeronave' => strtoupper($request->input('tipo_aeronave')),
                'peso' => $request->input('peso'),
                'nacionalidad' => strtoupper($request->input('nacionalidad')),
                'piloto' => strtoupper($request->input('piloto')),
                'tipo_autorizacion' => 'SOBREVUELO',
                'medida_peso' => $request->input('medida_peso'),
                'tiempo_validez_inicio' => $request->input('tiempo_validez_inicio'),
                'tiempo_validez_fin' => $request->input('tiempo_validez_fin'),
                'dias_adelanto' => $request->input('dias_adelanto'),
                'ultimo_aeropuerto' => strtoupper($request->input('ultimo_aeropuerto')),
                'aeropuerto_destino' => strtoupper($request->input('aeropuerto_destino')),
                'objeto_vuelo' => strtoupper($request->input('objeto_vuelo')),
                'ruta' => strtoupper($request->input('ruta')),
                'observaciones' => strtoupper($request->input('observaciones')),
                'fk_user' => Auth::id(),
                'activo' => 1,
            ];

            if ($request->filled('id')) {
                $autorizacion = AutorizacionVuelo::findOrFail($request->input('id'));
                $autorizacion->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Autorización actualizada correctamente.'
                ]);
            }

            AutorizacionVuelo::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Autorización registrada correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al guardar la autorización.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registro = AutorizacionVuelo::findOrFail($id);
        return response()->json($registro);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function baja(string $id)
    {
        $registro = AutorizacionVuelo::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        $registro->activo = 0;
        $registro->save();

        return response()->json(['success' => 'Registro eliminado correctamente.']);
    }
}
