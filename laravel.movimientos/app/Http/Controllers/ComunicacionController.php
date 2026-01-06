<?php

namespace App\Http\Controllers;

use App\Models\ComunicacionRegistro;
use App\Models\AutorizacionVuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ComunicacionController extends Controller
{
    public function index_ingreso($tipo)
    {
        $paises = DB::table('pais')
            ->select('id', 'geo_code', 'pais')
            ->where('activo', 1)
            ->orderBy('pais')
            ->get();

        return view('comunicacion.index_ingreso', compact('paises', 'tipo'));
    }

    public function sobrevuelos()
    {
        return view('comunicacion.sobrevuelos');
    }

    /* public function getSobrevuelos()
    {

        $data = DB::table('proceso_vuelo')
            ->leftJoin('comunicacion_registro', 'proceso_vuelo.id_amhs', '=', 'comunicacion_registro.id_amhs')
            ->select(
                'proceso_vuelo.id_amhs',
                'name_estado',
                'fecha',
                'ha',
                DB::raw("
                            CONCAT(
                                DATE(proceso_vuelo.created_at), ' ', 
                                LPAD(SUBSTRING(ha, 1, 2), 2, '0'), ':', 
                                LPAD(SUBSTRING(ha, 3, 2), 2, '0')
                            ) as fecha_hora
                        "),
                'vuelo',
                'tipo',
                'origen',
                'destino',
                'reg',
                'eobt',
                'linea_aerea',
                'fpl_ruta',
                'fpl_punto_seleccionado',
                'fpl_punto',
                'est_array',
                'comunicacion_registro.estado as estado_comunicacion' // <- Aquí recuperas el estado o null
            )
            ->where('proceso_vuelo.id_estado', 4)
            ->where('proceso_vuelo.activo', 1)
            ->where('proceso_vuelo.tipo_ficha', 17)
            ->whereNotNull('ha')
            ->where('ha', '<>', '')
            ->orderByDesc(DB::raw("
                                    CONCAT(
                                        DATE(proceso_vuelo.created_at), ' ', 
                                        LPAD(SUBSTRING(ha, 1, 2), 2, '0'), ':', 
                                        LPAD(SUBSTRING(ha, 3, 2), 2, '0')
                                    )
                                "))
            ->limit(3000)
            ->get();

        return response()->json(['data' => $data]);
    } */

    public function getSobrevuelos()
    {

        $data = DB::table('proceso_vuelo')
            ->leftJoin('comunicacion_registro', 'proceso_vuelo.id_amhs', '=', 'comunicacion_registro.id_amhs')
            ->select(
                'proceso_vuelo.id_amhs',
                'name_estado',
                'fecha',
                'hora',
                'fecha_impresion',
                'ha',
                'vuelo',
                'tipo',
                'origen',
                'destino',
                'reg',
                'eobt',
                'linea_aerea',
                'fpl_ruta',
                'fpl_punto_seleccionado',
                'fpl_punto',
                'est_array',
                'comunicacion_registro.estado as estado_comunicacion' // <- Aquí recuperas el estado o null
            )
            ->where('proceso_vuelo.id_estado', 4)
            ->where('proceso_vuelo.activo', 1)
            ->where('proceso_vuelo.tipo_ficha', 17)
            ->whereNotNull('fecha_impresion')
            ->where('fecha_impresion', '>', '1900-01-01') // opcional para evitar “cero”
            ->orderByDesc('fecha_impresion')
            ->limit(3000)
            ->get();

        return response()->json(['data' => $data]);
    }

    public function actualizarEstado(Request $request)
    {
        $request->validate([
            'id_amhs' => 'required|integer',
            'estado' => 'required|integer',
        ]);

        // Busca el registro o créalo si no existe
        $registro = ComunicacionRegistro::firstOrNew(['id_amhs' => $request->id_amhs]);

        // Actualiza los campos
        $registro->estado = $request->estado;
        $registro->activo = 1;
        $registro->fk_user = auth()->id();
        $registro->save();

        return response()->json(['success' => true]);
    }

    public function autorizacion_data(Request $request, $tipo)
    {
        $query = DB::table('registro_autorizacion')
            ->join('users', 'users.id', '=', 'registro_autorizacion.fk_user')
            ->select('registro_autorizacion.*', 'users.name as usuario')
            ->where('registro_autorizacion.activo', 1);

        if (in_array(strtoupper($tipo), ['SOBREVUELO', 'INGRESO', 'SALIDA'])) {
            $query->where('registro_autorizacion.tipo_autorizacion', strtoupper($tipo));
        } else {
            $query->whereNotIn('registro_autorizacion.tipo_autorizacion', ['SOBREVUELO', 'INGRESO', 'SALIDA']);
        }

        // Filtro global
        if ($search = $request->input('search.value')) {
            $searchUpper = strtoupper($search);

            $query->where(function ($q) use ($searchUpper) {
                $q->whereRaw('UPPER(numero_autorizacion) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw("TO_CHAR(fecha_autorizacion, 'DD/MM/YYYY') LIKE ?", ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(cliente) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(tipo_aeronave) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(matricula) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw("CAST(peso AS TEXT) LIKE ?", ["%{$searchUpper}%"])
                    ->orWhereRaw("TO_CHAR(tiempo_validez_inicio, 'DD/MM/YYYY') LIKE ?", ["%{$searchUpper}%"])
                    ->orWhereRaw("TO_CHAR(tiempo_validez_fin, 'DD/MM/YYYY') LIKE ?", ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(aeropuerto_entrada) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(aeropuerto_destino) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(ruta) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(tipo_autorizacion) LIKE ?', ["%{$searchUpper}%"])
                    ->orWhereRaw('UPPER(users.name) LIKE ?', ["%{$searchUpper}%"]); // <-- Filtro por nombre de usuario
            });
        }

        $total = $query->count();

        $data = $query->orderByDesc('registro_autorizacion.id')
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

    public function store(Request $request)
    {
        // 0) Flags
        $esEnmienda = intval($request->input('enmienda', 0)) === 1;

        // 1) Validación inicial de archivos (múltiples PDFs)
        $request->validate([
            'autorizacion_pdf'   => 'nullable|array',
            'autorizacion_pdf.*' => 'file|mimes:pdf|max:1024', // 1 MB c/u
            'adjunto_pdf'        => 'nullable|array',
            'adjunto_pdf.*'      => 'file|mimes:pdf|max:1024', // 1 MB c/u
        ]);

        // 2) Unicidad del número de autorización (solo PADRES)
        if (!$esEnmienda) {
            if ($request->filled('id')) {
                $registro = AutorizacionVuelo::find($request->input('id'));
                if ($registro && $registro->id_padre !== null) {
                    // Es hijo → no validar duplicado
                } else {
                    $duplicado = AutorizacionVuelo::query()
                        ->whereRaw('UPPER(numero_autorizacion) = ?', [strtoupper($request->input('numero_autorizacion'))])
                        ->whereNull('id_padre')
                        ->where('activo', 1)
                        ->when($request->filled('id'), function ($q) use ($request) {
                            $q->where('id', '!=', $request->input('id'));
                        })
                        ->exists();
                    if ($duplicado) {
                        return response()->json([
                            'status'  => 'error',
                            'message' => 'El número de autorización ya existe. No se guardó la información.'
                        ], 422);
                    }
                }
            } else {
                $duplicado = AutorizacionVuelo::query()
                    ->whereRaw('UPPER(numero_autorizacion) = ?', [strtoupper($request->input('numero_autorizacion'))])
                    ->whereNull('id_padre')
                    ->where('activo', 1)
                    ->exists();
                if ($duplicado) {
                    return response()->json([
                        'status'  => 'error',
                        'message' => 'El número de autorización ya existe. No se guardó la información.'
                    ], 422);
                }
            }
        }

        // 3) Construcción de resumen (tipo / matrícula / peso)
        $tipo_array = json_decode($request->input('tipo_array'), true) ?? [];
        $peso_array = json_decode($request->input('peso_array'), true) ?? [];
        $matricula_array = json_decode($request->input('matricula_array'), true) ?? [];
        $matricula_alt = $request->input('matricula_alt');

        if (count($tipo_array) === 1 && count($matricula_array) === 1 && count($peso_array) === 1) {
            $tipo_aeronave = strtoupper($tipo_array[0]);

            // ✅ Integrar matricula_alt después de la primera matrícula (todo en uppercase)
            $matricula = strtoupper($matricula_array[0]);
            if (!empty($matricula_alt)) {
                $matricula .= ' ALT. ' . strtoupper($matricula_alt);
            }

            $peso = $peso_array[0];
        } else {
            $agrupados_peso = [];
            $separaciones   = [];
            $ultimo_peso    = null;

            foreach ($peso_array as $i => $peso_val) {
                if ($peso_val !== $ultimo_peso) {
                    $agrupados_peso[] = $peso_val;
                    if ($i > 0) $separaciones[] = $i;
                    $ultimo_peso = $peso_val;
                }
            }

            $grupos_matricula = [];
            $inicio = 0;
            foreach ($separaciones as $sep) {
                $grupo = array_slice($matricula_array, $inicio, $sep - $inicio);

                // ✅ Integrar matricula_alt SOLO en el primer grupo y primera matrícula (uppercase)
                if ($inicio === 0 && !empty($matricula_alt) && isset($grupo[0])) {
                    $grupo[0] = strtoupper($grupo[0]) . ' ALT. ' . strtoupper($matricula_alt);
                } elseif (isset($grupo[0])) {
                    $grupo[0] = strtoupper($grupo[0]);
                }

                // Asegurar todas las matrículas en uppercase
                $grupo = array_map('strtoupper', $grupo);

                $grupos_matricula[] = implode(', ', $grupo);
                $inicio = $sep;
            }

            $grupo = array_slice($matricula_array, $inicio);
            if ($inicio === 0 && !empty($matricula_alt) && isset($grupo[0])) {
                $grupo[0] = strtoupper($grupo[0]) . ' ALT. ' . strtoupper($matricula_alt);
            } elseif (isset($grupo[0])) {
                $grupo[0] = strtoupper($grupo[0]);
            }

            // Asegurar uppercase en todos los elementos del último grupo
            $grupo = array_map('strtoupper', $grupo);
            $grupos_matricula[] = implode(', ', $grupo);

            if (count(array_unique($tipo_array)) === 1) {
                $tipo_aeronave = strtoupper($tipo_array[0]);
            } else {
                $grupos_tipo = [];
                $inicio = 0;
                foreach ($separaciones as $sep) {
                    $grupo = array_slice($tipo_array, $inicio, $sep - $inicio);
                    $grupos_tipo[] = strtoupper($grupo[0]);
                    $inicio = $sep;
                }
                $grupo = array_slice($tipo_array, $inicio);
                $grupos_tipo[] = strtoupper($grupo[0]);
                $tipo_aeronave = implode('/', $grupos_tipo);
            }

            $matricula = implode('/', $grupos_matricula);
            $peso      = implode('/', $agrupados_peso);
        }


        try {
            DB::beginTransaction();

            $autorizacionData = [
                'numero_autorizacion'        => strtoupper($request->input('numero_autorizacion')),
                'fecha_autorizacion'         => $request->input('fecha_autorizacion'),
                'razon_social'               => strtoupper($request->input('razon_social')),
                'tipo_aeronave'              => $tipo_aeronave,
                'matricula'                  => $matricula,
                'peso'                       => $peso,
                'pais'                       => strtoupper($request->input('pais')),
                'piloto'                     => strtoupper($request->input('piloto')),
                'tipo_autorizacion'          => $request->input('tipo_autorizacion'),
                'medida_peso'                => $request->input('medida_peso'),
                'tiempo_validez_inicio'      => $request->input('tiempo_validez_inicio'),
                'tiempo_validez_fin'         => $request->input('tiempo_validez_fin'),
                'ultimo_aeropuerto'          => strtoupper($request->input('ultimo_aeropuerto')),
                'aeropuerto_destino'         => strtoupper($request->input('aeropuerto_destino')),
                'aeropuerto_alterno'         => strtoupper($request->input('aeropuerto_destino_alterno')),
                'aeropuerto_entrada'         => strtoupper($request->input('aeropuerto_entrada')),
                'aeropuerto_entrada_alterno' => strtoupper($request->input('aeropuerto_entrada_alterno')),
                'aeropuerto_salida'          => strtoupper($request->input('aeropuerto_salida')),
                'aeropuerto_salida_alterno'  => strtoupper($request->input('aeropuerto_salida_alterno')),
                'objeto_vuelo'               => strtoupper($request->input('objeto_vuelo')),
                'ruta'                       => strtoupper($request->input('ruta')),
                'observaciones'              => strtoupper($request->input('observaciones')),
                'tipo_array'                 => json_encode(array_map('strtoupper', $tipo_array)),
                'matricula_array'            => json_encode($matricula_array),
                'peso_array'                 => json_encode($peso_array),
                'fk_user'                    => Auth::id(),
                'activo'                     => 1,
            ];

            // 4) Directorios de archivos
            $destDirAutorizacion = public_path('store/autorizaciones');
            if (!File::exists($destDirAutorizacion)) File::makeDirectory($destDirAutorizacion, 0755, true);

            $destDirAdjunto = public_path('store/adjuntos');
            if (!File::exists($destDirAdjunto)) File::makeDirectory($destDirAdjunto, 0755, true);

            $destDirEnmienda = public_path('store/enmiendas');
            if (!File::exists($destDirEnmienda)) File::makeDirectory($destDirEnmienda, 0755, true);

            // Helpers
            $savePdf = function ($uploadedFile, $prefix, $destDir) {
                $safe = Str::slug(pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME), '_');
                $uniq = now()->format('YmdHisv') . '_' . random_int(1000, 9999);
                $fileName = "{$uniq}_{$prefix}_{$safe}.pdf";
                $uploadedFile->move($destDir, $fileName);
                return str_replace(public_path() . '/', '', rtrim($destDir, '/')) . '/' . $fileName; // e.g. store/autorizaciones/...
            };
            $normalizeJsonArray = function ($value) {
                if (empty($value)) return [];
                return is_array($value) ? $value : (json_decode($value, true) ?: []);
            };
            $deleteFiles = function (array $paths) {
                foreach ($paths as $p) {
                    $abs = public_path($p);
                    if (File::exists($abs)) {
                        @File::delete($abs);
                    }
                }
            };

            if ($esEnmienda) {
                // ---------- ENMIENDA: crear SIEMPRE nuevo hijo ----------
                if (!$request->filled('id')) {
                    DB::rollBack();
                    return response()->json([
                        'status'  => 'error',
                        'message' => 'Para registrar una enmienda se requiere el id del registro padre o de cualquier hijo.'
                    ], 422);
                }

                $target   = AutorizacionVuelo::findOrFail($request->input('id'));
                $parentId = $target->id_padre ?: $target->id; // padre real
                $padreReal = AutorizacionVuelo::findOrFail($parentId);

                // Copia número autorización del padre real
                $autorizacionData['numero_autorizacion'] = $padreReal->numero_autorizacion;

                // Calcular n_enmienda (lock)
                $lastChild = AutorizacionVuelo::where('id_padre', $parentId)
                    ->where('activo', 1)
                    ->select('n_enmienda')
                    ->orderByDesc('n_enmienda')
                    ->lockForUpdate()
                    ->first();

                $nextN = (int) optional($lastChild)->n_enmienda + 1;

                $autorizacionData['id_padre']   = $parentId;
                $autorizacionData['n_enmienda'] = $nextN;

                // PDFs de autorización
                $rutasAut = [];
                foreach ($request->file('autorizacion_pdf', []) as $file) {
                    $rutasAut[] = $savePdf($file, 'autorizacion', $destDirAutorizacion);
                }
                if (!empty($rutasAut)) {
                    $autorizacionData['autorizacion_file'] = json_encode($rutasAut);
                }

                // Adjuntos (opcionales)
                if ($request->hasFile('adjunto_pdf')) {
                    $rutasAdj = [];
                    foreach ((array) $request->file('adjunto_pdf') as $file) {
                        $rutasAdj[] = $savePdf($file, 'adjunto', $destDirAdjunto);
                    }
                    $autorizacionData['adjunto_file'] = json_encode($rutasAdj);
                }

                AutorizacionVuelo::create($autorizacionData);
                $mensaje = 'Enmienda registrada correctamente.';
            } else {
                // ---------- MODO NORMAL (create/update) ----------
                if ($request->filled('id')) {
                    // UPDATE
                    $autorizacion = AutorizacionVuelo::findOrFail($request->input('id'));
                    $autorizacionData['fk_user'] = Auth::id();

                    // Cargar existentes
                    $existentesAut = $normalizeJsonArray($autorizacion->autorizacion_file);
                    $existentesAdj = $normalizeJsonArray($autorizacion->adjunto_file);

                    /**
                     * A) REEMPLAZO COMPLETO si se suben nuevos archivos
                     *    - Si llegan nuevos 'autorizacion_pdf': borra los antiguos y guarda solo los nuevos
                     *    - Si NO llegan nuevos: mantiene los existentes (salvo B)
                     */
                    if ($request->hasFile('autorizacion_pdf')) {
                        $deleteFiles($existentesAut);
                        $nuevas = [];
                        foreach ($request->file('autorizacion_pdf', []) as $file) {
                            $nuevas[] = $savePdf($file, 'autorizacion', $destDirAutorizacion);
                        }
                        $autorizacionData['autorizacion_file'] = json_encode($nuevas);
                    }

                    if ($request->hasFile('adjunto_pdf')) {
                        $deleteFiles($existentesAdj);
                        $nuevosAdj = [];
                        foreach ((array) $request->file('adjunto_pdf') as $file) {
                            $nuevosAdj[] = $savePdf($file, 'adjunto', $destDirAdjunto);
                        }
                        $autorizacionData['adjunto_file'] = json_encode($nuevosAdj);
                    }

                    /**
                     * B) (OPCIONAL) ELIMINAR SELECCIONADOS SIN SUBIR NUEVOS
                     *    Enviar 'autorizacion_pdf_remove[]' / 'adjunto_pdf_remove[]' con rutas a eliminar.
                     */
                    $rmAut = $request->input('autorizacion_pdf_remove', []);
                    if (!empty($rmAut) && !$request->hasFile('autorizacion_pdf')) {
                        $aBorrar = array_values(array_intersect($existentesAut, (array)$rmAut));
                        $deleteFiles($aBorrar);
                        $quedan  = array_values(array_diff($existentesAut, (array)$rmAut));
                        $autorizacionData['autorizacion_file'] = json_encode($quedan);
                    }

                    $rmAdj = $request->input('adjunto_pdf_remove', []);
                    if (!empty($rmAdj) && !$request->hasFile('adjunto_pdf')) {
                        $aBorrarAdj = array_values(array_intersect($existentesAdj, (array)$rmAdj));
                        $deleteFiles($aBorrarAdj);
                        $quedanAdj  = array_values(array_diff($existentesAdj, (array)$rmAdj));
                        $autorizacionData['adjunto_file'] = json_encode($quedanAdj);
                    }

                    $autorizacion->update($autorizacionData);
                    $mensaje = 'Autorización actualizada correctamente.';
                } else {
                    // CREATE (padre)
                    $rutasAut = [];
                    foreach ($request->file('autorizacion_pdf', []) as $file) {
                        $rutasAut[] = $savePdf($file, 'autorizacion', $destDirAutorizacion);
                    }
                    if (!empty($rutasAut)) {
                        $autorizacionData['autorizacion_file'] = json_encode($rutasAut);
                    }

                    if ($request->hasFile('adjunto_pdf')) {
                        $rutasAdj = [];
                        foreach ((array) $request->file('adjunto_pdf') as $file) {
                            $rutasAdj[] = $savePdf($file, 'adjunto', $destDirAdjunto);
                        }
                        $autorizacionData['adjunto_file'] = json_encode($rutasAdj);
                    }

                    AutorizacionVuelo::create($autorizacionData);
                    $mensaje = 'Autorización registrada correctamente.';
                }
            }

            DB::commit();

            // Normalizar para la respuesta (array)
            $autFiles = isset($autorizacionData['autorizacion_file'])
                ? (is_array($autorizacionData['autorizacion_file'])
                    ? $autorizacionData['autorizacion_file']
                    : (json_decode($autorizacionData['autorizacion_file'], true) ?: []))
                : [];

            return response()->json([
                'status'  => 'success',
                'message' => $mensaje,
                'files'   => [
                    'autorizacion_file' => $autFiles,
                    'adjunto_file'      => $autorizacionData['adjunto_file'] ?? null,
                    'enmienda_file'     => $autorizacionData['enmienda_file'] ?? null,
                ],
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            if ($e->getCode() === '23505') {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'El número de autorización ya existe (solo para registros padre).',
                    'error'   => $e->getMessage(),
                ], 422);
            }
            return response()->json([
                'status'  => 'error',
                'message' => 'Ocurrió un error al guardar la autorización.',
                'error'   => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => 'Ocurrió un error al guardar la autorización.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function enmienda(Request $request)
    {
        $request->validate([
            'numero_autorizacion' => 'required|string'
        ]);

        $registros = DB::table('registro_autorizacion')
            ->where('numero_autorizacion', $request->numero_autorizacion)
            ->where('registro_autorizacion.activo', 1)
            ->orderBy('created_at', 'asc')
            ->get();

        if ($registros->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron registros para ese número de autorización'
            ], 404);
        }

        $base = $registros->first();
        $enmiendas = $registros->skip(1);
        $llave_enmienda = $enmiendas->count() > 0 ? 1 : 0;

        $campos = [
            'numero_autorizacion',
            'fecha_autorizacion',
            'razon_social',
            'tipo_aeronave',
            'matricula',
            'pais',
            'peso',
            'medida_peso',
            'piloto',
            'tiempo_validez_inicio',
            'tiempo_validez_fin',
            'ultimo_aeropuerto',
            'aeropuerto_entrada',
            'aeropuerto_entrada_alterno',
            'aeropuerto_salida',
            'aeropuerto_salida_alterno',
            'tipo_autorizacion',
            'objeto_vuelo',
            'observaciones',
            'ruta',
            'autorizacion_file',
            'adjunto_file',
        ];

        // ⚠️ Campos que deben incluirse siempre en el diff (aunque no cambien)
        $alwaysInclude = ['autorizacion_file'];

        $normalize = function ($v) {
            if ($v === null) return null;
            return is_string($v) ? trim($v) : $v;
        };
        $normalizeDateLike = function ($v) use ($normalize) {
            $v = $normalize($v);
            if (is_string($v) && strlen($v) >= 10) return substr($v, 0, 10);
            return $v;
        };

        $campos_fecha = ['fecha_autorizacion', 'tiempo_validez_inicio', 'tiempo_validez_fin'];

        $diffs_por_enmienda = [];
        $cambios_aplicables = [];

        foreach ($enmiendas as $enm) {
            $changes = [];

            foreach ($campos as $campo) {
                $orig  = $base->$campo ?? null;
                $nuevo = $enm->$campo ?? null;

                if (in_array($campo, $campos_fecha, true)) {
                    $orig = $normalizeDateLike($orig);
                    $nuevo = $normalizeDateLike($nuevo);
                } else {
                    $orig = $normalize($orig);
                    $nuevo = $normalize($nuevo);
                }

                $forzar = in_array($campo, $alwaysInclude, true);

                // Incluir si cambió o si es un campo "siempre incluir"
                if ($nuevo !== $orig || $forzar) {
                    $changes[$campo] = $nuevo;

                    // También actualizar "último valor" si cambió o si es "siempre incluir"
                    $cambios_aplicables[$campo] = [
                        'valor' => $nuevo,
                        'id_enmienda' => $enm->id,
                    ];
                }
            }

            if (!empty($changes)) {
                $diffs_por_enmienda[] = [
                    'id_enmienda' => $enm->id,
                    'changes' => $changes,
                ];
            }
        }

        return response()->json([
            'success' => true,
            'llave_enmienda' => $llave_enmienda,
            'base' => $base,
            'enmiendas' => $enmiendas->values(),
            'diffs_por_enmienda' => $diffs_por_enmienda,
            'cambios_aplicables' => $cambios_aplicables,
        ]);
    }

    public function baja(string $id)
    {
        $registro = AutorizacionVuelo::find($id);

        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado.'], 404);
        }

        $registro->activo = 0;
        $registro->save();

        return response()->json(['success' => 'Registro eliminado correctamente.']);
    }
}
