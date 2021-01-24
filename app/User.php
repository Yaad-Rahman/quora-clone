<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Http\Traits\FollowTrait;

class User extends Authenticatable
{
    use Notifiable;
    use FollowTrait;

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

    public function timeline()
    {
        if($this->follows())
            $friends = $this->follows()->pluck('id');
        else $friends = [];

        return Post::with('likes', 'dislikes', 'comments', 'author')->where('user_id', $this->id)->orWhereIn('user_id', $friends)->latest()->get();
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

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function followActivity()
    {
        return $this->morphMany(Activity::class, 'activitable', 'activitable_type', 'activitable_id');
    }
}
