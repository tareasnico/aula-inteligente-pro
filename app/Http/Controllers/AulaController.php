<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Mueble; // <-- Probablemente esta es la línea que faltaba
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Muestra una lista de todas las aulas.
     */
    public function index()
    {
        $aulas = Aula::all();
        return view('aulas.index', compact('aulas'));
    }

    /**
     * Muestra el formulario para crear una nueva aula.
     */
    public function create()
    {
        return view('aulas.create');
    }

    /**
     * Guarda una nueva aula en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255|unique:aulas,nombre',
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);
        Aula::create($validatedData);
        return redirect()->route('aulas.index')->with('success', 'Aula creada exitosamente.');
    }

    /**
     * Muestra la página de detalles y gestión de inventario de un aula.
     * ESTE ES EL NUEVO MÉTODO
   


     * Muestra el formulario para editar un aula existente.
     */
    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    /**
     * Actualiza un aula existente en la base de datos.
     */
    public function update(Request $request, Aula $aula)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255|unique:aulas,nombre,' . $aula->id,
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);
        $aula->update($validatedData);
        return redirect()->route('aulas.index')->with('success', 'Aula actualizada exitosamente.');
    }

    /**
     * Elimina un aula de la base de datos.
     */
    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada exitosamente.');
    }
}