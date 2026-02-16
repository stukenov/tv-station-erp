@extends('layouts.app')

@php
    $tablerows = [
        'tv_show' => 'TV Show',
        'episode' => 'Episode',
        'start_time' => 'Start Time',
        'end_time' => 'End Time',
        'day_of_week' => 'Day of Week',
        'actions' => 'Actions'
    ];
@endphp

@section('content')
    <x-index-page
        header="true"
        title="Schedules"
        actionbutton="true"
        actionbuttonroute="{{ route('schedules.create') }}"
        actionbuttontext="Create New Schedule"
        table="true"
        thead="true"
        :theadth="array_values($tablerows)"
        tbody="true"
        :tbodydata="$schedules"
        :tbodyth="array_keys($tablerows)"
    />
@endsection
@extends('layouts.app')

@section('content')
    <h1>Schedules</h1>
    <!-- Add table or list to display schedules -->
@endsection
