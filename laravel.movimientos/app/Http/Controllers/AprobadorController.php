<?php

namespace App\Http\Controllers;

use App\Models\RegistroAdicionSobrevuelo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AprobadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_sobrevuelo()
    {

        // Obtener todos los registros activos
        $registros = RegistroAdicionSobrevuelo::where('activo', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('aprobador.index_sobrevuelo', compact('registros'));
    }

    public function getData(Request $request)
    {
        $query = RegistroAdicionSobrevuelo::where('activo', 1);

        // Filtro global (buscador)
        if ($search = $request->input('search.value')) {
            $searchUpper = strtoupper($search);

            // Mapeo de texto de estado a su valor numérico
            $estadoMap = [
                'APROBADO' => 1,
                'RECHAZADO' => 2,
                'CORREGIDO' => 3,
                'PENDIENTE' => 0
            ];

            $query->where(function ($q) use ($searchUpper, $estadoMap) {
                $q->whereRaw('TO_CHAR(fecha, \'YYYY-MM-DD\') LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(cliente) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(matricula) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(vuelo) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(origen_oaci) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(destino_oaci) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(texto_rechazo) LIKE ?', ["%{$searchUpper}%"]);

                // Si el texto buscado coincide con algún estado conocido, agrega filtro por estado
                if (isset($estadoMap[$searchUpper])) {
                    $q->orWhere('estado', $estadoMap[$searchUpper]);
                }
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

    public function aprobar_sobrevuelo($id)
    {
        try {
            $sobrevuelo = RegistroAdicionSobrevuelo::findOrFail($id);

            // Verifica si ya está aprobado
            if ($sobrevuelo->aprobado == 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Este sobrevuelo ya fue aprobado anteriormente.'
                ], 200);
            }

            $sobrevuelo->aprobado = 1;
            $sobrevuelo->leido = 0;
            $sobrevuelo->save();

            return response()->json([
                'success' => true,
                'message' => 'Sobrevuelo aprobado correctamente.'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'El registro no fue encontrado.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al aprobar el sobrevuelo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function aprobar_sobrevuelos(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return response()->json([
                'success' => false,
                'message' => 'No se proporcionaron IDs para aprobar.'
            ], 400);
        }

        $aprobados = 0;
        $ya_aprobados = 0;
        $errores = [];

        foreach ($ids as $id) {
            try {
                $sobrevuelo = RegistroAdicionSobrevuelo::findOrFail($id);

                if ($sobrevuelo->aprobado == 1) {
                    $ya_aprobados++;
                    continue;
                }

                $sobrevuelo->aprobado = 1;
                $sobrevuelo->leido = 0;
                $sobrevuelo->save();
                $aprobados++;
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                $errores[] = "ID $id no encontrado.";
            } catch (\Exception $e) {
                $errores[] = "Error con ID $id: " . $e->getMessage();
            }
        }

        return response()->json([
            'success' => true,
            'message' => "$aprobados sobrevuelos aprobados correctamente. $ya_aprobados ya estaban aprobados.",
            'errores' => $errores,
        ]);
    }

    public function rechazar_sobrevuelo(Request $request)
    {

        Log::info('Rechazo recibido', $request->all());

        try {
            /* $request->validate([
                'registro_id' => 'required|integer|exists:registro_adicion_sobrevuelos,id',
                'motivo' => 'required|string|max:500'
            ]); */

            $id = $request->input('registro_id');
            Log::info('Rechazo recibido', $request->all());

            $sobrevuelo = RegistroAdicionSobrevuelo::findOrFail($id);
            $sobrevuelo->aprobado = 2; // Estado rechazado
            $sobrevuelo->texto_rechazo = $request->motivo;
            $sobrevuelo->leido = 0;
            $sobrevuelo->save();

            return response()->json([
                'success' => true,
                'message' => 'Sobrevuelo rechazado correctamente.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error al rechazar sobrevuelo', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar el rechazo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function leidos_sobrevuelo(Request $request)
    {
        $id = $request->input('id'); // Cambiamos a 'id' individual
        //Log::info('ID recibido:', ['id' => $id]);

        if ($id) {
            $registro = RegistroAdicionSobrevuelo::find($id);

            if ($registro) {
                $registro->leido = 1;
                $registro->updated_at = now();
                $registro->save();

                return response()->json(['message' => 'Registro marcado como leído.']);
            }

            return response()->json(['message' => 'Registro no encontrado.'], 404);
        }

        return response()->json(['message' => 'No se proporcionó un ID válido.'], 400);
    }

    public function leidos_all(Request $request)
    {
        $ids = $request->input('ids'); // Espera un array de IDs

        if (!is_array($ids) || empty($ids)) {
            return response()->json(['message' => 'No se proporcionaron IDs válidos.'], 400);
        }

        foreach ($ids as $id) {
            $registro = RegistroAdicionSobrevuelo::find($id);

            if ($registro) {
                $registro->leido = 1;
                $registro->updated_at = now();
                $registro->save();
            }
        }

        return response()->json(['message' => 'Todos los registros fueron marcados como leídos.']);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
