@extends('layouts.app')


@php
    $tablerows = [
        'name' => 'Name',
        'contact_person' => 'Contact Person',
        'email' => 'Email',
        'phone' => 'Phone',
        'actions' => 'Actions'
    ];
@endphp

@section('content')
    <x-index-page
        header="true"
        title="Advertiser"
        actionbutton="true"
        actionbuttonroute="{{ route('advertisers.create') }}"
        actionbuttontext="Add New Advertiser"
        table="true"
        thead="true"
        :theadth="array_values($tablerows)"
        tbody="true"
        :tbodydata="$advertisers"
        :tbodyth="array_keys($tablerows)"
    />

@endsection
@extends('layouts.app')

@section('content')
    <h1>Advertisers</h1>
    <!-- Add table or list to display advertisers -->
@endsection
