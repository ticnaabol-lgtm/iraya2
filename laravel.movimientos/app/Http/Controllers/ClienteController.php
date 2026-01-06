<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $paises = DB::table('pais')
            ->select('id', 'geo_code', 'pais')
            ->where('activo', 1)
            ->orderBy('pais')
            ->get();

        return view('cliente.index_cliente', compact('paises'));
    }

    // API para DataTables (AJAX)
    public function getData(Request $request)
    {
        $query = Cliente::where('activo', 1);

        // Filtro global (buscador)
        if ($search = $request->input('search.value')) {
            $searchUpper = strtoupper($search);

            $query->where(function ($q) use ($searchUpper) {
                $q->whereRaw('UPPER(codigo_oaci) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw("CAST(codigo_contable AS TEXT) LIKE ?", ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(nombre) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(telefono) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(email) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(pais) LIKE ?', ["%{$searchUpper}%"]);
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
            'codigo_oaci' => 'required|string|max:4',
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'fax' => 'nullable|string|max:50',
            'casilla' => 'nullable|string|max:50',
            'email' => 'required|email|max:255',
            'representante' => 'nullable|string|max:255',
            'pais' => 'required|string|max:100',
            'ciudad' => 'nullable|string|max:100',
            'nit' => 'nullable|string|max:50',
        ]);

        try {
            if ($request->filled('id')) {
                // Solo actualiza los campos permitidos (sin tocar codigo_contable)
                $data = [
                    'codigo_oaci' => strtoupper($request->input('codigo_oaci')),
                    'nombre' => strtoupper($request->input('nombre')),
                    'direccion' => strtoupper($request->input('direccion')),
                    'telefono' => $request->input('telefono'),
                    'fax' => $request->input('fax') ?: null,
                    'casilla' => $request->input('casilla') ?: null,
                    'email' => $request->input('email'),
                    'representante' => strtoupper($request->input('representante') ?: ''),
                    'pais' => $request->input('pais'),
                    'ciudad' => strtoupper($request->input('ciudad') ?: ''),
                    'nit' => $request->input('nit'),
                ];

                $cliente = Cliente::findOrFail($request->input('id'));
                $cliente->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Cliente actualizado correctamente.'
                ]);
            }

            // Nuevo cliente: generar código contable automáticamente
            $ultimoCodigo = Cliente::max('codigo_contable');
            $nuevoCodigo = $ultimoCodigo ? intval($ultimoCodigo) + 1 : 1;

            $data = [
                'codigo_oaci' => strtoupper($request->input('codigo_oaci')),
                'codigo_contable' => str_pad($nuevoCodigo, 5, '0', STR_PAD_LEFT), // por ejemplo: 00001
                'nombre' => strtoupper($request->input('nombre')),
                'direccion' => strtoupper($request->input('direccion')),
                'telefono' => $request->input('telefono'),
                'fax' => $request->input('fax') ?: null,
                'casilla' => $request->input('casilla') ?: null,
                'email' => $request->input('email'),
                'representante' => strtoupper($request->input('representante') ?: ''),
                'pais' => $request->input('pais'),
                'ciudad' => strtoupper($request->input('ciudad') ?: ''),
                'nit' => $request->input('nit'),
                'activo' => 1,
                'fk_user' => Auth::id(),
            ];

            Cliente::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Cliente registrado correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocurrió un error al guardar el cliente.',
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
        $registro = Cliente::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        $registro->activo = 0;
        $registro->save();

        return response()->json(['success' => 'Registro eliminado correctamente.']);
    }
}
