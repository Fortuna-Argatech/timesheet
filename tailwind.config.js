/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/tw-elements/dist/js/**/*.js"
    ],
    important: true,
    darkMode: 'class',

    theme: {
        screens: {
            xs: "540px",
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            '2xl': '1536px',
        },
        fontFamily: {
            // 'lexend': ['"Roboto", sans-serif'],
            'sans': ['"Inter", sans-serif'],
        },
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '1rem',
                lg: '1rem',
                xl: '1rem',
                '2xl': '1rem',
            },
        },
        extend: {
            screens: {
                lg_992: '992px',
            },
            colors: {
                'dark': '#3c4858',
                'black': '#161c2d',
                'dark-footer': '#161c28',
                'iconbar': '#ffffff',
                'dark-iconbar': '#1a1c20',
                primary: colors.blue, // This is theme primary color please change your primary color here.
                success: colors.emerald,
                warning: colors.amber,
                danger: colors.red,
                info: colors.sky,
                light: colors.gray,
                // muted: colors.slate,
            },
            backgroundPosition: {
                'mark-p': '0 80%',
            },

            backgroundImage: {
                'body-pattern': 'url("assets/images/bg-body.png")',
                'body-color': 'url("assets/images/bg-body-2.png")'
            },

            boxShadow: {
                sm: '0 2px 4px 0 rgb(60 72 88 / 0.15)',
                DEFAULT: '0 0 3px rgb(60 72 88 / 0.15)',
                md: '0 5px 13px rgb(60 72 88 / 0.20)',
                lg: '0 10px 25px -3px rgb(60 72 88 / 0.15)',
                xl: '0 20px 25px -5px rgb(60 72 88 / 0.1), 0 8px 10px -6px rgb(60 72 88 / 0.1)',
                '2xl': '0 25px 50px -12px rgb(60 72 88 / 0.25)',
            },
            backgroundSize: {
                'mark-size': '100% 0.3em',
            },

            fontSize: {
                xs: ['0.75rem', { lineHeight: '1rem' }],
                sm: ['0.8125rem', { lineHeight: '1.25rem' }],
                base: ['0.875rem', { lineHeight: '1.5rem' }],
                lg: ['1rem', { lineHeight: '1.75rem' }],
                xl: ['1.1rem', { lineHeight: '1.75rem' }],
                '2xl': ['1.25rem', { lineHeight: '2rem' }],
                '3xl': ['1.5rem', { lineHeight: '2.25rem' }],
                '4xxl': ['2.5rem', {
                    lineHeight: '2.25rem'
                }],
            },
            height: {
                content: 'fit-content',
                '4.5': '18px',
                '17': '4.1rem',
                '88': '22rem',
                '112': '28rem',
                '120': '30rem',
                '128': '32rem',
                '136': '34rem',
                '144': '36rem',
                // '176': '44rem',
                // '180': '45rem',
                // '184': '46rem',
                '84%': '84%',

            },
            width: {
                content: 'fit-content',
                '97%': '97%',
                '94%': '94%',
                '80%': '80%',
                '70%': '70%',
                '61': '15.3rem',
                '18': '78px',
                '68': '17rem',
            },
            lineHeight: {
                'extra-loose': '2.5',
                '1': '.25rem',
                '11': '2.75',
                '12': '3rem',
                '16': '64px',
            },
            maxHeight: {
                '0': '0',
                '1/4': '25%',
                '1/2': '50%',
                '3/4': '75%',
                '112': '28rem',
                '128': '32rem',
                '136': '34rem',
                '144': '36rem',
            },
            minWidth: {
                '40': '10rem',
            },
            maxWidth: {
                '80%': '80%',
                '85%': '85%',
                '90%': '90%',
                '95%': '95%',
            },
            transitionDuration: {
                '0': '0ms',
                '2000': '2000ms',
                '5000': '5000ms',
            },
            transitionDelay: {
                '0': '0ms',
                '2000': '2000ms',
                '3000': '3000ms',
            },
            transitionProperty: {
                'height': 'height',
            },
            keyframes: {
                DropDownSlide: {
                    '0%': { transform: 'translateY(15px)' },
                    '100%': { transform: 'translateY(0)' }
                },
                collapsing: {
                    '0%': { transform: 'translateY(-5px)' },
                    '100%': { transform: 'translateY(5px)' }
                },
                ModalSlide: {
                    '0%': { transform: 'translateY(-50px)' },
                    '100%': { transform: 'translateY(0)' },
                    // '100%': { transform: 'translateY(0)' }
                }
            },
            animation: {
                DropDownSlide: 'DropDownSlide .2s ease-in',
                collapsing: 'collapsing .2s ease-in-out',
                ModalSlide: 'ModalSlide .3s ease-in-out',
            },

            spacing: {
                0.75: '0.1875rem',
                3.25: '0.8125rem'
            },

            height: ({
                theme
            }) => ({
                '10.5': '2.625rem',
                '85': '21.25rem',
            }),
            width: ({
                theme
            }) => ({
                '10.5': '2.625rem',
            }),

            maxWidth: ({
                theme,
                breakpoints
            }) => ({
                '1200': '71.25rem',
                '992': '60rem',
                '768': '45rem',
            }),

            zIndex: {
                1: '1',
                2: '2',
                3: '3',
                999: '999',
            },
        },
    },

    plugins: [
    ]
}

