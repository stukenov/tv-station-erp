@extends('layouts.app')

@section('content')
    <h1>Performance Reviews</h1>
    <a href="{{ route('performance_reviews.create') }}">Add Performance Review</a>
    <table>
        <thead>
            <tr>
                <th>Employee</th>
                <th>Review Date</th>
                <th>Comments</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($performance_reviews as $review)
                <tr>
                    <td>{{ $review->employee->name }}</td>
                    <td>{{ $review->review_date }}</td>
                    <td>{{ $review->comments }}</td>
                    <td>{{ $review->rating }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection