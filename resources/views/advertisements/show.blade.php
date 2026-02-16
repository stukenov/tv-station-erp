@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Advertisement Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $advertisement->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Advertiser: {{ $advertisement->advertiser->name }}</h6>
            <p class="card-text">{{ $advertisement->content }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Duration: {{ $advertisement->duration }} seconds</li>
                <li class="list-group-item">Start Date: {{ $advertisement->start_date->format('Y-m-d') }}</li>
                <li class="list-group-item">End Date: {{ $advertisement->end_date->format('Y-m-d') }}</li>
            </ul>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('advertisements.edit', $advertisement) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('advertisements.destroy', $advertisement) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this advertisement?')">Delete</button>
        </form>
        <a href="{{ route('advertisements.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Advertisement Details</h1>
    <!-- Add details of the advertisement -->
@endsection
