@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Taxes</h1>
    <a href="{{ route('taxes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Tax</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Rate</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taxes as $tax)
                <tr>
                    <td class="py-2">{{ $tax->name }}</td>
                    <td class="py-2">{{ $tax->rate }}%</td>
                    <td class="py-2">
                        <a href="{{ route('taxes.edit', $tax->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('taxes.destroy', $tax->id) }}" method="POST" class="inline-block">
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
