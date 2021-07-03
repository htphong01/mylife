<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function store(Request $req) {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->description = $req->desc;
        // check if post has photo
        if($req->photo != '') {
            $image = str_replace('data:image/jpeg;base64,', '', $req->photo);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.'jpg';
            $file = Storage::disk('store_post')->put($imageName, base64_decode($image));
            // $dir = '/'; 
            // $recursive = false; 
            // $contents = collect(Storage::disk('store_post')->listContents($dir, $recursive)); 
            // $imageID = $contents->where('name', '=', $imageName)->first();
            $post->photo = '/store/posts/' .$imageName;
        }

        
        $post->save();
        $post->user;
        
        if($post->photo != '') {
            return response()->json([
                'success' => true,
                'message' => 'posted',
                'post' => $post,
                'photo' => $post->photo
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'fail',
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

    public function show($id) {
        $posts = Post::where('id', $id)->get();
        
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
            Storage::disk('store_post')->delete('public/posts/' .$post->photo);
        }
        $post->delete();
        return response()->json([
            'success' => true,
            'message' => 'post deleted'
        ]);
    }

    public function index(Request $req) {
        $user = $req->input('user');
        if($user == 'all' || $user == '') {
            $posts = Post::orderBy('id', 'desc')
                        ->where('isActive', 1)
                        ->get();
        } else {
            $posts = Post::orderBy('id', 'desc')
                        ->where('isActive', 1)
                        ->where('user_id', $user)
                        ->get();
        }
        
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

    public function search(Request $req) {
        $key = $req->input('q');
        $posts = Post::where('description', 'like', '%' .$key .'%')->orderBy('id','desc')->get();

        foreach($posts as $post) {
            // get user of post
            $post->user;
            //comment count
            $post['commentsCount'] = count($post->comments);
            //likes count
            $post['likesCount'] = count($post->likes);
            // check if user like his own post
            $post['selfLike'] = false;

        }

        return response()->json([
            'success' => true,
            'posts' => $posts,
        ]);
    }
}
