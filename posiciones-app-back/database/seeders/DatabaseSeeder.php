<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('posiciones')->truncate();
        DB::table('productos')->truncate();
        DB::table('empresas')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('empresas')->insert([
            ['id' => 1, 'cuit' => '30711222333', 'razonSocial' => 'Agropecuaria La Pampa S.A.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'cuit' => '30694445566', 'razonSocial' => 'Cooperativa El Trigal Ltda.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'cuit' => '30555666777', 'razonSocial' => 'Fábrica de Aceites Don Girasol SRL', 'created_at' => now(), 'updated_at' => now()],
        ]);



        DB::table('productos')->insert([
            ['id' => 1, 'nombre' => 'Soja', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'Maíz', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nombre' => 'Trigo', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nombre' => 'Pellets de Girasol', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);



        DB::table('posiciones')->insert([
    [
        'idEmpresa' => 1,
        'idProducto' => 1,
        'fechaEntregaInicio' => '2025-07-10',
        'moneda' => 'USD',
        'precio' => 350.00,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'idEmpresa' => 2,
        'idProducto' => 2,
        'fechaEntregaInicio' => '2025-07-15',
        'moneda' => 'ARS',
        'precio' => 95000.00,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'idEmpresa' => 3,
        'idProducto' => 4,
        'fechaEntregaInicio' => '2025-07-20',
        'moneda' => 'ARS',
        'precio' => 110000.00,
        'created_at' => now(),
        'updated_at' => now(),
    ],
      ]);


    }
}
