import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: { // Aquí definimos nuestros nuevos colores
                'primary-red': '#EF4444', // Rojo vibrante
                'secondary-green': '#22C55E', // Verde esmeralda
                'accent-yellow': '#FACC15', // Amarillo soleado
                'info-blue': '#3B82F6', // Azul brillante
                'dark-blue-bg': '#0F172A', // Un azul muy oscuro para fondos
                'dark-gray-card': '#1E293B', // Un gris oscuro para tarjetas
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};