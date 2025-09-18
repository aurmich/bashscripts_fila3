const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

<<<<<<< HEAD
mix.js(__dirname + '/resources/assets/js/app.js', 'js/legge104.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/legge104.css');
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/sindacati.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/sindacati.css');
>>>>>>> 55edff60 (.)

if (mix.inProduction()) {
    mix.version();
}