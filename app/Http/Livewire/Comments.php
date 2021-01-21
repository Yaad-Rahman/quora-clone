<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Comment;
use App\Like;
use App\Activity;
use Illuminate\Database\Eloquent\Builder;

class Comments extends Component
{
    public $comment;
    public $postId;
    public $reply;
    public $show = true;

    protected $rules = [
        'comment' => 'required|max:255',
    ];


    public function bestAnswer($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if($comment->best_answer){
            $comment->update([
                'best_answer' => false
            ]);
        }else{
            $comment->update([
                'best_answer' => true
            ]);
        }
        $this->emit('answerSelected');    
    }

    public function commentReply($id)
    {
        if($this->reply){
            $this->reply = null;
        }else{
            $this->reply = $id;
        }
    }

    public function deleteComment($id)
    {
        Comment::where('parent_id', $id)->delete();
        $comment = Comment::findOrFail($id);
        $comment->activities()->delete();
        $comment->delete();
    }


    public function postComment()
    {
        $data = $this->validate();
        $comment = Comment::create([
            'post_id' => $this->postId,
            'user_id' => auth()->user()->id,
            'comment' => $data['comment']
        ]);

        $activity = new Activity;
        $activity->user_id = auth()->user()->id;
        $activity->name = "Commented on post";
        $comment->post->activities()->save($activity);

        $this->comment = '';
    }

    public function commentLike(Comment $comment)
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

    public function commentDislike(Comment $comment)
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
        $comments = Comment::with('author', 'likes', 'dislikes', 'post')->where('post_id', $this->postId)->where('parent_id', 0)->get();

        $check = Comment::where('post_id', $this->postId)->where('best_answer', true)->count();

        if($check)
            $this->show = false;
            $refresh;
        
        return view('livewire.comments', [
            'comments' => $comments,
        ]);
    }
}
