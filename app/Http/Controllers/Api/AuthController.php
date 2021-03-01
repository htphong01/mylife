<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

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
            $user->password = $encryptedPass;
            $user->save();
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
}
