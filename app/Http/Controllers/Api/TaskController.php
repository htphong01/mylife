<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Helper;
use App\Models\Task;
use App\Models\User;
use App\Models\Room;
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
        return response()->json([
            'success' => true,
            'tasks' => $task
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
