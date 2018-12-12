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


mix
    .stylus('resources/assets/stylus/styles.styl', 'public/css')
    .js('resources/assets/js/all.js', 'public/js')

.browserSync({
    proxy: 'hf.test'
});