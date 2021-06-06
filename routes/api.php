<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('/posts', 'Api\v1\PostsController', /* ['only' => ['index', 'store'], 'except' => ['index', 'store']] */);

Route::resource('/video', 'Api\v1\VideoController');

Route::resource('/reviews', 'Api\v1\ReviewsController');

Route::resource('/contacts', 'Api\v1\ContactsController');

Route::resource('/social', 'Api\v1\SocialController');
