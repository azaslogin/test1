<?php

use Illuminate\Http\Request;
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
    return view('pages.home', [
        'nav' => ["Technology", "Automotive", "Finance", "Politics", "Culture", "Sports"]
    ]);
})->name('home');

Route::match(['get', 'post'], '/about-us', function (Request $request)  {
    print_r($request->post('lastname'));
    return view('pages.about');
})->name('about');

Route::redirect('/mouse', '/about');

Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
});

