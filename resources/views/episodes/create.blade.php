@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Create New Episode</h1>

    <form action="{{ route('episodes.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
        </div>

        <div class="mb-4">
            <label for="air_date" class="block text-sm font-medium text-gray-700">Air Date</label>
            <input type="date" name="air_date" id="air_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="tv_show_id" class="block text-sm font-medium text-gray-700">TV Show</label>
            <select name="tv_show_id" id="tv_show_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="">Select a TV Show</option>
                @foreach($tvShows as $tvShow)
                    <option value="{{ $tvShow->id }}">{{ $tvShow->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Create Episode
            </button>
        </div>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Create Episode</h1>
    <!-- Add form to create episode -->
@endsection
