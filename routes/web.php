<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\PostsController;

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

Route::get('/', [PostsController::class, 'index'])->name('home');

// Route::get('/', function (Request $request) {
//     // dd($request);

//     return view('pages.home.home', [
//         'title' => 'The current UNIX timestamp',
//         'list' => ['a' => 3, 'b' => 7,'c' => 3, 'd' => 4]
//     ]);
// })->name('home');


Route::get('/video', function () {
    return view('pages.video');
})->name('video');


Route::get('/video/123', function () {
    return view('pages.single-video');
})->name('single-video');


Route::get('/posts', function () {
    return view('pages.posts');
})->name('posts');


Route::get('/posts/{slug}', function () {
    return view('pages.single-post');
})->name('single-post');


Route::get('/reviews', function () {
    return view('pages.reviews');
})->name('reviews');
