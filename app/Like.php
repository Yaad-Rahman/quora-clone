<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
   protected $guarded =[];

   public function likedBy()
   {
       return $this->belongsTo(User::class, 'user_id');
   }
   
   public function likeable()
   {
       return $this->morphTo();
   }

}
