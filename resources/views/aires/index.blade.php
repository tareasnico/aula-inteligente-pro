<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Aires Acondicionados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800/70 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-lg border border-slate-700">
                <div class="p-6 text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold">Equipos de A/A</h3>
                        <a href="{{ route('aires.create') }}" class="inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-700">Añadir Equipo</a>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-600/30 border-l-4 border-green-500 text-green-200 p-4 mb-4 rounded-md" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-slate-700">
                        <thead class="bg-slate-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Marca / Modelo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Aula</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase">Próx. Mantenimiento</th>
                                <th class="relative px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-700">
                            @forelse ($aires as $aire)
                                <tr>
                                    <td class="px-6 py-4">{{ $aire->marca_modelo }}</td>
                                    <td class="px-6 py-4">{{ $aire->estado }}</td>
                                    <td class="px-6 py-4">{{ $aire->aula->nombre ?? 'Área Común' }}</td>
                                    <td class="px-6 py-4">{{ $aire->mantenimiento ? \Carbon\Carbon::parse($aire->mantenimiento)->format('d/m/Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 text-right text-sm font-medium">
                                        <form action="{{ route('aires.destroy', $aire) }}" method="POST">
                                            <a href="{{ route('aires.edit', $aire) }}" class="text-sky-400 hover:text-sky-600 mr-4">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Seguro?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="px-6 py-4 text-center">No hay equipos registrados.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>