<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Comment;
use App\Like;
use App\Activity;

class Reply extends Component
{

    public $reply;
    public $postId;
    public $commentId;
    public $replyAvailable;

    

    public function replyOfReply($id)
    {
        if($this->replyAvailable)
        {
            $this->replyAvailable = null;
        }else {
            $this->replyAvailable = $id;
        }
    }

    public function deleteReply($id)
    {
        $reply = Comment::findOrFail($id);
        $reply->activities()->delete();
        $reply->delete();
    }

    public function postReply()
    {
        $data= $this->validate([
            'reply' => 'required|max:255'
        ]);
        $comment = Comment::create([
            'post_id' => $this->postId,
            'user_id' => auth()->user()->id,
            'parent_id' => $this->commentId, 
            'comment' => $data['reply']
        ]);

        $activity = new Activity;
        $activity->user_id = auth()->user()->id;
        $activity->name = "Replied on comment";
        $comment->activities()->save($activity);

        $this->reply = '';
    }

    public function replyLike(Comment $comment)
    {
        
        $my_like = $comment->likes->where('user_id', auth()->user()->id)->first();
        $my_dislike =  $comment->dislikes->where('user_id', auth()->user()->id)->first();

        if($my_dislike)
        {
            $my_dislike->delete();
            $like = new Like;
            $like->liked = true;
            $like->user_id = auth()->user()->id;
            $comment->likes()->save($like);

        }
        else {
            if($my_like){
                $my_like->delete();
            }
            else
            {
                $like = new Like;
                $like->liked = true;
                $like->user_id = auth()->user()->id;
                $comment->likes()->save($like);
            }
        }
        
    }

    public function replyDislike(Comment $comment)
    {
        $my_like = $comment->likes->where('user_id', auth()->user()->id)->first();
        $my_dislike =  $comment->dislikes->where('user_id', auth()->user()->id)->first();

        if($my_like){
            $my_like->delete();
            $dislike = new Like;
            $dislike->liked = false;
            $dislike->user_id = auth()->user()->id;
            $comment->dislikes()->save($dislike);
        }
        else
        {
            if($my_dislike)
            {
            $my_dislike->delete();
            }
            else {
            $dislike = new Like;
            $dislike->liked = false;
            $dislike->user_id = auth()->user()->id;
            $comment->dislikes()->save($dislike);
            }
        }

        
    }



    public function render()
    {   
        $replies = Comment::where('post_id', $this->postId)->where('parent_id', $this->commentId)->get();

        return view('livewire.reply', [
            'replies' => $replies,
        ]);
    }
}
