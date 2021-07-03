<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()
                    ->join('users', 'users.id', 'posts.user_id')
                    ->select('posts.*', 'users.name')    
                    ->paginate(5);
        return view('admin.posts', compact('posts'));
    }

    public function update($id) {
        $post = Post::find($id);
        if($post->isActive == 1) {
           $post->isActive = 0; 
        } else {
           $post->isActive = 1; 
        }
        $post->save();
    }
}
