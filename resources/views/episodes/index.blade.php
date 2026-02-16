@extends('layouts.app')

@php
    $tablerows = [
        'title' => 'Title',
        'tv_show' => 'TV Show',
        'episode_number' => 'Episode Number',
        'duration' => 'Duration',
        'air_date' => 'Air Date',
        'actions' => 'Actions'
    ];
@endphp

@section('content')
    <x-index-page
        header="true"
        title="Episodes"
        actionbutton="true"
        actionbuttonroute="{{ route('episodes.create') }}"
        actionbuttontext="Add New Episode"
        table="true"
        thead="true"
        :theadth="array_values($tablerows)"
        tbody="true"
        :tbodydata="$episodes"
        :tbodyth="array_keys($tablerows)"
    />
@endsection
@extends('layouts.app')

@section('content')
    <h1>Episodes</h1>
    <!-- Add table or list to display episodes -->
@endsection
