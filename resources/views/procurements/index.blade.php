@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Procurements</h1>
    <a href="{{ route('procurements.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Procurement</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Item Name</th>
                    <th class="py-2">Quantity</th>
                    <th class="py-2">Price</th>
                    <th class="py-2">Procurement Date</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($procurements as $procurement)
                <tr>
                    <td class="py-2">{{ $procurement->item_name }}</td>
                    <td class="py-2">{{ $procurement->quantity }}</td>
                    <td class="py-2">{{ $procurement->price }}</td>
                    <td class="py-2">{{ $procurement->procurement_date }}</td>
                    <td class="py-2">
                        <a href="{{ route('procurements.edit', $procurement->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('procurements.destroy', $procurement->id) }}" method="POST" class="inline-block">
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
