<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">


        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gradient-to-br from-gray-900 via-blue-900 to-sky-800 text-gray-100 selection:bg-sky-500 selection:text-white">
            
            <div class="flex items-center justify-center min-h-screen">
                <div class="text-center p-8">
                    
                    {{-- Texto superior pequeño --}}
                    <h2 class="text-2xl font-light tracking-widest text-sky-300 uppercase mb-2">
                        Bienvenido a tu
                    </h2>

                    {{-- Título principal --}}
<h1 class="text-7xl font-bold tracking-wider text-white mb-4 drop-shadow-lg font-cinzel">
    Aula Inteligente
</h1>

                    {{-- Nombre del autor --}}
                    <p class="text-lg text-gray-400 mb-10 italic">
                        por Nicolás Pérez
                    </p>

                    {{-- Botones --}}
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-sky-500 to-blue-600 text-white text-lg font-bold rounded-lg shadow-xl hover:from-sky-600 hover:to-blue-700 transition duration-300 transform hover:scale-105">
                                Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-sky-500 to-blue-600 text-white text-lg font-bold rounded-lg shadow-xl hover:from-sky-600 hover:to-blue-700 transition duration-300 transform hover:scale-105">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 border border-sky-400 text-sky-200 text-lg font-bold rounded-lg shadow-xl hover:bg-sky-500 hover:text-white transition duration-300 transform hover:scale-105">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>