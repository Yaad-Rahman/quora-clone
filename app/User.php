<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function follows()
    {
        $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow(User $user)
    {
        $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user);
    }

    public function following(User $user)
    {
        $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function timeline()
    {
        if($this->follows())
            $friends = $this->follows()->pluck('id');
        else $friends = [];

        return Post::where('user_id', $this->id)->orWhereIn('user_id', $friends)->latest()->get();
    }
}
