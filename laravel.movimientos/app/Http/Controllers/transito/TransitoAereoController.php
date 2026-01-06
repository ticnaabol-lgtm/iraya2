<?php

namespace App\Http\Controllers\transito;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Models\ProcesoVuelo;
use App\Models\ProcesoRutasPredeterminadas;
use App\Models\ProcesoNuevoVuelo;
use App\Models\ProcesoMetar;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function ordenar_ruta($vector, $valor)
{
    //------------------------------------------------------------------

    // Resetear los índices
    $vector = array_values($vector);

    // Buscar el índice del valor
    $indice = array_search($valor, $vector);

    // Calcular valores antes y después
    $valores_antes = array_slice($vector, 0, $indice);
    $valores_despues = array_slice($vector, $indice + 1);

    // Comparar y ordenar
    if (count($valores_antes) > count($valores_despues)) {
        $vector_invertido = array_reverse($vector);
    } else {
        $vector_invertido = $vector;
    }

    if (count($valores_antes) == count($valores_despues)) {
        $vector_invertido = 0; // No se puede Ordenar
    }

    return $vector_invertido;

    //------------------------------------------------------------------
}

function ordenar_ruta_2puntos($array, $first, $second)
{
    $indexFirst = array_search($first, $array);
    $indexSecond = array_search($second, $array);

    if ($indexFirst === false || $indexSecond === false) {
        return "Uno de los elementos no se encuentra en el array.";
    }

    if ($indexFirst > $indexSecond) {
        return array_reverse($array);
    } else {
        return $array;
    }
}

function ruta_viaje($punto1, $punto2, $punto2_mensaje)
{
    // Resetear los índices
    $punto1 = array_values($punto1);
    $punto2 = array_values($punto2);

    $punto_comun = array_intersect($punto1, $punto2);
    $punto_comun = array_values($punto_comun);
    $ruta_cortada = [];
    $punto_final = '';
    $puntos_finales = [];

    if (!empty($punto_comun)) {
        // Obtener el primer valor común
        $primer_punto_comun = $punto_comun[0];

        // Construir Vector Viaje
        if (count($punto2_mensaje) >= 2) {
            // El array $punto2_mensaje tiene más de dos elementos
            foreach ($punto2_mensaje as $p2m) {
                if ($primer_punto_comun !== $p2m) {
                    // El punto comun es diferente al valor del mensaje
                    $punto_final = $p2m;
                    break; // Salir del foreach
                }
            }
        } else {
            // El array $punto2_mensaje tiene dos o menos elementos
            if ($primer_punto_comun !== $punto2_mensaje[0]) {
                // El punto comun es diferente al valor del mensaje
                $punto_final = $punto2_mensaje[0];
            }
        }

        if ($punto_final !== '') {

            // $punto_final encontrado
            $punto2_ordenado =  ordenar_ruta_2puntos($punto2, $primer_punto_comun, $punto_final);

            // Cortar el primer vector hasta el punto común (exclusivo)
            $index_punto1 = array_search($primer_punto_comun, $punto1);
            $index_punto1++;
            $punto1_cortado = array_slice($punto1, 0, $index_punto1);

            // Cortar el segundo vector desde el punto común (inclusivo)
            $index_punto2 = array_search($primer_punto_comun, $punto2_ordenado);
            $index_punto2++;
            $punto2_cortado = array_slice($punto2_ordenado, $index_punto2);

            $ruta_cortada[] = $punto1_cortado;
            $ruta_cortada[] = $punto2_cortado;
        } else {
            // $punto_final es una cadena vacía ====> se tiene 2 puntos finales
            // Recuperar el primer valor
            $puntos_finales[0] = $punto2[0];

            // Recuperar el último valor
            $puntos_finales[1] = $punto2[count($punto2) - 1];

            foreach ($puntos_finales as $key => $value) {
                $punto2_ordenado =  ordenar_ruta_2puntos($punto2, $primer_punto_comun, $value);

                // Cortar el primer vector hasta el punto común (exclusivo)
                $index_punto1 = array_search($primer_punto_comun, $punto1);
                $index_punto1++;
                $punto1_cortado = array_slice($punto1, 0, $index_punto1);

                // Cortar el segundo vector desde el punto común (inclusivo)
                $index_punto2 = array_search($primer_punto_comun, $punto2_ordenado);
                $index_punto2++;
                $punto2_cortado = array_slice($punto2_ordenado, $index_punto2);

                $ruta_cortada[] = $punto1_cortado;
                $ruta_cortada[] = $punto2_cortado;

                //Log::info('JOSE PUNTO 1B: ');
                //Log::info($punto1_cortado);
                //Log::info('JOSE PUNTO 2B: ');
                //Log::info($punto2_cortado);
            }
        }
    } else {
        $ruta_cortada[0] = 0;
        $ruta_cortada[1] = 0;
    }

    return $ruta_cortada;
}

function moveNullToEnd($array)
{
    if ($array[0] === null) {
        $nullValue = array_shift($array); // Eliminar el primer elemento (null)
        $array[] = $nullValue; // Añadir el valor null al final del array
    }
    return $array;
}

function recortarArrayPorPosicion($array, $inicio, $fin)
{
    // Verificar que las posiciones son válidas y están en orden correcto
    if ($inicio !== false && $fin !== false && $inicio <= $fin && $inicio >= 0 && $fin < count($array)) {
        // Extraer el segmento del array entre los puntos dados
        return array_slice($array, $inicio, $fin - $inicio + 1);
    }

    // Retornar array vacío si las posiciones no son válidas
    return [];
}

class TransitoAereoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* try {
            $servicio = new Client([
                'base_uri' => env('RUTAS_API_URL') . '/api/vista_ruta_puntos_ad',
            ]);
            $response1 = $servicio->request('GET');
            $response = json_decode($response1->getBody()->getContents());
            $data1 = $response->data ?? [];
        } catch (RequestException $e) {
            Log::error('Error fetching data from vista_ruta_puntos: ' . $e->getMessage());
            $data1 = [];
        } */

        $data3 = 0;

        /* try {
            $servicio4 = new Client([
                'base_uri' => env('RUTAS_API_URL') . '/api/aeropuertos',
            ]);
            $response4 = $servicio4->request('GET');
            $data4Response = json_decode($response4->getBody()->getContents());
            $data4 = $data4Response ?? [];
        } catch (RequestException $e) {
            Log::error('Error fetching data from aeropuertos: ' . $e->getMessage());
            $data4 = [];
        } */

        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Query Select Orugen = Destino
        $consulta1 = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('fk_id_parametrica', 5)
            ->where('nivel', $tipoFicha)
            ->where('oaci', 0);

        $consulta2 = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('fk_id_parametrica', 5)
            ->where('nivel', $tipoFicha)
            ->where('oaci', $cod_oaci);

        // Unir ambas consultas
        $subTipoFicha = $consulta1->union($consulta2)->get();


        // Query Agrupamiento de Fichas ATC-002
        $llave_atc_group_002 = 0;
        $consulta1 = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('grupo', 32)
            ->where('nivel', $tipoFicha)
            ->where('oaci', 0);

        $consulta2 = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('grupo', 32)
            ->where('nivel', $tipoFicha)
            ->where('oaci', $cod_oaci);

        if ($consulta2->exists()) {
            $llave_atc_group_002 = 1;
        }

        // Unir ambas consultas
        $subTipoFichaATC2 = $consulta1->union($consulta2)->get();

        return view('transito.transito_aereo', compact(
            /* 'data1', */
            'data3',
            'userTip',
            'subTipoFicha',
            'llave_atc_group_002',
            'subTipoFichaATC2'
        ));
    }

    /* public function index2()
    {
        try {
            $servicio = new Client([
                'base_uri' => env('RUTAS_API_URL') . '/api/vista_ruta_puntos_ad',
            ]);
            $response1 = $servicio->request('GET');
            $response = json_decode($response1->getBody()->getContents());
            $data1 = $response->data ?? [];
        } catch (RequestException $e) {
            Log::error('Error fetching data from vista_ruta_puntos: ' . $e->getMessage());
            $data1 = [];
        }

        $data3 = 0;

        try {
            $servicio4 = new Client([
                'base_uri' => env('RUTAS_API_URL') . '/api/aeropuertos',
            ]);
            $response4 = $servicio4->request('GET');
            $data4Response = json_decode($response4->getBody()->getContents());
            $data4 = $data4Response ?? [];
        } catch (RequestException $e) {
            Log::error('Error fetching data from aeropuertos: ' . $e->getMessage());
            $data4 = [];
        }

        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();


        $tipoFicha = $userTip->pk_id_tipo_ficha;

        $subTipoFicha = DB::table('parametrica_descripcions')
            ->select('pk_id_parametrica_descripcion', 'descripcion')
            ->where('fk_id_parametrica', 5)
            ->where('nivel', $tipoFicha)
            ->get();

        return view('transito.transito_aereo2', compact('data1', 'data3', 'userTip', 'subTipoFicha'));
    } */

    // Añade este método al controlador
    /* public function obtenerAmhsPag(Request $request)
    {
        try {
            // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
            $inicio = $request->get('inicio', 0);
            $fin = $request->get('fin', 200);

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            // Configurar el cliente Guzzle
            $servicio2 = new Client([
                'base_uri' => env('TRANSITO_API_URL'),
            ]);

            // Hacer la solicitud GET con los parámetros inicio y fin
            $response2 = $servicio2->request('GET', '/api/amhspag', [
                'query' => [
                    'inicio' => $inicio,
                    'fin' => $fin,
                    'tipo_ficha' => $tipoFicha,
                    'cod_oaci' => $cod_oaci,
                ]
            ]);

            // Decodificar la respuesta JSON
            $data2Response = json_decode($response2->getBody()->getContents());
            $data2 = $data2Response->data ?? [];

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $data2
            ]);
        } catch (RequestException $e) {
            Log::error('Error fetching data from amhspag: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data from amhspag',
            ], 500);
        }
    } */

    public function obtenerAmhsPag(Request $request)
    {
        try {
            // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
            $inicio = $request->get('inicio', 0);
            $fin = $request->get('fin', 200);

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            $request->merge([
                'tipo_ficha' => $tipoFicha,
                'cod_oaci' => $cod_oaci,
            ]);

            try {
                // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
                $inicio = $request->input('inicio', 0);
                $fin = $request->input('fin', 200);
                $limit = $fin - $inicio;
                $offset = $inicio;

                $query = DB::table('fpls')

                    ->leftJoin('vista_proceso_vuelo', function ($join) use ($request) {
                        $join->on('fpls.id', '=', 'vista_proceso_vuelo.id_amhs');

                        // Agregar condición dinámica para tipo_ficha
                        if ($request->filled('tipo_ficha')) {
                            $join->where('vista_proceso_vuelo.tipo_ficha', '=', $request->input('tipo_ficha'));
                        }

                        // Agregar condición dinámica para cod_oaci
                        if ($request->filled('cod_oaci')) {
                            $join->where('vista_proceso_vuelo.pk_oaci', '=', $request->input('cod_oaci'));
                        }
                    })

                    ->leftJoin('users', 'vista_proceso_vuelo.fk_user', '=', 'users.id') // Join con users

                    ->select(
                        'fpls.id',
                        'fpls.created_at',
                        'fpls.updated_at',
                        'fpls.id_amhs',
                        'fpls.fechaHora',
                        'fpls.cabecera',
                        'fpls.mensaje',
                        'fpls.c1',
                        'fpls.c2',
                        'fpls.c3',
                        'fpls.c4',
                        'fpls.c5',
                        'fpls.c6',
                        'fpls.c7',
                        'fpls.c8',
                        'fpls.tipoMensaje',
                        'vista_proceso_vuelo.id_estado',
                        'vista_proceso_vuelo.name_estado',
                        'vista_proceso_vuelo.color_estado',
                        'users.id as user_id',
                        'users.name as user_name'
                    )

                    // ⬇️ Excluir cabeceras que contengan KDENXLDC (nulables incluidas)
                    ->whereRaw("COALESCE(fpls.cabecera,'') NOT ILIKE ?", ['%KDENXLDC%']);

                // Aplicar filtros condicionales
                if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
                    $query->whereRaw('DATE("fpls"."fechaHora") BETWEEN ? AND ?', [$request->fecha_inicio, $request->fecha_fin]);
                }

                if ($request->filled('origen')) {
                    $query->where('fpls.c5', 'like', '%' . $request->origen . '%');
                }

                if ($request->filled('destino')) {
                    $query->where('fpls.c7', 'like', '%' . $request->destino . '%');
                }

                if ($request->filled('vuelo')) {
                    $query->where('fpls.c1', 'like', '%' . $request->vuelo . '%');
                }

                if ($request->filled('estado')) {
                    $query->where('vista_proceso_vuelo.name_estado', '=', $request->estado);
                }

                // Ordenar, aplicar límites y obtener los resultados
                $amhs = $query
                    ->orderBy('fpls.fechaHora', 'desc') // Orden descendente por fechaHora
                    ->offset($offset) // Aplicar offset
                    ->limit($limit) // Aplicar límite
                    ->get(); // Obtener resultados

                // Obtener el SQL generado
                $sql = $query->toSql();
                $bindings = $query->getBindings();

                // Inicializar array para almacenar los datos procesados
                $data = [];

                foreach ($amhs as $item) {

                    $tipo_fpl = 0;

                    // vuelo
                    $vuelo = preg_replace('/[()\s-]/', ' ', $item->c1); // Reemplaza paréntesis, espacios y guiones con espacio
                    $pos = strpos($vuelo, '/'); // Encuentra la posición del '/'

                    if ($pos !== false) {
                        $vuelo = substr($vuelo, 0, $pos); // Corta la cadena hasta antes del '/'
                    } else {
                        $vuelo = substr($vuelo, 0, 7); // Si no hay '/', corta los primeros 7 caracteres
                    }

                    if ($item->id_estado !== null) {
                        $id_estado = $item->id_estado;
                        $estado = $item->name_estado;
                        $color_estado = $item->color_estado;
                    } else {
                        $id_estado = 0;
                        $estado = 'PENDIENTE';
                        $color_estado = '#ff5722';
                    }

                    // Procesar otros campos
                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);
                    $fechaHora = explode(' ', $item->created_at);
                    $fecha = $fechaHora[0];
                    $hora = substr($fechaHora[1] ?? '', 0, 5);
                    $diaHora = date('d', strtotime($fecha)) . ' ' . $hora;

                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);

                    //Nivel y Ruta Propuesta
                    $sinSaltoDeLinea2 = rtrim($item->c6, "\n");
                    $partes = explode(' ', $sinSaltoDeLinea2);
                    $nivel_propuesto = '';
                    $ruta_propuesta = '';

                    if (!empty($partes[0])) {
                        $primeraCadena = $partes[0];

                        if (str_contains($primeraCadena, 'F')) {
                            // Recupera el contenido después de 'F'
                            preg_match('/F\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_contains($primeraCadena, 'A')) {
                            // Recupera el contenido después de 'A'
                            preg_match('/A\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_ends_with($primeraCadena, 'VFR')) {
                            // Recupera 'VFR' si está presente
                            $nivel_propuesto = 'VFR';
                        }
                    }

                    if (count($partes) > 1) {
                        // Junta las partes restantes para formar la ruta propuesta
                        $ruta_propuesta = implode(' ', array_slice($partes, 1));
                        $bloques = explode(' ', $ruta_propuesta);
                        $ruta_propuesta = implode(' ', array_slice($bloques, 0, min(3, count($bloques))));
                    }
                    //FIN Nivel y Ruta Propuesta

                    // RPL
                    if (strpos($item->c8, 'RPL') !== false) {
                        $rpl = "RPL";
                    } else {
                        $rpl = "";
                    }

                    //tipo y turbulencia
                    if (strpos($item->c3, '/') !== false) {
                        // Si lo contiene, procedemos a separar el texto
                        list($tipo, $turbulencia) = explode('/', $item->c3);
                    } else {
                        // Si no lo contiene, puedes manejar el error o asignar valores predeterminados
                        $tipo = '';
                        $turbulencia = '';
                    }

                    // $equipo contendrá las letras encontradas en el orden 'W', 'G', 'R'
                    // Inicializamos la variable $equipo como una cadena vacía
                    $equipo = '';

                    // Buscamos cada letra específica en el orden dado y la agregamos a $equipo si se encuentra
                    if (strpos($item->c4, 'W') !== false) {
                        $equipo .= 'W';
                    }

                    if (strpos($item->c4, 'G') !== false) {
                        $equipo .= 'G';
                    }

                    if (strpos($item->c4, 'R') !== false) {
                        $equipo .= 'R';
                    }

                    // Inicializamos las variables con valores predeterminados
                    $destino = '';
                    $eet = '';
                    $aed_alternos = '';

                    // Validamos y extraemos los 4 primeros caracteres para la variable $destino
                    if (strlen($item->c7) >= 4) {
                        $destino = substr($item->c7, 0, 4);
                    }

                    // Validamos y extraemos los siguientes 4 caracteres que son números para la variable $eet
                    if (strlen($item->c7) >= 8) {
                        $eet = substr($item->c7, 4, 4);
                    }

                    // Validamos y extraemos el resto del texto para la variable $aed_alternos
                    if (strlen($item->c7) > 8) {
                        $aed_alternos = substr($item->c7, 8);
                    }

                    $c8 = str_replace(')', '', $item->c8);

                    $keywords = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];

                    $results = [];

                    foreach ($keywords as $keyword) {
                        // Escapa caracteres especiales para expresiones regulares
                        $escapedKeyword = preg_quote($keyword, '/');

                        // Busca la clave y extrae el valor que sigue hasta el primer espacio o salto de línea
                        if (preg_match("/" . $escapedKeyword . "([^\s]+)/", $c8, $matches)) {
                            // Elimina el '/' del keyword y guarda el resultado
                            $key = strtolower(rtrim($keyword, '/'));
                            $results[$key] = $matches[1];
                        }
                    }

                    // DEST2
                    preg_match('/DEST\/(.*?)(?:\/|$)/s', $c8, $coincidencias);
                    if (!empty($coincidencias[1])) {
                        $dest2 = trim($coincidencias[1]);
                        $dest2 = mb_substr($dest2, 0, -4);
                    } else {
                        $dest2 = "";
                    }

                    // Velocidad
                    $velocidad = 0;

                    $c6Parts = explode(' ', $item->c6);
                    if (strpos($c6Parts[0], 'N') === 0) {
                        // Si comienza con 'N': extrae 4 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 4)) ? substr($c6Parts[0], 1, 4) : 0;
                    } elseif (strpos($c6Parts[0], 'M') === 0) {
                        // Si comienza con 'M': extrae 3 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 3)) ? substr($c6Parts[0], 1, 3) : 0;
                        // Aplica la fórmula para convertir la velocidad de M a N: ($velocidad/100)/0.01*6
                        $velocidad = ($velocidad / 100) / 0.01 * 6;
                    } else {
                        $velocidad = 0;
                    }

                    // Agrega un cero adelante si la velocidad resultante es de 3 dígitos
                    if (strlen((string)$velocidad) == 3) {
                        $velocidad = '0' . $velocidad;
                    }

                    $primeraLetra = Str::substr($item->c2, 0, 1);

                    // Procesar los datos y agregarlos a $data
                    $data[] = [
                        'id'                => $item->id,
                        'fecha'             => $fecha,
                        'hora'              => $diaHora,
                        'vuelo'             => $vuelo,
                        'tipo'              => substr($tipo, -4),
                        'origen'            => substr($item->c5, 0, 4),
                        'destino'           => $destino,
                        'eobt'              => $eobt,
                        'nivel_propuesto'   => $nivel_propuesto,
                        'ruta_propuesta'    => $ruta_propuesta,
                        'eobt'              => $eobt,
                        'puntos'            => $item->c6,
                        'linea_aerea'       => $results['opr'] ?? '',
                        'velocidad'         => $velocidad,
                        'dep'               => substr($item->c5, 0, 4),
                        'etd'               => $eobt,
                        'reg'               => $results['reg'] ?? '',
                        'rpl'               => $rpl,
                        'sel'               => $results['sel'] ?? '',
                        'mensaje'           => $item->mensaje,
                        'id_estado'         => $id_estado,
                        'estado'            => $estado,
                        'color_estado'      => $color_estado,
                        'regla_tipo'        => $primeraLetra,
                        'tipo_fpl'          => $tipo_fpl,
                        'turbulencia'       => $turbulencia,
                        'equipo'            => $equipo,
                        'eet'               => $eet,
                        'aed_alternos'      => $aed_alternos,
                        'dof'               => $results['dof'] ?? '',
                        'rmk'               => $results['rmk'] ?? '',
                        'sts'               => $results['sts'] ?? '',
                        'opr'               => $results['opr'] ?? '',
                        'sel'               => $results['sel'] ?? '',
                        'nav'               => $results['nav'] ?? '',
                        'rvr'               => $results['rvr'] ?? '',
                        'dest2'              => $dest2,
                        'user_id'           => $item->user_id ?? '',
                        'user_name'         => $item->user_name ?? '',

                    ];
                }
            } catch (\Exception $e) {
            }

            $data2 = $data;

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $data2
            ]);
        } catch (RequestException $e) {
            Log::error('Error fetching data from amhspag: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data from amhspag',
            ], 500);
        }
    }

    /* public function obtenerAmhsPag(Request $request)
    {
        try {
            // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
            $inicio = $request->get('inicio', 0);
            $fin = $request->get('fin', 200);

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            $request->merge([
                'tipo_ficha' => $tipoFicha,
                'cod_oaci' => $cod_oaci,
            ]);

            try {
                // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
                $inicio = $request->input('inicio', 0);
                $fin = $request->input('fin', 200);
                $limit = $fin - $inicio;
                $offset = $inicio;
                
                $query = DB::table('fpls')

                    ->leftJoin('vista_proceso_vuelo', function ($join) use ($request) {
                        $join->on('fpls.id', '=', 'vista_proceso_vuelo.id_amhs');

                        // Agregar condición dinámica para tipo_ficha
                        if ($request->filled('tipo_ficha')) {
                            $join->where('vista_proceso_vuelo.tipo_ficha', '=', $request->input('tipo_ficha'));
                        }

                        // Agregar condición dinámica para cod_oaci
                        if ($request->filled('cod_oaci')) {
                            $join->where('vista_proceso_vuelo.pk_oaci', '=', $request->input('cod_oaci'));
                        }
                    })

                    ->leftJoin('users', 'vista_proceso_vuelo.fk_user', '=', 'users.id') // Join con users

                    ->select(
                        'fpls.id',
                        'fpls.created_at',
                        'fpls.updated_at',
                        'fpls.id_amhs',
                        'fpls.fechaHora',
                        'fpls.cabecera',
                        'fpls.mensaje',
                        'fpls.c1',
                        'fpls.c2',
                        'fpls.c3',
                        'fpls.c4',
                        'fpls.c5',
                        'fpls.c6',
                        'fpls.c7',
                        'fpls.c8',
                        'fpls.tipoMensaje',
                        'vista_proceso_vuelo.id_estado',
                        'vista_proceso_vuelo.name_estado',
                        'vista_proceso_vuelo.color_estado',
                        'users.id as user_id',
                        'users.name as user_name'
                    );

                // Aplicar filtros condicionales
                if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
                    $query->whereRaw('DATE("fpls"."fechaHora") BETWEEN ? AND ?', [$request->fecha_inicio, $request->fecha_fin]);
                }

                if ($request->filled('origen')) {
                    $query->where('fpls.c5', 'like', '%' . $request->origen . '%');
                }

                if ($request->filled('destino')) {
                    $query->where('fpls.c7', 'like', '%' . $request->destino . '%');
                }

                if ($request->filled('vuelo')) {
                    $query->where('fpls.c1', 'like', '%' . $request->vuelo . '%');
                }

                if ($request->filled('estado')) {
                    $query->where('vista_proceso_vuelo.name_estado', '=', $request->estado);
                }

                // Ordenar, aplicar límites y obtener los resultados
                $amhs = $query
                    ->orderBy('fpls.fechaHora', 'desc') // Orden descendente por fechaHora
                    ->offset($offset) // Aplicar offset
                    ->limit($limit) // Aplicar límite
                    ->get(); // Obtener resultados

                // Obtener el SQL generado
                $sql = $query->toSql();
                $bindings = $query->getBindings();
                
                // Inicializar array para almacenar los datos procesados
                $data = [];

                foreach ($amhs as $item) {
                
                    $tipo_fpl = 0;

                    // vuelo
                    $vuelo = preg_replace('/[()\s-]/', ' ', $item->c1); // Reemplaza paréntesis, espacios y guiones con espacio
                    $pos = strpos($vuelo, '/'); // Encuentra la posición del '/'

                    if ($pos !== false) {
                        $vuelo = substr($vuelo, 0, $pos); // Corta la cadena hasta antes del '/'
                    } else {
                        $vuelo = substr($vuelo, 0, 7); // Si no hay '/', corta los primeros 7 caracteres
                    }

                    if ($item->id_estado !== null) {
                        $id_estado = $item->id_estado;
                        $estado = $item->name_estado;
                        $color_estado = $item->color_estado;
                    } else {
                        $id_estado = 0;
                        $estado = 'PENDIENTE';
                        $color_estado = '#ff5722';
                    }
               
                    // Procesar otros campos
                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);
                    $fechaHora = explode(' ', $item->created_at);
                    $fecha = $fechaHora[0];
                    $hora = substr($fechaHora[1] ?? '', 0, 5);
                    $diaHora = date('d', strtotime($fecha)) . ' ' . $hora;

                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);

                    //Nivel y Ruta Propuesta
                    $sinSaltoDeLinea2 = rtrim($item->c6, "\n");
                    $partes = explode(' ', $sinSaltoDeLinea2);
                    $nivel_propuesto = '';
                    $ruta_propuesta = '';

                    if (!empty($partes[0])) {
                        $primeraCadena = $partes[0];

                        if (str_contains($primeraCadena, 'F')) {
                            // Recupera el contenido después de 'F'
                            preg_match('/F\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_contains($primeraCadena, 'A')) {
                            // Recupera el contenido después de 'A'
                            preg_match('/A\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_ends_with($primeraCadena, 'VFR')) {
                            // Recupera 'VFR' si está presente
                            $nivel_propuesto = 'VFR';
                        }
                    }

                    if (count($partes) > 1) {
                        // Junta las partes restantes para formar la ruta propuesta
                        $ruta_propuesta = implode(' ', array_slice($partes, 1));
                        $bloques = explode(' ', $ruta_propuesta);
                        $ruta_propuesta = implode(' ', array_slice($bloques, 0, min(3, count($bloques))));
                    }
                    //FIN Nivel y Ruta Propuesta

                    // RPL
                    if (strpos($item->c8, 'RPL') !== false) {
                        $rpl = "RPL";
                    } else {
                        $rpl = "";
                    }

                    //tipo y turbulencia
                    if (strpos($item->c3, '/') !== false) {
                        // Si lo contiene, procedemos a separar el texto
                        list($tipo, $turbulencia) = explode('/', $item->c3);
                    } else {
                        // Si no lo contiene, puedes manejar el error o asignar valores predeterminados
                        $tipo = '';
                        $turbulencia = '';
                    }

                    // $equipo contendrá las letras encontradas en el orden 'W', 'G', 'R'
                    // Inicializamos la variable $equipo como una cadena vacía
                    $equipo = '';

                    // Buscamos cada letra específica en el orden dado y la agregamos a $equipo si se encuentra
                    if (strpos($item->c4, 'W') !== false) {
                        $equipo .= 'W';
                    }

                    if (strpos($item->c4, 'G') !== false) {
                        $equipo .= 'G';
                    }

                    if (strpos($item->c4, 'R') !== false) {
                        $equipo .= 'R';
                    }

                    // Inicializamos las variables con valores predeterminados
                    $destino = '';
                    $eet = '';
                    $aed_alternos = '';

                    // Validamos y extraemos los 4 primeros caracteres para la variable $destino
                    if (strlen($item->c7) >= 4) {
                        $destino = substr($item->c7, 0, 4);
                    }

                    // Validamos y extraemos los siguientes 4 caracteres que son números para la variable $eet
                    if (strlen($item->c7) >= 8) {
                        $eet = substr($item->c7, 4, 4);
                    }

                    // Validamos y extraemos el resto del texto para la variable $aed_alternos
                    if (strlen($item->c7) > 8) {
                        $aed_alternos = substr($item->c7, 8);
                    }
                   
                    $c8 = str_replace(')', '', $item->c8);

                    $keywords = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];

                    $results = [];

                    foreach ($keywords as $keyword) {
                        // Escapa caracteres especiales para expresiones regulares
                        $escapedKeyword = preg_quote($keyword, '/');

                        // Busca la clave y extrae el valor que sigue hasta el primer espacio o salto de línea
                        if (preg_match("/" . $escapedKeyword . "([^\s]+)/", $c8, $matches)) {
                            // Elimina el '/' del keyword y guarda el resultado
                            $key = strtolower(rtrim($keyword, '/'));
                            $results[$key] = $matches[1];
                        }
                    }

                    // DEST2
                    preg_match('/DEST\/(.*?)(?:\/|$)/s', $c8, $coincidencias);
                    if (!empty($coincidencias[1])) {
                        $dest2 = trim($coincidencias[1]);
                        $dest2 = mb_substr($dest2, 0, -4);
                    } else {
                        $dest2 = "";
                    }

                    // Velocidad
                    $velocidad = 0;
                   
                    $c6Parts = explode(' ', $item->c6);
                    if (strpos($c6Parts[0], 'N') === 0) {
                        // Si comienza con 'N': extrae 4 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 4)) ? substr($c6Parts[0], 1, 4) : 0;
                    } elseif (strpos($c6Parts[0], 'M') === 0) {
                        // Si comienza con 'M': extrae 3 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 3)) ? substr($c6Parts[0], 1, 3) : 0;
                        // Aplica la fórmula para convertir la velocidad de M a N: ($velocidad/100)/0.01*6
                        $velocidad = ($velocidad / 100) / 0.01 * 6;
                    } else {
                        $velocidad = 0;
                    }

                    // Agrega un cero adelante si la velocidad resultante es de 3 dígitos
                    if (strlen((string)$velocidad) == 3) {
                        $velocidad = '0' . $velocidad;
                    }

                    $primeraLetra = Str::substr($item->c2, 0, 1);

                    // Procesar los datos y agregarlos a $data
                    $data[] = [
                        'id'                => $item->id,
                        'fecha'             => $fecha,
                        'hora'              => $diaHora,
                        'vuelo'             => $vuelo,
                        'tipo'              => substr($tipo, -4),
                        'origen'            => substr($item->c5, 0, 4),
                        'destino'           => $destino,
                        'eobt'              => $eobt,
                        'nivel_propuesto'   => $nivel_propuesto,
                        'ruta_propuesta'    => $ruta_propuesta,
                        'eobt'              => $eobt,
                        'puntos'            => $item->c6,
                        'linea_aerea'       => $results['opr'] ?? '',
                        'velocidad'         => $velocidad,
                        'dep'               => substr($item->c5, 0, 4),
                        'etd'               => $eobt,
                        'reg'               => $results['reg'] ?? '',
                        'rpl'               => $rpl,
                        'sel'               => $results['sel'] ?? '',
                        'mensaje'           => $item->mensaje,
                        'id_estado'         => $id_estado,
                        'estado'            => $estado,
                        'color_estado'      => $color_estado,
                        'regla_tipo'        => $primeraLetra,
                        'tipo_fpl'          => $tipo_fpl,
                        'turbulencia'       => $turbulencia,
                        'equipo'            => $equipo,
                        'eet'               => $eet,
                        'aed_alternos'      => $aed_alternos,
                        'dof'               => $results['dof'] ?? '',
                        'rmk'               => $results['rmk'] ?? '',
                        'sts'               => $results['sts'] ?? '',
                        'opr'               => $results['opr'] ?? '',
                        'sel'               => $results['sel'] ?? '',
                        'nav'               => $results['nav'] ?? '',
                        'rvr'               => $results['rvr'] ?? '',
                        'dest2'              => $dest2,
                        'user_id'           => $item->user_id ?? '',
                        'user_name'         => $item->user_name ?? '',

                    ];
                }
                
            } catch (\Exception $e) {
                
            }

            $data2 = $data;

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $data2
            ]);
        } catch (RequestException $e) {
            Log::error('Error fetching data from amhspag: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data from amhspag',
            ], 500);
        }
    } */

    /* public function obtenerEstados(Request $request)
    {
        try {
            // Obtener el valor de 'limit' de la solicitud, usar un valor predeterminado si no se proporciona
            $limit = $request->input('limit', 200); // Si no se envía 'limit', se usará 200 como valor por defecto

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            $procesos = DB::table('proceso_vuelo')
                ->join('users', 'proceso_vuelo.fk_user', '=', 'users.id')
                ->join('user_tips', 'proceso_vuelo.fk_user', '=', 'user_tips.pk_id_user')
                ->select(
                    'proceso_vuelo.id_amhs',
                    'proceso_vuelo.id_estado',
                    'proceso_vuelo.name_estado',
                    'proceso_vuelo.color_estado',
                    'proceso_vuelo.tipo_fpl',
                    'proceso_vuelo.created_at',
                    'proceso_vuelo.fk_user',
                    'users.name',
                    'user_tips.pk_oaci'
                )
                ->where('proceso_vuelo.tipo_ficha', $tipoFicha) // Filtro por tipo_ficha
                ->where('user_tips.pk_oaci', $cod_oaci) // Filtro adicional por pk_oaci en user_tips
                ->orderBy('proceso_vuelo.id', 'desc')
                ->limit($limit)
                ->get();

            foreach ($procesos as $proceso) {
                if ($proceso->id_estado >= 3) {
                    $createdAtUTC = Carbon::parse($proceso->created_at);
                    $nowUTC = Carbon::now('UTC');
                    $diffInHours = $createdAtUTC->diffInHours($nowUTC);
                    $proceso->cerrado = $diffInHours > 4 ? 1 : 0;
                } else {
                    $proceso->cerrado = 0;
                }
            }

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $procesos
            ], 200);
        } catch (\Exception $e) {
            // Manejo de errores y devolver error en formato JSON
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los procesos de vuelo: ' . $e->getMessage()
            ], 500);
        }
    } */

    public function obtenerEstados(Request $request)
    {
        try {
            // Siempre traer los últimos 500 registros
            $limit = 500;

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            if (!$userTip) {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontró información del usuario.'
                ], 404);
            }

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            // Consulta principal
            $procesos = DB::table('proceso_vuelo')
                ->join('users', 'proceso_vuelo.fk_user', '=', 'users.id')
                ->join('user_tips', 'proceso_vuelo.fk_user', '=', 'user_tips.pk_id_user')
                ->select(
                    'proceso_vuelo.id_amhs',
                    'proceso_vuelo.id_estado',
                    'proceso_vuelo.name_estado',
                    'proceso_vuelo.color_estado',
                    'proceso_vuelo.tipo_fpl',
                    'proceso_vuelo.created_at',
                    'proceso_vuelo.fk_user',
                    'users.name',
                    'user_tips.pk_oaci',
                    'cerrado',
                )
                ->where('proceso_vuelo.tipo_ficha', $tipoFicha)
                ->where('user_tips.pk_oaci', $cod_oaci)
                ->orderByDesc('proceso_vuelo.id') // Traer últimos registros
                ->limit($limit)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $procesos
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los procesos de vuelo: ' . $e->getMessage()
            ], 500);
        }
    }

    public function FPLCreados(Request $request)
    {
        try {

            // Obtener los registros de proceso_vuelo y FichaEstado con el límite especificado
            $procesos = DB::table('proceso_vuelo')
                ->where('tipo_fpl', 1)
                ->orderBy('proceso_vuelo.id', 'desc')
                ->get();

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $procesos
            ], 200);
        } catch (\Exception $e) {
            // Manejo de errores y devolver error en formato JSON
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los procesos de vuelo: ' . $e->getMessage()
            ], 500);
        }
    }

    public function loadMoreData(Request $request)
    {
        $inicio = $request->input('inicio', 0);
        $fin = $request->input('fin', 100);

        /* $servicio2 = new Client([
            'base_uri' => env('TRANSITO_API_URL'),
        ]);

        $response2 = $servicio2->request('GET', '/api/amhs/data-desc', [
            'query' => [
                'inicio' => $inicio,
                'fin' => $fin
            ]
        ]);

        $data2Response = json_decode($response2->getBody()->getContents());

        // Extraer los datos de la paginación
        if (isset($data2Response->data)) {
            $data2 = $data2Response->data;
        } else {
            $data2 = [];
        } */

        try {
            // Obtener los valores de inicio y fin desde la solicitud
            $inicio = $request->input('inicio', 0);
            $fin = $request->input('fin', 100);

            // Obtener los registros de fpls comenzando desde el ID proporcionado
            $amhs = DB::table('fpls')
                ->select('id', 'created_at', 'updated_at', 'id_amhs', 'fechaHora', 'cabecera', 'mensaje', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'tipoMensaje', 'ca_tipo', 'ca_idUsu', 'ca_estado')
                ->where('id', '<', $inicio)
                // ⬇️ Excluir cabeceras que contengan KDENXLDC (incluye NULL)
                ->whereRaw("COALESCE(cabecera,'') NOT ILIKE ?", ['%KDENXLDC%'])
                ->orderBy('fechaHora', 'desc')
                ->limit($fin)
                ->get();

            // Obtener todos los ids de amhs
            $amhsIds = $amhs->pluck('id');

            // Obtener todos los registros de proceso_vuelo en una sola consulta
            $procesos = DB::table('proceso_vuelo')
                ->whereIn('id_amhs', $amhsIds)
                ->select('id_amhs', 'id_estado', 'tipo_fpl')
                ->get()
                ->keyBy('id_amhs');

            // Obtener todos los ids_estado y buscar las fichas asociadas
            $estadoIds = $procesos->pluck('id_estado')->filter();
            // $fichaEstados = FichaEstado::whereIn('id', $estadoIds)->get()->keyBy('id');
            $fichaEstados = DB::table('ficha_estados')
                ->whereIn('id', $estadoIds)
                ->get()
                ->keyBy('id');

            // Inicializar array para almacenar los datos procesados
            $data = [];

            // Procesar cada elemento
            foreach ($amhs as $item) {
                // Obtener el registro correspondiente de proceso_vuelo
                $proceso = $procesos->get($item->id);
                $id_estado = $proceso ? $proceso->id_estado : 0;
                $tipo_fpl = $proceso ? $proceso->tipo_fpl : 0;

                // Obtener el estado real de FichaEstado
                $fichaEstado = $fichaEstados->get($id_estado);
                $estado = $fichaEstado ? $fichaEstado->estado : 'PENDIENTE';
                $color_estado = $fichaEstado ? $fichaEstado->color_estado : '#ff5722';

                // vuelo
                $vuelo = preg_replace('/[()\s-]/', ' ', $item->c1); // Reemplaza paréntesis, espacios y guiones con espacio
                $pos = strpos($vuelo, '/'); // Encuentra la posición del '/'

                if ($pos !== false) {
                    $vuelo = substr($vuelo, 0, $pos); // Corta la cadena hasta antes del '/'
                } else {
                    $vuelo = substr($vuelo, 0, 7); // Si no hay '/', corta los primeros 7 caracteres
                }

                // EOBT
                $sinSaltoDeLinea = rtrim($item->c5, "\n");
                $eobt = substr($sinSaltoDeLinea, 4, 8);

                //Nivel y Ruta Propuesta
                $sinSaltoDeLinea2 = rtrim($item->c6, "\n");
                $partes = explode(' ', $sinSaltoDeLinea2);
                $nivel_propuesto = '';
                $ruta_propuesta = '';

                if (!empty($partes[0])) {
                    $primeraCadena = $partes[0];

                    if (str_contains($primeraCadena, 'F')) {
                        // Recupera el contenido después de 'F'
                        preg_match('/F\d{3}/', $primeraCadena, $matches);
                        $nivel_propuesto = $matches[0] ?? '';
                    } elseif (str_contains($primeraCadena, 'A')) {
                        // Recupera el contenido después de 'A'
                        preg_match('/A\d{3}/', $primeraCadena, $matches);
                        $nivel_propuesto = $matches[0] ?? '';
                    } elseif (str_ends_with($primeraCadena, 'VFR')) {
                        // Recupera 'VFR' si está presente
                        $nivel_propuesto = 'VFR';
                    }
                }

                if (count($partes) > 1) {
                    // Junta las partes restantes para formar la ruta propuesta
                    $ruta_propuesta = implode(' ', array_slice($partes, 1));
                    $bloques = explode(' ', $ruta_propuesta);
                    $ruta_propuesta = implode(' ', array_slice($bloques, 0, min(3, count($bloques))));
                }
                //FIN Nivel y Ruta Propuesta

                // RPL
                if (strpos($item->c8, 'RPL') !== false) {
                    $rpl = "RPL";
                } else {
                    $rpl = "";
                }

                //tipo y turbulencia
                if (strpos($item->c3, '/') !== false) {
                    // Si lo contiene, procedemos a separar el texto
                    list($tipo, $turbulencia) = explode('/', $item->c3);
                } else {
                    // Si no lo contiene, puedes manejar el error o asignar valores predeterminados
                    $tipo = '';
                    $turbulencia = '';
                }

                // $equipo contendrá las letras encontradas en el orden 'W', 'G', 'R'
                // Inicializamos la variable $equipo como una cadena vacía
                $equipo = '';

                // Buscamos cada letra específica en el orden dado y la agregamos a $equipo si se encuentra
                if (strpos($item->c4, 'W') !== false) {
                    $equipo .= 'W';
                }

                if (strpos($item->c4, 'G') !== false) {
                    $equipo .= 'G';
                }

                if (strpos($item->c4, 'R') !== false) {
                    $equipo .= 'R';
                }

                // Validamos y extraemos los 4 primeros caracteres para la variable $destino
                if (strlen($item->c7) >= 4) {
                    $destino = substr($item->c7, 0, 4);
                }

                // Validamos y extraemos los siguientes 4 caracteres que son números para la variable $eet
                if (strlen($item->c7) >= 8) {
                    $eet = substr($item->c7, 4, 4);
                }

                // Validamos y extraemos el resto del texto para la variable $aed_alternos
                if (strlen($item->c7) > 8) {
                    $aed_alternos = substr($item->c7, 8);
                }

                // Separar fecha y hora
                $fechaHora = explode(' ', $item->created_at);
                $fecha = $fechaHora[0];
                $hora = substr($fechaHora[1] ?? '', 0, 5);
                $diaHora = date('d', strtotime($fecha)) . ' ' . $hora;

                // Inicializar variables para los datos extraídos
                $pbn = $eet = $reg = $opr = $rmk = $dof = $sel = $nav = $per = $code = $dep = $dest = $sts = $dat = $sur = $ralt = $com = $rvr = '';

                // Procesar el campo c8
                /* $c8 = $item->c8;
                $sequences = [
                    'PBN/',
                    'EET/',
                    'REG/',
                    'OPR/',
                    'RMK/',
                    'DOF/',
                    'SEL/',
                    'NAV/',
                    'PER/',
                    'CODE/',
                    'DEP/',
                    'DEST/',
                    'STS/',
                    'DAT/',
                    'SUR/',
                    'RALT/',
                    'COM/',
                    'RVR/'
                ];
                $results = [];
                foreach ($sequences as $sequence) {
                    $pattern = '/' . preg_quote($sequence, '/') . '(.*?)\s+(?=(PBN\/|EET\/|REG\/|OPR\/|RMK\/|DOF\/|SEL\/|NAV\/|PER\/|CODE\/|DEP\/|DEST\/|STS\/|DAT\/|SUR\/|RALT\/|COM\/|RVR\/|FPL))/';
                    if (preg_match($pattern, $c8, $matches)) {
                        $results[strtolower(str_replace('/', '', $sequence))] = trim($matches[1]);
                    }
                } */

                $c8 = str_replace(')', '', $item->c8);

                $keywords = [
                    'PBN/',
                    'EET/',
                    'REG/',
                    'OPR/',
                    'RMK/',
                    'DOF/',
                    'SEL/',
                    'NAV/',
                    'PER/',
                    'CODE/',
                    'DEP/',
                    'DEST/',
                    'STS/',
                    'DAT/',
                    'SUR/',
                    'RALT/',
                    'COM/',
                    'RVR/'
                ];

                $results = [];

                foreach ($keywords as $keyword) {
                    // Escapa caracteres especiales para expresiones regulares
                    $escapedKeyword = preg_quote($keyword, '/');

                    // Busca la clave y extrae el valor que sigue hasta el primer espacio o salto de línea
                    if (preg_match("/" . $escapedKeyword . "([^\s]+)/", $c8, $matches)) {
                        // Elimina el '/' del keyword y guarda el resultado
                        $key = strtolower(rtrim($keyword, '/'));
                        $results[$key] = $matches[1];
                    }
                }

                // DEST2
                preg_match('/DEST\/(.*?)(?:\/|$)/s', $c8, $coincidencias);
                if (!empty($coincidencias[1])) {
                    $dest2 = trim($coincidencias[1]);
                    $dest2 = mb_substr($dest2, 0, -4);
                } else {
                    $dest2 = "";
                }

                // Extraer la velocidad de c6
                // Velocidad
                $velocidad = 0;

                /* $c6Parts = explode(' ', $item->c6);
                if (($position = strpos($c6Parts[0], 'N')) !== false) {
                    $velocidad = is_numeric(substr($c6Parts[0], $position + 1, 4)) ? substr($c6Parts[0], $position + 1, 4) : 0;
                } */

                $c6Parts = explode(' ', $item->c6);
                if (strpos($c6Parts[0], 'N') === 0) {
                    // Si comienza con 'N': extrae 4 dígitos a partir del segundo carácter
                    $velocidad = is_numeric(substr($c6Parts[0], 1, 4)) ? substr($c6Parts[0], 1, 4) : 0;
                } elseif (strpos($c6Parts[0], 'M') === 0) {
                    // Si comienza con 'M': extrae 3 dígitos a partir del segundo carácter
                    $velocidad = is_numeric(substr($c6Parts[0], 1, 3)) ? substr($c6Parts[0], 1, 3) : 0;
                    // Aplica la fórmula para convertir la velocidad de M a N: ($velocidad/100)/0.01*6
                    $velocidad = ($velocidad / 100) / 0.01 * 6;
                } else {
                    $velocidad = 0;
                }

                // Agrega un cero adelante si la velocidad resultante es de 3 dígitos
                if (strlen((string)$velocidad) == 3) {
                    $velocidad = '0' . $velocidad;
                }

                // Procesar el campo c2 para regla_tipo
                $primeraLetra = Str::substr($item->c2, 0, 1);

                // Recuperar FPL Nuevos
                $campos = [
                    'id',
                    'fecha',
                    'hora',
                    'vuelo',
                    'tipo',
                    'origen',
                    'destino',
                    'eobt',
                    'puntos_mensaje',
                    'linea_aerea',
                    'velocidad',
                    'dep',
                    'etd',
                    'reg',
                    'sel',
                    'mensaje',
                    'id_estado',
                    'name_estado',
                    'color_estado',
                    'regla_tipo',
                    'tipo_fpl',
                    'fecha_creado',
                    'turbulencia',
                    'equipo',
                    'eet',
                    'aed_alternos',
                    'dof',
                    'rmk',
                    'sts',
                    'opr',
                    'sel',
                    'nav',
                    'rvr',
                ];

                $idAmhsCreado = $item->id;

                $registros = DB::table('proceso_vuelo')
                    ->select($campos)
                    ->where('id_amhs_creado', $idAmhsCreado)
                    ->where('tipo_fpl', 1)
                    ->get();

                // Procesar los datos obtenidos
                foreach ($registros as $registro) {
                    // Convertir la fecha_creado en un objeto Carbon para facilitar el formateo
                    $carbonDate = Carbon::parse($registro->fecha_creado);

                    // Variable $fecha con el formato AAAA-MM-DD
                    $fecha = $carbonDate->format('Y-m-d');

                    // Variable $hora con el formato DD HH:MM
                    $hora = $carbonDate->format('d H:i');

                    $data[] = [
                        'id'                => $registro->id,
                        'fecha'             => $fecha,
                        'hora'              => $hora,
                        'vuelo'             => $registro->vuelo,
                        'tipo'              => $registro->tipo,
                        'origen'            => $registro->origen,
                        'destino'           => $registro->destino,
                        'eobt'              => $registro->eobt,
                        'nivel_propuesto'   => $nivel_propuesto,
                        'ruta_propuesta'    => $ruta_propuesta,
                        'puntos'            => $registro->puntos_mensaje,
                        'linea_aerea'       => $registro->linea_aerea,
                        'velocidad'         => $registro->velocidad,
                        'dep'               => $registro->dep,
                        'etd'               => $registro->etd,
                        'reg'               => $registro->reg,
                        'sel'               => $registro->sel,
                        'mensaje'           => $registro->mensaje,
                        'id_estado'         => $registro->id_estado,
                        'estado'            => $registro->name_estado,
                        'color_estado'      => $registro->color_estado,
                        'regla_tipo'        => $registro->regla_tipo,
                        'tipo_fpl'          => $registro->tipo_fpl,
                        'turbulencia'       => $registro->turbulencia,
                        'equipo'            => $registro->equipo,
                        'eet'               => $registro->eet,
                        'aed_alternos'      => $registro->aed_alternos,
                        'dof'               => $registro->dof,
                        'rmk'               => $registro->rmk,
                        'sts'               => $registro->sts,
                        'opr'               => $registro->opr,
                        'sel'               => $registro->sel,
                        'nav'               => $registro->nav,
                        'rvr'               => $registro->rvr,
                        'dest2'              => $registro->dest2,
                    ];
                }

                // Agregar los datos procesados al array
                $data[] = [
                    'id'                => $item->id,
                    'fecha'             => $fecha,
                    'hora'              => $diaHora,
                    'vuelo'             => $vuelo,
                    'tipo'              => substr($tipo, -4),
                    'origen'            => substr($item->c5, 0, 4),
                    'destino'           => $destino,
                    'eobt'              => $eobt,
                    'nivel_propuesto'   => $nivel_propuesto,
                    'ruta_propuesta'    => $ruta_propuesta,
                    'puntos'            => $item->c6,
                    'linea_aerea'       => $results['opr'] ?? '',
                    'velocidad'         => $velocidad,
                    'dep'               => substr($item->c5, 0, 4),
                    'etd'               => $eobt,
                    'reg'               => $results['reg'] ?? '',
                    'rpl'               => $rpl,
                    'sel'               => $results['sel'] ?? '',
                    'mensaje'           => $item->mensaje,
                    'id_estado'         => $id_estado,
                    'estado'            => $estado,
                    'color_estado'      => $color_estado,
                    'regla_tipo'        => $primeraLetra,
                    'tipo_fpl'          => $tipo_fpl,
                    'turbulencia'       => $turbulencia,
                    'equipo'            => $equipo,
                    'eet'               => $eet,
                    'aed_alternos'      => $aed_alternos,
                    'dof'               => $results['dof'] ?? '',
                    'rmk'               => $results['rmk'] ?? '',
                    'sts'               => $results['sts'] ?? '',
                    'opr'               => $results['opr'] ?? '',
                    'sel'               => $results['sel'] ?? '',
                    'nav'               => $results['nav'] ?? '',
                    'rvr'               => $results['rvr'] ?? '',
                    'dest2'              => $dest2,
                ];
            }

            // Devolver la respuesta con el array de datos procesados
            /* return response()->json([
                'response'   => '000',
                'error'      => '',
                'message'    => 'OK',
                'statusCode' => '200',
                'data'       => $data
            ]); */
        } catch (\Exception $e) {
            /* Log::error('Error interno: ' . $e->getMessage()); */
            /* return response()->json([
                'respuesta'  => '001',
                'error'      => 'Ha ocurrido un error interno',
                'mensaje'    => 'NOK',
                'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'data'       => ''
            ]); */
        }

        // Extraer los datos de la paginación
        if (isset($data)) {
            $data2 = $data;
        } else {
            $data2 = [];
        }

        return response()->json($data2);
    }

    public function loadNewData(Request $request)
    {
        // Obtener el lastId desde la solicitud
        $lastId = $request->input('lastId', 0);

        $request->merge([
            'lastId' => $lastId,
        ]);

        // Log::info('LAST ID', [$lastId]);

        // URL del servicio externo
        // $url = '/api/get-new-data-amhs';

        try {
            // Crear una instancia del cliente Guzzle
            /* $servicio2 = new Client([
                'base_uri' => env('TRANSITO_API_URL'),
            ]);

            // Hacer la solicitud GET al servicio externo
            $response2 = $servicio2->request('GET', $url, [
                'query' => [
                    'lastId' => $lastId
                ]
            ]);

            // Obtener el contenido de la respuesta
            $data2Response = json_decode($response2->getBody()->getContents()); */

            try {
                // Inicializar el array para almacenar los datos procesados
                $data = [];

                // Obtener el valor del último ID desde la solicitud
                $lastId = $request->input('lastId', 0);

                // Obtener los registros que tienen un ID mayor al último ID proporcionado
                $amhs = DB::table('fpls')
                    ->select('id', 'created_at', 'updated_at', 'id_amhs', 'fechaHora', 'cabecera', 'mensaje', 'c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'tipoMensaje', 'ca_tipo', 'ca_idUsu', 'ca_estado')
                    ->where('id', '>', $lastId)
                    // ⬇️ excluir cabeceras que contengan KDENXLDC (cubre NULL también)
                    ->whereRaw("COALESCE(cabecera,'') NOT ILIKE ?", ['%KDENXLDC%'])
                    ->orderBy('fechaHora', 'desc')
                    ->limit(100)
                    ->get();

                // Obtener todos los ids de amhs
                $amhsIds = $amhs->pluck('id');

                // Obtener todos los registros de proceso_vuelo en una sola consulta
                $procesos = DB::table('proceso_vuelo')
                    ->whereIn('id_amhs', $amhsIds)
                    ->select('id_amhs', 'id_estado', 'tipo_fpl')
                    ->get()
                    ->keyBy('id_amhs');

                // Obtener todos los ids_estado y buscar las fichas asociadas
                $estadoIds = $procesos->pluck('id_estado')->filter();
                // $fichaEstados = FichaEstado::whereIn('id', $estadoIds)->get()->keyBy('id');
                $fichaEstados = DB::table('ficha_estados')
                    ->whereIn('id', $estadoIds)
                    ->get()
                    ->keyBy('id');

                // Procesar cada elemento
                foreach ($amhs as $item) {
                    // Obtener el registro correspondiente de proceso_vuelo
                    $proceso = $procesos->get($item->id);
                    $id_estado = $proceso ? $proceso->id_estado : 0;
                    $tipo_fpl = $proceso ? $proceso->tipo_fpl : 0;

                    // Obtener el estado real de FichaEstado
                    $fichaEstado = $fichaEstados->get($id_estado);
                    $estado = $fichaEstado ? $fichaEstado->estado : 'PENDIENTE';
                    $color_estado = $fichaEstado ? $fichaEstado->color_estado : '#ff5722';

                    // vuelo
                    $vuelo = preg_replace('/[()\s-]/', ' ', $item->c1); // Reemplaza paréntesis, espacios y guiones con espacio
                    $pos = strpos($vuelo, '/'); // Encuentra la posición del '/'

                    if ($pos !== false) {
                        $vuelo = substr($vuelo, 0, $pos); // Corta la cadena hasta antes del '/'
                    } else {
                        $vuelo = substr($vuelo, 0, 7); // Si no hay '/', corta los primeros 7 caracteres
                    }

                    // EOBT
                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);

                    //Nivel y Ruta Propuesta
                    $sinSaltoDeLinea2 = rtrim($item->c6, "\n");
                    $partes = explode(' ', $sinSaltoDeLinea2);
                    $nivel_propuesto = '';
                    $ruta_propuesta = '';

                    if (!empty($partes[0])) {
                        $primeraCadena = $partes[0];

                        if (str_contains($primeraCadena, 'F')) {
                            // Recupera el contenido después de 'F'
                            preg_match('/F\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_contains($primeraCadena, 'A')) {
                            // Recupera el contenido después de 'A'
                            preg_match('/A\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_ends_with($primeraCadena, 'VFR')) {
                            // Recupera 'VFR' si está presente
                            $nivel_propuesto = 'VFR';
                        }
                    }

                    if (count($partes) > 1) {
                        // Junta las partes restantes para formar la ruta propuesta
                        $ruta_propuesta = implode(' ', array_slice($partes, 1));
                        $bloques = explode(' ', $ruta_propuesta);
                        $ruta_propuesta = implode(' ', array_slice($bloques, 0, min(3, count($bloques))));
                    }
                    //FIN Nivel y Ruta Propuesta

                    // RPL
                    if (strpos($item->c8, 'RPL') !== false) {
                        $rpl = "RPL";
                    } else {
                        $rpl = "";
                    }

                    //tipo y turbulencia
                    if (strpos($item->c3, '/') !== false) {
                        // Si lo contiene, procedemos a separar el texto
                        list($tipo, $turbulencia) = explode('/', $item->c3);
                    } else {
                        // Si no lo contiene, puedes manejar el error o asignar valores predeterminados
                        $tipo = '';
                        $turbulencia = '';
                    }

                    // $equipo contendrá las letras encontradas en el orden 'W', 'G', 'R'
                    // Inicializamos la variable $equipo como una cadena vacía
                    $equipo = '';

                    // Buscamos cada letra específica en el orden dado y la agregamos a $equipo si se encuentra
                    if (strpos($item->c4, 'W') !== false) {
                        $equipo .= 'W';
                    }

                    if (strpos($item->c4, 'G') !== false) {
                        $equipo .= 'G';
                    }

                    if (strpos($item->c4, 'R') !== false) {
                        $equipo .= 'R';
                    }

                    // Validamos y extraemos los 4 primeros caracteres para la variable $destino
                    if (strlen($item->c7) >= 4) {
                        $destino = substr($item->c7, 0, 4);
                    }

                    // Validamos y extraemos los siguientes 4 caracteres que son números para la variable $eet
                    if (strlen($item->c7) >= 8) {
                        $eet = substr($item->c7, 4, 4);
                    }

                    // Validamos y extraemos el resto del texto para la variable $aed_alternos
                    if (strlen($item->c7) > 8) {
                        $aed_alternos = substr($item->c7, 8);
                    }

                    // Separar fecha y hora
                    $fechaHora = explode(' ', $item->created_at);
                    $fecha = $fechaHora[0];
                    $hora = substr($fechaHora[1] ?? '', 0, 5);
                    $diaHora = date('d', strtotime($fecha)) . ' ' . $hora;

                    // Inicializar variables
                    $pbn = $eet = $reg = $opr = $rmk = $dof = $sel = $nav = $per = $code = $dep = $dest = $sts = $dat = $sur = $ralt = $com = $rvr = '';

                    // Procesar el campo c8
                    /* $c8 = $item->c8;
                    $sequences = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];
                    $results = [];
                    foreach ($sequences as $sequence) {
                        $pattern = '/' . preg_quote($sequence, '/') . '(.*?)\s+(?=(PBN\/|EET\/|REG\/|OPR\/|RMK\/|DOF\/|SEL\/|NAV\/|PER\/|CODE\/|DEP\/|DEST\/|STS\/|DAT\/|SUR\/|RALT\/|COM\/|RVR\/|FPL))/';
                        if (preg_match($pattern, $c8, $matches)) {
                            $results[strtolower(str_replace('/', '', $sequence))] = trim($matches[1]);
                        }
                    } */

                    $c8 = str_replace(')', '', $item->c8);

                    $keywords = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];

                    $results = [];

                    foreach ($keywords as $keyword) {
                        // Escapa caracteres especiales para expresiones regulares
                        $escapedKeyword = preg_quote($keyword, '/');

                        // Busca la clave y extrae el valor que sigue hasta el primer espacio o salto de línea
                        if (preg_match("/" . $escapedKeyword . "([^\s]+)/", $c8, $matches)) {
                            // Elimina el '/' del keyword y guarda el resultado
                            $key = strtolower(rtrim($keyword, '/'));
                            $results[$key] = $matches[1];
                        }
                    }

                    // DEST2
                    preg_match('/DEST\/(.*?)(?:\/|$)/s', $c8, $coincidencias);
                    if (!empty($coincidencias[1])) {
                        $dest2 = trim($coincidencias[1]);
                        $dest2 = mb_substr($dest2, 0, -4);
                    } else {
                        $dest2 = "";
                    }

                    // Extraer la velocidad de c6
                    // Velocidad
                    $velocidad = 0;

                    /* $c6Parts = explode(' ', $item->c6);
                    if (($position = strpos($c6Parts[0], 'N')) !== false) {
                        $velocidad = is_numeric(substr($c6Parts[0], $position + 1, 4)) ? substr($c6Parts[0], $position + 1, 4) : 0;
                    } */

                    $c6Parts = explode(' ', $item->c6);
                    if (strpos($c6Parts[0], 'N') === 0) {
                        // Si comienza con 'N': extrae 4 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 4)) ? substr($c6Parts[0], 1, 4) : 0;
                    } elseif (strpos($c6Parts[0], 'M') === 0) {
                        // Si comienza con 'M': extrae 3 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 3)) ? substr($c6Parts[0], 1, 3) : 0;
                        // Aplica la fórmula para convertir la velocidad de M a N: ($velocidad/100)/0.01*6
                        $velocidad = ($velocidad / 100) / 0.01 * 6;
                    } else {
                        $velocidad = 0;
                    }

                    // Agrega un cero adelante si la velocidad resultante es de 3 dígitos
                    if (strlen((string)$velocidad) == 3) {
                        $velocidad = '0' . $velocidad;
                    }

                    // Procesar el campo c2 para regla_tipo
                    $primeraLetra = Str::substr($item->c2, 0, 1);

                    // Recuperar FPL Nuevos
                    $campos = [
                        'id',
                        'fecha',
                        'hora',
                        'vuelo',
                        'tipo',
                        'origen',
                        'destino',
                        'eobt',
                        'puntos_mensaje',
                        'linea_aerea',
                        'velocidad',
                        'dep',
                        'etd',
                        'reg',
                        'sel',
                        'mensaje',
                        'id_estado',
                        'name_estado',
                        'color_estado',
                        'regla_tipo',
                        'tipo_fpl',
                        'fecha_creado',
                        'turbulencia',
                        'equipo',
                        'eet',
                        'aed_alternos',
                        'dof',
                        'rmk',
                        'sts',
                        'opr',
                        'sel',
                        'nav',
                        'rvr',
                    ];

                    $idAmhsCreado = $item->id;

                    $registros = DB::table('proceso_vuelo')
                        ->select($campos)
                        ->where('id_amhs_creado', $idAmhsCreado)
                        ->where('tipo_fpl', 1)
                        ->get();

                    // Procesar los datos obtenidos
                    foreach ($registros as $registro) {
                        // Convertir la fecha_creado en un objeto Carbon para facilitar el formateo
                        $carbonDate = Carbon::parse($registro->fecha_creado);

                        // Variable $fecha con el formato AAAA-MM-DD
                        $fecha = $carbonDate->format('Y-m-d');

                        // Variable $hora con el formato DD HH:MM
                        $hora = $carbonDate->format('d H:i');

                        $data[] = [
                            'id'                => $registro->id,
                            'fecha'             => $fecha,
                            'hora'              => $hora,
                            'vuelo'             => $registro->vuelo,
                            'tipo'              => $registro->tipo,
                            'origen'            => $registro->origen,
                            'destino'           => $registro->destino,
                            'eobt'              => $registro->eobt,
                            'nivel_propuesto'   => $nivel_propuesto,
                            'ruta_propuesta'    => $ruta_propuesta,
                            'puntos'            => $registro->puntos_mensaje,
                            'linea_aerea'       => $registro->linea_aerea,
                            'velocidad'         => $registro->velocidad,
                            'dep'               => $registro->dep,
                            'etd'               => $registro->etd,
                            'reg'               => $registro->reg,
                            'sel'               => $registro->sel,
                            'mensaje'           => $registro->mensaje,
                            'id_estado'         => $registro->id_estado,
                            'estado'            => $registro->name_estado,
                            'color_estado'      => $registro->color_estado,
                            'regla_tipo'        => $registro->regla_tipo,
                            'tipo_fpl'          => $registro->tipo_fpl,
                            'turbulencia'       => $registro->turbulencia,
                            'equipo'            => $registro->equipo,
                            'eet'               => $registro->eet,
                            'aed_alternos'      => $registro->$aed_alternos,
                            'dof'               => $registro->dof,
                            'rmk'               => $registro->rmk,
                            'sts'               => $registro->sts,
                            'opr'               => $registro->opr,
                            'sel'               => $registro->sel,
                            'nav'               => $registro->nav,
                            'rvr'               => $registro->rvr,
                            'dest2'              => $registro->dest2,
                        ];
                    }

                    // Agregar los datos procesados al array
                    $data[] = [
                        'id'                => $item->id,
                        'fecha'             => $fecha,
                        'hora'              => $diaHora,
                        'vuelo'             => $vuelo,
                        'tipo'              => substr($tipo, -4),
                        'origen'            => substr($item->c5, 0, 4),
                        'destino'           => $destino,
                        'eobt'              => $eobt,
                        'nivel_propuesto'   => $nivel_propuesto,
                        'ruta_propuesta'    => $ruta_propuesta,
                        'puntos'            => $item->c6,
                        'linea_aerea'       => $results['opr'] ?? '',
                        'velocidad'         => $velocidad,
                        'dep'               => substr($item->c5, 0, 4),
                        'etd'               => $eobt,
                        'reg'               => $results['reg'] ?? '',
                        'rpl'               => $rpl,
                        'sel'               => $results['sel'] ?? '',
                        'mensaje'           => $item->mensaje,
                        'id_estado'         => $id_estado,
                        'estado'            => $estado,
                        'color_estado'      => $color_estado,
                        'regla_tipo'        => $primeraLetra,
                        'tipo_fpl'          => $tipo_fpl,
                        'turbulencia'       => $turbulencia,
                        'equipo'            => $equipo,
                        'eet'               => $eet,
                        'aed_alternos'      => $aed_alternos,
                        'dof'               => $results['dof'] ?? '',
                        'rmk'               => $results['rmk'] ?? '',
                        'sts'               => $results['sts'] ?? '',
                        'opr'               => $results['opr'] ?? '',
                        'sel'               => $results['sel'] ?? '',
                        'nav'               => $results['nav'] ?? '',
                        'rvr'               => $results['rvr'] ?? '',
                        'dest2'              => $dest2,
                    ];
                }

                // Retornar los datos en la respuesta
                /* return response()->json([
                    'response'   => '000',
                    'error'      => '',
                    'message'    => 'OK',
                    'statusCode' => '200',
                    'data'       => $data
                ]); */
            } catch (\Exception $e) {
                /* Log::error('Error interno: ' . $e->getMessage()); */
                /* return response()->json([
                    'respuesta'  => '001',
                    'error'      => 'Ha ocurrido un error interno',
                    'mensaje'    => 'NOK',
                    'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'data'       => ''
                ]); */
            }

            // Extraer los datos de la respuesta
            if (isset($data)) {
                $data2 = $data;
            } else {
                $data2 = [];
            }

            // Devolver la respuesta en formato JSON
            return response()->json([
                'response'   => '000',
                'error'      => '',
                'message'    => 'OK',
                'statusCode' => '200',
                'data'       => $data2
            ]);
        } catch (RequestException $e) {
            // Manejar errores de la solicitud
            return response()->json([
                'response'   => '001',
                'error'      => 'Error fetching data from external service',
                'message'    => 'NOK',
                'statusCode' => $e->getCode(),
                'data'       => ''
            ]);
        }
    }

    public function buscador_amhs(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $vuelo = $request->input('vuelo');
        $origen = $request->input('origen');
        $destino = $request->input('destino');
        $estado = $request->input('estado');

        try {
            // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
            $inicio = $request->get('inicio', 0);
            $fin = $request->get('fin', 2000);

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            $request->merge([
                'tipo_ficha' => $tipoFicha,
                'cod_oaci' => $cod_oaci,
            ]);

            try {
                // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
                $inicio = $request->input('inicio', 0);
                $fin = $request->input('fin', 2000);
                $limit = $fin - $inicio;
                $offset = $inicio;

                $query = DB::table('fpls')

                    ->leftJoin('vista_proceso_vuelo', function ($join) use ($request) {
                        $join->on('fpls.id', '=', 'vista_proceso_vuelo.id_amhs');

                        // Agregar condición dinámica para tipo_ficha
                        if ($request->filled('tipo_ficha')) {
                            $join->where('vista_proceso_vuelo.tipo_ficha', '=', $request->input('tipo_ficha'));
                        }

                        // Agregar condición dinámica para cod_oaci
                        if ($request->filled('cod_oaci')) {
                            $join->where('vista_proceso_vuelo.pk_oaci', '=', $request->input('cod_oaci'));
                        }
                    })

                    ->leftJoin('users', 'vista_proceso_vuelo.fk_user', '=', 'users.id') // Join con users

                    ->select(
                        'fpls.id',
                        'fpls.created_at',
                        'fpls.updated_at',
                        'fpls.id_amhs',
                        'fpls.fechaHora',
                        'fpls.cabecera',
                        'fpls.mensaje',
                        'fpls.c1',
                        'fpls.c2',
                        'fpls.c3',
                        'fpls.c4',
                        'fpls.c5',
                        'fpls.c6',
                        'fpls.c7',
                        'fpls.c8',
                        'fpls.tipoMensaje',
                        'vista_proceso_vuelo.id_estado',
                        'vista_proceso_vuelo.name_estado',
                        'vista_proceso_vuelo.color_estado',
                        'vista_proceso_vuelo.cerrado',
                        'users.id as user_id',
                        'users.name as user_name'
                    )

                    // ⬇️ Excluir cabeceras que contengan KDENXLDC (nulables incluidas)
                    ->whereRaw("COALESCE(fpls.cabecera,'') NOT ILIKE ?", ['%KDENXLDC%']);

                // Aplicar filtros condicionales
                if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
                    $query->whereRaw('DATE("fpls"."fechaHora") BETWEEN ? AND ?', [$request->fecha_inicio, $request->fecha_fin]);
                }

                if ($request->filled('origen')) {
                    $query->where('fpls.c5', 'like', '%' . $request->origen . '%');
                }

                if ($request->filled('destino')) {
                    $query->where('fpls.c7', 'like', '%' . $request->destino . '%');
                }

                if ($request->filled('vuelo')) {
                    $query->where('fpls.c1', 'like', '%' . $request->vuelo . '%');
                }

                if ($request->filled('estado')) {
                    $query->where('vista_proceso_vuelo.name_estado', '=', $request->estado);
                }

                // Ordenar, aplicar límites y obtener los resultados
                $amhs = $query
                    ->orderBy('fpls.fechaHora', 'desc') // Orden descendente por fechaHora
                    ->offset($offset) // Aplicar offset
                    ->limit($limit) // Aplicar límite
                    ->get(); // Obtener resultados

                // Obtener el SQL generado
                $sql = $query->toSql();
                $bindings = $query->getBindings();

                // Inicializar array para almacenar los datos procesados
                $data = [];

                foreach ($amhs as $item) {
                    // $proceso = $procesos->get($item->id);
                    // $id_estado = $proceso ? $proceso->id_estado : 0;
                    // $tipo_fpl = $proceso ? $proceso->tipo_fpl : 0;

                    $tipo_fpl = 0;

                    // vuelo
                    $vuelo = preg_replace('/[()\s-]/', ' ', $item->c1); // Reemplaza paréntesis, espacios y guiones con espacio
                    $pos = strpos($vuelo, '/'); // Encuentra la posición del '/'

                    if ($pos !== false) {
                        $vuelo = substr($vuelo, 0, $pos); // Corta la cadena hasta antes del '/'
                    } else {
                        $vuelo = substr($vuelo, 0, 7); // Si no hay '/', corta los primeros 7 caracteres
                    }

                    if ($item->id_estado !== null) {
                        $id_estado = $item->id_estado;
                        $estado = $item->name_estado;
                        $color_estado = $item->color_estado;
                    } else {
                        $id_estado = 0;
                        $estado = 'PENDIENTE';
                        $color_estado = '#ff5722';
                    }

                    // Obtener el estado real de FichaEstado
                    // $fichaEstado = $fichaEstados->get($id_estado);
                    // $estado = $fichaEstado ? $fichaEstado->estado : 'Pendiente';
                    // $color_estado = $fichaEstado ? $fichaEstado->color_estado : '#000000';

                    // Procesar otros campos
                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);
                    $fechaHora = explode(' ', $item->created_at);
                    $fecha = $fechaHora[0];
                    $hora = substr($fechaHora[1] ?? '', 0, 5);
                    $diaHora = date('d', strtotime($fecha)) . ' ' . $hora;

                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);

                    //Nivel y Ruta Propuesta
                    $sinSaltoDeLinea2 = rtrim($item->c6, "\n");
                    $partes = explode(' ', $sinSaltoDeLinea2);
                    $nivel_propuesto = '';
                    $ruta_propuesta = '';

                    if (!empty($partes[0])) {
                        $primeraCadena = $partes[0];

                        if (str_contains($primeraCadena, 'F')) {
                            // Recupera el contenido después de 'F'
                            preg_match('/F\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_contains($primeraCadena, 'A')) {
                            // Recupera el contenido después de 'A'
                            preg_match('/A\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_ends_with($primeraCadena, 'VFR')) {
                            // Recupera 'VFR' si está presente
                            $nivel_propuesto = 'VFR';
                        }
                    }

                    if (count($partes) > 1) {
                        // Junta las partes restantes para formar la ruta propuesta
                        $ruta_propuesta = implode(' ', array_slice($partes, 1));
                        $bloques = explode(' ', $ruta_propuesta);
                        $ruta_propuesta = implode(' ', array_slice($bloques, 0, min(3, count($bloques))));
                    }
                    //FIN Nivel y Ruta Propuesta

                    // RPL
                    if (strpos($item->c8, 'RPL') !== false) {
                        $rpl = "RPL";
                    } else {
                        $rpl = "";
                    }

                    //tipo y turbulencia
                    if (strpos($item->c3, '/') !== false) {
                        // Si lo contiene, procedemos a separar el texto
                        list($tipo, $turbulencia) = explode('/', $item->c3);
                    } else {
                        // Si no lo contiene, puedes manejar el error o asignar valores predeterminados
                        $tipo = '';
                        $turbulencia = '';
                    }

                    // $equipo contendrá las letras encontradas en el orden 'W', 'G', 'R'
                    // Inicializamos la variable $equipo como una cadena vacía
                    $equipo = '';

                    // Buscamos cada letra específica en el orden dado y la agregamos a $equipo si se encuentra
                    if (strpos($item->c4, 'W') !== false) {
                        $equipo .= 'W';
                    }

                    if (strpos($item->c4, 'G') !== false) {
                        $equipo .= 'G';
                    }

                    if (strpos($item->c4, 'R') !== false) {
                        $equipo .= 'R';
                    }

                    // Inicializamos las variables con valores predeterminados
                    $destino = '';
                    $eet = '';
                    $aed_alternos = '';

                    // Validamos y extraemos los 4 primeros caracteres para la variable $destino
                    if (strlen($item->c7) >= 4) {
                        $destino = substr($item->c7, 0, 4);
                    }

                    // Validamos y extraemos los siguientes 4 caracteres que son números para la variable $eet
                    if (strlen($item->c7) >= 8) {
                        $eet = substr($item->c7, 4, 4);
                    }

                    // Validamos y extraemos el resto del texto para la variable $aed_alternos
                    if (strlen($item->c7) > 8) {
                        $aed_alternos = substr($item->c7, 8);
                    }

                    // Procesar secuencias en c8
                    /* $c8 = $item->c8;
                    $sequences = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];
                    $results = [];
                    foreach ($sequences as $sequence) {
                        $pattern = '/' . preg_quote($sequence, '/') . '(.*?)\s+(?=(PBN\/|EET\/|REG\/|OPR\/|RMK\/|DOF\/|SEL\/|NAV\/|PER\/|CODE\/|DEP\/|DEST\/|STS\/|DAT\/|SUR\/|RALT\/|COM\/|RVR\/|FPL))/';
                        if (preg_match($pattern, $c8, $matches)) {
                            $results[strtolower(str_replace('/', '', $sequence))] = trim($matches[1]);
                        }
                    } */

                    $c8 = str_replace(')', '', $item->c8);

                    $keywords = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];

                    $results = [];

                    foreach ($keywords as $keyword) {
                        // Escapa caracteres especiales para expresiones regulares
                        $escapedKeyword = preg_quote($keyword, '/');

                        // Busca la clave y extrae el valor que sigue hasta el primer espacio o salto de línea
                        if (preg_match("/" . $escapedKeyword . "([^\s]+)/", $c8, $matches)) {
                            // Elimina el '/' del keyword y guarda el resultado
                            $key = strtolower(rtrim($keyword, '/'));
                            $results[$key] = $matches[1];
                        }
                    }

                    // DEST2
                    preg_match('/DEST\/(.*?)(?:\/|$)/s', $c8, $coincidencias);
                    if (!empty($coincidencias[1])) {
                        $dest2 = trim($coincidencias[1]);
                        $dest2 = mb_substr($dest2, 0, -4);
                    } else {
                        $dest2 = "";
                    }

                    // Velocidad
                    $velocidad = 0;

                    /* $c6Parts = explode(' ', $item->c6);
                    if (($position = strpos($c6Parts[0], 'N')) !== false) {
                        $velocidad = is_numeric(substr($c6Parts[0], $position + 1, 4)) ? substr($c6Parts[0], $position + 1, 4) : 0;
                    } */

                    $c6Parts = explode(' ', $item->c6);
                    if (strpos($c6Parts[0], 'N') === 0) {
                        // Si comienza con 'N': extrae 4 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 4)) ? substr($c6Parts[0], 1, 4) : 0;
                    } elseif (strpos($c6Parts[0], 'M') === 0) {
                        // Si comienza con 'M': extrae 3 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 3)) ? substr($c6Parts[0], 1, 3) : 0;
                        // Aplica la fórmula para convertir la velocidad de M a N: ($velocidad/100)/0.01*6
                        $velocidad = ($velocidad / 100) / 0.01 * 6;
                    } else {
                        $velocidad = 0;
                    }

                    // Agrega un cero adelante si la velocidad resultante es de 3 dígitos
                    if (strlen((string)$velocidad) == 3) {
                        $velocidad = '0' . $velocidad;
                    }

                    $primeraLetra = Str::substr($item->c2, 0, 1);

                    // Procesar los datos y agregarlos a $data
                    $data[] = [
                        'id'                => $item->id,
                        'fecha'             => $fecha,
                        'hora'              => $diaHora,
                        'vuelo'             => $vuelo,
                        'tipo'              => substr($tipo, -4),
                        'origen'            => substr($item->c5, 0, 4),
                        'destino'           => $destino,
                        'eobt'              => $eobt,
                        'nivel_propuesto'   => $nivel_propuesto,
                        'ruta_propuesta'    => $ruta_propuesta,
                        'eobt'              => $eobt,
                        'puntos'            => $item->c6,
                        'linea_aerea'       => $results['opr'] ?? '',
                        'velocidad'         => $velocidad,
                        'dep'               => substr($item->c5, 0, 4),
                        'etd'               => $eobt,
                        'reg'               => $results['reg'] ?? '',
                        'rpl'               => $rpl,
                        'sel'               => $results['sel'] ?? '',
                        'mensaje'           => $item->mensaje,
                        'id_estado'         => $id_estado,
                        'estado'            => $estado,
                        'color_estado'      => $color_estado,
                        'regla_tipo'        => $primeraLetra,
                        'tipo_fpl'          => $tipo_fpl,
                        'turbulencia'       => $turbulencia,
                        'equipo'            => $equipo,
                        'eet'               => $eet,
                        'aed_alternos'      => $aed_alternos,
                        'dof'               => $results['dof'] ?? '',
                        'rmk'               => $results['rmk'] ?? '',
                        'sts'               => $results['sts'] ?? '',
                        'opr'               => $results['opr'] ?? '',
                        'sel'               => $results['sel'] ?? '',
                        'nav'               => $results['nav'] ?? '',
                        'rvr'               => $results['rvr'] ?? '',
                        'dest2'             => $dest2,
                        'user_id'           => $item->user_id ?? '',
                        'user_name'         => $item->user_name ?? '',
                        'cerrado'           => $item->cerrado,

                    ];
                }

                // Retornar la respuesta
                /* return response()->json([
                    'response'   => '000',
                    'error'      => '',
                    'message'    => 'OK',
                    'statusCode' => '200',
                    'data'       => $data
                ]); */
            } catch (\Exception $e) {
                /* Log::error('Error interno: ' . $e->getMessage()); */
                /* return response()->json([
                    'respuesta'  => '001',
                    'error'      => 'Ha ocurrido un error interno',
                    'mensaje'    => 'NOK',
                    'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'data'       => ''
                ]); */
            }

            $data2 = $data;

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $data2
            ]);
        } catch (RequestException $e) {
            Log::error('Error fetching data from amhspag: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data from amhspag',
            ], 500);
        }
    }

    /* public function buscador_amhs(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $vuelo = $request->input('vuelo');
        $origen = $request->input('origen');
        $destino = $request->input('destino');
        $estado = $request->input('estado');

        // Recuperar tipo de ficha
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        try {
            // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
            $inicio = $request->get('inicio', 0);
            $fin = $request->get('fin', 100);
            $fin = ($estado !== null) ? 1000 : 100;
           
            try {
                // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
                $inicio = $request->input('inicio', 0);
                $fin = $request->input('fin', 200);
                $limit = $fin - $inicio;
                $offset = $inicio;
                
                $query = DB::table('fpls')

                    ->leftJoin('vista_proceso_vuelo', function ($join) use ($request) {
                        $join->on('fpls.id', '=', 'vista_proceso_vuelo.id_amhs');

                        // Agregar condición dinámica para tipo_ficha
                        if ($request->filled('tipo_ficha')) {
                            $join->where('vista_proceso_vuelo.tipo_ficha', '=', $request->input('tipo_ficha'));
                        }

                        // Agregar condición dinámica para cod_oaci
                        if ($request->filled('cod_oaci')) {
                            $join->where('vista_proceso_vuelo.pk_oaci', '=', $request->input('cod_oaci'));
                        }
                    })

                    ->leftJoin('users', 'vista_proceso_vuelo.fk_user', '=', 'users.id') // Join con users

                    ->select(
                        'fpls.id',
                        'fpls.created_at',
                        'fpls.updated_at',
                        'fpls.id_amhs',
                        'fpls.fechaHora',
                        'fpls.cabecera',
                        'fpls.mensaje',
                        'fpls.c1',
                        'fpls.c2',
                        'fpls.c3',
                        'fpls.c4',
                        'fpls.c5',
                        'fpls.c6',
                        'fpls.c7',
                        'fpls.c8',
                        'fpls.tipoMensaje',
                        'vista_proceso_vuelo.id_estado',
                        'vista_proceso_vuelo.name_estado',
                        'vista_proceso_vuelo.color_estado',
                        'users.id as user_id',
                        'users.name as user_name'
                    );

                // Aplicar filtros condicionales
                if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
                    $query->whereRaw('DATE("fpls"."fechaHora") BETWEEN ? AND ?', [$request->fecha_inicio, $request->fecha_fin]);
                }

                if ($request->filled('origen')) {
                    $query->where('fpls.c5', 'like', '%' . $request->origen . '%');
                }

                if ($request->filled('destino')) {
                    $query->where('fpls.c7', 'like', '%' . $request->destino . '%');
                }

                if ($request->filled('vuelo')) {
                    $query->where('fpls.c1', 'like', '%' . $request->vuelo . '%');
                }

                if ($request->filled('estado')) {
                    $query->where('vista_proceso_vuelo.name_estado', '=', $request->estado);
                }

                // Ordenar, aplicar límites y obtener los resultados
                $amhs = $query
                    ->orderBy('fpls.fechaHora', 'desc') // Orden descendente por fechaHora
                    ->offset($offset) // Aplicar offset
                    ->limit($limit) // Aplicar límite
                    ->get(); // Obtener resultados

                // Obtener el SQL generado
                $sql = $query->toSql();
                $bindings = $query->getBindings();
  
                // Inicializar array para almacenar los datos procesados
                $data = [];

                foreach ($amhs as $item) {

                    $tipo_fpl = 0;

                    // vuelo
                    $vuelo = preg_replace('/[()\s-]/', ' ', $item->c1); // Reemplaza paréntesis, espacios y guiones con espacio
                    $pos = strpos($vuelo, '/'); // Encuentra la posición del '/'

                    if ($pos !== false) {
                        $vuelo = substr($vuelo, 0, $pos); // Corta la cadena hasta antes del '/'
                    } else {
                        $vuelo = substr($vuelo, 0, 7); // Si no hay '/', corta los primeros 7 caracteres
                    }

                    if ($item->id_estado !== null) {
                        $id_estado = $item->id_estado;
                        $estado = $item->name_estado;
                        $color_estado = $item->color_estado;
                    } else {
                        $id_estado = 0;
                        $estado = 'PENDIENTE';
                        $color_estado = '#ff5722';
                    }

                    // Procesar otros campos
                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);
                    $fechaHora = explode(' ', $item->created_at);
                    $fecha = $fechaHora[0];
                    $hora = substr($fechaHora[1] ?? '', 0, 5);
                    $diaHora = date('d', strtotime($fecha)) . ' ' . $hora;

                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);

                    //Nivel y Ruta Propuesta
                    $sinSaltoDeLinea2 = rtrim($item->c6, "\n");
                    $partes = explode(' ', $sinSaltoDeLinea2);
                    $nivel_propuesto = '';
                    $ruta_propuesta = '';

                    if (!empty($partes[0])) {
                        $primeraCadena = $partes[0];

                        if (str_contains($primeraCadena, 'F')) {
                            // Recupera el contenido después de 'F'
                            preg_match('/F\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_contains($primeraCadena, 'A')) {
                            // Recupera el contenido después de 'A'
                            preg_match('/A\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_ends_with($primeraCadena, 'VFR')) {
                            // Recupera 'VFR' si está presente
                            $nivel_propuesto = 'VFR';
                        }
                    }

                    if (count($partes) > 1) {
                        // Junta las partes restantes para formar la ruta propuesta
                        $ruta_propuesta = implode(' ', array_slice($partes, 1));
                        $bloques = explode(' ', $ruta_propuesta);
                        $ruta_propuesta = implode(' ', array_slice($bloques, 0, min(3, count($bloques))));
                    }
                    //FIN Nivel y Ruta Propuesta

                    // RPL
                    if (strpos($item->c8, 'RPL') !== false) {
                        $rpl = "RPL";
                    } else {
                        $rpl = "";
                    }

                    //tipo y turbulencia
                    if (strpos($item->c3, '/') !== false) {
                        // Si lo contiene, procedemos a separar el texto
                        list($tipo, $turbulencia) = explode('/', $item->c3);
                    } else {
                        // Si no lo contiene, puedes manejar el error o asignar valores predeterminados
                        $tipo = '';
                        $turbulencia = '';
                    }

                    // $equipo contendrá las letras encontradas en el orden 'W', 'G', 'R'
                    // Inicializamos la variable $equipo como una cadena vacía
                    $equipo = '';

                    // Buscamos cada letra específica en el orden dado y la agregamos a $equipo si se encuentra
                    if (strpos($item->c4, 'W') !== false) {
                        $equipo .= 'W';
                    }

                    if (strpos($item->c4, 'G') !== false) {
                        $equipo .= 'G';
                    }

                    if (strpos($item->c4, 'R') !== false) {
                        $equipo .= 'R';
                    }

                    // Inicializamos las variables con valores predeterminados
                    $destino = '';
                    $eet = '';
                    $aed_alternos = '';

                    // Validamos y extraemos los 4 primeros caracteres para la variable $destino
                    if (strlen($item->c7) >= 4) {
                        $destino = substr($item->c7, 0, 4);
                    }

                    // Validamos y extraemos los siguientes 4 caracteres que son números para la variable $eet
                    if (strlen($item->c7) >= 8) {
                        $eet = substr($item->c7, 4, 4);
                    }

                    // Validamos y extraemos el resto del texto para la variable $aed_alternos
                    if (strlen($item->c7) > 8) {
                        $aed_alternos = substr($item->c7, 8);
                    }

                    $c8 = str_replace(')', '', $item->c8);

                    $keywords = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];

                    $results = [];

                    foreach ($keywords as $keyword) {
                        // Escapa caracteres especiales para expresiones regulares
                        $escapedKeyword = preg_quote($keyword, '/');

                        // Busca la clave y extrae el valor que sigue hasta el primer espacio o salto de línea
                        if (preg_match("/" . $escapedKeyword . "([^\s]+)/", $c8, $matches)) {
                            // Elimina el '/' del keyword y guarda el resultado
                            $key = strtolower(rtrim($keyword, '/'));
                            $results[$key] = $matches[1];
                        }
                    }

                    // DEST2
                    preg_match('/DEST\/(.*?)(?:\/|$)/s', $c8, $coincidencias);
                    if (!empty($coincidencias[1])) {
                        $dest2 = trim($coincidencias[1]);
                        $dest2 = mb_substr($dest2, 0, -4);
                    } else {
                        $dest2 = "";
                    }

                    // Velocidad
                    $velocidad = 0;
                   
                    $c6Parts = explode(' ', $item->c6);
                    if (strpos($c6Parts[0], 'N') === 0) {
                        // Si comienza con 'N': extrae 4 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 4)) ? substr($c6Parts[0], 1, 4) : 0;
                    } elseif (strpos($c6Parts[0], 'M') === 0) {
                        // Si comienza con 'M': extrae 3 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 3)) ? substr($c6Parts[0], 1, 3) : 0;
                        // Aplica la fórmula para convertir la velocidad de M a N: ($velocidad/100)/0.01*6
                        $velocidad = ($velocidad / 100) / 0.01 * 6;
                    } else {
                        $velocidad = 0;
                    }

                    // Agrega un cero adelante si la velocidad resultante es de 3 dígitos
                    if (strlen((string)$velocidad) == 3) {
                        $velocidad = '0' . $velocidad;
                    }

                    $primeraLetra = Str::substr($item->c2, 0, 1);

                    // Procesar los datos y agregarlos a $data
                    $data[] = [
                        'id'                => $item->id,
                        'fecha'             => $fecha,
                        'hora'              => $diaHora,
                        'vuelo'             => $vuelo,
                        'tipo'              => substr($tipo, -4),
                        'origen'            => substr($item->c5, 0, 4),
                        'destino'           => $destino,
                        'eobt'              => $eobt,
                        'nivel_propuesto'   => $nivel_propuesto,
                        'ruta_propuesta'    => $ruta_propuesta,
                        'eobt'              => $eobt,
                        'puntos'            => $item->c6,
                        'linea_aerea'       => $results['opr'] ?? '',
                        'velocidad'         => $velocidad,
                        'dep'               => substr($item->c5, 0, 4),
                        'etd'               => $eobt,
                        'reg'               => $results['reg'] ?? '',
                        'rpl'               => $rpl,
                        'sel'               => $results['sel'] ?? '',
                        'mensaje'           => $item->mensaje,
                        'id_estado'         => $id_estado,
                        'estado'            => $estado,
                        'color_estado'      => $color_estado,
                        'regla_tipo'        => $primeraLetra,
                        'tipo_fpl'          => $tipo_fpl,
                        'turbulencia'       => $turbulencia,
                        'equipo'            => $equipo,
                        'eet'               => $eet,
                        'aed_alternos'      => $aed_alternos,
                        'dof'               => $results['dof'] ?? '',
                        'rmk'               => $results['rmk'] ?? '',
                        'sts'               => $results['sts'] ?? '',
                        'opr'               => $results['opr'] ?? '',
                        'sel'               => $results['sel'] ?? '',
                        'nav'               => $results['nav'] ?? '',
                        'rvr'               => $results['rvr'] ?? '',
                        'dest2'              => $dest2,
                        'user_id'           => $item->user_id ?? '',
                        'user_name'         => $item->user_name ?? '',

                    ];
                }
                
            } catch (\Exception $e) {

            }

            $data2 = $data ?? [];

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $data2
            ]);
        } catch (RequestException $e) {
            Log::error('Error fetching data from amhspag: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data from amhspag',
            ], 500);
        }
    } */

    public function fichaACC4(Request $request)
    {
        // Validar los parámetros recibidos
        $request->validate([
            'id-amhs' => 'required|integer',
            'tipo-ficha' => 'required|integer',
            'pk-oaci' => 'required|integer',
        ]);

        try {
            // Obtener los parámetros validados
            $id_amhs = $request->input('id-amhs');
            $tipo_ficha = $request->input('tipo-ficha');
            $oaci = $request->input('pk-oaci');

            // Consulta en la base de datos con las condiciones dadas
            $procesosVuelos = ProcesoVuelo::where('id_amhs', $id_amhs)
                ->where('tipo_ficha', $tipo_ficha)
                ->where('oaci', $oaci)
                ->orderBy('id', 'desc')
                ->first();

            // Verificar si se encontró un registro
            if (!$procesosVuelos) {
                return response()->json([
                    'success' => true,
                    'data' => 0,
                    'message' => 'No se encontraron registros con los criterios especificados.',
                ], 200);
            }

            // Retornar el registro encontrado
            return response()->json([
                'success' => true,
                'data' => $procesosVuelos,
            ], 200);
        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al procesar la solicitud.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function fichaACC4Notificacion(Request $request)
    {
        try {
            // Validar que los datos requeridos estén presentes
            $request->validate([
                'id-amhs' => 'required|array|min:1',
                'tipo-ficha' => 'required|integer',
                'pk-oaci' => 'required|string'
            ]);

            $id_amhs_array = $request->input('id-amhs');
            $tipo_ficha = $request->input('tipo-ficha');
            $oaci = $request->input('pk-oaci');

            // Log::info('id_amhs_array', [$id_amhs_array]);
            // Log::info('tipo_ficha', [$tipo_ficha]);
            // Log::info('oaci', [$oaci]);

            $resultados = [];

            foreach ($id_amhs_array as $id_amhs) {
                $procesoVuelo = ProcesoVuelo::where('id_amhs', $id_amhs)
                    ->where('tipo_ficha', $tipo_ficha)
                    ->where('oaci', $oaci)
                    ->where(function ($query) {
                        $query->where('id_estado', 3)
                            ->orWhere('id_estado', 4);
                    })
                    ->orderBy('id', 'desc')
                    ->first();

                if ($tipo_ficha == 22) {
                    // Log::info('id_amhs', [$id_amhs]);
                }

                if ($procesoVuelo) {
                    $resultados[] = $id_amhs;

                    // Log::info('id_amhs WIII', [$id_amhs]);
                }
            }

            return response()->json([
                'success' => true,
                'data' => $resultados,
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos.',
                'errors' => $ve->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al procesar la solicitud.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function obtenerAmhsAutorizados(Request $request)
    {
        try {
            // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
            $inicio = $request->get('inicio', 0);
            $fin = $request->get('fin', 200);

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            $request->merge([
                'tipo_ficha' => $tipoFicha,
                'cod_oaci' => $cod_oaci,
            ]);

            try {
                // Obtener los valores de inicio y fin desde la solicitud, con valores predeterminados
                $inicio = $request->input('inicio', 0);
                $fin = $request->input('fin', 200);
                $limit = $fin - $inicio;
                $offset = $inicio;

                $query = DB::table('fpls')

                    ->leftJoin('vista_proceso_vuelo', function ($join) use ($request) {
                        $join->on('fpls.id', '=', 'vista_proceso_vuelo.id_amhs');

                        // Agregar condición dinámica para tipo_ficha
                        if ($request->filled('tipo_ficha')) {
                            $join->where('vista_proceso_vuelo.tipo_ficha', '=', $request->input('tipo_ficha'));
                        }

                        // Agregar condición dinámica para cod_oaci
                        if ($request->filled('cod_oaci')) {
                            $join->where('vista_proceso_vuelo.pk_oaci', '=', $request->input('cod_oaci'));
                        }
                    })

                    ->leftJoin('users', 'vista_proceso_vuelo.fk_user', '=', 'users.id') // Join con users

                    ->select(
                        'fpls.id',
                        'fpls.created_at',
                        'fpls.updated_at',
                        'fpls.id_amhs',
                        'fpls.fechaHora',
                        'fpls.cabecera',
                        'fpls.mensaje',
                        'fpls.c1',
                        'fpls.c2',
                        'fpls.c3',
                        'fpls.c4',
                        'fpls.c5',
                        'fpls.c6',
                        'fpls.c7',
                        'fpls.c8',
                        'fpls.tipoMensaje',
                        'vista_proceso_vuelo.id_estado',
                        'vista_proceso_vuelo.name_estado',
                        'vista_proceso_vuelo.color_estado',
                        'users.id as user_id',
                        'users.name as user_name'
                    )

                    // ⬇️ Excluir cabeceras que contengan KDENXLDC (nulables incluidas)
                    ->whereRaw("COALESCE(fpls.cabecera,'') NOT ILIKE ?", ['%KDENXLDC%']);

                // Aplicar filtros condicionales
                if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
                    $query->whereRaw('DATE("fpls"."fechaHora") BETWEEN ? AND ?', [$request->fecha_inicio, $request->fecha_fin]);
                }

                if ($request->filled('origen')) {
                    $query->where('fpls.c5', 'like', '%' . $request->origen . '%');
                }

                if ($request->filled('destino')) {
                    $query->where('fpls.c7', 'like', '%' . $request->destino . '%');
                }

                if ($request->filled('vuelo')) {
                    $query->where('fpls.c1', 'like', '%' . $request->vuelo . '%');
                }

                if ($request->filled('estado')) {
                    $query->where('vista_proceso_vuelo.name_estado', '=', $request->estado);
                }

                // ⬇️ Estado Autorizado
                $query->where('vista_proceso_vuelo.id_estado', 3);

                // Ordenar, aplicar límites y obtener los resultados
                $amhs = $query
                    ->orderBy('fpls.fechaHora', 'desc') // Orden descendente por fechaHora
                    ->offset($offset) // Aplicar offset
                    ->limit($limit) // Aplicar límite
                    ->get(); // Obtener resultados

                // Obtener el SQL generado
                $sql = $query->toSql();
                $bindings = $query->getBindings();

                // Inicializar array para almacenar los datos procesados
                $data = [];

                foreach ($amhs as $item) {
                    // $proceso = $procesos->get($item->id);
                    // $id_estado = $proceso ? $proceso->id_estado : 0;
                    // $tipo_fpl = $proceso ? $proceso->tipo_fpl : 0;

                    $tipo_fpl = 0;

                    // vuelo
                    $vuelo = preg_replace('/[()\s-]/', ' ', $item->c1); // Reemplaza paréntesis, espacios y guiones con espacio
                    $pos = strpos($vuelo, '/'); // Encuentra la posición del '/'

                    if ($pos !== false) {
                        $vuelo = substr($vuelo, 0, $pos); // Corta la cadena hasta antes del '/'
                    } else {
                        $vuelo = substr($vuelo, 0, 7); // Si no hay '/', corta los primeros 7 caracteres
                    }

                    if ($item->id_estado !== null) {
                        $id_estado = $item->id_estado;
                        $estado = $item->name_estado;
                        $color_estado = $item->color_estado;
                    } else {
                        $id_estado = 0;
                        $estado = 'PENDIENTE';
                        $color_estado = '#ff5722';
                    }

                    // Obtener el estado real de FichaEstado
                    // $fichaEstado = $fichaEstados->get($id_estado);
                    // $estado = $fichaEstado ? $fichaEstado->estado : 'Pendiente';
                    // $color_estado = $fichaEstado ? $fichaEstado->color_estado : '#000000';

                    // Procesar otros campos
                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);
                    $fechaHora = explode(' ', $item->created_at);
                    $fecha = $fechaHora[0];
                    $hora = substr($fechaHora[1] ?? '', 0, 5);
                    $diaHora = date('d', strtotime($fecha)) . ' ' . $hora;

                    $sinSaltoDeLinea = rtrim($item->c5, "\n");
                    $eobt = substr($sinSaltoDeLinea, 4, 8);

                    //Nivel y Ruta Propuesta
                    $sinSaltoDeLinea2 = rtrim($item->c6, "\n");
                    $partes = explode(' ', $sinSaltoDeLinea2);
                    $nivel_propuesto = '';
                    $ruta_propuesta = '';

                    if (!empty($partes[0])) {
                        $primeraCadena = $partes[0];

                        if (str_contains($primeraCadena, 'F')) {
                            // Recupera el contenido después de 'F'
                            preg_match('/F\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_contains($primeraCadena, 'A')) {
                            // Recupera el contenido después de 'A'
                            preg_match('/A\d{3}/', $primeraCadena, $matches);
                            $nivel_propuesto = $matches[0] ?? '';
                        } elseif (str_ends_with($primeraCadena, 'VFR')) {
                            // Recupera 'VFR' si está presente
                            $nivel_propuesto = 'VFR';
                        }
                    }

                    if (count($partes) > 1) {
                        // Junta las partes restantes para formar la ruta propuesta
                        $ruta_propuesta = implode(' ', array_slice($partes, 1));
                        $bloques = explode(' ', $ruta_propuesta);
                        $ruta_propuesta = implode(' ', array_slice($bloques, 0, min(3, count($bloques))));
                    }
                    //FIN Nivel y Ruta Propuesta

                    // RPL
                    if (strpos($item->c8, 'RPL') !== false) {
                        $rpl = "RPL";
                    } else {
                        $rpl = "";
                    }

                    //tipo y turbulencia
                    if (strpos($item->c3, '/') !== false) {
                        // Si lo contiene, procedemos a separar el texto
                        list($tipo, $turbulencia) = explode('/', $item->c3);
                    } else {
                        // Si no lo contiene, puedes manejar el error o asignar valores predeterminados
                        $tipo = '';
                        $turbulencia = '';
                    }

                    // $equipo contendrá las letras encontradas en el orden 'W', 'G', 'R'
                    // Inicializamos la variable $equipo como una cadena vacía
                    $equipo = '';

                    // Buscamos cada letra específica en el orden dado y la agregamos a $equipo si se encuentra
                    if (strpos($item->c4, 'W') !== false) {
                        $equipo .= 'W';
                    }

                    if (strpos($item->c4, 'G') !== false) {
                        $equipo .= 'G';
                    }

                    if (strpos($item->c4, 'R') !== false) {
                        $equipo .= 'R';
                    }

                    // Inicializamos las variables con valores predeterminados
                    $destino = '';
                    $eet = '';
                    $aed_alternos = '';

                    // Validamos y extraemos los 4 primeros caracteres para la variable $destino
                    if (strlen($item->c7) >= 4) {
                        $destino = substr($item->c7, 0, 4);
                    }

                    // Validamos y extraemos los siguientes 4 caracteres que son números para la variable $eet
                    if (strlen($item->c7) >= 8) {
                        $eet = substr($item->c7, 4, 4);
                    }

                    // Validamos y extraemos el resto del texto para la variable $aed_alternos
                    if (strlen($item->c7) > 8) {
                        $aed_alternos = substr($item->c7, 8);
                    }

                    // Procesar secuencias en c8
                    /* $c8 = $item->c8;
                    $sequences = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];
                    $results = [];
                    foreach ($sequences as $sequence) {
                        $pattern = '/' . preg_quote($sequence, '/') . '(.*?)\s+(?=(PBN\/|EET\/|REG\/|OPR\/|RMK\/|DOF\/|SEL\/|NAV\/|PER\/|CODE\/|DEP\/|DEST\/|STS\/|DAT\/|SUR\/|RALT\/|COM\/|RVR\/|FPL))/';
                        if (preg_match($pattern, $c8, $matches)) {
                            $results[strtolower(str_replace('/', '', $sequence))] = trim($matches[1]);
                        }
                    } */

                    $c8 = str_replace(')', '', $item->c8);

                    $keywords = [
                        'PBN/',
                        'EET/',
                        'REG/',
                        'OPR/',
                        'RMK/',
                        'DOF/',
                        'SEL/',
                        'NAV/',
                        'PER/',
                        'CODE/',
                        'DEP/',
                        'DEST/',
                        'STS/',
                        'DAT/',
                        'SUR/',
                        'RALT/',
                        'COM/',
                        'RVR/'
                    ];

                    $results = [];

                    foreach ($keywords as $keyword) {
                        // Escapa caracteres especiales para expresiones regulares
                        $escapedKeyword = preg_quote($keyword, '/');

                        // Busca la clave y extrae el valor que sigue hasta el primer espacio o salto de línea
                        if (preg_match("/" . $escapedKeyword . "([^\s]+)/", $c8, $matches)) {
                            // Elimina el '/' del keyword y guarda el resultado
                            $key = strtolower(rtrim($keyword, '/'));
                            $results[$key] = $matches[1];
                        }
                    }

                    // DEST2
                    preg_match('/DEST\/(.*?)(?:\/|$)/s', $c8, $coincidencias);
                    if (!empty($coincidencias[1])) {
                        $dest2 = trim($coincidencias[1]);
                        $dest2 = mb_substr($dest2, 0, -4);
                    } else {
                        $dest2 = "";
                    }

                    // Velocidad
                    $velocidad = 0;

                    /* $c6Parts = explode(' ', $item->c6);
                    if (($position = strpos($c6Parts[0], 'N')) !== false) {
                        $velocidad = is_numeric(substr($c6Parts[0], $position + 1, 4)) ? substr($c6Parts[0], $position + 1, 4) : 0;
                    } */

                    $c6Parts = explode(' ', $item->c6);
                    if (strpos($c6Parts[0], 'N') === 0) {
                        // Si comienza con 'N': extrae 4 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 4)) ? substr($c6Parts[0], 1, 4) : 0;
                    } elseif (strpos($c6Parts[0], 'M') === 0) {
                        // Si comienza con 'M': extrae 3 dígitos a partir del segundo carácter
                        $velocidad = is_numeric(substr($c6Parts[0], 1, 3)) ? substr($c6Parts[0], 1, 3) : 0;
                        // Aplica la fórmula para convertir la velocidad de M a N: ($velocidad/100)/0.01*6
                        $velocidad = ($velocidad / 100) / 0.01 * 6;
                    } else {
                        $velocidad = 0;
                    }

                    // Agrega un cero adelante si la velocidad resultante es de 3 dígitos
                    if (strlen((string)$velocidad) == 3) {
                        $velocidad = '0' . $velocidad;
                    }

                    $primeraLetra = Str::substr($item->c2, 0, 1);

                    // Procesar los datos y agregarlos a $data
                    $data[] = [
                        'id'                => $item->id,
                        'fecha'             => $fecha,
                        'hora'              => $diaHora,
                        'vuelo'             => $vuelo,
                        'tipo'              => substr($tipo, -4),
                        'origen'            => substr($item->c5, 0, 4),
                        'destino'           => $destino,
                        'eobt'              => $eobt,
                        'nivel_propuesto'   => $nivel_propuesto,
                        'ruta_propuesta'    => $ruta_propuesta,
                        'eobt'              => $eobt,
                        'puntos'            => $item->c6,
                        'linea_aerea'       => $results['opr'] ?? '',
                        'velocidad'         => $velocidad,
                        'dep'               => substr($item->c5, 0, 4),
                        'etd'               => $eobt,
                        'reg'               => $results['reg'] ?? '',
                        'rpl'               => $rpl,
                        'sel'               => $results['sel'] ?? '',
                        'mensaje'           => $item->mensaje,
                        'id_estado'         => $id_estado,
                        'estado'            => $estado,
                        'color_estado'      => $color_estado,
                        'regla_tipo'        => $primeraLetra,
                        'tipo_fpl'          => $tipo_fpl,
                        'turbulencia'       => $turbulencia,
                        'equipo'            => $equipo,
                        'eet'               => $eet,
                        'aed_alternos'      => $aed_alternos,
                        'dof'               => $results['dof'] ?? '',
                        'rmk'               => $results['rmk'] ?? '',
                        'sts'               => $results['sts'] ?? '',
                        'opr'               => $results['opr'] ?? '',
                        'sel'               => $results['sel'] ?? '',
                        'nav'               => $results['nav'] ?? '',
                        'rvr'               => $results['rvr'] ?? '',
                        'dest2'              => $dest2,
                        'user_id'           => $item->user_id ?? '',
                        'user_name'         => $item->user_name ?? '',

                    ];
                }

                // Retornar la respuesta
                /* return response()->json([
                    'response'   => '000',
                    'error'      => '',
                    'message'    => 'OK',
                    'statusCode' => '200',
                    'data'       => $data
                ]); */
            } catch (\Exception $e) {
                /* Log::error('Error interno: ' . $e->getMessage()); */
                /* return response()->json([
                    'respuesta'  => '001',
                    'error'      => 'Ha ocurrido un error interno',
                    'mensaje'    => 'NOK',
                    'statusCode' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'data'       => ''
                ]); */
            }

            $data2 = $data;

            // Devolver los datos como JSON
            return response()->json([
                'success' => true,
                'data' => $data2
            ]);
        } catch (RequestException $e) {
            Log::error('Error fetching data from amhspag: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching data from amhspag',
            ], 500);
        }
    }

    public function obtenerAmhsNewAutorizados(Request $request)
    {
        try {

            // Recuperar tipo de ficha
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            // Recuperar datos del modelo ProcesoVuelo con los filtros
            /* $procesosVuelos = ProcesoVuelo::join('users', 'proceso_vuelo.fk_user', '=', 'users.id')
                ->where('proceso_vuelo.id_estado', 3)
                ->where('proceso_vuelo.tipo_ficha', $tipoFicha)
                ->where('proceso_vuelo.id_amhs', $lastIdAutorizado)
                ->select('proceso_vuelo.*', 'users.name as user_name')
                ->orderBy('proceso_vuelo.id', 'desc')
                ->get(); */

            $procesosVuelos = ProcesoVuelo::where('proceso_vuelo.id_estado', 3)
                ->where('proceso_vuelo.tipo_ficha', $tipoFicha)
                ->where('proceso_vuelo.oaci', $cod_oaci)
                ->select('proceso_vuelo.*')
                ->orderBy('proceso_vuelo.id', 'desc')
                ->get();

            /* $query = ProcesoVuelo::join('users', 'proceso_vuelo.fk_user', '=', 'users.id')
                ->where('proceso_vuelo.id_estado', 3)
                ->where('proceso_vuelo.tipo_ficha', $tipoFicha)
                ->where('proceso_vuelo.id_amhs', $lastIdAutorizado)
                ->select('proceso_vuelo.*', 'users.name as user_name')
                ->orderBy('proceso_vuelo.id', 'desc');

            // Obtener el SQL puro con bindings
            $sql = vsprintf(str_replace('?', "'%s'", $query->toSql()), $query->getBindings()); */

            return response()->json([
                'success' => true,
                'data' => $procesosVuelos,
                //'query' => $sql,
            ]);
        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los registros: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function obtenerAmhsOldAutorizados(Request $request)
    {
        try {
            $idsString = $request->input('ids');
            $idsString = rtrim($idsString, ',');
            // Convierte en array
            $ids = explode(',', $idsString);

            // Recuperar tipo de ficha y OACI del usuario autenticado
            $userTip = DB::table('user_tips')
                ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
                ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
                ->where('user_tips.pk_id_user', Auth::id())
                ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
                ->first();

            $tipoFicha = $userTip->pk_id_tipo_ficha;
            $cod_oaci = $userTip->pk_oaci;

            // Obtener todos los proceso_vuelo autorizados por tipo ficha y OACI
            $procesosVuelos = ProcesoVuelo::join('users', 'proceso_vuelo.fk_user', '=', 'users.id')
                ->join('user_tips', 'proceso_vuelo.fk_user', '=', 'user_tips.pk_id_user')
                ->where('proceso_vuelo.id_estado', 3)
                ->where('proceso_vuelo.tipo_ficha', $tipoFicha)
                ->where('user_tips.pk_oaci', $cod_oaci)
                ->select('proceso_vuelo.id_amhs')
                ->get()
                ->pluck('id_amhs')
                ->toArray();

            // Generar array de 1 y 0 según si cada ID está presente
            $autorizado_old = [];
            foreach ($ids as $id) {
                $autorizado_old[] = in_array($id, $procesosVuelos) ? 1 : 0;
            }

            return response()->json([
                'success' => true,
                'autorizado_old' => $autorizado_old,
                'ids' => $ids,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los registros: ' . $e->getMessage(),
            ], 500);
        }
    }

    /* public function fetchDataAmhs()
    {
        $servicio2 = new Client([
            'base_uri' => env('TRANSITO_API_URL') . '/api/amhs',
        ]);
        $response2 = $servicio2->request('GET');
        $data2 = json_decode($response2->getBody()->getContents());

        return response()->json($data2);
    } */

    /* public function fetchDataMet()
    {
        $servicio3 = new Client([
            'base_uri' => env('TRANSITO_API_URL') . '/api/datmet',
        ]);
        $response3 = $servicio3->request('GET');
        $data3 = json_decode($response3->getBody()->getContents());

        return response()->json($data3);
    } */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Search for a ficha de progreso by id_amhs from external service.
     */
    /* public function search_amhs($id_amhs)
    {
        try {
            $client = new Client([
                'base_uri' => env('TRANSITO_API_URL') . '/api/ficha_progreso/',
            ]);

            $response = $client->request('GET', "{$id_amhs}/search_amhs");

            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody()->getContents(), true);
                return response()->json($data, 200); // Código de estado 200 OK
            } else {
                Log::error('Error al obtener la ficha de progreso desde el servicio externo: ' . $response->getBody()->getContents());
                return response()->json(['error' => 'Error al obtener la ficha de progreso desde el servicio externo'], 500); // Código de estado 500 Internal Server Error
            }
        } catch (\Exception $e) {
            Log::error('Error al conectar con el servicio externo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al conectar con el servicio externo'], 500); // Código de estado 500 Internal Server Error
        }
    } */

    public function busqueda_historica(Request $request)
    {
        return view('transito.busqueda_historica');
    }

    public function busqueda_query(Request $request)
    {
        // Crear consulta base
        $query = ProcesoVuelo::query();

        // Aplicar filtros si existen en el request
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin]);
        }

        if ($request->filled('origen')) {
            $query->where('origen', 'like', '%' . $request->origen . '%');
        }

        if ($request->filled('estado')) {
            $query->where('id_estado', $request->estado);
        }

        if ($request->filled('destino')) {
            $query->where('destino', 'like', '%' . $request->destino . '%');
        }

        if ($request->filled('vuelo')) {
            $query->where('vuelo', 'like', '%' . $request->vuelo . '%');
        }

        if ($request->filled('tipo')) {
            $query->where('tipo', 'like', '%' . $request->tipo . '%');
        }

        if ($request->filled('linea_aerea')) {
            $query->where('linea_aerea', 'like', '%' . $request->linea_area . '%');
        }

        // Ejecutar consulta y obtener resultados
        $procesoVuelos = $query->get();

        // Retornar la respuesta en formato JSON para AJAX
        return response()->json($procesoVuelos);
    }

    /* public function ficha_estado($id_estado)
    {
        try {
            // Configurar el cliente Guzzle
            $client = new Client([
                'base_uri' => env('TRANSITO_API_URL') . '/api/ficha_estado/',
            ]);

            // Realizar la solicitud GET
            $response = $client->request('GET', "{$id_estado}");

            // Verificar si la respuesta es exitosa
            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody()->getContents(), true);
                return response()->json($data, 200); // Retornar datos con código de estado 200 OK
            } else {
                // Registrar un error si el código de estado no es 200
                Log::error('Error al obtener la ficha estado desde el servicio externo: ' . $response->getBody()->getContents());
                return response()->json(['error' => 'Error al obtener la ficha estado desde el servicio externo'], 500); // Código de estado 500 Internal Server Error
            }
        } catch (\Exception $e) {
            // Registrar cualquier excepción que ocurra durante la solicitud
            Log::error('Error al conectar con el servicio externo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al conectar con el servicio externo'], 500); // Código de estado 500 Internal Server Error
        }
    } */

    /* public function selectRuta(Request $request)
    {
        $puntos = $request->input('puntos');
        // Log::info('PUNTOS', [$puntos]);

        // Pruebas
        // $puntos = "N0450F390 KABOM1 KABOM UL404 BOLET/N0448F390 UM784 SIS/N0449F400 UL793 GUA W11 PAGON PAGON8Q ";
        // $puntos = "N0455F300 BIVAM2A BIVAM UW8 PAR UL417 ESMUR/N0465F340 UL417 LOKOX UM784 ROBOK/N0462F360 UM784 VUMPU BUSMO DCT ISOKO ISOKO01 ";
        // $puntos = "N0457F380 SALBI1 SALBI UZ29 TERAX PAZ";
        // $puntos = "N0457F380 SALBI1 UZ29";

        //$puntos = "N0461F350 DCT IRATA DCT BUSMO UN420 VUMPU UM784 PAPEK/N0453F370 UM784 LOKOX UL417 PUBUM/N0449F390 UL417 TOPOG/N0450F380 UL404 ISOPO/N0445F370 UT672 MULTA UW24 SNT SNT7U";
        // $puntos = "N0469F330 DCT IRATA DCT BUSMO VUMPU UM784 ISIDI/N0465F350 UM784 LOKOX UL417 TOPOG UL404 ISOPO UT672 MULTA UW24 SNT SNT7X ";
        // $puntos = "N0483F310 BRAVS5 WALET DCT OTK J89 HITTR DCT PIE/N0486F300 DCT EYW/N0486F290 DCT TANIA UG430 UCA UA301 SAVEM/N0480F330 UA301 REMEX/N0473F350 UA301 VIR UA321 MCL/N0468F360 UA321 MOROS UL793 EGEXO/N0473F350 UL793 DAMIS/N0469F360 UL793 GUA UW65 PAGON PAGO6B";

        try {
            // Crear un cliente Guzzle
            $servicio = new Client([
                'base_uri' => env('RUTAS_API_URL') . '/api/rutas-puntos/',
            ]);

            // Mapea los campos del formulario a los nombres que espera el servicio
            $data = [
                'puntos' => $puntos,
            ];

            // Realiza la solicitud POST al servicio externo
            $response = $servicio->post('search_ruta', [
                'json' => $data
            ]);

            // Decodifica la respuesta JSON
            $select = json_decode($response->getBody()->getContents(), true);

            // Retorna la respuesta al frontend
            return response()->json($select, 201); // Código de estado 201 Created
        } catch (\Exception $e) {
            // Loguea el error y retorna una respuesta de error
            Log::error('Error en Select Ruta: ' . $e->getMessage());
            return response()->json(['error' => 'Error en Select Ruta'], 500); // Código de estado 500 Internal Server Error
        }
    } */

    public function crearRuta(Request $request)
    {
        $puntos = $request->input('puntos');
        $vuelo = $request->input('vuelo');
        $tipo_ficha = $request->input('tipo_ficha');

        $query = DB::table('proceso_rutas_predeterminadas')
            ->whereRaw("array_option_select = ?", [$puntos])
            ->whereRaw("vuelo = ?", [$vuelo])
            ->where('tipo_ficha', [$tipo_ficha]);

        // Obtener la consulta en SQL
        $sql = $query->toSql();
        $bindings = $query->getBindings();

        // Reemplazar manualmente los '?' con los valores de $bindings
        foreach ($bindings as $binding) {
            if (is_string($binding)) {
                $binding = "'" . str_replace("'", "''", $binding) . "'"; // Escapar comillas correctamente
            }
            $sql = preg_replace('/\?/', $binding, $sql, 1); // Reemplaza solo la primera ocurrencia de '?'
        }

        // Log para ver la consulta real sin caracteres de escape incorrectos
        // Log::info('Consulta SQL con valores inyectados:', ['query' => $sql]);

        // Ejecutar la consulta
        $ruta_predeterminada = $query->first();

        // Log::info('RUTA PREDETERMINADA', [$ruta_predeterminada]);

        if ($ruta_predeterminada) {

            try {
                $result = [
                    'validador' => 0,
                    'error' => 'La Ruta Predeterminada ya existe',
                    'llave_select' => 5,
                    'id_rutas_encontradas' => [],
                    'name_rutas_encontradas' => [],
                    'puntos_mensaje' => [],
                    'array_option_select' => '',
                    'id_vector_viaje' => [],
                    'name_vector_viaje' => [],
                    'distancia_vector_viaje' => [],
                    'ruta_vector_viaje' => [],
                    'primerPunto' => 0
                ];

                // Retorna la respuesta al frontend
                return response()->json($result, 201); // Código de estado 201 Created
            } catch (\Exception $e) {
                // Loguea el error y retorna una respuesta de error
                Log::error('Error en crearRuta: ' . $e->getMessage());
                return response()->json(['error' => 'Error al crear la ruta'], 500); // Código de estado 500 Internal Server Error
            }
        } else {

            try {
                // Crear un cliente Guzzle
                /* $servicio = new Client([
                    'base_uri' => env('RUTAS_API_URL') . '/api/rutas-puntos/',
                ]);

                // Mapea los campos del formulario a los nombres que espera el servicio
                $data = [
                    'puntos' => $puntos,
                ];

                // Realiza la solicitud POST al servicio externo
                $response = $servicio->post('crear_ruta', [
                    'json' => $data
                ]); */

                try {
                    $puntos = $request->input('puntos');
                    $puntosArray = explode(' ', trim($puntos));

                    // Log::info('PUNTOS', [$puntosArray]);

                    $primerPunto = reset($puntosArray); // Obtiene el primer elemento
                    $ultimoPunto = end($puntosArray);   // Obtiene el último elemento

                    $id_rutas_encontradas = [];
                    $name_rutas_encontradas = [];
                    $id_puntos_encontrados = [];
                    $name_puntos_encontrados = [];
                    $validador = 1;
                    $puntero = 1;
                    $error = "";

                    // Validacion si existe la ruta
                    foreach ($puntosArray as $index => $punto) {
                        // Verificar si existe la siguiente ruta
                        if (isset($puntosArray[$index + 1])) {
                            $ruta = $puntosArray[$index + 1];

                            $ruta_puntos = DB::table('vista_ruta_puntos')
                                ->where('ruta', $ruta)
                                ->where('punto', $punto)
                                ->first();

                            // Comprobar si hay un resultado en $ruta_puntos
                            if ($ruta_puntos) {
                                $id_rutas_encontradas[] = $ruta_puntos->id_ruta;
                                $name_rutas_encontradas[] = $ruta_puntos->ruta;
                                $id_puntos_encontrados[] = $ruta_puntos->id_punto;
                                $name_puntos_encontrados[] = $ruta_puntos->punto;
                            }

                            // Saltar al siguiente par (i.e., avanzar dos índices)
                            $index++;
                            $puntero++;
                        }
                    }

                    $last_punto = end($puntosArray); // Último valor
                    $last_ruta = prev($puntosArray); // Penúltimo valor

                    $ruta_puntos = DB::table('vista_ruta_puntos')
                        ->where('ruta', $last_ruta)
                        ->where('punto', $last_punto)
                        ->first();

                    // Comprobar si hay un resultado en $ruta_puntos
                    if ($ruta_puntos) {
                        $id_puntos_encontrados[] = $ruta_puntos->id_punto;
                        $name_puntos_encontrados[] = $ruta_puntos->punto;
                    }

                    $matriz_puntos = [];

                    // Log::info('Rutas Encontradas', [$id_rutas_encontradas]);
                    // Log::info('Puntos Encontrados', [$id_puntos_encontrados]);

                    if (
                        (count($id_puntos_encontrados) - count($id_rutas_encontradas) == 1) &&
                        (count($id_puntos_encontrados) + count($id_rutas_encontradas) == count($puntosArray))
                    ) {

                        /* CODIGO NUEVO */
                        $array_puntos = [];
                        $array_rutas = [];
                        $array_distancias = [];

                        for ($i = 0; $i < count($puntosArray) - 1; $i += 2) { // Restamos 1 para evitar índice fuera de rango
                            if (!isset($puntosArray[$i + 1])) {
                                break; // Si no hay un segundo punto, salimos del bucle
                            }

                            $ruta_puntos = DB::table('vista_ruta_puntos')
                                ->where('ruta', $puntosArray[$i + 1])
                                ->where('punto', $puntosArray[$i])
                                ->first();

                            if ($ruta_puntos) {
                                $id_ruta_encontrada = $ruta_puntos->id_ruta;

                                $resultados = DB::table('vista_ruta_puntos')
                                    ->where('id_ruta', $id_ruta_encontrada)
                                    ->get(['punto', 'ruta']);

                                $array_punto = $resultados->pluck('punto')->toArray();
                                $array_ruta = $resultados->pluck('ruta')->toArray();

                                // Log::info('-INICIO PR-', []);
                                // Log::info('ARRAY PUNTO', [$array_punto]);
                                $array_punto = ordenar_ruta_2puntos($array_punto, $puntosArray[$i], $puntosArray[$i + 2]);
                                // Log::info('ARRAY PUNTO ORDENADO', [$array_punto]);
                                $array_punto = is_array($array_punto) ? $array_punto : [];
                                $inicio_array = array_search($puntosArray[$i], $array_punto);
                                // Log::info('INICIO', [$inicio_array]);
                                $fin_array = array_search($puntosArray[$i + 2], $array_punto);
                                // Log::info('FIN', [$fin_array]);

                                $array_distancia = [];

                                for ($j = 0; $j < count($array_ruta); $j++) {
                                    $ruta_punto_distancia = DB::table('vista_ruta_puntos')
                                        ->where('ruta', $array_ruta[$j])
                                        ->where('punto', $array_punto[$j])
                                        ->first(['distancia']); // Solo recupera la columna 'distancia'

                                    // Verifica si se encontró un resultado antes de intentar acceder a la propiedad
                                    $array_distancia[] = $ruta_punto_distancia->distancia;
                                }

                                $array_distancia = moveNullToEnd($array_distancia);

                                // Log::info('ARRAY DISTANCIA', [$array_distancia]);

                                $array_punto = recortarArrayPorPosicion($array_punto, $inicio_array, $fin_array);
                                $array_ruta = recortarArrayPorPosicion($array_ruta, $inicio_array, $fin_array);
                                $array_distancia = recortarArrayPorPosicion($array_distancia, $inicio_array, $fin_array);
                                // Log::info('ARRAY PUNTO RECORTADO', [$array_punto]);
                                // Log::info('-FIN PR-', []);

                                $array_puntos[] = $array_punto;
                                $array_rutas[] = $array_ruta;
                                $array_distancias[] = $array_distancia;
                                $array_rutas_alt = $array_rutas;
                            }
                        }
                        // Log::info('ARRAY PUNTOS COMBINADO', [$array_puntos]);
                        // Log::info('ARRAY PUNTOS COMBINADO', [$array_rutas_alt]);
                        // Log::info('ARRAY RUTAS COMBINADO', [$array_rutas]);
                        // Log::info('ARRAY DISTANCIAS COMBINADO', [$array_distancias]);

                        if (count($array_puntos) > 1) {
                            foreach ($array_puntos as $key => &$subarray) {
                                if ($key !== array_key_last($array_puntos)) { // Solo aplica a los subarrays excepto el último
                                    array_pop($subarray);
                                }
                            }
                            unset($subarray); // Evita problemas con referencias en PHP

                            foreach ($array_rutas as $key => &$subarray) {
                                if ($key !== array_key_last($array_rutas)) { // Solo aplica a los subarrays excepto el último
                                    array_pop($subarray);
                                }
                            }
                            unset($subarray); // Evita problemas con referencias en PHP

                            foreach ($array_distancias as $key => &$subarray) {
                                if ($key !== array_key_last($array_distancias)) { // Solo aplica a los subarrays excepto el último
                                    array_pop($subarray);
                                }
                            }
                            unset($subarray); // Evita problemas con referencias en PHP

                            foreach ($array_rutas_alt as $key => &$subarray) {
                                if ($key >= 1) {
                                    array_shift($subarray); // Elimina el primer elemento del subarray
                                }
                            }
                            unset($subarray); // Evita problemas con referencias en PHP

                            // Log::info('ARRAY PUNTOS SIN ELEMENTO', [$array_puntos]);
                            // Log::info('ARRAY PUNTOS SIN ELEMENTO', [$array_rutas_alt]);
                            // Log::info('ARRAY RUTAS SIN ELEMENTO', [$array_rutas]);
                            // Log::info('ARRAY DISTANCIAS SIN ELEMENTO', [$array_distancias]);

                            $array_puntos = array_merge(...array_map('array_merge', $array_puntos));
                            $array_rutas = array_merge(...array_map('array_merge', $array_rutas));
                            $array_distancias = array_merge(...array_map('array_merge', $array_distancias));
                            $array_rutas_alt = array_merge(...array_map('array_merge', $array_rutas_alt));
                        } else {
                            $array_puntos = $array_puntos[0];
                            $array_rutas = $array_rutas[0];
                            $array_distancias = $array_distancias[0];
                            $array_rutas_alt = $array_rutas_alt[0];
                        }

                        $array_id_puntos = [];
                        $array_id_rutas = [];

                        for ($i = 0; $i < count($array_rutas); $i++) {
                            $ruta_puntos = DB::table('vista_ruta_puntos')
                                ->where('ruta', $array_rutas[$i])
                                ->where('punto', $array_puntos[$i])
                                ->first(['id_punto', 'id_ruta']);

                            $array_id_puntos[] = $ruta_puntos->id_punto;
                            // $array_id_rutas[] = $ruta_puntos->id_ruta;
                        }

                        for ($i = 0; $i < count($array_rutas_alt); $i++) {
                            $ruta_puntos = DB::table('vista_ruta_puntos')
                                ->where('ruta', $array_rutas_alt[$i])
                                //->where('punto', $array_puntos[$i])
                                ->first(['id_punto', 'id_ruta']);

                            // $array_id_puntos[] = $ruta_puntos->id_punto;
                            $array_id_rutas[] = $ruta_puntos->id_ruta;
                        }

                        // Log::info('ARRAY PUNTOS FINAL', [$array_puntos]);
                        // Log::info('ARRAY RUTAS FINAL', [$array_rutas]);
                        // Log::info('ARRAY DISTANCIAS FINAL', [$array_distancias]);

                        // $inicio = array_search($primerPunto, $name_vector_viaje);
                        // $fin = array_search($ultimoPunto, $name_vector_viaje);
                        $name_vector_viaje_recortado = $array_puntos;
                        $distancia_vector_viaje_recortado = $array_distancias;
                        $id_vector_viaje_recortado = $array_id_puntos;
                        $ruta_vector_viaje_recortado = $array_id_rutas;

                        // Log::info('$id_rutas_encontradas', [$id_rutas_encontradas]);
                        // Log::info('$name_rutas_encontradas', [$name_rutas_encontradas]);

                        /* CODIGO NUEVO */

                        $llave_select = 5;

                        // Recortar Arrays
                        // $inicio = array_search($primerPunto, $name_vector_viaje);
                        // $fin = array_search($ultimoPunto, $name_vector_viaje);
                        // $name_vector_viaje_recortado = recortarArrayPorPosicion($name_vector_viaje, $inicio, $fin);
                        // $distancia_vector_viaje_recortado = recortarArrayPorPosicion($distancia_vector_viaje, $inicio, $fin);
                        // $id_vector_viaje_recortado = recortarArrayPorPosicion($id_vector_viaje, $inicio, $fin);
                        // $ruta_vector_viaje_recortado = recortarArrayPorPosicion($ruta_vector_viaje, $inicio, $fin);
                        // Log::info('DISTANCIA VECTOR RECORTADO', [$distancia_vector_viaje_recortado]);
                    } else {

                        $validador = 0;
                        $error = "Favor revise si los puntos o rutas sean correctas y existen";
                        $name_vector_viaje_recortado = [];
                        $distancia_vector_viaje_recortado = [];
                        $id_vector_viaje_recortado = [];
                        $ruta_vector_viaje_recortado = [];
                        $id_vector_viaje_recortado[0] = '';
                        $llave_select = 5;
                    }

                    //Log::info('MATRIZ RECORTADO', [$name_vector_viaje_recortado]);
                    // Respuesta en formato JSON con los datos procesados
                    /* return response()->json([
                        'validador' => $validador,
                        'error' => $error,
                        'llave_select' => $llave_select,
                        'id_rutas_encontradas' => $id_rutas_encontradas,
                        'name_rutas_encontradas' => $name_rutas_encontradas,
                        'puntos_mensaje' => $name_puntos_encontrados,
                        'array_option_select' => $request->input('puntos'),
                        'id_vector_viaje' => $id_vector_viaje_recortado,
                        'name_vector_viaje' => $name_vector_viaje_recortado,
                        'distancia_vector_viaje' => $distancia_vector_viaje_recortado,
                        'ruta_vector_viaje' => $ruta_vector_viaje_recortado,
                        'primerPunto' => $id_vector_viaje_recortado[0],
        
                    ], 200); */
                } catch (\Exception $e) {
                    // Capturar cualquier excepción y devolver un mensaje de error
                    Log::error('Error al crear la ruta: ' . $e->getMessage());

                    /* return response()->json([
                        'message' => 'Ocurrió un error al procesar la solicitud.',
                        'error' => $e->getMessage()
                    ], 500); */
                }

                $result = [
                    'validador' => $validador,
                    'error' => $error,
                    'llave_select' => $llave_select,
                    'id_rutas_encontradas' => $id_rutas_encontradas,
                    'name_rutas_encontradas' => $name_rutas_encontradas,
                    'puntos_mensaje' => $name_puntos_encontrados,
                    'array_option_select' => $request->input('puntos'),
                    'id_vector_viaje' => $id_vector_viaje_recortado,
                    'name_vector_viaje' => $name_vector_viaje_recortado,
                    'distancia_vector_viaje' => $distancia_vector_viaje_recortado,
                    'ruta_vector_viaje' => $ruta_vector_viaje_recortado,
                    'primerPunto' => $id_vector_viaje_recortado[0] ?? null,
                ];

                // Decodifica la respuesta JSON
                // $result = json_decode($response->getBody()->getContents(), true);

                // Retorna la respuesta al frontend
                return response()->json($result, 201); // Código de estado 201 Created
            } catch (\Exception $e) {
                // Loguea el error y retorna una respuesta de error
                Log::error('Error en crearRuta: ' . $e->getMessage());
                return response()->json(['error' => 'Error al crear la ruta'], 500); // Código de estado 500 Internal Server Error
            }
        }
    }

    // Crear una nueva ruta_predeterminada
    public function storeRutaPredeterminada(Request $request)
    {
        // Obtener los datos directamente del request
        $data = $request->all();

        // Log::info('Datos recibidos para crear ruta predeterminada: ', [$data]);

        // Recuperar tipo de ficha
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;

        // Asignar valores por defecto
        $data['activo'] = 1; // Asignar valor por defecto a 'activo'
        $data['fk_user'] = Auth::id(); // Asignar el ID del usuario autenticado
        $data['tipo_ficha'] = $tipoFicha;

        // Crear la nueva ruta
        $ruta = ProcesoRutasPredeterminadas::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Ruta predeterminada creada exitosamente',
            'data' => $ruta
        ], 201);
    }

    // Actualizar una ruta predeterminada existente
    public function updateRutaPredeterminada(Request $request)
    {
        // Obtener los valores desde el request
        // $origen = $request->input('origen');
        // $destino = $request->input('destino');
        $vuelo = $request->input('vuelo');
        $array_option_select = $request->input('array_option_select');

        // Loguear los datos para depuración
        /* Log::info('vuelo', [$vuelo]);
        Log::info('array_option_select', [$array_option_select]); */

        // Recuperar tipo de ficha
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;

        // Obtener la ruta predeterminada a actualizar usando origen, destino y array_option_select
        $ruta = ProcesoRutasPredeterminadas::where('vuelo', $vuelo)
            ->where('array_option_select', $array_option_select)
            ->where('tipo_ficha', $tipoFicha)
            ->firstOrFail();

        // Loguear la ruta encontrada
        /* Log::info('RUTA', [$ruta]); */

        // Solo actualizar los campos que se han enviado en el request
        $data = $request->only([
            'fpl_punto_seleccionado',
        ]);

        // Actualizar la ruta predeterminada con los nuevos datos
        $ruta->update($data);

        // Retornar la respuesta en formato JSON
        return response()->json([
            'success' => true,
            'message' => 'Ruta predeterminada actualizada exitosamente',
            'data' => $ruta
        ], 200);
    }

    // Filtrar registros por origen y destino
    public function filtrarRutas(Request $request)
    {
        // Obtener los parámetros 'origen' y 'destino' del request
        // $origen = $request->input('origen');
        // $destino = $request->input('destino');
        $vuelo = $request->input('vuelo');

        // Consulta para filtrar las rutas por origen y destino, si se proporcionan
        $query = ProcesoRutasPredeterminadas::query();

        /* if ($origen) {
            $query->where('origen', $origen);
        } */

        /* if ($destino) {
            $query->where('destino', $destino);
        } */

        // Recuperar tipo de ficha
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;

        /* Log::info('TIPO FICHA', [$tipoFicha]);
        Log::info('vuelo', [$vuelo]); */

        // Verificar que $vuelo y $tipoFicha estén definidos
        if ($vuelo && $tipoFicha) {
            $query->where('vuelo', $vuelo)
                ->where('tipo_ficha', $tipoFicha);
        }

        // Ordenar los resultados por 'popular' de forma descendente
        $rutas = $query->orderBy('id', 'asc')->get();

        return response()->json($rutas);
    }

    public function filtrarRuta(Request $request)
    {

        // Obtener datos del request
        $vuelo = $request->input('vuelo');
        $select = $request->input('array_option_select'); // Debe coincidir con el AJAX

        // Recuperar tipo de ficha del usuario
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        // Verificar si se encontró el usuario y tiene un tipo de ficha
        if (!$userTip || !isset($userTip->pk_id_tipo_ficha)) {
            return response()->json(['error' => 'No se encontró el tipo de ficha del usuario'], 400);
        }

        $tipoFicha = $userTip->pk_id_tipo_ficha;

        // Construir la consulta
        $query = ProcesoRutasPredeterminadas::query()
            ->where('vuelo', $vuelo)
            ->where('array_option_select', $select)
            ->where('tipo_ficha', $tipoFicha);

        // Obtener las rutas ordenadas por ID ascendente
        $rutas = $query->orderBy('id', 'asc')->get();

        // Registrar la consulta en los logs
        // Log::info('Consulta generada:', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);

        return response()->json($rutas);
    }

    /**
     * Crear o actualizar un registro de ProcesoVuelo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate2(Request $request)
    {
        // Asignar los datos directamente del request
        $data = $request->all();

        if (in_array($request->input('id_estado'), [1, 2, 3])) {
            $data['fk_user'] = Auth::id();
            $data['activo']  = 1;
        }

        // Recuperar tipo de ficha
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci  = $userTip->pk_oaci;

        $data['oaci'] = $cod_oaci;

        if ($request->input('traspaso') == 1) {
            $tipoFicha = $request->input('tipo_ficha');
        }

        // Llaves lógicas (id_amhs nunca debe ser null)
        $keys = [
            'id_amhs'    => $data['id_amhs'],
            'tipo_ficha' => $tipoFicha,
            'oaci'       => $cod_oaci,
        ];

        $procesoVuelo = null;
        $message = null;

        try {
            DB::beginTransaction();

            // ====== Advisory lock no bloqueante y sin overflow ======
            // Usamos hash interno de Postgres para mapear TEXT -> int4 seguro
            $lk1 = (string)$keys['id_amhs'] . '|' . (string)$keys['tipo_ficha'];
            $lk2 = (string)$keys['oaci'];

            // Si no consigue el lock, devolvemos 423 (Locked)
            $row = DB::selectOne(
                'SELECT pg_try_advisory_xact_lock(hashtext(?), hashtext(?)) AS locked',
                [$lk1, $lk2]
            );

            if (!$row || !$row->locked) {
                DB::rollBack();
                return response()->json([
                    'message' => 'No se pudo obtener lock para procesar la solicitud. Intenta nuevamente.',
                ], 423);
            }
            // =======================================================

            // Sección crítica
            $procesoVuelo = ProcesoVuelo::where($keys)->first();

            if ($procesoVuelo) {
                $procesoVuelo->update($data);
                $message = 'Registro actualizado exitosamente';
            } else {
                $procesoVuelo = ProcesoVuelo::create(array_merge($data, $keys));
                $message = 'Registro creado exitosamente';
            }

            DB::commit();
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();

            // Sin UNIQUE, 23505 es raro; igual lo contemplamos
            if ($e->getCode() === '23505') {
                $procesoVuelo = ProcesoVuelo::where($keys)->first();
                if ($procesoVuelo) {
                    $procesoVuelo->update($data);
                    $message = 'Registro actualizado (post-conflicto)';
                } else {
                    return response()->json([
                        'message' => 'Conflicto de concurrencia al procesar el registro',
                        'error'   => $e->getMessage(),
                    ], 409);
                }
            } else {
                return response()->json([
                    'message' => 'Error al procesar el registro',
                    'error'   => $e->getMessage(),
                ], 500);
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error inesperado al procesar el registro',
                'error'   => $e->getMessage(),
            ], 500);
        }

        // Continuación: Nuevo Plan de Vuelo
        $ultimoProcesoVuelo = ProcesoVuelo::latest()->first();

        if ($ultimoProcesoVuelo && $ultimoProcesoVuelo->tipo_fpl == 1) {
            $ultimoRegistro = ProcesoNuevoVuelo::orderByDesc('n_registro_nuevo')->first();
            $nuevoRegistro  = $ultimoRegistro ? $ultimoRegistro->n_registro_nuevo + 1 : 1;

            ProcesoNuevoVuelo::create([
                'n_registro_nuevo' => $nuevoRegistro,
                'activo'           => true,
                'fk_user'          => auth()->id(),
            ]);

            $procesoVuelo->update(['id_amhs' => $nuevoRegistro]);
        }

        return response()->json([
            'message' => $message,
            'data'    => $procesoVuelo
        ], 200);
    }

    public function storeOrUpdate(Request $request)
    {
        // Asignar los datos directamente del request
        $data = $request->all();

        if (in_array($request->input('id_estado'), [1, 2, 3])) {
            // Asignar el ID del usuario autenticado a fk_user
            $data['fk_user'] = Auth::id();
            $data['activo'] = 1;
        }

        // Recuperar tipo de ficha
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        $data['oaci'] = $cod_oaci;

        if ($request->input('traspaso') == 1) {
            $tipoFicha = $request->input('tipo_ficha');
        }

        $procesoVuelo = ProcesoVuelo::join('user_tips', 'proceso_vuelo.fk_user', '=', 'user_tips.pk_id_user') // JOIN con user_tips
            ->where('proceso_vuelo.id_amhs', $data['id_amhs'])
            ->where('proceso_vuelo.tipo_ficha', $tipoFicha)
            ->where('user_tips.pk_oaci', $cod_oaci) // Filtro por pk_oaci en user_tips
            ->select('proceso_vuelo.*', 'user_tips.pk_oaci') // Puedes agregar más columnas de user_tips si necesitas
            ->first();

        if ($procesoVuelo) {
            // Si el registro existe, actualizarlo
            $procesoVuelo->update($data);
            $message = 'Registro actualizado exitosamente';
        } else {
            // Si no existe, crear uno nuevo
            $procesoVuelo = ProcesoVuelo::create($data);
            $message = 'Registro creado exitosamente';
        }

        $ultimoProcesoVuelo = ProcesoVuelo::latest()->first();

        // Nuevo Plan de Vuelo
        if ($ultimoProcesoVuelo->tipo_fpl == 1) {

            // Obtener el último registro de ProcesoNuevoVuelo
            $ultimoRegistro = ProcesoNuevoVuelo::orderByDesc('n_registro_nuevo')->first();
            $nuevoRegistro = $ultimoRegistro ? $ultimoRegistro->n_registro_nuevo + 1 : 1;

            // Crear un nuevo registro en proceso_nuevo_vuelo
            ProcesoNuevoVuelo::create([
                'n_registro_nuevo' => $nuevoRegistro,
                'activo' => true, // o false según tu lógica
                'fk_user' => auth()->id(), // o el ID del usuario actual según corresponda
            ]);

            // Actualizar datos con el nuevo número de registro
            $data = [
                'id_amhs' => $nuevoRegistro,
            ];

            // Realizar la actualización
            $procesoVuelo->update($data);
        }

        return response()->json([
            'message' => $message,
            'data' => $procesoVuelo // Devolver el registro completo creado o actualizado
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */

    /* public function store_neo_plan_vuelo(Request $request)
    {
        // Registrar los datos recibidos en el log para verificar
        // Log::info('Datos recibidos para crear plan de vuelo: ', $request->all());

        try {
            $servicio = new Client([
                'base_uri' => env('TRANSITO_API_URL') . '/api/ficha_neo_plan_vuelo',
            ]);

            // Obtiene la fecha y hora actual en UTC
            $fecha_hora = Carbon::now('UTC')->toDateTimeString();

            // Mapea los campos del formulario a los nombres que espera el servicio
            $data = [
                'vuelo' => $request->input('vuelo_pv'),
                'tipo' => $request->input('tipo_pv'),
                'etd' => $request->input('etd_pv'),
                'dep' => $request->input('dep_pv'),
                'dest' => $request->input('dest_pv'),
                'regla_tipo' => $request->input('regla_tipo_pv'),
                'reg' => $request->input('reg_pv'),
                'velocidad' => $request->input('velocidad_pv'),
                'fecha_hora' => $fecha_hora,
                'activo' => 1,
                'fk_user' => auth()->id(), // Asumimos que el usuario autenticado es el que crea el plan de vuelo
            ];

            $response = $servicio->post('', [
                'json' => $data
            ]);

            $plan = json_decode($response->getBody()->getContents(), true);

            return response()->json($plan, 201); // Código de estado 201 Created
        } catch (\Exception $e) {
            Log::error('Error al crear el plan de vuelo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el plan de vuelo'], 500); // Código de estado 500 Internal Server Error
        }
    } */

    /**
     * Recuperar la información de un ProcesoVuelo basado en el id_amhs.
     *
     * @param  int  $id_amhs
     * @return \Illuminate\Http\Response
     */
    public function getByIdAmhs($id_amhs)
    {

        // Recuperar tipo de ficha
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Buscar el registro por id_amhs
        /* $procesoVuelo = ProcesoVuelo::where('id_amhs', $id_amhs)
            ->where('tipo_ficha', $tipoFicha)
            ->first(); */

        $procesoVuelo = DB::table('proceso_vuelo')
            ->join('user_tips', 'proceso_vuelo.fk_user', '=', 'user_tips.pk_id_user')
            ->where('proceso_vuelo.id_amhs', $id_amhs)
            ->where('proceso_vuelo.tipo_ficha', $tipoFicha)
            ->where('user_tips.pk_oaci', $cod_oaci)
            ->select('proceso_vuelo.*')
            ->first();

        if ($procesoVuelo) {

            return response()->json([
                'message' => 'Registro encontrado exitosamente',
                'data' => $procesoVuelo,
            ], 200);
        } else {
            // Log cuando no se encuentra un registro
            // Log::warning('ProcesoVuelo not found', ['id_amhs' => $id_amhs]);
            return response()->json([
                'message' => 'Registro no encontrado',
                'data' => null,
            ], 200);
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
    /* public function update(Request $request, string $id)
    {
        // Registrar los datos recibidos en el log para verificar
        // Log::info('Datos recibidos para actualizar ficha de progreso: ', $request->all());

        try {
            // Convertir fpl_json a JSON si no está vacío y es un array
            $fplJson = $request->input('fpl_json');
            if ($fplJson && is_array($fplJson)) {
                $fplJson = json_encode($fplJson);
            }

            $response = Http::put(env('TRANSITO_API_URL') . "/api/ficha_progreso/{$id}", [
                'id_amhs' => $request->input('id_amhs'),
                'fecha' => $request->input('fecha'),
                'hora' => $request->input('hora'),
                'vuelo' => $request->input('vuelo'),
                'tipo' => $request->input('tipo'),
                'origen' => $request->input('origen'),
                'destino' => $request->input('destino'),
                'eobt' => $request->input('eobt'),
                'dep' => $request->input('dep'),
                'etd' => $request->input('etd'),
                'reg' => $request->input('reg'),
                'sel' => $request->input('sel'),
                'linea_aerea' => $request->input('linea_aerea'),
                'id_ruta' => $request->input('id_ruta'),
                'atd' => $request->input('atd'),
                'est' => $request->input('est'),
                'nivel' => $request->input('nivel'),
                'sq' => $request->input('sq'),
                'ha' => $request->input('ha'),
                'fpl_json' => $fplJson,
                'estado' => $request->input('estado'),
                'velocidad' => $request->input('velocidad'),
                'mensaje' => $request->input('mensaje'),
            ]);

            if ($response->successful()) {
                return response()->json($response->json(), 200); // Código de estado 200 OK
            } else {
                Log::error('Error al actualizar ficha de progreso: ' . $response->body());
                return response()->json(['error' => 'Error-01 al actualizar la ficha de progreso'], 500); // Código de estado 500 Internal Server Error
            }
        } catch (\Exception $e) {
            Log::error('Error al actualizar ficha de progreso: ' . $e->getMessage());
            return response()->json(['error' => 'Error-02 al actualizar la ficha de progreso'], 500); // Código de estado 500 Internal Server Error
        }
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /* public function obtenerDatMetPag(Request $request)
    {
        // Consulta los últimos 200 registros de la tabla 'metars' ordenados por ID o fecha
        $metars = DB::table('metars')
            ->leftJoin('proceso_metars', 'metars.id', '=', 'proceso_metars.id_amhs')
            ->select(
                'metars.*', // Todos los campos de la tabla metars
                'proceso_metars.tipo_meteo',
            )
            ->where(function ($query) {
                $query->where('proceso_metars.tipo_meteo', 2)
                    ->orWhereNull('proceso_metars.tipo_meteo'); // Incluye registros sin coincidencia en proceso_metars
            })
            ->orderBy('metars.id', 'desc')
            ->limit(500)
            ->get();

        // Retorna los datos como respuesta JSON
        return response()->json($metars);
    } */

    /* public function obtenerATSPag(Request $request)
    {

        $arrivos = DB::table('arrivos')
            ->leftJoin('proceso_metars', 'arrivos.id_amhs', '=', 'proceso_metars.id_amhs')
            ->select(
                'arrivos.*', // Todos los campos de la tabla arrivos
                'proceso_metars.tipo_meteo'
            )
            ->where(function ($query) {
                $query->where('proceso_metars.tipo_meteo', 1)
                    ->orWhereNull('proceso_metars.tipo_meteo'); // Incluye registros sin coincidencia en proceso_metars
            })
            ->orderBy('arrivos.id', 'desc')
            ->limit(500)
            ->get();

        // Retorna los datos como respuesta JSON
        return response()->json($arrivos);
    } */

    // Cargar nuevos registros basados en el lastId recibido
    /* public function loadNewDataMet(Request $request)
    {
        $lastId = $request->input('lastId');

        $metars = DB::table('metars')
            ->where('id', '>', $lastId)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($metars)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST')
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With');
    } */

    /* public function loadNewDataATS(Request $request)
    {
        $lastId = $request->input('lastId');
        $arrivos = DB::table('arrivos')
            ->where('id_amhs', '>', $lastId)
            ->orderBy('id_amhs', 'desc')
            ->get();

        return response()->json(
            [
                'data' => $arrivos,
            ]
        )
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST')
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With');
    } */

    // Cargar nuevos registros basados en el lastId recibido
    /* public function loadMoreDataMet(Request $request)
    {

        // Registrar los datos recibidos en el log para verificar
        $inicio = $request->input('inicio', 0);
        $fin = $request->input('fin', 100);

        // Obtener los siguientes 100 registros que tengan un id mayor al currentID
        $metars = DB::table('metars')
            ->where('id', '<', $inicio)
            ->orderBy('id', 'desc') // Los registros más recientes primero
            ->limit($fin)
            ->get();

        // Retornar los registros nuevos como JSON
        return response()->json($metars);
    } */

    // Cargar nuevos registros basados en el lastId recibido
    /* public function loadMoreDataATS(Request $request)
    {

        // Registrar los datos recibidos en el log para verificar
        $inicio = $request->input('inicio', 0);
        $fin = $request->input('fin', 100);

        // Obtener los siguientes 100 registros que tengan un id mayor al currentID
        $arrivos = DB::table('arrivos')
            ->where('id_amhs', '<', $inicio)
            ->orderBy('id_amhs', 'desc') // Los registros más recientes primero
            ->limit($fin)
            ->get();

        // Retornar los registros nuevos como JSON
        return response()->json($arrivos);
    } */

    public function fpl_reset(Request $request)
    {
        try {
            DB::beginTransaction(); // Iniciar transacción

            // Extraer datos del request
            $id_amhs = $request->id_amhs;
            $oaci = $request->oaci;
            $tipo_ficha = $request->tipo_ficha;
            $vuelo = $request->vuelo;
            $array_option_select = $request->array_option_select;

            // Verificar que los datos existen antes de proceder
            if (!$id_amhs || !$oaci || !$tipo_ficha || !$vuelo || !$array_option_select) {
                return response()->json(['error' => 'Faltan datos en la solicitud'], 400);
            }

            // Eliminar registros en la tabla proceso_vuelo
            $deletedVuelo = DB::table('proceso_vuelo')
                ->where('id_amhs', $id_amhs)
                ->where('oaci', $oaci)
                ->where('tipo_ficha', $tipo_ficha)
                ->where('vuelo', $vuelo)
                ->delete();

            // Eliminar registros en la tabla proceso_rutas_predeterminadas
            /* $deletedRuta = DB::table('proceso_rutas_predeterminadas')
                ->where('tipo_ficha', $tipo_ficha)
                ->where('vuelo', $vuelo)
                ->where('array_option_select', $array_option_select)
                ->delete(); */

            DB::commit(); // Confirmar transacción

            return response()->json([
                'message' => 'Registros eliminados correctamente',
                'deleted_vuelo' => $deletedVuelo,
                /* 'deleted_ruta' => $deletedRuta */
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Revertir cambios en caso de error

            return response()->json([
                'error' => 'Error al eliminar registros',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function save_meteo(Request $request)
    {
        try {
            // Verificar si ya existe un registro con los mismos valores
            $existingRecord = ProcesoMetar::where('id_amhs', $request->id_amhs)
                ->where('oaci', $request->oaci)
                ->where('tipo_ficha', $request->tipo_ficha)
                ->where('tipo_meteo', $request->tipo_meteo)
                ->first();

            if ($existingRecord) {
                return response()->json([
                    'message' => 'Datos meteorológicos guardados correctamente',
                ], 201); // Código 201 - Creado exitosamente
            }

            // Crear un nuevo registro en la tabla proceso_metars
            $procesoMetar = ProcesoMetar::create([
                'id_amhs' => $request->id_amhs,
                'oaci' => $request->oaci,
                'tipo_ficha' => $request->tipo_ficha,
                'tipo_meteo' => $request->tipo_meteo,
                'activo' => 1,
                'fk_user' => auth()->id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'message' => 'Datos meteorológicos guardados correctamente',
                'data' => $procesoMetar
            ], 201); // Código 201 - Creado exitosamente

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al guardar los datos meteorológicos',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function ats_data(Request $request)
    {
        // Paso 1: base query 
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Consulta
        $query = DB::table('arrivos')
            ->leftJoin('proceso_metars', function ($join) use ($tipoFicha, $cod_oaci) {
                $join->on('arrivos.id_amhs', '=', 'proceso_metars.id_amhs')
                    ->where('proceso_metars.tipo_ficha', '=', $tipoFicha)
                    ->where('proceso_metars.oaci', '=', $cod_oaci)
                    ->where('proceso_metars.tipo_meteo', '=', 1); // ATS
            })
            ->select(
                'arrivos.id',
                'arrivos.id_amhs',
                'arrivos.created_at',
                'arrivos.mensaje',
                'arrivos.tipoMensaje',
                DB::raw("CASE 
            WHEN proceso_metars.id_amhs IS NOT NULL THEN 1 
            ELSE 0 
         END AS estado")
            );

        // Paso 2: contar total antes de filtros
        $total = $query->count();

        // Paso 3: traer datos paginados
        $data = $query->orderBy('id', 'desc')->get();

        // Paso 4: aplicar filtro global sobre estado o fecha (formateada como 'DD HH:MM')
        if ($search = strtoupper($request->input('search.value'))) {

            // Limitar los datos sobre los que se va a filtrar
            $data = $data->take(100000);

            $data = $data->filter(function ($item) use ($search) {
                // 1. Estado real convertido a texto
                $estado = $item->estado == 1 ? 'LEIDO' : 'PENDIENTE';

                // 2. Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // 3. Mensaje en mayúsculas
                $mensaje = strtoupper($item->mensaje ?? '');

                // 4. Tipo mensaje
                $tipo = strtoupper($item->tipoMensaje ?? '');

                // 5. Vuelo extraído del mensaje (7 caracteres después del primer guion)
                $vuelo = '';
                $partes = explode('-', $item->mensaje ?? '');
                if (isset($partes[1])) {
                    $vuelo = substr($partes[1], 0, 7);
                    $vuelo = preg_replace('/[^A-Za-z0-9]/', '', $vuelo); // limpia caracteres extraños
                    $vuelo = strtoupper($vuelo);
                }

                // 6. Filtro real
                return Str::contains($estado, $search)
                    || Str::contains($formato, $search)
                    || Str::contains($mensaje, $search)
                    || Str::contains($tipo, $search)
                    || Str::contains($vuelo, $search);
            })->values();
        }

        // Paso 5: aplicar paginación manual sobre el arreglo ya filtrado
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
        // Paso 1: base query 
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Consulta
        $query = DB::table('metars')
            ->leftJoin('proceso_metars', function ($join) use ($tipoFicha, $cod_oaci) {
                $join->on('metars.id', '=', 'proceso_metars.id_amhs')
                    ->where('proceso_metars.tipo_ficha', '=', $tipoFicha)
                    ->where('proceso_metars.oaci', '=', $cod_oaci)
                    ->where('proceso_metars.tipo_meteo', '=', 2); // MET
            })
            ->select(
                'metars.id',
                'metars.id_amhs',
                'metars.created_at',
                'metars.mensaje',
                'metars.tipoMensaje',
                DB::raw("CASE 
            WHEN proceso_metars.id_amhs IS NOT NULL THEN 1 
            ELSE 0 
        END AS estado")
            )
            ->where('metars.tipoMensaje', '!=', 'SPECI');

        // Paso 2: contar total antes de filtros
        $total = $query->count();

        // Paso 3: traer datos paginados
        $data = $query->orderBy('id', 'desc')->get();

        // Paso 4: aplicar filtro global sobre estado o fecha (formateada como 'DD HH:MM')
        if ($search = strtoupper($request->input('search.value'))) {

            // Limitar los datos sobre los que se va a filtrar
            $data = $data->take(100000);

            $data = $data->filter(function ($item) use ($search) {
                // 1. Estado real convertido a texto
                $estado = $item->estado == 1 ? 'LEIDO' : 'PENDIENTE';

                // 2. Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // 3. Tipo mensaje
                $tipo = strtoupper($item->tipoMensaje ?? '');

                // 4. Mensaje en mayúsculas
                $mensaje = strtoupper($item->mensaje ?? '');

                // 5. Filtro real
                return Str::contains(strtoupper($estado), $search)
                    || Str::contains($formato, $search)
                    || Str::contains($tipo, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: aplicar paginación manual sobre el arreglo ya filtrado
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

    public function speci_data(Request $request)
    {
        // Paso 1: base query 
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Consulta
        $query = DB::table('metars')
            ->leftJoin('proceso_metars', function ($join) use ($tipoFicha, $cod_oaci) {
                $join->on('metars.id', '=', 'proceso_metars.id_amhs')
                    ->where('proceso_metars.tipo_ficha', '=', $tipoFicha)
                    ->where('proceso_metars.oaci', '=', $cod_oaci)
                    ->where('proceso_metars.tipo_meteo', '=', 2); // MET
            })
            ->select(
                'metars.id',
                'metars.id_amhs',
                'metars.created_at',
                'metars.mensaje',
                'metars.tipoMensaje',
                DB::raw("CASE 
            WHEN proceso_metars.id_amhs IS NOT NULL THEN 1 
            ELSE 0 
        END AS estado")
            )
            ->where('metars.tipoMensaje', '=', 'SPECI');

        // Paso 2: contar total antes de filtros
        $total = $query->count();

        // Paso 3: traer datos paginados
        $data = $query->orderBy('id', 'desc')->get();

        // Paso 4: aplicar filtro global sobre estado o fecha (formateada como 'DD HH:MM')
        if ($search = strtoupper($request->input('search.value'))) {

            // Limitar los datos sobre los que se va a filtrar
            $data = $data->take(100000);

            $data = $data->filter(function ($item) use ($search) {
                // 1. Estado real convertido a texto
                $estado = $item->estado == 1 ? 'LEIDO' : 'PENDIENTE';

                // 2. Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // 3. Tipo mensaje
                $tipo = strtoupper($item->tipoMensaje ?? '');

                // 4. Mensaje en mayúsculas
                $mensaje = strtoupper($item->mensaje ?? '');

                // 5. Filtro real
                return Str::contains(strtoupper($estado), $search)
                    || Str::contains($formato, $search)
                    || Str::contains($tipo, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: aplicar paginación manual sobre el arreglo ya filtrado
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
        // Paso 1: base query
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Consulta
        $query = DB::table('amhs')
            ->leftJoin('proceso_metars', function ($join) use ($tipoFicha, $cod_oaci) {
                $join->on('amhs.id_amhs', '=', 'proceso_metars.id_amhs')
                    ->where('proceso_metars.tipo_ficha', '=', $tipoFicha)
                    ->where('proceso_metars.oaci', '=', $cod_oaci)
                    ->where('proceso_metars.tipo_meteo', '=', 3); //SS
            })
            ->select(
                'amhs.id',
                'amhs.id_amhs',
                'amhs.created_at',
                'amhs.mensaje',
                DB::raw("CASE 
                    WHEN proceso_metars.id_amhs IS NOT NULL THEN 1 
                    ELSE 0 
                 END AS estado")
            )
            ->where(DB::raw("SPLIT_PART(amhs.mensaje, ' ', 2)"), 'like', '%SS');

        // Paso 2: contar total antes de filtros
        $total = $query->count();

        // Paso 3: traer datos paginados
        $data = $query->orderBy('id', 'desc')->get();

        // Paso 4: aplicar filtro global sobre estado o fecha (formateada como 'DD HH:MM')
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                // 1. Estado real convertido a texto
                $estado = $item->estado == 1 ? 'LEIDO' : 'PENDIENTE';

                // 2. Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // 3. Mensaje en mayúsculas
                $mensaje = strtoupper($item->mensaje ?? '');

                // 4. Filtro real
                return Str::contains(strtoupper($estado), $search)
                    || Str::contains($formato, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: aplicar paginación manual sobre el arreglo ya filtrado
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

    public function dd_data(Request $request)
    {
        // Paso 1: base query
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Consulta
        $query = DB::table('amhs')
            ->leftJoin('proceso_metars', function ($join) use ($tipoFicha, $cod_oaci) {
                $join->on('amhs.id_amhs', '=', 'proceso_metars.id_amhs')
                    ->where('proceso_metars.tipo_ficha', '=', $tipoFicha)
                    ->where('proceso_metars.oaci', '=', $cod_oaci)
                    ->where('proceso_metars.tipo_meteo', '=', 4); //DD
            })
            ->select(
                'amhs.id',
                'amhs.id_amhs',
                'amhs.created_at',
                'amhs.mensaje',
                DB::raw("CASE 
                    WHEN proceso_metars.id_amhs IS NOT NULL THEN 1 
                    ELSE 0 
                 END AS estado")
            )
            ->where(DB::raw("SPLIT_PART(amhs.mensaje, ' ', 2)"), 'like', '%DD');

        // Paso 2: contar total antes de filtros
        $total = $query->count();

        // Paso 3: traer datos paginados
        $data = $query->orderBy('id', 'desc')->get();

        // Paso 4: aplicar filtro global sobre estado o fecha (formateada como 'DD HH:MM')
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                // 1. Estado real convertido a texto
                $estado = $item->estado == 1 ? 'LEIDO' : 'PENDIENTE';

                // 2. Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // 3. Mensaje en mayúsculas
                $mensaje = strtoupper($item->mensaje ?? '');

                // 4. Filtro real
                return Str::contains(strtoupper($estado), $search)
                    || Str::contains($formato, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: aplicar paginación manual sobre el arreglo ya filtrado
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
        // Paso 1: base query
        $userTip = DB::table('user_tips')
            ->join('parametrica_descripcions', 'user_tips.pk_oaci', '=', 'parametrica_descripcions.pk_id_parametrica_descripcion')
            ->join('users', 'users.id', '=', 'user_tips.pk_id_user')
            ->where('user_tips.pk_id_user', Auth::id())
            ->select('user_tips.*', 'parametrica_descripcions.descripcion', 'users.name')
            ->first();

        $tipoFicha = $userTip->pk_id_tipo_ficha;
        $cod_oaci = $userTip->pk_oaci;

        // Consulta 
        $query = DB::table('amhs')
            ->leftJoin('proceso_metars', function ($join) use ($tipoFicha, $cod_oaci) {
                $join->on('amhs.id_amhs', '=', 'proceso_metars.id_amhs')
                    ->where('proceso_metars.tipo_ficha', '=', $tipoFicha)
                    ->where('proceso_metars.oaci', '=', $cod_oaci)
                    ->where('proceso_metars.tipo_meteo', '=', 5); // NOTAM
            })
            ->select(
                'amhs.id',
                'amhs.id_amhs',
                'amhs.created_at',
                'amhs.mensaje',
                DB::raw("CASE 
            WHEN proceso_metars.id_amhs IS NOT NULL THEN 1 
            ELSE 0 
         END AS estado")
            )
            ->where('amhs.mensaje', 'like', '%NOTAM%');

        // Paso 2: contar total antes de filtros
        $total = $query->count();

        // Paso 3: traer datos paginados
        $data = $query->orderBy('id', 'desc')->get();

        // Paso 4: aplicar filtro global sobre estado o fecha (formateada como 'DD HH:MM')
        if ($search = strtoupper($request->input('search.value'))) {
            $data = $data->filter(function ($item) use ($search) {
                // 1. Estado real convertido a texto
                $estado = $item->estado == 1 ? 'LEIDO' : 'PENDIENTE';

                // 2. Fecha formateada
                $fecha = \Carbon\Carbon::parse($item->created_at);
                $formato = $fecha->format('d/m H:i');

                // 3. Mensaje en mayúsculas
                $mensaje = strtoupper($item->mensaje ?? '');

                // 4. Filtro real
                return Str::contains(strtoupper($estado), $search)
                    || Str::contains($formato, $search)
                    || Str::contains($mensaje, $search);
            })->values();
        }

        // Paso 5: aplicar paginación manual sobre el arreglo ya filtrado
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
