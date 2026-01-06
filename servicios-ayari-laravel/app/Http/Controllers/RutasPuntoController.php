<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RutasPunto;
use App\Models\Ruta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

class RutasPuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Obtener los puntos de rutas activos con su correspondiente ruta
            $rutasPuntos = RutasPunto::select('rutas_puntos.*', 'rutas.ruta')
                ->join('rutas', 'rutas_puntos.id_ruta', '=', 'rutas.id')
                ->where('rutas_puntos.activo', 1)
                ->orderBy('rutas_puntos.id', 'desc')
                ->get();

            return response()->json($rutasPuntos, 200); // Código de estado 200 OK
        } catch (\Exception $e) {
            Log::error('Error al obtener los puntos de rutas: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener los puntos de rutas'], 500); // Código de estado 500 Internal Server Error
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
        //Log::info('Datos recibidos para crear punto de ruta: ', $request->all());

        // Validar los datos del formulario
        $request->validate([
            'id_ruta' => 'required|numeric',
            'punto' => 'required|string|max:255',
            'distancia' => 'required|numeric',
            'orden' => 'required|numeric',
            'activo' => 'required|numeric',
            'fk_user' => 'required|numeric',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'tramo_inicial' => 'nullable|string',
            'tramo_final' => 'nullable|string',
            'punto_salida' => 'nullable|numeric',
        ]);

        try {

            // Preparar los datos para guardar en la base de datos
            $data = [
                'id_ruta' => $request->input('id_ruta'),
                'punto' => $request->input('punto'),
                'distancia' => $request->input('distancia'),
                'orden' => $request->input('orden'),
                'activo' => $request->input('activo'),
                'fk_user' => $request->input('fk_user'),
                'latitud' => $request->input('latitud'),
                'longitud' => $request->input('longitud'),
                'tramo_inicial' => $request->input('tramo_inicial'),
                'tramo_final' => $request->input('tramo_final'),
                'punto_salida' => $request->input('punto_salida'),
            ];

            // Guardar los datos en la base de datos
            $rutaPunto = RutasPunto::create($data);

            return response()->json($rutaPunto, 201);
        } catch (\Exception $e) {
            Log::error('Error al crear punto de ruta: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el punto de ruta'], 500);
        }
    }

    public function search_ruta(Request $request)
    {
        // Registrar los datos recibidos en el log para verificar
        //Log::info('Mensaje recibido para crear la secuencia de puntos: ', ['request' => $request]);

        $puntos = $request->input('puntos');

        // Separar los puntos en un array
        $puntosArray = preg_split('/[\s\/]+/', trim($puntos));

        // Inicializar array de rutas encontradas
        $rutas_encontradas = [];
        $rutas_agregadas = []; // Array para verificar rutas ya agregadas
        $id_rutas_encontradas = [];
        $id_puntos_encontrados = [];
        $id_ruta_puntos = [];

        try {
            // Buscar cada ruta en el mensaje y agregar al array si existe
            foreach ($puntosArray as $punto) {
                $ruta = Ruta::where('ruta', $punto)->first();
                if ($ruta) {
                    $id_rutas_encontradas[] = $ruta->id;
                }
            }

            // Eliminar valores duplicados
            $id_rutas_encontradas = array_unique($id_rutas_encontradas);
            // Reindexar el array para que las llaves sean consecutivas
            $id_rutas_encontradas = array_values($id_rutas_encontradas);

            // Buscar cada punto en el mensaje y agregar al array si existe
            $puntos_mensaje = [];
            $contador_puntos = 0;

            foreach ($id_rutas_encontradas as $id_ruta) {
                $contador_puntos = 0; // Inicializar el contador para cada $id_ruta
                foreach ($puntosArray as $punto) {
                    $ruta_puntos = DB::table('vista_ruta_puntos')
                        ->where('id_ruta', $id_ruta)
                        ->where('punto', $punto)
                        ->first();

                    if ($ruta_puntos !== null) {
                        $puntos_mensaje[$id_ruta][$contador_puntos] = $ruta_puntos->punto;
                        $contador_puntos++;
                    } else {
                        error_log("No se encontró el punto $punto para la ruta $id_ruta.");
                    }
                }
            }

            // Obtener los arrays de puntos por cada ruta encontrada
            $id_puntos_encontrados = [];
            $name_puntos_encontrados = [];
            $contador_puntos = 0;
            foreach ($id_rutas_encontradas as $id_ruta) {
                $ruta_puntos = DB::table('vista_ruta_puntos')
                    ->where('id_ruta', $id_ruta)
                    ->get(); // Obtiene los resultados como una colección

                // Recorrer los resultados y almacenar los id_punto en el array
                foreach ($ruta_puntos as $punto) {
                    $id_puntos_encontrados[$id_ruta][$contador_puntos] = $punto->id_punto;
                    $name_puntos_encontrados[$id_ruta][$contador_puntos] = $punto->punto;
                    ++$contador_puntos;
                }
            }

            $resultado = []; // Inicializar el array para almacenar los valores comunes
            $punto_comun = [];
            $id_vector_viaje = [];
            $name_vector_viaje = [];
            $ruta_vector_viaje = [];
            $distancia_vector_viaje = [];
            $option_select = 0;
            $array_option_select = [];
            $llave_rutas = [];
            $llave_select = 0;
            $llave_cambio_ruta_doble = 0;

            // Punto de Ingreso del Avion
            if (count($id_rutas_encontradas) == 1) {

                // Una Ruta
                foreach ($id_rutas_encontradas as $id_ruta) {

                    if (count($puntos_mensaje) > 0) {

                        $llave_select = 1; // Una Ruta // Una Salida
                        $primer_punto = $puntos_mensaje[$id_ruta][0];
                        $name_puntos_ordenados = ordenar_ruta($name_puntos_encontrados[$id_ruta], $primer_punto);

                        $name_vector_viaje = $name_puntos_ordenados;
                        $id_vector = [];
                        $distancia_vector_viaje = [];

                        foreach ($name_vector_viaje as $valor) {
                            $namePunto = DB::table('vista_ruta_puntos')
                                ->where('id_ruta', $id_ruta)
                                ->where('punto', $valor)
                                ->first();
                            $id_vector[] = $namePunto->id_punto;
                            $distancia_vector_viaje[] = $namePunto->distancia;
                            $ruta_vector_viaje[] = $id_ruta;
                        }

                        $id_vector_viaje = $id_vector;
                        $name_vector_viaje = array_values($name_vector_viaje);
                        $distancia_vector_viaje = moveNullToEnd($distancia_vector_viaje);

                        // option select
                        foreach ($id_rutas_encontradas as $id_ruta) {

                            $ruta = Ruta::where('id', $id_ruta)->first();
                            $option_select = $ruta->ruta;

                            if (isset($puntos_mensaje[$id_ruta])) {
                                foreach ($puntos_mensaje[$id_ruta] as $punto_mensaje) {
                                    $option_select = $option_select . " " . $punto_mensaje;
                                }
                            }
                        }

                        $array_option_select[] = $option_select;
                    } else {
                        $llave_select = 2; // Una Ruta // Dos Salidas

                        foreach ($id_rutas_encontradas as $id_ruta) {
                            $ruta = Ruta::where('id', $id_ruta)->first();
                            $option_select = $ruta->ruta;
                        }

                        $namePuntos = DB::table('vista_ruta_puntos')
                            ->where('id_ruta', $id_ruta)
                            ->get();

                        $name_vector_viaje = [];
                        $id_vector_viaje = [];
                        $vector_viaje = [];
                        $id_viaje = [];
                        $distancia_viaje = [];
                        $ruta_viaje = [];

                        foreach ($namePuntos as $namePunto) {
                            $vector_viaje[] = $namePunto->punto;
                            $id_viaje[] = $namePunto->id_punto;
                            $distancia_viaje[] = $namePunto->distancia;
                            $ruta_viaje[] = $id_ruta;
                        }

                        $valor_inicial = reset($vector_viaje);
                        $valor_final = end($vector_viaje);
                        $array_option_select[0] = $option_select . " " . $valor_inicial . " " . $valor_final;
                        $array_option_select[1] = $option_select . " " . $valor_final . " " . $valor_inicial;

                        $name_vector_viaje[0] = $vector_viaje;
                        $id_vector_viaje[0] = $id_viaje;
                        $distancia_vector_viaje[0] = moveNullToEnd($distancia_viaje);
                        $ruta_vector_viaje[0] = $ruta_viaje;

                        $name_vector_viaje[1] = array_reverse($vector_viaje);
                        $id_vector_viaje[1] = array_reverse($id_viaje);
                        $distancia_vector_viaje[1] = moveNullToEnd($distancia_viaje);
                        $ruta_vector_viaje[1] = $ruta_viaje;
                    }
                }
            }

            if (count($id_rutas_encontradas) > 1) {

                $option_select = '';
                $llave_select = 3; // Cambio de Ruta // Una Salida

                //Log::info('CICLOS: ', [count($id_rutas_encontradas) - 1]);

                // Varias Rutas
                for ($i = 0; $i < count($id_rutas_encontradas) - 1; $i++) {

                    $proxima_ruta = $i + 1;

                    if (isset($puntos_mensaje[$id_rutas_encontradas[$i]])) {
                        $primer_punto = $puntos_mensaje[$id_rutas_encontradas[$i]][0];
                    } else {
                        $primer_punto = '';
                    }

                    /* $id_vector_viaje[] = "Jose" . $i;
                    $id_vector_viaje[] = "PRIMER PUNTO------------------>" . $primer_punto; */
                    //Log::info('Jose', [$i]);
                    //Log::info('PRIMER PUNTO------------------>', [$primer_punto]);


                    if (isset($name_puntos_encontrados[$id_rutas_encontradas[$i]])) {

                        /* $id_vector_viaje[] = "Antes Ordenar:";
                        $id_vector_viaje[] = $name_puntos_encontrados[$id_rutas_encontradas[$i]]; */
                        //Log::info('Antes Ordenar:', [$name_puntos_encontrados[$id_rutas_encontradas[$i]]]);

                        $punto1 = ordenar_ruta($name_puntos_encontrados[$id_rutas_encontradas[$i]], $primer_punto);
                    } else {
                        $punto1 = [];
                    }

                    /* $id_vector_viaje[] = "Despues Ordenar:";
                    $id_vector_viaje[] = $punto1;
                    $id_vector_viaje[] = "                            "; */
                    //Log::info('Despues Ordenar:', [$punto1]);

                    if (isset($name_puntos_encontrados[$id_rutas_encontradas[$proxima_ruta]])) {
                        $punto2 = $name_puntos_encontrados[$id_rutas_encontradas[$proxima_ruta]];
                    } else {
                        $punto2 = [];
                    }

                    // $id_vector_viaje[] = $punto2;
                    //Log::info('PUNTO 2:', [$punto2]);

                    if (isset($puntos_mensaje[$id_rutas_encontradas[$proxima_ruta]])) {
                        $punto2_mensaje = $puntos_mensaje[$id_rutas_encontradas[$proxima_ruta]];
                    } else {
                        $punto2_mensaje = [];
                    }

                    /* $id_vector_viaje[] = "Punto2 Mensaje:";
                    $id_vector_viaje[] = $punto2_mensaje;
                    $id_vector_viaje[] = "                            "; */
                    //Log::info('PUNTO 2 MENSAJE', [$punto2_mensaje]);

                    $array_ruta_viaje = ruta_viaje($punto1, $punto2, $punto2_mensaje);

                    /* $id_vector_viaje[] = "Ruta Cortada:";
                    $id_vector_viaje[] = ruta_viaje($punto1, $punto2, $punto2_mensaje); */
                    //Log::info('Ruta Cortada:', [$array_ruta_viaje]);
                    //Log::info('Ruta Cortada 0:', [$array_ruta_viaje[0]]);
                    //Log::info('Ruta Cortada 1:', [$array_ruta_viaje[1]]);

                    if (isset($array_ruta_viaje[0]) && isset($array_ruta_viaje[1]) && $array_ruta_viaje[0] !== 0 && $array_ruta_viaje[1] !== 0) {

                        //Log::info('ENTRE Y COUNT:', [count($array_ruta_viaje)]);

                        if (count($array_ruta_viaje) == 4) {

                            $llave_cambio_ruta_doble = 1; // Cambio de Ruta // Doble Doble

                            $name_vector_viaje[$id_rutas_encontradas[$i]] = [
                                'inicial1-' . $id_rutas_encontradas[$i] => $array_ruta_viaje[0],
                                'inicial2-' . $id_rutas_encontradas[$i] => $array_ruta_viaje[2]
                            ];
                            $llave_rutas[0] = $id_rutas_encontradas[$i];
                            $name_vector_viaje[$id_rutas_encontradas[$proxima_ruta]] = [
                                'final1-' . $id_rutas_encontradas[$proxima_ruta] => $array_ruta_viaje[1],
                                'final2-' . $id_rutas_encontradas[$proxima_ruta] => $array_ruta_viaje[3]
                            ];
                            $llave_rutas[1] = $id_rutas_encontradas[$proxima_ruta];
                        } else {
                            $name_vector_viaje[$id_rutas_encontradas[$i]] = $array_ruta_viaje[0];
                            $name_vector_viaje[$id_rutas_encontradas[$proxima_ruta]] = $array_ruta_viaje[1];
                        }

                        // $id_vector_viaje[] = $llave_rutas;
                        //Log::info('LLAVE RUTAS:', [$llave_rutas]);
                    }
                }
            }

            if ($llave_cambio_ruta_doble == 1) {
                $llave_select = 4;  // Cambio de Ruta // Doble Salida
            }

            //Log::info('LLAVE SELECT:', [$llave_select]);

            switch ($llave_select) {
                case 1: {
                    }
                    break;
                case 2: {
                    }
                    break;
                case 3: { // Cambio de Ruta // Una Salida

                        $option_select = '';
                        $vector_viaje = [];
                        $id_vector_viaje = [];
                        $distancia_vector_viaje = [];
                        $ruta_vector_viaje = [];

                        //Log::info('RUTAS ENCONTRADAS 3:', [$id_rutas_encontradas]);

                        foreach ($id_rutas_encontradas as $id_ruta) {

                            if (isset($name_vector_viaje[$id_ruta])) {

                                $ruta = Ruta::where('id', $id_ruta)->first();
                                $option_select = $option_select . " " . $ruta->ruta;

                                $valor_inicial = reset($name_vector_viaje[$id_ruta]);
                                $valor_final = end($name_vector_viaje[$id_ruta]);
                                $vector_viaje = array_merge($vector_viaje, $name_vector_viaje[$id_ruta]);

                                foreach ($name_vector_viaje[$id_ruta] as $valor) {
                                    $namePunto = DB::table('vista_ruta_puntos')
                                        ->where('id_ruta', $id_ruta)
                                        ->where('punto', $valor)
                                        ->first();
                                    $id_vector_viaje[] = $namePunto->id_punto;
                                    $distancia_vector_viaje[] = $namePunto->distancia;
                                    $ruta_vector_viaje[] = $id_ruta;
                                }

                                $option_select = $option_select . " " . $valor_inicial . " " . $valor_final;
                            }
                        }

                        //Log::info('DISTANCIA VECTOR VIAJE', [$distancia_vector_viaje]);


                        if (is_array($distancia_vector_viaje) && count($distancia_vector_viaje) > 0) {
                            $distancia_vector_viaje = moveNullToEnd($distancia_vector_viaje);
                        }

                        $array_option_select[0] = $option_select;
                        $name_vector_viaje = $vector_viaje;
                    }
                    break;
                case 4: { // Cambio de Ruta // Doble Salida

                        $array_option_select = [];
                        $name_rutas = [];

                        $i = 0;
                        $j = 1;

                        $ruta = Ruta::where('id', $llave_rutas[$i])->first();
                        $name_rutas[$i] = $ruta->ruta;

                        $ruta = Ruta::where('id', $llave_rutas[$j])->first();
                        $name_rutas[$j] = $ruta->ruta;

                        $i1 = 'inicial1-' . $llave_rutas[$i];
                        $i2 = 'inicial2-' . $llave_rutas[$i];
                        $f1 = 'final1-' . $llave_rutas[$j];
                        $f2 = 'final2-' . $llave_rutas[$j];

                        $valor_inicial_i1 = reset($name_vector_viaje[$llave_rutas[$i]][$i1]);
                        $valor_final_i1 = end($name_vector_viaje[$llave_rutas[$i]][$i1]);
                        $valor_inicial_i2 = reset($name_vector_viaje[$llave_rutas[$i]][$i2]);
                        $valor_final_i2 = end($name_vector_viaje[$llave_rutas[$i]][$i2]);

                        $valor_inicial_f1 = reset($name_vector_viaje[$llave_rutas[$j]][$f1]);
                        $valor_final_f1 = end($name_vector_viaje[$llave_rutas[$j]][$f1]);
                        $valor_inicial_f2 = reset($name_vector_viaje[$llave_rutas[$j]][$f2]);
                        $valor_final_f2 = end($name_vector_viaje[$llave_rutas[$j]][$f2]);

                        $array_option_select[0] = $name_rutas[$i] . " " . $valor_inicial_i1 . " " . $valor_final_i1 . " " . $name_rutas[$j] . " " . $valor_inicial_f1 . " " . $valor_final_f1;
                        $array_option_select[1] = $name_rutas[$i] . " " . $valor_inicial_i2 . " " . $valor_final_i2 . " " . $name_rutas[$j] . " " . $valor_inicial_f2 . " " . $valor_final_f2;

                        $vector_viaje = [];

                        // Combinar los arrays
                        $vector_viaje[0] = array_merge($name_vector_viaje[$llave_rutas[$i]][$i1], $name_vector_viaje[$llave_rutas[$j]][$f1]);
                        $vector_viaje[1] = array_merge($name_vector_viaje[$llave_rutas[$i]][$i2], $name_vector_viaje[$llave_rutas[$j]][$f2]);

                        $id_vector_viaje = [];

                        $id_puntos = [];
                        $distancia_puntos = [];
                        $ruta_viaje = [];

                        foreach ($name_vector_viaje[$llave_rutas[$i]][$i1] as $valor) {
                            $namePunto = DB::table('vista_ruta_puntos')
                                ->where('id_ruta', $llave_rutas[$i])
                                ->where('punto', $valor)
                                ->first();
                            $id_puntos[] = $namePunto->id_punto;
                            $distancia_puntos[] = $namePunto->distancia;
                            $ruta_viaje[] = $llave_rutas[$i];
                        }

                        foreach ($name_vector_viaje[$llave_rutas[$j]][$f1] as $valor) {
                            $namePunto = DB::table('vista_ruta_puntos')
                                ->where('id_ruta', $llave_rutas[$j])
                                ->where('punto', $valor)
                                ->first();
                            $id_puntos[] = $namePunto->id_punto;
                            $distancia_puntos[] = $namePunto->distancia;
                            $ruta_viaje[] = $llave_rutas[$j];
                        }

                        $id_vector_viaje[0] = $id_puntos;
                        $distancia_vector_viaje[0] = moveNullToEnd($distancia_puntos);
                        $ruta_vector_viaje[0] = $ruta_viaje;
                        $id_puntos = [];
                        $distancia_puntos = [];
                        $ruta_viaje = [];

                        foreach ($name_vector_viaje[$llave_rutas[$i]][$i2] as $valor) {
                            $namePunto = DB::table('vista_ruta_puntos')
                                ->where('id_ruta', $llave_rutas[$i])
                                ->where('punto', $valor)
                                ->first();
                            $id_puntos[] = $namePunto->id_punto;
                            $distancia_puntos[] = $namePunto->distancia;
                            $ruta_viaje[] = $llave_rutas[$i];
                        }

                        foreach ($name_vector_viaje[$llave_rutas[$j]][$f2] as $valor) {
                            $namePunto = DB::table('vista_ruta_puntos')
                                ->where('id_ruta', $llave_rutas[$j])
                                ->where('punto', $valor)
                                ->first();
                            $id_puntos[] = $namePunto->id_punto;
                            $distancia_puntos[] = $namePunto->distancia;
                            $ruta_viaje[] = $llave_rutas[$j];
                        }

                        $id_vector_viaje[1] = $id_puntos;
                        $distancia_vector_viaje[1] = moveNullToEnd($distancia_puntos);
                        $ruta_vector_viaje[1] = $ruta_viaje;

                        $name_vector_viaje = [];
                        $name_vector_viaje[0] = $vector_viaje[0];
                        $name_vector_viaje[1] = $vector_viaje[1];
                    }
                    break;
                default:
                    echo "Llave select no válida.";
                    break;
            }

            $name_rutas_encontradas = [];
            foreach ($id_rutas_encontradas as $id_ruta) {
                $ruta = Ruta::where('id', $id_ruta)->first();
                $name_rutas_encontradas[] = $ruta->ruta;
            }

            //Log::info('llave_select', [$llave_select]);
            //Log::info('id_rutas_encontradas', [$id_rutas_encontradas]);
            //Log::info('name_rutas_encontradas', [$name_rutas_encontradas]);
            //Log::info('puntos_mensaje', [$puntos_mensaje]);
            //Log::info('array_option_select', [$array_option_select]);
            //Log::info('id_vector_viaje', [count($id_vector_viaje)]);
            //Log::info('name_vector_viaje', [$name_vector_viaje]);
            //Log::info('distancia_vector_viaje', [$distancia_vector_viaje]);
            //Log::info('ruta_vector_viaje', [$ruta_vector_viaje]);

            if (count($id_vector_viaje) == 0) {
                $llave_select = 0;
            }

            return response()->json([
                'llave_select' => $llave_select,
                'id_rutas_encontradas' => $id_rutas_encontradas,
                'name_rutas_encontradas' => $name_rutas_encontradas,
                'puntos_mensaje' => $puntos_mensaje,
                'array_option_select' => $array_option_select,
                'id_vector_viaje' => $id_vector_viaje,
                'name_vector_viaje' => $name_vector_viaje,
                'distancia_vector_viaje' => $distancia_vector_viaje,
                'ruta_vector_viaje' => $ruta_vector_viaje,

            ], 200); // Positivo
        } catch (\Throwable $th) {
            // Registrar el error en el log para depuración
            Log::error('Error al procesar el mensaje: ', ['error' => $th->getMessage()]);
            return response()->json(['error' => 'Error al procesar el mensaje'], 500);
        }
    }

    public function crear_ruta(Request $request)
    {
        try {
            $puntos = $request->input('puntos');
            $puntosArray = explode(' ', trim($puntos));

            Log::info('PUNTOS', [$puntosArray]);

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

            Log::info('Rutas Encontradas', [$id_rutas_encontradas]);
            Log::info('Puntos Encontrados', [$id_puntos_encontrados]);

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
            return response()->json([
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

            ], 200); // 200 indica éxito

        } catch (\Exception $e) {
            // Capturar cualquier excepción y devolver un mensaje de error
            Log::error('Error al crear la ruta: ' . $e->getMessage());

            return response()->json([
                'message' => 'Ocurrió un error al procesar la solicitud.',
                'error' => $e->getMessage()
            ], 500); // 500 indica error del servidor
        }
    }

    /**
     * Display the specified resource.y
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
        // Validar los datos del formulario
        $request->validate([
            'id_ruta' => 'required|numeric',
            'punto' => 'required|string|max:255',
            'distancia' => 'required|numeric',
            'orden' => 'required|numeric',
            'activo' => 'required|numeric',
            'fk_user' => 'required|numeric',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
            'tramo_inicial' => 'nullable|string',
            'tramo_final' => 'nullable|string',
            'punto_salida' => 'nullable|numeric',
        ]);

        try {
            // Buscar el punto de ruta por su ID
            $rutaPunto = RutasPunto::findOrFail($id);

            // Actualizar los datos del punto de ruta
            $rutaPunto->id_ruta = $request->input('id_ruta');
            $rutaPunto->punto = $request->input('punto');
            $rutaPunto->distancia = $request->input('distancia');
            $rutaPunto->orden = $request->input('orden');
            $rutaPunto->activo = $request->input('activo');
            $rutaPunto->fk_user = $request->input('fk_user');
            $rutaPunto->latitud = $request->input('latitud');
            $rutaPunto->longitud = $request->input('longitud');
            $rutaPunto->tramo_inicial = $request->input('tramo_inicial');
            $rutaPunto->tramo_final = $request->input('tramo_final');
            $rutaPunto->punto_salida = $request->input('punto_salida');

            // Guardar los cambios en la base de datos
            $rutaPunto->save();

            return response()->json($rutaPunto, 200);
        } catch (\Exception $e) {
            Log::error('Error al actualizar punto de ruta: ' . $e->getMessage());
            return response()->json(['error' => 'Error al actualizar el punto de ruta'], 500);
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
            $rutaPunto = RutasPunto::findOrFail($id);
            $rutaPunto->update(['activo' => 0]);

            return response()->json(['message' => 'Punto desactivado correctamente'], 200);
        } catch (\Exception $e) {
            Log::error('Error al desactivar el punto: ' . $e->getMessage());
            return response()->json(['error' => 'Error al desactivar el Punto'], 500);
        }
    }
}
