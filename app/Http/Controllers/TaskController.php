<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $tasks = Task::all();
        
        return view('home',compact('tasks'));
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'taskname'=>'required',
        ]);

        $status = "pending";

        $tasks = new Task;
        
        $tasks->task = $request->taskname;
        $tasks->status = $status;
        $tasks->save();

        return $this->index();
    }

    public function editTask($id)
    {
        $task = Task::where('id', $id)->first();

        return view('task.edit',compact('task'));
    }

    public function updateTask(Request $request, $id)
    {
        $request->validate([
            'taskname'=>'required',
            'status'=>'required',
        ]);

        $task = Task::where('id', $id)->first();

        $task->task = $request->taskname;
        $task->status = $request->status;
        $task->save();

        return $this->index();
    }

    public function deleteTask($id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();

        return $this->index();
    }
}
