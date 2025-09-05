<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Distribución del Mueble: {{ $mueble->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-1">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Asignar a una Nueva Aula</h3>
                    {{-- Aquí irá el formulario para asignar --}}
                </div>
            </div>

            <div class="md:col-span-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Distribución Actual</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium">Aula</th>
                                <th class="px-6 py-3 text-left text-xs font-medium">Cantidad Total</th>
                                <th class="px-6 py-3 text-left text-xs font-medium">Cantidad Dañada</th>
                                <th class="px-6 py-3 text-left text-xs font-medium">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($mueble->aulas as $aula)
                                <tr>
                                    <td class="px-6 py-4">{{ $aula->nombre }}</td>
                                    <td class="px-6 py-4">{{ $aula->pivot->cantidad }}</td>
                                    <td class="px-6 py-4">{{ $aula->pivot->cantidad_danada }}</td>
                                    <td class="px-6 py-4">
                                        {{-- Aquí iría el form para actualizar o quitar --}}
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="px-6 py-4 text-center">Este mueble no está asignado a ninguna aula.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>