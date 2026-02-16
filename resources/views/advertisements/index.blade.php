@extends('layouts.app')


@php
    $tablerows = [
        'title' => 'Title',
        'advertiser' => 'Advertiser',
        'status' => 'Status',
        'start_date' => 'Start Date',
        'end_date' => 'End Date',
        'actions' => 'Actions'
    ];
@endphp

@section('content')
    <x-index-page
        header="true"
        title="Advertisements"
        actionbutton="true"
        actionbuttonroute="{{ route('advertisements.create') }}"
        actionbuttontext="New Advertisement"
        table="true"
        thead="true"
        :theadth="array_values($tablerows)"
        tbody="true"
        :tbodydata="$advertisements"
        :tbodyth="array_keys($tablerows)"
    />

@endsection
@extends('layouts.app')

@section('content')
    <h1>Advertisements</h1>
    <!-- Add table or list to display advertisements -->
@endsection
