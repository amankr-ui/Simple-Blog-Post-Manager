<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $posts = Post::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', "%$search%");
            })
            ->paginate(5);

        return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'author' => 'required|max:255',
            'published_at' => 'nullable|date',
        ]);


        Post::create($request->all());


        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'author' => 'required|max:255',
            'published_at' => 'nullable|date',
        ]);


        $post->update($request->all());


        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }


    public function destroy(Post $post)
    {

        $post->delete();


        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
