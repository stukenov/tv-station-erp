@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Campaigns</h1>
    <a href="{{ route('campaigns.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Campaign</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Start Date</th>
                    <th class="py-2">End Date</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaigns as $campaign)
                <tr>
                    <td class="py-2">{{ $campaign->name }}</td>
                    <td class="py-2">{{ $campaign->start_date }}</td>
                    <td class="py-2">{{ $campaign->end_date }}</td>
                    <td class="py-2">
                        <a href="{{ route('campaigns.edit', $campaign->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
