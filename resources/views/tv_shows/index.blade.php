@extends('layouts.app')

@php
    $tablerows = [
        'title' => 'Title',
        'genre' => 'Genre',
        'duration' => 'Duration',
        'air_time' => 'Air Time',
        'status' => 'Status',
        'actions' => 'Actions'
    ];
@endphp

@section('content')
    <x-index-page
        header="true"
        title="TV Shows"
        actionbutton="true"
        actionbuttonroute="{{ route('tv_shows.create') }}"
        actionbuttontext="Add New Show"
        table="true"
        thead="true"
        :theadth="array_values($tablerows)"
        tbody="true"
        :tbodydata="$tvShows"
        :tbodyth="array_keys($tablerows)"
    />
@endsection
@extends('layouts.app')

@section('content')
    <h1>TV Shows</h1>
    <!-- Add table or list to display TV shows -->
@endsection
