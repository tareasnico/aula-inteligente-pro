<x-app-layout>
    {{-- Eliminar aquí el x-slot name="header" --}}

    <div class="p-6 sm:px-10 bg-gray-50 border-b border-gray-200">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-6">Bienvenido al Sistema de Gestión de Aulas Inteligentes</h1>
        <p class="text-lg text-gray-700">¡Hola, <span class="font-semibold text-blue-600">{{ Auth::user()->name }}</span>! Aquí tienes un resumen rápido y acceso a tus herramientas.</p>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            {{-- Tarjeta 1: Total de Reservas --}}
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-6 flex items-center transform transition duration-300 hover:scale-105 border border-gray-200">
                <div class="bg-blue-100 rounded-full p-4 mr-4">
                    <span class="text-blue-600 text-3xl">📅</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase">Total de Reservas</p>
                    <p class="text-4xl font-bold text-gray-900">{{ $totalReservas }}</p>
                </div>
            </div>
            {{-- Tarjeta 2: Aulas Registradas --}}
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-6 flex items-center transform transition duration-300 hover:scale-105 border border-gray-200">
                <div class="bg-green-100 rounded-full p-4 mr-4">
                    <span class="text-green-600 text-3xl">🏫</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase">Aulas Registradas</p>
                    <p class="text-4xl font-bold text-gray-900">{{ $aulasDisponibles }}</p>
                </div>
            </div>
            {{-- Tarjeta 3: Muebles Dañados --}}
            <div class="bg-white overflow-hidden shadow-lg rounded-xl p-6 flex items-center transform transition duration-300 hover:scale-105 border border-gray-200">
                <div class="bg-red-100 rounded-full p-4 mr-4">
                    <span class="text-red-600 text-3xl">🚨</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase">Muebles Dañados</p>
                    <p class="text-4xl font-bold text-gray-900">{{ $mueblesDanados }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Sección de Próximas Reservas --}}
            <div class="lg:col-span-2 bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="text-blue-500 mr-2">🔜</span> Próximas Reservas
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aula</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materia</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($proximasReservas as $reserva)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y H:i') }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $reserva->aula->nombre ?? 'N/A' }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $reserva->materia->nombre ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-3 text-center text-gray-500">No hay próximas reservas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Sección de Atajos Rápidos --}}
            <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="text-purple-500 mr-2">⚡</span> Atajos Rápidos
                    </h3>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('reservas.create') }}" class="w-full text-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-white text-md hover:bg-blue-700 transition duration-150">
                            Crear Nueva Reserva
                        </a>
                        <a href="{{ route('aulas.create') }}" class="w-full text-center px-6 py-3 bg-gray-200 border border-transparent rounded-lg font-semibold text-gray-800 text-md hover:bg-gray-300 transition duration-150">
                            Registrar Nueva Aula
                        </a>
                        <a href="{{ route('muebles.create') }}" class="w-full text-center px-6 py-3 bg-gray-200 border border-transparent rounded-lg font-semibold text-gray-800 text-md hover:bg-gray-300 transition duration-150">
                            Añadir Mobiliario
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>