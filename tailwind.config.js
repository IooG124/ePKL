import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                back: '#C5DDDD',
                content: '#E3FFFF',
                blueSide: '#001185',
                hoverBlue: '#2839AD',
                blueish: '#2F77FF'
            },
            fontSize: {
                cpy: ['8px', '10px'],
            }
        },
    },
    plugins: [],
};
