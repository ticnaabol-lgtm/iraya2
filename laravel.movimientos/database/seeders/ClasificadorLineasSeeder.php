<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificadorLineasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificador_lineas')->insert([
            [
                'linea' => '1',
                'codigo_linea' => '1202',
                'fk_user' => '1',
            ],
            [
                'linea' => '2',
                'codigo_linea' => '1208',
                'fk_user' => '1',
            ],
            [
                'linea' => '3',
                'codigo_linea' => '1213',
                'fk_user' => '1',
            ],
            [
                'linea' => '4',
                'codigo_linea' => '1229',
                'fk_user' => '1',
            ],
            [
                'linea' => '5',
                'codigo_linea' => '1193',
                'fk_user' => '1',
            ],
        ]);
    }
}
