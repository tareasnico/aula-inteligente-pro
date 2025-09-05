<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Aula;
use App\Models\Materia;
use App\Models\Horario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['aula', 'materia.docente', 'horario'])
                            ->orderBy('fecha', 'desc')
                            ->orderBy('horario_id', 'asc')
                            ->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $aulas = Aula::all();
        $materias = Materia::with('docente')->get();
        $horarios = Horario::orderBy('dia')->orderBy('hora_inicio')->get();
        $fechaMinima = Carbon::today()->toDateString();
        return view('reservas.create', compact('aulas', 'materias', 'horarios', 'fechaMinima'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'aula_id' => 'required|exists:aulas,id',
            'materia_id' => 'required|exists:materias,id',
            'horario_id' => 'required|exists:horarios,id',
        ]);

        $conflicto = Reserva::where('fecha', $validatedData['fecha'])
                              ->where('aula_id', $validatedData['aula_id'])
                              ->where('horario_id', $validatedData['horario_id'])
                              ->exists();

        if ($conflicto) {
            return redirect()->back()
                             ->withErrors(['conflicto' => 'El aula seleccionada ya está reservada en esa fecha y horario.'])
                             ->withInput();
        }

        Reserva::create($validatedData + ['tipo_origen' => 'Manual']);
        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    /**
     * MUESTRA EL FORMULARIO PARA EDITAR UNA RESERVA
     */
    public function edit(Reserva $reserva)
    {
        $aulas = Aula::all();
        $materias = Materia::with('docente')->get();
        $horarios = Horario::orderBy('dia')->orderBy('hora_inicio')->get();
        $fechaMinima = Carbon::today()->toDateString();

        return view('reservas.edit', compact('reserva', 'aulas', 'materias', 'horarios', 'fechaMinima'));
    }

    /**
     * ACTUALIZA LA RESERVA EN LA BASE DE DATOS
     */
    public function update(Request $request, Reserva $reserva)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'aula_id' => 'required|exists:aulas,id',
            'materia_id' => 'required|exists:materias,id',
            'horario_id' => 'required|exists:horarios,id',
        ]);

        // Comprobar conflictos, excluyendo la reserva actual
        $conflicto = Reserva::where('fecha', $validatedData['fecha'])
                              ->where('aula_id', $validatedData['aula_id'])
                              ->where('horario_id', $validatedData['horario_id'])
                              ->where('id', '!=', $reserva->id) // <-- La diferencia clave
                              ->exists();

        if ($conflicto) {
            return redirect()->back()
                             ->withErrors(['conflicto' => 'El aula seleccionada ya está reservada en esa fecha y horario.'])
                             ->withInput();
        }

        $reserva->update($validatedData);
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente.');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva cancelada exitosamente.');
    }
}