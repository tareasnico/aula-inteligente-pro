{{-- Muestra los errores de validación si existen --}}
@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <strong class="font-bold">¡Ups! Hay errores:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Contenido del formulario --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="codigo" class="block font-medium text-sm text-gray-700">Código</label>
        <input id="codigo" name="codigo" type="text" value="{{ old('codigo', $horario->codigo ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
    <div>
        <label for="dia" class="block font-medium text-sm text-gray-700">Día de la Semana</label>
        <select name="dia" id="dia" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
            @php $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']; @endphp
            @foreach($dias as $dia)
                <option value="{{ $dia }}" {{ (isset($horario) && $horario->dia == $dia) ? 'selected' : '' }}>{{ $dia }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="turno" class="block font-medium text-sm text-gray-700">Turno</label>
        <select name="turno" id="turno" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
             @php $turnos = ['Mañana', 'Tarde', 'Noche']; @endphp
            @foreach($turnos as $turno)
                <option value="{{ $turno }}" {{ (isset($horario) && $horario->turno == $turno) ? 'selected' : '' }}>{{ $turno }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="hora_inicio" class="block font-medium text-sm text-gray-700">Hora Inicio</label>
        <input id="hora_inicio" name="hora_inicio" type="time" value="{{ old('hora_inicio', $horario->hora_inicio ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
    <div>
        <label for="hora_fin" class="block font-medium text-sm text-gray-700">Hora Fin</label>
        <input id="hora_fin" name="hora_fin" type="time" value="{{ old('hora_fin', $horario->hora_fin ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
     <div>
        <label for="necesita_reserva" class="flex items-center">
            <input id="necesita_reserva" name="necesita_reserva" type="checkbox" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm" {{ (isset($horario) && $horario->necesita_reserva) ? 'checked' : '' }}>
            <span class="ml-2 text-sm text-gray-600">¿Necesita Reserva?</span>
        </label>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('horarios.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Guardar</button>
</div>