const mix = require('laravel-mix');

// mix.webpackConfig({
//   module: {
//     rules: [
//       {
//         test: /\.mjs$/i,
//         resolve: { byDependency: { esm: { fullySpecified: false } } },
//       },
//     ],
//   },
// })

require('laravel-mix-tailwind');


// mix.override((webpackConfig) => {
//     webpackConfig.module.rules.push({
//         test: /\.mjs$/i,
//         resolve: { byDependency: { esm: { fullySpecified: false } } },
//       });
// });

// mix.override((webpackConfig) => {
//     webpackConfig.resolve.extensions.push('.mjs');
// });


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind('./tailwind.config.js')
    .webpackConfig(require('./webpack.config'));
