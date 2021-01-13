<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Comment extends Model
{
   protected $fillable = [
       'user_id',
       'post_id',
       'comment'
   ];

   public function post()
   {
       return $this->belongsTo(Post::class);
   }

   public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

   public function author()
   {
       return $this->belongsTo(User::class, 'user_id');
   }


}
