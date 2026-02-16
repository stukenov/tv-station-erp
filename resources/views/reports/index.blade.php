@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Reports</h1>
    <a href="{{ route('reports.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Report</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Title</th>
                    <th class="py-2">Description</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <td class="py-2">{{ $report->title }}</td>
                    <td class="py-2">{{ $report->description }}</td>
                    <td class="py-2">
                        <a href="{{ route('reports.edit', $report->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" class="inline-block">
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
