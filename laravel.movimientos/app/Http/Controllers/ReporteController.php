<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResumenCantidadExport;
use App\Exports\Formulario002Export;
use App\Exports\PorFechaExport;
use App\Exports\RvsmExport;

class ReporteController extends Controller
{
    public function resumen_cantidad()
    {
        return view('reporte.resumen_cantidad');
    }

    public function resumen_cantidad_pdf(Request $request)
    {
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');
        $estado = $request->query('estado');

        // Validación básica
        if (!$desde || !$hasta || !in_array($estado, ['revisados', 'pendientes'])) {
            abort(400, 'Parámetros inválidos');
        }

        // Formatear fechas
        $desdeSQL = Carbon::parse($desde)->startOfDay()->toDateString();
        $hastaSQL = Carbon::parse($hasta)->endOfDay()->toDateString();

        // Definir condición por estado
        $valorAprobado = $estado === 'revisados' ? 1 : 0;

        // Consulta con filtros: fecha, aprobado, activo
        $datos = DB::table('registro_adicion_sobrevuelo')
            ->select('cliente', 'razon_social', DB::raw('COUNT(*) as cantidad'))
            ->whereBetween('fecha', [$desdeSQL, $hastaSQL])
            ->where('aprobado', $valorAprobado)
            ->where('activo', 1)
            ->groupBy('cliente', 'razon_social')
            ->orderBy('cliente')
            ->get();

        $total = $datos->sum('cantidad');

        // Convertir a formato simple para la vista
        $datosArray = $datos->map(function ($item) {
            return [
                'cliente' => $item->cliente,
                'razon_social' => $item->razon_social,
                'fecha' => $item->cantidad . ' sobrevuelos',
                'cantidad' => $item->cantidad,
            ];
        })->toArray();

        // Cargar PDF
        $pdf = Pdf::loadView('reporte.resumen_cantidad_pdf', compact('desde', 'hasta', 'estado', 'datosArray', 'total'));

        return $pdf->stream('reporte_resumen_cantidad.pdf');
    }

    public function resumen_cantidad_excel(Request $request)
    {
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');
        $estado = $request->query('estado');

        if (!$desde || !$hasta || !in_array($estado, ['revisados', 'pendientes'])) {
            abort(400, 'Parámetros inválidos');
        }

        $desdeSQL = Carbon::parse($desde)->startOfDay()->toDateString();
        $hastaSQL = Carbon::parse($hasta)->endOfDay()->toDateString();
        $valorAprobado = $estado === 'revisados' ? 1 : 0;

        $datos = DB::table('registro_adicion_sobrevuelo')
            ->select('cliente', 'razon_social', DB::raw('COUNT(*) as cantidad'))
            ->whereBetween('fecha', [$desdeSQL, $hastaSQL])
            ->where('aprobado', $valorAprobado)
            ->where('activo', 1)
            ->groupBy('cliente', 'razon_social')
            ->orderBy('cliente')
            ->get();

        $datosArray = $datos->map(function ($item) {
            return [
                $item->cliente,
                $item->razon_social,
                $item->cantidad,
            ];
        })->toArray();

        return Excel::download(
            new ResumenCantidadExport($datosArray, $desdeSQL, $hastaSQL, $estado),
            'resumen_sobrevuelos.xlsx'
        );
    }

    public function formulario002()
    {
        return view('reporte.formulario002');
    }

    public function formulario002_pdf(Request $request)
    {
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');
        $estado = $request->query('estado');

        // Validación básica
        if (!$desde || !$hasta || !in_array($estado, ['revisados', 'pendientes'])) {
            abort(400, 'Parámetros inválidos');
        }

        // Formatear fechas
        $desdeSQL = Carbon::parse($desde)->startOfDay()->toDateString();
        $hastaSQL = Carbon::parse($hasta)->endOfDay()->toDateString();

        // Definir condición por estado
        $valorAprobado = $estado === 'revisados' ? 1 : 0;

        $datos = DB::table('registro_adicion_sobrevuelo')
            ->select(
                'fecha',
                'vuelo',
                'matricula',
                'modelo',
                'version',
                'origen_oaci as origen',
                'destino_oaci as destino',
                'control1 as hr_in',
                'control2 as hr_sa',
                'ruta',
                'autorizacion as num_dgac',
                'responsable as resp'
            )
            ->whereBetween('fecha', [$desdeSQL, $hastaSQL])
            ->where('aprobado', $valorAprobado)
            ->where('activo', 1)
            ->orderBy('fecha')
            ->get();

        $datosArray = $datos->map(function ($item, $index) {
            return [
                'nro' => $index + 1,
                'fecha' => Carbon::parse($item->fecha)->format('d/m/Y'),
                'vuelo' => $item->vuelo,
                'matricula' => $item->matricula,
                'modelo' => $item->modelo,
                'version' => $item->version,
                'origen' => $item->origen,
                'destino' => $item->destino,
                'hr_in' => $item->hr_in,
                'hr_sa' => $item->hr_sa,
                'ruta' => $item->ruta,
                'num_dgac' => $item->num_dgac,
                'resp' => $item->resp,
            ];
        })->toArray();

        // Generar PDF
        $pdf = Pdf::loadView('reporte.formulario002_pdf', compact('desde', 'hasta', 'estado', 'datosArray'))
            ->setPaper('letter', 'landscape');

        return $pdf->stream('formulario002.pdf');
    }

