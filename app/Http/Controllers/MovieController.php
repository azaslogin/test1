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
        return response()->redirectToRoute('movie.index')->with('message', 'Movie Created Successfully');
    }
}
