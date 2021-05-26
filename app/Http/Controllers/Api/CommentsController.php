<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use App\Models\Post;
use Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->get();
        foreach($comments as $comment) {
            $comment->user;
        }
        return response()->json([
            'success' => true,
            'comments' => $comments
        ]);
    }

    public function commentPost(Request $req) {
        $comments = Comment::where('post_id', $req->post_id)->get();
        foreach($comments as $comment){
            $comment->user;
        }

        return response()->json([
            'success' => true,
            'comments' => $comments
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
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        if($request->type == 'text') {
            $comment->comment = $request->comment;
        } else if($request->type == 'image') {
            $image = str_replace('data:image/jpeg;base64,', '', $request->comment);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.'jpg';
            Storage::disk('store_comment')->put($imageName, base64_decode($image));
            $comment->comment = 'store/comments/' .$imageName;
            $comment->type = $request->type;
        }
        $comment->save();
        $post = Post::find($request->post_id);
        createNotification(2, $post->user_id);
        return response()->json([
            'success' => true,
            'message' => 'comment added'
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
        $comments = Comment::where('id', $id)->get();
        foreach($comments as $comment){
            $comment->user;
        }

        return response()->json([
            'success' => true,
            'comments' => $comments
        ]);
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
        $comment = Comment::find($id);
        if($comment->user_id != Auth::user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json([
            'success' => true,
            'message' => 'comment updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if($comment->user_id != Auth::user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'unauthorized access'
            ]);
        }
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'comment deleted'
        ]);
    }
}