    public function formulario002_excel(Request $request)
    {
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');
        $estado = $request->query('estado');

        if (!$desde || !$hasta || !in_array($estado, ['revisados', 'pendientes'])) {
            abort(400, 'Parámetros inválidos');
        }

        $desdeSQL = Carbon::parse($desde)->startOfDay()->toDateString();
        $hastaSQL = Carbon::parse($hasta)->endOfDay()->toDateString();
        $valorAprobado = $estado === 'revisados' ? 1 : 0;

        $datos = DB::table('registro_adicion_sobrevuelo')
            ->select(
                'fecha',
                'vuelo',
                'matricula',
                'modelo',
                'version',
                'origen_oaci as origen',
                'destino_oaci as destino',
                'control1 as hr_in',
                'control2 as hr_sa',
                'ruta',
                'autorizacion as num_dgac',
                'responsable as resp'
            )
            ->whereBetween('fecha', [$desdeSQL, $hastaSQL])
            ->where('aprobado', $valorAprobado)
            ->where('activo', 1)
            ->orderBy('fecha')
            ->get();

        $datosArray = $datos->map(function ($item, $index) {
            return [
                $index + 1,
                Carbon::parse($item->fecha)->format('d/m/Y'),
                $item->vuelo,
                $item->matricula,
                $item->modelo,
                $item->version,
                $item->origen,
                $item->destino,
                $item->hr_in,
                $item->hr_sa,
                $item->ruta,
                $item->num_dgac,
                $item->resp,
            ];
        })->toArray();

        return Excel::download(
            new Formulario002Export($datosArray, $desdeSQL, $hastaSQL, $estado),
            'formulario_002.xlsx'
        );
    }

    public function por_fecha()
    {
        return view('reporte.por_fecha');
    }

    public function por_fecha_pdf(Request $request)
    {
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');
        $estado = $request->query('estado');
        $cliente = $request->query('cliente');
        $todos = $request->query('todos');

        // Validación básica
        if (!$desde || !$hasta || !in_array($estado, ['revisados', 'pendientes', 'observados'])) {
            abort(400, 'Parámetros inválidos');
        }

        // Formatear fechas
        $desdeSQL = Carbon::parse($desde)->startOfDay()->toDateString();
        $hastaSQL = Carbon::parse($hasta)->endOfDay()->toDateString();

        // Determinar valor de 'aprobado' según el estado
        $valorAprobado = match ($estado) {
            'revisados' => 1,
            'pendientes' => 0,
            'observados' => 2,
        };

        // Base de consulta
        $query = DB::table('registro_adicion_sobrevuelo')
            ->select(
                'fecha',
                'vuelo',
                'matricula',
                'modelo',
                'version',
                'origen_oaci as origen',
                'destino_oaci as destino',
                'control1 as hr_in',
                'control2 as hr_sa',
                'ruta',
                'autorizacion as num_dgac',
                'responsable as resp',
                'peso',
                'cliente',
            )
            ->whereBetween('fecha', [$desdeSQL, $hastaSQL])
            ->where('aprobado', $valorAprobado)
            ->where('activo', 1);

        // Si no se seleccionó "todos", aplicar filtro por cliente
        if (!$todos && $cliente) {
            $query->where('cliente', $cliente);
        }

        $datos = $query->orderByDesc('fecha')->get();

        // Armar nombre del cliente y razón social
        if ($todos) {
            $clienteNombre = 'Todos los Clientes';
            $razonSocial = 'Todos los Clientes';
        } else {
            $clienteNombre = $cliente;

            // Buscar razón social desde la base de datos
            $clienteData = DB::table('registro_adicion_sobrevuelo')
                ->where('cliente', $cliente)
                ->select('razon_social')
                ->first();

            $razonSocial = $clienteData?->nombre ?? 'No disponible';
        }

        // Preparar los datos para la vista PDF
        $datosArray = $datos->map(function ($item, $index) use ($todos) {
            return [
                'nro' => $index + 1,
                'fecha' => Carbon::parse($item->fecha)->format('d/m/Y'),
                'vuelo' => $item->vuelo,
                'matricula' => $item->matricula,
                'modelo' => $item->modelo,
                'version' => $item->version,
                'origen' => $item->origen,
                'destino' => $item->destino,
                'hr_in' => $item->hr_in,
                'hr_sa' => $item->hr_sa,
                'ruta' => $item->ruta,
                'num_dgac' => $item->num_dgac,
                'resp' => $item->resp,
                'peso' => $item->peso,
                'cliente' => $item->cliente,
            ];
        })->toArray();

        // Generar PDF
        $pdf = Pdf::loadView('reporte.por_fecha_pdf', compact(
            'desde',
            'hasta',
            'estado',
            'clienteNombre',
            'razonSocial',
            'datosArray'
        ))->setPaper('letter', 'landscape');

        return $pdf->stream('por_fecha.pdf');
    }

