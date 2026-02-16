<?php

namespace App\Http\Controllers;

use App\Models\TvShow;
use Illuminate\Http\Request;

class TvShowController extends Controller
{
    public function index()
    {
        $tvShows = TvShow::all();
        return view('tv_shows.index', compact('tvShows'));
    }

    public function create()
    {
        return view('tv_shows.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'genre' => 'required|max:255',
            'duration' => 'required|integer',
            'air_time' => 'required|date_format:H:i',
            'status' => 'required|in:active,inactive,cancelled',
        ]);

        TvShow::create($validatedData);

        return redirect()->route('tv_shows.index')->with('success', 'TV Show created successfully.');
    }

    public function show(TvShow $tvShow)
    {
        return view('tv_shows.show', compact('tvShow'));
    }

    public function edit(TvShow $tvShow)
    {
        return view('tv_shows.edit', compact('tvShow'));
    }

    public function update(Request $request, TvShow $tvShow)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'genre' => 'required|max:255',
            'duration' => 'required|integer',
            'air_time' => 'required|date_format:H:i',
            'status' => 'required|in:active,inactive,cancelled',
        ]);

        $tvShow->update($validatedData);

        return redirect()->route('tv_shows.index')->with('success', 'TV Show updated successfully.');
    }

    public function destroy(TvShow $tvShow)
    {
        $tvShow->delete();

        return redirect()->route('tv_shows.index')->with('success', 'TV Show deleted successfully.');
    }
}