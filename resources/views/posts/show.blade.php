@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Post Details</h1>

    <!-- Display post details -->
    <div class="card">
        <div class="card-header">
            <h2>{{ $post->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Content:</strong></p>
            <p>{{ $post->content }}</p>
            <p><strong>Created By:</strong> {{ $post->user->name }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        </div>
    </div>
</div>
@endsection
