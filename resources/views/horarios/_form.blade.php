@if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="codigo" class="block font-medium text-sm text-gray-700 mb-1">Código</label>
        <input id="codigo" name="codigo" type="text" value="{{ old('codigo', $horario->codigo ?? '') }}" placeholder="Ej: LUN-M-1" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="dia" class="block font-medium text-sm text-gray-700 mb-1">Día de la Semana</label>
        <select name="dia" id="dia" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            @php $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']; @endphp
            @foreach($dias as $dia)
                <option value="{{ $dia }}" {{ (isset($horario) && $horario->dia == $dia) ? 'selected' : '' }}>{{ $dia }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="turno" class="block font-medium text-sm text-gray-700 mb-1">Turno</label>
        <select name="turno" id="turno" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            @php $turnos = ['Mañana', 'Tarde', 'Noche']; @endphp
            @foreach($turnos as $turno)
                <option value="{{ $turno }}" {{ (isset($horario) && $horario->turno == $turno) ? 'selected' : '' }}>{{ $turno }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="hora_inicio" class="block font-medium text-sm text-gray-700 mb-1">Hora Inicio</label>
        <input id="hora_inicio" name="hora_inicio" type="time" value="{{ old('hora_inicio', $horario->hora_inicio ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="hora_fin" class="block font-medium text-sm text-gray-700 mb-1">Hora Fin</label>
        <input id="hora_fin" name="hora_fin" type="time" value="{{ old('hora_fin', $horario->hora_fin ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="necesita_reserva" class="flex items-center mt-8">
            <input id="necesita_reserva" name="necesita_reserva" type="checkbox" value="1" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" {{ (isset($horario) && $horario->necesita_reserva) ? 'checked' : '' }}>
            <span class="ml-2 text-sm text-gray-600">¿Necesita Reserva?</span>
        </label>
    </div>
</div>

<div class="flex items-center justify-end mt-6 space-x-4">
    <a href="{{ route('horarios.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
        Cancelar
    </a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Guardar
    </button>
</div>

{{-- SCRIPT PARA RESTRINGIR LAS HORAS --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const turnoSelect = document.getElementById('turno');
        const horaInicioInput = document.getElementById('hora_inicio');

        function actualizarHorario() {
            const turno = turnoSelect.value;

            if (turno === 'Mañana') {
                horaInicioInput.min = '07:00';
                horaInicioInput.max = '12:59';
            } else if (turno === 'Tarde') {
                horaInicioInput.min = '13:00';
                horaInicioInput.max = '18:59';
            } else if (turno === 'Noche') {
                horaInicioInput.min = '19:00';
                horaInicioInput.max = '23:59';
            } else {
                // Si no hay turno, no hay restricción
                horaInicioInput.min = '';
                horaInicioInput.max = '';
            }
        }

        // Ejecutar la función cuando cambia el turno
        turnoSelect.addEventListener('change', actualizarHorario);

        // Ejecutar la función al cargar la página por si hay un valor preseleccionado (en modo edición)
        actualizarHorario();
    });
</script>