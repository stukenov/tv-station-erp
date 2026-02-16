@extends('layouts.app')

@section('content')
    <h1>Add Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="position">Position</label>
            <input type="text" name="position" id="position" required>
        </div>
        <button type="submit">Add Employee</button>
    </form>
@endsection@extends('layouts.app')

@section('content')
    <h1>Create Employee</h1>
    <!-- Add form to create employee -->
@endsection
