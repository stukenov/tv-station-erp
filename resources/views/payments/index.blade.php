@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Payments</h1>
    <a href="{{ route('payments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Payment</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Invoice</th>
                    <th class="py-2">Amount</th>
                    <th class="py-2">Payment Date</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td class="py-2">{{ $payment->invoice->id }}</td>
                    <td class="py-2">{{ $payment->amount }}</td>
                    <td class="py-2">{{ $payment->payment_date }}</td>
                    <td class="py-2">
                        <a href="{{ route('payments.edit', $payment->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="inline-block">
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
