<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    public function run()
    {

        DB::table('empresas')->truncate();
        DB::table('empresas')->insert([
            ['id' => 1, 'cuit' => '12345678901', 'razonSocial' => 'Empresa Ejemplo 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'cuit' => '10987654321', 'razonSocial' => 'Empresa Ejemplo 2', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
