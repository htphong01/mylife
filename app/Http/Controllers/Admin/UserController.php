<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class UserController extends Controller
{
    public function index() {
        $users = User::where('role', '!=', 0)
                    ->join('user_infors', 'users.id', 'user_infors.user_id')
                    ->select('users.*', 'user_infors.gender')    
                    ->paginate(6);
        return view('admin.users', compact('users'));
    }

    public function update($id) {
        $user = User::find($id);
        if($user->isActive == 1) {
           $user->isActive = 0; 
        } else {
           $user->isActive = 1; 
        }
        $user->save();
    }
}
