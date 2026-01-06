<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioSeeder::class);
        $this->call(UsuarioNivelSeeder::class);
        $this->call(ParametricaSeeder::class);
        $this->call(DescripcionParametricaSeeder::class);
//        $this->call(ParametricaMaterialesSeeder::class);
//        $this->call(ClasificadoresSeeder::class);
//        $this->call(DescripcionClasificadoresSeeder::class);
//        $this->call(ClasificadorLineasSeeder::class);
//        $this->call(ClasificadorCategoriasSeeder::class);
//        $this->call(ItemsSeeder::class);
//        $this->call(UnidadOrganizacionalSeeder::class);
//        $this->call(ProveedorSeeder::class);
    }
}
