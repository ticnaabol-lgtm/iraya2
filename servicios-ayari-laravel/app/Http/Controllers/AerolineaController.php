<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aerolinea;
use Illuminate\Support\Facades\Log;

class AerolineaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Obtener solo las aerolíneas que están activas y ordenarlas por ID en orden descendente
            $aerolineas = Aerolinea::where('activo', 1)->orderBy('id', 'desc')->get();
            return response()->json($aerolineas, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener las aerolíneas: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener las aerolíneas'], 500); // Código de estado 500 Internal Server Error
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
        //Log::info('Datos recibidos para crear aerolínea: ', $request->all());

        try {
            // Preparar los datos para guardar en la base de datos
            $data = [
                'codigo' => $request->input('data.codigo'),
                'cod_oaci' => $request->input('data.cod_oaci'),
                'cod_cont' => $request->input('data.cod_cont'),
                'nombre_comercial' => $request->input('data.nombre_comercial'),
                'razon_social' => $request->input('data.razon_social'),
                'pais' => $request->input('data.pais'),
                'telefono' => $request->input('data.telefono'),
                'email' => $request->input('data.email'),
                'nit' => $request->input('data.nit'),
                'direccion' => $request->input('data.direccion'),
                'activo' => $request->input('data.activo'),
                'fk_user' => $request->input('data.fk_user'),
            ];

            // Guardar los datos en la base de datos
            $aerolinea = Aerolinea::create($data);

            return response()->json($aerolinea, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear aerolínea: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear la aerolínea'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $aerolinea = Aerolinea::findOrFail($id);
            return response()->json($aerolinea, 200); // Código de estado 200 OK
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Aerolínea no encontrada: ' . $e->getMessage());
            return response()->json(['error' => 'Aerolínea no encontrada'], 404); // Código de estado 404 Not Found
        } catch (\Exception $e) {
            Log::error('Error al obtener la aerolínea: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener la aerolínea'], 500); // Código de estado 500 Internal Server Error
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
        // Log::info('Datos recibidos para editar aerolínea: ', $request->all());

        try {
            $data = [
                'codigo' => $request->input('data.codigo'),
                'cod_oaci' => $request->input('data.cod_oaci'),
                'cod_cont' => $request->input('data.cod_cont'),
                'nombre_comercial' => $request->input('data.nombre_comercial'),
                'razon_social' => $request->input('data.razon_social'),
                'pais' => $request->input('data.pais'),
                'telefono' => $request->input('data.telefono'),
                'email' => $request->input('data.email'),
                'nit' => $request->input('data.nit'),
                'direccion' => $request->input('data.direccion'),
            ];

            $aerolinea = Aerolinea::findOrFail($id);
            $aerolinea->update($data);

            return response()->json($aerolinea, 200);
        } catch (\Exception $e) {
            Log::error('Error al editar aerolínea: ' . $e->getMessage());
            return response()->json(['error' => 'Error al editar la aerolínea'], 500);
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
            $aerolinea = Aerolinea::findOrFail($id);
            $aerolinea->update(['activo' => 0]);

            return response()->json(['message' => 'Aerolínea desactivada correctamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al desactivar aerolínea: ' . $e->getMessage());
            return response()->json(['error' => 'Error al desactivar la aerolínea'], 500);
        }
    }
}
