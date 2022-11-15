// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ["./index.php", "./app/**/*.php", "./resources/**/*.{php,vue,js}"],
  theme: {
    colors: {
      'white': '#fff',
      'black': '#000',
      'gray': '#979797',
      'blue': '#1c64f2',
      'primary': '#800080',
      'secondary': '#00ff00',
      'brand': '#bfff00',
    },
    screens: {
      'sm': '641px',
      'md': '769px',
      'lg': '1025px',
      'xl': '1281px',
      '2xl': '1537px',
    },
    extend: {
      spacing: {
        'sm': '10px',
        'md': '24px',
        'lg': '48px',
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
