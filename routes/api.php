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

Route::prefix('post')->group(function () {
    Route::post(
        'create',
        'Api\v1\PostsController@createProduct'
    )->name('post.store');
    
    Route::put(
        'edit/{id}',
        'Api\v1\PostsController@updateProduct'
    )->name('post.update');

    Route::delete(
        '{id}',
        'Api\v1\PostsController@removePost'
    )->name('post.destroy');
});