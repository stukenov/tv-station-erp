@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Rating</h1>

    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tv_show_id" class="form-label">TV Show</label>
            <select class="form-control" id="tv_show_id" name="tv_show_id" required>
                @foreach($tvShows as $tvShow)
                    <option value="{{ $tvShow->id }}">{{ $tvShow->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="rating_date" class="form-label">Rating Date</label>
            <input type="date" class="form-control" id="rating_date" name="rating_date" required>
        </div>

        <div class="mb-3">
            <label for="rating_value" class="form-label">Rating Value</label>
            <input type="number" class="form-control" id="rating_value" name="rating_value" step="0.1" min="0" max="10" required>
        </div>

        <div class="mb-3">
            <label for="audience_share" class="form-label">Audience Share (%)</label>
            <input type="number" class="form-control" id="audience_share" name="audience_share" step="0.01" min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Rating</button>
        <a href="{{ route('ratings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Create Rating</h1>
    <!-- Add form to create rating -->
@endsection
