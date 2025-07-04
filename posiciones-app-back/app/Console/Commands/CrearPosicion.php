<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Posicion;
use App\Models\Empresa;
use App\Models\Producto;
use Illuminate\Support\Carbon;

class CrearPosicion extends Command
{
    protected $signature = 'posicion:crear
                            {idEmpresa : ID de la empresa}
                            {idProducto : ID del producto}
                            {fechaEntregaInicio : Fecha de entrega (YYYY-MM-DD)}
                            {moneda : Moneda}
                            {precio : Precio}';

    protected $description = 'Crear una nueva posición con los datos indicados';

    public function handle()
    {
        $idEmpresa = $this->argument('idEmpresa');
        $idProducto = $this->argument('idProducto');
        $fechaEntregaInicio = $this->argument('fechaEntregaInicio');
        $moneda = $this->argument('moneda');
        $precio = $this->argument('precio');


        if (!is_numeric($idEmpresa) || !is_numeric($idProducto)) {
            $this->error('idEmpresa y idProducto deben ser números.');
            return 1;
        }


        if (!Empresa::find($idEmpresa)) {
            $this->error("No existe empresa con ID: {$idEmpresa}");
            return 1;
        }

        if (!Producto::find($idProducto)) {
            $this->error("No existe producto con ID: {$idProducto}");
            return 1;
        }


        $fecha = Carbon::createFromFormat('Y-m-d', $fechaEntregaInicio);
        if (!$fecha || $fecha->format('Y-m-d') !== $fechaEntregaInicio) {
            $this->error('fechaEntregaInicio debe tener formato YYYY-MM-DD');
            return 1;
        }

        $fechaHoy = Carbon::today();
        if ($fecha->lt($fechaHoy)) {
            $this->error('fechaEntregaInicio debe ser igual o posterior a hoy.');
            return 1;
        }

        if (!is_numeric($precio) || $precio <= 0) {
            $this->error('precio debe ser un número mayor que cero.');
            return 1;
        }


        $posicion = Posicion::create([
            'idEmpresa' => $idEmpresa,
            'idProducto' => $idProducto,
            'fechaEntregaInicio' => $fechaEntregaInicio,
            'moneda' => $moneda,
            'precio' => $precio,
        ]);

        $this->info("Posición creada con ID: {$posicion->id}");

        return 0;
    }
}
