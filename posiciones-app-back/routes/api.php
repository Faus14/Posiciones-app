<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PosicionController;
use Illuminate\Support\Facades\Route;

Route::get('/productos', [ProductoController::class, 'index']); // listado ordenado por usoFrecuente
Route::post('/posiciones', [PosicionController::class, 'store']); // crear posición con validación
Route::get('/posiciones', [PosicionController::class, 'index']); // listar posiciones ordenadas por usoFrecuente del producto
