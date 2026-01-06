<?php

namespace App\Http\Controllers;

use App\Models\FichaProgreso;
use App\Models\FichaEstado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FichaProgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Obtener solo las fichas de progreso que están activas y ordenarlas por updated_at en orden descendente
            $fichasProgreso = FichaProgreso::where('activo', 1)->orderBy('updated_at', 'desc')->get();
            return response()->json($fichasProgreso, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener las fichas de progreso: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener las fichas de progreso'], 500); // Código de estado 500 Internal Server Error
        }
    }

    /**
     * Buscar fichas de progreso filtradas por fecha, vuelo, origen, destino y reg.
     */
    public function buscar($fecha, $vuelo, $origen = null, $destino = null, $reg = null)
    {
        // Registrar los datos de la solicitud en el log para verificar
        /* Log::info('Datos recibidos para la búsqueda histórica: ', [
            'fecha' => $fecha,
            'vuelo' => $vuelo,
            'origen' => $origen,
            'destino' => $destino,
            'reg' => $reg,
        ]); */

        try {
            $query = FichaProgreso::query();

            // Aplicar filtros
            $query->where('fecha', $fecha)
                ->where('vuelo', $vuelo);

            if ($origen && $origen !== 'origen_null') {
                $query->where('origen', 'LIKE', "%{$origen}%");
            }

            if ($destino && $destino !== 'destino_null') {
                $query->where('destino', 'LIKE', "%{$destino}%");
            }

            if ($reg && $reg !== 'reg_null') {
                $query->where('reg', 'LIKE', "%{$reg}%");
            }

            // Obtener los resultados filtrados
            $fichasProgreso = $query->where('activo', 1)->orderBy('updated_at', 'desc')->get();

            if ($fichasProgreso->isEmpty()) {
                return response()->json(['message' => 'No se encontraron resultados'], 200); // Código de estado 200 OK con mensaje
            }

            return response()->json($fichasProgreso, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al buscar las fichas de progreso: ' . $e->getMessage());
            return response()->json(['error' => 'Error al buscar las fichas de progreso'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para crear ficha de progreso: ', $request->all());
        // Log::info('Datos recibidos para crear ficha de progreso: ', $request->input('id_amhs'));

        try {
            $data = [
                'id_amhs' => $request->input('id_amhs'),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'vuelo' => $request->input('vuelo'),
                'tipo' => $request->input('tipo'),
                'origen' => $request->input('origen'),
                'destino' => $request->input('destino'),
                'eobt' => $request->input('eobt'),
                'dep' => $request->input('dep'),
                'etd' => $request->input('etd'),
                'reg' => $request->input('reg'),
                'sel' => $request->input('sel'),
                'linea_aerea' => $request->input('linea_aerea'),
                'id_ruta' => $request->input('id_ruta'),
                'atd' => $request->input('atd'),
                'est' => $request->input('est'),
                'nivel' => $request->input('nivel'),
                'sq' => $request->input('sq'),
                'ha' => $request->input('ha'),
                'fpl_json' => $request->input('fpl_json'),
                'estado' => $request->input('estado'),
                'activo' => $request->input('activo'),
                'fk_user' => $request->input('fk_user'),
                'velocidad' => $request->input('velocidad'),
                'mensaje' => $request->input('mensaje'),
                'creado' => 0,
            ];

            $fichaProgreso = FichaProgreso::create($data);

            return response()->json(['id' => $fichaProgreso->id], 201); // Código de estado 201 Created
        } catch (\Exception $e) {
            Log::error('Error al crear ficha de progreso: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear la ficha de progreso'], 500); // Código de estado 500 Internal Server Error
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $fichaProgreso = FichaProgreso::findOrFail($id);
            return response()->json($fichaProgreso, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Ficha de progreso no encontrada: ' . $e->getMessage());
            return response()->json(['error' => 'Ficha de progreso no encontrada'], 404); // Código de estado 404 Not Found
        } catch (\Exception $e) {
            Log::error('Error al obtener la ficha de progreso: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener la ficha de progreso'], 500); // Código de estado 500 Internal Server Error
        }
    }

    public function search_amhs($id_amhs)
    {
        try {
            $fichaProgreso = FichaProgreso::where('id_amhs', $id_amhs)->firstOrFail();

            // Buscar el nombre del estado y el color del estado en el modelo FichaEstado
            $estado = $fichaProgreso->estado;
            $fichaEstado = FichaEstado::where('id', $estado)->first();

            if ($fichaEstado) {
                $fichaProgreso->nombre_estado = $fichaEstado->estado;
                $fichaProgreso->color_estado = $fichaEstado->color_estado;
            } else {
                $fichaProgreso->nombre_estado = 'Estado no encontrado';
                $fichaProgreso->color_estado = '#FFFFFF'; // Color predeterminado cuando no se encuentra el estado
            }

            return response()->json($fichaProgreso, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Ficha de progreso no encontrada: ' . $e->getMessage());
            return response()->json([
                'id' => null,
                'id_amhs' => null,
                'fecha' => null,
                'hora' => null,
                'vuelo' => null,
                'tipo' => null,
                'origen' => null,
                'destino' => null,
                'eobt' => null,
                'dep' => null,
                'etd' => null,
                'reg' => null,
                'sel' => null,
                'linea_aerea' => null,
                'id_ruta' => null,
                'atd' => null,
                'est' => null,
                'nivel' => null,
                'sq' => null,
                'ha' => null,
                'fpl_json' => null,
                'estado' => 5, // Estado 5 cuando no se encuentra la ficha de progreso
                'activo' => null,
                'fk_user' => null,
                'created_at' => null,
                'updated_at' => null,
                'velocidad' => null,
                'mensaje' => null,
                'nombre_estado' => 'Pendiente',
                'color_estado' => '#FF073A' // Color neón rojo para indicar el estado no encontrado
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error al obtener la ficha de progreso: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener la ficha de progreso'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para actualizar ficha de progreso: ', $request->all());

        try {
            // Encontrar la ficha de progreso existente por id_amhs
            $fichaProgreso = FichaProgreso::where('id_amhs', $id)->first();

            if (!$fichaProgreso) {
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException('Ficha de progreso no encontrada');
            }

            // Datos a actualizar
            $data = [
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'vuelo' => $request->input('vuelo'),
                'tipo' => $request->input('tipo'),
                'origen' => $request->input('origen'),
                'destino' => $request->input('destino'),
                'eobt' => $request->input('eobt'),
                'dep' => $request->input('dep'),
                'etd' => $request->input('etd'),
                'reg' => $request->input('reg'),
                'sel' => $request->input('sel'),
                'linea_aerea' => $request->input('linea_aerea'),
                'id_ruta' => $request->input('id_ruta'),
                'atd' => $request->input('atd'),
                'est' => $request->input('est'),
                'nivel' => $request->input('nivel'),
                'sq' => $request->input('sq'),
                'ha' => $request->input('ha'),
                'fpl_json' => $request->input('fpl_json'),
                'estado' => $request->input('estado'),
                'velocidad' => $request->input('velocidad'),
                'mensaje' => $request->input('mensaje'),
            ];

            // Actualizar la ficha de progreso con los nuevos datos
            $fichaProgreso->update($data);

            return response()->json($fichaProgreso, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Ficha de progreso no encontrada: ' . $e->getMessage());
            return response()->json(['error' => 'Ficha de progreso no encontrada'], 404); // Código de estado 404 Not Found
        } catch (\Exception $e) {
            Log::error('Error al actualizar ficha de progreso: ' . $e->getMessage());
            return response()->json(['error' => 'Error al editar la ficha de progreso'], 500); // Código de estado 500 Internal Server Error
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
