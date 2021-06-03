<?php 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\User_infor;
use App\Models\Friend;
use App\Models\Post;
use App\Models\Notification;

    function createNotification($type, $receiver_id, $target_id) {
        if(Auth::user()->id == $receiver_id) return;
        $notification = new Notification();
        if($type == 1) {
            $notification->sender_id = Auth::user()->id;
            $notification->content = '<b>' .Auth::user()->name .'</b> đã gửi cho bạn lời mời kết bạn';
            $notification->receiver_id = $receiver_id;
            $notification->link = $target_id;
            $notification->type = $type;
        } else if($type == 2) {
            $notification->sender_id = Auth::user()->id;
            $notification->content = '<b>' .Auth::user()->name .'</b> đã bình luận một bài viết của bạn';
            $notification->receiver_id = $receiver_id;
            $notification->link = $target_id;
            $notification->type = $type;
        } else if($type == 3) {
            $notification->sender_id = Auth::user()->id;
            $notification->content = '<b>' .Auth::user()->name .'</b> đã thích bài viết của bạn';
            $notification->receiver_id = $receiver_id;
            $notification->link = $target_id;
            $notification->type = $type;
        } else if($type == 4) {
            $notification->sender_id = Auth::user()->id;
            $notification->content = '<b>' .Auth::user()->name .'</b> đã chấp nhận lời mời kết bạn của bạn';
            $notification->receiver_id = $receiver_id;
            $notification->link = $target_id;
            $notification->type = $type;
        }
        $notification->image = Auth::user()->avatar;

        $notification->save();
        return response()->json([
            'success' => true,
            'notification' => $notification
        ]);
    }

?>