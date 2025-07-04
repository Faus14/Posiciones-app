<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PosicionController;
use Illuminate\Support\Facades\Route;

Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/posiciones', [PosicionController::class, 'store']);
Route::get('/posiciones', [PosicionController::class, 'index']);
Route::get('/empresas', [EmpresaController::class, 'index']);