    public function por_fecha_excel(Request $request)
    {
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');
        $estado = $request->query('estado');
        $cliente = $request->query('cliente');
        $todos = $request->query('todos');

        // Validación básica
        if (!$desde || !$hasta || !in_array($estado, ['revisados', 'pendientes', 'observados'])) {
            abort(400, 'Parámetros inválidos');
        }

        // Formatear fechas
        $desdeSQL = Carbon::parse($desde)->startOfDay()->toDateString();
        $hastaSQL = Carbon::parse($hasta)->endOfDay()->toDateString();

        // Determinar valor de 'aprobado' según el estado
        $valorAprobado = match ($estado) {
            'revisados' => 1,
            'pendientes' => 0,
            'observados' => 2,
        };

        // Base de consulta
        $query = DB::table('registro_adicion_sobrevuelo')
            ->select(
                'fecha',
                'vuelo',
                'matricula',
                'modelo',
                'version',
                'origen_oaci as origen',
                'destino_oaci as destino',
                'control1 as hr_in',
                'control2 as hr_sa',
                'ruta',
                'autorizacion as num_dgac',
                'responsable as resp',
                'peso',
                'cliente'
            )
            ->whereBetween('fecha', [$desdeSQL, $hastaSQL])
            ->where('aprobado', $valorAprobado)
            ->where('activo', 1);

        // Filtro por cliente si no se seleccionó "todos"
        if (!$todos && $cliente) {
            $query->where('cliente', $cliente);
        }

        $datos = $query->orderByDesc('fecha')->get();

        // Asignar nombre del cliente y razón social
        if ($todos) {
            $clienteNombre = 'Todos los Clientes';
            $razonSocial = 'Todos los Clientes';
        } else {
            $clienteNombre = $cliente;

            // Buscar razón social desde la tabla correspondiente
            $clienteData = DB::table('registro_adicion_sobrevuelo')
                ->where('cliente', $cliente)
                ->select('razon_social')
                ->first();

            $razonSocial = $clienteData?->razon_social ?? 'No disponible';
        }

        // Preparar colección para exportar
        $datosArray = $datos->map(function ($item, $index) use ($todos) {
            return [
                'No.' => $index + 1,
                'Fecha' => Carbon::parse($item->fecha)->format('d/m/Y'),
                'Cliente' => $item->cliente,
                'Matrícula' => $item->matricula,
                'Modelo' => $item->modelo,
                'MTOW-TON' => $item->peso,
                'Vuelo' => $item->vuelo,
                'Origen' => $item->origen,
                'Destino' => $item->destino,
                'HR INICIO' => $item->hr_in,
                'HR SALIDA' => $item->hr_sa,
                'Ruta' => $item->ruta,
                'NUM DGAC' => $item->num_dgac,
            ];
        });

        // Exportar a Excel
        return Excel::download(
            new PorFechaExport($datosArray->toArray(), $desdeSQL, $hastaSQL, $estado, $razonSocial),
            'por_fecha.xlsx'
        );
    }

    public function rvsm()
    {
        return view('reporte.rvsm');
    }

    public function rvsm_excel(Request $request)
    {
        // Validación de parámetros
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');

        if (!$desde || !$hasta) {
            return response()->json(['error' => 'Parámetros "desde" y "hasta" son obligatorios.'], 400);
        }

        try {
            $desdeSQL = Carbon::parse($desde)->startOfDay()->toDateString();
            $hastaSQL = Carbon::parse($hasta)->endOfDay()->toDateString();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Formato de fecha inválido.'], 400);
        }

        // Consulta de datos
        $datos = DB::table('registro_adicion_sobrevuelo')
            ->select(
                'id',
                'fecha',
                'vuelo',
                'matricula',
                'modelo',
                'origen_oaci',
                'destino_oaci',
                'primer_punto',
                'control1',
                'fl_fijo_entrada',
                'ruta_vuelo',
                'ultimo_punto',
                'control2',
                'fl_fijo_salida',
                'fijo1',
                'hora_fijo1',
                'fl_fijo1',
                'fijo2',
                'hora_fijo2',
                'fl_fijo2',
                'fijo3',
                'hora_fijo3',
                'fl_fijo3'
            )
            ->whereBetween('fecha', [$desdeSQL, $hastaSQL])
            ->where('aprobado', 1)
            ->where('activo', 1)
            ->orderByDesc('fecha')
            ->get();

        // Exportar a Excel
        return Excel::download(
            new RvsmExport($datos->toArray(), $desdeSQL, $hastaSQL),
            'rvsm_' . now()->format('Ymd_His') . '.xlsx'
        );
    }
}
