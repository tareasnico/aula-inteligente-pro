<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Mobiliario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-700">Inventario de Mobiliario</h3>
                        <a href="{{ route('muebles.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Añadir Mueble
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nº Inventario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                                <th class="relative px-6 py-3"><span class="sr-only">Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($muebles as $mueble)
                                <tr>
                                    <td class="px-6 py-4">{{ $mueble->nro_inventario }}</td>
                                    <td class="px-6 py-4">{{ $mueble->nombre }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $mueble->estado == 'Funcional' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $mueble->estado == 'Dañado' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $mueble->estado == 'En mantenimiento' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                            {{ $mueble->estado }}
                                        </span>
                                    </td>
<td class="px-6 py-4 text-right text-sm font-medium">
    <form action="{{ route('muebles.destroy', $mueble) }}" method="POST">
        <a href="{{ route('muebles.edit', $mueble) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Seguro?')">Eliminar</button>
    </form>
</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="px-6 py-4 text-center">No hay muebles registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>