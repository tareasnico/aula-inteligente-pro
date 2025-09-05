{{-- Mostrar errores de validación, incluido nuestro error de conflicto personalizado --}}
@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Ups! Hay algunos problemas:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
        <label for="fecha" class="block font-medium text-sm text-gray-700">Fecha de la Reserva</label>
        {{-- Añadimos el atributo min para bloquear fechas pasadas en el calendario del navegador --}}
        <input id="fecha" name="fecha" type="date" 
               value="{{ old('fecha', $reserva->fecha ?? $fechaMinima) }}" 
               min="{{ $fechaMinima }}"
               class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
    </div>

    <div>
        <label for="horario_id" class="block font-medium text-sm text-gray-700">Horario</label>
        <select name="horario_id" id="horario_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            <option value="">Seleccione un horario</option>
            @foreach($horarios as $horario)
                <option value="{{ $horario->id }}" {{ (old('horario_id') == $horario->id) ? 'selected' : '' }}>
                    {{ $horario->dia }} ({{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="materia_id" class="block font-medium text-sm text-gray-700">Materia</label>
        <select name="materia_id" id="materia_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            <option value="">Seleccione una materia</option>
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}" {{ (old('materia_id') == $materia->id) ? 'selected' : '' }}>
                    {{ $materia->nombre }} (Docente: {{ $materia->docente->nombre }})
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="aula_id" class="block font-medium text-sm text-gray-700">Aula</label>
        <select name="aula_id" id="aula_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            <option value="">Seleccione un aula</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ (old('aula_id') == $aula->id) ? 'selected' : '' }}>
                    {{ $aula->nombre }} (Capacidad: {{ $aula->capacidad }})
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('reservas.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
        Guardar Reserva
    </button>
</div>