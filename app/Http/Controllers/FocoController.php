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

        // Guardamos los datos, incluyendo el 'estado' que viene del modelo
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

    /**
     * Muestra la página de control de focos.
     */
    public function showControlPage()
    {
        // Obtenemos todos los focos con la info de su aula
        $focos = Foco::with('aula')->get(); 
        
        // Retornamos una nueva vista que vamos a crear
        return view('focos.control', compact('focos'));
    }

    // ===================================================================
    // MÉTODOS DE LA API PARA EL CONTROL DE FOCOS
    // ===================================================================

    /**
     * Actualiza el estado y la intensidad de un foco desde la API.
     * Esta función es llamada por el JavaScript de tu página 'control-focos'.
     */
    public function updateControl(Request $request, Foco $foco)
    {
        // Validamos los datos que llegan
        $data = $request->validate([
            'estado' => 'required|boolean',
            'intensidad' => 'required|numeric|min:0|max:100',
        ]);

        // Si el estado es 'apagado' (false), forzamos la intensidad a 0
        if ($data['estado'] == false) {
            $data['intensidad'] = 0;
        } 
        // Si se 'enciende' (true) pero la intensidad es 0, la ponemos al 100% por defecto
        elseif ($data['estado'] == true && $data['intensidad'] == 0) {
            $data['intensidad'] = 100;
        }

        // Actualizamos el foco en la base de datos
        $foco->update($data);

        // Devolvemos una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Foco actualizado correctamente.',
            'foco' => $foco->fresh()
        ]);
    }

    /**
     * Devuelve el estado de todos los focos para el ESP32.
     * Esta función es llamada por tu placa ESP32.
     */
    public function getEstado()
    {
        // Obtenemos solo los datos que el ESP32 necesita
        $focos = Foco::select('id', 'codigo', 'estado', 'intensidad')->get();
        
        // Devolvemos los focos como un JSON
        return response()->json($focos);
    }
}
