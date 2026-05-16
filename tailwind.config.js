/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './storage/framework/views/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                brand: {
                    50:  '#f2f5f9',
                    100: '#e0e7f1',
                    200: '#c5d3e5',
                    300: '#9cb5d3',
                    400: '#6f92be',
                    500: '#406AAF',
                    600: '#345894',
                    700: '#2a4778',
                    800: '#243b60',
                    900: '#20324e',
                },
            },
        },
    },
    plugins: [],
};
