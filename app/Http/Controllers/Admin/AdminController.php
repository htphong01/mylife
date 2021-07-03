<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Post;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Notification;
use App\Models\User_infor;

use Session;
use Auth;

class AdminController extends Controller
{
    public function login() {
        if(session('user')) {
            return redirect('admin/dashboard');
        }
        return view('admin.login');
    }

    public function verifyLogin(Request $req) {
        $creds = $req->only(['email', 'password']);

        if(!$token = Auth::attempt($creds)) { 
            $error = 'Thông tin đăng nhập không đúng';
            return view('admin.login', compact('error'));
        }

        Session::put('token', $token);
        Session::put('user', Auth::user());
        Session::put('role', Auth::user()->role);

        return redirect('/admin/dashboard');
    }

    public function dashboard() {
        $data = (object) [
            'user' => User::all()->count() - 1,
            'post' => Post::all()->count(),
            'event' => Event::all()->count(),
            'comment' => Comment::all()->count(),
        ];

        $postData = Post::orderBy('created_at', 'desc')
                        ->selectRaw('date(created_at) as date')
                        ->groupBy('date')
                        ->limit(7)
                        ->get();
        foreach($postData as $item) {
            $item->postCount = Post::whereDate('created_at', $item->date)->get()->count();
            $item->date = date("d-m-Y", strtotime($item->date));
        }

        $genders = User_infor::selectRaw('gender')
                        ->groupBy('gender')
                        ->limit(7)
                        ->get();
        foreach($genders as $gender) {
            $gender->userCount = User_infor::where('gender', $gender->gender)->get()->count();
            if($gender->gender == null) {
                $gender->gender = 'Chưa xác định';
            }
        }

        $commentData = Comment::orderBy('created_at', 'desc')
                        ->selectRaw('date(created_at) as date')
                        ->groupBy('date')
                        ->limit(7)
                        ->get();
        foreach($commentData as $item) {
            $item->commentCount = Comment::whereDate('created_at', $item->date)->get()->count();
            $item->date = date("d-m-Y", strtotime($item->date));
        }

        $notifications = Notification::latest()
                            ->where('type', 2)
                            ->orWhere('type', 3)
                            ->limit(5)
                            ->get();

        return view('admin.dashboard', compact('data', 'postData', 'notifications', 'genders', 'commentData'));
    }

    public function logout() {
        session()->flush();
        return redirect('admin/login');
    }
}
