const colors = require('tailwindcss/colors')

module.exports = {
  purge: false,
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    screens: {
      sm: '32rem',
      md: '48rem',
      lg: '64rem',
      xl: '80rem',
      "2xl": '96rem',
    },
    fontFamily: {
      body: "var(--font-body), sans-serif",
    },
    fontWeight: {
      regular: 'var(--font-weight-regular)',
      bold: 'var(--font-weight-bold)',
    },
    borderRadius: {
      none: '0px',
      sm: '0.25rem',
      DEFAULT: '0.5rem',
      lg: '1rem',
      full: '9999px',
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      black: colors.black,
      white: colors.white,
      gray: '#D9D9D9',

      body: '#666666',
      accent: {
        "10": "hsla(var(--color-accent), .1)",
        "20": "hsla(var(--color-accent), .2)",
        "30": "hsla(var(--color-accent), .3)",
        "40": "hsla(var(--color-accent), .4)",
        "50": "hsla(var(--color-accent), .5)",
        "60": "hsla(var(--color-accent), .6)",
        "70": "hsla(var(--color-accent), .7)",
        "80": "hsla(var(--color-accent), .8)",
        "90": "hsla(var(--color-accent), .9)",
        DEFAULT: "hsla(var(--color-accent), 1)",
      },
      success: {
        "10": "hsla(var(--color-success), .1)",
        "20": "hsla(var(--color-success), .2)",
        "30": "hsla(var(--color-success), .3)",
        "40": "hsla(var(--color-success), .4)",
        "50": "hsla(var(--color-success), .5)",
        "60": "hsla(var(--color-success), .6)",
        "70": "hsla(var(--color-success), .7)",
        "80": "hsla(var(--color-success), .8)",
        "90": "hsla(var(--color-success), .9)",
        DEFAULT: "hsla(var(--color-success), 1)",
      },
      warning: {
        "10": "hsla(var(--color-warning), .1)",
        "20": "hsla(var(--color-warning), .2)",
        "30": "hsla(var(--color-warning), .3)",
        "40": "hsla(var(--color-warning), .4)",
        "50": "hsla(var(--color-warning), .5)",
        "60": "hsla(var(--color-warning), .6)",
        "70": "hsla(var(--color-warning), .7)",
        "80": "hsla(var(--color-warning), .8)",
        "90": "hsla(var(--color-warning), .9)",
        DEFAULT: "hsla(var(--color-warning), 1)",
      },
      error: {
        "10": "hsla(var(--color-error), .1)",
        "20": "hsla(var(--color-error), .2)",
        "30": "hsla(var(--color-error), .3)",
        "40": "hsla(var(--color-error), .4)",
        "50": "hsla(var(--color-error), .5)",
        "60": "hsla(var(--color-error), .6)",
        "70": "hsla(var(--color-error), .7)",
        "80": "hsla(var(--color-error), .8)",
        "90": "hsla(var(--color-error), .9)",
        DEFAULT: "hsla(var(--color-error), 1)",
      },
    },
    extend: {
      translate: {
        "screen": "100vw",
        "-screen": "-100vw",
      },
      inset: {
        "screen": "100vw",
        "-screen": "-100vw",
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
  corePlugins: {
    container: false,
  }
}
