@if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="nombre" class="block font-medium text-sm text-gray-700 mb-1">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $materia->nombre ?? '') }}" placeholder="Ej: Álgebra Lineal" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="carrera" class="block font-medium text-sm text-gray-700 mb-1">Carrera</label>
        <input id="carrera" name="carrera" type="text" value="{{ old('carrera', $materia->carrera ?? '') }}" placeholder="Ej: Ing. en Sistemas" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="año" class="block font-medium text-sm text-gray-700 mb-1">Año</label>
        <input id="año" name="año" type="text" value="{{ old('año', $materia->año ?? '') }}" placeholder="Ej: 1er Año" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="tipo_cursada" class="block font-medium text-sm text-gray-700 mb-1">Tipo de Cursada</label>
        <input id="tipo_cursada" name="tipo_cursada" type="text" value="{{ old('tipo_cursada', $materia->tipo_cursada ?? '') }}" placeholder="Ej: Cuatrimestral" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="docente_id" class="block font-medium text-sm text-gray-700 mb-1">Docente Asignado</label>
        <select name="docente_id" id="docente_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            <option value="">Seleccione un docente</option>
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}" {{ (isset($materia) && $materia->docente_id == $docente->id) || old('docente_id') == $docente->id ? 'selected' : '' }}>
                    {{ $docente->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="aula_recomendada_id" class="block font-medium text-sm text-gray-700 mb-1">Aula Recomendada (Opcional)</label>
        <select name="aula_recomendada_id" id="aula_recomendada_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            <option value="">Ninguna</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ (isset($materia) && $materia->aula_recomendada_id == $aula->id) || old('aula_recomendada_id') == $aula->id ? 'selected' : '' }}>
                    {{ $aula->nombre }} (Cap: {{ $aula->capacidad }})
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="flex items-center justify-end mt-6 space-x-4">
    <a href="{{ route('materias.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
        Cancelar
    </a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Guardar
    </button>
</div>