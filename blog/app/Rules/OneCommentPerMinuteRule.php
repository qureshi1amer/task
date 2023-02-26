<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;
use App\Models\Comment;

class OneCommentPerMinuteRule implements Rule
{
    protected $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function passes($attribute, $value)
    {
        // Get the most recent comment by the user and check if he has posted in last one minute or not
        $comment = Comment::where('user_id', $this->user_id)
            ->latest('created_at')
            ->first();

        if ($comment) {
            $one_minute_ago = Carbon::now()->subMinute();
            return $comment->created_at->lt($one_minute_ago);
        }

        return  true;
    }

    public function message()
    {
        return __('exceptions.rules.one_per_minute');
    }
}
