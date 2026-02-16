@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Invoices</h1>
    <a href="{{ route('invoices.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Invoice</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Customer</th>
                    <th class="py-2">Amount</th>
                    <th class="py-2">Invoice Date</th>
                    <th class="py-2">Due Date</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr>
                    <td class="py-2">{{ $invoice->customer->name }}</td>
                    <td class="py-2">{{ $invoice->amount }}</td>
                    <td class="py-2">{{ $invoice->invoice_date }}</td>
                    <td class="py-2">{{ $invoice->due_date }}</td>
                    <td class="py-2">
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="inline-block">
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
