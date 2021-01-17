<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{

    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $bio;
    public $proPic;
    public $cover;

    public function mount() 
    {
       $this->name = auth()->user()->name;
       $this->email = auth()->user()->email;
       $this->bio = auth()->user()->bio ? auth()->user()->bio : 'no bio';
       $this->proPic = auth()->user()->proPic;
       $this->cover = auth()->user()->cover;
    }


    protected $rules = [
        'name' => 'min:3',
        'email' => 'email',
        'password' => 'required|confirmed',
        'bio' => 'max:50',
        'proPic' => 'image|max:1200',
        'cover' => 'image|max:2048',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function editProfile()
    {
        dd($this->validate());
    }

    public function render()
    {


        return view('livewire.profile-edit');
    }
}
