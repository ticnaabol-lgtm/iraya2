<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'nombre_producto' => 'CARTULINA GRANDE',
                'numero_item' => '321-00010',
                'fkp_tipo_producto' => null,
                'fkp_tipo_color' => '54',
                'fkp_tipo_modelo' => null,
                'fkp_tipo_unidades' => '67',
                'fkp_tipo_marca' => null,
                'descripcion' => 'PAPEL CON BORDE',
                'activo' => '1',
                'fk_user' => '1',
                'fk_id_clasificador_categoria' => '1'
            ],
            [
                'nombre_producto' => 'HOJAS BOND',
                'numero_item' => '321-00011',
                'fkp_tipo_producto' => null,
                'fkp_tipo_color' => '54',
                'fkp_tipo_modelo' => null,
                'fkp_tipo_unidades' => '65',
                'fkp_tipo_marca' => null,
                'descripcion' => 'PAQUETE DE 75 GRS PARA IMPRESION',
                'activo' => '1',
                'fk_user' => '1',
                'fk_id_clasificador_categoria' => '1'
            ],


        ]);
    }
}
