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
        echo 'We got this far';
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

        $task = Task::create($request->all());
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
