<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- Fondo con gradiente multicolor --}}
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-primary-red via-secondary-green to-info-blue dark:from-dark-blue-bg dark:via-gray-900 dark:to-gray-800 animate-gradient-xy">

            {{-- Logo principal --}}
            <div class="mb-4">
                <a href="/">
                    <x-application-logo class="w-28 h-28 fill-current text-white drop-shadow-md" />
                </a>
            </div>

            {{-- Tarjeta/Contenedor del formulario con más estilo --}}
            <div class="w-full sm:max-w-md mt-6 px-8 py-6 bg-dark-gray-card shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-700 backdrop-blur-sm bg-opacity-80">
                {{ $slot }}
            </div>
        </div>

        {{-- Animación de gradiente (añadir al final del body si no está en app.css) --}}
        <style>
            @keyframes gradient-xy {
                0%, 100% {
                    background-position: 0% 0%;
                }
                50% {
                    background-position: 100% 100%;
                }
            }
            .animate-gradient-xy {
                background-size: 400% 400%;
                animation: gradient-xy 15s ease infinite;
            }
        </style>
    </body>
</html>