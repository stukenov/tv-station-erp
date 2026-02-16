@extends('layouts.app')

@php
    $tablerows = [
        'name' => 'Name',
        'position' => 'Position',
        'email' => 'Email',
        'status' => 'Status',
        'actions' => 'Actions'
    ];
@endphp

@section('content')
    <x-index-page
        header="true"
        title="Staff"
        actionbutton="true"
        actionbuttonroute="{{ route('staff.create') }}"
        actionbuttontext="Add New Staff"
        table="true"
        thead="true"
        :theadth="array_values($tablerows)"
        tbody="true"
        :tbodydata="$staff"
        :tbodyth="array_keys($tablerows)"
    />
@endsection
@extends('layouts.app')

@section('content')
    <h1>Staff</h1>
    <!-- Add table or list to display staff members -->
@endsection
