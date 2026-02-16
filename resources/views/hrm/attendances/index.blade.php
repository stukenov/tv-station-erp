@extends('layouts.app')

@section('content')
    <h1>Attendance Management</h1>
    <a href="{{ route('attendances.create') }}">Add Attendance</a>
    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Check In</th>
                <th>Check Out</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->employee->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->check_in }}</td>
                    <td>{{ $attendance->check_out }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection