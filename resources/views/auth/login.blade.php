<x-guest-layout>
    <div class="mb-8 text-center">
        <h1 class="text-white text-4xl font-bold drop-shadow-md">Iniciar Sesión</h1>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Correo Electrónico" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="Contraseña" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
         <label for="remember_me" class="inline-flex items-center">
              {{-- La clase text-sky-600 es el único cambio aquí --}}
              <input id="remember_me" type="checkbox" class="rounded border-gray-600 bg-gray-800 text-sky-600 shadow-sm focus:ring-sky-500" name="remember">
              <span class="ms-2 text-sm text-gray-300">{{ __('Recuérdame') }}</span>
         </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-300 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>

        <div class="mt-6">
            <x-primary-button>
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>