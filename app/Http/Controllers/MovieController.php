<?php

/**
 * hello world
 */

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Redis\CountryRedis;
use App\Redis\GenreRedis;
use App\Redis\MovieRedis;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * @param MovieRedis $movieRedis
     * @return Response
     */
    public function index(MovieRedis $movieRedis): Response
    {
        $movies = $movieRedis->getMoviesByTitle();
        return response()->view(
            'movie.index',
            [
                'movies' => $movies,
                'is_authorized' => Auth::check()
            ]
        );
    }

    /**
     * @param Genre $genre
     * @return Response
     */
    public function movieByGenre(Genre $genre)
    {
        $movies = $genre->movies()->paginate(10);
        return response()->view(
            'movie.index',
            ['movies' => $movies]
        );
    }

    /**
     * @param Country $country
     * @return Response
     */
    public function movieByCountry(Country $country)
    {
        $movies = $country->movies()->paginate(10);
        return response()->view(
            'movie.index',
            ['movies' => $movies]
        );
    }

    /**
     * @param GenreRedis $genreRedis
     * @param CountryRedis $countryRedis
     * @return Response
     */
    public function create(GenreRedis $genreRedis, CountryRedis $countryRedis): Response
    {
        $genres = $genreRedis->getGenresByTitle();
        $countries = $countryRedis->getCountriesByTitle();

        return response()->view('movie.create', [
            'genres' => $genres,
            'countries' => $countries
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|integer|min:1900',
            'duration' => 'required',

            'genre-id' => 'required|array',
            'genre-id.*' => 'integer',
            'country-id' => 'required|array',
            'country-id.*' => 'integer'
        ]);
        $movie = Movie::create($validated);

        $movie->genres()->attach($validated['genre-id']);

        $movie->countries()->attach($validated['country-id']);

        return response()->redirectToRoute('movie.index')->with('success', 'Movie Created Successfully');
    }

    /**
     * @param Movie $movie
     * @param GenreRedis $genreRedis
     * @param CountryRedis $countryRedis
     * @return Response
     */
    public function edit(Movie $movie, GenreRedis $genreRedis, CountryRedis $countryRedis): Response
    {
        $genres = $genreRedis->getGenresByTitle();
        $countries = $countryRedis->getCountriesByTitle();
        return response()->view('movie.edit', [
            'movie' => $movie,
            'genres' => $genres,
            'countries' => $countries
        ]);
    }

    /**
     * @param Request $request
     * @param Movie $movie
     * @return RedirectResponse
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|integer|min:1900',
            'duration' => 'required',

            'genre-id' => 'required|array',
            'genre-id.*' => 'integer',
            'country-id' => 'required|array',
            'country-id.*' => 'integer'
        ]);
        $movie->fill($validated);

        $movie->genres()->sync($validated['genre-id']);

        $movie->countries()->sync($validated['country-id']);

        $movie->save();
        return response()->redirectToRoute('movie.index')->with('success', 'Movie Updated Successfully');
    }

    /**
     * @param Movie $movie
     * @return RedirectResponse
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->redirectToRoute('movie.index')->with('success', 'Movie Deleted Successfully');
    }
}
