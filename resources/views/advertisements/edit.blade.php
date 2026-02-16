@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Advertisement</h1>

    <form action="{{ route('advertisements.update', $advertisement) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="advertiser_id" class="form-label">Advertiser</label>
            <select class="form-control" id="advertiser_id" name="advertiser_id" required>
                @foreach($advertisers as $advertiser)
                    <option value="{{ $advertiser->id }}" {{ $advertisement->advertiser_id == $advertiser->id ? 'selected' : '' }}>
                        {{ $advertiser->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $advertisement->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{ old('content', $advertisement->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (seconds)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $advertisement->duration) }}" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $advertisement->start_date->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $advertisement->end_date->format('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Advertisement</button>
        <a href="{{ route('advertisements.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Edit Advertisement</h1>
    <!-- Add form to edit advertisement -->
@endsection
