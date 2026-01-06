<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RutaDct;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ruta.index_ruta');
    }

    // API para DataTables (AJAX)
    public function getData(Request $request)
    {
        $query = RutaDct::where('activo', 1);

        // Filtro global (buscador)
        if ($search = $request->input('search.value')) {
            $searchUpper = strtoupper($search);

            $query->where(function ($q) use ($search, $searchUpper) {
                $q->whereRaw('UPPER(ruta) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw("CAST(distancia AS TEXT) LIKE ?", ["%{$searchUpper}%"]);
            });
        }

        $total = $query->count();

        $data = $query->orderBy('id', 'desc')
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
        $request->validate([
            'ruta' => 'required|string|max:255',
            'distancia' => 'required|integer',
        ]);

        $data = [
            'ruta' => strtoupper($request->input('ruta')),
            'distancia' => $request->input('distancia'),
        ];

        try {
            if ($request->filled('id')) {
                $aeropuerto = RutaDct::findOrFail($request->input('id'));
                $aeropuerto->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Ruta DCT actualizada correctamente.'
                ]);
            }

            $data['activo'] = 1;
            $data['fk_user'] = Auth::id();

            RutaDct::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Ruta DCT registrada correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al guardar la ruta DCT.',
                'error' => $e->getMessage()
            ], 500);
        }
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

    public function baja(string $id)
    {
        $registro = RutaDct::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        $registro->activo = 0;
        $registro->save();

        return response()->json(['success' => 'Registro eliminado correctamente.']);
    }
}
