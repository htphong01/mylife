<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {
        $events = Event::latest()
                    ->join('users', 'users.id', 'events.creater_id')
                    ->select('events.*', 'users.name')    
                    ->paginate(10);
        return view('admin.events', compact('events'));
    }

    public function update($id) {
        $event = Event::find($id);
        if($event->isActive == 1) {
           $event->isActive = 0; 
        } else {
           $event->isActive = 1; 
        }
        $event->save();
    }
}
