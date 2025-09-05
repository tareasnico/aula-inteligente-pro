@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 gap-6">
    <div>
        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $aula->nombre ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
    <div>
        <label for="ubicacion" class="block font-medium text-sm text-gray-700">Ubicación</label>
        <input id="ubicacion" name="ubicacion" type="text" value="{{ old('ubicacion', $aula->ubicacion ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
    <div>
        <label for="capacidad" class="block font-medium text-sm text-gray-700">Capacidad</label>
        <input id="capacidad" name="capacidad" type="number" value="{{ old('capacidad', $aula->capacidad ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('aulas.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Guardar</button>
</div>