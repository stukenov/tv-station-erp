<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $taxes = Tax::all();
        return view('taxes.index', compact('taxes'));
    }

    public function create()
    {
        return view('taxes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric',
        ]);

        Tax::create($request->all());
        return redirect()->route('taxes.index')->with('success', 'Tax created successfully.');
    }

    public function show(Tax $tax)
    {
        return view('taxes.show', compact('tax'));
    }

    public function edit(Tax $tax)
    {
        return view('taxes.edit', compact('tax'));
    }

    public function update(Request $request, Tax $tax)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required|numeric',
        ]);

        $tax->update($request->all());
        return redirect()->route('taxes.index')->with('success', 'Tax updated successfully.');
    }

    public function destroy(Tax $tax)
    {
        $tax->delete();
        return redirect()->route('taxes.index')->with('success', 'Tax deleted successfully.');
    }
}
