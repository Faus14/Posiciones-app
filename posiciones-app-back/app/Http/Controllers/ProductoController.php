<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('usoFrecuente', 'desc')->get();
        return response()->json($productos);
    }
}
