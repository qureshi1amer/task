<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Traits\HasUser;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use SoftDeletes , HasUser;

    protected $casts = [
        'status' => PostStatus::class,
    ];
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $appends = [ 'created_at' ];

    //Belongs to or hasMany through can be used here
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
    public function scopeActive($query)
    {
        return $query->where('status', PostStatus::Active);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

