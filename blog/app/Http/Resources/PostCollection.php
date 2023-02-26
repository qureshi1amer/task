<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => PostResource::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
