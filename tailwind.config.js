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
                'pri': {
                    red: '#ED1C24',
                    green: '#00A859',
                    white: '#FFFFFF',
                },
            },
        },
    },
    plugins: [],
}
