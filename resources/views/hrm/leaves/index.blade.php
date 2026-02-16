@extends('layouts.app')

@section('content')
    <h1>Leave Management</h1>
    <a href="{{ route('leaves.create') }}">Apply for Leave</a>
    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Type</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->employee->name }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->type }}</td>
                    <td>{{ $leave->reason }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection