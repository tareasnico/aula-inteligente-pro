<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Focos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold">Listado de Focos</h3>
                        <a href="{{ route('focos.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Añadir Foco
                        </a>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase">Código</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase">Ubicación</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase">Intensidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase">Aula</th>
                                <th class="relative px-6 py-3"><span class="sr-only">Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($focos as $foco)
                                <tr>
                                    <td class="px-6 py-4">{{ $foco->codigo }}</td>
                                    <td class="px-6 py-4">{{ $foco->ubicacion }}</td>
                                    <td class="px-6 py-4">{{ $foco->intensidad }}%</td>
                                    <td class="px-6 py-4">{{ $foco->aula->nombre ?? 'Sin asignar' }}</td>
                                    <td class="px-6 py-4 text-right text-sm font-medium">
                                        <form action="{{ route('focos.destroy', $foco) }}" method="POST">
                                            <a href="{{ route('focos.edit', $foco) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Seguro?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="px-6 py-4 text-center">No hay focos registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>