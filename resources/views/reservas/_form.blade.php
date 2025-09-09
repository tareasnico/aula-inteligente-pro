@if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
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
        <label for="fecha" class="block font-medium text-sm text-gray-700 mb-1">Fecha de la Reserva</label>
        <input id="fecha" name="fecha" type="date" value="{{ old('fecha', $reserva->fecha ?? $fechaMinima) }}" min="{{ $fechaMinima }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="horario_id" class="block font-medium text-sm text-gray-700 mb-1">Horario</label>
        <select name="horario_id" id="horario_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            <option value="">Seleccione un horario</option>
            @foreach($horarios as $horario)
                <option value="{{ $horario->id }}" {{ (isset($reserva) && $reserva->horario_id == $horario->id) || old('horario_id') == $horario->id ? 'selected' : '' }}>
                    {{ $horario->dia }} ({{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }})
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="materia_id" class="block font-medium text-sm text-gray-700 mb-1">Materia</label>
        <select name="materia_id" id="materia_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            <option value="">Seleccione una materia</option>
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}" {{ (isset($reserva) && $reserva->materia_id == $materia->id) || old('materia_id') == $materia->id ? 'selected' : '' }}>
                    {{ $materia->nombre }} (Docente: {{ $materia->docente->nombre }})
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="aula_id" class="block font-medium text-sm text-gray-700 mb-1">Aula</label>
        <select name="aula_id" id="aula_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            <option value="">Seleccione un aula</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ (isset($reserva) && $reserva->aula_id == $aula->id) || old('aula_id') == $aula->id ? 'selected' : '' }}>
                    {{ $aula->nombre }} (Capacidad: {{ $aula->capacidad }})
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="flex items-center justify-end mt-6 space-x-4">
    <a href="{{ route('reservas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
        Cancelar
    </a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Guardar Reserva
    </button>
</div>