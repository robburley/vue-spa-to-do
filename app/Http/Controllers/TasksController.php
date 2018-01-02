<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function incompleted()
    {
        return Task::with('user')->orderBy('created_at', 'asc')->incomplete()->get();
    }
    public function completed()
    {
        return Task::with('user')->orderBy('created_at', 'asc')->complete()->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'priority' => 'required',
        ]);

        $task = User::find(1)->tasks()->create($request->all());

        return $task->load('user');
    }

    public function complete(Task $task)
    {
        $task->complete();

        return $task;
    }
}
