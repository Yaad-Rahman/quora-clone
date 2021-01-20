<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;
use App\Like;

class SinglePost extends Component
{
    public $postId;

    public function deletePost($id)
    {
        Post::destroy($id);
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
        $post = Post::findOrFail($this->postId);

        return view('livewire.single-post',[
            'post' => $post
        ]);
    }
}
