@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New User</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to create a new user -->
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">Select Role</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-outline-primary">Create User</button>
        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Back to Users</a>
    </form>
@endsection
