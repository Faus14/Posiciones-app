<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Desactivar las restricciones FK para truncar tablas sin error
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('posiciones')->truncate();
        DB::table('productos')->truncate();
        DB::table('empresas')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insertar empresas
        DB::table('empresas')->insert([
            ['id' => 1, 'cuit' => '12345678901', 'razonSocial' => 'Empresa 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'cuit' => '10987654321', 'razonSocial' => 'Empresa 2', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insertar productos
        DB::table('productos')->insert([
            ['id' => 1, 'nombre' => 'Producto A', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'Producto B', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nombre' => 'Producto C', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nombre' => 'Producto D', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
