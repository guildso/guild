module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                purple : {
                    '50': '#FEFDFF',
                    '100': '#F2E8FF',
                    '200': '#DCBFFF',
                    '300': '#C597FF',
                    '400': '#AF6EFF',
                    '500': '#9845FF',
                    '600': '#790DFF',
                    '700': '#5F00D4',
                    '800': '#45009C',
                    '900': '#2C0064'
                  },
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
        require('@tailwindcss/forms'),
    ]
};
