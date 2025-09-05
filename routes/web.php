<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;

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
    
    // Rutas del perfil de usuario que instala Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
