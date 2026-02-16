@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Assets</h1>
    <a href="{{ route('assets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Asset</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Value</th>
                    <th class="py-2">Purchase Date</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                <tr>
                    <td class="py-2">{{ $asset->name }}</td>
                    <td class="py-2">{{ $asset->value }}</td>
                    <td class="py-2">{{ $asset->purchase_date }}</td>
                    <td class="py-2">
                        <a href="{{ route('assets.edit', $asset->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" class="inline-block">
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
