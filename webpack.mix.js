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

mix.sass(
    'resources/assets/sass/app.scss'
    ,
    'public/css').styles([
    'node_modules/normalize.css/normalize.css',
    'node_modules/bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css',
    'public/css/app.css',
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/trumbowyg/dist/ui/trumbowyg.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/awesomplete/awesomplete.base.css',
    'node_modules/awesomplete/awesomplete.css'
    //'node_modules/bootstrap-daterangepicker/daterangepicker.css',

],'public/css/all.css');


mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
    //'node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js',
    'node_modules/moment/min/moment-with-locales.js',
    'node_modules/bootstrap4-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    'node_modules/trumbowyg/dist/trumbowyg.js',
    'node_modules/select2/dist/js/select2.js',
    'node_modules/awesomplete/awesomplete.js',
    'resources/assets/js/app.js'
], 'public/js/all.js');

mix.copyDirectory('node_modules/font-awesome/fonts', 'public/fonts');
mix.copyDirectory('resources/assets/img', 'public/img');
mix.copyDirectory('resources/assets/favicons', 'public/favicons');
mix.copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/js/trumbowyg');
mix.copy('node_modules/dropzone/dist/min/*','public/js/dropzone');
mix.copy('node_modules/jquery-ui-dist/*','public/js/jquery-ui');