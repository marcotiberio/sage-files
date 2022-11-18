// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ["./index.php", "./app/**/*.php", "./resources/**/*.{php,vue,js}"],
  theme: {
    colors: {
      'white': '#fff',
      'black': '#000',
      'gray': '#979797',
      'lightgray': '#F3F4F6',
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
      borderRadius: {
        'sm': '10px',
      },
      boxShadow: {
        'sm': '0px 4px 6px -1px rgba(0, 0, 0, 0.1), 0px 2px 4px -2px rgba(0, 0, 0, 0.05)',
        'lg': '0px 8px 12px -2px rgba(0, 0, 0, 0.1), 0px 8px 12px -2px rgba(0, 0, 0, 0.05)',
      },
      colors: {
      },
      fontFamily: {
        // sans: ['Graphik', 'sans-serif'],
        // serif: ['Merriweather', 'serif'],
      },
      spacing: {
        'sm': '10px',
        'md': '24px',
        'lg': '48px',
      },
    },
  },
  plugins: [],
};
