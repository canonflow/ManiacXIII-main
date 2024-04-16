import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const customPalette = {
    // primary: "#474F7A",
    // secondary: "#FC6736",
    // "primary-content": "#ffffff",
    // "secondary-content": "#ffffff",
    primary: "#620706",
    "primary-content": "#E7EADF",
    secondary:"#363D28",
    "secondary-content": "#E7EADF",
    accent: "#7F4C42",
    "accent-content": "#E7EADF",
    neutral: "#595F42",
    'neutral-content': "#ffffff",
    "base-100": "#E7EADF",
    "base-200": "#cacebe",
    "base-300": "#a6ab93",
    "base-content": "#022601",
    "success": "#3F7319",
    "info": '#075985',
    // info: "#99CCFF",
    "warning": "#D9CE40"
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
