{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">¡Ups!</strong>
        <span class="block sm:inline">Hay algunos problemas con los datos ingresados.</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="nombre" class="block font-medium text-sm text-gray-700">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $materia->nombre ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
    </div>

    <div>
        <label for="carrera" class="block font-medium text-sm text-gray-700">Carrera</label>
        <input id="carrera" name="carrera" type="text" value="{{ old('carrera', $materia->carrera ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
    </div>

    <div>
        <label for="año" class="block font-medium text-sm text-gray-700">Año</label>
        <input id="año" name="año" type="text" value="{{ old('año', $materia->año ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
    </div>

    <div>
        <label for="tipo_cursada" class="block font-medium text-sm text-gray-700">Tipo de Cursada</label>
        <input id="tipo_cursada" name="tipo_cursada" type="text" value="{{ old('tipo_cursada', $materia->tipo_cursada ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
    </div>

    <div>
        <label for="docente_id" class="block font-medium text-sm text-gray-700">Docente Asignado</label>
        <select name="docente_id" id="docente_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            <option value="">Seleccione un docente</option>
            @foreach($docentes as $docente)
                <option value="{{ $docente->id }}" {{ (isset($materia) && $materia->docente_id == $docente->id) || old('docente_id') == $docente->id ? 'selected' : '' }}>
                    {{ $docente->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="aula_recomendada_id" class="block font-medium text-sm text-gray-700">Aula Recomendada (Opcional)</label>
        <select name="aula_recomendada_id" id="aula_recomendada_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Ninguna</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ (isset($materia) && $materia->aula_recomendada_id == $aula->id) || old('aula_recomendada_id') == $aula->id ? 'selected' : '' }}>
                    {{ $aula->nombre }} (Cap: {{ $aula->capacidad }})
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('materias.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancelar</a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
        Guardar
    </button>
</div>