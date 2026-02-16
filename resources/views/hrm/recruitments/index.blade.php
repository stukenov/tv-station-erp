@extends('layouts.app')

@section('content')
    <h1>Recruitment Management</h1>
    <a href="{{ route('recruitments.create') }}">Add Recruitment</a>
    <table>
        <thead>
            <tr>
                <th>Position</th>
                <th>Application Date</th>
                <th>Status</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recruitments as $recruitment)
                <tr>
                    <td>{{ $recruitment->position }}</td>
                    <td>{{ $recruitment->application_date }}</td>
                    <td>{{ $recruitment->status }}</td>
                    <td>{{ $recruitment->notes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection