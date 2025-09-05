<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3 class="text-2xl font-bold">¡Bienvenido de nuevo, {{ Auth::user()->name }}!</h3>
            <p class="mt-2 text-gray-600 dark:text-gray-400">
                Utiliza la barra de navegación lateral para gestionar las diferentes secciones del sistema.
            </p>
        </div>
    </div>
</x-app-layout>