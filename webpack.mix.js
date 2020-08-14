const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/portfolio-block.js', 'public/js')
    .sass('resources/sass/portfolio-block.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/portfolio.scss', 'public/css')
    .sass('resources/sass/alt-header.scss', 'public/css')
    .sass('resources/sass/one-portfolio.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css');