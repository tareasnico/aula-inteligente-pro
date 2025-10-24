{{-- resources/views/focos/control.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Control de Focos en Tiempo Real') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        {{-- Iteramos sobre cada foco --}}
                        @forelse ($focos as $foco)
                            <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-inner">
                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">Código: {{ $foco->codigo }}</div>
                                        <div class="text-lg font-bold text-gray-900 dark:text-white">{{ $foco->ubicacion }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-300">
                                            Aula: {{ $foco->aula->nombre ?? 'Sin aula' }}
                                        </div>
                                    </div>

                                    {{-- Interruptor (Toggle Switch) --}}
                                    <label class="inline-flex items-center cursor-pointer">
                                        <input type="checkbox" 
                                               id="estado-{{ $foco->id }}"
                                               class="sr-only peer" 
                                               onchange="actualizarFoco({{ $foco->id }})"
                                               {{ $foco->estado ? 'checked' : '' }}>
                                        <div class="relative w-11 h-6 bg-gray-300 peer-focus:outline-none rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-500 peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>

                                {{-- Slider de Intensidad --}}
                                <div>
                                    <label for="intensidad-{{ $foco->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Intensidad: <span id="intensidad-valor-{{ $foco->id }}">{{ $foco->intensidad }}</span>%
                                    </label>
                                    <input type="range" 
                                           id="intensidad-{{ $foco->id }}" 
                                           min="0" max="100" 
                                           value="{{ $foco->intensidad }}"
                                           oninput="document.getElementById('intensidad-valor-{{ $foco->id }}').innerText = this.value"
                                           onchange="actualizarFoco({{ $foco->id }})"
                                           class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-600">
                                </div>
                            </div>
                        @empty
                            <p>No hay focos registrados. <a href="{{ route('focos.create') }}" class="text-blue-500 hover:underline">Crea uno</a>.</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- El JavaScript que envía los cambios a la API --}}
    @push('scripts')
    <script>
function actualizarFoco(id) {
        // 1. Obtenemos los valores actuales de los controles
        const estado = document.getElementById(`estado-${id}`).checked;
        const intensidad = document.getElementById(`intensidad-${id}`).value;
        
        console.log(`Enviando Foco ID: ${id}, Estado: ${estado}, Intensidad: ${intensidad}`);

        // 2. Usamos fetch para enviar los datos a nuestra API
        fetch(`/api/focos/control/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                estado: estado,
                intensidad: intensidad
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Respuesta de la API no fue OK');
            }
            return response.json();
        })
        .then(data => {
            console.log('Respuesta de la API:', data);
            
            // --- ¡AQUÍ ESTÁ LA MAGIA! ---
            // 3. Sincronizamos SIEMPRE la vista con la respuesta de la API.
            //    La API (y la base de datos) tiene la última palabra.
            
            const foco = data.foco;
            
            // Actualizamos el interruptor
            document.getElementById(`estado-${foco.id}`).checked = foco.estado;
            
            // Actualizamos el slider de intensidad
            document.getElementById(`intensidad-${foco.id}`).value = foco.intensidad;

            // Actualizamos el texto de la intensidad
            document.getElementById(`intensidad-valor-${foco.id}`).innerText = foco.intensidad;
        })
        .catch(error => console.error('Error:', error));
    }
    </script>
    @endpush
</x-app-layout>