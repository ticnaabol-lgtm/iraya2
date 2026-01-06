<?php

namespace App\Http\Controllers;

use App\Models\Matricula;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Muestra la vista
    public function index()
    {
        return view('matricula.index_matricula');
    }

    // API para DataTables (AJAX)
    public function getData(Request $request)
    {
        $query = Matricula::where('activo', 1);

        // Filtro global (buscador)
        if ($search = $request->input('search.value')) {
            $searchUpper = strtoupper($search);

            $query->where(function ($q) use ($searchUpper) {
                $q->whereRaw('UPPER(matricula) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(fabricante) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(modelo) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(version) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(medida_peso) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw("CAST(peso AS TEXT) LIKE ?", ["%{$searchUpper}%"])
                    ->orWhereRaw("CAST(peso_toneladas AS TEXT) LIKE ?", ["%{$searchUpper}%"]);
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
            'matricula' => 'required|string|max:255',
            'fabricante' => 'nullable|string|max:255',
            'modelo' => 'required|string|max:255',
            'version' => 'required|string|max:255',
            'peso' => 'required|numeric',
            'medida_peso' => 'required|string|in:Kilogramos,Libras,Toneladas',
        ]);

        $peso = $request->input('peso');
        $medida = $request->input('medida_peso');

        // Conversión a toneladas
        switch ($medida) {
            case 'Kilogramos':
                $peso_toneladas = round($peso / 1000, 2);
                break;
            case 'Libras':
                $peso_toneladas = round($peso * 0.000453592, 2);
                break;
            case 'Toneladas':
                $peso_toneladas = round($peso, 2);
                break;
            default:
                $peso_toneladas = null;
        }

        $data = [
            'matricula' => $request->input('matricula'),
            'fabricante' => $request->input('fabricante'),
            'modelo' => $request->input('modelo'),
            'version' => $request->input('version'),
            'peso' => $peso,
            'medida_peso' => $medida,
            'peso_toneladas' => $peso_toneladas,
        ];

        try {
            if ($request->filled('id')) {
                $matricula = Matricula::findOrFail($request->input('id'));
                $matricula->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Matrícula actualizada correctamente.'
                ]);
            }

            $data['activo'] = 1;
            $data['fk_user'] = Auth::id();

            Matricula::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Matrícula registrada correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al guardar la matrícula.',
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
        $registro = Matricula::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        $registro->activo = 0;
        $registro->save();

        return response()->json(['success' => 'Registro eliminado correctamente.']);
    }
}
