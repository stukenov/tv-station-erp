@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Episode</h1>

    <form action="{{ route('episodes.update', $episode) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $episode->title) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="tv_show_id" class="block text-sm font-medium text-gray-700">TV Show</label>
            <select name="tv_show_id" id="tv_show_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @foreach($tvShows as $tvShow)
                    <option value="{{ $tvShow->id }}" {{ old('tv_show_id', $episode->tv_show_id) == $tvShow->id ? 'selected' : '' }}>
                        {{ $tvShow->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="episode_number" class="block text-sm font-medium text-gray-700">Episode Number</label>
            <input type="number" name="episode_number" id="episode_number" value="{{ old('episode_number', $episode->episode_number) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="air_date" class="block text-sm font-medium text-gray-700">Air Date</label>
            <input type="date" name="air_date" id="air_date" value="{{ old('air_date', $episode->air_date->format('Y-m-d')) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
            <input type="number" name="duration" id="duration" value="{{ old('duration', $episode->duration) }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description', $episode->description) }}</textarea>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('episodes.show', $episode) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2">
                Cancel
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Update Episode
            </button>
        </div>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Edit Episode</h1>
    <!-- Add form to edit episode -->
@endsection
