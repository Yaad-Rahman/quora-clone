<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Comment;
use App\Like;
use Illuminate\Database\Eloquent\Builder;

class Comments extends Component
{
    public $comment;
    public $postId;

    protected $rules = [
        'comment' => 'required|max:255',
    ];


    public function postComment()
    {
        $data = $this->validate();
        Comment::create([
            'post_id' => $this->postId,
            'user_id' => auth()->user()->id,
            'comment' => $data['comment']
        ]);
    }

    public function commentLike(Comment $comment)
    {
        $my_like = $comment->likes->where('user_id', auth()->user()->id)->first();

        if($my_like)
        {
            $my_like->delete();

        }else {

        $like = new Like;
        $like->liked = true;
        $like->user_id = auth()->user()->id;
        $comment->likes()->save($like);
        }
        
    }

    public function render()
    {
        $comments = Comment::where('post_id', $this->postId)->get();
        
        return view('livewire.comments', [
            'comments' => $comments,
        ]);
    }
}
