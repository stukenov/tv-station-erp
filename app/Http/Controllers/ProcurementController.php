<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procurement;

class ProcurementController extends Controller
{
    public function index()
    {
        $procurements = Procurement::all();
        return view('procurements.index', compact('procurements'));
    }

    public function create()
    {
        return view('procurements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'procurement_date' => 'required|date',
        ]);

        Procurement::create($request->all());
        return redirect()->route('procurements.index')->with('success', 'Procurement record created successfully.');
    }

    public function show(Procurement $procurement)
    {
        return view('procurements.show', compact('procurement'));
    }

    public function edit(Procurement $procurement)
    {
        return view('procurements.edit', compact('procurement'));
    }

    public function update(Request $request, Procurement $procurement)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'procurement_date' => 'required|date',
        ]);

        $procurement->update($request->all());
        return redirect()->route('procurements.index')->with('success', 'Procurement record updated successfully.');
    }

    public function destroy(Procurement $procurement)
    {
        $procurement->delete();
        return redirect()->route('procurements.index')->with('success', 'Procurement record deleted successfully.');
    }
}
