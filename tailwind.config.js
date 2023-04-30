const defaultTheme = require("tailwindcss/defaultTheme");
const plugin = require("tailwindcss/plugin");
const Color = require("color");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        themeVariants: ["dark"],
        customForms: (theme) => ({
            default: {
                "input, textarea": {
                    "&::placeholder": {
                        color: theme("colors.gray.400"),
                    },
                },
            },
        }),
        extend: {
            maxHeight: {
                0: "0",
                xl: "36rem",
            },
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        backgroundColor: [
            "hover",
            "focus",
            "active",
            "odd",
            "dark",
            "dark:hover",
            "dark:focus",
            "dark:active",
            "dark:odd",
        ],
        display: ["responsive", "dark"],
        textColor: [
            "focus-within",
            "hover",
            "active",
            "dark",
            "dark:focus-within",
            "dark:hover",
            "dark:active",
        ],
        placeholderColor: ["focus", "dark", "dark:focus"],
        borderColor: ["focus", "hover", "dark", "dark:focus", "dark:hover"],
        divideColor: ["dark"],
        boxShadow: ["focus", "dark:focus"],
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/custom-forms"),
        plugin(({ addUtilities, e, theme, variants }) => {
            const newUtilities = {};
            // Object.entries(theme("colors")).map(([name, value]) => {
            //     if (name === "transparent" || name === "current") return;
            //     const color = value[300] ? value[300] : value;
            //     const hsla = Color(color).alpha(0.45).hsl().string();

            //     newUtilities[`.shadow-outline-${name}`] = {
            //         "box-shadow": `0 0 0 3px ${hsla}`,
            //     };
            // });

            addUtilities(newUtilities, variants("boxShadow"));
        }),
    ],
};
