@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Expenses</h1>
    <a href="{{ route('expenses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Expense</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Description</th>
                    <th class="py-2">Amount</th>
                    <th class="py-2">Expense Date</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                <tr>
                    <td class="py-2">{{ $expense->description }}</td>
                    <td class="py-2">{{ $expense->amount }}</td>
                    <td class="py-2">{{ $expense->expense_date }}</td>
                    <td class="py-2">
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="inline-block">
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
