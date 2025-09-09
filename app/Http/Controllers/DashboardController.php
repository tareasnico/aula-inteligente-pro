<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Mueble;
use App\Models\Reserva;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtenemos datos para las tarjetas de estadísticas
        $totalReservas = Reserva::count();
        $aulasDisponibles = Aula::count();
        $mueblesDanados = Mueble::where('estado', 'Dañado')->count();

        // Obtenemos las próximas 5 reservas
        $proximasReservas = Reserva::with(['aula', 'materia'])
                                ->where('fecha', '>=', now()->toDateString())
                                ->orderBy('fecha', 'asc')
                                ->take(5)
                                ->get();

        return view('dashboard', compact('totalReservas', 'aulasDisponibles', 'mueblesDanados', 'proximasReservas'));
    }
}