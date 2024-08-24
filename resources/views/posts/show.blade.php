@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Detials</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
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
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back to Posts</a>
        </div>
    </div>
@endsection
