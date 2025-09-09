@if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="marca_modelo" class="block font-medium text-sm text-gray-700 mb-1">Marca y Modelo</label>
        <input id="marca_modelo" name="marca_modelo" type="text" value="{{ old('marca_modelo', $aire->marca_modelo ?? '') }}" placeholder="Ej: Surrey 553" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="estado" class="block font-medium text-sm text-gray-700 mb-1">Estado</label>
        <select name="estado" id="estado" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            @php $estados = ['Apagado', 'Encendido', 'En mantenimiento']; @endphp
            @foreach($estados as $estado)
                <option value="{{ $estado }}" {{ (isset($aire) && $aire->estado == $estado) ? 'selected' : '' }}>{{ $estado }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="mantenimiento" class="block font-medium text-sm text-gray-700 mb-1">Próximo Mantenimiento (Opcional)</label>
        <input id="mantenimiento" name="mantenimiento" type="date" value="{{ old('mantenimiento', $aire->mantenimiento ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500">
    </div>
    <div>
        <label for="aula_id" class="block font-medium text-sm text-gray-700 mb-1">Aula (Opcional)</label>
        <select name="aula_id" id="aula_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            <option value="">- Área Común / Sin Asignar -</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ (isset($aire) && $aire->aula_id == $aula->id) ? 'selected' : '' }}>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="flex items-center justify-end mt-6 space-x-4">
    <a href="{{ route('aires.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
        Cancelar
    </a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Guardar
    </button>
</div>