import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: "#FFFBF3",
                    100: "#FDECCE",
                    200: "#FBD89D",
                    300: "#F9C56D",
                    400: "#F7B13C",
                    500: "#35494d", //warna yang digunakan saat ini
                    600: "#D97706",
                    700: "#A85923",
                    800: "#623F04",
                    900: "#312002",
                },
            },
        },
    },

    plugins: [forms],
};
