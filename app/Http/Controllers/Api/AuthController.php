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

class AuthController extends Controller
{
    public function login(Request $req) {
        $creds = $req->only(['email', 'password']);

        if(!$token=Auth::attempt($creds)) {
            return response()->json([
                'success' => false
            ]);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => Auth::user()
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
    public function saveUserInfor(Request $req) {
        $user = User::find(Auth::user()->id);
        $user->name = $req->name;
        $photo = '';
        if($req->photo != '') {
            $image = str_replace('data:image/jpeg;base64,', '', $req->photo);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.'jpg';
            Storage::disk('store_profile')->put($imageName, base64_decode($image));
            $user->avatar = $imageName;
        }

        $user->save();

        return response()->json([
            'success' => true,
            'name' => $req->name,
            'photo' => $photo
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
        $user = User::leftJoin('user_infors', 'users.id', 'user_infors.user_id')
                        ->where('users.id', $id)
                        ->select('user_infors.*', 'users.*')
                        ->get();
        if(Auth::check()) {
            $friend = Friend::where([
                ['user_id1', Auth::user()->id],
                ['user_id2', $id],
                ['isAccept', 2]
                ])->orWhere([
                    ['user_id2', Auth::user()->id],
                    ['user_id1', $id],
                    ['isAccept', 2],
                ])->first();
        }
        return response()->json([
            'success' => true,
            'isFriend' => isset($friend),
            'user' => $user
        ]);
    }
}
