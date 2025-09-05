<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Editar Mueble') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- 1. La acción apunta a la ruta 'update' y le pasa el ID del mueble --}}
                    <form action="{{ route('muebles.update', $mueble) }}" method="POST">
                        @csrf

                        {{-- 2. Se especifica que es una actualización con el método PUT --}}
                        @method('PUT')

                        @include('muebles._form')
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>