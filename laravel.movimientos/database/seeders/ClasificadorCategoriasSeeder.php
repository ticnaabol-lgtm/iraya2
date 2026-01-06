<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificadorCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificador_categorias')->insert([
            [
                'categoria' => 'PAPEL',
                'codigo_categoria' => '32100',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '1'
            ],
            [
                'categoria' => 'PRODUCTOS DE ARTES GRAFICAS',
                'codigo_categoria' => '32200',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '1'
            ],
            [
                'categoria' => 'HILADOS Y TELAS',
                'codigo_categoria' => '33100',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '2'
            ],
            [
                'categoria' => 'CONFECCIONES TEXTILES',
                'codigo_categoria' => '33200',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '2'
            ],
            [
                'categoria' => 'PRENDAS DE VESTIR',
                'codigo_categoria' => '33300',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '2'
            ],
            [
                'categoria' => 'CALZADOS',
                'codigo_categoria' => '33400',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '2'
            ],
            [
                'categoria' => 'COMBUSTIBLES, LUBRICANTES Y DERIVADOS',
                'codigo_categoria' => '34100',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '3'
            ],
            [
                'categoria' => 'PRODUCTOS QUIMICOS Y FARMACEUTICOS',
                'codigo_categoria' => '34200',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '3'
            ],
            [
                'categoria' => 'LLANTAS Y NEUMATICOS',
                'codigo_categoria' => '34300',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '3'
            ],
            [
                'categoria' => 'PRODUCTOS DE CUERO Y CAUCHO',
                'codigo_categoria' => '34400',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '3'
            ],
            [
                'categoria' => 'PRODUCTOS DE MINERALES NO METALICOS Y PLASTICOS',
                'codigo_categoria' => '34500',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '3'
            ],
            [
                'categoria' => 'PRODUCTOS METALICOS',
                'codigo_categoria' => '34600',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '3'
            ],
            [
                'categoria' => 'HERRAMIENTAS MENORES',
                'codigo_categoria' => '34700',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '3'
            ],
            [
                'categoria' => 'MATERIAL DE LIMPIEZA',
                'codigo_categoria' => '39100',
                'fk_user' => '1',
                'fk_id_clasificador_linea' => '4'
            ],


        ]);
    }
}
