module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'purpink' : 'FC7AF8',
        'primary-bg' : '06141D',
        'secondary-bg' : '1B2730',
        'extend-bg' : 'A4A9AC',
        'primary-white' : 'FEFEFE',
        'secondary-grey' : 'A4A9AC',

      },
      fontFamily: {
        poppins: ['Poppins'],
        inter: ['Inter']
      }
    },
  },
  plugins: [],
}
