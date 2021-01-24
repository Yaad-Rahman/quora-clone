<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use App\Notifications\FollowNotification;
use App\Notifications\FollowUserNotification;

class FollowsController extends Controller
{
    use Notifiable;

    public function store(User $user)
    {

        if(auth()->user()->following($user))
        {
            auth()->user()->unfollow($user);


            $user->followActivity()->delete();
        }
        else{
            auth()->user()->follow($user);

            auth()->user()->notify(new FollowNotification($user->name));
            $user->notify(new FollowUserNotification(auth()->user()->name));

            $activity = new Activity;
            $activity->user_id = auth()->user()->id;
            $activity->name = "You Followed";
            $user->followActivity()->save($activity);
        }

        return redirect()->back();
    }
}
