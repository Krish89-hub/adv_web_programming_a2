@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form for editing an existing post -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="user_id">Created By</label>
            <input type="text" disabled class="form-control" value="{{ $post->user->name }}" required>
        </div>

        <button type="submit" class="btn btn-outline-primary">Update Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>
@endsection
