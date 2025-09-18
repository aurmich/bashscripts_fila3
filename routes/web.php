<?php

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
declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD

<<<<<<< HEAD
// @include 'web_working.php';
// @require 'web_test.php';

// @require 'web_seo.php';
=======
/*
 * --empty
 */
>>>>>>> a8f30311 (first)
=======
>>>>>>> bbec4378 (first)
=======
>>>>>>> c088001a (first)
=======
=======
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite/blob/main/routes/web.php
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Xot\Datas\XotData;

>>>>>>> 0d55b583 (first)
=======
declare(strict_types=1);

>>>>>>> 9cec72d6 (first)
=======
declare(strict_types=1);

>>>>>>> 8fc3049b (first)
=======
use Illuminate\Support\Facades\Route;
use Modules\Incentivi\Http\Controllers\PdfDownloadController;

>>>>>>> 15ea09e2 (first)
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

// Filament will handle all routes for this module
>>>>>>> d79d9e57 (first)
=======
/*
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
});
*/

// Route::domain(config('filament.domain'))
//    ->middleware(config('filament.middleware.base'))
Route::namespace('Socialite')
    ->name('socialite.')
    ->group(
        static function (): void {
            Route::get(
                '/admin/login/{provider}',
                // 'LoginController@redirectToProvider',
                'RedirectToProviderController',
            )
                ->name('oauth.redirect');
            Route::get(
                '/sso/{provider}/callback',
                'ProcessCallbackController',
            )
                ->name('oauth.callback');
        }
    );

/*
 * ..
 */

// $panel = Filament::getPanel('admin');

// Route::get('/login', $panel->getLoginRouteAction())->name('login');

/*
Route::namespace('\\')
    //->middleware($panel->getMiddleware())
    //->middleware('guest')
    ->group(function () use($panel){
        Route::get('/login', $panel->getLoginRouteAction())->name('login');
        //Route::redirect('/admin/login');
    }
    );
*/

if (XotData::make()->register_pub_theme) {
    require 'web_tall.php';
} else {
    Route::get('/login', static fn () => redirect('/admin/login'))->name('login');
}

Route::get('/upgrade', 'UpgradeController');
>>>>>>> 0d55b583 (first)
=======

// Route::prefix('setting')->group(function() {
//    Route::get('/', 'SettingController@index');
// });
>>>>>>> 9cec72d6 (first)
=======
declare(strict_types=1);
>>>>>>> c986cc10 (first)
=======
/*
Route::prefix('tenant')->group(function() {
    Route::get('/', 'TenantController@index');
});
*/
>>>>>>> 8fc3049b (first)
=======
declare(strict_types=1);
>>>>>>> 7e417e87 (first)
=======
declare(strict_types=1);
>>>>>>> 53542950 (first)
=======
declare(strict_types=1);
>>>>>>> 26424c5e (first)
=======
declare(strict_types=1);
>>>>>>> c8cd1ec3 (first)
=======
declare(strict_types=1);
>>>>>>> 51c7727d (first)
=======

Route::get('projects/{project}/pdf/download', [PdfDownloadController::class, 'download'])
    ->name('filament.projects.download');

Route::get('projects/{project}/liquidazione', [PdfDownloadController::class, 'liquidazione'])
    ->name('filament.liquidazione');
>>>>>>> 15ea09e2 (first)
=======
declare(strict_types=1);
>>>>>>> b7483fd0 (first)
