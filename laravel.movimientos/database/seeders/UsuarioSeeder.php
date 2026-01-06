<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ADMIN',
                'email' => 'admin@correo.com',
                'nivel' => '12',
                'password' => '$2y$10$woiOtip5xFSMpeK.qlf9q.aK6zCp1iF9z/XXntmaIZkzIHLnWEaOO',
            ],

            [
                'name' => 'ADMINISTRADOR REGIONAL',
                'email' => 'adminregional@correo.com',
                'nivel' => '13',
                'password' => '$2y$10$FD8ivxfMPUDxIRUWf5wFwOWd.INqooNqkVrh7Ez6wygfgTh/L5XG.',
            ],

            [
                'name' => 'CHIPANA ALVARADO JUAN CARLOS',
                'email' => 'jchipana@abc.gob.bo',
                'nivel' => '12',
                'password' => '$2y$10$.zjVsZVp6bF5F.MooMMHRuVQ6LnXG6AMpfFR6tnqKejnzgWddrSNi',
            ],
        ]);
    }
}
