<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::latest()
                    ->join('users', 'users.id', 'comments.user_id')
                    ->join('posts', 'posts.id', 'comments.post_id')
                    ->select('comments.*', 'users.name', 'posts.description', 'posts.photo')    
                    ->paginate(10);
        return view('admin.comments', compact('comments'));
    }

    public function update($id) {
        $comment = Comment::find($id);
        if($comment->isActive == 1) {
           $comment->isActive = 0; 
        } else {
           $comment->isActive = 1; 
        }
        $comment->save();
    }
}
