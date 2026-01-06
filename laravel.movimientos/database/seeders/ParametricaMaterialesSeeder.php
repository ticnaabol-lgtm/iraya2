<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametricaMaterialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametrica_materials')->insert([

            /**** TIPOS DE MEDIDA ****/
            [
                'descripcion' => 'CAJA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'PAQUETE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'HOJA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'PIEZA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'FRASCO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'TABLETAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'BOLSA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'BOTE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'BIDON',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'JUEGO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'KILO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'ROLLO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'PAR',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'BLOCK',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'METRO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'MADEJA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'RESMA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'UNIDAD',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'OVILLO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'LITRO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'TABLETAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'COMPUESTO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],
            [
                'descripcion' => 'LATA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '24',
            ],


            /**** TIPOS DE TONER ****/
            [
                'descripcion' => 'TONER LASSER JET HP 12  A',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 15-A',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER IR-1510',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER PARA FOTOCOPIADORA RICOH',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER FOTOCOPIADORA TOSHIBA T-1600  D ESTUDIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 35A',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER 85 A',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 126-A (310) COLO NEGRO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 126-A ( 311 AZUL)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 126-A  (310 AMARILLO)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 126-A ( 313 -MAGENTA)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 125-A, COLO NEGRO 540',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 125-A, CYAN - 541',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 125-A, CELESTE ',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 125-A, AMARILLO - 542',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP 125A, MAGENTA - 543',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER CANON GPR 35 (NEGRO )',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER HP MODELO CF17A',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'TONER FOTOCOPIADORA XEROX B7030',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],
            [
                'descripcion' => 'CINTA PARA IMPRESORA; EPSON  LQ-590; TIPO CARRO CORTO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '25',
            ],


            /**** TIPOS DE PAPEL ****/
            [
                'descripcion' => 'PAPEL CARBONICO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL BOMD DE 75 GRS T/CARTA COLORES, Celeste, Amarillo',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL BOMD DE 75 GRS T/CARTA COLORES, Celeste, Rosado',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL BOMD DE 75 GRS T/CARTA BLANCO (Pap de 500 h.)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL BOMD DE 75 GRS T/OFICIO BLANCO (Pap de 500 h.)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL BOMD DE 75 GRS T/CARTA COLORES (Pap de 500 h.)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL AUTOADESIVO - RESMA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL KRAF T/RESMA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL RECICLADO T/OFICIO DE 75 GRAMOS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL MEMBRETADO EXTERNO, EN PAPEL ECOLOGICO DE 75 Grs.',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL MENBRETADAS EXTERNAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],
            [
                'descripcion' => 'PAPEL HIGIENICO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '26',
            ],


            /**** TIPOS SE SOBRE ****/
            [
                'descripcion' => 'SOBRE MANILA T/DOBLE OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '27',
            ],
            [
                'descripcion' => 'SOBRE MANILA T/OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '27',
            ],
            [
                'descripcion' => 'SOBRE MANILA T/CARTA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '27',
            ],
            [
                'descripcion' => 'SOBRE MANILA T/MEDIO OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '27',
            ],
            [
                'descripcion' => 'SOBRE MANILA T/DOBLE CARTA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '27',
            ],

            /**** TIPOS DE MEDICAMENTOS ****/
            [
                'descripcion' => 'DICLOFENACO EN GEL DE 20 GRS.',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'IBUPROFENO 400 MG.',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'VENDA GASA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'VENDA ADHESIVA CURITA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'PARACETAMOL',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'TELAS ADHESIVAS P/CURACIONES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'TINTURA DE YODO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'ALGODON',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'BOTIQUIN METALICO MEDIANO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'AGUA OXIGENADA DE 125 ML',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'KETOROLAC',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'DEXAMETAZONA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'ANTIGRIPAL COMPUESTO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'METOCLOPRAMIDA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],
            [
                'descripcion' => 'ALCOHOL DE 120 ML DE 75%',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '28',
            ],


            /**** ENSERES DE LIMPIEZA ****/
            [
                'descripcion' => 'DESINFECTANTE LIQUIDO INCOLOREO E INODORO, (AMONIO CUATERNARIO DE QUINTA DE 500 ml.)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'AMBIENTADOR EM AEROSOL',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'JABÓN ANTIBACTERIAL DE 5 LTS.',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'HIPOCLORITO DE SODIO, LAVANDINA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'FRANELA DE LIMPIEZA GRUESA (FRANELA)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'LUSTRA MUEBLES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'DISPENSADOR PARA JABÓN LIQUIDO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'CERA PARA PISO (SACHET)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'ESCOBA PLASTICO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'GUANTES DE LATEX PARA LIMPIEZA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'AMBIENTADOR PARA VEHICULO (SOBRE)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'PISOS DE GOMA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'CEPILLO PARA INHODORO CON MANGO PLASTICO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'LIQUIDO ANTISARRO DE 5 LITROS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'BASURERO DE PLASTICO C/TAPA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'CEPILLO DE MANO C/MANGO DE PLASTICO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'BIRULIN DE ACERO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'OLA MAXIMUS LIMPIA VIDRIOS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'ALCOHOL EN GEL',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'CANASTILLO BASURERO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'ESPONJA BICOLOR LAVA VAJILLA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'PAÑO DE FRANELA P/LIMPIEZA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'SODA CAUSTICA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],
            [
                'descripcion' => 'HARAGANES DE GOMA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '29',
            ],


            /**** TIPOS DE FOLDER ****/
            [
                'descripcion' => 'FOLDER AMARILLO DE CARTULINA T/CARTA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '30',
            ],
            [
                'descripcion' => 'FOLDER AMARILLO T/OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '30',
            ],
            [
                'descripcion' => 'FASTENERS METALICO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '30',
            ],


            /**** TIPOS DE HERRAMIENTAS ****/
            [
                'descripcion' => 'JUEGO DE DESARMADORES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'JUEGO DE DESTORNILLADORES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'PICOTA CON PALO DE MADERA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'PALA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'FLEXO DE 10 METROS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'ALAMBRE DE AMARRE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'LLAVES DE PASO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'CLAVO, MATERIAL ACERO, MEDIDA 3 Plg., PRESENTACION POR KILO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'CHAPAS PARA PUERTA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],
            [
                'descripcion' => 'RAMPLUS Nº 10',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '31',
            ],




            /**** ACCESORIO DE VEHICULO ****/
            [
                'descripcion' => 'LLANTAS 265 R 17 MT MARCA HANCOK',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '32',
            ],
            [
                'descripcion' => 'FORRO P/AUTOMOVIL MATERIAL CUERINA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '32',
            ],


            /**** TIPOS DE ARCHIVADORES ****/
            [
                'descripcion' => 'ARCHIVADOR DE PALANCA 1/2 LOMO  OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '33',
            ],
            [
                'descripcion' => 'ARCHIVADOR PALANCA L/ ANCHO T/OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '33',
            ],


            /**** TIPOS DE MARCADORES ****/
            [
                'descripcion' => 'MARCADOR DE AGUA (Dif. Colores)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '34',
            ],
            [
                'descripcion' => 'MARCADORES PARA CDs',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '34',
            ],
            [
                'descripcion' => 'MARCADORES PERMANENTES GRUESO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '34',
            ],


            /**** LAPICES Y BOLIGRAFOS ****/
            [
                'descripcion' => 'BOLIGRAFO COLOR AZUL; TRAZO FINO PUNTA METAL',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '35',
            ],
            [
                'descripcion' => 'LAPIZ COLOR NEGRO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '35',
            ],
            [
                'descripcion' => 'LAPIZ DE COLOR ROJO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '35',
            ],
            [
                'descripcion' => 'MICROPUNTA PILOT AZUL + NEGRO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '35',
            ],
            [
                'descripcion' => 'LAPIZ VERDE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '35',
            ],


            /**** MATERIAL DE ESCRITORIO ****/
            [
                'descripcion' => 'ALFILERES C/CABEZA DE COLORES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'BORRADOR PARA LAPIZ',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'CINTA DE EMBALAJE DE 100 YARDAS TRASPARENTE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'CLIPS PARA PAPELES; MATERIAL METALICO DE 33 M.M. ; PRESENTACION  CAJA DE 100 UNIDADES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'CORRECTOR EN CINTA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'CUADERNO CON ESPIRAL T/OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'ESTILETES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'MASKIN CINTA (FIVE  STICK 25 CM)',
                'sigla' => '',

                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'PEGAMENTO DE 40 GRS. EN BARRA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'REGLAS METALICAS 30 CM COLOR PLOMO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'RESALTADORES  P/CUADRADA DIF COLRS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'SACAGRAPAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'SEÑALADORES BANDERITAS (5 COLORES)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'TAJADOR PEQUEÑO ',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'TAMPOS MEDIANOS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'TIJERAS GRANDE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'TINTA AZUL PARA SELLOS Y FOLIADOR',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'ESPIRAL PARA HOJAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'CALCULADORA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'CLIPS METALICOS DE 50MM CON 100 UNID.',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'PORTA MINAS  0,5 MM.',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'POST IT 7.50CM X 7.50CM DE 50 HOJAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'ENGRAPADORA MEDIANA -CM 50',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'FOLEADOR METALICO DE 8 DIGITOS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'FUNDAS PLÁSTICAS T/OFICIO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'GRAPAS 24/6',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'GRAPAS 23/8',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'LIGAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'MINAS 0,5 COLOR NEGRO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'PERFORADORA MEDIANA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'PORTA LAPICES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'PORTA MINAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'REPUESTOS  PARA ESTILETE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'ESPONJERO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'SUJETADOR DE PAPEL PEQUEÑO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'SUJETADOR DE PAPEL MEDIANO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'SUJETADOR DE PAPEL GRANDE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'TALONARIO DE COMBUSTIBLE 1',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'SELLOS INSTITUCIONALES  DIFERENTES  CARACTERISTICAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'PARTE DIARIO DE VEHICULO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'GOMAS PARA SELLOS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'TABLERO PORTADOCUMENTOS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],
            [
                'descripcion' => 'CINTA AISLANTE',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '36',
            ],


            /**** TIPOS DE PEGAMENTOS ****/
            [
                'descripcion' => 'SILICONA TIPO SELLADOR TRANSPARENTE, PRESENTACION TUBO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '37',
            ],
            [
                'descripcion' => 'PEGAMENTO PVC',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '37',
            ],
            [
                'descripcion' => 'SELLA ROSCA',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '37',
            ],


            /**** TIPOS DE TUBOS PLASTICOS Y OTROS ****/
            [
                'descripcion' => 'TUBO PLASTICO, PRESENTACION POR BARRA, LONGITUD METROS, DIAMETRO DIF. MEDIDAS.',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '38',
            ],
            [
                'descripcion' => 'CODO DE 2 PVC',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '38',
            ],
            [
                'descripcion' => 'TAPAS PLASTICAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '38',
            ],


            /**** TIPOS DE CD Y DVD ****/
            [
                'descripcion' => 'CD EN BLANCO CAPACIDAD 700 MB/80 MINUTOS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '39',
            ],
            [
                'descripcion' => 'DVD BLANCO 4,7 GB',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '39',
            ],
            [
                'descripcion' => 'ESTUCHE PLASTICO PARA CD Y DVD',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '39',
            ],


            /**** TIPOS DE CABLES ELECTRICAS ****/
            [
                'descripcion' => 'CABLE PARA INSTALACIÓN ELECTRICA Nº 14',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '40',
            ],
            [
                'descripcion' => 'CABLE ELECTRICO Nº 10',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '40',
            ],


            /**** ACCESORIOS DE COMPUTADORA ****/
            [
                'descripcion' => 'CONECTORES  RJ 11',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '41',
            ],
            [
                'descripcion' => 'CORTAPICOS DIF. AMPERES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '41',
            ],
            [
                'descripcion' => 'TESTER',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '41',
            ],
            [
                'descripcion' => 'CABLE UTP CATEGORIA 6',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '41',
            ],


            /**** ACCESORIOS DE BAÑO ****/
            [
                'descripcion' => 'DUCHA ELECTRICA LORENZZETI',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '42',
            ],
            [
                'descripcion' => '',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '42',
            ],


            /**** CONECTORES ELECTRICOS ****/
            [
                'descripcion' => 'ENCHUFES DIFERENTES CARACTERISTICAS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],
            [
                'descripcion' => 'REGLETA PODER RACK (TOMA CORRIENTE)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],
            [
                'descripcion' => 'SOCKET PARA FOCO',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],
            [
                'descripcion' => 'TUBO FLUORESCENTE 20 WATTS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],
            [
                'descripcion' => 'PANTALLA ELÉCTRICA (LUZ INTERIOR)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],
            [
                'descripcion' => 'CLAVIJAS (ENCHUFES)',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],
            [
                'descripcion' => 'FOCOS AHORRADORES',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],
            [
                'descripcion' => 'TUBO FLUORESCENTE 40 WATTS',
                'sigla' => '',
                'fk_id_parametrica_descripcion' => '43',
            ],

        ]);
    }
}
