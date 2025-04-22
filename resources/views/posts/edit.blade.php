@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ $post->body }}</textarea>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $post->author }}" required>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Published At</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '' }}">
        </div>

        <button type="submit" class="btn btn-warning">Update Post</button>
    </form>
</div>
@endsection
