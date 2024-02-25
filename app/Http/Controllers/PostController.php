<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post]);
    }

    public function store(SavePostRequest $request)
    {
//        $validated = $request->validate([
//            'title' => ['required', 'min:4'],
//            'body' => ['required'],
//        ]/*, [
//            'title.required' => 'Error diferente :attribute'
//        ]*/);

        Post::create($request);

        return to_route('posts.index')->with('status', 'Post Created!');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(SavePostRequest $request, Post $post)
    {
//        $request->validate([
//            'title' => ['required', 'min:4'],
//            'body' => ['required'],
//        ]/*, [
//            'title.required' => 'Error diferente :attribute'
//        ]*/);

        $post->update($request->validated());

        return to_route('posts.index')->with('status', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index')->with('status', 'Post deleted');
    }
}
