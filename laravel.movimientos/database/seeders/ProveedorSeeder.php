<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedors')->insert([
            [
                'nombre_empresa' => 'EMPRESA DE PAPEL',
                'fkp_ubicacion_agencia_principal' => '8',
                'fkp_tipo_sociedad' => '19',
                'fkp_rubro_proveedor' => '22',
                'nombre_representante_legal' => 'JUAN DANIEL PEREZ',
                'nit' => '01234344',
                'nombre' => 'ADRIANA ZULEMA',
                'numero_telefono' => '72524738',
                'email' => 'daniel@gmail.com',
                'direccion' => 'AV. ZAVALETA 124',
                'fk_user' => '1',
            ],
            [
                'nombre_empresa' => 'EMPRESA DE VENESTA',
                'fkp_ubicacion_agencia_principal' => '9',
                'fkp_tipo_sociedad' => '17',
                'fkp_rubro_proveedor' => '22',
                'nombre_representante_legal' => 'JORGE VALVERDE',
                'nit' => '2345454',
                'nombre' => 'JORGE AGUIRRE',
                'numero_telefono' => '22353456',
                'email' => 'valverde@gmail.com',
                'direccion' => 'AV. VILLA LOBOS 233',
                'fk_user' => '1',
            ],
            [
                'nombre_empresa' => 'EMPRESA SANSUNG',
                'fkp_ubicacion_agencia_principal' => '9',
                'fkp_tipo_sociedad' => '19',
                'fkp_rubro_proveedor' => '24',
                'nombre_representante_legal' => 'RENATO MAMANI',
                'nit' => '32465234',
                'nombre' => 'MARIA BERMUDEZ',
                'numero_telefono' => '7423432',
                'email' => 'bermudez@gmail.com',
                'direccion' => 'AV. CORRALES 234',
                'fk_user' => '1',
            ],


        ]);
    }
}
