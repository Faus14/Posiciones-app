<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    public function run()
    {

        DB::table('empresas')->truncate();
        DB::table('productos')->insert([
            ['id' => 1, 'nombre' => 'Producto A', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nombre' => 'Producto B', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nombre' => 'Producto C', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nombre' => 'Producto D', 'usoFrecuente' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nombre' => 'Producto E', 'usoFrecuente' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
