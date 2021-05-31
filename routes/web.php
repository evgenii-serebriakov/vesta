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

Route::get('/', [PostsController::class, 'getProducts'])->name('home');


Route::get('/posts', function () {
    return view('pages.posts');
})->name('posts');


Route::get('/posts/{slug}', function ($slug) {
    return view('pages.single-post', [
        'slug' => $slug,
        'post' => ''
        ]);
})->name('single-post');


Route::get('/video', function () {
    return view('pages.video');
})->name('video');


Route::get('/video/{slug}', function () {
    return view('pages.single-video');
})->name('single-video');





Route::get('/reviews', function () {
    return view('pages.reviews');
})->name('reviews');
