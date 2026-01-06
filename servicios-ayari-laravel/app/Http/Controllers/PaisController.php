<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Obtener solo los países que están activos y ordenarlos por ID en orden descendente
            $paises = Pais::where('activo', 1)->orderBy('geo_code', 'asc')->get();
            return response()->json($paises, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener los países: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener los países'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para crear país: ', $request->all());

        try {
            $data = [
                'geo_code' => $request->input('geo_code'),
                'pais' => $request->input('pais'),
                'activo' => $request->input('activo'),
                'fk_user' => $request->input('fk_user'),
            ];

            $pais = Pais::create($data);

            return response()->json($pais, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el país'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pais = Pais::findOrFail($id);
            return response()->json($pais, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('País no encontrado: ' . $e->getMessage());
            return response()->json(['error' => 'País no encontrado'], 404); // Código de estado 404 Not Found
        } catch (\Exception $e) {
            Log::error('Error al obtener el país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener el país'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para editar país: ', $request->all());

        try {
            $data = [
                'geo_code' => $request->input('geo_code'),
                'pais' => $request->input('pais'),
                'activo' => $request->input('activo'),
                'fk_user' => $request->input('fk_user'),
            ];

            $pais = Pais::findOrFail($id);
            $pais->update($data);

            return response()->json($pais, 200);
        } catch (\Exception $e) {
            Log::error('Error al editar país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al editar el país'], 500);
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
            $pais = Pais::findOrFail($id);
            $pais->update(['activo' => 0]);

            return response()->json(['message' => 'País desactivado correctamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al desactivar país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al desactivar el país'], 500);
        }
    }
}
