const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/resources/assets/js/app.js', 'js/badge.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/badge.css');

if (mix.inProduction()) {
    mix.version();
}