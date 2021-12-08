const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    important: true,

    mode: 'jit',

    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
            }
        },

        /*Breakpoints*/
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1150px',
        },

        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },

            /* Tema */
            colors: {
                primary: {
                    light: '#0452C7',
                    DEFAULT: '#0342A1',
                    dark: '#02327A',
                },
                secondary: {
                    light: '#E5E5E5',
                    DEFAULT: '#DA0627',
                    dark: '#C4C5C7',
                },
                dark: '#484A4E',
                light: '#EFF3F8',
                danger: '#F09F9F',
                success: '#6FCF97'
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
