<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

=======
>>>>>>> 59bc4fe7 (first)
=======
>>>>>>> a8f30311 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

>>>>>>> bbec4378 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

>>>>>>> c088001a (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

>>>>>>> d79d9e57 (first)
=======
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

>>>>>>> 2df6fbc8 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

>>>>>>> 8fc3049b (first)
=======
>>>>>>> 7e417e87 (first)
=======
>>>>>>> 53542950 (first)
=======
>>>>>>> 26424c5e (first)
=======
>>>>>>> c8cd1ec3 (first)
=======
>>>>>>> 51c7727d (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

>>>>>>> b7483fd0 (first)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

>>>>>>> e0005d7d (first)
=======
>>>>>>> 6907d18e (first)
=======
>>>>>>> 616a71c2 (first)
=======
>>>>>>> c6af2eee (first)
=======
>>>>>>> 8e6e7d4c (first)
=======
>>>>>>> 4658bb86 (first)
=======
>>>>>>> edbb3aab (first)
=======
>>>>>>> bcab6efe (first)
const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
mix.js(__dirname + '/resources/assets/js/app.js', 'js/rating.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/rating.css');
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/xot.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/xot.css');
>>>>>>> 59bc4fe7 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/blog.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/blog.css');
>>>>>>> a8f30311 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/lang.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/lang.css');
>>>>>>> bbec4378 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/job.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/job.css');
>>>>>>> c088001a (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/notify.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/notify.css');
>>>>>>> d79d9e57 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/blog.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/blog.css');
>>>>>>> 0d55b583 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/blog.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/blog.css');
>>>>>>> 9cec72d6 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/rating.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/rating.css');
>>>>>>> 2df6fbc8 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/tenant.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/tenant.css');
>>>>>>> 8fc3049b (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/indennitacondizionilavoro.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/indennitacondizionilavoro.css');
>>>>>>> b7483fd0 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/indennitaresponsabilita.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/indennitaresponsabilita.css');
>>>>>>> e0005d7d (first)

if (mix.inProduction()) {
    mix.version();
}
<<<<<<< HEAD
<<<<<<< HEAD
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/badge.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/badge.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 7e417e87 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/certfisc.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/certfisc.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 53542950 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/contoannuale.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/contoannuale.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 26424c5e (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/europa.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/europa.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> c8cd1ec3 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/inail.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/inail.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 51c7727d (first)
=======
>>>>>>> b7483fd0 (first)
=======
>>>>>>> e0005d7d (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/legge104.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/legge104.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 6907d18e (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/legge109.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/legge109.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 616a71c2 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/mensa.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/mensa.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> c6af2eee (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/mobilitavolontaria.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/mobilitavolontaria.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 8e6e7d4c (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/prenotazioni.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/prenotazioni.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> 4658bb86 (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/presenzeassenze.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/presenzeassenze.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> edbb3aab (first)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/progressioni.js')
    .sass( __dirname + '/resources/assets/sass/app.scss', 'css/progressioni.css');

if (mix.inProduction()) {
    mix.version();
}
>>>>>>> bcab6efe (first)
