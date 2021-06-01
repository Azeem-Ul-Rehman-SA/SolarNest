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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/style.scss', 'public/frontend/css');


//css bundle
mix.styles([
    'public/frontend/css/bootstrap/bootstrap.css',
    'public/frontend/css/slick.css',
    'public/frontend/css/slick-theme.css',
    'public/frontend/css/style.css',
    'public/frontend/css/toastr.min.css',
], 'public/frontend/css/app.css');


//js bundle
mix.scripts([
    'public/frontend/js/jquery-3.3.1.min.js',
    'public/frontend/js/jquery-ui.js',
    'public/frontend/js/bootstrap.js',
    'public/frontend/js/owl.carousel.js',
    'public/frontend/js/toastr.min.js',
    'public/frontend/js/custom.js',
    'public/frontend/js/slick.min.js',
    'public/frontend/js/lozad.min.js',
], 'public/js/app.js');
