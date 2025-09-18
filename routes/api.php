<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< HEAD

/*
<<<<<<< HEAD
=======

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
>>>>>>> c088001a (first)
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
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
