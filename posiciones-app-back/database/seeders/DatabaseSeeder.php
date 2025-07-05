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

        // Insertar empresas con datos reales
        DB::table('empresas')->insert([
            ['id' => 1, 'cuit' => '30599828431', 'razonSocial' => 'A REGUEIRA Y CIA. S.A. CEREALES', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'cuit' => '30703597072', 'razonSocial' => 'A Y N SERVICIOS S.R.L.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'cuit' => '33541742439', 'razonSocial' => 'A.A.C.R.E.A.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'cuit' => '20110058609', 'razonSocial' => 'ABALO, ALBERTO E', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'cuit' => '30618705672', 'razonSocial' => 'ADECO AGROPECUARIA S.A.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'cuit' => '30635322140', 'razonSocial' => 'ESPARTINA S.A.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'cuit' => '30539391735', 'razonSocial' => 'CAMPOAMOR HNOS. S.A.C.I.F. Y A.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insertar productos con datos reales
        DB::table('productos')->insert([
            ['id' => 1, 'nombre' => 'TRIGO', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'MAIZ', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nombre' => 'LINO', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nombre' => 'GIRASOL', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nombre' => 'SORGO', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nombre' => 'SOJA', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'nombre' => 'AVENA', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'nombre' => 'ALPISTE', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'nombre' => 'MIJO', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'nombre' => 'CENTENO', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insertar posiciones de ejemplo (puedes ajustar según necesites)
        DB::table('posiciones')->insert([
            [
                'idEmpresa' => 1,
                'idProducto' => 1, // TRIGO
                'fechaEntregaInicio' => '2025-07-10',
                'moneda' => 'USD',
                'precio' => 285.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idEmpresa' => 2,
                'idProducto' => 2, // MAIZ
                'fechaEntregaInicio' => '2025-07-15',
                'moneda' => 'ARS',
                'precio' => 85000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idEmpresa' => 3,
                'idProducto' => 6, // SOJA
                'fechaEntregaInicio' => '2025-07-20',
                'moneda' => 'USD',
                'precio' => 350.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idEmpresa' => 5,
                'idProducto' => 4, // GIRASOL
                'fechaEntregaInicio' => '2025-07-25',
                'moneda' => 'ARS',
                'precio' => 110000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idEmpresa' => 7,
                'idProducto' => 5, // SORGO
                'fechaEntregaInicio' => '2025-07-30',
                'moneda' => 'ARS',
                'precio' => 75000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
