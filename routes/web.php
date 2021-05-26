<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.home.home', [
        'title' => 'The current UNIX timestamp',
        'list' => ['a' => 3, 'b' => 7,'c' => 3, 'd' => 4]
    ]);
})->name('home');


Route::get('/video', function () {
    return view('video');
})->name('video');

Route::get('/video/123', function () {
    return view('single-video');
})->name('single-video');

Route::get('/posts', function () {
    return view('posts');
})->name('posts');

Route::get('/posts/123', function () {
    return view('single-post');
})->name('single-post');

Route::get('/reviews', function () {
    return view('reviews');
})->name('reviews');

// Route::get('/{any}', 'HomeController@vueroute')->where('any', '(.*)');
