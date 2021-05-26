<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use Auth;
use App\Models\Friend;
use App\Models\User;
use App\Models\User_infor;
use App\Models\Message;
use App\Models\Room;
use App\Models\Participant;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::join('messages', 'messages.room_id', 'rooms.id')
                        ->join('participants', 'participants.room_id', 'rooms.id')
                        ->where('participants.user_id', Auth::user()->id)
                        ->select('rooms.id', 'rooms.name', 'rooms.photo', 'rooms.type')
                        ->distinct('rooms.id')
                        ->get();
        foreach($rooms as $room) {
            if($room->type == 'individual') {
                $participant = Participant::where('user_id', '!=', Auth::user()->id)
                                    ->where('room_id', $room->id)    
                                    ->first();
                $room->photo = User::find($participant->user_id)->avatar;
                $room->name = $participant->nickname;
            }
            $message = Message::where('room_id', $room->id)->orderBy('id','desc')->first();

            if($message->user_id == Auth::user()->id) {
                $messageUserName = 'Bạn';
            } else {
                $messageUserName = User::find($message->user_id)->name;
            }

            if($message->type == 'image') {
                $room->message = $messageUserName .' đã gửi một hình ảnh' ;
            } else {
                $room->message = $messageUserName .': ' .$message->message;
            }

            $room->messageTime = $message->created_at;
        }

        return response()->json([
            'success' => true,
            'rooms' => $rooms
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms = Room::join('participants', 'participants.room_id', 'rooms.id')
                        ->where('participants.user_id', Auth::user()->id)
                        ->where('rooms.id', $id)
                        ->orderBy('rooms.id', 'desc')
                        ->select('rooms.id', 'rooms.name', 'rooms.photo', 'rooms.type')
                        ->distinct('rooms.id')
                        ->get();
        foreach($rooms as $room) {
            if($room->type == 'individual') {
                $participant = Participant::where('user_id', '!=', Auth::user()->id)
                                    ->where('room_id', $room->id)    
                                    ->first();
                $room->photo = User::find($participant->user_id)->avatar;
                $room->name = $participant->nickname;
            }
            $message = Message::where('room_id', $room->id)->orderBy('id','desc')->first();

            if(isset($message)) {
                if($message->user_id == Auth::user()->id) {
                    $messageUserName = 'Bạn';
                } else {
                    $messageUserName = User::find($message->user_id)->name;
                }
    
                if($message->type == 'image') {
                    $room->message = $messageUserName .' đã gửi một hình ảnh' ;
                } else {
                    $room->message = $messageUserName .': ' .$message->message;
                }
    
                $room->messageTime = $message->created_at;
            }
            
        }

        return response()->json([
            'success' => true,
            'rooms' => $rooms
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
        //
    }
}
