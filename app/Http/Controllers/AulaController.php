<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aulas = Aula::all();
        return view('aulas.index', ['aulas' => $aulas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Simplemente muestra la vista con el formulario
        return view('aulas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255|unique:aulas,nombre',
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
        ]);

        // 2. Crear la nueva aula en la base de datos
        Aula::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'capacidad' => $request->capacidad,
        ]);

        // 3. Redirigir a la lista de aulas con un mensaje de éxito
        return redirect()->route('aulas.index')->with('success', 'Aula creada exitosamente.');
    }

    // ... aquí van los otros métodos (show, edit, update, destroy)
}