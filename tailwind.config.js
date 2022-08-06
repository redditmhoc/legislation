/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Albert Sans', 'sans-serif'],
                serif: ['serif'],
                mono: ['monospace']
            },
        }
    },
    plugins: [
        require('daisyui')
    ],
}
