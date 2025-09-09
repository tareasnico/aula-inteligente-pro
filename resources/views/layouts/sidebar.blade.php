<div class="flex flex-col w-64 h-screen px-4 py-8 bg-blue-900 border-r border-blue-900">
        <a href="{{ route('dashboard') }}" class="flex items-center mb-10">
        <img src="{{ asset('images/logo_esim.png') }}" alt="Logo" class="block h-9 w-auto mr-3">
        <span class="text-white text-2xl font-bold">Aula Int.</span>
    </a>    
    
    <div class="relative mt-6">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>

        <input type="text" class="w-full py-2 pl-10 pr-4 text-white bg-blue-800 border border-blue-600 rounded-md focus:border-blue-300 focus:ring-blue-300 placeholder-blue-200" placeholder="Buscar">
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-blue-200 hover:bg-blue-850 hover:text-white">
    {{ __('Inicio') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('aulas.index')" :active="request()->routeIs('aulas.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    {{ __('Aulas') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('docentes.index')" :active="request()->routeIs('docentes.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    {{ __('Docentes') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('materias.index')" :active="request()->routeIs('materias.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    {{ __('Materias') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('horarios.index')" :active="request()->routeIs('horarios.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    {{ __('Horarios') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('reservas.index')" :active="request()->routeIs('reservas.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    {{ __('Reservas') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('muebles.index')" :active="request()->routeIs('muebles.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    {{ __('Mobiliario') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('focos.index')" :active="request()->routeIs('focos.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    {{ __('Focos') }}
</x-responsive-nav-link>
<x-responsive-nav-link :href="route('aires.index')" :active="request()->routeIs('aires.*')" class="text-blue-100 hover:bg-blue-700 hover:text-white">
    A/A
</x-responsive-nav-link>
        </nav>
    </div>
</div>