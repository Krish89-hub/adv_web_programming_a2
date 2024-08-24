@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-primary">Create New Post</a>
        </div>
      </div>
    <!-- Success message if any -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Link to create a new post -->
    

    <!-- Table displaying posts -->
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td class="text-center">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info btn-sm" title="view">
                            <em class="bi bi-eye"></em>
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm" title="edit">
                            <em class="bi bi-pencil"></em>
                        </a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-outline-danger btn-sm" title="Delete">
                                <em class="bi bi-trash"></em>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
