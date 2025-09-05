@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre Completo</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $docente->nombre ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
    <div>
        <label for="especialidad" class="block font-medium text-sm text-gray-700">Especialidad</label>
        <input id="especialidad" name="especialidad" type="text" value="{{ old('especialidad', $docente->especialidad ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300" required>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('docentes.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase">Guardar</button>
</div>