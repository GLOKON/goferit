let mix = require('laravel-mix');

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

mix.config.vue.esModule = true;

mix
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sourceMaps()
    .disableNotifications();

if (mix.inProduction()) {
    mix.version();

    mix.extract([
        'vue',
        'axios',
        'vuex',
        'jquery',
        'popper.js',
        'vue-router',
    ])
}