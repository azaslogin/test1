<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::paginate(15);
        return response()->view('genre.index',
            ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('genre.create');
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
        ]);
        Genre::create($validated);
        return response()->redirectToRoute('genre.index')->with('message', 'Genre Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return response()->view('genre.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Genre $genre
     * @return RedirectResponse
     */
    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $genre->fill($validated);
        $genre->save();
        return response()->redirectToRoute('genre.index')->with('message', 'Genre Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Genre $genre
     * @return RedirectResponse
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->redirectToRoute('genre.index')->with('message', 'Genre Deleted Successfully');
    }
}
