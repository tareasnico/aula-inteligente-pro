<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FocoController; // ¡Importante!

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Ruta para actualizar el estado y la intensidad de un foco
Route::post('/focos/control/{foco}', [FocoController::class, 'updateControl']);

// Ruta para que el ESP32 pueda LEER el estado de todos los focos
Route::get('/focos/estado', [FocoController::class, 'getEstado']);