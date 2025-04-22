@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h1 class="my-4">{{ $post->title }}</h1>


        <div class="mb-3">
            <p><strong>Author:</strong> {{ $post->author }}</p>
            <p><strong>Published on:</strong>
                {{ $post->published_at ? $post->published_at->format('d M, Y H:i') : 'Not Published' }}
            </p>
        </div>


        <div class="post-body">
            <p class="lead">{{ $post->body }}</p>
        </div>


        <hr>

        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">Back to Posts</a>
    </div>
@endsection
