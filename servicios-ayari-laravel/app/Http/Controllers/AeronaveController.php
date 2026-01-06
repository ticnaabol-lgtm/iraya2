<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aeronave;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AeronaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Obtener solo las aeronaves que están activas y ordenarlas por ID en orden descendente
            $aeronaves = Aeronave::where('activo', 1)->orderBy('id', 'desc')->get();
            return response()->json($aeronaves, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener las aeronaves: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener las aeronaves'], 500); // Código de estado 500 Internal Server Error
        }
    }

    public function index_vista_aeronaves_aerolineas()
    {
        try {
            // Obtener solo las aeronaves que están activas y su aerolinea
            $vista_aeronaves_aerolineas = DB::table('vista_aeronaves_aerolineas')
                ->orderBy('id_aeronave', 'desc')
                ->get(['id_aeronave', 'matricula', 'modelo', 'version', 'fabricante', 'peso', 'id_aerolinea', 'nombre_comercial']);

            return response()->json($vista_aeronaves_aerolineas, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener las aeronaves: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener las aeronaves'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para crear aeronave: ', $request->all());

        try {
            // Preparar los datos para guardar en la base de datos
            $data = [
                'matricula' => $request->input('data.matricula'),
                'modelo' => $request->input('data.modelo'),
                'version' => $request->input('data.version'),
                'fabricante' => $request->input('data.fabricante'),
                'peso' => $request->input('data.peso'),
                'id_aerolinea' => $request->input('data.id_aerolinea'),
                'activo' => $request->input('data.activo'),
                'fk_user' => $request->input('data.fk_user'),
            ];

            // Guardar los datos en la base de datos
            $aeronave = Aeronave::create($data);

            return response()->json($aeronave, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear aeronave: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear la aeronave'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function buscarPorMatricula(string $matricula)
    {
        // Buscar la aeronave por matrícula en la vista vista_aeronaves_aerolineas y seleccionar campos específicos
        $aeronave = DB::table('aeronaves')
            ->where('matricula', $matricula)
            ->first(['id', 'matricula', 'modelo', 'version', 'fabricante', 'peso']);

        // Retornar la respuesta
        if ($aeronave) {
            // Convertir a un array para manipular los campos
            $aeronave = (array) $aeronave;

            // Cambiar el nombre del campo 'nombre_comercial' a 'aerolinea'
/*             $aeronave['aerolinea'] = $aeronave['nombre_comercial'];
            unset($aeronave['nombre_comercial']); */

            return response()->json($aeronave, 200);
        } else {
            return response()->json(['message' => 'Aeronave no encontrada'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $aeronave = Aeronave::findOrFail($id);
            return response()->json($aeronave, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Aeronave no encontrada: ' . $e->getMessage());
            return response()->json(['error' => 'Aeronave no encontrada'], 404); // Código de estado 404 Not Found
        } catch (\Exception $e) {
            Log::error('Error al obtener la aeronave: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener la aeronave'], 500); // Código de estado 500 Internal Server Error
        }
    }

    public function show_vista_aeronaves_aerolineas(string $id)
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
        // Registrar los datos recibidos en el log para verificar
        // Log::info('Datos recibidos para editar aeronave: ', $request->all());

        try {
            $data = [
                'matricula' => $request->input('data.matricula'),
                'modelo' => $request->input('data.modelo'),
                'version' => $request->input('data.version'),
                'fabricante' => $request->input('data.fabricante'),
                'peso' => $request->input('data.peso'),
                'id_aerolinea' => $request->input('data.id_aerolinea'),
            ];

            $aeronave = Aeronave::findOrFail($id);
            $aeronave->update($data);

            return response()->json($aeronave, 200);
        } catch (\Exception $e) {
            Log::error('Error al editar aeronave: ' . $e->getMessage());
            return response()->json(['error' => 'Error al editar la aeronave'], 500);
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
            $aeronave = Aeronave::findOrFail($id);
            $aeronave->update(['activo' => 0]);

            return response()->json(['message' => 'Aeronave desactivada correctamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al desactivar aeronave: ' . $e->getMessage());
            return response()->json(['error' => 'Error al desactivar la aeronave'], 500);
        }
    }
}
