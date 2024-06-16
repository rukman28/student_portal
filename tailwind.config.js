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
            backgroundImage: {
                'student-login':"url(../../public/images/bg_image01.jpg)"
            }
        },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                roboto: ['Roboto', 'sans-serif'],
                Fjualla: ['Fjalla One', 'sans-serif'],
                notoserif: ['Noto Serif', 'serif'],
            },
            screens: {
                sm: '790px',
                screen_height: '997px'

            },
    },

    plugins: [require('@tailwindcss/forms')],
};
