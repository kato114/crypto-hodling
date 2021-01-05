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

mix.styles([
   '../assets/front/css/bootstrap.min.css',
   '../assets/front/css/plugin.css',
   '../assets/front/css/animate.css',
   '../assets/front/css/toastr.css',
   '../assets/front/jquery-ui/jquery-ui.min.css',
   '../assets/front/jquery-ui/jquery-ui.structure.min.css',
   '../assets/front/css/rtl/style.css',
   '../assets/front/css/rtl/custom.css',
   '../assets/front/css/common.css',
   '../assets/front/css/rtl/responsive.css',
   '../assets/front/css/common-responsive.css',
], '../assets/front/css/rtl/all.css');




// mix.scripts([
// 	'../assets/front/js/jquery.js',
// 	'../assets/front/jquery-ui/jquery-ui.min.js',
// 	'../assets/front/js/popper.min.js',
// 	'../assets/front/js/bootstrap.min.js',
// 	'../assets/front/js/plugin.js',
// 	'../assets/front/js/xzoom.min.js',
// 	'../assets/front/js/jquery.hammer.min.js',
// 	'../assets/front/js/setup.js',
// 	'../assets/front/js/toastr.js',
// 	'../assets/front/js/main.js',
// 	'../assets/front/js/custom.js',
// ], '../assets/front/js/all.js');
