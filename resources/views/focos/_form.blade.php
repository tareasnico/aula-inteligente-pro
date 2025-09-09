@if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="codigo" class="block font-medium text-sm text-gray-700 mb-1">Código</label>
        <input id="codigo" name="codigo" type="text" value="{{ old('codigo', $foco->codigo ?? '') }}" placeholder="Ej: FOCO-PAS-01" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="ubicacion" class="block font-medium text-sm text-gray-700 mb-1">Ubicación</label>
        <input id="ubicacion" name="ubicacion" type="text" value="{{ old('ubicacion', $foco->ubicacion ?? '') }}" placeholder="Ej: Pasillo Central" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="tipo" class="block font-medium text-sm text-gray-700 mb-1">Tipo</label>
        <input id="tipo" name="tipo" type="text" value="{{ old('tipo', $foco->tipo ?? 'LED') }}" placeholder="Ej: LED" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="aula_id" class="block font-medium text-sm text-gray-700 mb-1">Aula (Opcional)</label>
        <select name="aula_id" id="aula_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            <option value="">- Sin Asignar / Pasillo -</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ (isset($foco) && $foco->aula_id == $aula->id) ? 'selected' : '' }}>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="md:col-span-2">
        <label for="intensidad" class="block font-medium text-sm text-gray-700 mb-1">Intensidad: <span id="intensidad-valor">{{ old('intensidad', $foco->intensidad ?? 50) }}</span>%</label>
        <input id="intensidad" name="intensidad" type="range" min="0" max="100" value="{{ old('intensidad', $foco->intensidad ?? 50) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600" required>
    </div>
</div>

<div class="flex items-center justify-end mt-6 space-x-4">
    <a href="{{ route('focos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
        Cancelar
    </a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Guardar
    </button>
</div>

<script>
    const intensidadSlider = document.getElementById('intensidad');
    const intensidadValor = document.getElementById('intensidad-valor');
    intensidadSlider.addEventListener('input', (event) => {
        intensidadValor.textContent = event.target.value;
    });
</script>