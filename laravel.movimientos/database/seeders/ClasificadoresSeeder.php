<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificadors')->insert([
            [
                'denominacion' => 'CLASIFICADOR INSTITUCIONAL',
                'descripcion' => '1',
            ],
            [
                'denominacion' => 'CLASIFICADOR DE RECURSOS POR RUBROS',
                'descripcion' => '2',
            ],
            [
                'denominacion' => 'CLASIFICADOR POR OBJETO DEL GASTO',
                'descripcion' => '3',
            ],
            [
                'denominacion' => 'CLASIFICADOR POR FINALIDAD Y FUNCION',
                'descripcion' => '4',
            ],
            [
                'denominacion' => 'CLASIFICADOR DE FUENTES DE FINANCIAMIENTO',
                'descripcion' => '5',
            ],
            [
                'denominacion' => 'CLASIFICADOR DE ORGANISMOS FINANCIADORES',
                'descripcion' => '6',
            ],
            [
                'denominacion' => 'CLASIFICADOR DE SECTORES ECONOMICOS',
                'descripcion' => '7',
            ],
            [
                'denominacion' => 'CLASIFICADOR GEOGRAFICO',
                'descripcion' => '8',
            ],
            [
                'denominacion' => 'DIRECCION ADMINISTRATIVA',
                'descripcion' => '9',
            ],
            [
                'denominacion' => 'PROGRAMA PRESUPUESTO',
                'descripcion' => '10',
            ],
        ]);
    }
}
