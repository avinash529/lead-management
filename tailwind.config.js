import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"IBM Plex Sans"', ...defaultTheme.fontFamily.sans],
                serif: ['Fraunces', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                ink: {
                    950: '#0b0d12',
                    900: '#111827',
                    800: '#1f2937',
                    700: '#374151',
                    600: '#4b5563',
                    500: '#6b7280',
                },
                sand: {
                    50: '#f8f6f3',
                    100: '#f2ede7',
                    200: '#e8e0d7',
                    300: '#d7cdc2',
                },
                copper: {
                    50: '#fbf4ee',
                    100: '#f6e6d7',
                    200: '#ebc8aa',
                    400: '#c57d4e',
                    500: '#b36639',
                    600: '#9b5a31',
                    700: '#7c4727',
                },
                sage: {
                    100: '#e2ebe8',
                    300: '#b4c6c0',
                    500: '#5f726d',
                    700: '#4c5b56',
                },
            },
            boxShadow: {
                soft: '0 14px 40px -28px rgba(15, 23, 42, 0.45)',
            },
            borderRadius: {
                '2xl': '1.25rem',
                '3xl': '1.5rem',
            },
        },
    },

    plugins: [forms],
};
