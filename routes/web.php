<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    // RUTAS PROTEGIDAS
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('aulas', AulaController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('reservas', ReservaController::class);
    Route::resource('muebles', MuebleController::class);
    Route::resource('focos', FocoController::class);
    Route::get('/control-focos', [FocoController::class, 'showControlPage'])->name('focos.control');
    Route::resource('aires', AireAcondicionadoController::class)->parameters(['aires' => 'aire']);
        
    // Rutas del perfil de usuario que instala Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
