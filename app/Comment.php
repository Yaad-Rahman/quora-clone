<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Comment extends Model
{
   protected $fillable = [
       'user_id',
       'post_id',
       'comment',
       'parent_id',
       'best_answer'
   ];

   public function post()
   {
       return $this->belongsTo(Post::class);
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

    public function replies($id)
    {
        return $this->where('parent_id', $id)->count();
    }

   public function author()
   {
       return $this->belongsTo(User::class, 'user_id');
   }


}
