<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\User_infor;
use App\Models\Friend;
use App\Models\Post;

class UserController extends Controller
{
    public function saveUserInfor(Request $req) {
        $user = User::find(Auth::user()->id);
        $infor = User_infor::where('user_id', '=' ,Auth::user()->id)->first();
        $user->name = $req->name;
        $photo = '';
        if($req->photo != '') {
            $image = str_replace('data:image/jpeg;base64,', '', $req->photo);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.'jpg';
            Storage::disk('store_profile')->put($imageName, base64_decode($image));
            $user->avatar = 'store/profiles/' .$imageName;
        }
        $user->save();

        $infor->dateOfBirth = date("Y-m-d", strtotime($req->dateOfBirth));
        $infor->gender = $req->gender;
        $infor->save();



        $response = User::leftJoin('user_infors', 'users.id', 'user_infors.user_id')
                    ->where('users.id', Auth::user()->id)
                    ->select('user_infors.*', 'users.*')
                    ->get();


        return response()->json([
            'success' => true,
            'user' => $response
        ]);
    }

    public function changeAvatar(Request $req) {
        $user = User::find(Auth::user()->id);
        $photo = '';
        if($req->photo != '') {
            $image = str_replace('data:image/jpeg;base64,', '', $req->photo);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.'jpg';
            Storage::disk('store_profile')->put($imageName, base64_decode($image));
            $user->avatar = 'store/profiles/' .$imageName;
            $user->save();

            $post = new Post();
            $post->user_id = Auth::user()->id;
            $post->description = 'Đã cập nhật ảnh đại diện';
            $post->photo = 'store/profiles/' .$imageName;
            $post->save();
        }


        return response()->json([
            'success' => true,
            'message' => $user->avatar
        ]);
        
    }

    public function search(Request $req) {
        $key = $req->input('q');
        if(Auth::check()) {
            $authId = Auth::user()->id;
        } else {
            $authId = -1;
        }
        $users = User::where('id', '!=', $authId)->where('name', 'like', '%' .$key .'%')->orWhere('email', $key)->get();
        return response()->json([
            'success' => true,
            'users' => $users,
        ]);
    }

    public function getUser(Request $req) {
        $id = $req->input('id');
        $postCount = Post::where('user_id', $id)->count();
        $friendCount = $friends = Friend::where([
                                    ['user_id1', '=', $id],
                                    ['isAccept','=', '2']
                                    ])
                                ->orWhere([
                                    ['user_id2', '=', $id],
                                    ['isAccept', '=', '2']
                                ])->count();
        $user = User::leftJoin('user_infors', 'users.id', 'user_infors.user_id')
                        ->where('users.id', $id)
                        ->select('user_infors.*', 'users.*')
                        ->get();
        $friendInvitationId = 0;
        $statusFriend = 0;
        $requestSendByYou = false;
        if(Auth::check()) {
            $friend = Friend::where([
                ['user_id1', Auth::user()->id],
                ['user_id2', $id]
                ])->orWhere([
                    ['user_id2', Auth::user()->id],
                    ['user_id1', $id]
                ])->first();
            if(isset($friend)) {
                $friendInvitationId = $friend->id;
                if($friend->user_id1 == Auth::user()->id) {
                    $requestSendByYou = true;
                }
                $statusFriend = $friend->isAccept;
            }
        }

        if(count($user) == 0) {
            return response()->json([
                'success' => false
            ]);
        }

        return response()->json([
            'success' => true,
            'friendInvitationId' => $friendInvitationId,
            'statusFriend' => $statusFriend,
            'requestSendByYou' => $requestSendByYou,
            'user' => $user,
            'postCount' => $postCount,
            'friendCount' => $friendCount
        ]);
    }

    public function update(Request $req) {
        $user = User::find(Auth::user()->id);
        $infor = User_infor::where('user_id', Auth::user()->id)->first();
        $user->update($req->all());
        $infor->update($req->all());
        $user_response = User::leftJoin('user_infors', 'users.id', 'user_infors.user_id')
                        ->where('users.id', Auth::user()->id)
                        ->select('user_infors.*', 'users.*')
                        ->get();
        return response()->json([
            'success' => true,
            'user' => $user_response
        ]);

    }
}
