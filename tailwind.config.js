/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'linkedout': {
                    50: '#e8edf5',
                    100: '#d1dbe9',
                    200: '#a3b7d3',
                    300: '#7593bd',
                    400: '#476fa7',
                    500: '#2d5a8c',
                    600: '#234870',
                    700: '#1a3654',
                    800: '#122438',
                    900: '#09121c',
                },
                'failure': {
                    light: '#fef2f2',
                    DEFAULT: '#dc2626',
                    dark: '#991b1b',
                },
                'shame': {
                    light: '#fefce8',
                    DEFAULT: '#eab308',
                    dark: '#854d0e',
                },
                'pity': {
                    light: '#f0fdf4',
                    DEFAULT: '#16a34a',
                    dark: '#166534',
                }
            },
            fontFamily: {
                'sans': ['Inter', 'system-ui', 'sans-serif'],
            }
        },
    },
    plugins: [],
}