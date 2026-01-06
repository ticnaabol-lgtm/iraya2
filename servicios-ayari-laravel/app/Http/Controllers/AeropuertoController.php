<?php

namespace App\Http\Controllers;

use App\Models\Aeropuerto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AeropuertoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // Obtener el parámetro cd_oaci desde la solicitud (si está presente)
            $cd_oaci = $request->input('cd_oaci');

            // Log para verificar el parámetro recibido
            // Log::info('COD OACI recibido: ', [$cd_oaci]);

            // Obtener solo los aeropuertos que están activos y aplicar el filtro si existe cd_oaci
            if ($cd_oaci) {
                // Si existe el parámetro $cd_oaci, filtrar usando el where like
                $query = Aeropuerto::where('activo', 1)
                    ->where('cd_oaci', 'like',  $cd_oaci . '%')
                    ->orderBy('updated_at', 'desc');

                // Log de la consulta SQL y los bindings
                // Log::info('Consulta SQL generada: ' . $query->toSql(), $query->getBindings());

                // Ejecutar la consulta
                $aeropuertos = $query->get();
            } else {
                // Si no existe el parámetro $cd_oaci, solo obtener los aeropuertos activos y ordenarlos
                $query = Aeropuerto::where('activo', 1)
                    ->orderBy('updated_at', 'desc');

                // Log de la consulta SQL sin filtro
                // Log::info('Consulta SQL generada: ' . $query->toSql(), $query->getBindings());

                // Ejecutar la consulta
                $aeropuertos = $query->get();
            }

            // Retornar la respuesta en formato JSON con código de estado 200
            return response()->json($aeropuertos, 200);
        } catch (\Exception $e) {
            // Registrar el error y devolver una respuesta con código de estado 500
            Log::error('Error al obtener los aeropuertos: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener los aeropuertos'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para crear aeropuerto: ', $request->all());

        try {
            $data = [
                'geocode' => $request->input('data.geocode'),
                'nombre' => $request->input('data.nombre'),
                'cd_iata' => $request->input('data.cd_iata'),
                'cd_oaci' => $request->input('data.cd_oaci'),
                'longitud' => $request->input('data.longitud'),
                'latitud' => $request->input('data.latitud'),
                'activo' => $request->input('data.activo'),
                'fk_user' => $request->input('data.fk_user'),
                'categoria' => $request->input('data.categoria'),
                'ciudad' => $request->input('data.ciudad'),
            ];

            $aeropuerto = Aeropuerto::create($data);

            return response()->json($aeropuerto, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear aeropuerto: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el aeropuerto'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $aeropuerto = Aeropuerto::findOrFail($id);
            return response()->json($aeropuerto, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Aeropuerto no encontrado: ' . $e->getMessage());
            return response()->json(['error' => 'Aeropuerto no encontrado'], 404); // Código de estado 404 Not Found
        } catch (\Exception $e) {
            Log::error('Error al obtener el aeropuerto: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener el aeropuerto'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para editar aeropuerto: ', $request->all());

        try {
            $data = [
                'geocode' => $request->input('data.geocode'),
                'nombre' => $request->input('data.nombre'),
                'cd_iata' => $request->input('data.cd_iata'),
                'cd_oaci' => $request->input('data.cd_oaci'),
                'longitud' => $request->input('data.longitud'),
                'latitud' => $request->input('data.latitud'),
                'categoria' => $request->input('data.categoria'),
                'ciudad' => $request->input('data.ciudad'),
            ];

            $aeropuerto = Aeropuerto::findOrFail($id);
            $aeropuerto->update($data);

            return response()->json($aeropuerto, 200);
        } catch (\Exception $e) {
            Log::error('Error al editar aeropuerto: ' . $e->getMessage());
            return response()->json(['error' => 'Error al editar el aeropuerto'], 500);
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
            $aeropuerto = Aeropuerto::findOrFail($id);
            $aeropuerto->update(['activo' => 0]);

            return response()->json(['message' => 'Aeropuerto desactivado correctamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al desactivar aeropuerto: ' . $e->getMessage());
            return response()->json(['error' => 'Error al desactivar el aeropuerto'], 500);
        }
    }
}
