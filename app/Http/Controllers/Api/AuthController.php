<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Hash;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\User_infor;
use App\Models\Friend;
use App\Models\Post;


class AuthController extends Controller 
{
    public function login(Request $req) {
        $creds = $req->only(['email', 'password']);

        if(!$token = Auth::attempt($creds, ['exp' => Carbon::now()->addYears(2)->timestamp])) {
            return response()->json([
                'success' => false
            ]);
        }

        $postCount = Post::where('user_id', Auth::user()->id)->count();
        $friendCount = $friends = Friend::where([
                                    ['user_id1', '=', Auth::user()->id],
                                    ['isAccept','=', '2']
                                    ])
                                ->orWhere([
                                    ['user_id2', '=', Auth::user()->id],
                                    ['isAccept', '=', '2']
                                ])->count();


        $user = User::leftJoin('user_infors', 'users.id', 'user_infors.user_id')
                ->where('users.id', Auth::user()->id)
                ->select('user_infors.*', 'users.*')
                ->get();

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
            'postCount' => $postCount,
            'friendCount' => $friendCount
        ]);
    }

    public function register(Request $req) {
        $encryptedPass = Hash::make($req->password);
        $user = new User;
        try {
            $user->email = $req->email;
            $user->name = $req->email;
            $user->password = $encryptedPass;
            $user->save();

            $user_infor = new User_Infor;
            $user_infor->user_id = $user->id;
            $user_infor->save();
            return $this->login($req);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message'=> $th
            ]);
        }
        
    }

    public function logout(Request $req) {
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($req->token));
            Auth::logout();
            return response()->json([
                'success' => true,
                'message'=> 'logout success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message'=> $th
            ]);
        }
    }

    // this function save user's name, photo 
    
}
