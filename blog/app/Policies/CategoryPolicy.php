<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Category $category)
    {
        if ($this->canAccess($user, $category)) {
            return true;
        }
        return $this->denyAccess();
    }

    public function delete(User $user, Category $category)
    {
        if ($this->canAccess($user, $category)) {
            return true;
        }
        return $this->denyAccess();
    }
}
