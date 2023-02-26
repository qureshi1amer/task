<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy extends  BasePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function update(User $user, Post $post)
    {
        if ($this->canAccess($user, $post)) {
            return true;
        }
        return $this->deny(__('auth.update', ['model' => $this->modelName]));
    }

    public function delete(User $user, Post $post)
    {
        if ($this->canAccess($user, $post)) {
            return true;
        }
        return $this->deny(__('auth.delete', ['model' => $this->modelName]));
    }

}
