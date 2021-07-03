<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Event;
use App\Models\Event_attender;

class EventAttenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attender = new Event_attender();
        $attender->event_id = $request->event_id;
        $attender->attender_id = Auth::user()->id;
        $attender->save();

        return response()->json([
            'success' => true,
            'message' => 'attend success'
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
        $attenders = Event_attender::where('event_id', $id)
                        ->join('users', 'users.id', 'event_attenders.attender_id')
                        ->select('users.name', 'event_id', 'attender_id', 'users.avatar')
                        ->get();
        return response()->json([
            'success' => true,
            'attenders' => $attenders
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
        $attender = Event_attender::where('event_id', $id)
                        ->where('attender_id', Auth::user()->id)
                        ->first();
        if(!$attender) {
            return $this->store($request);
        } else {
            $attender->delete();
            return response()->json([
                'success' => true,
                'message' => 'delete success'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attender = Event_attender::where('event_id', $id)
                    ->where('attender_id', Auth::user()->id)
                    ->first();
        
        $attender->delete();
        return response()->json([
            'success' => true,
            'message' => 'deleted attender'
        ]);
    }
}
