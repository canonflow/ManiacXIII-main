import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const customPalette = {
    primary: "#474F7A",
    secondary: "#FC6736",
    "primary-content": "#ffffff",
    "secondary-content": "#ffffff",
};

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
            },
        },
    },

    plugins: [
        forms,
        require("daisyui"),
    ],

    daisyui: {
        themes: [
            {
                dark: {
                    ...require("daisyui/src/theming/themes")["dark"],
                    ...customPalette,
                }
            },
            // {
            //     light: {
            //         ...require("daisyui/src/theming/themes")["light"],
            //         ...customPalette
            //     }
            // }
        ],
        darkTheme: 'dark'
    }
};
