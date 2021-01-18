<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','bio', 'avatar', 'cover'
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


    public function timeline()
    {
        if($this->follows())
            $friends = $this->follows()->pluck('id');
        else $friends = [];

        return Post::where('user_id', $this->id)->orWhereIn('user_id', $friends)->latest()->get();
    }

    public function getAvatarAttribute($value)
    {
        if($value){
            return asset('storage/' .$value);
        }else{
            return asset('/default-user.png');
        }
    }

    public function getCoverAttribute($value)
    {
        if($value){
            return asset('storage/' .$value);
        }else{
            return asset('/cancer.jpg');
        }
    }
}
