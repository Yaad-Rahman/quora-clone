<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Post;
use App\Like;

class Timeline extends Component
{
    use WithFileUploads;

    public $postQuestion;
    public $postPhoto;
    public $comment;

    protected $rules = [
        'postQuestion' => 'required|max:255',
        'postPhoto' => 'nullable|image|max:2048',
    ];

    public function updated()
    {
        $this->validate();
    }

    public function showComment($id)
    {
        if($this->comment){
            $this->comment = null;    
        }else{
            $this->comment= $id;
        }
        
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

    public function postLike(Post $post)
    {
        $my_like = $post->likes->where('user_id', auth()->user()->id)->first();
        $my_dislike = $post->dislikes->where('user_id', auth()->user()->id)->first();

        if($my_dislike)
        {
            $my_dislike->liked = true;
            $my_dislike->save();
        }
        else{
            if($my_like)
            {
                $my_like->delete();
            }
            else{
                $like = new Like;
                $like->liked = true;
                $like->user_id = auth()->user()->id;
                $post->likes()->save($like);
                $this->postLiked = true;
            }
        }

    }

    public function postDislike(Post $post)
    {
        $my_like = $post->likes->where('user_id', auth()->user()->id)->first();
        $my_dislike = $post->dislikes->where('user_id', auth()->user()->id)->first();

        if($my_like)
        {
            $my_like->liked = false;
            $my_like->save();
        }
        else{
            if($my_dislike)
            {
                $my_dislike->delete();
            }
            else{
                $dislike = new Like;
                $dislike->liked = false;
                $dislike->user_id = auth()->user()->id;
                $post->likes()->save($dislike);
            }
        }

    }

    public function render()
    {
        return view('livewire.timeline', [
            'posts' => auth()->user()->timeline(),
        ]);
    }

    
}
