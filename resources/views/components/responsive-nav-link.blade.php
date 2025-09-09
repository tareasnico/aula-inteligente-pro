@props(['active'])

@php
$classes = ($active ?? false)
            // Clases para el enlace ACTIVO (fondo gris claro, texto blanco, borde azul)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-sky-500 text-start font-medium text-white bg-blue-500 focus:outline-none transition duration-150 ease-in-out'
            // Clases para el enlace INACTIVO (fondo transparente, texto gris)
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start font-medium text-blue-200 hover:text-white hover:bg-blue-600 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>