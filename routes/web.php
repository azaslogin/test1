<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PagesController;
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


Route::get('/',[PagesController::class, 'home'])->name('home');

Route::get('/about',[PagesController::class, 'about'])->name('about');

Route::get('/Automotive',[PagesController::class, 'automotive'])->name('automotive');

Route::get('/culture',[PagesController::class, 'culture'])->name('culture');

Route::resource('genre', GenreController::class);

Route::resource('movie', MovieController::class);

Route::resource('country', CountryController::class);

Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});
