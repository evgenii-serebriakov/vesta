<?php

use Illuminate\Support\Facades\Route;

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
/**
 * Redirect on index.php
 */
Route::get('{path}', function () {
    return view('index');
})->where('path', '(.*)');

// Route::get('/', function () {
//     return view('index');
// })->name('index');

// Route::get('/{any}', 'HomeController@vueroute')->where('any', '(.*)');

// Route::get('/{any}', function () {
//     return view('index');
// })->where('any', '(.*)');

