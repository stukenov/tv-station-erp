@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Contacts</h1>
    <a href="{{ route('contacts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Contact</a>
    <div class="mt-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Name</th>
                    <th class="py-2">Email</th>
                    <th class="py-2">Phone</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td class="py-2">{{ $contact->name }}</td>
                    <td class="py-2">{{ $contact->email }}</td>
                    <td class="py-2">{{ $contact->phone }}</td>
                    <td class="py-2">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline-block">
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
