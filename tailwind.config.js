/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}","./action/*.php"],
  theme: {
    extend: {
      colors: {
        'primary': '#49243E',
        'secondary': '#704264',
        'tertiary': '#F0EBE3',
        'opacity' : '#DBB5B5'
      },
      fontFamily: {
        'body': ['Nunito']
      }
    },
  },
  plugins: [],
}

