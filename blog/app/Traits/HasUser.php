<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


trait HasUser
{
    //This will add the user id to the model automatically
    public static function bootHasUser()
    {
        // Set the user_id attribute when creating a new model
        static::creating(function ($model) {
            $model->user_id = auth('id') ? auth('sanctum')->id() : auth('web')->id();
        });

        // Apply a global scope to only retrieve models for the current user
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', auth('sanctum') ? auth('sanctum')->id() : auth('web')->id() );
        });
    }

    //create the user relationship for all the models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
