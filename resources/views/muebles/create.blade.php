<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Añadir Nuevo Mueble') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- La acción apunta a 'muebles.store' y no se necesita @method('PUT') --}}
                    <form action="{{ route('muebles.store') }}" method="POST">
                        @csrf
                        @include('muebles._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>