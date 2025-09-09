@if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 gap-6">
    <div>
        <label for="nombre" class="block font-medium text-sm text-gray-700 mb-1">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $aula->nombre ?? '') }}" placeholder="Ej: Salón de Actos" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out" required>
    </div>
    <div>
        <label for="ubicacion" class="block font-medium text-sm text-gray-700 mb-1">Ubicación</label>
        <input id="ubicacion" name="ubicacion" type="text" value="{{ old('ubicacion', $aula->ubicacion ?? '') }}" placeholder="Ej: Edificio Principal, Piso 1" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out" required>
    </div>
    <div>
        <label for="capacidad" class="block font-medium text-sm text-gray-700 mb-1">Capacidad</label>
        <input id="capacidad" name="capacidad" type="number" value="{{ old('capacidad', $aula->capacidad ?? '') }}" placeholder="Ej: 50" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500 transition duration-150 ease-in-out" required>
    </div>
</div>

<div class="flex items-center justify-end mt-6 space-x-4">
    <a href="{{ route('aulas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
        Cancelar
    </a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Guardar
    </button>
</div>