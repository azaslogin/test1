<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Redis\CountryRedis;
use App\Redis\GenreRedis;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return response()->view('movie.index',
            ['movies' => $movies]);
    }

    public function movieByGenre(Genre $genre)
    {
        $movies = $genre->movies()->paginate(10);
//        print_r($movies);
//        die;
        return response()->view('movie.index',
            ['movies' => $movies]);
    }

    public function movieByCountry(Country $country)
    {
        $movies = $country->movies()->paginate(10);
//        print_r($movies);
//        die;
        return response()->view('movie.index',
            ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movie $movie
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
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Movie $movie
     * @return RedirectResponse
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->redirectToRoute('movie.index')->with('success', 'Movie Deleted Successfully');
    }
}
