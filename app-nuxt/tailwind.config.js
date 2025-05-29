module.exports = {
  theme: {
    content: [
      "./components/**/*.{js,vue,ts}",
      "./layouts/**/*.vue",
      "./pages/**/*.vue",
      "./plugins/**/*.{js,ts}",
      "./nuxt.config.{js,ts}",
    ],
    fontFamily: {
      sans: ['NeueMontrealRegular', 'sans-serif'],
      title: ['NeueMontrealRegular', 'sans-serif'],
    },
    extend: {
      spacing: {
        '8xl': '96rem',
        '9xl': '128rem',
      },
      borderRadius: {
        '4xl': '2rem',
      },
      colors: {
        gray: {
          DEFAULT: '#BFBFBF',
          back: '#E1E0DC',
          darkest: '#1D2126',
          dark: '#71767A',
          light: '#DDDDDD',
          lightest: '#E6E9EB',
          words: '#606060',
          bgs: '#969593',
        },
      },
      fontSize: {
        xxl: '1.5rem',
        xxxl: '1.953rem',
        xxxxl: '2.441rem',
        xxxxxl: '3.052rem',
        xxxxxxl: '4.052rem',
      }
    }
  },
}
