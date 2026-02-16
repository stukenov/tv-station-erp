<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\TvShow;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('tvShow')->paginate(15);
        return view('ratings.index', compact('ratings'));
    }

    public function create()
    {
        $tvShows = TvShow::all();
        return view('ratings.create', compact('tvShows'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tv_show_id' => 'required|exists:tv_shows,id',
            'date' => 'required|date',
            'viewers' => 'required|integer',
            'rating_value' => 'required|numeric|between:0,10',
            'audience_share' => 'required|numeric|between:0,100',
        ]);

        Rating::create($validatedData);

        return redirect()->route('ratings.index')->with('success', 'Rating created successfully.');
    }

    public function show(Rating $rating)
    {
        return view('ratings.show', compact('rating'));
    }

    public function edit(Rating $rating)
    {
        $tvShows = TvShow::all();
        return view('ratings.edit', compact('rating', 'tvShows'));
    }

    public function update(Request $request, Rating $rating)
    {
        $validatedData = $request->validate([
            'tv_show_id' => 'required|exists:tv_shows,id',
            'date' => 'required|date',
            'viewers' => 'required|integer',
            'rating_value' => 'required|numeric|between:0,10',
            'audience_share' => 'required|numeric|between:0,100',
        ]);

        $rating->update($validatedData);

        return redirect()->route('ratings.index')->with('success', 'Rating updated successfully.');
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();

        return redirect()->route('ratings.index')->with('success', 'Rating deleted successfully.');
    }
}