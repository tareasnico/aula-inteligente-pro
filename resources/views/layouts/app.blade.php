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
    <body class="font-sans antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
            <div x-show="sidebarOpen" @click.away="sidebarOpen = false" class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden" x-cloak></div>
            <div x-show="sidebarOpen" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-gray-800 lg:hidden" x-cloak>
                @include('layouts.sidebar')
            </div>

            <div class="hidden lg:flex lg:flex-shrink-0">
                @include('layouts.sidebar')
            </div>

            <div class="flex-1 flex flex-col overflow-hidden">
                @include('layouts.navigation')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                    <div class="container mx-auto px-6 py-8">
                        @if (isset($header))
                            <header class="mb-6">
                                {{ $header }}
                            </header>
                        @endif

                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>