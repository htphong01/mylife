<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $likes = Like::orderBy('id', 'desc')->get();
        foreach($likes as $like) {
            $like->user;
        }
        return response()->json([
            'success' => true,
            'likes' => $likes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $like = Like::where('post_id', '=', $request->post_id)->where('user_id','=', Auth::user()->id)->first();
        if($like != null) {
            $like->delete();
            return response([
               'success' => true,
               'message' => 'unliked' 
            ]);
        }

        $like = new Like();
        $like->user_id = Auth::user()->id;
        $like->post_id = $request->post_id;
        $post = Post::find($request->post_id);
        createNotification(3, $post->user_id);
        $like->save();

        return response([
            'success' => true,
            'message' => 'liked' 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $like = Like::find($id);
        $like->delete();
        return response([
            'success' => true,
            'message' => 'like deleted' 
        ]);
    }
}
