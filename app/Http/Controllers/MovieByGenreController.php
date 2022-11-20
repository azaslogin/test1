<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenreMovie;
use App\Models\Movie;
use App\Models\Genre;

class MovieByGenreController extends Controller
{
    public function index(int $id)
    {

        $movie_ids = GenreMovie::whereIn('genre_id', [$id])->get('movie_id');

        $movies = Movie::whereIn('id', $movie_ids)->get();

        $genre = Genre::find($id);

        return response()->view('genre.moviebygenre', ['movies' => $movies, 'genre' => $genre]);
    }
}
