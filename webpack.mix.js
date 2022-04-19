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
   .scripts(['resources/views/admin/assets/js/jquery.mask.js'],'public/backend/assets/js/libs.js')
   .copyDirectory('resources/views/admin/vendors', 'public/backend/vendors')
   .copyDirectory('resources/views/admin/build', 'public/backend/build')
   .version()
