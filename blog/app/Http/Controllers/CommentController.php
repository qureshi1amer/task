<?php

namespace App\Http\Controllers;

use App\Enums\ResourceName;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    public function store(CommentRequest $request, Post $post)
    {
        $comment = new Comment($request->validated());

        $comment->user_id = auth()->id();

        $post->comments()->save($comment);

        dd($post->comments());
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
    }
}
