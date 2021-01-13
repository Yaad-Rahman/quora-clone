<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Post;

class Timeline extends Component
{
    use WithFileUploads;

    public $postQuestion;
    public $postPhoto;

    protected $rules = [
        'postQuestion' => 'required|max:255',
        'postPhoto' => 'nullable|image|max:2048',
    ];

    public function updated()
    {
        $this->validate();
    }

    public function post()
    {
        $data = $this->validate();
        if($data['postPhoto'])
            $data['postPhoto'] = $data['postPhoto']->store('posts');

        Post::create([
            'user_id' => auth()->user()->id,
            'question' => $data['postQuestion'],
            'post_photo' => $data['postPhoto'],
        ]);

        $this->postQuestion = '';
        $this->postPhoto = '';
    }

    public function render()
    {
        $posts = Post::all();

        return view('livewire.timeline', [
            'posts' => $posts,
        ]);
    }

    
}
