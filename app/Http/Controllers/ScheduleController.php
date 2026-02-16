<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Episode;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['tvShow', 'episode'])->paginate(15);
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $episodes = Episode::with('tvShow')->get();
        return view('schedules.create', compact('episodes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'episode_id' => 'required|exists:episodes,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Schedule::create($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $episodes = Episode::with('tvShow')->get();
        return view('schedules.edit', compact('schedule', 'episodes'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'episode_id' => 'required|exists:episodes,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $schedule->update($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}