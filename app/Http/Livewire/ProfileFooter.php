<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;

class ProfileFooter extends Component
{
    public $show = 'tab1';
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function toggle($value)
    {
        if($value == 1){
            $this->show = 'tab1';
        }else{
            $this->show = 'tab2';
        }
    }


    public function render()
    {
        $posts = Post::where('user_id', $this->user->id)->get();

        return view('livewire.profile-footer', [
            'posts' => $posts
        ]);
    }
}
