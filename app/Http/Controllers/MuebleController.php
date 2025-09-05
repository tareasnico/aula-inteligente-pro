<?php

namespace App\Http\Controllers;

use App\Models\Mueble;
use Illuminate\Http\Request;

class MuebleController extends Controller
{
    public function index()
    {
        $muebles = Mueble::orderBy('nombre')->get();
        return view('muebles.index', compact('muebles'));
    }

    public function create()
    {
        return view('muebles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nro_inventario' => 'required|string|max:255|unique:muebles,nro_inventario',
            'nombre' => 'required|string|max:255',
            'estado' => 'required|string',
            'es_proyector' => 'boolean',
        ]);
        
        $validatedData['es_proyector'] = $request->has('es_proyector');

        Mueble::create($validatedData);
        return redirect()->route('muebles.index')->with('success', 'Mueble añadido al inventario.');
    }

    public function edit(Mueble $mueble)
    {
        return view('muebles.edit', compact('mueble'));
    }

    public function update(Request $request, Mueble $mueble)
    {
        $validatedData = $request->validate([
            'nro_inventario' => 'required|string|max:255|unique:muebles,nro_inventario,' . $mueble->id,
            'nombre' => 'required|string|max:255',
            'estado' => 'required|string',
            'es_proyector' => 'boolean',
        ]);
        
        $validatedData['es_proyector'] = $request->has('es_proyector');

        $mueble->update($validatedData);
        return redirect()->route('muebles.index')->with('success', 'Mueble actualizado.');
    }

    public function destroy(Mueble $mueble)
    {
        $mueble->delete();
        return redirect()->route('muebles.index')->with('success', 'Mueble eliminado del inventario.');
    }


}
