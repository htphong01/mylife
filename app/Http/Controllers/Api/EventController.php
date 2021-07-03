<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DateTime;
use Auth;
use App\Models\Event;
use App\Models\Event_attender;
use App\Models\User;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $order = $req->query('order');
        $now = date('Y-m-d H:i:s');

        $events = Event::all();
        if($events->count() == 0) {
            return response()->json([
                'success' => false
            ]);
        }

        if($order == 'top') {   
            $events =(array) Arr::sort($events, function($event) {
                return $event->total_attenders;
            });
            $events = array_reverse($events);
        } else if($order == 'date') {
            $events =(array) Arr::sort($events, function($event) {
                return $event->date_start;
            });
        } else if($order == 'attending') {
            $events = Event::join('event_attenders', 'events.id', 'event_attenders.event_id')
                        ->where('event_attenders.attender_id', Auth::user()->id)
                        ->select('events.*')
                        ->orderBy('events.date_start')
                        ->get();
            foreach($events as $event) {
                $event->total_attenders = Event_attender::where('event_id', $event->id)->count();
            }
        }

        foreach($events as $event) {
            $event->total_attenders = Event_attender::where('event_id', $event->id)->count();
            $event->isAttended = (Event_attender::where('attender_id', Auth::user()->id)
                                ->count() != 0) ? true : false;
            $event->creater_name = User::find($event->creater_id)->name;
            if($now < $event->date_start) {
                $event->status = 'Chưa diễn ra';
            } else if($now > $event->date_end) {
                $event->status = 'Đã kết thúc';
            } else {
                $event->status = 'Đang diễn ra';
            }
        }

        $arr = [];
        foreach($events as $item) {
            array_push($arr, $item);
        }

        return response()->json([
            'success' => true,
            'events' => $arr
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
        $event = new Event();
        $event->title = $request->title;
        $event->date_start = date("Y-m-d H:i", strtotime($request->date_start));
        $event->date_end = date("Y-m-d H:i", strtotime($request->date_end));
        $event->creater_id = Auth::user()->id;
        $event->content = $request->content;
        $event->address = $request->address;
        if($request->image == '') {
            $event->image = Auth::user()->avatar;
        } else {
            $event->image = $request->image;
        }
        $event->privacy = $request->privacy;
        $event->save();

        $attender = new Event_attender();
        $attender->event_id = $event->id;
        $attender->attender_id = Auth::user()->id;
        $attender->save();

        return response()->json([
            'success' => true,
            'message' => 'add event successful'
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
        $event = Event::where('id', $id)->get();
        if($event->count() == 0) {
            return response()->json([
                'success' => false
            ]);
        }

        if($event) {
            $event[0]->total_attenders = Event_attender::where('event_id', $event[0]->id)->count();
            $event[0]->isAttended = (Event_attender::where('attender_id', Auth::user()->id)
                                ->count() != 0) ? true : false;
            $event[0]->creater_name = User::find($event[0]->creater_id)->name;

            return response()->json([
                'success' => true,
                'events' => $event
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'event is not valid'
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
