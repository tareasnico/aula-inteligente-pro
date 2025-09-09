<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Editar Equipo de A/A') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800/70 backdrop-blur-sm overflow-hidden shadow-lg sm:rounded-lg p-6 border border-slate-700">
                <form action="{{ route('aires.update', $aire) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('aires._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>