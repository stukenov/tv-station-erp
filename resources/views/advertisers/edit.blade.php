@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Advertiser</h1>

    <form action="{{ route('advertisers.update', $advertiser) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $advertiser->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="contact_person" class="form-label">Contact Person</label>
            <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ old('contact_person', $advertiser->contact_person) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $advertiser->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $advertiser->phone) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Advertiser</button>
        <a href="{{ route('advertisers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Edit Advertiser</h1>
    <!-- Add form to edit advertiser -->
@endsection
