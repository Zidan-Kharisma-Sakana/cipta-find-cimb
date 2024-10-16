/** @type {import('tailwindcss').Config} */
export default {
  content: ["./src/**/*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors:{
        cimbPrimary: "#790009",
        cimbSecondary100: "#ee1c24",
        cimbSecondary200: "#e1161b",
        cimbSecondary300: "#ca1214",
      }
    },
  },
  plugins: [],
};
