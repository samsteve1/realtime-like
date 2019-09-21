<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

}
