<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Obtener solo las rutas que están activas y ordenarlas por ID en orden descendente
            $rutas = Ruta::where('activo', 1)->orderBy('id', 'desc')->get();
            return response()->json($rutas, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener las rutas: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener las rutas'], 500); // Código de estado 500 Internal Server Error
        }
    }

    public function index_vista_ruta_puntos()
    {
        // Recuperar las filas donde activo es igual a 1
        $rutas = Ruta::where('activo', 1)->get(['id', 'ruta', 'distancia_total']);

        $rutas_array = [];

        // Iterar sobre cada ruta y dividir las cadenas en palabras
        foreach ($rutas as $ruta) {
            $vistaRutaPuntos = DB::table('vista_ruta_puntos')
                ->where('id_ruta', '=', $ruta->id)
                ->orderBy('orden', 'asc') // Ordenar por la columna 'orden' en orden ascendente
                ->get(['id_punto', 'punto', 'distancia', 'orden', 'latitud', 'longitud', 'tramo_inicial', 'tramo_final', 'punto_salida']);

            // Generar la nueva columna de puntos en formato (punto1, punto2, ...)
            $puntos_formateados = "(";
            foreach ($vistaRutaPuntos as $vistaRutaPunto) {
                $puntos_formateados = $puntos_formateados . $vistaRutaPunto->punto . ",";
            }

            $puntos_formateados = rtrim($puntos_formateados, ',');
            $puntos_formateados = $puntos_formateados . ")";

            $rutas_array[] = [
                'id_ruta' => $ruta->id,
                'ruta' => $ruta->ruta,
                'distancia_total' => $ruta->distancia_total,
                'cadena_puntos' => $puntos_formateados,
                'puntos' => $vistaRutaPuntos,
            ];
        }

        // Retornar el array resultante
        return response()->json(['status' => 'OK', 'data' => $rutas_array]);
    }


    public function asdesc_vista_ruta_puntos()
    {
        // Recuperar las filas donde activo es igual a 1
        $rutas = Ruta::where('activo', 1)->get(['id', 'ruta', 'distancia_total']);

        $rutas_array = [];

        // Iterar sobre cada ruta
        foreach ($rutas as $ruta) {
            // Obtener los puntos en orden ascendente
            $vistaRutaPuntosAsc = DB::table('vista_ruta_puntos')
                ->where('id_ruta', '=', $ruta->id)
                ->orderBy('orden', 'asc')
                ->get(['id_punto', 'punto', 'distancia', 'orden', 'latitud', 'longitud', 'tramo_inicial', 'tramo_final', 'punto_salida']);
           
                // Generar la columna de puntos formateados (ascendente)
            $puntos_formateados_asc = "(";
            foreach ($vistaRutaPuntosAsc as $vistaRutaPunto) {
                $puntos_formateados_asc .= $vistaRutaPunto->punto . ",";
            }
            $puntos_formateados_asc = rtrim($puntos_formateados_asc, ',') . ")";
           
            // Agregar la versión ascendente al array de rutas
            $rutas_array[] = [
                'id_ruta' => $ruta->id . "/A",
                'ruta' => $ruta->ruta,
                'distancia_total' => $ruta->distancia_total,
                'cadena_puntos' => 'ASC ' . $puntos_formateados_asc,
                'puntos' => $vistaRutaPuntosAsc,
            ];

            // Obtener los puntos en orden descendente
            $vistaRutaPuntosDesc = DB::table('vista_ruta_puntos')
                ->where('id_ruta', '=', $ruta->id)
                ->orderBy('orden', 'desc')
                ->get(['id_punto', 'punto', 'distancia', 'orden', 'latitud', 'longitud', 'tramo_inicial', 'tramo_final', 'punto_salida']);

            // Generar la columna de puntos formateados (descendente)
            $puntos_formateados_desc = "(";
            foreach ($vistaRutaPuntosDesc as $vistaRutaPunto) {
                $puntos_formateados_desc .= $vistaRutaPunto->punto . ",";
            }
            $puntos_formateados_desc = rtrim($puntos_formateados_desc, ',') . ")";

            // Agregar la versión descendente al array de rutas
            $rutas_array[] = [
                'id_ruta' => $ruta->id . "/D",
                'ruta' => $ruta->ruta,
                'distancia_total' => $ruta->distancia_total,
                'cadena_puntos' => 'DESC ' . $puntos_formateados_desc,
                'puntos' => $vistaRutaPuntosDesc,
            ];
        }

        // Retornar el array resultante con ambas versiones (ascendente y descendente)
        return response()->json(['status' => 'OK', 'data' => $rutas_array]);
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
        // Log::info('Datos recibidos para crear ruta: ', $request->all());

        try {
            $data = [
                'ruta' => $request->input('data.ruta'),
                'distancia_total' => $request->input('data.distancia_total'),
                'espacio_aereo' => $request->input('data.espacio_aereo'),
                'activo' => $request->input('data.activo'),
                'fk_user' => $request->input('data.fk_user'),
            ];

            $ruta = Ruta::create($data);

            return response()->json($ruta, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear ruta: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el ruta'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function show_vista_ruta_punto(string $id)
    {
        // Recuperar la fila donde id es igual al parámetro id y activo es igual a 1
        $ruta = Ruta::where('id', $id)->where('activo', 1)->first(['id', 'ruta', 'distancia_total', 'espacio_aereo']);

        // Verificar si la ruta existe
        if ($ruta) {
            // Obtener los puntos de la vista vista_ruta_puntos
            $vistaRutaPuntos = DB::table('vista_ruta_puntos')
                ->where('id_ruta', '=', $ruta->id)
                ->get(['id_punto', 'punto', 'distancia', 'orden', 'latitud', 'longitud', 'tramo_inicial', 'tramo_final', 'punto_salida']);

            // Crear el array resultante
            $ruta_array = [
                'id_ruta' => $ruta->id,
                'ruta' => $ruta->ruta,
                'distancia_total' => $ruta->distancia_total,
                'puntos' => $vistaRutaPuntos,
            ];

            // Retornar el array resultante
            return response()->json(['status' => 'OK', 'data' => $ruta_array]);
        } else {
            // Retornar un error si la ruta no existe
            return response()->json(['status' => 'Error', 'message' => 'Ruta no encontrada'], 404);
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
        // Log::info('Datos recibidos para editar ruta: ', $request->all());

        try {
            $data = [
                'ruta' => $request->input('data.ruta'),
                'distancia_total' => $request->input('data.distancia_total'),
                'espacio_aereo' => $request->input('data.espacio_aereo'),
            ];

            $ruta = Ruta::findOrFail($id);
            $ruta->update($data);

            return response()->json($ruta, 200);
        } catch (\Exception $e) {
            Log::error('Error al editar ruta: ' . $e->getMessage());
            return response()->json(['error' => 'Error al editar ruta'], 500);
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
            $ruta = Ruta::findOrFail($id);
            $ruta->update(['activo' => 0]);

            return response()->json(['message' => 'Ruta desactivado correctamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al desactivar ruta: ' . $e->getMessage());
            return response()->json(['error' => 'Error al desactivar el ruta'], 500);
        }
    }
}
