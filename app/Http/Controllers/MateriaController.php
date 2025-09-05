<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Docente; // <-- Importar Docente
use App\Models\Aula;    // <-- Importar Aula
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        // Usamos with() para cargar las relaciones y evitar N+1 queries
        $materias = Materia::with(['docente', 'aulaRecomendada'])->get();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        $docentes = Docente::all();
        $aulas = Aula::all();
        return view('materias.create', compact('docentes', 'aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:materias,nombre',
            'carrera' => 'required|string|max:255',
            'año' => 'required|string|max:50',
            'tipo_cursada' => 'required|string|max:100',
            'docente_id' => 'required|exists:docentes,id',
            'aula_recomendada_id' => 'nullable|exists:aulas,id',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia creada exitosamente.');
    }

    public function edit(Materia $materia)
    {
        $docentes = Docente::all();
        $aulas = Aula::all();
        return view('materias.edit', compact('materia', 'docentes', 'aulas'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:materias,nombre,' . $materia->id,
            'carrera' => 'required|string|max:255',
            'año' => 'required|string|max:50',
            'tipo_cursada' => 'required|string|max:100',
            'docente_id' => 'required|exists:docentes,id',
            'aula_recomendada_id' => 'nullable|exists:aulas,id',
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada exitosamente.');
    }
}