<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NewTaskMail;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = auth()->user()->id;
        $tasks = Task::where('user_id', $userId)
            ->paginate(2)
            ->onEachSide(2);

        return view('task.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $configs = [
            'task' => 'string',
            'limit_date' => 'date'
        ];

        $names = ['limit_date' => 'limit date'];

        $request->validate($configs, [], $names);

        $newTaskData = $request->all();
        $newTaskData['user_id'] = auth()->user()->id;

        $task = Task::create($newTaskData);
        $receiverEmail = auth()->user()->email;
        Mail::to($receiverEmail)->send(new NewTaskMail($task));
        
        return redirect()->route('task.show', ['task' => $task->id]); 
    }

    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
