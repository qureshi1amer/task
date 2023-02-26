<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends ApiController
{

    public  function  index(Request $request , Post $post){

        $comments = $post->comments()->latest()->paginate(SELF::MAXCOMMENTS);
        return new CommentCollection($comments);
    }

    public function store(CommentRequest $request, Post $post)
    {
        $comment = new Comment($request->validated());
        $post->comments()->save($comment);
        return $this->successResponse( new CommentResource($comment));
    }

    public function show(Comment $comment)
    {
        return  $this->successResponse(new  CommentResource($comment));
    }
}
