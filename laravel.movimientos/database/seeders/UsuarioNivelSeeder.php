<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_nivels')->insert([
            [
                'fkp_rol' => '12',
                'fkp_regional' => '11',
                'fk_id_area' => '3',
                'logueado' => '1',
                'fk_user' => '1',
                'fk_id_user' => '1'
            ],
            [
                'fkp_rol' => '13',
                'fkp_regional' => '11',
                'fk_id_area' => '3',
                'logueado' => '1',
                'fk_user' => '1',
                'fk_id_user' => '2'
            ],
            [
                'fkp_rol' => '12',
                'fkp_regional' => '11',
                'fk_id_area' => '3',
                'logueado' => '1',
                'fk_user' => '1',
                'fk_id_user' => '3'
            ],

        ]);
    }
}
