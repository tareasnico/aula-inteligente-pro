<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\Aula;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index()
    {
        $focos = Foco::with('aula')->get();
        return view('focos.index', compact('focos'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|unique:focos,codigo',
            'ubicacion' => 'required|string',
            'tipo' => 'required|string',
            'intensidad' => 'required|integer|min:0|max:100',
            'aula_id' => 'nullable|exists:aulas,id',
        ]);

        Foco::create($request->all());
        return redirect()->route('focos.index')->with('success', 'Foco añadido exitosamente.');
    }

    public function edit(Foco $foco)
    {
        $aulas = Aula::all();
        return view('focos.edit', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco)
    {
        $request->validate([
            'codigo' => 'required|string|unique:focos,codigo,' . $foco->id,
            'ubicacion' => 'required|string',
            'tipo' => 'required|string',
            'intensidad' => 'required|integer|min:0|max:100',
            'aula_id' => 'nullable|exists:aulas,id',
        ]);

        $foco->update($request->all());
        return redirect()->route('focos.index')->with('success', 'Foco actualizado exitosamente.');
    }

    public function destroy(Foco $foco)
    {
        $foco->delete();
        return redirect()->route('focos.index')->with('success', 'Foco eliminado exitosamente.');
    }
}