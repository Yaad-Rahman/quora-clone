<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Profile extends Component
{
    public function follow(User $user)
    {
        if(auth()->user()->following($user))
        {
            auth()->user()->unfollow($user);
        }
        else{
            auth()->user()->follow($user);
        }
    }


    public function render(User $user)
    {

        return view('livewire.profile',[
            'user' => $user
        ]);
    }
}
