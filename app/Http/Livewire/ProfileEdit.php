<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\User;
use App\Rules\PasswordCheck;

class ProfileEdit extends Component
{

    use WithFileUploads;
    
    public $userName;
    public $email;
    public $oldPassword;
    public $password;
    public $password_confirmation;
    public $bio;
    public $avatar;
    public $cover;
    public $user;

    public function mount() 
    {
       $this->userName = auth()->user()->name;
       $this->email = auth()->user()->email;
       $this->bio = auth()->user()->bio ? auth()->user()->bio : 'no bio';
    }


    public function rules()
    {
    return [
        'email' => 'email',
        'oldPassword' => ['required', new PasswordCheck($this->email) ],
        'password' => 'confirmed',
        'bio' => 'max:250',
        'avatar' => 'nullable|image|max:1200',
        'cover' => 'nullable|image|max:2048',
    ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function editProfile()
    {
        $data = $this->validate();
        if($data['password']){
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = auth()->user()->password;
        }
            
        if($data['avatar'])
            $data['avatar']= $data['avatar']->store('Profile Pics');
        if($data['cover'])
            $data['cover']= $data['cover']->store('Covers');
       

        $user = User::findOrFail(auth()->user()->id);
        $user->update([
            'email' => $data['email'],
            'password' => $data['password'],
            'bio' => $data['bio'],
            'avatar' => $data['avatar'],
            'cover' => $data['cover'],
        ]);

        return redirect(route('profile', auth()->user()->name));
        
        


    }

    public function render()
    {
        return view('livewire.profile-edit');
    }
}
