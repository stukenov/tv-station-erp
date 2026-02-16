@extends('layouts.app')

@section('content')
    <h1>Payroll Management</h1>
    <a href="{{ route('payrolls.create') }}">Add Payroll</a>
    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Pay Date</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->employee->name }}</td>
                    <td>{{ $payroll->pay_date }}</td>
                    <td>{{ $payroll->amount }}</td>
                    <td>{{ $payroll->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection