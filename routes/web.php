<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MuebleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // RUTAS PROTEGIDAS
    Route::resource('aulas', AulaController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('reservas', ReservaController::class);
    Route::resource('muebles', MuebleController::class);
        
    // Rutas del perfil de usuario que instala Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
