module.exports = {
  theme: {
    nset: {
      '0': 0,
      '75': '75px',
      auto: 'auto',
      '1/2': '50%',
    },
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
