@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
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

    <!-- Form for creating a new post -->
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-primary">Save Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>

@endsection
