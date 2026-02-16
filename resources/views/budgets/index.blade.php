@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Budgets</h1>
    <a href="{{ route('budgets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Budget</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Amount</th>
                    <th class="py-2">Start Date</th>
                    <th class="py-2">End Date</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($budgets as $budget)
                <tr>
                    <td class="py-2">{{ $budget->name }}</td>
                    <td class="py-2">{{ $budget->amount }}</td>
                    <td class="py-2">{{ $budget->start_date }}</td>
                    <td class="py-2">{{ $budget->end_date }}</td>
                    <td class="py-2">
                        <a href="{{ route('budgets.edit', $budget->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST" class="inline-block">
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
