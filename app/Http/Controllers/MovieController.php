<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return response()->view('movie.index',
            ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->view('movie.create');
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
            'duration' => 'required'
        ]);
        Movie::create($validated);
        return response()->redirectToRoute('movie.index')->with('success', 'Movie Created Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return response()->view('movie.edit', ['movie' => $movie]);
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
            'duration' => 'required'
        ]);
        $movie->fill($validated);
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
