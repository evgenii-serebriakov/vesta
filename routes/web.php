<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/
/**
 * Redirect on index.php
 */
// Route::get('/{any}', function () {
//     return view('home');
// })->where('any', '(.*)');

/**
 * 
 */
Route::get('/', function () {
    return view('pages.home');
})->name('home');

/**
 * 
 */
Route::get('/posts', 'Api\v1\PostsController@getProducts')->name('posts');

Route::get('/posts/{slug}', 'Api\v1\PostsController@getProduct')->name('post.show');

Route::prefix('admin')->group(function () {
    Route::post(
        'post/create',
        'Api\v1\PostsController@createProduct'
    )->name('post.store');
    
    Route::put(
        'post/edit/{id}',
        'Api\v1\PostsController@updateProduct'
    )->name('post.update');

    Route::delete(
        'post/{id}',
        'Api\v1\PostsController@removePost'
    )->name('post.destroy');
});

/**
 * 
 */
Route::get('/videos', 'Api\v1\VideoController@getVideos')->name('videos');

Route::get('/videos/{slug}', 'Api\v1\VideoController@getVideo')->name('video.show');

Route::prefix('admin')->group(function () {
    Route::post(
        'video/create',
        'Api\v1\VideoController@createVideo'
    )->name('video.store');
    
    Route::put(
        'video/edit/{id}',
        'Api\v1\VideoController@updateVideo'
    )->name('video.update');

    Route::delete(
        'video/{id}',
        'Api\v1\VideoController@removeVideo'
    )->name('video.destroy');
});
/**
 * 
 */
Route::get('/reviews', 'Api\v1\ReviewsController@getReviews')->name('reviews');

Route::prefix('admin')->group(function () {
    Route::post(
        'review/create',
        'Api\v1\ReviewsController@createReview'
    )->name('review.store');
    
    Route::put(
        'review/edit/{id}',
        'Api\v1\ReviewsController@updateReview'
    )->name('review.update');

    Route::delete(
        'review/{id}',
        'Api\v1\ReviewsController@removeReview'
    )->name('review.destroy');
});


// Route::prefix('admin')->group(function () {
//     Route::middleware("check")->get('create/{id}', function ($id) {
//         print($id);
//         // $route = Route::current();
//         // echo $route->methods[0];
//         // dd($route);
//         // return redirect()->route('home');
//     })->name('admin.create');
    
//     Route::get('edit', function () {
//         echo 'Edit';
//     });

// });

// Для формирования единых контролеров
// Route::controller('/self', 'Api\v2\PostsController', [
//     /* задать имя маршрута */
//     // 'getIndex' => 'self'
//     // 'getCreate' => 'self.create'
// ]);

Route::fallback(function () {
    return redirect()->route('home');
});