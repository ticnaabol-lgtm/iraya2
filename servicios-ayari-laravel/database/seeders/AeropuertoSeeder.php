<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AeropuertoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aeropuertos = [];

        for ($i = 0; $i < 2100; $i++) {
            $aeropuertos[] = [
                'id' => Str::uuid(),
                'geocode' => null,
                'nombre' => null,
                'cd_iata' => null,
                'cd_oaci' => null,
                'longitud' => null,
                'latitud' => null,
                'categoria' => null,
                'ciudad' => null,
                'activo' => null,
                'fk_user' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('aeropuertos')->insert($aeropuertos);
    }
}
