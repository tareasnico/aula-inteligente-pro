<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Añadir Nuevo Foco') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                {{-- La acción del formulario apunta a la ruta 'store' --}}
                <form action="{{ route('focos.store') }}" method="POST">
                    @csrf
                    {{-- Incluimos el formulario parcial --}}
                    @include('focos._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>