<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DescripcionParametricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametrica_descripcions')->insert([

            [
                'descripcion' => 'vacio',
                'sigla' => 'OFC',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'LA PAZ',
                'sigla' => 'LP',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'COCHABAMBA',
                'sigla' => 'CB',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'SANTA CRUZ',
                'sigla' => 'SC',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'POTOSI',
                'sigla' => 'PT',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'ORURO',
                'sigla' => 'OR',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'CHUQUISACA',
                'sigla' => 'CH',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'TARIJA',
                'sigla' => 'TJ',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'PANDO',
                'sigla' => 'PD',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'BENI',
                'sigla' => 'BN',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],
            [
                'descripcion' => 'OFICINA CENTRAL',
                'sigla' => 'OFC',
                'nivel' => '0',
                'fk_id_parametrica' => '1',
            ],

            [
                'descripcion' => 'ADMINISTRADOR',
                'sigla' => 'ADM',
                'nivel' => '1',
                'fk_id_parametrica' => '2',
            ],

            [
                'descripcion' => 'CONTROLADOR DE AREA',
                'sigla' => 'CA',
                'nivel' => '2',
                'fk_id_parametrica' => '2',
            ],

        ]);
    }
}
