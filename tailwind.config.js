/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            width: {
                "1/7": "14.2857143%",
            },
            colors: {
                darkBlue: "#10141e",
                semiDarkBlue: "#161d2f",
                "black-70": "rgba(0, 0, 0, 0.7)",
            },
        },
    },
    plugins: [],
};
