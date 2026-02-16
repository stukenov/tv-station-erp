@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Inventories</h1>
    <a href="{{ route('inventories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Inventory</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Quantity</th>
                    <th class="py-2">Price</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventories as $inventory)
                <tr>
                    <td class="py-2">{{ $inventory->name }}</td>
                    <td class="py-2">{{ $inventory->quantity }}</td>
                    <td class="py-2">{{ $inventory->price }}</td>
                    <td class="py-2">
                        <a href="{{ route('inventories.edit', $inventory->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" class="inline-block">
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
