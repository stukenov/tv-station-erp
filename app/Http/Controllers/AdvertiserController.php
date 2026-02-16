<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    public function index()
    {
        $advertisers = Advertiser::paginate(15);
        return view('advertisers.index', compact('advertisers'));
    }

    public function create()
    {
        return view('advertisers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'contact_person' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'address' => 'required',
        ]);

        Advertiser::create($validatedData);

        return redirect()->route('advertisers.index')->with('success', 'Advertiser created successfully.');
    }

    public function show(Advertiser $advertiser)
    {
        return view('advertisers.show', compact('advertiser'));
    }

    public function edit(Advertiser $advertiser)
    {
        return view('advertisers.edit', compact('advertiser'));
    }

    public function update(Request $request, Advertiser $advertiser)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'contact_person' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'address' => 'required',
        ]);

        $advertiser->update($validatedData);

        return redirect()->route('advertisers.index')->with('success', 'Advertiser updated successfully.');
    }

    public function destroy(Advertiser $advertiser)
    {
        $advertiser->delete();

        return redirect()->route('advertisers.index')->with('success', 'Advertiser deleted successfully.');
    }
}