<?php

namespace App\Http\Controllers\tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\tasks\CreateRequest;
use App\Http\Requests\tasks\GetOneRequest;
use App\Http\Requests\tasks\UpdateRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->task = $taskRepository;
    }

    public function index()
    {
        $tasks = $this->task->all();
        return view('task.all', compact('tasks'));
    }

    public function get($id)
    {
        return view('task.show', compact($this->task->GetTask($id)));
    }

    public function create(CreateRequest $request)
    {
        $this->task->CreateTask($request);
        return back();
    }

    public function edit($id)
    {
        $task = $this->task->GetTask($id);
        //list of employees to assign task to them by admin
        $users = User::query()->where('role','<>',1)->get();
        return view('task.edit', compact('task','users'));
    }

    public function update(UpdateRequest $request)
    {
        $this->task->UpdateTask($request);
        return redirect(route('task.all'));
    }

    public function status($id)
    {
        $this->task->TaskStatus($id);
        return back();
    }

    public function delete($id)
    {
        $this->task->DeleteTask($id);
        return back();
    }
}
