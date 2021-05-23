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

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::latest()->get();
        return response()->json([
            'success' => true,
            'messages' => $messages
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
        $message = new Message();
        $message->room_id = $request->room_id;
        $message->user_id = Auth::user()->id;
        $message->status = $request->room_id;
        if($request->type == 'text') {
            $message->message = $request->message;
        } elseif ($request->type == 'image') {
            $image = str_replace('data:image/jpeg;base64,', '', $request->message);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.'jpg';
            Storage::disk('store_message')->put($imageName, base64_decode($image));
            $message->message = 'store/messages/' .$imageName;
            $message->type = $request->type;
        }
        $message->save();
        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }

    function createRoom($user_id) {
        $rooms = Room::join('participants', 'participants.room_id', 'rooms.id')
                    ->where('participants.user_id', $user_id)
                    ->where('rooms.type', 'individual')
                    ->select('rooms.id')
                    ->get();
        $isHasRoom = false;
        foreach($rooms as $room) {
            $result = Participant::where('user_id', Auth::user()->id)
                                    ->where('room_id', $room->id)
                                    ->first();
            if(isset($result)) {
                $isHasRoom = true;
                return $result->room_id;
            }
        }

        if(!$isHasRoom) {
            $room = new Room();
            $room->name = 'Phòng chat';
            $room->save();

            $participant = new Participant();
            $participant->user_id = $user_id;
            $participant->nickname = User::find($user_id)->name;
            $participant->room_id = $room->id;
            $participant->save();

            $participant1 = new Participant();
            $participant1->user_id = Auth::user()->id;
            $participant1->nickname = Auth::user()->name;
            $participant1->room_id = $room->id;
            $participant1->save();
            return $room->id;
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($room_id, Request $request)
    {
        if($room_id == 0) {
            $room_id = $this->createRoom($request->user_id);
        }

        $room = Room::find($room_id);
        if(isset($room)) {
            if($request->type_room != 'group') {
                $messages = Message::where('room_id', $room_id)->orderBy('id', 'asc')->get();
                $name = Participant::where('room_id', $room_id)->where('user_id', '!=', Auth::user()->id)->first()->nickname;
            } else {
                $name = Room::find($room_id)->name;
                $messages = Message::where('room_id', $room_id)->orderBy('id', 'asc')->get();
            }
    
    
            return response()->json([
                'success' => true,
                'name' => $name,
                'messages' => $messages
            ]);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Room id is invalid'
            ]);
        }

        
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
