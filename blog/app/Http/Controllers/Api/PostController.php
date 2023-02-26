<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use config\Constants;
use Illuminate\Http\Request;

class PostController extends ApiController
{

    public  function index(){

        $posts = Post::active()->latest()->paginate(SELF::MAXPOSTS);
        return new PostCollection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
