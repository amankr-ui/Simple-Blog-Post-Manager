@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Published At</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Post</button>
    </form>
</div>
@endsection
