<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\TvShow;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index()
    {
        $episodes = Episode::with('tvShow')->paginate(15);
        return view('episodes.index', compact('episodes'));
    }

    public function create()
    {
        $tvShows = TvShow::all();
        return view('episodes.create', compact('tvShows'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tv_show_id' => 'required|exists:tv_shows,id',
            'title' => 'required|max:255',
            'episode_number' => 'required|integer',
            'air_date' => 'required|date',
            'duration' => 'required|integer',
            'description' => 'nullable',
        ]);

        Episode::create($validatedData);

        return redirect()->route('episodes.index')->with('success', 'Episode created successfully.');
    }

    public function show(Episode $episode)
    {
        return view('episodes.show', compact('episode'));
    }

    public function edit(Episode $episode)
    {
        $tvShows = TvShow::all();
        return view('episodes.edit', compact('episode', 'tvShows'));
    }

    public function update(Request $request, Episode $episode)
    {
        $validatedData = $request->validate([
            'tv_show_id' => 'required|exists:tv_shows,id',
            'title' => 'required|max:255',
            'episode_number' => 'required|integer',
            'air_date' => 'required|date',
            'duration' => 'required|integer',
            'description' => 'nullable',
        ]);

        $episode->update($validatedData);

        return redirect()->route('episodes.index')->with('success', 'Episode updated successfully.');
    }

    public function destroy(Episode $episode)
    {
        $episode->delete();

        return redirect()->route('episodes.index')->with('success', 'Episode deleted successfully.');
    }
}