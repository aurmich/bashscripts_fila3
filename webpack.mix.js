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
const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

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

if (mix.inProduction()) {
    mix.version();
}
