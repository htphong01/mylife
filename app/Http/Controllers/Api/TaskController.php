<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use App\Models\Task;
use App\Models\User;
use App\Models\Room;
use App\Models\Message;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('deadline', 'desc')->get();
        return response()->json([
            'success' => true,
            'tasks' => $tasks
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
        $receivers = $request->receivers;
        for($i = 0; $i < count($receivers); $i++) {
            $task = new Task();
            $task->creater_id = Auth::user()->id;
            $task->receiver_id = $receivers[$i];
            $task->room_id = $request->room_id;
            $task->content = $request->content;
            $task->title = $request->title;
            $task->deadline = date("Y-m-d H:i", strtotime($request->deadline));
            $task->save();
            $message = new Message();
            $message->room_id = $request->room_id;
            $message->user_id = Auth::user()->id;
            $message->message = 'đã giao một công việc mới';
            $message->type = 'task/'.$task->id;
            $message->save();
        }

        
        

        return response()->json([
            'success' => true,
            'message' => 'added'
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
        $task = Task::join('users', 'users.id', 'tasks.creater_id')
                        ->where('tasks.id', $id)
                        ->select('tasks.*', 'users.name as creater_name', 'users.avatar as creater_avatar')
                        ->get();
        $task[0]->receiver_name = User::find($task[0]->receiver_id)->name;
        $task[0]->receiver_avatar = User::find($task[0]->receiver_id)->avatar;
        return response()->json([
            'success' => true,
            'tasks' => $task
        ]);              
    }

    public function tasksRoom($room_id) {
        $tasks = Task::join('users', 'users.id', 'tasks.creater_id')
                        ->where([
                                ['tasks.creater_id', Auth::user()->id],
                                ['tasks.room_id', $room_id]
                        ])->orWhere([
                            ['tasks.receiver_id', Auth::user()->id],
                            ['tasks.room_id', $room_id]
                        ])
                        ->select('tasks.*', 'users.name as creater_name', 'users.avatar as creater_avatar')
                        ->orderBy('tasks.id', 'desc')
                        ->get();
        foreach($tasks as $task) {
            $task->receiver_name = User::find($task->receiver_id)->name;
            $task->receiver_avatar = User::find($task->receiver_id)->avatar;
        }
        return response()->json([
            'success' => true,
            'tasks' => $tasks
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
        $task = Task::find($id);
        $task->note = $request->note;
        if($request->file != '') {
            $image = str_replace('data:image/jpeg;base64,', '', $request->file);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'.'.'jpg';
            Storage::disk('store_task')->put($imageName, base64_decode($image));
            $task->file = 'store/tasks/' .$imageName;
        }
        $task->submitted_at = date("Y-m-d H:i:s");
        $task->isSubmitted = 2;
        $task->save();
        return response()->json([
            "success" => true,
            "message" => 'submit task success'
        ]);
    }

    public function taskComplete($id) {
        $task = Task::find($id);
        if($task->isSubmitted == 1) {
            return response()->json([
                "success" => false,
                "message" => 'task is not submitted'
            ]);
        } else {
            $task->isCompleted = 2;
            $task->save();
            return response()->json([
                "success" => true,
                "message" => 'task is completed'
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
        //
    }
}
