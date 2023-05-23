<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MovieByGenreController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/Automotive', [PagesController::class, 'automotive'])->name('automotive');

Route::get('/culture', [PagesController::class, 'culture'])->name('culture');

Route::resource('genre', GenreController::class)->middleware('is_weekday');

Route::resource('movie', MovieController::class);

Route::get('movie/genre/{genre}', [MovieController::class, 'movieByGenre'])->name('movie-by-genre');

Route::get('movie/country/{country}', [MovieController::class, 'movieByCountry'])->name('movie-by-country');

Route::resource('country', CountryController::class);

Route::get('moviebygenre/index/{id}', [MovieByGenreController::class, 'index'])->name('moviebygenre.index');

Route::get('/user/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
