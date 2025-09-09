@if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="nro_inventario" class="block font-medium text-sm text-gray-700 mb-1">Nº Inventario</label>
        <input id="nro_inventario" name="nro_inventario" type="number" value="{{ old('nro_inventario', $mueble->nro_inventario ?? '') }}" placeholder="Ej: 1123" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div>
        <label for="nombre" class="block font-medium text-sm text-gray-700 mb-1">Nombre</label>
        <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $mueble->nombre ?? '') }}" placeholder="Ej: Silla Ergonómica" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
    </div>
    <div class="md:col-span-2">
        <label for="estado" class="block font-medium text-sm text-gray-700 mb-1">Estado</label>
        <select name="estado" id="estado" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            @php $estados = ['Funcional', 'Dañado', 'En mantenimiento', 'Fuera de servicio']; @endphp
            @foreach($estados as $estado)
                <option value="{{ $estado }}" {{ (isset($mueble) && $mueble->estado == $estado) ? 'selected' : '' }}>{{ $estado }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="flex items-center justify-end mt-6 space-x-4">
    <a href="{{ route('muebles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
        Cancelar
    </a>
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Guardar
    </button>
</div>