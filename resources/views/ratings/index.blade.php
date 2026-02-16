@extends('layouts.app')

@php
    $tablerows = [
        'tv_show' => 'TV Show',
        'rating_date' => 'Rating Date',
        'rating_value' => 'Rating Value',
        'audience_share' => 'Audience Share',
        'actions' => 'Actions'
    ];
@endphp

@section('content')
    <x-index-page
        header="true"
        title="Ratings"
        actionbutton="true"
        actionbuttonroute="{{ route('ratings.create') }}"
        actionbuttontext="Create New Rating"
        table="true"
        thead="true"
        :theadth="array_values($tablerows)"
        tbody="true"
        :tbodydata="$ratings"
        :tbodyth="array_keys($tablerows)"
    />
@endsection
@extends('layouts.app')

@section('content')
    <h1>Ratings</h1>
    <!-- Add table or list to display ratings -->
@endsection
