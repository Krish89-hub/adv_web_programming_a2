@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">View User</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>    <!-- Display user details -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User Information</h5>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-3">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning">Edit User</a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete User</button>
        </form>

        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Back to Users</a>
    </div>

@endsection
