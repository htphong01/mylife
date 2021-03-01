<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostsController extends Controller
{
    public function store(Request $req) {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->description = $req->desc;

        // check if post has photo
        if($req->photo != '') {
            // choose a unique name for photo   
            $photo = time().'jpg';
            file_put_contents('storage/posts/' .$photo, base64_decode($req->photo));
            $post->photo = $photo;
        }

        $post->save();
        $post->user;
        return response()->json([
            'success' => true,
            'message' => 'posted',
            'post' => $post
        ]);
    }

    public function update($id, Request $req) {
        $post = Post::find($id);
        
        if(Auth::user()->id != $post->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        $post->description = $req->desc;
        $post->save();
        return response()->json([
            'success' => true,
            'message' => 'post edited'
        ]);
    }

    public function destroy($id) {
        $post = Post::find($id);
        if(Auth::user()->id != $post->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }

        //check if post has photo to delete
        if($post->photo != '') {
            Storage::delete('public/posts/' .$post->photo);
        }
        $post->delete();
        return response()->json([
            'success' => true,
            'message' => 'post deleted'
        ]);
    }

    public function posts() {
        $posts = Post::orderBy('id', 'desc')->get();
        foreach($posts as $post) {
            // get user of post
            $post->user;
            //comment count
            $post['commentsCount'] = count($post->comments);
            //likes count
            $post['likesCount'] = count($post->likes);
            // check if user like his own post
            $post['selfLike'] = false;
            foreach($post->likes as $like) {
                if($like->user_id == Auth::user()->id) {
                    $post['selfLike'] = true;
                }
            }

        }

        return response()->json([
            'success' => true,
            'posts'=> $posts
        ]);
    }
}
