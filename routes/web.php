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
Route::get('/{any}', function () {
    return view('index');
})->where('any', '(.*)');

// Route::get('/', function () {
//     return view('index');
// })->name('index');

// Route::get('/{any}', 'HomeController@vueroute')->where('any', '(.*)');
