<x-app-layout>
    {{-- Se eliminó el x-slot name="header" --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Banner de Encabezado --}}
            <div class="bg-blue-600 rounded-lg shadow-lg p-6 mb-8 text-white flex items-center justify-between">
                <div>
                    <h3 class="text-3xl font-bold">Panel de Focos</h3>
                    <p class="mt-1 text-blue-100">Administra la iluminación, su ubicación e intensidad.</p>
                </div>
                <svg class="h-16 w-16 text-blue-300 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                </svg>
            </div>

            {{-- Contenido Principal --}}
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold">Listado de Focos</h3>
                        <a href="{{ route('focos.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition ease-in-out duration-150">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Añadir Foco
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-md" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Código</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ubicación</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Intensidad</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aula</th>
                                    <th class="relative px-6 py-3"><span class="sr-only">Acciones</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($focos as $foco)
                                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                        <td class="px-6 py-4">{{ $foco->codigo }}</td>
                                        <td class="px-6 py-4">{{ $foco->ubicacion }}</td>
                                        <td class="px-6 py-4">{{ $foco->intensidad }}%</td>
                                        <td class="px-6 py-4">{{ $foco->aula->nombre ?? 'Sin Asignar' }}</td>
                                        <td class="px-6 py-4 text-right text-sm font-medium">
                                            <form action="{{ route('focos.destroy', $foco) }}" method="POST">
                                                <a href="{{ route('focos.edit', $foco) }}" class="inline-flex items-center text-blue-600 hover:text-blue-900 mr-4 transition duration-150 ease-in-out">
                                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                    Editar
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-900 transition duration-150 ease-in-out" onclick="return confirm('¿Seguro?')">
                                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay focos registrados.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>