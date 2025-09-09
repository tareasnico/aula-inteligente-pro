<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6 border border-gray-200">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Formulario de Registro de Materia</h3>
                <form action="{{ route('materias.store') }}" method="POST">
                    @csrf
                    @include('materias._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>