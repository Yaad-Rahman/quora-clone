<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index($id)
    {
        $post = Post::findOrFail($id);
        return view('post', [
            'post' => $post
        ]);
    }
}
