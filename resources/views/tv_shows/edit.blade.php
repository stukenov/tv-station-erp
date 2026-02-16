@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="px-8 py-6 bg-gradient-to-r from-blue-500 to-blue-600">
            <h1 class="text-3xl font-semibold text-white">Edit TV Show</h1>
        </div>
        <form action="{{ route('tv_shows.update', $tvShow) }}" method="POST" class="p-8">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" value="{{ $tvShow->title }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ $tvShow->description }}</textarea>
                </div>
                <div>
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                    <input type="text" id="genre" name="genre" value="{{ $tvShow->genre }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                    <input type="number" id="duration" name="duration" value="{{ $tvShow->duration }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="air_time" class="block text-sm font-medium text-gray-700">Air Time</label>
                    <input type="time" id="air_time" name="air_time" value="{{ $tvShow->air_time }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="active" {{ $tvShow->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $tvShow->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="cancelled" {{ $tvShow->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="mt-8">
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-md transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update TV Show
                </button>
            </div>
        </form>
    </div>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Edit TV Show</h1>
    <!-- Add form to edit TV show -->
@endsection
