const colors = require('tailwindcss/colors')

module.exports = {
  purge: [
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'primary': '#2B3E7F',
        'secondary': '#0094D5',
        'cyan': colors.cyan
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
