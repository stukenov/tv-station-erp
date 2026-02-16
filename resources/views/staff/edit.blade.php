@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Staff Member</h1>

    <form action="{{ route('staff.update', $staff) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $staff->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $staff->position) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $staff->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone', $staff->phone) }}">
        </div>

        <div class="mb-3">
            <label for="hire_date" class="form-label">Hire Date</label>
            <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ old('hire_date', $staff->hire_date->format('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Staff Member</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection@extends('layouts.app')

@section('content')
    <h1>Edit Staff Member</h1>
    <!-- Add form to edit staff member -->
@endsection
