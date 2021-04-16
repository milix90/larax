<?php

namespace App\Http\Controllers\tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\tasks\CreateRequest;
use App\Http\Requests\tasks\GetOneRequest;
use App\Http\Requests\tasks\UpdateRequest;
use App\Models\Task;
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
        return view('task.all', compact($this->task->all()));
    }

    public function get(GetOneRequest $request)
    {
        return view('task.show', compact($this->task->GetTask($request)));
    }

    public function create()
    {
        return view('task.create');
    }

    public function save(CreateRequest $request)
    {
        dd($request->all());
        /*$this->task->CreateTask($request);

        return back();*/
    }

    public function edit(GetOneRequest $request)
    {
        $task = $this->task->GetTask($request);
        return view('task.edit', compact($task));
    }

    public function update(UpdateRequest $request)
    {
        $this->task->UpdateTask($request);

        return redirect(route('tasks'));
    }

    public function delete(GetOneRequest $request)
    {
        $this->task->DeleteTask($request);

        return back();
    }
}
