<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Auth;
use App\Models\Friend;
use App\Models\User;
use App\Models\User_infor;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friend::orderBy('id', 'desc')->get();
        foreach($friends as $friend) {
            $friend->user1_name = User::find($friend->user_id1)->name;
            $friend->user2_name = User::find($friend->user_id2)->name;
        }
        return response()->json([
            'success' => true,
            'friends' => $friends
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
        $user2 = User::find($request->user_id2);
        if(($request->user_id2 == Auth::user()->id) || !isset($user2) ) {
            return response()->json([
                'success' => false,
                'message' => 'error id'
            ]);
        }

        $friend = Friend::where([
            ['user_id1', Auth::user()->id],
            ['user_id2', $request->user_id2]
            ])->orWhere([
                ['user_id2', Auth::user()->id],
                ['user_id1', $request->user_id2]
            ])->get();
        if(!$friend->first()) {
            $friend = new Friend();
            $friend->user_id1 = Auth::user()->id;
            $friend->user_id2 = $request->user_id2;
            $friend->save();
            createNotification(1, $request->user_id2, Auth::user()->id);
            $friend->user1 = User::find($friend->user_id1);
            $friend->user2 = User::find($friend->user_id2);
        }

        return response()->json([
            'success' => true,
            'friend' => $friend,
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
        $friend = Friend::where('id', $id)->get();
        $friend[0]->user1 = User::find($friend[0]->user_id1);
        $friend[0]->user2 = User::find($friend[0]->user_id2);
        return response()->json([
            'success' => true,
            'friend' => $friend
        ]);
    }

    public function getFriendOfUser() {
        $friends = Friend::where([
                            ['user_id1', '=', Auth::user()->id],
                            ['isAccept','=', '2']
                            ])
                        ->orWhere([
                            ['user_id2', '=', Auth::user()->id],
                            ['isAccept', '=', '2']
                        ])
                        ->orderBy('id', 'desc')
                        ->select('user_id1', 'user_id2', 'created_at', 'id')
                        ->get();
        foreach($friends as $friend) {
            if($friend->user_id1 == Auth::user()->id) {
                $friend->friend_id = $friend->user_id2;
                $friend->friend_name = User::find($friend->user_id2)->name;
                $friend->friend_avatar = User::find($friend->user_id2)->avatar;
            } else {
                $friend->friend_id = $friend->user_id1;
                $friend->friend_name = User::find($friend->user_id1)->name;
                $friend->friend_avatar = User::find($friend->user_id1)->avatar;
            }

            unset($friend->user_id1);
            unset($friend->user_id2);
        }

        if($friends->count() == 0) {
            return response()->json([
                'success' => false,
                'friends' => $friends
            ]);
        }

        return response()->json([
            'success' => true,
            'friends' => $friends
        ]);
    }

    public function getFriendRequest() {
        $friends = Friend::where([
                            ['user_id2', '=', Auth::user()->id],
                            ['isAccept','=', '1']
                            ])
                        ->get();
        foreach($friends as $friend) {
            $friend->user1 = User::find($friend->user_id1);
            $friend->user2 = User::find($friend->user_id2);
        }
        return response()->json([
            'success' => true,
            'friends' => $friends
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $friend = Friend::find($id);
        createNotification(4, intval($friend->user_id1), Auth::user()->id);
        $friend->isAccept = 2;
        $friend->save();
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friend = Friend::find($id);
        $friend->delete();
        return response()->json([
            'success' => true,
            'message'=> 'delete friend success'
        ]);
    }
}
