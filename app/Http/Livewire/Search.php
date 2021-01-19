<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;

class Search extends Component
{
    public $search = '';
    public $show = false;
  

    public function selectSearch()
    {
        $this->show = true;

    }

    public function render()
    {
        if($this->search == ''){
            $posts = [];
        }else{
            $posts = Post::where('question', 'like', '%' .$this->search .'%')->limit(5)->get();
        }

        return view('livewire.search',[
            'posts' => $posts
        ]);
    }
}
