<?php

namespace App\Http\Requests;

use App\Rules\OneCommentPerMinuteRule;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'body' => 'required|string|max:255',
            'once_per_minute' => ['required', new OneCommentPerMinuteRule($this->user_id)],
        ];
    }
}
