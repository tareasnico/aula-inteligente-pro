@if ($errors->any())
    <div class="mb-4 bg-red-600/30 border border-red-500 text-red-200 px-4 py-3 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="marca_modelo" class="block font-medium text-sm text-gray-300">Marca y Modelo</label>
        <input id="marca_modelo" name="marca_modelo" type="text" value="{{ old('marca_modelo', $aire->marca_modelo ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-gray-200 focus:border-sky-500 focus:ring-sky-500" required>
    </div>
    <div>
        <label for="estado" class="block font-medium text-sm text-gray-300">Estado</label>
        <select name="estado" id="estado" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-gray-200 focus:border-sky-500 focus:ring-sky-500" required>
            @php $estados = ['Apagado', 'Encendido', 'En mantenimiento']; @endphp
            @foreach($estados as $estado)
                <option value="{{ $estado }}" {{ (isset($aire) && $aire->estado == $estado) ? 'selected' : '' }}>{{ $estado }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="mantenimiento" class="block font-medium text-sm text-gray-300">Próximo Mantenimiento (Opcional)</label>
        <input id="mantenimiento" name="mantenimiento" type="date" value="{{ old('mantenimiento', $aire->mantenimiento ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-gray-200 focus:border-sky-500 focus:ring-sky-500">
    </div>
    <div>
        <label for="aula_id" class="block font-medium text-sm text-gray-300">Aula (Opcional)</label>
        <select name="aula_id" id="aula_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-600 bg-gray-700 text-gray-200 focus:border-sky-500 focus:ring-sky-500">
            <option value="">- Área Común / Sin Asignar -</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ (isset($aire) && $aire->aula_id == $aula->id) ? 'selected' : '' }}>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('aires.index') }}" class="text-gray-400 hover:text-gray-200 mr-4">Cancelar</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-sky-700">Guardar</button>
</div>