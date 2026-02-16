@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Advertisement</h1>

    <form action="{{ route('advertisements.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="advertiser_id" class="form-label">Advertiser</label>
            <select class="form-control" id="advertiser_id" name="advertiser_id" required>
                @foreach($advertisers as $advertiser)
                    <option value="{{ $advertiser->id }}">{{ $advertiser->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (seconds)</label>
            <input type="number" class="form-control" id="duration" name="duration" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Advertisement</button>
        <a href="{{ route('advertisements.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Create Advertisement</h1>
    <!-- Add form to create advertisement -->
@endsection
