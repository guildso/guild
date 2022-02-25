module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/partials/sidebar-left.blade.php',
        './resources/js/*.js'
    ],

    theme: {
        extend: {
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ]
};