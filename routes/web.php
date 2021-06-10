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

Route::get('/', function () {
    return view('pages.home');
})->name('home');


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


Route::get('/video', function () {
    return view('pages.video');
})->name('video');


Route::get('/video/{slug}', function () {
    return view('pages.single-video');
})->name('single-video');





Route::get('/reviews', function () {
    return view('pages.reviews');
})->name('reviews');


Route::prefix('admin')->group(function () {
    Route::middleware("check")->get('create/{id}', function ($id) {
        print($id);
        // $route = Route::current();
        // echo $route->methods[0];
        // dd($route);
        // return redirect()->route('home');
    })->name('admin.create');
    
    Route::get('edit', function () {
        echo 'Edit';
    });

});

// Для формирования единых контролеров
// Route::controller('/self', 'Api\v2\PostsController', [
//     /* задать имя маршрута */
//     // 'getIndex' => 'self'
//     // 'getCreate' => 'self.create'
// ]);

Route::fallback(function () {
    return redirect()->route('home');
});