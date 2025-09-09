@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="codigo" class="block font-medium text-sm text-gray-700">Código</label>
        <input id="codigo" name="codigo" type="text" value="{{ old('codigo', $foco->codigo ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
    <div>
        <label for="ubicacion" class="block font-medium text-sm text-gray-700">Ubicación</label>
        <input id="ubicacion" name="ubicacion" type="text" value="{{ old('ubicacion', $foco->ubicacion ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
    <div>
        <label for="tipo" class="block font-medium text-sm text-gray-700">Tipo (Ej: LED, Fluorescente)</label>
        <input id="tipo" name="tipo" type="text" value="{{ old('tipo', $foco->tipo ?? 'LED') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
<div>
    <label for="aula_id" class="block font-medium text-sm text-gray-300">Aula (Opcional)</label>
    {{-- Quitamos el 'required' del select --}}
    <select name="aula_id" id="aula_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-gray-200 focus:border-sky-500 focus:ring-sky-500">
        {{-- Esta opción enviará un valor nulo --}}
        <option value="">- Sin Asignar -</option>
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" {{ (isset($foco) && $foco->aula_id == $aula->id) ? 'selected' : '' }}>
                {{ $aula->nombre }}
            </option>
        @endforeach
    </select>
</div>
    <div class="md:col-span-2">
        <label for="intensidad" class="block font-medium text-sm text-gray-700">Intensidad: <span id="intensidad-valor">{{ old('intensidad', $foco->intensidad ?? 50) }}</span>%</label>
        <input id="intensidad" name="intensidad" type="range" min="0" max="100" value="{{ old('intensidad', $foco->intensidad ?? 50) }}" class="block mt-1 w-full" required>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('focos.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Guardar</button>
</div>

<script>
    const intensidadSlider = document.getElementById('intensidad');
    const intensidadValor = document.getElementById('intensidad-valor');
    intensidadSlider.addEventListener('input', (event) => {
        intensidadValor.textContent = event.target.value;
    });
</script>