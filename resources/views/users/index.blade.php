@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">Create New User</a>
        </div>
      </div>

    <!-- Display success message if any -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Users table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="text-center">
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-info btn-sm" title="View">
                            <em class="bi bi-eye"></em>
                        </a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                            <em class="bi bi-pencil"></em>
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                <em class="bi bi-trash"></em>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
