<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Advertiser;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::with('advertiser')->paginate(15);
        return view('advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        $advertisers = Advertiser::all();
        return view('advertisements.create', compact('advertisers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'advertiser_id' => 'required|exists:advertisers,id',
            'title' => 'required|max:255',
            'content' => 'required',
            'duration' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Advertisement::create($validatedData);

        return redirect()->route('advertisements.index')->with('success', 'Advertisement created successfully.');
    }

    public function show(Advertisement $advertisement)
    {
        return view('advertisements.show', compact('advertisement'));
    }

    public function edit(Advertisement $advertisement)
    {
        $advertisers = Advertiser::all();
        return view('advertisements.edit', compact('advertisement', 'advertisers'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $validatedData = $request->validate([
            'advertiser_id' => 'required|exists:advertisers,id',
            'title' => 'required|max:255',
            'content' => 'required',
            'duration' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $advertisement->update($validatedData);

        return redirect()->route('advertisements.index')->with('success', 'Advertisement updated successfully.');
    }

    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();

        return redirect()->route('advertisements.index')->with('success', 'Advertisement deleted successfully.');
    }
}