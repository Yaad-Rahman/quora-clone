<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'question',
        'post_photo'
    ];
    
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function getPostPhotoAttribute($value)
    {
        if($value){
            return asset('storage/' .$value);
        }
        else {
            return null;
        }
    }
}
