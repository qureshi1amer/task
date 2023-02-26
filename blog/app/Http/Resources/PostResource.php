<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\ApiController;
use config\Constants;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
             $this->collection->transform(function($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at,
                    'comments' => CommentResource::collection($this->comments->paginate(ApiController::MAXCOMMENTS)),
                    'created_by' => $this->user?? $this->user->name,
                ];
            })
        ];
    }
}
