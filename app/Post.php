<?php

namespace App;

use Auth;
use App\{User, Like};
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body'];
    protected $appends = ['likeCount', 'likedByCurrentUser', 'canBeLikedByCurrentUser'];

    public function getLikeCountAttribute()
    {
        return $this->likes->count();
    }
    public function getLikedByCurrentUserAttribute()
    {
        if(!Auth::check()) {
            return false;
        }

        return $this->likes->where('user_id', Auth::user()->id)->count() === 1;
    }
    public function getcanBeLikedByCurrentUserAttribute()
    {
        if(!Auth::check()) {
            return false;
        }

        return $this->user->id !== Auth::user()->id;
    }
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

}
