<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

>>>>>>> 90bf7d5b85 (Squashed 'laravel/Modules/Job/' content from commit d3ea5c83e)
=======
>>>>>>> 3f813922dc (Squashed 'laravel/Modules/User/' content from commit edfbd6fa7)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

>>>>>>> 946fdba366 (Squashed 'laravel/Modules/Notify/' content from commit 6aac1e028)
=======
const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/ }));

>>>>>>> 1c8d7d06e0 (Squashed 'laravel/Modules/Tenant/' content from commit be731f696)
=======
>>>>>>> 660b6fffd2 (Squashed 'laravel/Modules/UI/' content from commit b14fdc133)
=======
>>>>>>> a27ba4e75b (Squashed 'laravel/Modules/Activity/' content from commit 05cc09d7b)
=======
>>>>>>> ecd8d46956 (Squashed 'laravel/Modules/Gdpr/' content from commit d30cea3b2)
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
mix.js(__dirname + '/resources/assets/js/app.js', 'js/xot.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/xot.css');
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/job.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/job.css');
>>>>>>> 90bf7d5b85 (Squashed 'laravel/Modules/Job/' content from commit d3ea5c83e)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/blog.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/blog.css');
>>>>>>> 3f813922dc (Squashed 'laravel/Modules/User/' content from commit edfbd6fa7)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/notify.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/notify.css');
>>>>>>> 946fdba366 (Squashed 'laravel/Modules/Notify/' content from commit 6aac1e028)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/tenant.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/tenant.css');
>>>>>>> 1c8d7d06e0 (Squashed 'laravel/Modules/Tenant/' content from commit be731f696)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/blog.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/blog.css');
>>>>>>> 660b6fffd2 (Squashed 'laravel/Modules/UI/' content from commit b14fdc133)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/blog.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/blog.css');
>>>>>>> a27ba4e75b (Squashed 'laravel/Modules/Activity/' content from commit 05cc09d7b)
=======
mix.js(__dirname + '/resources/assets/js/app.js', 'js/blog.js')
    .sass(__dirname + '/resources/assets/sass/app.scss', 'css/blog.css');
>>>>>>> ecd8d46956 (Squashed 'laravel/Modules/Gdpr/' content from commit d30cea3b2)

if (mix.inProduction()) {
    mix.version();
}
