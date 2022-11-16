<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenreMovie;
use App\Models\Movie;
use App\Models\Genre;

class MovieByGenreController extends Controller
{
    public function index(Request $request) {
        
        $id = $_SERVER['QUERY_STRING'];

        $movie_ids = GenreMovie::whereIn('genre_id', [$id])->get('movie_id');
        
        $movies = Movie::whereIn('id', $movie_ids)->get();

        $genre = Genre::whereIn('id', [$id])->get();
        
        return response()->view('genre.moviebygenre', ['movies' => $movies, 'genre' => $genre]);
    }
}
