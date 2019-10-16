module.exports = {
  theme: {
    extend: {}
  },
  variants: {
    display: ['responsive', 'hover', 'focus', 'group-hover'],
    borderWidth: ['responsive', 'last', 'hover', 'focus'],
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
    require('tailwindcss-plugins/pagination'),
  ]
}
