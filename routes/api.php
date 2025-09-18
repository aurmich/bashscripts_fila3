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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);
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

/*
<<<<<<< HEAD
=======
=======
>>>>>>> 9cec72d6 (first)

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
<<<<<<< HEAD
>>>>>>> c088001a (first)
=======

use Illuminate\Support\Facades\Route;

// use Modules\User\Http\Controllers\Api\UserController;

/*
>>>>>>> 0d55b583 (first)
=======
>>>>>>> 9cec72d6 (first)
=======

/*
>>>>>>> 8fc3049b (first)
=======
/*
>>>>>>> 15ea09e2 (first)
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
/*
<<<<<<< HEAD
<<<<<<< HEAD
Route::middleware('auth:api')->get('/xot', function (Request $request) {
    return $request->user();
});
*/
=======
 * --empty
 */
>>>>>>> a8f30311 (first)
=======
>>>>>>> bbec4378 (first)
=======
Route::middleware('auth:api')->get('/job', fn(Request $request) => $request->user());
*/
>>>>>>> c088001a (first)
=======
/*--work in progress
use Modules\Notify\Http\Controllers\TelegramNotificationController;

Route::middleware('guest')->group(function () {
    Route::post('/telegram/webhook/',
        [TelegramNotificationController::class, 'store'])->middleware('api');

    Route::get('/telegram/webhook/',
        [TelegramNotificationController::class, 'view'])->middleware('api');
});
*/
>>>>>>> d79d9e57 (first)
=======
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::prefix('/user')
    ->namespace('Api')
    ->group(
        static function (): void {
            // authenticate user
            /*
            Route::post('/login', [UserController::class, 'login'])
                ->name('api.login');
            */
            Route::post('/login', 'LoginController')
                ->name('api.login');
            /*
            Route::get('/login', [UserController::class, 'loginTest'])
                ->name('api.loginTest');
            */
            /*
            Route::get('/logout', 'LogoutController')
                ->name('api.logout');
            */
            // get user credentials
            /*
            Route::middleware('auth:api')
                ->get('/current', [UserController::class, 'getCurrentUser'])
                ->name('api.currentUser');
            */
        }
    );

/*
Route::middleware('auth:api' , 'scope:view-user' )
    ->get('/v2/user', function (Request $request) {
        return $request->user();
});
*/
Route::middleware('auth:api')
    ->namespace('Api')
    ->get('/v2/user', 'Api\GetLoggedUserController');

Route::middleware('auth:api')
    ->namespace('Api')
    ->get('/v2/logout', 'Api\LogoutController');

/*
Route::middleware('auth:api')
    ->namespace('Api')
    ->get('/v2/logout', function (Request $request) {
    // $user = $request->user();
    Assert::notNull($user = $request->user(),'['.__LINE__.']['.class_basename($this).']');
    $accessToken = $user->token();
    DB::table('oauth_refresh_tokens')
    ->where('access_token_id', $accessToken->)
    ->delete();
    $user->token()->delete();

    return response()->json([
        'message' => 'Successfully logged out',
        'session' => session()->all(),
    ]);
});
*/
>>>>>>> 0d55b583 (first)
=======

/*
Route::middleware('auth:api')->get('/setting', fn(Request $request) => $request->user());
*/
>>>>>>> 9cec72d6 (first)
=======
>>>>>>> c986cc10 (first)
=======
/*
Route::middleware('auth:api')->get('/tenant', function (Request $request) {
    return $request->user();
});
*/
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
>>>>>>> 15ea09e2 (first)
=======
declare(strict_types=1);
>>>>>>> b7483fd0 (first)
=======
declare(strict_types=1);
>>>>>>> e0005d7d (first)
=======
declare(strict_types=1);
>>>>>>> 6907d18e (first)
=======
declare(strict_types=1);
>>>>>>> 616a71c2 (first)
=======
declare(strict_types=1);
>>>>>>> c6af2eee (first)
=======
declare(strict_types=1);
>>>>>>> 8e6e7d4c (first)
=======
declare(strict_types=1);
>>>>>>> 4658bb86 (first)
=======
declare(strict_types=1);
>>>>>>> edbb3aab (first)
=======
declare(strict_types=1);
>>>>>>> bcab6efe (first)
=======
declare(strict_types=1);
>>>>>>> fec698af (first)
=======
declare(strict_types=1);
>>>>>>> f862c51f (first)
=======
declare(strict_types=1);
>>>>>>> 9997d18c (first)
=======
declare(strict_types=1);
>>>>>>> 961ad402 (first)
=======
declare(strict_types=1);
>>>>>>> dc18abbe (first)
