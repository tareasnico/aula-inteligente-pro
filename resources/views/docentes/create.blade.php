<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Registrar Nuevo Docente') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6 border border-gray-200">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Formulario de Registro</h3>
                <form action="{{ route('docentes.store') }}" method="POST">
                    @csrf
                    @include('docentes._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>