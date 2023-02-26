<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    protected $modelName;

    public function __construct()
    {
        $this->modelName = strtolower(str_replace('Policy', '', class_basename($this)));
    }

    public function before($user, $ability)
    {
        if ($user->is_admin) {
            return true;
        }
    }

    protected function canAccess($user, $model)
    {
        return $user->id === $model->user_id;
    }
    protected function denyAccess()
    {
       return $this->deny(__('auth.update', ['model' => $this->modelName]) );
    }

}
