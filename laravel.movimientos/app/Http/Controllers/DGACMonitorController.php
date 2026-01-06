<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class DGACMonitorController extends Controller
{
    public function index()
    {
        return view('dgac_monitor.index');
    }

    public function amhs_data(Request $request)
    {
        try {
            // Obtener datos de paginación enviados por DataTables
            $start = $request->input('start', 0);
            $length = $request->input('length', 10);

            // Consulta base
            $query = DB::table('fpls')
                ->select(
                    'id',
                    'id_amhs',
                    'created_at',
                    'mensaje',
                    'c1',
                    'c2',
                    'c3',
                    'c5',
                    'c7'
                )
                ->orderBy('created_at', 'desc');

            // Total antes del filtro
            $recordsTotal = $query->count();

            // Clonamos la query para aplicar filtros y paginación por separado
            $filteredQuery = clone $query;

            // Filtro de búsqueda
            $search = strtoupper($request->input('search.value'));
            if (!empty($search)) {
                $filteredQuery->where(function ($q) use ($search) {
                    $q->orWhereRaw('UPPER(c1) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('UPPER(c2) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('UPPER(c3) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('UPPER(c5) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('UPPER(c7) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw('UPPER(mensaje) LIKE ?', ["%{$search}%"])
                        ->orWhereRaw("TO_CHAR(created_at, 'DD/MM HH24:MI') LIKE ?", ["%{$search}%"]);
                });
            }

            // Total después del filtro
            $recordsFiltered = $filteredQuery->count();

            // Obtener solo los registros necesarios con paginación
            $data = $filteredQuery
                ->offset($start)
                ->limit($length)
                ->get();

            // Procesamiento
            $data = $data->map(function ($item) {
                // FECHA
                try {
                    $fecha = Carbon::parse($item->created_at);
                    $item->fecha_formateada = $fecha->format('d/m H:i');
                } catch (\Exception $e) {
                    $item->fecha_formateada = '';
                }

                // VUELO
                $original = $item->c1 ?? '';
                $vuelo = is_string($original) ? preg_replace('/[()\s-]/', ' ', $original) : '';
                $pos = strpos($vuelo, '/');
                $item->vuelo = trim($pos !== false ? substr($vuelo, 0, $pos) : substr($vuelo, 0, 7));

                // TIPO
                $tipo = $item->c3 ?? '';
                if (strpos($tipo, '/') !== false) {
                    $tipo = explode('/', $tipo)[0];
                }
                $item->tipo = substr($tipo, -4);

                // ORIGEN Y DESTINO
                $item->origen = $item->c5 ? substr($item->c5, 0, 4) : '';
                $item->destino = ($item->c7 && strlen($item->c7) >= 4) ? substr($item->c7, 0, 4) : '';

                // EOBT
                $sinSaltoDeLinea = preg_replace('/[^A-Z0-9]/', '', strtoupper($item->c5));
                $item->eobt = substr($sinSaltoDeLinea, 4, 8);

                // REGLA
                $item->regla = ($item->c2 && strlen($item->c2) > 0) ? substr($item->c2, 0, 1) : '';

                return [
                    'id' => $item->id,
                    'id_amhs' => $item->id_amhs ?? '',
                    'fecha_formateada' => $item->fecha_formateada,
                    'vuelo' => $item->vuelo,
                    'tipo' => $item->tipo,
                    'origen' => $item->origen,
                    'destino' => $item->destino,
                    'eobt' => $item->eobt,
                    'regla' => $item->regla,
                    'mensaje' => $item->mensaje
                ];
            });

            return response()->json([
                'draw' => intval($request->input('draw')),
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                'data' => $data,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function ats_data(Request $request)
    {
        // Consulta base directa a arrivos
        $query = DB::table('arrivos')
            ->select('id', 'id_amhs', 'created_at', 'mensaje', 'tipoMensaje');

        // Total sin filtros
        $total = $query->count();

        // Obtener todos los registros ordenados
        $data = $query->orderBy('created_at', 'desc')->get();

        // Filtro global (fecha, mensaje, tipo, vuelo)
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                // Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // Mensaje
                $mensaje = strtoupper($item->mensaje ?? '');

                // Tipo
                $tipo = strtoupper($item->tipoMensaje ?? '');

                // Vuelo extraído
                $vuelo = '';
                $partes = explode('-', $item->mensaje ?? '');
                if (isset($partes[1])) {
                    $vuelo = substr($partes[1], 0, 7);
                    $vuelo = preg_replace('/[^A-Za-z0-9]/', '', $vuelo);
                    $vuelo = strtoupper($vuelo);
                }

                return Str::contains($formato, $search)
                    || Str::contains($mensaje, $search)
                    || Str::contains($tipo, $search)
                    || Str::contains($vuelo, $search);
            })->values();
        }

        // Paginación manual
        $start = $request->input('start', 0);
        $length = $request->input('length', 25);
        $dataPaginated = $data->slice($start, $length)->values();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $data->count(),
            'data' => $dataPaginated,
        ]);
    }

    public function met_data(Request $request)
    {
        // Paso 1: consulta base directa a metars (sin SPECI)
        $query = DB::table('metars')
            ->select('id', 'id_amhs', 'created_at', 'mensaje', 'tipoMensaje')
            ->where('tipoMensaje', '!=', 'SPECI');

        // Paso 2: contar total sin filtros
        $total = $query->count();

        // Paso 3: traer datos ordenados por fecha
        $data = $query->orderBy('created_at', 'desc')->get();

        // Paso 4: filtro global (fecha, tipo, mensaje)
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                // Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // Tipo y mensaje
                $tipo = strtoupper($item->tipoMensaje ?? '');
                $mensaje = strtoupper($item->mensaje ?? '');

                // Filtro real
                return Str::contains($formato, $search)
                    || Str::contains($tipo, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: paginación manual
        $start = $request->input('start', 0);
        $length = $request->input('length', 25);
        $dataPaginated = $data->slice($start, $length)->values();

        // Paso 6: respuesta
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $data->count(),
            'data' => $dataPaginated,
        ]);
    }

    public function speci_data(Request $request)
    {
        // Paso 1: consulta base solo SPECI
        $query = DB::table('metars')
            ->select('id', 'id_amhs', 'created_at', 'mensaje', 'tipoMensaje')
            ->where('tipoMensaje', '=', 'SPECI');

        // Paso 2: contar total sin filtros
        $total = $query->count();

        // Paso 3: obtener datos ordenados
        $data = $query->orderBy('created_at', 'desc')->get();

        // Paso 4: filtro global (fecha, tipo, mensaje)
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                // Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // Tipo y mensaje
                $tipo = strtoupper($item->tipoMensaje ?? '');
                $mensaje = strtoupper($item->mensaje ?? '');

                return Str::contains($formato, $search)
                    || Str::contains($tipo, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: paginación manual
        $start = $request->input('start', 0);
        $length = $request->input('length', 25);
        $dataPaginated = $data->slice($start, $length)->values();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $data->count(),
            'data' => $dataPaginated,
        ]);
    }

    public function ss_data(Request $request)
    {
        // Paso 1: consulta base directa a tabla amhs, filtrando por mensajes que contienen 'SS' en la segunda palabra
        $query = DB::table('amhs')
            ->select('id', 'id_amhs', 'created_at', 'mensaje')
            ->where(DB::raw("SPLIT_PART(amhs.mensaje, ' ', 2)"), 'like', '%SS');

        // Paso 2: contar total sin filtros
        $total = $query->count();

        // Paso 3: traer todos los datos ordenados
        $data = $query->orderBy('created_at', 'desc')->get();

        // Paso 4: aplicar filtro por fecha y mensaje
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                $mensaje = strtoupper($item->mensaje ?? '');

                return Str::contains($formato, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: paginación manual
        $start = $request->input('start', 0);
        $length = $request->input('length', 25);
        $dataPaginated = $data->slice($start, $length)->values();

        // Paso 6: retorno JSON para DataTable
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $data->count(),
            'data' => $dataPaginated,
        ]);
    }

    public function dd_data(Request $request)
    {
        // Paso 1: consulta directa a AMHS, filtrando por DD como segunda palabra
        $query = DB::table('amhs')
            ->select('id', 'id_amhs', 'created_at', 'mensaje')
            ->where(DB::raw("SPLIT_PART(amhs.mensaje, ' ', 2)"), 'like', '%DD');

        // Paso 2: contar total sin filtros
        $total = $query->count();

        // Paso 3: traer datos ordenados por fecha
        $data = $query->orderBy('created_at', 'desc')->get();

        // Paso 4: aplicar filtro global por fecha o contenido del mensaje
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                $mensaje = strtoupper($item->mensaje ?? '');

                return Str::contains($formato, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: paginación manual
        $start = $request->input('start', 0);
        $length = $request->input('length', 25);
        $dataPaginated = $data->slice($start, $length)->values();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $data->count(),
            'data' => $dataPaginated,
        ]);
    }

    public function notam_data(Request $request)
    {
        // Paso 1: consulta base solo a AMHS, con filtro por NOTAM en el mensaje
        $query = DB::table('amhs')
            ->select('id', 'id_amhs', 'created_at', 'mensaje')
            ->where('mensaje', 'like', '%NOTAM%');

        // Paso 2: contar total sin filtros
        $total = $query->count();

        // Paso 3: obtener registros ordenados
        $data = $query->orderBy('created_at', 'desc')->get();

        // Paso 4: aplicar búsqueda global por fecha o mensaje
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                $mensaje = strtoupper($item->mensaje ?? '');

                return Str::contains($formato, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: paginación manual
        $start = $request->input('start', 0);
        $length = $request->input('length', 25);
        $dataPaginated = $data->slice($start, $length)->values();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $total,
            'recordsFiltered' => $data->count(),
            'data' => $dataPaginated,
        ]);
    }
}
