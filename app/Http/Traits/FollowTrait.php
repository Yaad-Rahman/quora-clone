<?php

namespace App\Http\Traits;
use App\User;
use Illuminate\Support\Facades\DB;

trait FollowTrait {

    public function follow (User $user){
        return $this->follows()->save($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function unfollow (User $user)
    {
        return $this->follows()->detach($user);
    }

    public function followers(User $user)
    {
        return DB::table('follows')->where('following_user_id', $user->id)->count();
    }
}