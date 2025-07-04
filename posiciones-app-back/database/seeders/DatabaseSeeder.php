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

        // Insertar empresas con datos más reales
        DB::table('empresas')->insert([
            ['id' => 1, 'cuit' => '30712345678', 'razonSocial' => 'Tecnología Argentina S.A.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'cuit' => '30698765432', 'razonSocial' => 'Alimentos del Sur SRL', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'cuit' => '30556473829', 'razonSocial' => 'Construcciones Modernas Ltda', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insertar productos con datos más reales
        DB::table('productos')->insert([
            ['id' => 1, 'nombre' => 'Laptop Modelo X', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'Harina Integral', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nombre' => 'Cemento Premium', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nombre' => 'Monitor 24"', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insertar algunas posiciones (relaciones entre empresas y productos)
        DB::table('posiciones')->insert([
            [
                'idEmpresa' => 1,
                'idProducto' => 1,
                'fechaEntregaInicio' => '2025-07-10',
                'moneda' => 'ARS',
                'precio' => 150000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idEmpresa' => 2,
                'idProducto' => 2,
                'fechaEntregaInicio' => '2025-07-15',
                'moneda' => 'ARS',
                'precio' => 500.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idEmpresa' => 3,
                'idProducto' => 3,
                'fechaEntregaInicio' => '2025-07-20',
                'moneda' => 'USD',
                'precio' => 75.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idEmpresa' => 1,
                'idProducto' => 4,
                'fechaEntregaInicio' => '2025-07-12',
                'moneda' => 'ARS',
                'precio' => 30000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
