<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\AutorizacionVuelo;
use App\Models\Cliente;
use App\Models\Matricula;
use App\Models\RegistroAdicionSobrevuelo;
use App\Models\RutaDct;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RegistroAdicionSobrevueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aeropuertos = DB::table('aeropuertos')
            ->select('id', 'nombre', 'cd_oaci', 'ciudad')
            ->where('activo', 1)
            ->orderBy('nombre')
            ->get();

        $rutas = DB::table('registro_ruta_dct')
            ->select('id', 'ruta', 'distancia')
            ->where('activo', 1)
            ->orderBy('ruta')
            ->get();

        // Retornar la vista con los registros
        return view('ras.index_adicion_sobrevuelo', compact('aeropuertos', 'rutas'));
    }

    public function getData(Request $request)
    {
        $query = RegistroAdicionSobrevuelo::where('activo', 1);

        // Filtro por fecha
        if ($request->has('fecha') && $request->fecha != '') {
            $query->whereDate('fecha', $request->fecha);
        }

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

                // Si coincide con algún estado textual ("APROBADO", etc.)
                if (isset($estadoMap[$searchUpper])) {
                    $q->orWhere('aprobado', $estadoMap[$searchUpper]);
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

    public function vuelo_autocomplete(Request $request)
    {
        try {
            // Validar el parámetro de entrada 'vuelo'
            $request->validate([
                'vuelo' => 'required|string|min:1'
            ]);

            $vuelo = $request->input('vuelo');
            $codigo = substr($vuelo, 0, 3); // Obtener las tres primeras letras

            // Consulta principal de vuelos
            $resultados = DB::table('vista_ficha_sobrevuelo')
                ->where('vuelo', 'ILIKE', '%' . $vuelo . '%')
                ->whereNotNull('fecha_impresion')
                ->orderByDesc('fecha_impresion')
                ->orderByDesc('id')
                ->limit(100)
                ->get();

            // Consulta adicional al modelo Cliente
            $cliente_bd = Cliente::select('codigo_oaci', 'nombre')
                ->where('activo', 1)
                ->where('codigo_oaci', 'ILIKE', '%' . $codigo . '%')
                ->first();

            $cliente_info = null;

            if ($cliente_bd) {
                $cliente_info = [
                    'codigo' => $cliente_bd->codigo_oaci,
                    'nombre' => $cliente_bd->nombre,
                    'origen' => 'Interno'
                ];
            }

            // Devolver ambos resultados en un solo JSON
            return response()->json([
                'resultados' => $resultados,
                'cliente' => $cliente_info
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Error de base de datos en vuelo_autocomplete', [
                'error' => $e->getMessage(),
                'input' => $request->all()
            ]);
            return response()->json([
                'error' => 'Error en la consulta de la base de datos.',
                'message' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            Log::error('Error general en vuelo_autocomplete', [
                'error' => $e->getMessage(),
                'input' => $request->all()
            ]);
            return response()->json([
                'error' => 'Ocurrió un error inesperado.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function buscar_cliente(Request $request)
    {
        $nombre = $request->query('cliente');

        if (empty($nombre)) {
            return response()->json([]);
        }

        $clientes = [];

        // Consultar API externa
        /* try {
            $response = Http::timeout(5)->get('http://localhost:8000/api/clientes/buscar', [
                'cliente' => $nombre
            ]);

            if ($response->successful()) {
                $clientes_api = $response->json();

                if (is_array($clientes_api)) {
                    foreach ($clientes_api as $cliente) {
                        // Asegúrate que estos campos existan en la respuesta del API
                        $clientes[] = [
                            'codigo' => $cliente['cliente'] ?? null,
                            'nombre' => $cliente['razon_social'] ?? null,
                            'origen' => 'Nemesis'
                        ];
                    }
                } else {
                    Log::error('Formato inesperado en respuesta de API clientes');
                }
            } else {
                Log::error('Error al consultar API clientes: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Excepción al consumir API clientes: ' . $e->getMessage());
        } */

        // Consultar base de datos interna
        $clientes_bd = Cliente::select('codigo_oaci', 'nombre')
            ->where('activo', 1)
            ->where('codigo_oaci', 'ILIKE', '%' . $nombre . '%')
            ->get()
            ->map(function ($cliente) {
                return [
                    'codigo' => $cliente->codigo_oaci,
                    'nombre' => $cliente->nombre,
                    'origen' => 'Interno'
                ];
            })
            ->toArray();

        // Unir resultados de API y BD
        $clientes = array_merge($clientes, $clientes_bd);

        return response()->json($clientes);
    }

    public function buscar_matricula(Request $request)
    {
        $matricula = $request->query('matricula');

        if (empty($matricula)) {
            return response()->json([]);
        }

        $resultado = [];

        // Consultar API externa
        /* try {
            $response = Http::timeout(5)->get('http://localhost:8000/api/clientes/buscar', [
                'matricula' => $matricula
            ]);

            if ($response->successful()) {
                $matriculas_api = $response->json();

                if (is_array($matriculas_api)) {
                    foreach ($matriculas_api as $item) {
                        $resultado[] = [
                            'matricula' => $item['matricula'] ?? null,
                            'modelo' => $item['modelo'] ?? null,
                            'version' => $item['version'] ?? null,
                            'peso_toneladas' => $item['peso'] ?? null,
                            'origen' => 'Nemesis'
                        ];
                    }
                } else {
                    Log::error('Formato inesperado en respuesta de API matriculas');
                }
            } else {
                Log::error('Error al consultar API matriculas: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Excepción al consumir API matriculas: ' . $e->getMessage());
        } */

        // Consultar base de datos local
        $matriculas_bd = Matricula::select('matricula', 'modelo', 'version', 'peso_toneladas')
            ->where('activo', 1)
            ->where('matricula', 'ILIKE', '%' . $matricula . '%')
            ->get()
            ->map(function ($item) {
                return [
                    'matricula' => $item->matricula,
                    'modelo' => $item->modelo,
                    'version' => $item->version,
                    'peso_toneladas' => $item->peso_toneladas,
                    'origen' => 'Interno'
                ];
            })
            ->toArray();

        $resultado = array_merge($resultado, $matriculas_bd);

        return response()->json($resultado);
    }

    public function buscar_autorizacion(Request $request)
    {
        // Validar que venga el parámetro 'id' (cliente)
        $request->validate([
            'clienteId' => 'required|string|min:3'
        ]);

        $cliente = $request->input('clienteId');

        // log::info('Cliente', [$cliente]);

        // Buscar autorizaciones activas del cliente
        $resultados = AutorizacionVuelo::where('cliente', $cliente)
            ->where('activo', 1)
            ->orderByDesc('fecha_autorizacion')
            ->limit(100)
            ->get(['numero_autorizacion', 'fecha_autorizacion']);

        return response()->json([
            'resultados' => $resultados
        ]);
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

        // log::info('REQUEST', [$request->all()]);

        // Ruta DCT
        if ($request->boolean('toggleDCT')) {
            $rutaValor = strtoupper($request->input('ruta'));
            $distanciaValor = $request->input('distancia');

            // Buscar ruta en el modelo RutaDct
            $rutaDct = RutaDct::where('ruta', $rutaValor)->first();

            if (!$rutaDct) {
                // Si no existe, la creamos
                $rutaDct = RutaDct::create([
                    'ruta' => $rutaValor,
                    'distancia' => $distanciaValor,
                    'activo' => 1,
                    'fk_user' => Auth::id(),
                ]);
            }
        }

        $data = [
            'id_proceso_vuelo' => $request->input('id_proceso_vuelo'),
            'fecha' => $request->input('fecha'),
            'razon_social' => $request->input('razon_social'),
            'distancia' => $request->input('distancia'),
            'origen' => $request->input('origen'),
            'destino' => $request->input('destino'),
            'vuelo' => $request->input('vuelo'),
            'responsable' => $request->input('responsable'),
            'cliente' => $request->input('cliente'),
            'matricula' => $request->input('matricula'),
            'modelo' => $request->input('modelo'),
            'version' => $request->input('version'),
            'peso' => $request->input('peso'),
            'origen_oaci' => $request->input('origen_oaci'),
            'destino_oaci' => $request->input('destino_oaci'),
            'control1' => $request->input('control1'),
            'control2' => $request->input('control2'),
            'ruta' => $request->input('ruta'),
            'ruta_vuelo' => $request->input('ruta_vuelo'),
            'primer_punto' => $request->input('primer_punto'),
            'ultimo_punto' => $request->input('ultimo_punto'),
            'autorizacion' => $request->input('autorizacion'),
            'fl_fijo_entrada' => $request->input('fl_fijo_entrada'),
            'fl_fijo_salida' => $request->input('fl_fijo_salida'),
            'fijo1' => $request->input('fijo1'),
            'hora_fijo1' => $request->input('hora_fijo1'),
            'fl_fijo1' => $request->input('fl_fijo1'),
            'fijo2' => $request->input('fijo2'),
            'hora_fijo2' => $request->input('hora_fijo2'),
            'fl_fijo2' => $request->input('fl_fijo2'),
            'fijo3' => $request->input('fijo3'),
            'hora_fijo3' => $request->input('hora_fijo3'),
            'fl_fijo3' => $request->input('fl_fijo3'),
            'observaciones' => $request->input('observacion'),
            'observacion_otro' => $request->input('observacion_otro'),
            'origen_cliente' => $request->input('origen_cliente'),
            'origen_matricula' => $request->input('origen_matricula'),
            'ruta_dct' => $request->boolean('toggleDCT'),
        ];

        try {
            if ($request->filled('registro_id')) {
                $registro = RegistroAdicionSobrevuelo::findOrFail($request->input('registro_id'));

                if ($registro->aprobado == 2) {
                    $registro->aprobado = 3;
                    $registro->leido = 0;
                }

                $registro->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Sobrevuelo actualizado correctamente.'
                ]);
            }

            $data['activo'] = 1;
            $data['fk_user'] = Auth::id();
            $data['aprobado'] = 0;
            $data['leido'] = 0;
            RegistroAdicionSobrevuelo::create($data);

            return response()->json(['status' => 'success', 'message' => 'Sobrevuelo registrado correctamente.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Ocurrió un error al guardar el sobrevuelo.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registro = RegistroAdicionSobrevuelo::findOrFail($id);
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
    public function destroy(string $id) {}

    public function baja(string $id)
    {
        $registro = RegistroAdicionSobrevuelo::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        $registro->activo = 0;
        $registro->save();

        return response()->json(['success' => 'Registro eliminado correctamente.']);
    }
}
