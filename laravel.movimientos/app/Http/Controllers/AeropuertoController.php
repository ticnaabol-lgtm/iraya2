<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Aeropuerto;

class AeropuertoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aeropuerto.index_aeropuerto');
    }

    // API para DataTables (AJAX)
    public function getData(Request $request)
    {
        $query = Aeropuerto::where('activo', 1);

        // Filtro global (buscador)
        if ($search = $request->input('search.value')) {
            $searchUpper = strtoupper($search);

            $query->where(function ($q) use ($search, $searchUpper) {
                $q->whereRaw('UPPER(nombre) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(cd_oaci) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(ciudad) LIKE ?', ["%{$searchUpper}%"]);

                // Si el valor ingresado es numérico, aplica búsqueda exacta a campos numéricos
                if (is_numeric($search)) {
                    $q->orWhere('categoria', $search);
                }
            });
        }

        $total = $query->count();

        $data = $query->orderBy('updated_at', 'desc')
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
            'nombre' => 'required|string|max:255',
            'cd_oaci' => 'required|string|max:4',
            'categoria' => 'nullable|integer|between:1,4',
            'ciudad' => 'nullable|string|max:100',
        ]);

        $data = [
            'nombre' => strtoupper($request->input('nombre')),
            'cd_oaci' => strtoupper($request->input('cd_oaci')),
            'categoria' => $request->input('categoria'),
            'ciudad' => strtoupper($request->input('ciudad')),
        ];

        try {
            if ($request->filled('id')) {
                $aeropuerto = Aeropuerto::findOrFail($request->input('id'));
                $aeropuerto->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Aeropuerto actualizado correctamente.'
                ]);
            }

            $data['activo'] = 1;
            $data['fk_user'] = Auth::id();

            Aeropuerto::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Aeropuerto registrado correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al guardar el aeropuerto.',
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
        $registro = Aeropuerto::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        $registro->activo = 0;
        $registro->save();

        return response()->json(['success' => 'Registro eliminado correctamente.']);
    }
}
