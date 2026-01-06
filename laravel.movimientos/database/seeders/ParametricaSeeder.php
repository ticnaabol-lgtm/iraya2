<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParametricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametricas')->insert([

            //id=1
            [
                'descripcion' => 'REGIONAL',
                'fk_user' => '1',
            ],
            //id=2
            [
                'descripcion' => 'ROLES',
                'fk_user' => '1',
            ],

        ]);
    }
}
