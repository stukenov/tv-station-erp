@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Advertiser Details</h1>
    
    <div class="bg-white shadow-md rounded p-6">
        <h2 class="text-xl font-semibold mb-4">{{ $advertiser->name }}</h2>
        <p class="mb-2"><strong>Contact Person:</strong> {{ $advertiser->contact_person }}</p>
        <p class="mb-2"><strong>Email:</strong> {{ $advertiser->email }}</p>
        <p class="mb-2"><strong>Phone:</strong> {{ $advertiser->phone }}</p>
    </div>
    
    <div class="mt-4">
        <a href="{{ route('advertisers.edit', $advertiser) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        <form action="{{ route('advertisers.destroy', $advertiser) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        <a href="{{ route('advertisers.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
    </div>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Advertiser Details</h1>
    <!-- Add details of the advertiser -->
@endsection
