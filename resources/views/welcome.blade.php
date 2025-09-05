<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Aula Inteligente') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="relative min-h-screen bg-dark-blue-bg selection:bg-accent-yellow selection:text-dark-blue-bg">
        @if (Route::has('login'))
            <nav class="bg-gradient-to-r from-primary-red to-accent-yellow shadow-lg p-4 flex justify-between items-center">
                <div class="text-white text-2xl font-bold">
                    {{ config('app.name', 'Aula Inteligente') }}
                </div>
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white hover:text-dark-blue-bg font-semibold px-4 py-2 rounded-md transition duration-300 ease-in-out bg-primary-red hover:bg-accent-yellow">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-dark-blue-bg font-semibold px-4 py-2 rounded-md transition duration-300 ease-in-out bg-secondary-green hover:bg-accent-yellow">
                            Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-dark-blue-bg hover:text-white font-semibold px-4 py-2 rounded-md transition duration-300 ease-in-out bg-accent-yellow hover:bg-info-blue">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif

        <div class="flex flex-col items-center justify-center min-h-[calc(100vh-64px)] bg-gradient-to-br from-dark-blue-bg to-gray-800 p-4">
            <h1 class="text-5xl font-extrabold text-white mb-6 text-center leading-tight drop-shadow-lg">
                Bienvenido al Sistema de Gestión de <br class="hidden sm:inline"> Aula Inteligente
            </h1>
            <p class="text-xl text-gray-300 mb-8 text-center max-w-2xl drop-shadow-md">
                Administra y optimiza el uso de tus aulas, reservas, horarios y dispositivos.<br>
                Inicia sesión para comenzar esta experiencia vibrante.
            </p>
            <div class="flex space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary-red hover:bg-secondary-green focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-red transition duration-300">
                        Ir al Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-secondary-green hover:bg-info-blue focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-green transition duration-300">
                        Iniciar Sesión
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-dark-blue-bg bg-accent-yellow hover:bg-primary-red focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-yellow transition duration-300">
                            Registrarme
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</body>
</html>