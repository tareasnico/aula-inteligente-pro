<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::orderBy('dia')->orderBy('hora_inicio')->get();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        return view('horarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:100|unique:horarios,codigo',
            'dia' => 'required|string',
            'turno' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'necesita_reserva' => 'boolean',
        ]);

        Horario::create($request->all());

        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente.');
    }

    public function edit(Horario $horario)
    {
        return view('horarios.edit', compact('horario'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'codigo' => 'required|string|max:100|unique:horarios,codigo,' . $horario->id,
            'dia' => 'required|string',
            'turno' => 'required|string',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'necesita_reserva' => 'boolean',
        ]);

        // Manejar el checkbox
        $data = $request->except('_token', '_method');
        $data['necesita_reserva'] = $request->has('necesita_reserva');

        $horario->update($data);

        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
    }
}