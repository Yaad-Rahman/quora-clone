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
        return $this->morphMany(Like::class, 'likeable')->where('liked', true);
    }

    public function dislikes()
    {
        return $this->morphMany(Like::class, 'likeable')->where('liked', false);
    }

    public function isLikedBy()
    {
        return (bool) $this->likes->where('user_id', auth()->user()->id)->count();
    }

    public function isDislikedBy()
    {
        return (bool) $this->dislikes->where('user_id', auth()->user()->id)->count();
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

    public function bestAnswer()
    {
        return $this->comments->where('best_answer', true)->first();
    }

    public function activities()
    {
       return $this->morphMany(Activity::class, 'activitable');
    }
}
