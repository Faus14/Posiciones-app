<?php

namespace App\Http\Controllers;

use App\Models\Posicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PosicionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idEmpresa' => 'required|exists:empresas,id',
            'idProducto' => 'required|exists:productos,id',
            'fechaEntregaInicio' => 'required|date|after_or_equal:today',
            'moneda' => 'required|string',
            'precio' => 'required|numeric|min:0.01',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $posicion = Posicion::create($request->all());
        return response()->json($posicion, 201);
    }

    public function index()
    {
        $posiciones = Posicion::select(
            'posiciones.id',
            'empresas.razonSocial as nombreEmpresa',
            'productos.nombre as nombreProducto',
            'productos.usoFrecuente',
            'posiciones.fechaEntregaInicio',
            'posiciones.precio',
            'posiciones.moneda'
        )
            ->join('empresas', 'posiciones.idEmpresa', '=', 'empresas.id')
            ->join('productos', 'posiciones.idProducto', '=', 'productos.id')
            ->orderBy('productos.usoFrecuente', 'desc')
            ->get();

        return response()->json($posiciones);
    }
}
