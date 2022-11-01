// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ["./index.php", "./app/**/*.php", "./resources/**/*.{php,vue,js}"],
  theme: {
    colors: {
      'white': '#fff',
      'black': '#000',
      'primary': '#800080',
      'secondary': '#00ff00',
      'brand': '#bfff00',
    },
    extend: {
      spacing: {
      },
      colors: {
      },
      fontFamily: {
        // sans: ['Graphik', 'sans-serif'],
        // serif: ['Merriweather', 'serif'],
      },
    },
  },
  plugins: [],
};
