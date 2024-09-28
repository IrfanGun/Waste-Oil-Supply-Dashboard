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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['poppins']
            },

            colors: {
                'merah' : '#BA3334',
                'merah-muda' : '#E36E6F',
                'red-bright' : '#ff0004',
                'misty-rose' : '#FFE6E6',
                'inter-orange' : '#ff5805',
                'yellow-sea' : '#ffac05',
                'gold' : '#ffd105',
                'yellow-bright' : 'fff305',
                'reddish-white' : '#F5F5F5',
                'silver' : '#bababa',
                'charleston-green' : '#2D2D2D',
                'light-grey' : '#6C6C6C',
                'light-red' : '#FFCCCD',
                'cultured' : '#f4f4f6',
                'aero-blue' : '#d5f2e4',
                'green-sheen' : '#659577',
                'linen' : '#fdeee1',
                'burly-wood' : '#e8b380',
                'light-cyan' : '#e5f5f5',
                'medium-aquamarine' : '#84bebf',
                'white-smoke' : '#f4f4f6'

            },

            theme: {
                fontWeight: {
                  light: 300,
                  normal: 400,
                  medium: 500,
                  semibold: 600,
                  bold: 700,
                  bolder: 800,
                  boldest: 900,
                },
              },
        },
    },

    plugins: [forms, require('tailwind-scrollbar-hide') ],
};
