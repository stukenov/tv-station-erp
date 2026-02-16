@extends('layouts.app')

@section('content')
    <h1>Employee Benefits Management</h1>
    <a href="{{ route('benefits.create') }}">Add Benefit</a>
    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($benefits as $benefit)
                <tr>
                    <td>{{ $benefit->employee->name }}</td>
                    <td>{{ $benefit->type }}</td>
                    <td>{{ $benefit->start_date }}</td>
                    <td>{{ $benefit->end_date }}</td>
                    <td>{{ $benefit->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection