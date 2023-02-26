<?php

namespace App\Http\Controllers;

use App\Enums\ResourceName;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(
            Post::class,
            ResourceName::POST,
        );
    }
    public function index()
    {
        $posts = Post::latest()->get();

        dd($posts);
    }


    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());
        dd($post);
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->get();

        dd($comments);
    }

    public function edit(Post $post)
    {
        dd($post);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());
        dd($post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
