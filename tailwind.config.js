import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

const plugin = require("tailwindcss/plugin");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./app/Http/Livewire/**/*Table.php",
        "./vendor/ramonrietdijk/livewire-tables/resources/**/*.blade.php",
        "./vendor/power-components/livewire-powergrid/resources/views/**/*.php",
        "./vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    darkMode: "class",

    plugins: [
        forms,
        plugin(function ({ addBase }) {
            addBase({
                html: { fontSize: "13px" },
            });
        }),
    ],
};
