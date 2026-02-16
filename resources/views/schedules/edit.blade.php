@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Schedule</h1>

    <form action="{{ route('schedules.update', $schedule) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="episode_id" class="block text-sm font-medium text-gray-700">Episode</label>
            <select name="episode_id" id="episode_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @foreach($episodes as $episode)
                    <option value="{{ $episode->id }}" {{ $schedule->episode_id == $episode->id ? 'selected' : '' }}>
                        {{ $episode->title }} ({{ $episode->tvShow->title }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" value="{{ $schedule->start_time->format('Y-m-d\TH:i') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" value="{{ $schedule->end_time->format('Y-m-d\TH:i') }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('schedules.show', $schedule) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">
                Cancel
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Update Schedule
            </button>
        </div>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Edit Schedule</h1>
    <!-- Add form to edit schedule -->
@endsection
