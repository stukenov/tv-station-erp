@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $employee->name }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $employee->email }}" required>
        </div>
        <div>
            <label for="position">Position</label>
            <input type="text" name="position" id="position" value="{{ $employee->position }}" required>
        </div>
        <button type="submit">Update Employee</button>
    </form>
@endsection@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
    <!-- Add form to edit employee -->
@endsection
