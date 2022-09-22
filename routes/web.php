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

Route::get('/', function () {
    $arr=["Technology", "Automotive", "Finance", "Politics", "Culture", "Sports"];
    return view('welcome');
});

Route::get('/about', function () {
    return view('partials.about');
});

