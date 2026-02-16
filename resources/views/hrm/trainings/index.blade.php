@extends('layouts.app')

@section('content')
    <h1>Training Management</h1>
    <a href="{{ route('trainings.create') }}">Add Training</a>
    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trainings as $training)
                <tr>
                    <td>{{ $training->employee->name }}</td>
                    <td>{{ $training->title }}</td>
                    <td>{{ $training->start_date }}</td>
                    <td>{{ $training->end_date }}</td>
                    <td>{{ $training->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection